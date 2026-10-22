<?php defined('BASEPATH') OR exit('No direct script access allowed');

$shapes = array('slab' => 'Slab', 'footing' => 'Footing', 'column' => 'Column', 'wall' => 'Wall', 'stairs' => 'Stairs');

// [name, label, default, unit kind]
$num = function ($name, $label, $value, $u, $col = 'col-6') {
	$unit = $u === 'len' ? 'ft' : 'in';
	echo '<div class="' . $col . '"><label class="form-label" for="' . $name . '">' . $label . '</label><div class="input-group">'
		. '<input class="form-control" type="number" id="' . $name . '" name="' . $name . '" value="' . $value . '" min="0" step="any" inputmode="decimal" data-u="' . $u . '">'
		. '<span class="input-group-text" data-ul="' . $u . '">' . $unit . '</span></div></div>';
};
?>
<div class="mb-3">
	<span class="form-label d-block">What are you pouring?</span>
	<div class="seg flex-wrap" role="radiogroup" aria-label="Shape">
		<?php foreach ($shapes as $v => $l): ?>
		<input type="radio" name="shape" id="shape-<?= $v ?>" value="<?= $v ?>"<?= $v === 'slab' ? ' checked' : '' ?>><label for="shape-<?= $v ?>"><?= $l ?></label>
		<?php endforeach; ?>
	</div>
</div>

<div class="row g-3" data-show="shape:slab">
	<?php $num('s_len', 'Length', 10, 'len'); $num('s_wid', 'Width', 10, 'len'); $num('s_thk', 'Thickness', 4, 'in'); ?>
	<div class="col-6 d-flex align-items-end"><div class="form-text">Patios and walks: 4 in. Driveways: 5–6 in.</div></div>
</div>
<div class="row g-3" data-show="shape:footing">
	<?php $num('f_len', 'Length', 40, 'len'); $num('f_wid', 'Width', 16, 'in'); $num('f_dep', 'Depth', 8, 'in'); ?>
</div>
<div class="row g-3" data-show="shape:column">
	<?php $num('c_dia', 'Diameter', 12, 'in'); $num('c_hgt', 'Height / depth', 4, 'len'); ?>
	<div class="col-12"><div class="form-text">For round post holes, sonotubes and piers. A 10″ tube needs 0.55 ft³ per foot.</div></div>
</div>
<div class="row g-3" data-show="shape:wall">
	<?php $num('w_len', 'Length', 20, 'len'); $num('w_hgt', 'Height', 4, 'len'); $num('w_thk', 'Thickness', 8, 'in'); ?>
</div>
<div class="row g-3" data-show="shape:stairs">
	<?php $num('t_wid', 'Stair width', 4, 'len'); ?>
	<div class="col-6">
		<label class="form-label" for="t_steps">Number of steps</label>
		<input class="form-control" type="number" id="t_steps" name="t_steps" value="3" min="1" step="1" inputmode="numeric">
	</div>
	<?php $num('t_rise', 'Rise per step', 7, 'in'); $num('t_run', 'Run (tread depth)', 11, 'in'); $num('t_land', 'Top landing depth', 0, 'in', 'col-12'); ?>
</div>

<div class="row g-3 mt-0">
	<div class="col-6">
		<label class="form-label" for="qty">Quantity</label>
		<input class="form-control" type="number" id="qty" name="qty" value="1" min="1" step="1" inputmode="numeric">
	</div>
	<div class="col-6">
		<label class="form-label" for="waste">Waste / spillage</label>
		<div class="input-group">
			<input class="form-control" type="number" id="waste" name="waste" value="10" min="0" max="50" step="any" inputmode="decimal">
			<span class="input-group-text">%</span>
		</div>
	</div>
</div>

<fieldset>
	<legend>Prices (edit to match your supplier)</legend>
	<div class="row g-3">
		<div class="col-12 col-md-4">
			<label class="form-label" for="ready_price">Ready-mix</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="ready_price" name="ready_price" value="165" min="0" step="any" inputmode="decimal" data-u="pvol" data-money>
				<span class="input-group-text" data-ul="pvol">/yd³</span>
			</div>
		</div>
		<div class="col-6 col-md-4">
			<label class="form-label" for="bag80_price">80 lb bag</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="bag80_price" name="bag80_price" value="6.50" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-6 col-md-4">
			<label class="form-label" for="bag60_price">60 lb bag</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="bag60_price" name="bag60_price" value="5.25" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
	</div>
</fieldset>
