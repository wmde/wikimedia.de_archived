<?php

// The contact element (ce) provides markup for the very common
// task of rendering formal contact information. Using this
// element has the benefit of microdata by default.

// In case not all parts of the address should be visible,
// use CSS to hide these elements selectively.

// General options for this element.
extract([
	'displayName' => null,
], EXTR_SKIP);

// Data structure.
$item += [
	'name' => null,
	'organization' => null,
	'address_line_1' => null,
	'address_line_2' => null,
	'postal_code' => null,
	'locality' => null,
	'dependent_locality' => null,
	'country' => null,
	'phone' => null,
	'email' => null,
	'fax' => null,
	'website' => null
];

// Remap country
$map = [
	'DE' => 'Germany'
];
if (isset($map[$item['country']])) {
	$item['country'] = $map[$item['country']];
}

?>
<?php if (!empty($item['organization'])): ?>
	<article class="ce" itemscope itemtype="https://schema.org/Organization">
<?php else: ?>
	<article class="ce" itemscope itemtype="https://schema.org/Person">
<?php endif ?>
	<div class="ce__main">
		<?php if ($displayName): ?>
			<div class="ce__display-name">
				<?= $displayName ?>
				<meta itemprop="name" value="<?= $item['name'] ?: $item['organization']?>" />
			</div>
		<?php else: ?>
			<?php if ($item['organization']): ?>
				<div class="ce__organization" itemprop="name"><?= $item['organization'] ?></div>
			<?php endif ?>
			<?php if ($item['name']): ?>
				<div class="ce__name" itemprop="name"><?= $item['name'] ?></div>
			<?php endif ?>
		<?php endif ?>
		<?php if ($item['address_line_1'] || $item['postal_code'] || $item['country']): ?>
			<div class="ce__address" itemprop="address" itemtype="http://data-vocabulary.org/Address" itemscope>
				<?php if ($item['address_line_1']): ?>
					<span class="ce__address-line" itemprop="street-address"><?= $item['address_line_1'] ?></span><br>
				<?php endif ?>
				<?php if ($item['address_line_2']): ?>
					<span class="ce__address-line" itemprop="street-address"><?= $item['address_line_2'] ?></span><br>
				<?php endif ?>
				<?php if ($item['postal_code']): ?>
					D–<span class="ce__postal-code" itemprop="postal-code"><?= $item['postal_code']?></span>
				<?php endif ?>
				<?php if ($item['locality']): ?>
					<span class="ce__locality" itemprop="locality"><?= $item['locality'] ?></span>
				<?php endif ?>
			</div>
		<?php endif ?>
	</div>
	<?php if ($item['phone'] || $item['email'] || $item['website']): ?>
		<div class="ce__extra">
			<?php if ($item['phone']): ?>
			<div class="ce__phone">
				<span class="ce__label">Phone</span>
				<span class="ce__phone-number" itemprop="tel"><?= $item['phone'] ?></span>
			</div>
			<?php endif ?>

			<?php if ($item['fax']): ?>
			<div class="ce__fax">
				<span class="ce__label">Fax</span>
				<span class="ce__fax-number" ><?= $item['fax'] ?></span>
			</div>
			<?php endif ?>

			<?php if ($item['email']): ?>
			<div class="ce__email">
				<span class="ce__label">Email</span>
				<?= $this->html->link($item['email'], "mailto:{$item['email']}", [
					'class' => 'ce__email-address'
				]) ?>
			</div>
			<?php endif ?>

			<?php if ($item['website']): ?>
			<div class="ce__website">
				<span class="ce__label">Website</span>
				<a class="ce__website-url" itemprop="url" href="<?= $item['website'] ?>" target="new">
					<?= parse_url($item['website'], PHP_URL_HOST)?>
				</a>
			</div>
			<?php endif ?>
		</div>
	<?php endif ?>
</article>