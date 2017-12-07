/*!
 * Copyright 2017 Atelier Disko. All rights reserved.
 *
 * Use of this source code is governed by the AGPL v3
 * license that can be found in the LICENSE file.
 */

require(['domready!'], function() {
  'use strict';

  // Smoothly scroll the CTA into view when 1. clicking on the header support
  // button and...
  //
  // TODO 2. when the current page contains the CTA area and we are
  // invoked with the #cta hash.
  if ('scrollBehavior' in document.documentElement.style) {
    let scrollHandler = function(ev) {
      ev.preventDefault();
      document.querySelector(this.hash)
        .scrollIntoView({behavior: 'smooth'});
    };
    document.querySelector('.mh__support')
      .addEventListener('click', scrollHandler);
  }
});

