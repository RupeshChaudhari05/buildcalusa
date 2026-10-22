<?php defined('BASEPATH') OR exit('No direct script access allowed');

// [field, label, USD each]
$items = array(
	array('mattress', 'Mattress or box spring', 90),
	array('couch', 'Couch or sofa', 125),
	array('fridge', 'Fridge or freezer (refrigerant)', 150),
	array('washer', 'Washer or dryer', 90),
	array('tv', 'TV', 75),
	array('piano', 'Upright piano', 350),
	array('hottub', 'Hot tub', 450),
);
?>
<div class="mb-3">
	<span class="form-label d-block">How do you want it priced?</span>
	<div class="seg flex-wrap" role="radiogroup" aria-label="Pricing mode">
		<input type="radio" name="mode" id="mode-truck" value="truck" checked><label for="mode-truck">By truckload</label>
		<input type="radio" name="mode" id="mode-items" value="items"><label for="mode-items">Single items</label>
	</div>
</div>

<div class="row g-3" data-show="mode:truck">
	<div class="col-12 col-md-6">
		<label class="form-label" for="load">How much of the truck</label>
		<select class="form-select" id="load" name="load" data-fill>
			<option value="min" data-yd="1" data-set-load_price="100">Minimum load (about 1 yd³)</option>
			<option value="eighth" data-yd="2" data-set-load_price="175">1/8 truck (about 2 yd³)</option>
			<option value="quarter" data-yd="4" data-set-load_price="275">1/4 truck (about 4 yd³)</option>
			<option value="half" data-yd="7.5" data-set-load_price="425" selected>1/2 truck (about 7.5 yd³)</option>
			<option value="threeq" data-yd="11" data-set-load_price="575">3/4 truck (about 11 yd³)</option>
			<option value="full" data-yd="15" data-set-load_price="700">Full truck (about 15 yd³)</option>
		</select>
		<div class="form-text">A half truck is roughly a one-car garage piled waist-high.</div>
	</div>
	<div class="col-6 col-md-3">
		<label class="form-label" for="load_price">Load price</label>
		<div class="input-group">
			<span class="input-group-text" data-cs>$</span>
			<input class="form-control" type="number" id="load_price" name="load_price" value="425" min="0" step="any" inputmode="decimal" data-money>
		</div>
	</div>
	<div class="col-6 col-md-3">
		<div class="form-check form-switch mt-md-4">
			<input class="form-check-input" type="checkbox" role="switch" id="heavy" name="heavy" value="1">
			<label class="form-check-label" for="heavy">Concrete, dirt or shingles</label>
		</div>
	</div>
</div>

<div class="row g-3" data-show="mode:items">
	<?php foreach ($items as $it): ?>
	<div class="col-6 col-md-4">
		<label class="form-label" for="<?= $it[0] ?>"><?= e($it[1]) ?></label>
		<input class="form-control" type="number" id="<?= $it[0] ?>" name="<?= $it[0] ?>" value="<?= $it[0] === 'couch' ? 1 : ($it[0] === 'mattress' ? 2 : 0) ?>" min="0" step="1" inputmode="numeric" data-price="<?= $it[2] ?>">
		<div class="form-text">About $<?= $it[2] ?> each</div>
	</div>
	<?php endforeach; ?>
</div>

<fieldset>
	<legend>Access and timing</legend>
	<div class="row g-3">
		<div class="col-6 col-md-4">
			<label class="form-label" for="flights">Flights of stairs</label>
			<input class="form-control" type="number" id="flights" name="flights" value="0" min="0" step="1" inputmode="numeric">
		</div>
		<div class="col-6 col-md-4">
			<label class="form-label" for="flight_price">Per flight</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="flight_price" name="flight_price" value="25" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-12 col-md-4">
			<div class="form-check form-switch mt-md-4">
				<input class="form-check-input" type="checkbox" role="switch" id="sameday" name="sameday" value="1">
				<label class="form-check-label" for="sameday">Same-day pickup</label>
			</div>
		</div>
		<div class="col-12 col-md-8">
			<label class="form-label" for="region">Prices for</label>
			<select class="form-select" id="region" name="region"><?= region_options() ?></select>
		</div>
	</div>
</fieldset>
