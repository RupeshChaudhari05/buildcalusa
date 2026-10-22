<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row g-3">
	<div class="col-12 col-md-6">
		<label class="form-label" for="size">Dumpster size</label>
		<select class="form-select" id="size" name="size" data-fill>
			<option value="10" data-set-base_price="350" data-set-incl_tons="2">10 yard (about 14 × 7.5 × 3.5 ft)</option>
			<option value="15" data-set-base_price="400" data-set-incl_tons="2.5">15 yard (about 14 × 7.5 × 4.5 ft)</option>
			<option value="20" data-set-base_price="450" data-set-incl_tons="3" selected>20 yard (about 22 × 7.5 × 4.5 ft)</option>
			<option value="30" data-set-base_price="550" data-set-incl_tons="4">30 yard (about 22 × 7.5 × 6 ft)</option>
			<option value="40" data-set-base_price="650" data-set-incl_tons="5">40 yard (about 22 × 7.5 × 8 ft)</option>
		</select>
	</div>
	<div class="col-12 col-md-6">
		<label class="form-label" for="debris">What goes in it</label>
		<select class="form-select" id="debris" name="debris">
			<option value="mixed" selected>Mixed construction &amp; household debris</option>
			<option value="heavy">Clean concrete, brick or dirt (heavy debris)</option>
			<option value="yard">Yard waste only</option>
		</select>
	</div>
	<div class="col-6 col-md-4">
		<label class="form-label" for="days">Rental days</label>
		<input class="form-control" type="number" id="days" name="days" value="7" min="1" step="1" inputmode="numeric">
	</div>
	<div class="col-6 col-md-4">
		<label class="form-label" for="est_tons">Your debris weight</label>
		<div class="input-group">
			<input class="form-control" type="number" id="est_tons" name="est_tons" value="2.5" min="0" step="any" inputmode="decimal" data-u="ton">
			<span class="input-group-text" data-ul="ton">tons</span>
		</div>
		<div class="form-text">Roof tear-off: about 1.5 to 2 tons per 1,000 sq ft.</div>
	</div>
	<div class="col-12 col-md-4">
		<div class="form-check form-switch mt-md-4">
			<input class="form-check-input" type="checkbox" role="switch" id="permit" name="permit" value="1">
			<label class="form-check-label" for="permit">Sits on the street (permit)</label>
		</div>
		<div class="form-check form-switch">
			<input class="form-check-input" type="checkbox" role="switch" id="distance" name="distance" value="1">
			<label class="form-check-label" for="distance">Outside the hauler's normal area</label>
		</div>
	</div>
</div>

<fieldset>
	<legend>Hauler's terms (edit to match your quote)</legend>
	<div class="row g-3">
		<div class="col-6 col-md-4">
			<label class="form-label" for="base_price">Base price</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="base_price" name="base_price" value="450" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-6 col-md-4">
			<label class="form-label" for="incl_tons">Weight included</label>
			<div class="input-group">
				<input class="form-control" type="number" id="incl_tons" name="incl_tons" value="3" min="0" step="any" inputmode="decimal" data-u="ton">
				<span class="input-group-text" data-ul="ton">tons</span>
			</div>
		</div>
		<div class="col-6 col-md-4">
			<label class="form-label" for="overage_price">Overweight fee</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="overage_price" name="overage_price" value="75" min="0" step="any" inputmode="decimal" data-u="pton" data-money>
				<span class="input-group-text" data-ul="pton">/ton</span>
			</div>
		</div>
		<div class="col-6 col-md-4">
			<label class="form-label" for="incl_days">Days included</label>
			<input class="form-control" type="number" id="incl_days" name="incl_days" value="7" min="1" step="1" inputmode="numeric">
		</div>
		<div class="col-6 col-md-4">
			<label class="form-label" for="extra_day">Each extra day</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="extra_day" name="extra_day" value="10" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-6 col-md-4" data-show="debris:heavy">
			<label class="form-label" for="heavy_fee">Heavy-debris surcharge</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="heavy_fee" name="heavy_fee" value="100" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-6 col-md-4" data-show="permit:1">
			<label class="form-label" for="permit_price">Street permit</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="permit_price" name="permit_price" value="50" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-6 col-md-4" data-show="distance:1">
			<label class="form-label" for="distance_fee">Distance surcharge</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="distance_fee" name="distance_fee" value="75" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-12 col-md-8">
			<label class="form-label" for="region">Prices for</label>
			<select class="form-select" id="region" name="region"><?= region_options() ?></select>
		</div>
	</div>
</fieldset>
