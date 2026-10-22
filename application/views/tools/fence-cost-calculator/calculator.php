<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row g-3">
	<div class="col-12">
		<label class="form-label" for="material">Fence material</label>
		<select class="form-select" id="material" name="material" data-fill>
			<option value="wood" data-kind="wood" data-life="15–20 yrs" data-set-mat_price="25" data-set-labor_price="12" data-set-gate_price="350" selected>Wood – pressure-treated pine privacy</option>
			<option value="cedar" data-kind="wood" data-life="20–30 yrs" data-set-mat_price="32" data-set-labor_price="13" data-set-gate_price="450">Wood – cedar privacy</option>
			<option value="vinyl" data-kind="vinyl" data-life="25–30 yrs" data-set-mat_price="35" data-set-labor_price="12" data-set-gate_price="500">Vinyl (PVC) privacy</option>
			<option value="chain" data-kind="chain" data-life="15–20 yrs" data-set-mat_price="15" data-set-labor_price="8" data-set-gate_price="250">Chain link (galvanized)</option>
			<option value="aluminum" data-kind="metal" data-life="30+ yrs" data-set-mat_price="32" data-set-labor_price="12" data-set-gate_price="550">Aluminum ornamental</option>
			<option value="composite" data-kind="wood" data-life="25–30 yrs" data-set-mat_price="45" data-set-labor_price="14" data-set-gate_price="650">Composite</option>
			<option value="iron" data-kind="metal" data-life="50+ yrs" data-set-mat_price="50" data-set-labor_price="18" data-set-gate_price="800">Wrought iron / steel</option>
		</select>
	</div>
	<div class="col-6">
		<label class="form-label" for="length">Fence length</label>
		<div class="input-group">
			<input class="form-control" type="number" id="length" name="length" value="150" min="0" step="any" inputmode="decimal" data-u="len">
			<span class="input-group-text" data-ul="len">ft</span>
		</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="height">Height</label>
		<select class="form-select" id="height" name="height">
			<option value="3" data-m="0.65" data-l="0.9">3 ft (0.9 m)</option>
			<option value="4" data-m="0.8" data-l="0.9">4 ft (1.2 m)</option>
			<option value="5" data-m="0.9" data-l="0.95">5 ft (1.5 m)</option>
			<option value="6" data-m="1" data-l="1" selected>6 ft (1.8 m)</option>
			<option value="8" data-m="1.35" data-l="1.25">8 ft (2.4 m)</option>
		</select>
	</div>
	<div class="col-6">
		<label class="form-label" for="gates">Gates</label>
		<input class="form-control" type="number" id="gates" name="gates" value="1" min="0" step="1" inputmode="numeric">
	</div>
	<div class="col-6">
		<label class="form-label" for="spacing">Post spacing</label>
		<div class="input-group">
			<input class="form-control" type="number" id="spacing" name="spacing" value="8" min="1" step="any" inputmode="decimal" data-u="len">
			<span class="input-group-text" data-ul="len">ft</span>
		</div>
	</div>
</div>

<fieldset>
	<legend>Prices (edit to match your quote)</legend>
	<div class="row g-3">
		<div class="col-6 col-md-4">
			<label class="form-label" for="mat_price">Material</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="mat_price" name="mat_price" value="25" min="0" step="any" inputmode="decimal" data-u="plen" data-money>
				<span class="input-group-text" data-ul="plen">/ft</span>
			</div>
		</div>
		<div class="col-6 col-md-4">
			<label class="form-label" for="labor_price">Labor</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="labor_price" name="labor_price" value="12" min="0" step="any" inputmode="decimal" data-u="plen" data-money>
				<span class="input-group-text" data-ul="plen">/ft</span>
			</div>
		</div>
		<div class="col-12 col-md-4">
			<label class="form-label" for="gate_price">Per gate</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="gate_price" name="gate_price" value="350" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-12 col-md-6">
			<label class="form-label" for="region">Labor rates for</label>
			<select class="form-select" id="region" name="region"><?= region_options() ?></select>
		</div>
		<div class="col-12 col-md-6">
			<label class="form-label" for="terrain">Ground / site</label>
			<select class="form-select" id="terrain" name="terrain">
				<option value="1" selected>Flat, easy digging</option>
				<option value="1.15">Sloped yard</option>
				<option value="1.25">Rocky or clay soil</option>
			</select>
		</div>
		<div class="col-12">
			<div class="form-check form-switch">
				<input class="form-check-input" type="checkbox" role="switch" id="diy" name="diy" value="1">
				<label class="form-check-label" for="diy">DIY install (no labor cost)</label>
			</div>
			<div class="form-check form-switch">
				<input class="form-check-input" type="checkbox" role="switch" id="removal" name="removal" value="1">
				<label class="form-check-label" for="removal">Remove &amp; haul away old fence</label>
			</div>
		</div>
		<div class="col-6" data-show="removal:1">
			<label class="form-label" for="removal_price">Removal</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="removal_price" name="removal_price" value="4" min="0" step="any" inputmode="decimal" data-u="plen" data-money>
				<span class="input-group-text" data-ul="plen">/ft</span>
			</div>
		</div>
	</div>
</fieldset>
