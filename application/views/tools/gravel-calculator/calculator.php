<?php defined('BASEPATH') OR exit('No direct script access allowed');

$num = function ($name, $label, $value, $u, $col = 'col-6') {
	$unit = $u === 'len' ? 'ft' : 'in';
	echo '<div class="' . $col . '"><label class="form-label" for="' . $name . '">' . $label . '</label><div class="input-group">'
		. '<input class="form-control" type="number" id="' . $name . '" name="' . $name . '" value="' . $value . '" min="0" step="any" inputmode="decimal" data-u="' . $u . '">'
		. '<span class="input-group-text" data-ul="' . $u . '">' . $unit . '</span></div></div>';
};
?>
<div class="mb-3">
	<span class="form-label d-block">Area shape</span>
	<div class="seg" role="radiogroup" aria-label="Shape">
		<input type="radio" name="shape" id="shape-rect" value="rect" checked><label for="shape-rect">Rectangle</label>
		<input type="radio" name="shape" id="shape-circle" value="circle"><label for="shape-circle">Circle</label>
	</div>
</div>

<div class="row g-3">
	<div class="col-12">
		<label class="form-label" for="material">Material</label>
		<select class="form-select" id="material" name="material" data-fill>
			<option value="57" data-set-density="1.4" data-set-ton_price="45" selected>#57 crushed stone (¾–1 in)</option>
			<option value="pea" data-set-density="1.35" data-set-ton_price="55">Pea gravel</option>
			<option value="river" data-set-density="1.3" data-set-ton_price="90">River rock (1–3 in)</option>
			<option value="base" data-set-density="1.5" data-set-ton_price="35">Crusher run / road base</option>
			<option value="recycled" data-set-density="1.2" data-set-ton_price="30">Crushed concrete (recycled)</option>
			<option value="dg" data-set-density="1.4" data-set-ton_price="60">Decomposed granite</option>
		</select>
	</div>
</div>

<div class="row g-3 mt-0" data-show="shape:rect">
	<?php $num('length', 'Length', 20, 'len'); $num('width', 'Width', 10, 'len'); ?>
</div>
<div class="row g-3 mt-0" data-show="shape:circle">
	<?php $num('diameter', 'Diameter', 10, 'len', 'col-12'); ?>
</div>

<div class="row g-3 mt-0">
	<?php $num('depth', 'Depth', 3, 'in'); ?>
	<div class="col-6">
		<label class="form-label" for="extra">Compaction / waste</label>
		<div class="input-group">
			<input class="form-control" type="number" id="extra" name="extra" value="10" min="0" max="50" step="any" inputmode="decimal">
			<span class="input-group-text">%</span>
		</div>
	</div>
	<div class="col-12"><div class="form-text">Paths and decorative beds: 2–3 in. Driveway top layer: 3–4 in over 4–6 in of base.</div></div>
</div>

<fieldset>
	<legend>Prices (edit to match your supplier)</legend>
	<div class="row g-3">
		<div class="col-6 col-md-4">
			<label class="form-label" for="ton_price">Bulk price</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="ton_price" name="ton_price" value="45" min="0" step="any" inputmode="decimal" data-u="pton" data-money>
				<span class="input-group-text" data-ul="pton">/ton</span>
			</div>
		</div>
		<div class="col-6 col-md-4">
			<label class="form-label" for="delivery">Delivery fee</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="delivery" name="delivery" value="100" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-6 col-md-4">
			<label class="form-label" for="bag_price">0.5 ft³ bag</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="bag_price" name="bag_price" value="5.50" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-6 col-md-4">
			<label class="form-label" for="density">Density</label>
			<div class="input-group">
				<input class="form-control" type="number" id="density" name="density" value="1.4" min="0.5" max="3" step="any" inputmode="decimal">
				<span class="input-group-text">t/yd³</span>
			</div>
		</div>
		<div class="col-12"><div class="form-text">Density is in U.S. tons per cubic yard (1.4 t/yd³ ≈ 1.66 tonnes/m³). Your supplier can tell you the figure for their stone.</div></div>
	</div>
</fieldset>
