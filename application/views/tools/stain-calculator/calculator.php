<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="mb-3">
	<span class="form-label d-block">What are you staining?</span>
	<div class="seg" role="radiogroup" aria-label="Surface">
		<input type="radio" name="surface" id="surface-deck" value="deck" checked><label for="surface-deck">Deck</label>
		<input type="radio" name="surface" id="surface-fence" value="fence"><label for="surface-fence">Fence</label>
	</div>
</div>

<div class="row g-3" data-show="surface:deck">
	<div class="col-6">
		<label class="form-label" for="d_len">Deck length</label>
		<div class="input-group">
			<input class="form-control" type="number" id="d_len" name="d_len" value="16" min="0" step="any" inputmode="decimal" data-u="len">
			<span class="input-group-text" data-ul="len">ft</span>
		</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="d_wid">Deck width</label>
		<div class="input-group">
			<input class="form-control" type="number" id="d_wid" name="d_wid" value="12" min="0" step="any" inputmode="decimal" data-u="len">
			<span class="input-group-text" data-ul="len">ft</span>
		</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="rail_ft">Railing length</label>
		<div class="input-group">
			<input class="form-control" type="number" id="rail_ft" name="rail_ft" value="40" min="0" step="any" inputmode="decimal" data-u="len">
			<span class="input-group-text" data-ul="len">ft</span>
		</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="steps">Stair steps</label>
		<input class="form-control" type="number" id="steps" name="steps" value="3" min="0" step="1" inputmode="numeric">
	</div>
</div>

<div class="row g-3" data-show="surface:fence">
	<div class="col-6">
		<label class="form-label" for="f_len">Fence length</label>
		<div class="input-group">
			<input class="form-control" type="number" id="f_len" name="f_len" value="150" min="0" step="any" inputmode="decimal" data-u="len">
			<span class="input-group-text" data-ul="len">ft</span>
		</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="f_hgt">Fence height</label>
		<div class="input-group">
			<input class="form-control" type="number" id="f_hgt" name="f_hgt" value="6" min="0" step="any" inputmode="decimal" data-u="len">
			<span class="input-group-text" data-ul="len">ft</span>
		</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="sides">Sides</label>
		<select class="form-select" id="sides" name="sides">
			<option value="2" selected>Both sides</option>
			<option value="1">One side</option>
		</select>
	</div>
	<div class="col-6">
		<label class="form-label" for="style">Fence style</label>
		<select class="form-select" id="style" name="style">
			<option value="1" selected>Solid privacy</option>
			<option value="1.15">Board-on-board / shadowbox</option>
			<option value="0.7">Spaced pickets</option>
		</select>
	</div>
</div>

<fieldset>
	<legend>Stain</legend>
	<div class="row g-3">
		<div class="col-12 col-md-6">
			<label class="form-label" for="wood">Wood condition</label>
			<select class="form-select" id="wood" name="wood" data-fill>
				<option value="new" data-set-coverage="250">New, smooth boards</option>
				<option value="weathered" data-set-coverage="175" selected>Weathered, previously stained</option>
				<option value="rough" data-set-coverage="125">Rough-sawn or very dry</option>
			</select>
		</div>
		<div class="col-6 col-md-3">
			<label class="form-label" for="coverage">Coverage per gallon</label>
			<div class="input-group">
				<input class="form-control" type="number" id="coverage" name="coverage" value="175" min="20" step="any" inputmode="decimal" data-u="area">
				<span class="input-group-text" data-ul="area">sq ft</span>
			</div>
		</div>
		<div class="col-6 col-md-3">
			<label class="form-label" for="coats">Coats</label>
			<input class="form-control" type="number" id="coats" name="coats" value="1" min="1" max="3" step="1" inputmode="numeric">
		</div>
		<div class="col-12 col-md-6">
			<label class="form-label" for="product">Stain type</label>
			<select class="form-select" id="product" name="product" data-fill>
				<option value="transparent" data-set-stain_price="35" data-set-coats="1">Transparent / clear sealer</option>
				<option value="semi" data-set-stain_price="42" data-set-coats="1" selected>Semi-transparent</option>
				<option value="solid" data-set-stain_price="45" data-set-coats="2">Solid color</option>
			</select>
		</div>
		<div class="col-6 col-md-3">
			<label class="form-label" for="stain_price">Price per gallon</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="stain_price" name="stain_price" value="42" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-6 col-md-3">
			<label class="form-label" for="labor_price">Labor</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="labor_price" name="labor_price" value="1.25" min="0" step="any" inputmode="decimal" data-u="parea" data-money>
				<span class="input-group-text" data-ul="parea">/sq ft</span>
			</div>
		</div>
		<div class="col-12 col-md-6">
			<label class="form-label" for="region">Labor rates for</label>
			<select class="form-select" id="region" name="region"><?= region_options() ?></select>
		</div>
		<div class="col-12 col-md-6">
			<div class="form-check form-switch">
				<input class="form-check-input" type="checkbox" role="switch" id="cleaner" name="cleaner" value="1" checked>
				<label class="form-check-label" for="cleaner">Wood cleaner / brightener first</label>
			</div>
			<div class="form-check form-switch">
				<input class="form-check-input" type="checkbox" role="switch" id="diy" name="diy" value="1">
				<label class="form-check-label" for="diy">DIY (no labor cost)</label>
			</div>
		</div>
	</div>
</fieldset>
