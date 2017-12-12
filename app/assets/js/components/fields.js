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
      this.$el = element.querySelectorAll.bind(element);
      this.$el1 = element.querySelector.bind(element);

      this.bindButtonEvents();
      this.createCounter(this.element);
      this.createNextBtn(this.element);
      this.bindNextBtnEvents();
    }

    bindButtonEvents() {
      let buttons = this.$el('.field-button');

      let updateCounter = (name) => {
        let target = this.$el1('.field-counter__status');
        if (name === 'support') {
          target.innerHTML = 1;
        }
        if (name === 'dev') {
          target.innerHTML = 2;
        }
        if (name === 'know') {
          target.innerHTML = 3;
        }
      };

      let handler = (ev) => {
        ev.preventDefault();

        this.element.classList.remove(
          'is-active-dev',
          'is-active-support',
          'is-active-know'
        );
        let name = ev.currentTarget.getAttribute('href').substring(1);
        this.element.classList.add('is-active-' + name);

        // Toggle visibility of texts inside blurb.
        for (let el of this.$el('.fields__text')) {
          if (el.id === name) {
            el.hidden = false;
          } else {
            el.hidden = true;
          }
        }
        updateCounter(name);
      };

      for (let button of buttons) {
        button.addEventListener('click', handler);
      }
    }

    createCounter(targetEl) {
      let html = `<div class="field-counter tm--gamma t--caps t--strong">
          <span class="field-counter__status">1</span> / 3
        </div>`;
      targetEl.insertAdjacentHTML('afterbegin', html);
    }

    createNextBtn(targetEl) {
      let html = `<div class="fields__next"></div>`;
      targetEl.insertAdjacentHTML('beforeend', html);
    }

    bindNextBtnEvents() {
      let switchClass = (classList) => {
        if (classList.contains('is-active-support')) {
          classList.remove('is-active-support');
          classList.add('is-active-dev');
        } else if (classList.contains('is-active-dev')) {
          classList.remove('is-active-dev');
          classList.add('is-active-know');
        } else if (classList.contains('is-active-know')) {
          classList.remove('is-active-know');
          classList.add('is-active-support');
        }
      };

      let switchText = (classList, textEls) => {
        let splitStr = classList.value.split('-');
        let name = splitStr[splitStr.length - 1];

        for (let el of textEls) {
          el.hidden = el.id !== name;
        }
      };

      let updateCounter = () => {
        let splitStr = this.element.classList.value.split('-');
        let name = splitStr[splitStr.length - 1];
        let target = this.$el1('.field-counter__status');
        if (name === 'support') {
          target.innerHTML = 1;
        }
        if (name === 'dev') {
          target.innerHTML = 2;
        }
        if (name === 'know') {
          target.innerHTML = 3;
        }
      };

      let btn = this.$el1('.fields__next');

      btn.addEventListener('click', () => {
        switchClass(this.element.classList);
        switchText(this.element.classList, this.$el('.fields__text'));
        updateCounter();
      });
    }
  };
});
