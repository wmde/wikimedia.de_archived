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
	<div class="mh__inner clearfix limit--20 cp--h1 center-column">
		<h1 class="mh__logo-wrap logo--ir cm--r1">
			<?= $this->html->link($site->title(), '/', [
				'class' => 'mh__logo logo logo--black'
			]) ?>
		</h1>
		<div class="mh__new-notice ts--beta">
			<div class="wh__new-notic-inner">
				<?= $this->html->link('Hier geht es zur alten Website', '/wiki', [
					'class' => 'link link--green'
				]) ?>
				<br>
				von Wikimedia Deutschland
			</div>
		</div>
		<a href="#support" class="mh__support cp--0-5 ">
			<div class="wh__support-inner">
				<div class="tm--gamma t--caps t--strong">Unterstütze</div>
				<div class="tm--delta">Freies Wissen</div>
			</div>
		</a>
	</div>
</header>