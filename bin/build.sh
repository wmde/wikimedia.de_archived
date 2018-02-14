#!/bin/bash -x
#
# Copyright 2013 David Persson. All rights reserved.
# Copyright 2016 Atelier Disko. All rights reserved.
#
# Use of this source code is governed by the AGPL v3
# license that can be found in the LICENSE file.

set -o nounset
set -o errexit

# Must be executed from the project root (where Envfile is located). Will
# operate on and modify the *current* files in tree. Be sure to operate on a
# copy.
[[ ! -f Envfile ]] && echo "error: not invoked from project root" && exit 1

source Envfile
revision=$(git rev-parse --short HEAD)

sed -i -e "s|__VERSION_BUILD__|$revision|g" VERSION.txt
# Workaround for older BSD versions of sed that need
# a suffix after -i while interpreting -e as the suffix.
[[ -f VERSION.txt-e ]] && rm VERSION.txt-e

# Restricts assets building to app's assets. Libraries must
# provide their own buildscript when they ship assets. This
# is because we cannot know if certain assets will need
# special compressors.

for f in $(ls app/resources/g11n/po/*/LC_MESSAGES/*.po); do
	msgfmt -o ${f/.po/.mo} --verbose $f
done

# Babelify in-place for full current ESx compatiblity.
cat << EOF > .babelrc
{
	"presets": [
		["env", {"targets": {"browsers": [
			"last 2 versions",
			"> 5%",
			"ie 11"
		]}}]
	],
	"ignore": [
		"underscore.js",
		"require.js",
		"require",
		"jquery.js",
		"modernizr.js",
		"core.js"
	]
}
EOF
babel app/assets/js -d app/assets/js

for f in $(find app/assets/js -type f -name *.js); do
	uglifyjs --compress --mangle -o $f.min -- $f && mv $f.min $f
done

for f in $(ls app/assets/css/*.css); do
	cssnextgen $f > $f.tmp && mv $f.tmp $f
	sqwish $f -o $f.min && mv $f.min $f
done

# We can't restrict image search to ico and img directories as images may be
# located in i.e. vid directories if they are posters.
for f in $(find app/assets -type f -name *.png); do
	# -ow flag requires pngcrush >=1.7.22
	# pngcrush -rem alla -rem text -q -ow $f
	pngcrush -rem alla -rem text -q $f $f.tmp && mv $f.tmp $f
done
for f in $(find app/assets -type f -name *.jpg); do
	mogrify -strip $f
	# in place optimization requires jpegtran >=8d
	# jpegtran -optimize -copy none -outfile $f $f
	jpegtran -optimize -copy none -outfile $f.tmp $f && mv $f.tmp $f
done

# Ensure we don't install dev tooling in production, for security (potential
# information disclosure) and performance (larger file search trees) reasons.
if [[ $CONTEXT != "prod" ]]; then
	composer install -d app --prefer-dist
else
	composer install -d app --prefer-dist --no-dev
fi
composer dump-autoload  -d app --optimize

# Execute sub-builds in well-known libraries.
for d in $(ls -d app/libraries/{base,cms,billing,ecommerce}_*); do
	cd $d
	if [[ -f bin/build.sh ]]; then
		./bin/build.sh
	elif [[ -d resources/g11n/po ]]; then
		# Perform some optimization, by definition an optional build task.
		for f in $(ls resources/g11n/po/*/LC_MESSAGES/*.po); do
			msgfmt -o ${f/.po/.mo} --verbose $f
		done
	fi
	cd -
done

rm -fr .git* app/libraries/*/*/.git* app/libraries/*/.git*
