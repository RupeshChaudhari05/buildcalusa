<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row g-3">
	<div class="col-12 col-md-6">
		<label class="form-label" for="location">Where</label>
		<select class="form-select" id="location" name="location">
			<option value="attic" selected>Attic floor</option>
			<option value="walls">Exterior walls (open stud cavities)</option>
			<option value="floor">Floor over crawlspace or garage</option>
		</select>
	</div>
	<div class="col-12 col-md-6">
		<label class="form-label" for="zone">Climate zone</label>
		<select class="form-select" id="zone" name="zone">
			<option value="1">Zone 1: south Florida, Hawaii</option>
			<option value="2">Zone 2: Gulf Coast, south Texas, Phoenix</option>
			<option value="3">Zone 3: Georgia, Carolinas, Oklahoma, Las Vegas, most of California</option>
			<option value="4" selected>Zone 4: Virginia, Kentucky, Missouri, Kansas, Maryland, Seattle</option>
			<option value="5">Zone 5: Ohio, Illinois, Pennsylvania, Iowa, Colorado, upstate NY</option>
			<option value="6">Zone 6: Wisconsin, Michigan, Vermont, Montana, Maine</option>
			<option value="7">Zone 7: northern Minnesota, North Dakota, mountain areas</option>
			<option value="8">Zone 8: interior Alaska</option>
		</select>
	</div>
	<div class="col-6">
		<label class="form-label" for="length">Length</label>
		<div class="input-group">
			<input class="form-control" type="number" id="length" name="length" value="40" min="0" step="any" inputmode="decimal" data-u="len">
			<span class="input-group-text" data-ul="len">ft</span>
		</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="width">Width (or wall height)</label>
		<div class="input-group">
			<input class="form-control" type="number" id="width" name="width" value="30" min="0" step="any" inputmode="decimal" data-u="len">
			<span class="input-group-text" data-ul="len">ft</span>
		</div>
	</div>
	<div class="col-6" data-show="location:attic">
		<label class="form-label" for="existing_r">Existing insulation</label>
		<div class="input-group">
			<span class="input-group-text">R-</span>
			<input class="form-control" type="number" id="existing_r" name="existing_r" value="11" min="0" step="any" inputmode="decimal">
		</div>
		<div class="form-text">Inches of old fiberglass × 3 is close enough.</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="target_r">Target R (0 = recommended)</label>
		<div class="input-group">
			<span class="input-group-text">R-</span>
			<input class="form-control" type="number" id="target_r" name="target_r" value="0" min="0" step="any" inputmode="decimal">
		</div>
	</div>
	<div class="col-12">
		<label class="form-label" for="type">Insulation type</label>
		<select class="form-select" id="type" name="type">
			<option value="batts">Fiberglass batts or rolls</option>
			<option value="cellulose" selected>Blown-in cellulose</option>
			<option value="blownfg">Blown-in fiberglass</option>
			<option value="foam">Closed-cell spray foam (installed price)</option>
		</select>
	</div>
</div>

<fieldset>
	<legend>Prices (edit to match your quote)</legend>
	<div class="row g-3">
		<div class="col-12 col-md-6" data-show="type:batts">
			<label class="form-label" for="batt_price">Batts, per sq ft for each R-10</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="batt_price" name="batt_price" value="0.36" min="0" step="any" inputmode="decimal" data-money>
			</div>
			<div class="form-text">$0.36 means R-30 batts cost about $1.08 per sq ft.</div>
		</div>
		<div class="col-6 col-md-4" data-show="type:cellulose">
			<label class="form-label" for="cell_price">Cellulose bag (25 lb)</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="cell_price" name="cell_price" value="16" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-6 col-md-4" data-show="type:blownfg">
			<label class="form-label" for="fg_price">Blown fiberglass bag</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="fg_price" name="fg_price" value="45" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-6 col-md-4" data-show="type:foam">
			<label class="form-label" for="foam_price">Spray foam, per board foot</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="foam_price" name="foam_price" value="1.25" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-6 col-md-4" data-show="type:batts|cellulose|blownfg">
			<label class="form-label" for="labor_price">Install labor</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="labor_price" name="labor_price" value="1" min="0" step="any" inputmode="decimal" data-u="parea" data-money>
				<span class="input-group-text" data-ul="parea">/sq ft</span>
			</div>
		</div>
		<div class="col-12 col-md-8">
			<label class="form-label" for="region">Labor rates for</label>
			<select class="form-select" id="region" name="region"><?= region_options() ?></select>
		</div>
		<div class="col-12" data-show="type:batts|cellulose|blownfg">
			<div class="form-check form-switch">
				<input class="form-check-input" type="checkbox" role="switch" id="diy" name="diy" value="1">
				<label class="form-check-label" for="diy">DIY (stores often lend the blower free with a bag purchase)</label>
			</div>
		</div>
	</div>
</fieldset>
