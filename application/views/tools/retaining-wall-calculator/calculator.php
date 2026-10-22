<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row g-3">
	<div class="col-6">
		<label class="form-label" for="length">Wall length</label>
		<div class="input-group">
			<input class="form-control" type="number" id="length" name="length" value="40" min="0" step="any" inputmode="decimal" data-u="len">
			<span class="input-group-text" data-ul="len">ft</span>
		</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="height">Exposed height</label>
		<div class="input-group">
			<input class="form-control" type="number" id="height" name="height" value="36" min="0" step="any" inputmode="decimal" data-u="in">
			<span class="input-group-text" data-ul="in">in</span>
		</div>
		<div class="form-text">Above finished grade, not counting buried courses.</div>
	</div>
	<div class="col-12">
		<label class="form-label" for="block">Wall block</label>
		<select class="form-select" id="block" name="block" data-fill>
			<option value="small" data-set-block_h="4" data-set-block_w="12" data-set-block_price="3.25">Small: 4" high × 12" wide (garden walls)</option>
			<option value="medium" data-set-block_h="6" data-set-block_w="16" data-set-block_price="6" selected>Medium: 6" high × 16" wide</option>
			<option value="large" data-set-block_h="8" data-set-block_w="18" data-set-block_price="9.5">Large: 8" high × 18" wide</option>
		</select>
	</div>
	<div class="col-6">
		<label class="form-label" for="block_h">Block height</label>
		<div class="input-group">
			<input class="form-control" type="number" id="block_h" name="block_h" value="6" min="1" step="any" inputmode="decimal" data-u="in">
			<span class="input-group-text" data-ul="in">in</span>
		</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="block_w">Block face width</label>
		<div class="input-group">
			<input class="form-control" type="number" id="block_w" name="block_w" value="16" min="1" step="any" inputmode="decimal" data-u="in">
			<span class="input-group-text" data-ul="in">in</span>
		</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="buried">Buried courses</label>
		<input class="form-control" type="number" id="buried" name="buried" value="1" min="0" step="1" inputmode="numeric">
		<div class="form-text">1 course, or about 10% of wall height.</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="waste">Extra for cuts</label>
		<div class="input-group">
			<input class="form-control" type="number" id="waste" name="waste" value="5" min="0" step="any" inputmode="decimal">
			<span class="input-group-text">%</span>
		</div>
	</div>
	<div class="col-12">
		<div class="form-check form-switch">
			<input class="form-check-input" type="checkbox" role="switch" id="caps" name="caps" value="1" checked>
			<label class="form-check-label" for="caps">Cap stones on top</label>
		</div>
		<div class="form-check form-switch">
			<input class="form-check-input" type="checkbox" role="switch" id="fabric" name="fabric" value="1" checked>
			<label class="form-check-label" for="fabric">Filter fabric behind the drainage stone</label>
		</div>
	</div>
</div>

<fieldset>
	<legend>Prices (edit to match your quote)</legend>
	<div class="row g-3">
		<div class="col-6 col-md-4">
			<label class="form-label" for="block_price">Per block</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="block_price" name="block_price" value="6" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-6 col-md-4" data-show="caps:1">
			<label class="form-label" for="cap_price">Per cap (12" long)</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="cap_price" name="cap_price" value="5.5" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-6 col-md-4">
			<label class="form-label" for="base_price">Base gravel</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="base_price" name="base_price" value="35" min="0" step="any" inputmode="decimal" data-u="pton" data-money>
				<span class="input-group-text" data-ul="pton">/ton</span>
			</div>
		</div>
		<div class="col-6 col-md-4">
			<label class="form-label" for="drain_price">Drain stone</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="drain_price" name="drain_price" value="45" min="0" step="any" inputmode="decimal" data-u="pton" data-money>
				<span class="input-group-text" data-ul="pton">/ton</span>
			</div>
		</div>
		<div class="col-6 col-md-4">
			<label class="form-label" for="labor_price">Labor</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="labor_price" name="labor_price" value="30" min="0" step="any" inputmode="decimal" data-u="parea" data-money>
				<span class="input-group-text" data-ul="parea">/sq ft</span>
			</div>
			<div class="form-text">Per square foot of wall face.</div>
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
