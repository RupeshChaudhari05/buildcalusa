<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row g-3">
	<div class="col-6 col-md-4">
		<label class="form-label" for="length">Room length</label>
		<div class="input-group">
			<input class="form-control" type="number" id="length" name="length" value="14" min="0" step="any" inputmode="decimal" data-u="len">
			<span class="input-group-text" data-ul="len">ft</span>
		</div>
	</div>
	<div class="col-6 col-md-4">
		<label class="form-label" for="width">Room width</label>
		<div class="input-group">
			<input class="form-control" type="number" id="width" name="width" value="12" min="0" step="any" inputmode="decimal" data-u="len">
			<span class="input-group-text" data-ul="len">ft</span>
		</div>
	</div>
	<div class="col-12 col-md-4">
		<label class="form-label" for="height">Wall height</label>
		<div class="input-group">
			<input class="form-control" type="number" id="height" name="height" value="8" min="0" step="any" inputmode="decimal" data-u="len">
			<span class="input-group-text" data-ul="len">ft</span>
		</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="doors">Doors</label>
		<input class="form-control" type="number" id="doors" name="doors" value="1" min="0" step="1" inputmode="numeric">
	</div>
	<div class="col-6">
		<label class="form-label" for="windows">Windows</label>
		<input class="form-control" type="number" id="windows" name="windows" value="2" min="0" step="1" inputmode="numeric">
	</div>
	<div class="col-12">
		<div class="form-check form-switch">
			<input class="form-check-input" type="checkbox" role="switch" id="ceiling" name="ceiling" value="1" checked>
			<label class="form-check-label" for="ceiling">Include the ceiling</label>
		</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="sheet">Sheet size (½")</label>
		<select class="form-select" id="sheet" name="sheet" data-fill>
			<option value="32" data-set-sheet_price="15" selected>4 × 8 ft (32 sq ft)</option>
			<option value="40" data-set-sheet_price="19">4 × 10 ft (40 sq ft)</option>
			<option value="48" data-set-sheet_price="22">4 × 12 ft (48 sq ft)</option>
		</select>
	</div>
	<div class="col-6">
		<label class="form-label" for="waste">Waste</label>
		<div class="input-group">
			<input class="form-control" type="number" id="waste" name="waste" value="10" min="0" max="50" step="any" inputmode="decimal">
			<span class="input-group-text">%</span>
		</div>
	</div>
</div>

<fieldset>
	<legend>Prices (edit to match your quote)</legend>
	<div class="row g-3">
		<div class="col-6 col-md-3">
			<label class="form-label" for="sheet_price">Per sheet</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="sheet_price" name="sheet_price" value="15" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-6 col-md-3">
			<label class="form-label" for="mud_price">Mud (4.5 gal)</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="mud_price" name="mud_price" value="20" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-6 col-md-3">
			<label class="form-label" for="tape_price">Tape (250 ft)</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="tape_price" name="tape_price" value="5" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-6 col-md-3">
			<label class="form-label" for="screw_price">Screws (5 lb)</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="screw_price" name="screw_price" value="35" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-6 col-md-4">
			<label class="form-label" for="labor_price">Labor (hang + finish)</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="labor_price" name="labor_price" value="2" min="0" step="any" inputmode="decimal" data-u="parea" data-money>
				<span class="input-group-text" data-ul="parea">/sq ft</span>
			</div>
		</div>
		<div class="col-6 col-md-8">
			<label class="form-label" for="region">Labor rates for</label>
			<select class="form-select" id="region" name="region"><?= region_options() ?></select>
		</div>
		<div class="col-12">
			<div class="form-check form-switch">
				<input class="form-check-input" type="checkbox" role="switch" id="diy" name="diy" value="1">
				<label class="form-check-label" for="diy">DIY install (no labor cost)</label>
			</div>
		</div>
	</div>
</fieldset>
