<?php
/**
 * Copyright 2013 David Persson. All rights reserved.
 * Copyright 2016 Atelier Disko. All rights reserved.
 *
 * Use of this source code is governed by a BSD-style
 * license that can be found in the LICENSE file.
 */

namespace app\config;

use base_core\async\Jobs;

// To execute a certain task regularly, recurring jobs can be registered.
// These will be executed outside of the web environment similar to
// cronjobs. Application jobs should use the `'app:`' scope prefix.

// Jobs::recur('app:foo', function() {
// 	// Do something.
// }, [
// 	'frequency' => Jobs::FREQUENCY_LOW
// ]);

?>