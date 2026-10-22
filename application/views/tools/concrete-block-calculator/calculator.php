<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row g-3">
	<div class="col-6">
		<label class="form-label" for="length">Wall length</label>
		<div class="input-group">
			<input class="form-control" type="number" id="length" name="length" value="30" min="0" step="any" inputmode="decimal" data-u="len">
			<span class="input-group-text" data-ul="len">ft</span>
		</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="height">Wall height</label>
		<div class="input-group">
			<input class="form-control" type="number" id="height" name="height" value="8" min="0" step="any" inputmode="decimal" data-u="len">
			<span class="input-group-text" data-ul="len">ft</span>
		</div>
	</div>
	<div class="col-12">
		<label class="form-label" for="block">Block size</label>
		<select class="form-select" id="block" name="block" data-fill>
			<option value="8" data-core="0.28" data-set-block_price="2.4" selected>8 × 8 × 16 in standard CMU</option>
			<option value="6" data-core="0.18" data-set-block_price="2.2">6 × 8 × 16 in</option>
			<option value="12" data-core="0.45" data-set-block_price="3.8">12 × 8 × 16 in</option>
			<option value="4" data-core="0" data-set-block_price="1.9">4 × 8 × 16 in solid</option>
		</select>
	</div>
	<div class="col-6">
		<label class="form-label" for="openings">Openings to deduct</label>
		<div class="input-group">
			<input class="form-control" type="number" id="openings" name="openings" value="0" min="0" step="any" inputmode="decimal" data-u="area">
			<span class="input-group-text" data-ul="area">sq ft</span>
		</div>
		<div class="form-text">Doors and windows. A 3 × 7 ft door is 21 sq ft.</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="waste">Waste &amp; breakage</label>
		<div class="input-group">
			<input class="form-control" type="number" id="waste" name="waste" value="5" min="0" step="any" inputmode="decimal">
			<span class="input-group-text">%</span>
		</div>
	</div>
	<div class="col-12">
		<label class="form-label" for="fill">Core fill (grout)</label>
		<select class="form-select" id="fill" name="fill">
			<option value="none">None</option>
			<option value="48" selected>Rebar cells every 48 in</option>
			<option value="full">Fully grouted</option>
		</select>
	</div>
</div>

<fieldset>
	<legend>Prices (edit to match your quote)</legend>
	<div class="row g-3">
		<div class="col-6 col-md-4">
			<label class="form-label" for="block_price">Per block</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="block_price" name="block_price" value="2.4" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-6 col-md-4">
			<label class="form-label" for="mortar_price">Mortar, 80 lb bag</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="mortar_price" name="mortar_price" value="9" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-6 col-md-4">
			<label class="form-label" for="grout_price">Grout, 80 lb bag</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="grout_price" name="grout_price" value="6.5" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-6 col-md-4">
			<label class="form-label" for="labor_price">Labor</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="labor_price" name="labor_price" value="12" min="0" step="any" inputmode="decimal" data-u="parea" data-money>
				<span class="input-group-text" data-ul="parea">/sq ft</span>
			</div>
		</div>
		<div class="col-12 col-md-8">
			<label class="form-label" for="region">Labor rates for</label>
			<select class="form-select" id="region" name="region"><?= region_options() ?></select>
		</div>
		<div class="col-12">
			<div class="form-check form-switch">
				<input class="form-check-input" type="checkbox" role="switch" id="diy" name="diy" value="1">
				<label class="form-check-label" for="diy">DIY build (no labor cost)</label>
			</div>
		</div>
	</div>
</fieldset>
