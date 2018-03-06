<?php

$this->title($item->title);
$this->editor->parse($item->body, ['mediaVersion' => 'fix20']);

?>
<main class="dynamic-page dynamic-page--<?= $page ?> limit--20 center-column cp--h1 cp--t3-5 cp--b2">
	<div class="limit--12 cp--h1 cp--t0-5 cp--b1 sc--white">
		<?= $this->html->link($t('Zur Startseite'), '/', [
			'class' => 'link--green ts--alpha t--strong'
		]) ?>
		<h1 class="dynamic-page__title tl--beta t--strong cp--t0-5"><?= $item->title ?></h1>
		<div class="dynamic-page__body tm--beta">
			<?php echo $item->body ?>
		</div>
	</div>
</main>