/*!
 * Copyright 2017 Atelier Disko. All rights reserved.
 *
 * Use of this source code is governed by the AGPL v3
 * license that can be found in the LICENSE file.
 */

require(['domready!'], function() {
  'use strict';

  // Smoothly scroll the CTA into view when we clicked on the header support button.
  if ('scrollBehavior' in document.documentElement.style) {
    let button = document.querySelector('.mh__support');
    let target = document.querySelector(button.hash);

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
});

