/*!
 * Copyright 2017 Atelier Disko. All rights reserved.
 *
 * Use of this source code is governed by the AGPL v3
 * license that can be found in the LICENSE file.
 */

require([
    'components/newsSlider',
    'components/team',
    'components/fields',
    'domready!'
  ], function(
    NewsSlider,
    Team,
    Fields
  ) {
  'use strict';

  let $ = document.querySelectorAll.bind(document);
  let $1 = document.querySelector.bind(document);

  let newsSlider = new NewsSlider();
  let team = new Team();
  let fields = new Fields();

  newsSlider.mount($1('.news-slider'));
  team.mount($1('.team'));
  fields.mount($1('.fields'));
});
