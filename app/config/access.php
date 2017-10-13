<?php
/*!
 * Copyright 2013 David Persson. All rights reserved.
 * Copyright 2016 Atelier Disko. All rights reserved.
 *
 * Use of this source code is governed by a BSD-style
 * license that can be found in the LICENSE file.
 */

namespace app\config;

use li3_access\security\Access;

// Here we define access rules for the application. By default any action inside the app
// can be accessed. Please read the li3_access documentation for information on how to
// define rules:
// https://github.com/atelierdisko/li3_access#resources-adapter

Access::add('app', 'fallthrough', [
	'resource' => '*',
	'rule' => true
]);

?>