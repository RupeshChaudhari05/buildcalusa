<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row g-3">
	<div class="col-12">
		<label class="form-label" for="type">Flooring type</label>
		<select class="form-select" id="type" name="type" data-fill>
			<option value="laminate" data-pad="1" data-set-box_size="20" data-set-mat_price="2.5" data-set-labor_price="2.5">Laminate</option>
			<option value="lvp" data-pad="0" data-set-box_size="24" data-set-mat_price="3.5" data-set-labor_price="3" selected>Luxury vinyl plank (LVP), pad attached</option>
			<option value="engineered" data-pad="1" data-set-box_size="22" data-set-mat_price="6" data-set-labor_price="5">Engineered hardwood</option>
			<option value="solid" data-pad="1" data-set-box_size="20" data-set-mat_price="7" data-set-labor_price="6">Solid hardwood (nail-down)</option>
			<option value="carpet" data-pad="0" data-set-mat_price="3.25" data-set-labor_price="1.25">Carpet with pad</option>
		</select>
	</div>
	<div class="col-6 col-md-4">
		<label class="form-label" for="length">Room length</label>
		<div class="input-group">
			<input class="form-control" type="number" id="length" name="length" value="15" min="0" step="any" inputmode="decimal" data-u="len">
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
		<label class="form-label" for="extra">Closets, halls (extra)</label>
		<div class="input-group">
			<input class="form-control" type="number" id="extra" name="extra" value="0" min="0" step="any" inputmode="decimal" data-u="area">
			<span class="input-group-text" data-ul="area">sq ft</span>
		</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="layout">Layout</label>
		<select class="form-select" id="layout" name="layout" data-fill>
			<option value="straight" data-set-waste="10" selected>Straight lay</option>
			<option value="diagonal" data-set-waste="15">Diagonal</option>
			<option value="herringbone" data-set-waste="20">Herringbone / chevron</option>
		</select>
	</div>
	<div class="col-6">
		<label class="form-label" for="waste">Waste</label>
		<div class="input-group">
			<input class="form-control" type="number" id="waste" name="waste" value="10" min="0" max="50" step="any" inputmode="decimal">
			<span class="input-group-text">%</span>
		</div>
	</div>
	<div class="col-12 col-md-6" data-show="type:laminate|lvp|engineered|solid">
		<label class="form-label" for="box_size">Coverage per box</label>
		<div class="input-group">
			<input class="form-control" type="number" id="box_size" name="box_size" value="24" min="1" step="any" inputmode="decimal" data-u="area">
			<span class="input-group-text" data-ul="area">sq ft</span>
		</div>
		<div class="form-text">Printed on the end of the carton.</div>
	</div>
	<div class="col-12">
		<div class="form-check form-switch">
			<input class="form-check-input" type="checkbox" role="switch" id="underlay" name="underlay" value="1">
			<label class="form-check-label" for="underlay">Add underlayment (laminate and floating wood)</label>
		</div>
		<div class="form-check form-switch">
			<input class="form-check-input" type="checkbox" role="switch" id="trim" name="trim" value="1">
			<label class="form-check-label" for="trim">Add quarter round / base shoe</label>
		</div>
		<div class="form-check form-switch">
			<input class="form-check-input" type="checkbox" role="switch" id="removal" name="removal" value="1">
			<label class="form-check-label" for="removal">Tear out and haul away the old floor</label>
		</div>
	</div>
</div>

<fieldset>
	<legend>Prices (edit to match your quote)</legend>
	<div class="row g-3">
		<div class="col-6 col-md-4">
			<label class="form-label" for="mat_price">Flooring</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="mat_price" name="mat_price" value="3.5" min="0" step="any" inputmode="decimal" data-u="parea" data-money>
				<span class="input-group-text" data-ul="parea">/sq ft</span>
			</div>
		</div>
		<div class="col-6 col-md-4">
			<label class="form-label" for="labor_price">Install labor</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="labor_price" name="labor_price" value="3" min="0" step="any" inputmode="decimal" data-u="parea" data-money>
				<span class="input-group-text" data-ul="parea">/sq ft</span>
			</div>
		</div>
		<div class="col-6 col-md-4" data-show="underlay:1">
			<label class="form-label" for="underlay_price">Underlayment roll (100 sq ft)</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="underlay_price" name="underlay_price" value="30" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-6 col-md-4" data-show="trim:1">
			<label class="form-label" for="trim_price">Quarter round (8 ft piece)</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="trim_price" name="trim_price" value="9" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-6 col-md-4" data-show="removal:1">
			<label class="form-label" for="removal_price">Removal</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="removal_price" name="removal_price" value="1.5" min="0" step="any" inputmode="decimal" data-u="parea" data-money>
				<span class="input-group-text" data-ul="parea">/sq ft</span>
			</div>
		</div>
		<div class="col-12 col-md-8">
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
