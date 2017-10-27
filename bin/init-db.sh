#!/bin/bash
#
# Copyright 2013 David Persson. All rights reserved.
# Copyright 2016 Atelier Disko. All rights reserved.
#
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

set -o nounset
set -o errexit

# Must be executed from the project root (where Envfile is located).
[[ ! -f Envfile ]] && echo "error: not invoked from project root" && exit 1

source Envfile

# We need to keep this at least ordered by prefix, as there are
# dependencies inside the modules i.e. some schemas are augmented.
set +errexit # there might be no matches at all for a given prefix
for prefix in base cms billing ecommerce; do
	for f in $(find app/libraries -path "*/${prefix}_*/data/schema.sql"); do
		echo "Importing ${f} into database ${DB_DATABASE}"
		if [[ $DB_PASSWORD == "" ]]; then
			PASSWORD_ARG=""
		else
			PASSWORD_ARG="-p$DB_PASSWORD"
		fi
		mysql -u$DB_USER $PASSWORD_ARG $DB_DATABASE < $f
	done
done

