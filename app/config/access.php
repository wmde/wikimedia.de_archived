<?php
/*!
 * Copyright 2013 David Persson. All rights reserved.
 * Copyright 2016 Atelier Disko. All rights reserved.
 *
 * Use of this source code is governed by the AGPL v3
 * license that can be found in the LICENSE file.
 */

namespace app\config;

use base_core\security\Gate;
use li3_access\security\Access;

// The editor role can log into the admin panel and edit content there, but cannot i.e.
// add new users or clean media files.
Gate::registerRole('editor', ['panel']);

// Role based access control (RBAC) can be further controlled, by registering new rights
// or roles while assigning rights to them. You can than - anywhere inside your application -
// check for a rights of the current user by using `Gate::checkRight('dance')`.

// Gate::registerRight('dance');
// Gate::registerRole('guest', ['dance'])

// Here we define access rules for the application. By default any action inside the app
// can be accessed. Please read the li3_access documentation for information on how to
// define rules:
//
// https://github.com/atelierdisko/li3_access#resources-adapter

Access::add('app', 'fallthrough', [
	'resource' => '*',
	'rule' => true
]);

?>