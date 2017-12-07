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

      this.dataReady = new Promise((resolve, reject) => {
        this.extractData(this.$el('.news__post'));
        if (typeof this.props === 'object' && this.props !== {}) {
          resolve();
        }
      });

      this.dataReady.then(() => {
        this.createCounter(this.$el1('#counterHook'));
        this.createNextImg(this.$el1('#newsBox'), false);
        this.createNextImg(this.$el1('#newsBox'), true);
        this.createNextBtn(this.element);

        this.attachEventHandlers();
      });
    }

    extractData(postEls) {
      this.props.data = [];

      postEls.forEach((el) => {
        let dataUnit = {
          img: el.querySelector('.news__image').style.backgroundImage,
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
      let html = `<div class="news__counter tm--gamma t--caps t--strong">
          <span id="postCount">${this.state.current + 1}</span>/${this.props.data.length}
        </div>`;
      targetEl.insertAdjacentHTML('afterbegin', html);
    }

    createNextImg(targetEl, isAfterNext) {
      let index = this.state.current + 1;
      let cl = 'news__image--next';
      if (isAfterNext) {
        index += 1;
        cl = 'news__image--after-next';
      }
      if (index >= this.props.data.length) {
        index %= this.props.data.length;
      }
      // browser wraps img url with double quotes; destroys slashes in url
      let url = this.props.data[index].img.replace(/"/g, "'");
      let html = `<div
				  class="news__image ${cl}"
				  style="background-image: ${url};"
				></div>`;
      targetEl.insertAdjacentHTML('beforeend', html);
    }

    createNextBtn(targetEl) {
      let html = `<div class="news__next" id="nextBtn"></div>`;
      targetEl.insertAdjacentHTML('beforeend', html);
    }

    attachEventHandlers() {
      let nextBtn = this.$el1('#nextBtn');

      let updateCounter = (target) => {
        target.innerHTML = this.state.current + 1;
      };

      let updateText = (i) => {
        this.$el1('#newsTitle').innerHTML = this.props.data[i].title;
        this.$el1('#newsTeaser').innerHTML = this.props.data[i].teaser;
        this.$el1('#newsText').innerHTML = this.props.data[i].text;
        this.$el1('#newsBox').classList = this.props.data[i].classes;

        if (this.props.data[i].link && this.props.data[i].link !== '#') {
          this.$el1('#newsLink').classList.remove('hide');
          this.$el1('#newsLink').setAttribute('href', this.props.data[i].link);
        } else {
          this.$el1('#newsLink').classList.add('hide');
        }
      };

      let updateImg = () => {
        this.$el1('.news__image--active').classList.add('news__image--old');
        this.$el1('.news__image--active').classList.remove('news__image--active');

        this.$el1('.news__image--next').classList.add('news__image--active');
        this.$el1('.news__image--next').classList.remove('news__image--next');

        this.$el1('.news__image--after-next').classList.add('news__image--next');
        this.$el1('.news__image--after-next').classList.remove('news__image--after-next');

        this.createNextImg(this.$el1('#newsBox'), true);
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

        updateCounter(this.$el1('#postCount'));
        updateText(this.state.current);
        updateImg();
        removeOldImg();
      });
    }
  };
});
