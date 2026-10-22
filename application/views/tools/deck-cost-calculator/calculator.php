<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row g-3">
	<div class="col-6">
		<label class="form-label" for="length">Deck length (along the house)</label>
		<div class="input-group">
			<input class="form-control" type="number" id="length" name="length" value="16" min="0" step="any" inputmode="decimal" data-u="len">
			<span class="input-group-text" data-ul="len">ft</span>
		</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="width">Deck width (out from the house)</label>
		<div class="input-group">
			<input class="form-control" type="number" id="width" name="width" value="12" min="0" step="any" inputmode="decimal" data-u="len">
			<span class="input-group-text" data-ul="len">ft</span>
		</div>
	</div>
	<div class="col-12 col-md-6">
		<label class="form-label" for="elev">Height off the ground</label>
		<select class="form-select" id="elev" name="elev">
			<option value="0.85">Ground level (under 2 ft)</option>
			<option value="1" selected>Raised (2 to 6 ft)</option>
			<option value="1.35">Second story (over 6 ft)</option>
		</select>
	</div>
	<div class="col-12 col-md-6">
		<label class="form-label" for="decking">Decking</label>
		<select class="form-select" id="decking" name="decking" data-fill>
			<option value="pt" data-set-deck_price="4" selected>Pressure-treated pine</option>
			<option value="cedar" data-set-deck_price="7">Cedar</option>
			<option value="composite" data-set-deck_price="11">Composite</option>
			<option value="pvc" data-set-deck_price="14">PVC</option>
			<option value="ipe" data-set-deck_price="15">Ipe (tropical hardwood)</option>
		</select>
	</div>
	<div class="col-6 col-md-4">
		<label class="form-label" for="footings">Footings</label>
		<input class="form-control" type="number" id="footings" name="footings" value="" min="0" step="1" inputmode="numeric" placeholder="Auto">
		<div class="form-text">Blank = about 1 per 40 sq ft.</div>
	</div>
	<div class="col-6 col-md-4">
		<label class="form-label" for="steps">Stair steps</label>
		<input class="form-control" type="number" id="steps" name="steps" value="3" min="0" step="1" inputmode="numeric">
	</div>
	<div class="col-12 col-md-4">
		<div class="form-check form-switch mt-md-4">
			<input class="form-check-input" type="checkbox" role="switch" id="railing" name="railing" value="1" checked>
			<label class="form-check-label" for="railing">Railing</label>
		</div>
	</div>
	<div class="col-6" data-show="railing:1">
		<label class="form-label" for="rail_type">Railing type</label>
		<select class="form-select" id="rail_type" name="rail_type" data-fill>
			<option value="wood" data-set-rail_price="30" selected>Pressure-treated wood</option>
			<option value="composite" data-set-rail_price="60">Composite</option>
			<option value="aluminum" data-set-rail_price="75">Aluminum</option>
			<option value="cable" data-set-rail_price="110">Cable</option>
		</select>
	</div>
	<div class="col-6" data-show="railing:1">
		<label class="form-label" for="rail_ft">Railing length</label>
		<div class="input-group">
			<input class="form-control" type="number" id="rail_ft" name="rail_ft" value="" min="0" step="any" inputmode="decimal" data-u="len" placeholder="Auto">
			<span class="input-group-text" data-ul="len">ft</span>
		</div>
		<div class="form-text">Blank = 3 open sides.</div>
	</div>
</div>

<fieldset>
	<legend>Prices (edit to match your quote)</legend>
	<div class="row g-3">
		<div class="col-6 col-md-4">
			<label class="form-label" for="deck_price">Decking</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="deck_price" name="deck_price" value="4" min="0" step="any" inputmode="decimal" data-u="parea" data-money>
				<span class="input-group-text" data-ul="parea">/sq ft</span>
			</div>
		</div>
		<div class="col-6 col-md-4">
			<label class="form-label" for="frame_price">Framing lumber &amp; hardware</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="frame_price" name="frame_price" value="6" min="0" step="any" inputmode="decimal" data-u="parea" data-money>
				<span class="input-group-text" data-ul="parea">/sq ft</span>
			</div>
		</div>
		<div class="col-6 col-md-4">
			<label class="form-label" for="labor_price">Labor</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="labor_price" name="labor_price" value="18" min="0" step="any" inputmode="decimal" data-u="parea" data-money>
				<span class="input-group-text" data-ul="parea">/sq ft</span>
			</div>
		</div>
		<div class="col-6 col-md-4">
			<label class="form-label" for="footing_price">Per footing</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="footing_price" name="footing_price" value="120" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-6 col-md-4" data-show="railing:1">
			<label class="form-label" for="rail_price">Railing, installed</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="rail_price" name="rail_price" value="30" min="0" step="any" inputmode="decimal" data-u="plen" data-money>
				<span class="input-group-text" data-ul="plen">/ft</span>
			</div>
		</div>
		<div class="col-6 col-md-4">
			<label class="form-label" for="step_price">Per stair step, built</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="step_price" name="step_price" value="90" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-6 col-md-4">
			<label class="form-label" for="permit">Permit</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="permit" name="permit" value="300" min="0" step="any" inputmode="decimal" data-money>
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
			<div class="form-check form-switch">
				<input class="form-check-input" type="checkbox" role="switch" id="demo" name="demo" value="1">
				<label class="form-check-label" for="demo">Tear out and haul away an old deck</label>
			</div>
		</div>
		<div class="col-6" data-show="demo:1">
			<label class="form-label" for="demo_price">Demolition</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="demo_price" name="demo_price" value="5" min="0" step="any" inputmode="decimal" data-u="parea" data-money>
				<span class="input-group-text" data-ul="parea">/sq ft</span>
			</div>
		</div>
	</div>
</fieldset>
