# Copyright 2014 David Persson. All rights reserved.
# Copyright 2017 Atelier Disko. All rights reserved.
#
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

NAME ?= $(shell basename $(CURDIR))
DOMAIN ?= $(subst _,-,$(NAME)).test

SECRET_BASE ?= $(shell openssl rand -base64 60 | tr -d '\n')

# Used when building the project, allowed to be overwritten, so external scripts
# may pick a unique or simply different location where they want to process
# the build for themselves without the possibility it being touched by other
# processes.
BUILD_PATH ?= /tmp/build

# Base path for assets, here to make it easy to change.
ASSETS_PATH = app/assets

# Asset directories that need to be linked from modules. Derives scored target versions
# from underscored module name sources.
MODULE_ASSETS_LINKS = $(subst _,-,$(patsubst %/,%,$(subst app/libraries/,assets/,$(dir $(shell find app/libraries -type d -name 'assets')))))

# These files will be checked for translatable strings. When they
# are modified strings will be re-extracted.
EXTRACT_SOURCES = $(shell bash -c "find app/{views,config,documents,models,controllers,extensions,mails} -name '*.php'")

# -- Integrator/Creator --

.PHONY: install
install: prefill app/resources/g11n/cldr app/composer.lock link-assets fix-perms

.PHONY: prefill
prefill: 
	sed -i -e "s|__NAME__|$(NAME)|g" Hoifile Envfile Deployfile
	sed -i -e "s|__DOMAIN__|$(DOMAIN)|g" Hoifile Envfile
	sed -i -e "s|__SECRET_BASE__|$(SECRET_BASE)|g" Envfile
	sed -i -e "s|__DB_PASSWORD__||g" Hoifile Envfile 
	# Some sed leave stray files.
	rm -f Hoifile-e Envfile-e Deployfile-e

app/resources/g11n/cldr: /tmp/cldr_180_core.zip
	unzip -u $< -d /tmp
	cp -r /tmp/common $@

/tmp/cldr_180_core.zip:
	curl http://unicode.org/Public/cldr/1.8.0/core.zip -o /tmp/cldr_180_core.zip 

app/composer.lock:
	composer install -d app

.PHONY: link-assets
link-assets: assets/app $(MODULE_ASSETS_LINKS)

assets/app:
	ln -s ../app/assets $@

assets/%: | app/composer.lock
	ln -s ../app/libraries/$(subst -,_,$*)/assets $@

.PHONY: fix-perms
fix-perms:
	chmod -R a+rwX tmp log media media_versions

# -- Translations --
#
# To extract translatable strings for translating them (i.e. with POedit) into
# English use the following command. The same command can also be used to update
# the file from source code.
#
# $ make app/resources/g11n/po/en/LC_MESSAGES/default.po

# Extracts strings from source code into PO template.
app/resources/g11n/po/message.pot: $(EXTRACT_SOURCES)
	xgettext $^ -o $@ \
		--sort-by-file \
		--language=PHP \
		--from-code=utf-8 \
		--keyword=t \
		--keyword=tn:1,2 \
		--package-name=$(NAME) \
		--copyright-holder="Atelier Disko" \
		--msgid-bugs-address="info@atelierdisko.de"
	sed -i -e 's/CHARSET/UTF-8/' $@
	rm -f $@-e # cleanup stray files

# Initializes an empty or updates an existing PO file. msgmerge cannot init at the same time.
app/resources/g11n/po/%/LC_MESSAGES/default.po: app/resources/g11n/po/message.pot 
	if [ ! -f $@ ]; then msginit -l $* -i $< -o $@ --no-translator; fi
	msgmerge $@ $< -o $@ --verbose

# -- SSL Certificate Management --
# http://www.rackspace.com/knowledge_center/article/generate-a-csr-with-openssl

# Creates SHA2 CSR for requesting SSL cert. Will reuse existing key if present, else
# will generate a key. To generate a CSR for the FQDN example.com run:
# $ make config/ssl/example.com.csr
#
# To verify the generated CSR please read: 
# https://knowledge.verisign.de/support/ssl-certificates-support/index?vproductcat=V_C_S&page=content&actp=CROSSLINK&id=AR198
config/ssl/%.csr: config/ssl/%.key
	openssl req -new -sha256 -key $< -out $@

# Creates 2048bit KEY for SSL signing. We use seperate keys for each FQDN,
# this has better symmetry as it matches key<->csr. The FQDN is part of
# the filename. So in order to generate a key for example.com run: 
# $ make config/ssl/example.com.key
.PRECIOUS: config/ssl/%.key
config/ssl/%.key:
	openssl genrsa -out $@ 2048

# -- Dist --

# Prepares a copy of the project for distribution under /tmp/dist. When updating
# run dist-clean first.
dist: 
	git clone --verbose --single-branch --recursive --no-hardlinks \
		--branch $(shell git rev-parse --abbrev-ref HEAD) \
		$(CURDIR) $(BUILD_PATH)
	cd $(BUILD_PATH) && bin/build.sh

.PHONY: dist-clean
dist-clean:
	rm -fr $(BUILD_PATH)

# -- Maintainer --

.PHONY: update-assets
update-assets:
	curl https://raw.githubusercontent.com/necolas/normalize.css/master/normalize.css > $(ASSETS_PATH)/css/normalize.css
	curl https://code.jquery.com/jquery-3.2.1.js > $(ASSETS_PATH)/js/jquery.js
	curl http://requirejs.org/docs/release/2.3.2/comments/require.js > $(ASSETS_PATH)/js/require.js
	curl https://raw.githubusercontent.com/requirejs/domReady/latest/domReady.js > $(ASSETS_PATH)/js/require/domready.js
	curl http://underscorejs.org/underscore.js > $(ASSETS_PATH)/js/underscore.js
	curl -L https://raw.githubusercontent.com/zloirock/core-js/master/client/shim.js > $(ASSETS_PATH)/js/compat/core.js
