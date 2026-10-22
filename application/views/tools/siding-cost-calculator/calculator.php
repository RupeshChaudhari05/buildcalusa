<?php defined('BASEPATH') OR exit('No direct script access allowed');

// value => [label, installed $ per sq ft, lifespan]
$materials = array(
	'vinyl'   => array('Vinyl', 6.00, '20–40 yrs'),
	'eng'     => array('Engineered wood (LP SmartSide type)', 7.00, '25–30 yrs'),
	'metal'   => array('Metal (steel or aluminum)', 8.50, '30–50 yrs'),
	'stucco'  => array('Stucco', 9.00, '50+ yrs'),
	'fiber'   => array('Fiber cement (Hardie type)', 9.50, '30–50 yrs'),
	'wood'    => array('Wood lap or cedar shingle', 10.00, '20–40 yrs'),
);

$num = function ($name, $label, $value, $u, $col = 'col-6', $step = 'any') {
	$units = array('len' => 'ft', 'area' => 'sq ft');
	echo '<div class="' . $col . '"><label class="form-label" for="' . $name . '">' . $label . '</label><div class="input-group">'
		. '<input class="form-control" type="number" id="' . $name . '" name="' . $name . '" value="' . $value . '" min="0" step="' . $step . '" inputmode="decimal" data-u="' . $u . '">'
		. '<span class="input-group-text" data-ul="' . $u . '">' . $units[$u] . '</span></div></div>';
};
$count = function ($name, $label, $value) {
	echo '<div class="col-4"><label class="form-label" for="' . $name . '">' . $label . '</label>'
		. '<input class="form-control" type="number" id="' . $name . '" name="' . $name . '" value="' . $value . '" min="0" step="1" inputmode="numeric"></div>';
};
?>
<div class="mb-3">
	<span class="form-label d-block">Measure by</span>
	<div class="seg" role="radiogroup" aria-label="Measure by">
		<input type="radio" name="mode" id="mode-walls" value="walls" checked><label for="mode-walls">Walls &amp; gables</label>
		<input type="radio" name="mode" id="mode-area" value="area"><label for="mode-area">Total wall area</label>
	</div>
</div>

<div class="row g-3" data-show="mode:walls">
	<?php $num('perimeter', 'House perimeter', 160, 'len'); ?>
	<?php $num('wall_h', 'Wall height (to eaves)', 9, 'len'); ?>
	<?php $count('gables', 'Gable ends', 2); ?>
	<?php $num('gable_w', 'Gable width', 30, 'len', 'col-4'); ?>
	<?php $num('gable_rise', 'Gable height', 7.5, 'len', 'col-4'); ?>
	<div class="col-12"><div class="form-text mt-0">Perimeter is all four walls added up. Gable height is from the eave line to the peak.</div></div>
</div>
<div class="row g-3" data-show="mode:area">
	<?php $num('gross_area', 'Total wall area', 1665, 'area', 'col-12'); ?>
</div>

<div class="row g-3 mt-0">
	<?php $count('windows', 'Windows', 12); ?>
	<?php $count('doors', 'Doors', 2); ?>
	<?php $count('garage', 'Garage doors', 1); ?>
	<div class="col-12">
		<label class="form-label" for="material">Siding material</label>
		<select class="form-select" id="material" name="material" data-fill>
			<?php foreach ($materials as $v => $m): ?>
			<option value="<?= $v ?>" data-p="<?= $m[1] ?>" data-life="<?= $m[2] ?>" data-set-sf_price="<?= $m[1] ?>"<?= $v === 'vinyl' ? ' selected' : '' ?>><?= e($m[0]) ?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="col-6">
		<label class="form-label" for="stories">Stories</label>
		<select class="form-select" id="stories" name="stories" data-fill>
			<option value="1" data-set-wall_h="9" selected>1 story</option>
			<option value="1.1" data-set-wall_h="18">2 stories</option>
			<option value="1.2" data-set-wall_h="27">3 stories</option>
		</select>
	</div>
	<div class="col-6">
		<label class="form-label" for="waste">Waste</label>
		<div class="input-group">
			<input class="form-control" type="number" id="waste" name="waste" value="10" min="0" max="50" step="any" inputmode="decimal">
			<span class="input-group-text">%</span>
		</div>
	</div>
</div>

<fieldset>
	<legend>Prices (edit to match your quote)</legend>
	<div class="row g-3">
		<div class="col-12 col-md-6">
			<label class="form-label" for="sf_price">Installed siding</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="sf_price" name="sf_price" value="6" min="0" step="any" inputmode="decimal" data-u="parea" data-money>
				<span class="input-group-text" data-ul="parea">/sq ft</span>
			</div>
		</div>
		<div class="col-12 col-md-6">
			<label class="form-label" for="region">Labor rates for</label>
			<select class="form-select" id="region" name="region"><?= region_options() ?></select>
		</div>
		<div class="col-12">
			<div class="form-check form-switch">
				<input class="form-check-input" type="checkbox" role="switch" id="removal" name="removal" value="1" checked>
				<label class="form-check-label" for="removal">Remove &amp; haul away old siding</label>
			</div>
			<div class="form-check form-switch">
				<input class="form-check-input" type="checkbox" role="switch" id="wrap" name="wrap" value="1" checked>
				<label class="form-check-label" for="wrap">New house wrap</label>
			</div>
			<div class="form-check form-switch">
				<input class="form-check-input" type="checkbox" role="switch" id="trim" name="trim" value="1">
				<label class="form-check-label" for="trim">Replace soffit &amp; fascia</label>
			</div>
		</div>
		<div class="col-6" data-show="removal:1">
			<label class="form-label" for="removal_price">Removal</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="removal_price" name="removal_price" value="1.25" min="0" step="any" inputmode="decimal" data-u="parea" data-money>
				<span class="input-group-text" data-ul="parea">/sq ft</span>
			</div>
		</div>
		<div class="col-6" data-show="wrap:1">
			<label class="form-label" for="wrap_price">House wrap</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="wrap_price" name="wrap_price" value="0.5" min="0" step="any" inputmode="decimal" data-u="parea" data-money>
				<span class="input-group-text" data-ul="parea">/sq ft</span>
			</div>
		</div>
		<div class="col-6" data-show="trim:1">
			<label class="form-label" for="trim_lf">Soffit &amp; fascia length</label>
			<div class="input-group">
				<input class="form-control" type="number" id="trim_lf" name="trim_lf" value="160" min="0" step="any" inputmode="decimal" data-u="len">
				<span class="input-group-text" data-ul="len">ft</span>
			</div>
		</div>
		<div class="col-6" data-show="trim:1">
			<label class="form-label" for="trim_price">Soffit &amp; fascia</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="trim_price" name="trim_price" value="20" min="0" step="any" inputmode="decimal" data-u="plen" data-money>
				<span class="input-group-text" data-ul="plen">/ft</span>
			</div>
		</div>
	</div>
</fieldset>
