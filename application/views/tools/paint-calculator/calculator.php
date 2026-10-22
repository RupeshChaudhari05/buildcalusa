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
	<div class="col-4">
		<label class="form-label" for="doors">Doors</label>
		<input class="form-control" type="number" id="doors" name="doors" value="1" min="0" step="1" inputmode="numeric">
	</div>
	<div class="col-4">
		<label class="form-label" for="windows">Windows</label>
		<input class="form-control" type="number" id="windows" name="windows" value="2" min="0" step="1" inputmode="numeric">
	</div>
	<div class="col-4">
		<label class="form-label" for="coats">Wall coats</label>
		<input class="form-control" type="number" id="coats" name="coats" value="2" min="1" max="4" step="1" inputmode="numeric">
	</div>
	<div class="col-6">
		<label class="form-label" for="coverage">Coverage per gallon</label>
		<div class="input-group">
			<input class="form-control" type="number" id="coverage" name="coverage" value="350" min="50" step="any" inputmode="decimal" data-u="area">
			<span class="input-group-text" data-ul="area">sq ft</span>
		</div>
		<div class="form-text">Use 250–300 on new drywall, rough plaster or a dark-to-light color change.</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="grade">Wall paint grade</label>
		<select class="form-select" id="grade" name="grade" data-fill>
			<option value="contractor" data-set-paint_price="30">Contractor grade</option>
			<option value="mid" data-set-paint_price="45" selected>Mid grade</option>
			<option value="premium" data-set-paint_price="65">Premium</option>
		</select>
	</div>
	<div class="col-12">
		<div class="form-check form-switch">
			<input class="form-check-input" type="checkbox" role="switch" id="ceiling" name="ceiling" value="1">
			<label class="form-check-label" for="ceiling">Paint the ceiling</label>
		</div>
		<div class="form-check form-switch">
			<input class="form-check-input" type="checkbox" role="switch" id="trim" name="trim" value="1">
			<label class="form-check-label" for="trim">Paint trim (baseboard, door and window casing)</label>
		</div>
		<div class="form-check form-switch">
			<input class="form-check-input" type="checkbox" role="switch" id="primer" name="primer" value="1">
			<label class="form-check-label" for="primer">Prime first (new drywall, patches, stains)</label>
		</div>
	</div>
	<div class="col-6" data-show="ceiling:1">
		<label class="form-label" for="ceiling_coats">Ceiling coats</label>
		<select class="form-select" id="ceiling_coats" name="ceiling_coats">
			<option value="1" selected>1 coat (repaint, same color)</option>
			<option value="2">2 coats (new or stained ceiling)</option>
		</select>
	</div>
</div>

<fieldset>
	<legend>Prices (edit to match your store)</legend>
	<div class="row g-3">
		<div class="col-6 col-md-3">
			<label class="form-label" for="paint_price">Wall paint</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="paint_price" name="paint_price" value="45" min="0" step="any" inputmode="decimal" data-money>
				<span class="input-group-text">/gal</span>
			</div>
		</div>
		<div class="col-6 col-md-3" data-show="ceiling:1">
			<label class="form-label" for="ceiling_price">Ceiling paint</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="ceiling_price" name="ceiling_price" value="30" min="0" step="any" inputmode="decimal" data-money>
				<span class="input-group-text">/gal</span>
			</div>
		</div>
		<div class="col-6 col-md-3" data-show="trim:1">
			<label class="form-label" for="trim_price">Trim enamel</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="trim_price" name="trim_price" value="55" min="0" step="any" inputmode="decimal" data-money>
				<span class="input-group-text">/gal</span>
			</div>
		</div>
		<div class="col-6 col-md-3" data-show="primer:1">
			<label class="form-label" for="primer_price">Primer</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="primer_price" name="primer_price" value="28" min="0" step="any" inputmode="decimal" data-money>
				<span class="input-group-text">/gal</span>
			</div>
		</div>
		<div class="col-6 col-md-4">
			<label class="form-label" for="labor_price">Labor (walls + ceiling)</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="labor_price" name="labor_price" value="2.25" min="0" step="any" inputmode="decimal" data-u="parea" data-money>
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
				<label class="form-check-label" for="diy">I'm painting it myself (no labor cost)</label>
			</div>
		</div>
	</div>
</fieldset>
