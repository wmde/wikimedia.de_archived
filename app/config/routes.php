<?php
/**
 * Copyright 2013 David Persson. All rights reserved.
 * Copyright 2016 Atelier Disko. All rights reserved.
 *
 * Use of this source code is governed by the AGPL v3
 * license that can be found in the LICENSE file.
 */

namespace app\config;

// use base_core\extensions\net\http\ClientRouter;
use lithium\action\Response;
use lithium\net\http\Router;

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
	Router::connect('/change-locale/{:locale}', 'Pages::change_locale');

	Router::connect('/{:locale:(de|en)}/{:args}', [], [
		'continue' => true,
		'defaults' => ['locale' => PROJECT_LOCALE],
		'persist' => ['controller', 'locale']
	]);

	Router::connect('/', 'Pages::home');

	Router::connect('/{:page:(transparenz|satzung|impressum)}', 'Pages::dynamic');

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
	//

	// Deprecated / BC

	// The `/imprint` route has been defined for the launch of the MVP in January '18.
	// After adding more sub pages it became clear, we'd like to use german named route
	// segments. Remote this route once all outside links have been updated.
	Router::connect('/imprint', [], function($request) {
		return new Response(['status' => 302, 'location' => '/impressum']);
	});
});

?>