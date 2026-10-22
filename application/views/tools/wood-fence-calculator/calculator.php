<?php defined('BASEPATH') OR exit('No direct script access allowed');

$num = function ($name, $label, $value, $u = '', $col = 'col-6', $suffix = '') {
	$units = array('len' => 'ft', 'in' => 'in');
	echo '<div class="' . $col . '"><label class="form-label" for="' . $name . '">' . $label . '</label>'
		. ($u || $suffix ? '<div class="input-group">' : '')
		. '<input class="form-control" type="number" id="' . $name . '" name="' . $name . '" value="' . $value . '" min="0" step="any" inputmode="decimal"' . ($u ? ' data-u="' . $u . '"' : '') . '>'
		. ($u ? '<span class="input-group-text" data-ul="' . $u . '">' . $units[$u] . '</span>' : '')
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
		<label class="form-label" for="height">Fence height</label>
		<select class="form-select" id="height" name="height" data-fill>
			<option value="4" data-set-rails="2" data-set-post_depth="2" data-set-picket_price="2.25">4 ft</option>
			<option value="6" data-set-rails="3" data-set-post_depth="2" data-set-picket_price="3.25" selected>6 ft</option>
			<option value="8" data-set-rails="4" data-set-post_depth="3" data-set-picket_price="5.25">8 ft</option>
		</select>
	</div>
	<div class="col-12">
		<label class="form-label" for="style">Fence style</label>
		<select class="form-select" id="style" name="style" data-fill>
			<option value="privacy" data-set-gap="0" data-set-overlap="0" selected>Privacy, side by side (no gaps)</option>
			<option value="bob" data-set-gap="0" data-set-overlap="1.5">Board-on-board (1½ in overlap)</option>
			<option value="shadow" data-set-gap="0" data-set-overlap="1">Shadowbox (alternating sides, 1 in overlap)</option>
			<option value="picket" data-set-gap="2.5" data-set-overlap="0">Picket fence (spaced pickets)</option>
		</select>
	</div>
	<?php $num('picket_w', 'Picket width', 5.5, 'in', 'col-4'); $num('gap', 'Gap', 0, 'in', 'col-4'); $num('overlap', 'Overlap', 0, 'in', 'col-4'); ?>
	<div class="col-12"><div class="form-text">A "1×6" picket is 5½ in wide. Overlap is how far each board covers its neighbor on board-on-board or shadowbox.</div></div>
	<?php $num('spacing', 'Post spacing', 8, 'len'); $num('rails', 'Rails per section', 3, '', 'col-6'); ?>
	<?php $num('corners', 'Corners', 2, '', 'col-4'); $num('ends', 'Ends', 2, '', 'col-4'); $num('gates', 'Gates', 1, '', 'col-4'); ?>
	<div class="col-12"><div class="form-text">Ends are where a fence line stops, e.g. at the house. A fence that closes on itself has 0 ends.</div></div>
	<?php $num('gate_w', 'Gate opening', 4, 'len'); $num('post_depth', 'Post depth in ground', 2, 'len'); ?>
	<?php $num('bags_per_post', 'Concrete per post', 2, '', 'col-6', 'bags'); $num('waste', 'Picket waste', 5, '', 'col-6', '%'); ?>
</div>

<fieldset>
	<legend>Prices (edit to match your supplier)</legend>
	<div class="row g-3">
		<?php $money('picket_price', 'Per picket', '3.25'); $money('rail_price', '2×4×8 rail', '5.50'); $money('post_price', '4×4×8 post', 12); ?>
		<?php $money('concrete_price', '50 lb fast-set bag', '7.50'); $money('screw_price', 'Screws, 5 lb box', 35); $money('gate_hw_price', 'Gate hardware kit', 45); ?>
	</div>
</fieldset>
