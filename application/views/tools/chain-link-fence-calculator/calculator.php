<?php defined('BASEPATH') OR exit('No direct script access allowed');

$num = function ($name, $label, $value, $u = '', $col = 'col-6') {
	echo '<div class="' . $col . '"><label class="form-label" for="' . $name . '">' . $label . '</label>'
		. ($u ? '<div class="input-group">' : '')
		. '<input class="form-control" type="number" id="' . $name . '" name="' . $name . '" value="' . $value . '" min="0" step="any" inputmode="decimal"' . ($u ? ' data-u="' . $u . '"' : '') . '>'
		. ($u ? '<span class="input-group-text" data-ul="' . $u . '">ft</span></div>' : '') . '</div>';
};
$money = function ($name, $label, $value, $col = 'col-6 col-md-4') {
	echo '<div class="' . $col . '"><label class="form-label" for="' . $name . '">' . $label . '</label><div class="input-group">'
		. '<span class="input-group-text" data-cs>$</span>'
		. '<input class="form-control" type="number" id="' . $name . '" name="' . $name . '" value="' . $value . '" min="0" step="any" inputmode="decimal" data-money>'
		. '</div></div>';
};
?>
<div class="row g-3">
	<?php $num('length', 'Total fence length', 150, 'len'); ?>
	<div class="col-6">
		<label class="form-label" for="height">Fence height</label>
		<select class="form-select" id="height" name="height" data-fill>
			<option value="4" data-set-fabric_price="110" data-set-line_post_price="15" data-set-term_post_price="30">4 ft</option>
			<option value="5" data-set-fabric_price="140" data-set-line_post_price="18" data-set-term_post_price="34">5 ft</option>
			<option value="6" data-set-fabric_price="175" data-set-line_post_price="21" data-set-term_post_price="38" selected>6 ft</option>
		</select>
	</div>
	<div class="col-6">
		<label class="form-label" for="gauge">Fabric gauge</label>
		<select class="form-select" id="gauge" name="gauge">
			<option value="1" selected>11½ gauge (residential)</option>
			<option value="1.45">9 gauge (heavy duty)</option>
		</select>
	</div>
	<?php $num('spacing', 'Line post spacing', 10, 'len'); ?>
	<?php $num('corners', 'Corners', 2, '', 'col-4'); $num('ends', 'Ends', 2, '', 'col-4'); $num('gates', 'Gates', 1, '', 'col-4'); ?>
	<div class="col-12"><div class="form-text">Ends are where a fence line stops, e.g. at the house. A fence that closes on itself has 0 ends.</div></div>
	<?php $num('gate_w', 'Gate opening', 4, 'len'); ?>
</div>

<fieldset>
	<legend>Prices (edit to match your supplier)</legend>
	<div class="row g-3">
		<?php $money('fabric_price', 'Fabric, 50 ft roll', 175); $money('line_post_price', 'Line post (1⅝ in)', 21); $money('term_post_price', 'Terminal post (2⅜ in)', 38); ?>
		<?php $money('rail_price', 'Top rail, 21 ft', 28); $money('gate_price', 'Walk gate', 120); $money('concrete_price', '50 lb concrete bag', '7.50'); ?>
		<div class="col-12"><div class="form-text">Fittings (tension bars, bands, caps, ties) use typical store prices and are listed in the results.</div></div>
	</div>
</fieldset>
