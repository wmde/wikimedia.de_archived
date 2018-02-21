<?php

extract([
	// A collection of Reference entities.
	'data' => []
], EXTR_SKIP);

?>
<div class="refs-foldout ts--beta">
	<div class="limit--20 center-column cp--h1 cp--v1">
	<a class="refs-foldout__close" href="#close"><?= $t("Referenzliste schließen") ?></a>

		<div class="refs-foldout__content">
			<?= $this->references->index() ?>
		</div>
	</div>
</div>