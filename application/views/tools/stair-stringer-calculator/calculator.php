<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row g-3">
	<div class="col-12">
		<label class="form-label" for="rise">Total rise (finished floor to finished floor)</label>
		<div class="input-group">
			<input class="form-control" type="number" id="rise" name="rise" value="108" min="0" step="any" inputmode="decimal" data-u="in">
			<span class="input-group-text" data-ul="in">in</span>
		</div>
		<div class="form-text">Measure plumb from the lower finished floor to the top of the upper finished floor.</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="max_riser">Max riser height</label>
		<div class="input-group">
			<input class="form-control" type="number" id="max_riser" name="max_riser" value="7.75" min="1" step="any" inputmode="decimal" data-u="in">
			<span class="input-group-text" data-ul="in">in</span>
		</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="tread">Tread depth (run)</label>
		<div class="input-group">
			<input class="form-control" type="number" id="tread" name="tread" value="10.5" min="1" step="any" inputmode="decimal" data-u="in">
			<span class="input-group-text" data-ul="in">in</span>
		</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="nosing">Nosing</label>
		<div class="input-group">
			<input class="form-control" type="number" id="nosing" name="nosing" value="1" min="0" step="any" inputmode="decimal" data-u="in">
			<span class="input-group-text" data-ul="in">in</span>
		</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="width">Stair width</label>
		<div class="input-group">
			<input class="form-control" type="number" id="width" name="width" value="36" min="1" step="any" inputmode="decimal" data-u="in">
			<span class="input-group-text" data-ul="in">in</span>
		</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="spacing">Max stringer spacing</label>
		<div class="input-group">
			<input class="form-control" type="number" id="spacing" name="spacing" value="16" min="6" step="any" inputmode="decimal" data-u="in">
			<span class="input-group-text" data-ul="in">in</span>
		</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="lumber">Stringer lumber</label>
		<select class="form-select" id="lumber" name="lumber" data-fill>
			<option value="pt" data-set-stringer_price="2.6" selected>2×12 pressure-treated</option>
			<option value="df" data-set-stringer_price="2.3">2×12 Douglas fir / SPF</option>
			<option value="lvl" data-set-stringer_price="7.5">LVL 1¾×11⅞</option>
		</select>
	</div>
</div>

<fieldset>
	<legend>Prices (edit to match your quote)</legend>
	<div class="row g-3">
		<div class="col-6 col-md-4">
			<label class="form-label" for="stringer_price">Stringer lumber</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="stringer_price" name="stringer_price" value="2.6" min="0" step="any" inputmode="decimal" data-u="plen" data-money>
				<span class="input-group-text" data-ul="plen">/ft</span>
			</div>
		</div>
		<div class="col-6 col-md-4">
			<label class="form-label" for="tread_price">Per tread</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="tread_price" name="tread_price" value="25" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-12 col-md-4">
			<label class="form-label" for="labor_price">Labor per step</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="labor_price" name="labor_price" value="120" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-12 col-md-6">
			<label class="form-label" for="region">Labor rates for</label>
			<select class="form-select" id="region" name="region"><?= region_options() ?></select>
		</div>
		<div class="col-12 col-md-6 d-flex align-items-end">
			<div class="form-check form-switch">
				<input class="form-check-input" type="checkbox" role="switch" id="diy" name="diy" value="1">
				<label class="form-check-label" for="diy">DIY build (no labor cost)</label>
			</div>
		</div>
	</div>
</fieldset>

<fieldset>
	<legend>Stringer layout</legend>
	<svg id="stair-svg" class="diagram" viewBox="0 0 400 240" role="img" aria-label="Stair stringer diagram"></svg>
</fieldset>
