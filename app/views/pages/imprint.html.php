<?php

use base_core\extensions\cms\Settings;

$this->title('Imprint');
$contact = Settings::read('contact');

?>
<main class="imprint limit--normal cp">
	<h1 class="h--alpha">Imprint</h1>

	<section class="imprint__contact">
		<h1 class="h--beta">
			Contact
			<span class="imprint__accordance">
				according to §5 <abbr title="Telemediengesetz">TMG</abbr>
			</span>
		</h1>
		<?=$this->_render('element', 'contact', ['item' => $contact['default']]) ?>
	</section>

	<section class="imprint__credits">
		<h1 class="h--beta">Website</h1>
		<?=$this->_render('element', 'contact', ['item' => $contact['exec']]) ?>
	</section>
</main>