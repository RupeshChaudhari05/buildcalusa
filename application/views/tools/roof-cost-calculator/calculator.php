<?php defined('BASEPATH') OR exit('No direct script access allowed');

// value => [label, installed $ per square, min pitch (x/12), lifespan]
$materials = array(
	'3tab'     => array('Asphalt – 3-tab shingles', 450, 2, '15–20 yrs'),
	'arch'     => array('Asphalt – architectural shingles', 550, 2, '25–30 yrs'),
	'exposed'  => array('Metal – exposed-fastener (ribbed / corrugated)', 800, 3, '30–45 yrs'),
	'stone'    => array('Metal – stone-coated steel', 1050, 3, '40–50 yrs'),
	'seam'     => array('Metal – standing seam', 1300, 0.25, '40–70 yrs'),
	'shake'    => array('Wood shake (cedar)', 1150, 4, '25–35 yrs'),
	'ctile'    => array('Concrete tile', 1200, 2.5, '40–50 yrs'),
	'clay'     => array('Clay tile', 1700, 2.5, '50–100 yrs'),
	'slate'    => array('Natural slate', 2200, 4, '75–150 yrs'),
);
?>
<div class="row g-3">
	<div class="col-6">
		<label class="form-label" for="length">House length</label>
		<div class="input-group">
			<input class="form-control" type="number" id="length" name="length" value="50" min="0" step="any" inputmode="decimal" data-u="len">
			<span class="input-group-text" data-ul="len">ft</span>
		</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="width">House width</label>
		<div class="input-group">
			<input class="form-control" type="number" id="width" name="width" value="30" min="0" step="any" inputmode="decimal" data-u="len">
			<span class="input-group-text" data-ul="len">ft</span>
		</div>
	</div>
	<div class="col-12"><div class="form-text mt-0">Footprint at the drip line, including overhangs. Need the pitch? Use the <a href="<?= site_url('roof-pitch-calculator') ?>">roof pitch calculator</a>.</div></div>
	<div class="col-6">
		<label class="form-label" for="pitch">Roof pitch</label>
		<select class="form-select" id="pitch" name="pitch">
			<?php foreach (array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 14, 16) as $p): ?>
			<option value="<?= $p ?>"<?= $p === 6 ? ' selected' : '' ?>><?= $p ?>/12</option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="col-6">
		<label class="form-label" for="shape">Roof shape</label>
		<select class="form-select" id="shape" name="shape" data-fill>
			<option value="gable" data-set-waste="10" selected>Gable (2 sides)</option>
			<option value="hip" data-set-waste="15">Hip (4 sides)</option>
			<option value="complex" data-set-waste="20">Complex / cut-up</option>
		</select>
	</div>
	<div class="col-12">
		<label class="form-label" for="material">Roofing material</label>
		<select class="form-select" id="material" name="material" data-fill>
			<?php foreach ($materials as $v => $m): ?>
			<option value="<?= $v ?>" data-p="<?= $m[1] ?>" data-min="<?= $m[2] ?>" data-life="<?= $m[3] ?>" data-set-sq_price="<?= $m[1] ?>"<?= $v === 'arch' ? ' selected' : '' ?>><?= e($m[0]) ?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="col-6">
		<label class="form-label" for="stories">Stories</label>
		<select class="form-select" id="stories" name="stories">
			<option value="1" selected>1 story</option>
			<option value="1.1">2 stories</option>
			<option value="1.2">3 stories</option>
		</select>
	</div>
	<div class="col-6">
		<label class="form-label" for="waste">Waste</label>
		<div class="input-group">
			<input class="form-control" type="number" id="waste" name="waste" value="10" min="0" max="50" step="any" inputmode="decimal">
			<span class="input-group-text">%</span>
		</div>
	</div>
	<div class="col-12">
		<label class="form-label" for="layers">Old roof to tear off</label>
		<select class="form-select" id="layers" name="layers">
			<option value="0">None (new construction)</option>
			<option value="1" selected>1 layer</option>
			<option value="2">2 layers</option>
		</select>
	</div>
</div>

<fieldset>
	<legend>Prices (edit to match your quote)</legend>
	<div class="row g-3">
		<div class="col-12 col-md-6">
			<label class="form-label" for="sq_price">Installed price per square (100 sq ft)</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="sq_price" name="sq_price" value="550" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-6 col-md-3" data-show="layers:1|2">
			<label class="form-label" for="tear_price">Tear-off / square</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="tear_price" name="tear_price" value="100" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-6 col-md-3" data-show="layers:2">
			<label class="form-label" for="tear2_price">2nd layer / square</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="tear2_price" name="tear2_price" value="50" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-6 col-md-4">
			<label class="form-label" for="deck_pct">Decking replaced</label>
			<div class="input-group">
				<input class="form-control" type="number" id="deck_pct" name="deck_pct" value="10" min="0" max="100" step="any" inputmode="decimal">
				<span class="input-group-text">%</span>
			</div>
		</div>
		<div class="col-6 col-md-4">
			<label class="form-label" for="sheet_price">Per 4×8 sheet</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="sheet_price" name="sheet_price" value="85" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-12 col-md-4">
			<label class="form-label" for="permit">Permit</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="permit" name="permit" value="400" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-12">
			<label class="form-label" for="region">Labor rates for</label>
			<select class="form-select" id="region" name="region"><?= region_options() ?></select>
		</div>
	</div>
</fieldset>
