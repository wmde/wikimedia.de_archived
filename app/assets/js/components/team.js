/*!
 * Copyright 2017 Atelier Disko. All rights reserved.
 *
 * Use of this source code is governed by the AGPL v3
 * license that can be found in the LICENSE file.
 */

define('components/team', [], function() {
  'use strict';

  // A component that implements synchronized animation of several
  // elements seperately. The component's basic HTML exists outside.
  // It looks like this:
  //
  // <section class="team">
  //   <div class="team__inner">
  //     <article class="member">Foo</article>
  //     <article class="member">Bar</article>
  //     ...
  //     <article class="member">Baz</article>
  //   </div>
  // </section>
  //
  // The first article element serves as animation stage, all remaining
  // articles are hidden by style. They provide all data and preserve
  // document semantics.
  return class Team {
    constructor(props = {}) {
      this.props = props;
      this.state = {};
    }

    mount(element) {
      this.element = element;
      this.$el = element.querySelectorAll.bind(element);
      this.$el1 = element.querySelector.bind(element);

      // Use the first element seen as stage and extract data from others.
      this.stage = this.$el1('.member');
      this.role = this.$el1('.member__role');
      this.text = this.$el1('.member__text');
      this.link = this.$el1('.member__link');
      this.mail = this.$el1('.member__mail');
      this.image = this.$el1('.member__image');

      this.extractData(this.$el('.member'));
      this.createSelect(this.stage);
      this.createList(this.stage);
      this.attachEventHandlers();
    }

    extractData(memberEls) {
      this.state.names = [];

      memberEls.forEach((el) => {
        let name = el.querySelector('.member__name').innerHTML;
        this.state.names.push(name);

        this.state[name] = {
          image: el.querySelector('.member__image').innerHTML,
          role: el.querySelector('.member__role').innerHTML,
          text: el.querySelector('.member__text').innerHTML,
        };

        // team mail is optional
        this.state[name].mail = '';
        if (el.querySelector('.member__mail')) {
          this.state[name].mail = el.querySelector('.member__mail').innerHTML;
        }
      });
    }

    createSelect(stageEl) {
      let wrapper = document.createElement('div');
      wrapper.classList.add('team__select-wrapper');

      let select = document.createElement('select');
      select.classList.add('team__select', 'ts--alpha', 't--strong', 't--caps');
      select.setAttribute('aria-controls', 'member-stage');

      for (let i = 0; i < this.state.names.length; i++) {
        let option = document.createElement('option');
        option.innerHTML = this.state.names[i];
        if (i === 0) {
          option.selected = true;
        }
        select.appendChild(option);
      }

      wrapper.appendChild(select);
      stageEl.insertAdjacentElement('afterbegin', wrapper);
    }

    createList(stageEl) {
      let ul = document.createElement('ul');
      ul.classList.add('team__list', 'tm--gamma', 't--caps');

      for (let i = 0; i < this.state.names.length; i++) {
        let li = document.createElement('li');

        let a = document.createElement('a');
        a.classList.add('team__list-item');
        a.setAttribute('href', '#member-stage');
        a.setAttribute('aria-controls', '#member-stage');
        a.innerHTML = this.state.names[i];

        if (i === 0) {
          a.classList.add('active');
        }
        li.appendChild(a);
        ul.appendChild(li);
      }
      stageEl.insertAdjacentElement('afterbegin', ul);
    }

    attachEventHandlers() {
      let items = this.$el('.team__list-item');
      let select = this.$el1('.team__select');

      let updateActive = (list, target) => {
        list.forEach((el) => {
          el.classList.remove('active');
        });
        target.classList.add('active');
      };

      let updateSelected = (selectEl, name) => {
        for (let i = 0; i < selectEl.options.length; i++) {
          if (selectEl.options[i].value === name) {
            selectEl.options[i].selected = true;
            break;
          }
        }
      };

     let updateText = (name) => {
        this.role.innerHTML = this.state[name].role;
        this.text.innerHTML = this.state[name].text;

        if (this.state[name].mail !== '') {
          this.link.hidden = false;
          this.link.setAttribute('href', `mailto:${this.state[name].mail}`);
          this.mail.innerHTML = this.state[name].mail;
        } else {
          this.link.hidden = true;
        }
      };

      let updateImage = (name) => {
        this.image.innerHTML = this.state[name].image;
      };

      items.forEach((el) => {
        el.addEventListener('click', (ev) => {
          ev.preventDefault();

          updateActive(items, ev.target);
          updateText(ev.target.innerHTML);
          updateImage(ev.target.innerHTML);
          updateSelected(select, ev.target.innerHTML);
        });
      });

      select.addEventListener('change', (ev) => {
        let selectedName;
        /* 'srcElement' is IEs implementation of 'target' */
        let target = ev.target || ev.srcElement;
        for (let i = 0; i < target.length; i++) {
          if (target[i].selected) {
            selectedName = target[i];
            break;
          }
        }
        updateText(selectedName.innerHTML);
        updateImage(selectedName.innerHTML);

        items.forEach((el) => {
          if (el.innerHTML === selectedName.innerHTML) {
            updateActive(items, el);
          }
        });
      });
    }
  };
});
