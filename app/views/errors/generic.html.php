<main class="error-page error-page--generic limit--normal cp">
	<h1 class="t--underlined">
		<span class="error-page__code"><?= $this->_response->status['code'] ?></span>
		<span class="error-page__message"><?= $this->title($this->_response->status['message']) ?></span>
	</h1>
	<div class="error-page__reason t--beta">
		Ooops, this shouldn't have happened.
	</div>
	<div class="error-page__id">
		The ID for this error is
		<strong>
		<?php if (isset($errorId)): ?>
			<?= $errorId ?>
		<?php else: ?>
			(not available)
		<?php endif ?>
		</strong>
	</div>
	<div class="error-page__try">
		<?= $this->html->link(
			'Go back to frontpage',
			'/',
			['class' => 'button']
		) ?>
	</div>
</main>