/*!
 * Copyright 2017 Atelier Disko. All rights reserved.
 *
 * Use of this source code is governed by the AGPL v3
 * license that can be found in the LICENSE file.
 */

require(['domready!'], function() {
  'use strict';

  let $ = document.querySelectorAll.bind(document);
  let $1 = document.querySelector.bind(document);
  let hasSmoothScroll = 'scrollBehavior' in document.documentElement.style;

  // Smoothly scroll the CTA into view when we clicked on the header support button.
  if (hasSmoothScroll) {
    let button = $1('.mh__support');
    let target = $1(button.hash);

    button.addEventListener('click', function(ev) {
      // The target is not on the current page, allow to load the
      // page having it, then we will be autoplaced on the target.
      if (!target) {
        return;
      }
      ev.preventDefault();
      target.scrollIntoView({behavior: 'smooth'});
    });
  }

  // Pages that use reference, list them in a folded footer area (the references index).
  // When jumping from a citation occurance into the index we will hightlight the
  // corresponding reference. Smooth scrolling is used whenever possible, falling back to
  // simply jumping between anchors.
  //
  // The foldout is revealed whenever we click on a citation or when the link to licenses
  // in the footer actions is clicked.
  let foldout = $1('.refs-foldout');
  if (foldout) {
    let close = foldout.querySelector('.refs-foldout__close');

    // When clicking on close, clear any highlights and close area.
    close.addEventListener('click', function(ev) {
      ev.preventDefault();

      foldout.classList.remove('revealed');
      clearHighlighted();
    });

    $1('.toggle-refs-foldout').addEventListener('click', function(ev) {
      if (foldout.classList.contains('revealed')) {
        ev.preventDefault();
        foldout.classList.remove('revealed');
        return;
      }
      if (hasSmoothScroll) {
        ev.preventDefault();

        foldout.addEventListener('transitionend', function() {
          foldout.scrollIntoView({behavior: 'smooth'});
        }, {once: true});
      }
      foldout.classList.add('revealed');
    });

    // Smooth scroll to citation occurance.
    if (hasSmoothScroll) {
      let handleScrollToCitation = function(ev) {
          ev.preventDefault();
          let target = $1(this.hash);

          target.scrollIntoView({behavior: 'smooth'});
      };
      for (let link of $('.ref__back')) {
        link.addEventListener('click', handleScrollToCitation);
      }
    }

    // Handle highlighting, folding and scrolling in index area. The citations anchors may
    // be rebuild by JavaScript using the document as a data source. So we must to this
    // into a live handler.
    let handleScrollToRef = function(ev) {
      let target = $1(this.hash);

      if (hasSmoothScroll) {
        ev.preventDefault();

        // In case foldout is revealed already, just scroll it
        // into view directly and update highlighting.
        if (foldout.classList.contains('revealed')) {
          target.scrollIntoView({behavior: 'smooth'});
          clearHighlighted();
          target.classList.add('hi');
          return;
        }

        // We must wait until the foldout has been revealed until we can
        // scroll it into view.
        foldout.addEventListener('transitionend', function() {
          target.scrollIntoView({behavior: 'smooth'});
        }, {once: true});
      }

      foldout.classList.add('revealed');
      clearHighlighted();
      target.classList.add('hi');
    };

    document.addEventListener('click', function(ev) {
      if (ev.target.classList.contains('ref__number')) {
        return handleScrollToRef.call(ev.target, ev);
      }
    });

    // Helper function to clear all highlights in the area.
    let clearHighlighted = function() {
      for (let ref of foldout.querySelectorAll('.hi')) {
        ref.classList.remove('hi');
      }
    };
  }
});

