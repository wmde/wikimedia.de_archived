<?php
/**
 * Copyright 2013 David Persson. All rights reserved.
 * Copyright 2016 Atelier Disko. All rights reserved.
 *
 * Use of this source code is governed by the AGPL v3
 * license that can be found in the LICENSE file.
 */

namespace app\controllers;

use base_core\extensions\net\http\NotFoundException;
use base_reference\models\References;
use cms_content\models\Blocks;
use cms_content\models\Pages;
use cms_post\models\Posts;
use cms_team\models\TeamMembers;
use indexed\Robots;
use lithium\action\Request;
use lithium\core\Environment;
use lithium\net\http\Router;

class PagesController extends \lithium\action\Controller {

	public function home() {
		$posts = Posts::find('all', [
			'conditions' => [
				'is_published' => true
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
				'order' => 'DESC'
			]
		]);

		// List static references of the page.
		$references = [
			'hero' => References::create([
				'name' => 'hero',
				'authors' => 'Inga Israel',
				'title' => 'Vision Freies Wissen Illustration',
				'source' => 'https://commons.wikimedia.org/wiki/File:Vision_Freies_Wissen_Illustration.png',
				'license' => 'CC-BY-SA-4.0'
			]),
			'mission' => References::create([
				'name' => 'mission',
				'authors' => 'René Zieger',
				'title' => 'Abraham Taherivand WMDE',
				'source' => 'https://commons.wikimedia.org/wiki/File:Abraham_Taherivand_WMDE.jpg',
				'license' => 'CC-BY-SA-4.0',
				'changes' => 'Beschnitt von Atelier Disko'
			])
		];

		$blocks = [
			'vision' => null,
			'mission' => null,
			'fields.support' => null,
			'fields.dev' => null,
			'fields.know' => null
		];
		foreach ($blocks as $regionFragment => &$item) {
			$item = Blocks::find('first', [
				'conditions' => [
					'is_published' => true,
					'region' => "home.{$regionFragment}",
				],
				'translate' => Environment::get('locale')
			]);
		}
		$locale = Environment::get('locale');
		return compact('posts', 'teamMembers', 'references', 'blocks', 'locale');
	}

	public function dynamic() {
		$item = Pages::find('first', [
			'conditions' => [
				'is_published' => true,
				'title' => $this->request->page
			],
			'translate' => Environment::get('locale')
		]);
		if (!$item) {
			throw new NotFoundException();
		}
		return compact('item');
	}

	public function imprint() {}

	// Changes locale encoded in route to requested locale and redirects
	// to the corresponding page.
	public function change_locale() {
		$r = new Request([
			'url' => parse_url($this->request->referer(), PHP_URL_PATH)
		]);
		$r = Router::parse($r);

		return $this->redirect([
			'locale' => $this->request->locale
		] + $r->params);
	}

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