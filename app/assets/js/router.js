/*!
 * Copyright 2014 David Persson. All rights reserved.
 * Copyright 2017 Atelier Disko. All rights reserved.
 *
 * Use of this source code is governed by a BSD-style
 * license that can be found in the LICENSE file.
 */

define('router', ['jquery'], function($) {
  'use strict';

  // Expects to have access to a global `App` object that must
  // have a `routes` property defined on it, containing all
  // route mappings.
  if (window.console !== undefined) {
    if (window.App === undefined) {
        console.error('Global App object not defined.');
    } else if (window.App.routes === undefined) {
        console.error('Global App object hast no routes key.');
    }
  }

  // Router only has one method (`match`) and is exported globally. This method
  // currently returns a promise for BC and FC. We may later resolve routes
  // via an API endpoint.
  window.router = {
    match: function(name, params) {
      var dfr = new $.Deferred();
      var template = App.routes[name];

      $.each(params || {}, function(k, v) {
        template = template.replace(
          '__' + _underscore(k).toUpperCase() + '__',
          v
        );
      });
      dfr.resolve(template);

      return dfr;
    }
  };

  // Helper function to turn camlized strings into
  // underscored i.e. (foreignKey -> foreign_Key).
  function _underscore(camelized) {
    var result = '' + camelized;

    result = result.replace(/([A-Z\d]+)([A-Z][a-z])/g, '$1_$2');
    result = result.replace(/([a-z\d])([A-Z])/g, '$1_$2');
    result = result.replace(/-/g, '_');

    return result;
  }

  return window.router;
});
