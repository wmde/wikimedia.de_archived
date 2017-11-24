<?php

use base_core\base\Sites;

// The Sites class gives us access to Site objects, where each has a title and a FQDN.
// Each app can host multiple Sites if needed.
$site = Sites::current($this->_request);

// Use the `nav` helper to generate a menu easily. The helper is
// autoloaded from base_core\extensions\helper\Nav. For more
// information, see the API documentation in the helper class.
//
// $this->nav->add('main', 'News', 'Posts::index');
// ...
// echo $this->nav->generate('main')

?>
<header class="mh">
	<div class="limit--20 cp--h1 center-column">
		<div class="mh__upper">
			<div class="mh__new-notice">
				Dies ist die neue Seite von Wikimedia.<br>
				<?= $this->html->link('Hier geht’s zur alten Seite', '/wiki') ?>
			</div>
			<a href="#support">
				<div>Unterstützte</div>
				<div>Freies Wissen</div>
			</a>
		</div>
		<div class="mh__lower">
			<h1 class="mh__logo-wrap">
				<?= $this->html->link($site->title(), '/', [
					'class' => 'mh__logo logo'
				]) ?>
			</h1>
		</div>
	</div>
</header>