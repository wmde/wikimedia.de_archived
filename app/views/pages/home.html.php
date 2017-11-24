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
<main class="home">
	<section class="hero limit--14 cp--h1 center-column">
		<div class="hero__text">
			Lorem: Unsere Vision ist eine Welt, in der jeder Mensch am Wissen der Menschheit
			teilhaben, es nutzen und mehren kann.
		</div>
	</section>
	<section class="mission cp--v2 center-column">
		<h1 class="mission__headline">Mission</h1>
		<div class="mission__text">
			Lorem Wir setzen uns für Freies Wissen ein, um die Chancengleichheit beim Zugang zu Wissen
			und Bildung zu fördern ipsum!
		</div>
	</section>
</main>