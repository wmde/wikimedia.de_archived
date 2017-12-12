/*!
 * Copyright 2017 Atelier Disko. All rights reserved.
 *
 * Use of this source code is governed by the AGPL v3
 * license that can be found in the LICENSE file.
 */

define('components/news', [], function() {
  'use strict';

// A component that implements synchronized animation of several
// elements seperately. The component's basic HTML exists outside.
// It looks like this:
//
// <section class="news">
//   <div class="news__inner">
//     <article class="news__post">Foo</article>
//     <article class="news__post">Bar</article>
//     ...
//     <article class="news__post">Baz</article>
//   </div>
// </section>
//
// The first article element serves as animation stage, all remaining
// articles are hidden by style. They provide all data and preserve
// document semantics.

  return class News {
    constructor(props = {}) {
      this.state = {
        current: 0,
        slides: []
      };
      this.props = props;
    }

    mount(element) {
      this.element = element;
      this.$el = element.querySelectorAll.bind(element);
      this.$el1 = element.querySelector.bind(element);

      this.title = this.$el1('.news__title');
      this.teaser = this.$el1('.news__teaser');
      this.text = this.$el1('.news__text');
      this.box = this.$el1('.news__box');
      this.link = this.$el1('.news__link');
      this.counterHook = this.$el1('.news__post');

      this.dataReady = new Promise((resolve, reject) => {
        this.extractData(this.$el('.news__post'));
        if (typeof this.props === 'object' && this.props !== {}) {
          resolve();
        }
      });

      this.dataReady.then(() => {
        this.createCounter(this.counterHook);
        this.createNextImg(this.box, false);
        this.createNextImg(this.box, true);
        this.createNextBtn(this.element);

        this.attachEventHandlers();
      });
    }

    extractData(postEls) {
      this.props.data = [];

      postEls.forEach((el) => {
        let dataUnit = {
          img: el.querySelector('.news__image').innerHTML,
          title: el.querySelector('.news__title').innerHTML,
          teaser: el.querySelector('.news__teaser').innerHTML,
          text: el.querySelector('.news__text').innerHTML,
          // need copy, not pointer; hence using 'value' prop
          classes: el.querySelector('.news__box').classList.value
        };

        // news link is optional
        if (el.querySelector('.news__link')) {
          dataUnit.link = el.querySelector('.news__link').getAttribute('href');
        }

        this.props.data.push(dataUnit);
      });
    }

    createCounter(targetEl) {
      let counter = document.createElement('div');
      let count = document.createElement('span');
      let total = document.createElement('span');
      let sep = document.createElement('span');

      counter.classList.add(
        'news__counter',
        'tm--gamma',
        't--caps',
        't--strong'
      );
      counter.setAttribute('aria-live', 'status');

      count.classList.add('post__count');
      count.innerText = this.state.current + 1;

      sep.innerText = ' / ';

      total.innerText = this.props.data.length;

      counter.appendChild(count);
      counter.appendChild(sep);
      counter.appendChild(total);

      targetEl.insertAdjacentElement('afterbegin', counter);
    }

    createNextImg(targetEl, isAfterNext) {
      let index = this.state.current + 1;

      let image = document.createElement('div');
      image.classList.add('news__image');
      image.setAttribute('aria-hidden', true);

      if (isAfterNext) {
        index += 1;
        image.classList.add('news__image--after-next');
      } else {
        image.classList.add('news__image--next');
      }
      if (index >= this.props.data.length) {
        index %= this.props.data.length;
      }
      image.innerHTML = this.props.data[index].img;

      targetEl.insertAdjacentElement('beforeend', image);
    }

    createNextBtn(targetEl) {
      let button = document.createElement('div');

      button.id = 'nextBtn';
      button.classList.add('news__next');
      button.setAttribute('aria-controls', 'news-stage');
      button.setAttribute('role', 'button');

      targetEl.insertAdjacentElement('beforeend', button);
    }

    attachEventHandlers() {
      let nextBtn = this.$el1('#nextBtn');

      let updateCounter = (target) => {
        target.innerHTML = this.state.current + 1;
      };

     let updateText = (i) => {
        this.title.innerHTML = this.props.data[i].title;
        this.teaser.innerHTML = this.props.data[i].teaser;
        this.text.innerHTML = this.props.data[i].text;
        this.box.classList = this.props.data[i].classes;

        if (this.props.data[i].link && this.props.data[i].link !== '#') {
          this.link.hidden = false;
          this.link.setAttribute('href', this.props.data[i].link);
        } else {
          this.link.hidden = true;
        }
      };

      let updateImg = () => {
        let active = this.$el1('.news__image--active');
        let next = this.$el1('.news__image--next');
        let afterNext = this.$el1('.news__image--after-next');

        active.classList.replace('news__image--active', 'news__image--old');
        active.setAttribute('aria-hidden', true);

        next.classList.replace('news__image--next', 'news__image--active');
        next.removeAttribute('aria-hidden');

        afterNext.classList.replace('news__image--after-next', 'news__image--next');

        this.createNextImg(this.box, true);
      };

      let removeOldImg = () => {
        if (this.$el('.news__image--old').length > 3) {
          this.$el1('.news__image--old').remove();
        }
      };

      nextBtn.addEventListener('click', (ev) => {
        this.state.current++;
        if (this.state.current === this.props.data.length) {
          this.state.current = 0;
        }

        updateCounter(this.$el1('.post__count'));
        updateText(this.state.current);
        updateImg();
        removeOldImg();
      });
    }
  };
});
