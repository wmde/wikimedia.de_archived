# Website of Wikimedia Deutschland e.V.

This repository holds the source code and build/deployment tools for the
Wikimedia Deutschland e.V. website relaunch. 

## Development

This project is built using the [B-Series](http://b-series.org) content management system
and is powered by the [li₃ PHP framework](http://li3.me/). Please visit the respective
websites for more information on usage and API documentation.

For development the hostnames `wmde-site.test` and `www.wmde-site.test` are used.

## Setup

Configuration files for NGINX and must must be installed to run the website. The
configuration templates can be found inside hte `config` directory. They use the
following placeholders:

- `__NAKED_DOMAIN__`, i.e. `wikimedia.de`
- `__PATH__`, i.e. `/var/www/wikimedia.de`
- `__NGINX_INCLUDES_PATH__`, i.e. `/path/to/config/web/includes`
- `__PHP_FPM_SOCKET__`, i.e. `/var/run/php/php7.0-fpm.sock`

The PHP configuration file should be placed where they are autoloaded by PHP
FPM, i.e. in `/etc/php/7.0/fpm/conf.d`.

The NGINX configuration can be moved to a different place and the main
server configuration file be included in `/etc/nginx.conf` `include
/path/to/config/web/servers/app.conf`.

By default certificate and certificate key are loaded
from `/etc/ssl/certs/__NAKED_DOMAIN__.crt` and
`/etc/ssl/private/__NAKED_DOMAIN__.key` respectively.

The access log is disabled and errors are logged to syslog.

## Requirements

- NGINX >= 1.9.5 with the headers-more module 
- PHP 7.0 or 7.1 with ext-intl and ext-imagick
- MariaDB InnoDB database

## License

This project is Copyright (c) 2017 Wikimedia Deutschland e.V. and Atelier Disko,
the code is distributed under the terms of the GNU Affero General Public License
v3.0 if not otherwise stated. For the full license text see the LICENSE file.

This project contains 3rd party libraries/source code. These are licensed
and located as follows.

Path | Copyright Holder | License
-----|------------------|--------
assets/js/jquery.js | JS Foundation and other contributors | MIT
assets/js/require.js | JS Foundation and other contributors | MIT
assets/js/require/xxxx.js | - see file header - | MIT or new BSD
assets/js/underscore.js | Jeremy Ashkenas, DocumentCloud and Investigative Reporters & Editors | MIT
assets/js/compat/modernizr.js | - see file header - | MIT
assets/js/router.js | David Persson, Atelier Disko | BSD-3-clause
