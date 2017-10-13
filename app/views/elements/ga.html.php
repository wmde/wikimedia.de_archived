<?php

// Google Analytics Element. Enables page view tracking and submission.
//
// Enables a partially undocumented anonymize feature to comply with
// EU laws. Works for both universal and old tracking.

use base_core\extensions\cms\Settings;

extract([
	// Hardcoded to use default analytics configuration.
	'name' => 'default'
], EXTR_SKIP);

$data = Settings::read('service.googleAnalytics');

if (empty($data[$name]['account'])) {
	throw new Exception('Google Analytics not configured correctly.');
}

?>
<?php if ($data[$name]['useUniversalAnalytics']): ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '<?php echo $data[$name]['account'] ?>', 'auto');
  ga('set', 'anonymizeIp', true);
  ga('send', 'pageview');

</script>
<?php else: ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?php echo $data[$name]['account'] ?>']);
  _gaq.push(['_gat._anonymizeIp']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<?php endif ?>