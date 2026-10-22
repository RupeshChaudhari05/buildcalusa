<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row g-3">
	<div class="col-6">
		<label class="form-label" for="length">Area length</label>
		<div class="input-group">
			<input class="form-control" type="number" id="length" name="length" value="12" min="0" step="any" inputmode="decimal" data-u="len">
			<span class="input-group-text" data-ul="len">ft</span>
		</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="width">Area width</label>
		<div class="input-group">
			<input class="form-control" type="number" id="width" name="width" value="10" min="0" step="any" inputmode="decimal" data-u="len">
			<span class="input-group-text" data-ul="len">ft</span>
		</div>
	</div>
	<div class="col-12">
		<label class="form-label" for="extra">Extra area (closets, niches, backsplash) – optional</label>
		<div class="input-group">
			<input class="form-control" type="number" id="extra" name="extra" value="0" min="0" step="any" inputmode="decimal" data-u="area">
			<span class="input-group-text" data-ul="area">sq ft</span>
		</div>
	</div>
	<div class="col-12">
		<label class="form-label" for="size">Tile size</label>
		<select class="form-select" id="size" name="size" data-fill>
			<option value="3x6" data-set-tile_l="6" data-set-tile_w="3" data-set-per_box="80" data-set-joint="0.0625">3 × 6 in subway</option>
			<option value="4x4" data-set-tile_l="4" data-set-tile_w="4" data-set-per_box="80" data-set-joint="0.125">4 × 4 in</option>
			<option value="6x24" data-set-tile_l="24" data-set-tile_w="6" data-set-per_box="14" data-set-joint="0.125">6 × 24 in wood-look plank</option>
			<option value="12x12" data-set-tile_l="12" data-set-tile_w="12" data-set-per_box="15" data-set-joint="0.125">12 × 12 in</option>
			<option value="12x24" data-set-tile_l="24" data-set-tile_w="12" data-set-per_box="8" data-set-joint="0.125" selected>12 × 24 in</option>
			<option value="18x18" data-set-tile_l="18" data-set-tile_w="18" data-set-per_box="6" data-set-joint="0.125">18 × 18 in</option>
			<option value="24x24" data-set-tile_l="24" data-set-tile_w="24" data-set-per_box="4" data-set-joint="0.125">24 × 24 in</option>
			<option value="custom">Custom size</option>
		</select>
	</div>
	<div class="col-6 col-md-3">
		<label class="form-label" for="tile_l">Tile length</label>
		<div class="input-group">
			<input class="form-control" type="number" id="tile_l" name="tile_l" value="24" min="0.5" step="any" inputmode="decimal" data-u="in">
			<span class="input-group-text" data-ul="in">in</span>
		</div>
	</div>
	<div class="col-6 col-md-3">
		<label class="form-label" for="tile_w">Tile width</label>
		<div class="input-group">
			<input class="form-control" type="number" id="tile_w" name="tile_w" value="12" min="0.5" step="any" inputmode="decimal" data-u="in">
			<span class="input-group-text" data-ul="in">in</span>
		</div>
	</div>
	<div class="col-6 col-md-3">
		<label class="form-label" for="joint">Grout joint</label>
		<div class="input-group">
			<input class="form-control" type="number" id="joint" name="joint" value="0.125" min="0" step="any" inputmode="decimal" data-u="in">
			<span class="input-group-text" data-ul="in">in</span>
		</div>
	</div>
	<div class="col-6 col-md-3">
		<label class="form-label" for="thick">Tile thickness</label>
		<div class="input-group">
			<input class="form-control" type="number" id="thick" name="thick" value="0.375" min="0.1" step="any" inputmode="decimal" data-u="in">
			<span class="input-group-text" data-ul="in">in</span>
		</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="layout">Layout pattern</label>
		<select class="form-select" id="layout" name="layout" data-fill>
			<option value="straight" data-set-waste="10" selected>Straight / grid</option>
			<option value="offset" data-set-waste="12">Offset / brick</option>
			<option value="diagonal" data-set-waste="15">Diagonal</option>
			<option value="herringbone" data-set-waste="20">Herringbone</option>
		</select>
	</div>
	<div class="col-6">
		<label class="form-label" for="waste">Waste</label>
		<div class="input-group">
			<input class="form-control" type="number" id="waste" name="waste" value="10" min="0" max="50" step="any" inputmode="decimal">
			<span class="input-group-text">%</span>
		</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="per_box">Tiles per box</label>
		<input class="form-control" type="number" id="per_box" name="per_box" value="8" min="1" step="1" inputmode="numeric">
	</div>
</div>

<fieldset>
	<legend>Prices (edit to match your quote)</legend>
	<div class="row g-3">
		<div class="col-6 col-md-4">
			<label class="form-label" for="tile_price">Tile</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="tile_price" name="tile_price" value="4" min="0" step="any" inputmode="decimal" data-u="parea" data-money>
				<span class="input-group-text" data-ul="parea">/sq ft</span>
			</div>
		</div>
		<div class="col-6 col-md-4">
			<label class="form-label" for="thinset_price">Thinset (50 lb)</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="thinset_price" name="thinset_price" value="25" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-6 col-md-4">
			<label class="form-label" for="grout_price">Grout (25 lb)</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="grout_price" name="grout_price" value="22" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-6 col-md-4">
			<label class="form-label" for="labor_price">Labor</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="labor_price" name="labor_price" value="8" min="0" step="any" inputmode="decimal" data-u="parea" data-money>
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
