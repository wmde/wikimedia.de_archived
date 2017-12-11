<?php
/**
 * Copyright 2013 David Persson. All rights reserved.
 * Copyright 2016 Atelier Disko. All rights reserved.
 *
 * Use of this source code is governed by the AGPL v3
 * license that can be found in the LICENSE file.
 */

namespace app\controllers;

use indexed\Robots;
use cms_post\models\Posts;
use cms_team\models\TeamMembers;
use app\models\References;

class PagesController extends \lithium\action\Controller {

	public function home() {
		$posts = Posts::find('all', [
			'conditions' => [
				'is_published' => true,
				'is_promoted' => true
			],
			// Show newest first, fall back to sorting by created date, when
			// published is not available (it will be - usually).
			'order' => [
				'published' => 'DESC',
				'created' => 'DESC'
			]
		]);

		// Team members are manually sorted.
		$teamMembers = TeamMembers::find('all', [
			'conditions' => [
				'is_published' => true
			],
			'order' => [
				'order' => 'ASC'
			]
		]);

		// List static references of the page.
		$references = [
			'hero' => References::create([
				'name' => 'hero',
				'author' => 'Inga Israel',
				'url' => 'https://commons.wikimedia.org/wiki/Main_Page#/media/File:Munich_Subway_Station_Gro%C3%9Fhadern_02.jpg',
				'license' => 'CC-BY-SA-3.0'
			]),
			'mission' => References::create([
				'name' => 'mission',
				'author' => 'Foo bar',
				'url' => 'https://commons.wikimedia.org/wiki/Main_Page#/media/File:Munich_Subway_Station_Gro%C3%9Fhadern_02.jpg',
				'license' => 'CC-BY-SA-3.0'
			])
		];

		return compact('posts', 'teamMembers', 'references');
	}

	public function imprint() {}

	// Allows to advice crawler behavior. By default allows any crawler to crawl anything.
	// Do not block access to media or assets as they are needed to render a preview of
	// the site or for image search.
	//
	// For usage see https://github.com/davidpersson/indexed
	//
	// Security: Do not block access to /admin as that would
	//           give attackers a hint where to look for. /admin
	//           should not be accessible by crawlers already.
	public function robots() {
		$robots = new Robots();
		$robots->allow('/');
		return compact('robots');
	}
}

?>