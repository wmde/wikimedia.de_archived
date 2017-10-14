# B–Series Web Application Distribution

The B-Series distribution is an application system that includes the overarching directory layout, an example starting application, and very useful tools to manage the lifecycle of a software project.

The distribution is the basis for your own project and the starting point for anyone interested in the B-Series.


## Setup

First, let's get a copy of the distro, on which we will base off on our new project. For the sake of simplicity we'll call our new project _project_.
```
$ git clone git@github.com:bseries/distro.git project
```

All commands below are executed from the root of the project. So let's switch right into it.
```
$ cd project
```

The root of the project contains three important configuration files: `Envfile` holds per configuration settings, `Deployfile` configures the deploy target, `Hoifile` used by [Hoi](https://github.com/atelierdisko/hoi) for setting up the webserver and database. Especially the `Envfile` is very well documented.

Currently the configuration files contain placeholders, i.e. `__NAME__`. These can be filled in for you automatically as they can be derived easily from the project directory itself. They can also be replaced manually as well.
```
$ make prefill
```

As a PHP project the B-Series uses composer for managing PHP libraries. Let's install the initial round of dependencies. Let's also install some more B-Series modules.
```
$ composer install
$ composer require bseries/cms_post
$ composer require bseries/cms_social
```

Some B-modules contain an `assets` directory, which needs to be symlinked into the project's `assets` directory, so files in there can be accessed by the web server.
```
$ bin/link-assets.sh
```

The B-Series is ready for globalization by default. Internally it uses data from the Unicode Consortium: the CLDR. The globalization data is too extensive to include it with the distro. The following command will download and install it locally.
```
$ make app/resources/g11n/cldr
```

Continue to initialize the database using the following command, and create the initial users.
```
$ bin/init-db.sh
$ bin/li3.php users initial
```

## Hosting the Project

Atelier Disko projects are usually served by [Hoi](https://github.com/atelierdisko/hoi), which
takes care of any needs the project has.
```
$ hoictl load
```

Sometimes Hoi isn't available inside the target environment.
You will than have to take care of configuring webserver,
database, cronjobs and workers yourself.

## Side-Autoloading of JavaScript Assets

For autoloading of JavaScript it is important, that
files are named using camelCase:

BAD:
  - `assets/js/foo-bar.js`
  - `assets/js/foo.bar.js`

GOOD:
  - `assets/js/fooBar.js`

The following JavaScript scripts will always be loaded and bootstrap the application's JavaScript, thus must always be present:

  - `assets/js/require.js`
  - `assets/js/base.js`

Often you've got JavaScript that is specific to a single view and action. Place files using the following path schema to autoload them once a view is requested. When using AMD in these files they must use `require()` instead of `define()``.

  - `assets/js/views/layouts/<layout>.js`
  - `assets/js/views/<controller>/<action>.js`

Such an autoloadable files would look like this:
```javascript
require(['jquery', 'domready!'], function($) {
  // ...
});
```

## Side-Autoloading of CSS Assets

Autoloading of CSS files is very similar to autoloading of JavaScript files. These Stylesheets are always loaded and must be present:

  - `assets/css/base.css`

View specific CSS can be placed into the "views" subdirectory structure similar as described for JavaScript above.

  - `assets/css/views/layouts/<layout>.css`
  - `assets/css/views/<controller>/<action>.css`

All `views` CSS files, except those in `elements`, are loaded automatically when needed. However, its good practice to
scope them to their page (here: `views/pages/home.css`):

```css
.home .banner {
	/* ... */
}
```

## Special Layout Functions

```php
$this->set([
	'extraBodyClasses' => ['has-foo', 'more-bar']
]);
```

## B-Series Modules and other App Libraries

This distribution comes bundled at a minimum with two modules already: `base_core`, for providing the admin and core functionality as well as features that other modules depend on; `base_media` for providing management, upload of media files.

Additional modules can be added by making them additional dependencies:

```
$ composer require bseries/cms_social
```

## Running Tasks

The distribution comes with some useful tasks that help with setting up the application and reaching as far as deploying the whole project. The tasks are implemented using GNU Make inside the Makefile.

```
$ make fix-perms
```

## Running Framework Commands

The lithium framework supports its own set of commands[1], which we use specifically inside some modules (i.e. base_core/extensions/commands) to run certain tasks that need access to the database or the application itself.

In order to run such commands execute the following:

```
$ bin/li3.php
$ bin/li3.php help
$ bin/li3.php jobs
```

[1] http://li3.me/docs/manual/common-tasks/console-applications.md


## SSL Certificates

The config/ssl directory contains all files related to SSL. The name of the domain (FQDN) is always taken from the file names (i.e. example.com.key).

In the first step you must generate the signing request. A signing key is automatically generated when needed.
```
$ make config/ssl/example.com.csr
```

Once you receive the signed certificate it should be saved under
`config/ssl/example.com.crt`.

## Globalization

The translation workflow is based on GNU gettext.

To generate the initial or update existing translation files run the following command. This example uses English (`en`) as the target locale. To use different locales simply exchange `en` in the example for the target locale you desire...

```
$ make app/resources/g11n/po/en/LC_MESSAGES/default.po
```

Missing translations can then be filled in using your favorite application, i.e. [POEdit](https://poedit.net/).
