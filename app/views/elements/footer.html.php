<?php

use base_core\base\Sites;
use base_core\extensions\cms\Settings;
use lithium\util\Text;

$contact = Settings::read('contact');
$site = Sites::current($this->_request);

$this->nav->add('footer', 'Imprint', 'Pages::imprint');
$this->nav->add('footer', 'Admin–Panel', [
	'library' => 'base_core',
	'controller' => 'Users',
	'action' => 'session',
	'admin' => true
], ['scope' => 'admin']);

?>
<footer>
	<div class="limit--normal cp">
		<?= $this->_render('element', 'copyright', [
			'holder' => $this->html->link(
				$site->title(),
				['controller' => 'pages', 'action' => 'home']
			)
		]) ?>

		<?php echo Text::insert('Website by {:name}', [
			'name' => $this->html->link(
				$contact['exec']['organization'],
				$contact['exec']['website'],
				['target' => 'new']
			)
		]) ?>

		<?= $this->nav->generate('footer') ?>
	</div>
</footer>