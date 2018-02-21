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

foreach (explode(' ', PROJECT_LOCALES) as $_locale) {
	$this->nav->add('locale', $this->G11n->name($_locale), [
		'controller' => 'Pages',
		'action' => 'change_locale',
		'locale' => $_locale
	], [
		// $locale is auto-injected into the layout as the effective locale.
		'active' => $isActive = $_locale === $locale
	]);
}

?>
<header class="mh">
	<div class="mh__inner clearfix limit--20 cp--h1 center-column">
		<h1 class="mh__logo-wrap logo--ir cm--r1">
			<?= $this->html->link($site->title(), '/', [
				'class' => 'mh__logo logo logo--black'
			]) ?>
		</h1>
		<?php if ($this->_config['template'] === 'home'): ?>
			<div class="mh__new-notice ts--beta">
				<div class="wh__new-notic-inner">
					<?= $this->html->link($t('Hier geht es zur bisherigen Website'), '/wiki/Hauptseite', [
						'class' => 'link link--green'
					]) ?>
					<br>
					<?= $t("von Wikimedia Deutschland") ?>
				</div>
			</div>
		<?php endif ?>
		<a
			href="/#cta"
			class="mh__support cp--0-5"
			role="button"
			aria-label="<?= $t("Springe zum Bereich 'Unterstütze Freies Wissen'") ?>"
		>
			<div class="wh__support-inner">
			<div class="tm--gamma t--caps t--strong"><?= $t("Unterstütze") ?></div>
				<div class="tm--delta"><?= $t("Freies Wissen") ?></div>
			</div>
		</a>
		<div class="nav-locale-toggle ts--alpha">
			<div class="nav-locale-wrapper">
				<div class="nav-locale-toggle__locale"><?= $locale ?></div>
				<?= $this->nav->generate('locale', ['class' => 'nav-locale']) ?>
			</div>
		</div>
	</div>
</header>