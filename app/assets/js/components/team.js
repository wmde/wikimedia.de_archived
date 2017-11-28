/*!
 * Copyright 2017 Atelier Disko. All rights reserved.
 *
 * Use of this source code is governed by the AGPL v3
 * license that can be found in the LICENSE file.
 */

define('team', [], function() {
  'use strict';

  return class Team {
    construct(props = {}) {
      this.state = {};
      this.props = props;
    }

    mount(element) {
      this.element = element;
      this.attachEventHandlers();
    }

    attachEventHandlers() {
      // ...
    }
  };
});
