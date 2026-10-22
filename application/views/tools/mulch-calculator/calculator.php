<?php defined('BASEPATH') OR exit('No direct script access allowed');

$num = function ($name, $label, $value, $u, $col = 'col-6') {
	$unit = $u === 'len' ? 'ft' : 'in';
	echo '<div class="' . $col . '"><label class="form-label" for="' . $name . '">' . $label . '</label><div class="input-group">'
		. '<input class="form-control" type="number" id="' . $name . '" name="' . $name . '" value="' . $value . '" min="0" step="any" inputmode="decimal" data-u="' . $u . '">'
		. '<span class="input-group-text" data-ul="' . $u . '">' . $unit . '</span></div></div>';
};
?>
<div class="mb-3">
	<span class="form-label d-block">Bed shape</span>
	<div class="seg" role="radiogroup" aria-label="Bed shape">
		<input type="radio" name="shape" id="shape-rect" value="rect" checked><label for="shape-rect">Rectangle</label>
		<input type="radio" name="shape" id="shape-circle" value="circle"><label for="shape-circle">Circle</label>
		<input type="radio" name="shape" id="shape-tri" value="tri"><label for="shape-tri">Triangle</label>
	</div>
</div>

<div class="row g-3" data-show="shape:rect">
	<?php $num('length', 'Bed length', 30, 'len'); $num('width', 'Bed width', 6, 'len'); ?>
</div>
<div class="row g-3" data-show="shape:circle">
	<?php $num('diameter', 'Diameter', 8, 'len', 'col-12'); ?>
	<div class="col-12"><div class="form-text">For a ring around a tree, enter the outer diameter. The trunk area is too small to matter.</div></div>
</div>
<div class="row g-3" data-show="shape:tri">
	<?php $num('tri_base', 'Base', 10, 'len'); $num('tri_height', 'Height', 8, 'len'); ?>
</div>

<div class="row g-3 mt-0">
	<?php $num('depth', 'Depth', 3, 'in'); ?>
	<div class="col-6">
		<label class="form-label" for="beds">Number of beds</label>
		<input class="form-control" type="number" id="beds" name="beds" value="2" min="1" step="1" inputmode="numeric">
	</div>
	<div class="col-12">
		<label class="form-label" for="material">Mulch type</label>
		<select class="form-select" id="material" name="material" data-fill>
			<option value="hardwood" data-set-yd_price="35" data-set-bag_price="4" selected>Shredded hardwood</option>
			<option value="dyed" data-set-yd_price="40" data-set-bag_price="4.50">Dyed (black, brown, red)</option>
			<option value="pine" data-set-yd_price="45" data-set-bag_price="5">Pine bark nuggets</option>
			<option value="cedar" data-set-yd_price="55" data-set-bag_price="6">Cedar</option>
			<option value="rubber" data-set-yd_price="250" data-set-bag_price="9">Rubber mulch</option>
		</select>
	</div>
	<div class="col-12">
		<div class="form-check form-switch">
			<input class="form-check-input" type="checkbox" role="switch" id="topup" name="topup" value="1">
			<label class="form-check-label" for="topup">Topping up existing mulch</label>
		</div>
	</div>
</div>

<fieldset>
	<legend>Prices (edit to match your supplier)</legend>
	<div class="row g-3">
		<div class="col-12 col-md-4">
			<label class="form-label" for="yd_price">Bulk mulch</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="yd_price" name="yd_price" value="35" min="0" step="any" inputmode="decimal" data-u="pvol" data-money>
				<span class="input-group-text" data-ul="pvol">/yd³</span>
			</div>
		</div>
		<div class="col-6 col-md-4">
			<label class="form-label" for="delivery">Delivery fee</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="delivery" name="delivery" value="75" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-6 col-md-4">
			<label class="form-label" for="bag_price">2 ft³ bag</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="bag_price" name="bag_price" value="4" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
	</div>
</fieldset>
