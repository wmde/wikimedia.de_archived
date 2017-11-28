/*!
 * Copyright 2017 Atelier Disko. All rights reserved.
 *
 * Use of this source code is governed by the AGPL v3
 * license that can be found in the LICENSE file.
 */

define('components/newsSlider', [], function() {
  'use strict';

  // A slider component that allows synchronized animation of media and (text) content
  // seperately. The component's basic HTML exists outside and prior to mounting the
  // component, it looks like this:
  //
  // <div class="news-slider">
  //   <div class="news-slider__counter">?/?</div>
  //   <div class="news-slider__stage">
  //     <article class="news-slider__slide">Lorem</article>
  //     <article class="news-slider__slide">Lorem</article>
  //     <article class="news-slider__slide">Lorem</article>
  //   </div>
  // </div>
  //
  // As we want to keep images and content close together, we cannot use
  // two stages for content and for media. That would've been easier to
  // animate and position but breaks document semantics.
  return class NewsSlider {
    constructor(props = {}) {
      this.state = {
        // Current slide index, zero-based.
        current: 0,
        // Internal slide objects.
        slides: []
      };
      this.props = props;
    }

    mount(element) {
      this.element = element;
      this.parseSlides();
      this.updateCounter();

      window.addEventListener('resize', () => {
        this.sizeComponent();
      });
      this.sizeComponent();

      this.bindEventHandlers();
    }

    // Determine largest slide content area and sets height of component
    // accordingly.
    sizeComponent() {
      let height = 0;

      for (let slide of this.state.slides) {
        let content = slide.element.querySelector('.news-slider__content');

        if (!content) {
          continue;
        }
        if (content.offsetHeight > height) {
          height = content.offsetHeight;
        }
      }
      this.element.style.height = height + 'px';
    }

    updateCounter() {
      this.element.querySelector('.news-slider__counter')
        .innerHTML = (this.state.current + 1) + '/' + this.state.slides.length;
    }

    // Advances the slider by one slide.
    nextSlide() {
      let slideAtIndex = (index) => {
        if (index < 0) {
          return;
        }
        if (index + 1 <= this.state.slides.length) {
          return this.state.slides[index].element;
        }
      };

      let prev = slideAtIndex(this.state.current - 1);
      let active = slideAtIndex(this.state.current);
      let next = slideAtIndex(this.state.current + 1);
      let nextNext = slideAtIndex(this.state.current + 2);

      if (prev) {
        prev.classList.remove('prev');
        // this slide simply vanishes
      }

      if (active) {
        active.classList.remove('active');
        active.classList.add('prev');
      }

      if (next) {
        next.classList.remove('next');
        next.classList.add('active');
      }
      if (nextNext) {
        nextNext.classList.add('next');
      }
      if (next) {
        this.state.current++;
      }
      this.updateCounter();
    }

    bindEventHandlers() {
      this.element.querySelector('.news-slider__next').addEventListener('click', () => {
        this.nextSlide();
      });
    }

    // Creates internal slider array of objects from HTML.
    parseSlides() {
      let slides = this.element.querySelectorAll('.news-slider__slide');

      for (let i = 0; i < slides.length; i++) {
        this.state.slides.push({
          element: slides[i],
        });
      }
    }
  };
});
