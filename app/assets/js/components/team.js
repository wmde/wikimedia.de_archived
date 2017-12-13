/*!
 * Copyright 2017 Atelier Disko. All rights reserved.
 *
 * Use of this source code is governed by the AGPL v3
 * license that can be found in the LICENSE file.
 */

define('components/team', [], function() {
  'use strict';

  return class Team {
    constructor(props = {}) {
      this.state = {};
      this.props = props;
    }

    mount(element) {
      this.element = element;

      this.$el = element.querySelectorAll.bind(element);
      this.$el1 = element.querySelector.bind(element);

      this.dataReady = new Promise((resolve, reject) => {
        this.extractData(this.$el('.member'));
        if (typeof this.props === 'object' && this.props !== {}) {
          resolve();
        }
      });

      // Use the first element seen as stage and extract data from others.
      this.stage = this.$el1('.member');

      this.role = this.$el1('.member__role');
      this.text = this.$el1('.member__text');
      this.link = this.$el1('.member__mail');
      this.mail = this.$el1('.member__addr');
      this.image = this.$el1('.member__image');

      this.dataReady.then(() => {
        this.createSelect(this.stage);
        this.createList(this.stage);
        this.attachEventHandlers();
      });
    }

    extractData(memberEls) {
      this.props.names = [];

      memberEls.forEach((el) => {
        let name = el.querySelector('.member__name').innerHTML;
        this.props.names.push(name);

        this.props[name] = {
          img: el.querySelector('.member__image').innerHTML,
          role: el.querySelector('.member__role').innerHTML,
          text: el.querySelector('.member__text').innerHTML,
        };

        // team mail is optional
        if (el.querySelector('.member__addr')) {
          this.props[name].mail = el.querySelector('.member__addr').innerHTML;
        }
      });
    }

    createSelect(stageEl) {
      let html = `<div class="team__select-wrapper">
        <select aria-controls="member-stage" class="team__select ts--alpha t--strong t--caps">\n`;
      for (let i = 0; i < this.props.names.length; i++) {
        let s = '';
        if (i === 0) {
          s = ' selected';
        }
        html += `<option${s}>${this.props.names[i]}</option>\n`;
      }
      html += '</select></div>';
      stageEl.insertAdjacentHTML('afterbegin', html);
    }

    createList(stageEl) {
      let ul = document.createElement('ul');
      ul.classList.add('team__list', 'tm--gamma', 't--caps');

      for (let i = 0; i < this.props.names.length; i++) {
        let li = document.createElement('li');

        let a = document.createElement('a');
        a.classList.add('team__list-item');
        a.setAttribute('href', '#member-stage');
        a.setAttribute('aria-controls', '#member-stage');
        a.innerHTML = this.props.names[i];

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
        this.role.innerHTML = this.props[name].role;
        this.text.innerHTML = this.props[name].text;

        if (this.props[name].mail && this.props[name].mail !== '#') {
          this.link.hidden = false;
          this.link.setAttribute('href', `mailto:${this.props[name].mail}`);
          this.mail.innerHTML = this.props[name].mail;
        } else {
          this.link.hidden = true;
        }
      };

      let updateImg = (name) => {
        this.image.innerHTML = this.props[name].img;
      };

      items.forEach((el) => {
        el.addEventListener('click', (ev) => {
          ev.preventDefault();

          updateActive(items, ev.target);
          updateText(ev.target.innerHTML);
          updateImg(ev.target.innerHTML);
          updateSelected(select, ev.target.innerHTML);
        });
      });

      select.addEventListener('change', (ev) => {
        let selected;
        let target = ev.target || ev.srcElement;
        for (let i = 0; i < target.length; i++) {
          if (target[i].selected) {
            selected = target[i];
            break;
          }
        }
        updateText(selected.innerHTML);
        updateImg(selected.innerHTML);

        items.forEach((el) => {
          if (el.innerHTML === selected.innerHTML) {
            updateActive(items, el);
          }
        });
      });
    }
  };
});
