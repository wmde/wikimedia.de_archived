<?php

use base_core\base\Sites;

$site = Sites::current($this->_request);


// Footer Nav - Association
$this->nav->add('footer-association', $t('Impressum und Kontakt'), 'Pages::imprint');
if ($hasReferences) {
	$this->nav->add('footer-association', $t('Lizenzhinweise dieser Seite'),  '#refs-foldout', [
		'class' => 'toggle-refs-foldout'
	]);
}
$this->nav->add('footer-association', $t('Transparenz'),  'https://www.wikimedia.de/wiki/Transparenz');
$this->nav->add('footer-association', $t('Satzung, Ordnungen & Beschlüsse'),  'https://www.wikimedia.de/wiki/Satzung');

// Footer Nav - Channels
$this->nav->add('footer-channels', $t('Unser Blog'), 'https://blog.wikimedia.de/');
$this->nav->add('footer-channels', 'Facebook', 'https://www.facebook.com/WMDEeV');
$this->nav->add('footer-channels', 'Twitter', 'https://twitter.com/wikimediade');

?>
<footer class="mf">
	<div class="limit--20 center-column cp--h1 cp--b0-5">
		<div class="mf__column cp--v1-25">
			<?= $this->html->link($site->title(), '/', [
				'class' => 'mf__logo logo logo--white logo--ir'
			]) ?>
		</div>
		<div class="mf__column">
			<div class="mf__column__inner cp--v1-25">
				<div class="mf__column-title ts--alpha"><?= $t("Verein") ?></div>
				<?= $this->nav->generate('footer-association', [
					'class' => 'mf__nav ts--alpha'
				]) ?>
			</div>
			<div class="mf__column__inner cp--v1-25">
				<div class="mf__column-title ts--alpha"><?= $t("Kanäle") ?></div>
				<?= $this->nav->generate('footer-channels', [
					'class' => 'mf__nav ts--alpha'
				]) ?>
			</div>
		</div>
	</div>
</footer>