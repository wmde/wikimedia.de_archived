<?php
/**
 * Copyright 2013 David Persson. All rights reserved.
 *
 * Use of this source code is governed by a BSD-style
 * license that can be found in the LICENSE file.
 */

// Instead of bootstrapping the app by a bootstrap.php file inside
// the app directory we'll use the base_core's bootstrap to perform
// the process. Assumes the module resides inside
// `app/libraries/base_core`.
require dirname(__DIR__) . '/libraries/base_core/config/bootstrap.php';

// Dispatch the process, but also disable draining POST'ed streams.
// This is required for dealing with very large uploads.
echo lithium\action\Dispatcher::run(new lithium\action\Request(['drain' => false]));

?>