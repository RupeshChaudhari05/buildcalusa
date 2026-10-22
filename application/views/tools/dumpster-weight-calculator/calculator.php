<?php defined('BASEPATH') OR exit('No direct script access allowed');
// Loose weight in a dumpster, lb per cubic yard. data-heavy = belongs in a heavy-debris container.
$materials = array(
	'mixed'    => array('Mixed construction debris', 600, 0),
	'drywall'  => array('Drywall', 500, 0),
	'wood'     => array('Wood and lumber', 350, 0),
	'shingles' => array('Asphalt shingles (by volume)', 1000, 0),
	'junk'     => array('Household junk and furniture', 300, 0),
	'yard'     => array('Yard waste', 250, 0),
	'concrete' => array('Concrete, broken', 2000, 1),
	'brick'    => array('Brick or block', 2000, 1),
	'dirt'     => array('Dirt', 2000, 1),
	'gravel'   => array('Gravel or rock', 2700, 1),
	'tile'     => array('Roofing tile (clay or concrete)', 2400, 1),
);
$rows = array(
	1 => array('mixed', 2),
	2 => array('wood', 1),
	3 => array('drywall', 0),
	4 => array('junk', 0),
	5 => array('concrete', 0),
	6 => array('yard', 0),
);
?>
<fieldset class="mt-0 pt-0 border-0">
	<legend>Roof tear-off (optional)</legend>
	<div class="row g-3">
		<div class="col-6">
			<label class="form-label" for="roof_sq">Shingle squares</label>
			<input class="form-control" type="number" id="roof_sq" name="roof_sq" value="20" min="0" step="any" inputmode="decimal">
			<span class="form-text">1 square = 100 sq ft of roof. Enter 0 if there's no roof.</span>
		</div>
		<div class="col-6">
			<label class="form-label" for="layers">Layers</label>
			<select class="form-select" id="layers" name="layers">
				<option value="1" selected>1 layer</option>
				<option value="2">2 layers</option>
				<option value="3">3 layers</option>
			</select>
		</div>
	</div>
</fieldset>

<fieldset>
	<legend>Other debris</legend>
	<?php foreach ($rows as $i => $r): ?>
	<div class="row g-2 mb-2" data-dwrow="<?= $i ?>"<?= $i > 3 ? ' hidden' : '' ?>>
		<div class="col-7">
			<label class="form-label<?= $i > 1 ? ' visually-hidden' : '' ?>" for="m<?= $i ?>">Material</label>
			<select class="form-select" id="m<?= $i ?>" name="m<?= $i ?>">
				<?php foreach ($materials as $key => $m): ?>
				<option value="<?= $key ?>" data-d="<?= $m[1] ?>" data-heavy="<?= $m[2] ?>"<?= $key === $r[0] ? ' selected' : '' ?>><?= e($m[0]) ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="col-5">
			<label class="form-label<?= $i > 1 ? ' visually-hidden' : '' ?>" for="v<?= $i ?>">Volume</label>
			<div class="input-group">
				<input class="form-control" type="number" id="v<?= $i ?>" name="v<?= $i ?>" value="<?= $r[1] ?>" min="0" step="any" inputmode="decimal" data-u="vol">
				<span class="input-group-text" data-ul="vol">yd³</span>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
	<button type="button" class="btn-x" id="dw-add">+ Add material</button>
</fieldset>

<fieldset>
	<legend>Container and fees</legend>
	<div class="row g-3">
		<div class="col-12">
			<label class="form-label" for="size">Dumpster</label>
			<select class="form-select" id="size" name="size" data-fill>
				<option value="10" data-yd="10" data-set-included="2">10 yard (about 2 tons included)</option>
				<option value="15" data-yd="15" data-set-included="2.5" selected>15 yard (about 2.5 tons included)</option>
				<option value="20" data-yd="20" data-set-included="3">20 yard (about 3 tons included)</option>
				<option value="30" data-yd="30" data-set-included="4">30 yard (about 4 tons included)</option>
				<option value="40" data-yd="40" data-set-included="5">40 yard (about 5 tons included)</option>
				<option value="heavy" data-yd="10" data-heavybox="1" data-set-included="10">10 yard heavy debris (up to about 10 tons)</option>
			</select>
		</div>
		<div class="col-6">
			<label class="form-label" for="included">Weight included</label>
			<div class="input-group">
				<input class="form-control" type="number" id="included" name="included" value="2.5" min="0" step="any" inputmode="decimal" data-u="ton">
				<span class="input-group-text" data-ul="ton">tons</span>
			</div>
		</div>
		<div class="col-6">
			<label class="form-label" for="over_price">Overage</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="over_price" name="over_price" value="75" min="0" step="any" inputmode="decimal" data-u="pton" data-money>
				<span class="input-group-text" data-ul="pton">/ton</span>
			</div>
		</div>
	</div>
</fieldset>
