<?php

// The default application layout.

use lithium\util\Inflector;

?>
<!doctype html>
<html lang="<?= strtolower(str_replace('_', '-', $locale)) ?>">
	<head>
		<!-- Basics -->
		<?php echo $this->html->charset() ?>
		<link rel="icon" href="<?= $this->assets->url('/app/ico/app.png') ?>">

		<!-- SEO -->
		<?php echo $this->seo->title() ?>
		<?php echo $this->seo->description() ?>

		<!-- Compatibility -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<!-- Styles -->
		<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
		<?php
			$styles = array_merge(
				$this->assets->availableStyles('base'),
				$this->assets->availableStyles('view'),
				$this->assets->availableStyles('layout')
			);
		?>
		<?php echo $this->assets->style($styles) ?>
		<?php echo $this->styles() ?>

		<!-- Global Application Object Definition -->
		<script>
			App = <?php echo json_encode($app, JSON_PRETTY_PRINT) ?>
		</script>

		<!-- Scripts -->
		<?php
			$scripts = array_merge(
				[
					'https://cdn.polyfill.io/v2/polyfill.min.js?features=es6&rum=0',
					'/app/js/require'
				],
				$this->assets->availableScripts('base'),
				$this->assets->availableScripts('view'),
				$this->assets->availableScripts('layout')
			);
		?>
		<?php echo $this->assets->script($scripts) ?>
		<?php echo $this->scripts() ?>

		<?php if (!PROJECT_HONOR_DNT || !$this->_request->is('dnt')): ?>
			<!-- Tracking -->
			<?php if (PROJECT_GA): ?>
				<?=$this->_render('element', 'ga') ?>
			<?php endif ?>
		<?php endif ?>

		<!-- Dynamically added -->
	</head>
	<?php
		$classes = ['layout-' . $this->_config['layout']];

		if ($authedUser) {
			$classes[] = 'user-authed';

		}
		if (isset($device)) {
			foreach ($device as $name => $flag) {
				if (is_bool($flag) && $flag ) {
					$classes[] = 'device-' . strtolower(Inflector::slug($name));
				} elseif (is_string($flag)) {
					$classes[] = 'device-' . strtolower(Inflector::slug($name)) . '-' . strtolower($flag);
				}
			}
		}
		if (isset($extraBodyClasses)) {
			$classes = array_merge($classes, $extraBodyClasses);
		}
	?>
	<body class="<?= implode(' ', $classes) ?>">
		<?= $this->_render('element', 'header', compact('authedUser', 'nav')) ?>
		<?php echo $this->content() ?>
		<?= $this->_render('element', 'footer', compact('authedUser', 'nav')) ?>
	</body>
</html>