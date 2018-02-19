<?php
/**
 * Copyright 2013 David Persson. All rights reserved.
 * Copyright 2016 Atelier Disko. All rights reserved.
 *
 * Use of this source code is governed by the AGPL v3
 * license that can be found in the LICENSE file.
 */

namespace app\config;

use cms_content\cms\content\Regions;

// Here content regions can be defined. Regions are "dynamic" areas
// or partials inside the site. Each region needs a name,
// title and type. Types are defined inside the cms_content
// module and can be currently one of: text, richtext, number,
// money or media.

Regions::register('home.vision', [
	'title' => 'Home > Vision',
	'type' => 'richtext',
	'access' => PROJECT_DEBUG ? 'any' : 'nobody'
]);
Regions::register('home.mission', [
	'title' => 'Home > Mission',
	'type' => 'richtext',
	'access' => PROJECT_DEBUG ? 'any' : 'nobody'
]);
Regions::register('home.fields.support', [
	'title' => 'Home > Handlungsfelder > Unterstützen',
	'type' => 'richtext',
	'access' => PROJECT_DEBUG ? 'any' : 'nobody'
]);
Regions::register('home.fields.dev', [
	'title' => 'Home > Handlungsfelder > Software Entwickeln',
	'type' => 'richtext',
	'access' => PROJECT_DEBUG ? 'any' : 'nobody'
]);
Regions::register('home.fields.know', [
	'title' => 'Home > Handlungsfelder > Freies Wissen',
	'type' => 'richtext',
	'access' => PROJECT_DEBUG ? 'any' : 'nobody'
]);

?>