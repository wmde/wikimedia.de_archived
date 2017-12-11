<?php
/**
 * Copyright 2017 Atelier Disko. All rights reserved.
 *
 * Use of this source code is governed by the AGPL v3
 * license that can be found in the LICENSE file.
 */

namespace app\models;

use Composer\Spdx\SpdxLicenses;

// A reference has following fields:
//
// - title
// - author
// - url
// - license, a license identifier string, see https://spdx.org/licenses/ for valid
//   license strings.
//
class References extends \base_core\models\Base {

	protected $_meta = [
		'connection' => false
	];

	protected static $_licenses = null;

	// Initializer.
	public static function init() {
		static::$_licenses = new SpdxLicenses();
	}

	// Returns an array of information of the license.
	public function license($entity) {
		$result = static::$_licenses->getLicenseByIdentifier($entity->license);

		if (!$result) {
			return false;
		}
		// Remap to our data structure, pretend as if this is a database
		// result. We might later turn this into a real entity object.
		return [
			'name' => $entity->license,
			'title' => $result[0],
			'is_osi_certified' => $result[1],
			'url' => $result[2]
		];
	}
}

References::init();

?>