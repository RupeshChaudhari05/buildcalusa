<?php defined('BASEPATH') OR exit('No direct script access allowed');

$num = function ($name, $label, $value, $u, $col = 'col-6', $hint = '') {
	$units = array('len' => 'ft', 'in' => 'in', 'area' => 'sq ft');
	echo '<div class="' . $col . '"><label class="form-label" for="' . $name . '">' . $label . '</label><div class="input-group">'
		. '<input class="form-control" type="number" id="' . $name . '" name="' . $name . '" value="' . $value . '" min="0" step="any" inputmode="decimal" data-u="' . $u . '"' . ($hint ? ' placeholder="' . $hint . '"' : '') . '>'
		. '<span class="input-group-text" data-ul="' . $u . '">' . $units[$u] . '</span></div></div>';
};
$money = function ($name, $label, $value, $u = '', $col = 'col-6 col-md-4') {
	$per = array('parea' => '/sq ft', 'pton' => '/ton');
	echo '<div class="' . $col . '"><label class="form-label" for="' . $name . '">' . $label . '</label><div class="input-group">'
		. '<span class="input-group-text" data-cs>$</span>'
		. '<input class="form-control" type="number" id="' . $name . '" name="' . $name . '" value="' . $value . '" min="0" step="any" inputmode="decimal"' . ($u ? ' data-u="' . $u . '"' : '') . ' data-money>'
		. ($u ? '<span class="input-group-text" data-ul="' . $u . '">' . $per[$u] . '</span>' : '')
		. '</div></div>';
};
?>
<div class="row g-3">
	<?php $num('length', 'Patio length', 16, 'len'); $num('width', 'Patio width', 12, 'len'); ?>
	<?php $num('extra_area', 'Extra area (steps, odd bits)', 0, 'area', 'col-12'); ?>
	<div class="col-12">
		<label class="form-label" for="paver">Paver size</label>
		<select class="form-select" id="paver" name="paver" data-fill>
			<option value="4x8" data-set-paver_l="8" data-set-paver_w="4" data-set-paver_price="0.70">4 × 8 in holland / brick paver</option>
			<option value="6x9" data-set-paver_l="9" data-set-paver_w="6" data-set-paver_price="1.10" selected>6 × 9 in paver</option>
			<option value="6x12" data-set-paver_l="12" data-set-paver_w="6" data-set-paver_price="1.40">6 × 12 in paver</option>
			<option value="12x12" data-set-paver_l="12" data-set-paver_w="12" data-set-paver_price="3.00">12 × 12 in paver</option>
			<option value="16x16" data-set-paver_l="16" data-set-paver_w="16" data-set-paver_price="5.50">16 × 16 in patio stone</option>
			<option value="24x24" data-set-paver_l="24" data-set-paver_w="24" data-set-paver_price="12">24 × 24 in slab</option>
		</select>
	</div>
	<?php $num('paver_l', 'Paver length', 9, 'in'); $num('paver_w', 'Paver width', 6, 'in'); ?>
	<div class="col-6">
		<label class="form-label" for="layout">Pattern</label>
		<select class="form-select" id="layout" name="layout" data-fill>
			<option value="running" data-set-waste="5" selected>Running bond</option>
			<option value="basket" data-set-waste="7">Basketweave</option>
			<option value="herring" data-set-waste="10">Herringbone</option>
			<option value="circle" data-set-waste="15">Circle / fan</option>
		</select>
	</div>
	<div class="col-6">
		<label class="form-label" for="waste">Cuts &amp; breakage</label>
		<div class="input-group">
			<input class="form-control" type="number" id="waste" name="waste" value="5" min="0" max="50" step="any" inputmode="decimal">
			<span class="input-group-text">%</span>
		</div>
	</div>
	<?php $num('base_depth', 'Gravel base depth', 4, 'in'); ?>
	<?php $num('edge_ft', 'Edge restraint length', '', 'len', 'col-6', 'auto'); ?>
	<div class="col-12"><div class="form-text">Base: 4 in for patios and walks, 6–8 in for driveways or clay soil. Leave edge length blank to use the full perimeter; reduce it where the patio meets the house.</div></div>
</div>

<fieldset>
	<legend>Prices (edit to match your supplier)</legend>
	<div class="row g-3">
		<?php $money('paver_price', 'Per paver', '1.10'); $money('base_price', 'Crushed base', 35, 'pton'); $money('sand_price', 'Bedding sand', 45, 'pton'); ?>
		<?php $money('poly_price', 'Polymeric sand (50 lb)', 35); $money('edge_price', 'Edging (8 ft piece)', 15); $money('labor_price', 'Install labor', 12, 'parea'); ?>
		<div class="col-12 col-md-6">
			<label class="form-label" for="region">Labor rates for</label>
			<select class="form-select" id="region" name="region"><?= region_options() ?></select>
		</div>
		<div class="col-12 col-md-6 d-flex align-items-end">
			<div class="form-check form-switch">
				<input class="form-check-input" type="checkbox" role="switch" id="diy" name="diy" value="1">
				<label class="form-check-label" for="diy">DIY install (no labor cost)</label>
			</div>
		</div>
	</div>
</fieldset>
