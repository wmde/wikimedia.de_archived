<?php
/**
 * Copyright 2016 Atelier Disko. All rights reserved.
 *
 * Use of this source code is governed by the AGPL v3
 * license that can be found in the LICENSE file.
 */

namespace app\config;

use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Handler\JsonResponseHandler;
use Whoops\Handler\PlainTextHandler;
use Whoops\Util\Misc;

// This file is included when debugging (via PROJECT_DEBUG) has been enabled. The tools
// used in here are usually development depedencies (listed under require-dev in
// app/composer.json).

$whoops = new Run();

if (PHP_SAPI === 'cli') {
	$whoops->pushHandler(new PlainTextHandler());
} elseif (Misc::isAjaxRequest()) {
	$whoops->pushHandler(new JsonResponseHandler());
} else {
	$whoops->pushHandler(new PrettyPageHandler());
}
$whoops->register();

?>