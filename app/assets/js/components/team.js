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

      this.dataReady.then(() => {
        this.createSelect(this.$el1('#teamStage'));
        this.createList(this.$el1('#teamStage'));
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
        <select class="team__select ts--alpha t--strong t--caps">\n`;
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
      let html = '<ul class="team__list tm--gamma t--caps">\n';
      for (let i = 0; i < this.props.names.length; i++) {
        let a = '';
        if (i === 0) {
          a = ' active';
        }
        html += `<li><span class="team__list-item${a}">${this.props.names[i]}</span></li>\n`;
      }
			html += '</ul>';
      stageEl.insertAdjacentHTML('afterbegin', html);
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
        this.$el1('#memberRole').innerHTML = this.props[name].role;
        this.$el1('#memberText').innerHTML = this.props[name].text;

        if (this.props[name].mail && this.props[name].mail !== '#') {
          this.$el1('#memberLink').classList.remove('hide');
          this.$el1('#memberLink').setAttribute('href', `mailto:${this.props[name].mail}`);
          this.$el1('#memberMail').innerHTML = this.props[name].mail;
        } else {
          this.$el1('#memberLink').classList.add('hide');
        }
      };

      let updateImg = (name) => {
        this.$el1('#memberImg').innerHTML = this.props[name].img;
      };

      items.forEach((el) => {
        el.addEventListener('click', (ev) => {
          updateActive(items, ev.target);
          updateText(ev.target.innerHTML);
          updateImg(ev.target.innerHTML);
          updateSelected(select, ev.target.innerHTML);
        });
      });

      select.addEventListener('change', (ev) => {
        let selected;
        for (let i = 0; i < ev.srcElement.length; i++) {
          if (ev.srcElement[i].selected) {
            selected = ev.srcElement[i];
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
