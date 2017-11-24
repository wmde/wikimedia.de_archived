#!/usr/bin/env php
<?php
/**
 * Copyright 2013 David Persson. All rights reserved.
 * Copyright 2016 Atelier Disko. All rights reserved.
 *
 * Use of this source code is governed by the AGPL v3
 * license that can be found in the LICENSE file.
 */

$projectPath = dirname(__DIR__);

// Tighten security, by dropping privileges and using a private temporary directory. We
// cannot use sys_temp_dir as it can only be set inside the system configuration.
// sys_get_temp_dir() will however pick up the TMPDIR env variable.
putenv('TMPDIR=' . $projectPath . '/tmp');
ini_set('upload_tmp_dir', $projectPath . '/tmp');
ini_set('open_basedir', $projectPath . ':/dev/urandom');

if (!file_exists($file = dirname(__DIR__) . '/app/libraries/base_core/config/bootstrap.php')) {
	die("Could not find file `{$file}`,\nmake sure you've installed all application dependencies via composer.\n");
}

// Instead of bootstrapping the app by a bootstrap.php file inside
// the app directory we'll use the base_core's bootstrap to perform
// the process. Assumes the module resides inside
// `app/libraries/base_core`.
require $file;

exit(\lithium\console\Dispatcher::run(new \lithium\console\Request())->status);

?>