/*!
 * Copyright 2017 Atelier Disko. All rights reserved.
 *
 * Use of this source code is governed by the AGPL v3
 * license that can be found in the LICENSE file.
 */

require([
  'components/news',
  'components/team',
  'components/fields',
  'hammer',
  'modernizr',
  'domready!'
], function(
  News,
  Team,
  Fields,
  Hammer,
  Modernizr
) {
  'use strict';

  let $ = document.querySelectorAll.bind(document);
  let $1 = document.querySelector.bind(document);

  let news = new News();
  let team = new Team();
  let fields = new Fields();

  news.mount($1('.news'));
  team.mount($1('.team'));
  fields.mount($1('.fields'));

  // Add news slider swipe control
  if (Modernizr.touchevents) {
    let swipeElement = new Hammer( document.getElementById('news-stage') );
    swipeElement.on( 'swipeleft', news.previous );
    swipeElement.on( 'swiperight', news.next );
  }
});
