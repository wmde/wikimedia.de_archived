/*!
 * Copyright 2017 Atelier Disko. All rights reserved.
 *
 * Use of this source code is governed by the AGPL v3
 * license that can be found in the LICENSE file.
 */

define('components/news', ['hammer', 'modernizr'], function(Hammer, Modernizr) {
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
      this.props = props;
      this.state = {
        current: 0
      };
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

      this.extractData(this.$el('.news__post'));
      this.createCounter(this.counterHook);
      this.createNextImage(this.box, false);
      this.createNextImage(this.box, true);
      this.createPreviousButton(this.element);
      this.createNextButton(this.element);
      this.attachEventHandlers();
    }

    extractData(postEls) {
      this.state.data = [];

      postEls.forEach((el) => {
        let item = {
          image: el.querySelector('.news__image').innerHTML,
          title: el.querySelector('.news__title').innerHTML,
          teaser: el.querySelector('.news__teaser').innerHTML,
          text: el.querySelector('.news__text').innerHTML,
          // need copy, not pointer; hence using 'value' prop
          classes: el.querySelector('.news__box').classList.value,
          link: {
            href: el.querySelector('.news__link').getAttribute('href'),
            innerText: el.querySelector('.news__link').innerText
          }
        };

        this.state.data.push(item);
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

      total.innerText = this.state.data.length;

      counter.appendChild(count);
      counter.appendChild(sep);
      counter.appendChild(total);

      targetEl.insertAdjacentElement('afterbegin', counter);
    }

    createNextImage(targetEl, isAfterNext) {
      let index = this.state.current + 1;

      let image = document.createElement('div');
      image.classList.add('news__image');
      image.setAttribute('aria-hidden', true);
      if (isAfterNext) {
        index += 1;
        image.classList.add('after-next');
      } else {
        image.classList.add('next');
      }
      if (index >= this.state.data.length) {
        index %= this.state.data.length;
      }
      image.innerHTML = this.state.data[index].image;

      targetEl.insertAdjacentElement('beforeend', image);
    }

    createPreviousButton(targetEl) {
      let button = document.createElement('div');

      button.id = 'previousButton';
      button.classList.add('news__previous');
      button.setAttribute('aria-controls', 'news-stage');
      button.setAttribute('role', 'button');

      targetEl.insertAdjacentElement('beforeend', button);
    }

    createNextButton(targetEl) {
      let button = document.createElement('div');

      button.id = 'nextButton';
      button.classList.add('news__next');
      button.setAttribute('aria-controls', 'news-stage');
      button.setAttribute('role', 'button');

      targetEl.insertAdjacentElement('beforeend', button);
    }

    attachEventHandlers() {
      let previousButton = this.$el1('#previousButton');
      let nextButton = this.$el1('#nextButton');

      let updateCounter = (target) => {
        target.innerHTML = this.state.current + 1;
      };

      let updateText = (i) => {
        this.title.innerHTML = this.state.data[i].title;
        this.teaser.innerHTML = this.state.data[i].teaser;
        this.text.innerHTML = this.state.data[i].text;
        this.box.classList = this.state.data[i].classes;

        let link = this.state.data[i].link;
        this.link.href = link.href;
        this.link.innerText = link.innerText;
        this.link.hidden = link.href === '#';
      };

      let updateImage = () => {
        let active = this.$el1('.news__image.active');
        let next = this.$el1('.news__image.next');
        let afterNext = this.$el1('.news__image.after-next');

        active.classList.replace('active', 'old');
        active.setAttribute('aria-hidden', true);

        next.classList.replace('next', 'active');
        next.removeAttribute('aria-hidden');

        afterNext.classList.replace('after-next', 'next');

        this.createNextImage(this.box, true);
      };

      let removeOldImage = () => {
        const limit = 3;
        if (this.$el('.news__image.old').length > limit) {
          this.$el1('.news__image.old').remove();
        }
      };

      previousButton.addEventListener('click', (ev) => {
        this.state.current--;
        if (this.state.current === -1) {
          this.state.current = this.state.data.length-1;
        }

        updateCounter(this.$el1('.post__count'));
        updateText(this.state.current);
        updateImage();
        removeOldImage();
      });

      nextButton.addEventListener('click', (ev) => {
        this.state.current++;
        if (this.state.current === this.state.data.length) {
          this.state.current = 0;
        }

        updateCounter(this.$el1('.post__count'));
        updateText(this.state.current);
        updateImage();
        removeOldImage();
      });
      // Add swipe control
      if (Modernizr.touchevents) {
        let swipeElement = new Hammer( this.element );
        swipeElement.on( 'swipeleft', function() {
          previousButton.click();
        });
        swipeElement.on( 'swiperight', function() {
          nextButton.click();
        });
      }
    }
  };
});
