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
      this.props = props;
      this.state = {};
    }

    mount(element) {
      this.element = element;
      this.$el = element.querySelectorAll.bind(element);
      this.$el1 = element.querySelector.bind(element);

      this.bindButtonEvents();
      this.createCounter(this.element);
      this.createNextButton(this.element);
      this.bindNextButtonEvents();
    }

    bindButtonEvents() {
      let buttons = this.$el('.field-button');

      let updateCounter = (name) => {
        this.counterStatus.innerText = this.numberForName(name);
      };

      let handler = (ev) => {
        ev.preventDefault();

        this.clearActiveClasses();

        let name = this.idToName(ev.currentTarget.getAttribute('href').substring(1));
        this.element.classList.add('is-active-' + name);

        // Toggle visibility of texts inside blurb.
        for (let el of this.$el('.fields__text')) {
          el.hidden = this.idToName(el.id) !== name;
        }
        updateCounter(name);
      };

      for (let button of buttons) {
        button.addEventListener('click', handler);
      }
    }

    createCounter(targetEl) {
      let counter = document.createElement('div');
      let status = document.createElement('span');
      let total = document.createElement('span');
      let sep = document.createElement('span');

      counter.classList.add(
        'field-counter',
        'tm--gamma',
        't--caps',
        't--strong'
      );
      counter.setAttribute('aria-live', 'status');

      status.classList.add('field-counter__status');
      status.innerText = 1;

      sep.innerText = ' / ';

      total.innerText = 3;

      counter.appendChild(status);
      counter.appendChild(sep);
      counter.appendChild(total);

      targetEl.insertAdjacentElement('afterbegin', counter);

      this.counterStatus = status;
    }

    createNextButton(targetEl) {
      let button = document.createElement('div');

      button.setAttribute('role', 'button');
      button.setAttribute('aria-controls', 'fields-blurb');
      button.classList.add('fields__next');

      targetEl.insertAdjacentElement('beforeend', button);
    }

    bindNextButtonEvents() {
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
        let name = this.classListToName(classList);

        for (let el of textEls) {
          el.hidden = this.idToName(el.id) !== name;
        }
      };

      let updateCounter = () => {
        this.counterStatus.innerText = this.numberForName(
          this.classListToName(this.element.classList)
        );
      };

      this.$el1('.fields__next').addEventListener('click', () => {
        switchClass(this.element.classList);
        switchText(this.element.classList, this.$el('.fields__text'));
        updateCounter();
      });
    }

    // Extracts the name portion out of an active class:
    // i.e. foo bar is-active-dev -> dev
    classListToName(classList) {
      let splitStr = classList.value.split('-');
      return splitStr[splitStr.length - 1];
    }

    // Extracts the name portio out of an anchor target.
    // i.e. fields-dev -> dev
    idToName(id) {
      return id.substring('fields-'.length);
    }

    // Removes all possible active classes.
    clearActiveClasses() {
      this.element.classList.remove(
        'is-active-dev',
        'is-active-support',
        'is-active-know'
      );
    }

    numberForName(name) {
      return ['support', 'dev', 'know'].indexOf(name) + 1;
    }
  };
});
