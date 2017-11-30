/*!
 * Copyright 2017 Atelier Disko. All rights reserved.
 *
 * Use of this source code is governed by the AGPL v3
 * license that can be found in the LICENSE file.
 */

define('components/fields', [], function() {
  'use strict';

  // A component which has two areas: one for selecting content
  // and one for content display. The content area is tethered
  // to the selectors.
  return class Fields {
    constructor(props = {}) {
      this.state = {};
      this.props = props;
    }

    mount(element) {
      this.element = element;
      this.bindButtonEvents();
    }

    bindButtonEvents() {
      let buttons = this.element.querySelectorAll('.field-button');

      let component = this.element;
      let handler = function(ev) {
        ev.preventDefault();

        component.classList.remove(
          'is-active-dev',
          'is-active-support',
          'is-active-know'
        );
        let name = this.getAttribute('href').substring(1);
        component.classList.add('is-active-' + name);

        // Toggle visibility of texts inside blurb.
        for (let el of component.querySelectorAll('.fields__text')) {
          if (el.id === name) {
            el.classList.remove('hide');
          } else {
            el.classList.add('hide');
          }
        }
      };

      for (let button of buttons) {
        button.addEventListener('click', handler);
      }
    }
  };
});
