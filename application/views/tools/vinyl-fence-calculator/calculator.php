<?php defined('BASEPATH') OR exit('No direct script access allowed');

$num = function ($name, $label, $value, $u = '', $col = 'col-6', $suffix = '') {
	echo '<div class="' . $col . '"><label class="form-label" for="' . $name . '">' . $label . '</label>'
		. ($u || $suffix ? '<div class="input-group">' : '')
		. '<input class="form-control" type="number" id="' . $name . '" name="' . $name . '" value="' . $value . '" min="0" step="any" inputmode="decimal"' . ($u ? ' data-u="' . $u . '"' : '') . '>'
		. ($u ? '<span class="input-group-text" data-ul="' . $u . '">ft</span>' : '')
		. ($suffix ? '<span class="input-group-text">' . $suffix . '</span>' : '')
		. ($u || $suffix ? '</div>' : '') . '</div>';
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
		<label class="form-label" for="height">Height &amp; style</label>
		<select class="form-select" id="height" name="height" data-fill>
			<option value="4" data-set-panel_price="95" data-set-line_post_price="35" data-set-term_post_price="42">4 ft picket</option>
			<option value="5" data-set-panel_price="110" data-set-line_post_price="40" data-set-term_post_price="48">5 ft semi-privacy</option>
			<option value="6" data-set-panel_price="120" data-set-line_post_price="45" data-set-term_post_price="55" selected>6 ft privacy</option>
		</select>
	</div>
	<div class="col-6">
		<label class="form-label" for="panel_w">Panel width</label>
		<select class="form-select" id="panel_w" name="panel_w">
			<option value="6" selected>6 ft sections</option>
			<option value="8">8 ft sections</option>
		</select>
	</div>
	<?php $num('gate_w', 'Gate opening', 4, 'len'); ?>
	<?php $num('corners', 'Corners', 2, '', 'col-4'); $num('ends', 'Ends', 2, '', 'col-4'); $num('gates', 'Gates', 1, '', 'col-4'); ?>
	<div class="col-12"><div class="form-text">Ends are where a fence line stops, e.g. at the house. A fence that closes on itself has 0 ends.</div></div>
	<?php $num('bags_per_post', 'Concrete per post', 2, '', 'col-6', 'bags'); ?>
</div>

<fieldset>
	<legend>Prices (edit to match your supplier)</legend>
	<div class="row g-3">
		<?php $money('panel_price', 'Per 6 ft panel', 120); $money('line_post_price', 'Line post', 45); $money('term_post_price', 'Corner/end/gate post', 55); ?>
		<?php $money('cap_price', 'Post cap', 6); $money('gate_price', 'Gate kit', 250); $money('concrete_price', '50 lb concrete bag', '7.50'); ?>
	</div>
</fieldset>
