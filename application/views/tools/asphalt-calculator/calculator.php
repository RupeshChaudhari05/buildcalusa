<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row g-3">
	<div class="col-6">
		<label class="form-label" for="length">Length</label>
		<div class="input-group">
			<input class="form-control" type="number" id="length" name="length" value="50" min="0" step="any" inputmode="decimal" data-u="len">
			<span class="input-group-text" data-ul="len">ft</span>
		</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="width">Width</label>
		<div class="input-group">
			<input class="form-control" type="number" id="width" name="width" value="12" min="0" step="any" inputmode="decimal" data-u="len">
			<span class="input-group-text" data-ul="len">ft</span>
		</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="thickness">Compacted thickness</label>
		<div class="input-group">
			<input class="form-control" type="number" id="thickness" name="thickness" value="3" min="0" step="any" inputmode="decimal" data-u="in">
			<span class="input-group-text" data-ul="in">in</span>
		</div>
		<div class="form-text">Driveway 2–3", heavy-duty 4"</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="density">Asphalt density</label>
		<div class="input-group">
			<input class="form-control" type="number" id="density" name="density" value="145" min="50" step="any" inputmode="decimal">
			<span class="input-group-text">lb/ft³</span>
		</div>
		<div class="form-text">145 lb/ft³ ≈ 2,320 kg/m³</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="waste">Waste &amp; compaction</label>
		<div class="input-group">
			<input class="form-control" type="number" id="waste" name="waste" value="5" min="0" max="50" step="any" inputmode="decimal">
			<span class="input-group-text">%</span>
		</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="ton_price">Hot mix price</label>
		<div class="input-group">
			<span class="input-group-text" data-cs>$</span>
			<input class="form-control" type="number" id="ton_price" name="ton_price" value="130" min="0" step="any" inputmode="decimal" data-u="pton" data-money>
			<span class="input-group-text" data-ul="pton">/ton</span>
		</div>
	</div>
</div>

<fieldset>
	<legend>Gravel base</legend>
	<div class="row g-3">
		<div class="col-12">
			<div class="form-check form-switch">
				<input class="form-check-input" type="checkbox" role="switch" id="base" name="base" value="1" checked>
				<label class="form-check-label" for="base">Include crushed-stone base</label>
			</div>
		</div>
		<div class="col-6" data-show="base:1">
			<label class="form-label" for="base_depth">Base depth</label>
			<div class="input-group">
				<input class="form-control" type="number" id="base_depth" name="base_depth" value="6" min="0" step="any" inputmode="decimal" data-u="in">
				<span class="input-group-text" data-ul="in">in</span>
			</div>
		</div>
		<div class="col-6" data-show="base:1">
			<label class="form-label" for="base_price">Base stone</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="base_price" name="base_price" value="35" min="0" step="any" inputmode="decimal" data-u="pton" data-money>
				<span class="input-group-text" data-ul="pton">/ton</span>
			</div>
		</div>
	</div>
</fieldset>

<fieldset>
	<legend>Installation</legend>
	<div class="row g-3">
		<div class="col-6">
			<label class="form-label" for="labor_price">Paving labor</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="labor_price" name="labor_price" value="3.5" min="0" step="any" inputmode="decimal" data-u="parea" data-money>
				<span class="input-group-text" data-ul="parea">/sq ft</span>
			</div>
			<div class="form-text">Grading, paving &amp; rolling</div>
		</div>
		<div class="col-6">
			<label class="form-label" for="region">Labor rates for</label>
			<select class="form-select" id="region" name="region"><?= region_options() ?></select>
		</div>
		<div class="col-12">
			<div class="form-check form-switch">
				<input class="form-check-input" type="checkbox" role="switch" id="diy" name="diy" value="1">
				<label class="form-check-label" for="diy">Material only (no labor cost)</label>
			</div>
		</div>
	</div>
</fieldset>
