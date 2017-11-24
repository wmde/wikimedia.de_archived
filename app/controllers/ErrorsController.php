<?php
/**
 * Copyright 2013 David Persson. All rights reserved.
 * Copyright 2016 Atelier Disko. All rights reserved.
 *
 * Use of this source code is governed by the AGPL v3
 * license that can be found in the LICENSE file.
 */

namespace app\controllers;

// Status response codes are automatically set. To implement support
// for specific errors uncomment one of the actions below and create
// a template for it.
class ErrorsController extends \lithium\action\Controller {

	protected $_render = [
		'layout' => 'error'
	];

	// Fallback if an error occurs but action not defined here.
	public function generic() {
		if ($this->response->status['code'] === 503) {
			$this->response->headers['Retry-After'] = 3600;
		}
	}

	// Not Authorized
	// public function fourohthree() {}

	// Not Found
	// public function fourohfour() {}

	// Internal Server Error
	// public function fiveohoh() {}

	// Maintenance, will be retried by client in one hour.
	// public function fiveohthree() {
	//	$this->response->headers['Retry-After'] = 3600;
	// }
}

?>