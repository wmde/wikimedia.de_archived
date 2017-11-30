/*!
 * Copyright 2013 David Persson. All rights reserved.
 * Copyright 2016 Atelier Disko. All rights reserved.
 *
 * Use of this source code is governed by the AGPL v3
 * license that can be found in the LICENSE file.
 */

requirejs.config({
  baseUrl: App.assets.base,
  waitSeconds: 60,
  paths: {
    // Base
    'jquery': 'app/js/jquery',
    'underscore': 'app/js/underscore',

    // More requirejs plugins are available in
    // js/require/*. Register them here if needed.
    'domready': 'app/js/require/domReady',
    'async': 'app/js/require/async',

    // App
    'router': 'app/js/router',
    'components/newsSlider': 'app/js/components/newsSlider',
    'components/team': 'app/js/components/team',
    'components/fields': 'app/js/components/fields',
    // Add your app specific JavaScript paths here.

    // Compat
    'modernizr': 'app/js/compat/modernizr'
  },
  shim: {
    // App
    // Add your app specific shims here...

    // Compat
    'modernizr': {
      exports: 'Modernizr',
      deps: ['domready!']
    }
  }
});


