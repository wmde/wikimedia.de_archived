<?php

use base_core\extensions\cms\Settings;

$site = Settings::read('site');

?>
<?= $site['title'] ?>

<?php echo str_repeat('-', strlen($site['title'])) ?>

<?php echo $this->content() ?>


--
<?= $site['title'] ?>