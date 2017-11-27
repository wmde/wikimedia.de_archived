/*!
 * Copyright 2017 Atelier Disko. All rights reserved.
 *
 * Use of this source code is governed by the AGPL v3
 * license that can be found in the LICENSE file.
 */

require(['components/newsSlider', 'domready!'], function(NewsSlider) {
  'use strict';

  let $ = document.querySelectorAll.bind(document);
  let $1 = document.querySelector.bind(document);

  let newsSlider = new NewsSlider();

  newsSlider.mount($1('.news'));
});
