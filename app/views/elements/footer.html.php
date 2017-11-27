<?php

use base_core\base\Sites;

$site = Sites::current($this->_request);


$this->nav->add('footer', 'Impressum und Kontakt', 'Pages::imprint');
$this->nav->add('footer', 'Lizenzhinweise dieser Seite',  '#');
$this->nav->add('footer', 'Transparenz',  '#');
$this->nav->add('footer', 'Satzung',  '#');

?>
<footer class="mf">
	<div class="limit--20 center-column cp--h1 cp--b0-5">
		<div class="mf__upper cp--v1-25">
			<?= $this->html->link($site->title(), '/', [
				'class' => 'mf__logo logo logo--white logo--ir'
			]) ?>
		</div>
		<?= $this->nav->generate('footer', [
			'class' => 'mf__nav tm--alpha t--strong'
		]) ?>
	</div>
</footer>