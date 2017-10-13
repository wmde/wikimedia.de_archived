<?php
/**
 * Copyright 2013 David Persson. All rights reserved.
 * Copyright 2016 Atelier Disko. All rights reserved.
 *
 * Use of this source code is governed by a BSD-style
 * license that can be found in the LICENSE file.
 */

namespace app\config;

use lithium\net\http\Router;
// use base_core\extensions\net\http\ClientRouter;

// Defines default `'app'` route scope. Route scopes allow to host different applications
// from within our app i.e. the original app as well as a blog on a different domain. When
// creating another scope be sure to make all scopes distinctable, by using the '`host'`
// key on each scope.
Router::attach('app', [
	// 'absolute' => true, // needed if using host matching
	// 'host' => '{:subdomain:(www.)?}' . PROJECT_DOMAIN,
	'library' => null
]);

// Defines default routes in the app scope. Read more about how to define routes at
// http://li3.me/docs/manual/controllers/routing.md
Router::scope('app', function() {
	Router::connect('/', 'Pages::home');

	Router::connect('/imprint', 'Pages::imprint');
	Router::connect('/404', 'Errors::generic');
	Router::connect('/robots.txt', [
		'controller' => 'Pages',
		'action' => 'robots',
		'type' => 'text'
	]);

	// The following code connects an API only controller action and makes it available to
	// the JavaScript Router by using the `ClientRouter´. See `assets/js/router.js` for
	// how resolve routes within client side scripts. API controller actions are prefixed
	// with `api_`, as different logic is needed for rendering views and API responses.
	// Router::connect('/api/cart', 'Carts::api_view', ['defaults' => ['type' => 'json']]);
	// ClientRouter::provide('carts:view', 'Carts::api_view');
});

?>