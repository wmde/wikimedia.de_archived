# Old version of the Wikimedia Deutschland e.V. website

The new version can be found at https://github.com/wmde/wikimedia.de

## Development

This project is built using the [B-Series](http://b-series.org) content management system
and is powered by the [li₃ PHP framework](http://li3.me/). Please visit the respective
websites for more information on usage and API documentation.

For development the hostnames `wmde-site.test` and `www.wmde-site.test` are used.

## Setup

There are two ways to setup the website one manual approach which uses 
configuration templates from `config` and one semi-automatic way as described in the
B-Series [Setup Guide](http://b-series.org/docs/book/manual/1.x/setup).

The configuration templates for the manual approach are found inside the
`config` directory and use following placeholders:

Name | Example Value
-----|--------------
`__NAKED_DOMAIN__` | `wikimedia.de`
`__PATH__` | `/var/www/wikimedia.de`
`__NGINX_INCLUDES_PATH__` |`/path/to/config/nginx/includes`
`__PHP_FPM_SOCKET__` | `/var/run/php/php7.0-fpm.sock`

After filling in th placeholders, the files can be moved into system 
configuration directories.

For the PHP configuration this is i.e. in `/etc/php/7.0/fpm/conf.d` whereas
the app's main NGINX configuration file can be included in the system configuration 
or symlinked into i.e. `/etc/nginx/sites-enabled`.
```
# ...
include /path/to/config/nginx/servers/app.conf`
# ...
```

By default certificate and certificate key are loaded
from the following locations: 
- `/etc/ssl/certs/__NAKED_DOMAIN__.crt` 
- `/etc/ssl/private/__NAKED_DOMAIN__.key`

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
app/resources/g11n/cldr | Unicode, Inc. | http://unicode.org/copyright.html
assets/js/jquery.js | JS Foundation and other contributors | MIT
assets/js/require.js | JS Foundation and other contributors | MIT
assets/js/require/xxxx.js | - see file header - | MIT or new BSD
assets/js/underscore.js | Jeremy Ashkenas, DocumentCloud and Investigative Reporters & Editors | MIT
assets/js/compat/modernizr.js | - see file header - | MIT
assets/js/router.js | David Persson, Atelier Disko | BSD-3-clause
