<?php
/**
 * Copyright 2011 David Persson. All rights reserved.
 * Copyright 2017 Atelier Disko. All rights reserved.
 *
 * Use of this source code is governed by a BSD-style
 * license that can be found in the LICENSE file.
 */

// Works without passing any options at all (except the `holder`), will make
// "smart" guesses. Allows customization by passing strings for `holder`, `object`
// or years for `begin` and `end`.
//
// Example Usage:
// ```
// $this->view()->render(
//     array('element' => 'copyright'),
//     array('holder' => 'James Brown')
// );
// ```
//
// Example Output:
// ```
// © 2011 James Brown. All rights reserved.
// ```

extract([
	'holder' => null,   // i.e. `'James Brown'`; required.
	'object' => null,   // Additional copyright property to prepend; optional.
	'begin' => null,    // The beginning year i.e. 2009; optional.
	'end' => null,      // The ending year i.e. 2011; optional.
	'minimal' => false,  // Leave out the `'All rights reserved.'` appendix.
	'rights' => 'All rights reserved.'
], EXTR_SKIP);

$end = date('Y');

if (!isset($begin) || $begin == $end) {
	$years = $end;
} elseif ($end - $begin == 1) {
	$years = "{$begin}, {$end}";
} else {
	$years = "{$begin} &ndash; {$end}";
}

?>
<div class="copyright">
	<?php if (isset($object)): ?>
		<?php echo sprintf('%1$s &copy; %2$s %3$s%4$s', ucfirst($object), $years, $holder, $minimal ? null : '.') ?>

	<?php else: ?>
		<?php echo sprintf('&copy; %1$s %2$s%3$s', $years, $holder, $minimal ? null : '.') ?>

	<?php endif ?>

	<?php if (!$minimal): ?>
		<span class="copyright__rights"><?= $rights ?></span>
	<?php endif ?>
</div>