<?php

use base_core\base\Sites;
use base_core\extensions\cms\Settings;
use lithium\util\Text;

$contact = Settings::read('contact');
$site = Sites::current($this->_request);

?>
<footer>
	<div class="limit--normal cp">
		<?= $this->_render('element', 'copyright', [
			'holder' => $this->html->link(
				$site->title(),
				['controller' => 'pages', 'action' => 'home']
			)
		]) ?>

		<?php echo Text::insert('Website by {:name}.', [
			'name' => $this->html->link(
				$contact['exec']['organization'],
				$contact['exec']['website'],
				['target' => 'new']
			)
		]) ?>

		<?= $this->html->link('Imprint', 'Pages::imprint') ?>.
	</div>
</footer>