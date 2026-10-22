<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Thickness in quarters: value = inches used in the board-foot formula
$quarters = array('1' => '4/4 (1 in)', '1.25' => '5/4 (1¼ in)', '1.5' => '6/4 (1½ in)', '2' => '8/4 (2 in, also 2× lumber)', '3' => '12/4 (3 in)', '4' => '16/4 (4 in, also 4× lumber)', '6' => '6× (6 in timbers)');
// Default rows: thickness, width (in), length (ft), qty
$rows = array(
	1 => array('2', 6, 8, 4),
	2 => array('1', 8, 6, 6),
	3 => array('1.25', 4, 8, 0),
	4 => array('1', 6, 8, 0),
	5 => array('1', 6, 8, 0),
	6 => array('1', 6, 8, 0),
);
?>
<div class="row g-3">
	<div class="col-12 col-md-7">
		<label class="form-label" for="species">Species (sets price per board foot)</label>
		<select class="form-select" id="species" name="species" data-fill>
			<option value="poplar" data-set-price="4.5">Poplar</option>
			<option value="red-oak" data-set-price="6" selected>Red oak</option>
			<option value="white-oak" data-set-price="8.5">White oak</option>
			<option value="maple" data-set-price="7">Hard maple</option>
			<option value="cherry" data-set-price="9">Cherry</option>
			<option value="walnut" data-set-price="14">Black walnut</option>
			<option value="cedar" data-set-price="5">Western red cedar</option>
			<option value="pt-pine" data-set-price="2.25">Pressure-treated pine</option>
		</select>
	</div>
	<div class="col-6 col-md-3">
		<label class="form-label" for="price">Price</label>
		<div class="input-group">
			<span class="input-group-text" data-cs>$</span>
			<input class="form-control" type="number" id="price" name="price" value="6" min="0" step="any" inputmode="decimal" data-money>
			<span class="input-group-text">/BF</span>
		</div>
	</div>
	<div class="col-6 col-md-2">
		<label class="form-label" for="waste">Waste</label>
		<div class="input-group">
			<input class="form-control" type="number" id="waste" name="waste" value="15" min="0" max="80" step="any" inputmode="decimal">
			<span class="input-group-text">%</span>
		</div>
	</div>
</div>

<fieldset>
	<legend>Lumber list</legend>
	<?php foreach ($rows as $i => $r): ?>
	<div class="row g-2 mb-2" data-bfrow="<?= $i ?>"<?= $i > 3 ? ' hidden' : '' ?>>
		<div class="col-12"><span class="form-text fw-semibold">Board <?= $i ?></span></div>
		<div class="col-6 col-md-4">
			<label class="form-label" for="t<?= $i ?>">Thickness</label>
			<select class="form-select" id="t<?= $i ?>" name="t<?= $i ?>">
				<?php foreach ($quarters as $v => $l): ?>
				<option value="<?= $v ?>"<?= (string) $v === $r[0] ? ' selected' : '' ?>><?= $l ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="col-6 col-md-3">
			<label class="form-label" for="w<?= $i ?>">Width</label>
			<div class="input-group">
				<input class="form-control" type="number" id="w<?= $i ?>" name="w<?= $i ?>" value="<?= $r[1] ?>" min="0" step="any" inputmode="decimal">
				<span class="input-group-text">in</span>
			</div>
		</div>
		<div class="col-6 col-md-3">
			<label class="form-label" for="l<?= $i ?>">Length</label>
			<div class="input-group">
				<input class="form-control" type="number" id="l<?= $i ?>" name="l<?= $i ?>" value="<?= $r[2] ?>" min="0" step="any" inputmode="decimal">
				<span class="input-group-text">ft</span>
			</div>
		</div>
		<div class="col-6 col-md-2">
			<label class="form-label" for="q<?= $i ?>">Qty</label>
			<input class="form-control" type="number" id="q<?= $i ?>" name="q<?= $i ?>" value="<?= $r[3] ?>" min="0" step="1" inputmode="numeric">
		</div>
	</div>
	<?php endforeach; ?>
	<button type="button" class="btn-x" id="bf-add">+ Add row</button>
	<div class="form-text">Use the nominal thickness (8/4, or 2 for a 2×6), the actual width in inches, and the length in feet.</div>
</fieldset>
