<?php
/**
 * Copyright 2013 David Persson. All rights reserved.
 * Copyright 2016 Atelier Disko. All rights reserved.
 *
 * Use of this source code is governed by the AGPL v3
 * license that can be found in the LICENSE file.
 */

namespace app\config;

use base_core\base\Sites;
use base_core\extensions\cms\Settings;
use base_media\models\MediaVersions;

//
// Sites
//
Sites::register(PROJECT_DOMAIN, [
	'title' => 'Wikimedia Deutschland e.V.',
	'fqdn' => PROJECT_DOMAIN
]);

//
// Contacts
//
// The `'default'` is the most common and should be always set. The `'exec'` contact
// is made available by default and contains the contact info of the agency creating
// the site.
//
// Other common contact types include `'billing'`, `'support'`. Custom ones can be added
// at any time and retrieved via `Settings::read('contact.xxxx')` wherever you want.
//
// Each contact supports the following fields:
// - `'organization'` and/or `'name'` (if its not an org)
// - `'address_line_1'`
// - `'address_line_2'`
// - `'postal_code'`
// - `'locality'` (the city)
// - `'dependent_locality'` (i.e. the suburb)
// - `'country'`
// - `'email'`
// - `'fax'`
// - `'website'`
Settings::register('contact.default', [
	'organization' => 'Wikimedia Deutschland e.V.',
	'email' => 'mail@example.com'
]);
Settings::register('contact.exec', [
	'organization' => 'Atelier Disko UG (haftungsbeschränkt) & Co. KG',
	'address_line_1' => 'Weidenallee 10b',
	'locality' => 'Hamburg',
	'postal_code' => '20357',
	'country' => 'DE',
	'website' => 'https://atelierdisko.de',
	'email' => 'info@atelierdisko.de',
]);

Settings::write('contactSupportUrl', 'https://atelierdisko.de/clients/tickets/add');

//
// Services
//
// Settings::write('service.googleAnalytics.default', [
// 	'account' => 'UA-123456',
// 	'domain' => 'example.com',
// 	'useUniversalAnalytics' => true
// ]);

//
// Media
//
// Workaround beacause we do not have mm added to libraries, yet.
$sRGB = PROJECT_PATH . '/app/libraries/davidpersson/mm/data/sRGB_IEC61966-2-1_black_scaled.icc';

// Image and static versions.
$fix = [
	'colorSpace' => 'RGB',
	'colorProfile' => $sRGB,
	'colorDepth' => 8,
	'rotate' => true // enables auto-rotation by exif data
];
$fix00 = [
	'convert' => 'image/png',
	'compress' => 5.5,
	'strip' => ['8bim', 'app1', 'app12'],
	'fit' => [1200, 1200] // width, height
];

MediaVersions::registerAssembly('image', 'fix00', $fix00 + $fix);
// ... more versions can be added here.

?>