<?php

$this->title($item->title);

?>
<main class="dynamic-page">
	<h1><?= $item->title ?></h1>
	<div class="dynamic-page__body">
		<?php echo $item->body ?>
	</div>
</main>