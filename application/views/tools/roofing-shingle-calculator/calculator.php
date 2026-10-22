<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row g-3">
	<div class="col-6">
		<label class="form-label" for="length">Roof length</label>
		<div class="input-group">
			<input class="form-control" type="number" id="length" name="length" value="50" min="0" step="any" inputmode="decimal" data-u="len">
			<span class="input-group-text" data-ul="len">ft</span>
		</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="width">Roof width</label>
		<div class="input-group">
			<input class="form-control" type="number" id="width" name="width" value="30" min="0" step="any" inputmode="decimal" data-u="len">
			<span class="input-group-text" data-ul="len">ft</span>
		</div>
	</div>
	<div class="col-12"><div class="form-text mt-0">Measure the house footprint including overhangs (eaves and rakes).</div></div>
	<div class="col-6">
		<label class="form-label" for="pitch">Roof pitch</label>
		<select class="form-select" id="pitch" name="pitch">
			<?php foreach (array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 14, 16) as $p): $m = sqrt(1 + pow($p / 12, 2)); ?>
			<option value="<?= $p ?>"<?= $p === 6 ? ' selected' : '' ?>><?= $p ?>/12 (× <?= number_format($m, 3) ?>)</option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="col-6">
		<label class="form-label" for="style">Roof style</label>
		<select class="form-select" id="style" name="style" data-fill>
			<option value="gable" data-set-waste="10" selected>Gable (2 sides)</option>
			<option value="hip" data-set-waste="15">Hip (4 sides)</option>
			<option value="complex" data-set-waste="20">Complex / cut-up</option>
		</select>
	</div>
	<div class="col-6">
		<label class="form-label" for="shingle">Shingle type</label>
		<select class="form-select" id="shingle" name="shingle" data-fill>
			<option value="3tab" data-set-bundle_price="32">3-tab asphalt</option>
			<option value="arch" data-set-bundle_price="40" selected>Architectural</option>
			<option value="premium" data-set-bundle_price="65">Premium / designer</option>
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
		<label class="form-label" for="underlay">Underlayment</label>
		<select class="form-select" id="underlay" name="underlay" data-fill>
			<option value="synthetic" data-sq="10" data-set-underlay_price="120" selected>Synthetic (10 squares/roll)</option>
			<option value="felt" data-sq="4" data-set-underlay_price="30">#15 felt (4 squares/roll)</option>
		</select>
	</div>
</div>

<fieldset>
	<legend>Prices (edit to match your quote)</legend>
	<div class="row g-3">
		<div class="col-6 col-md-4">
			<label class="form-label" for="bundle_price">Per bundle</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="bundle_price" name="bundle_price" value="40" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-6 col-md-4">
			<label class="form-label" for="underlay_price">Per roll</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="underlay_price" name="underlay_price" value="120" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-12 col-md-4">
			<label class="form-label" for="labor_price">Labor per square</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="labor_price" name="labor_price" value="180" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-12">
			<label class="form-label" for="region">Labor rates for</label>
			<select class="form-select" id="region" name="region"><?= region_options() ?></select>
		</div>
		<div class="col-12">
			<div class="form-check form-switch">
				<input class="form-check-input" type="checkbox" role="switch" id="diy" name="diy" value="1">
				<label class="form-check-label" for="diy">DIY install (no labor cost)</label>
			</div>
			<div class="form-check form-switch">
				<input class="form-check-input" type="checkbox" role="switch" id="tearoff" name="tearoff" value="1" checked>
				<label class="form-check-label" for="tearoff">Tear off &amp; dispose of old shingles</label>
			</div>
		</div>
		<div class="col-6" data-show="tearoff:1">
			<label class="form-label" for="tearoff_price">Tear-off per square</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="tearoff_price" name="tearoff_price" value="100" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
	</div>
</fieldset>
