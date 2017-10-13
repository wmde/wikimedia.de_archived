<?php

use base_core\base\Sites;

// The Sites class gives us access to Site objects, where each has a title and a FQDN.
// Each app can host multiple Sites if needed.
$site = Sites::current($this->_request);

// Usually we automatically add the application's name to the title so `$this->title('Lorem')`
// would result in `Lorem - App`. The home page is treated a little different, as to allowing
// claims and full control over the title. Thus `$this->title('App: Lorem')` will result in
// `App: Lorem`.
//
// @see app/views/layouts/default.html.php
// @see base_core\extensions\helper\Seo::title()
//
$this->title($site->title());

?>
<main class="home cp limit--normal">
	<h1 class="h--alpha">Home</h1>
	<p>
		Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
		tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
		vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd
		gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum
		dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
		invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero
		eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no
		sea takimata sanctus est Lorem ipsum dolor sit amet.
	</p>
	<p>
		Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
		tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
		dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
		invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero
		eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no
		sea takimata sanctus est Lorem ipsum dolor sit amet.
	</p>
</main>