<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row g-3">
	<div class="col-6">
		<label class="form-label" for="posts">Number of posts</label>
		<input class="form-control" type="number" id="posts" name="posts" value="21" min="1" step="1" inputmode="numeric">
	</div>
	<div class="col-6">
		<label class="form-label" for="fence_h">Fence height above ground</label>
		<div class="input-group">
			<input class="form-control" type="number" id="fence_h" name="fence_h" value="6" min="0" step="any" inputmode="decimal" data-u="len">
			<span class="input-group-text" data-ul="len">ft</span>
		</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="hole_d">Hole diameter</label>
		<div class="input-group">
			<input class="form-control" type="number" id="hole_d" name="hole_d" value="10" min="1" step="any" inputmode="decimal" data-u="in">
			<span class="input-group-text" data-ul="in">in</span>
		</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="hole_depth">Hole depth</label>
		<div class="input-group">
			<input class="form-control" type="number" id="hole_depth" name="hole_depth" value="30" min="1" step="any" inputmode="decimal" data-u="in">
			<span class="input-group-text" data-ul="in">in</span>
		</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="post">Post</label>
		<select class="form-select" id="post" name="post" data-fill>
			<option value="4x4" data-shape="square" data-set-post_size="3.5" selected>4×4 wood (3½ in)</option>
			<option value="6x6" data-shape="square" data-set-post_size="5.5">6×6 wood (5½ in)</option>
			<option value="cl-terminal" data-shape="round" data-set-post_size="2.375">Chain link terminal (2⅜ in round)</option>
			<option value="cl-line" data-shape="round" data-set-post_size="1.875">Chain link line (1⅞ in round)</option>
			<option value="round" data-shape="round" data-set-post_size="4">Round post, custom size</option>
		</select>
	</div>
	<div class="col-6">
		<label class="form-label" for="post_size">Post width / diameter</label>
		<div class="input-group">
			<input class="form-control" type="number" id="post_size" name="post_size" value="3.5" min="0" step="any" inputmode="decimal" data-u="in">
			<span class="input-group-text" data-ul="in">in</span>
		</div>
	</div>
	<div class="col-12">
		<div class="form-check form-switch">
			<input class="form-check-input" type="checkbox" role="switch" id="gravel" name="gravel" value="1">
			<label class="form-check-label" for="gravel">6 in of gravel in the bottom of each hole (drainage)</label>
		</div>
	</div>
</div>

<fieldset>
	<legend>Concrete (edit to match your store)</legend>
	<div class="row g-3">
		<div class="col-12 col-md-6">
			<label class="form-label" for="bag">Bag</label>
			<select class="form-select" id="bag" name="bag" data-fill>
				<option value="40" data-yield="0.30" data-set-bag_price="5.25">40 lb concrete mix (0.30 ft³)</option>
				<option value="50fs" data-yield="0.375" data-set-bag_price="7.50" selected>50 lb fast-setting (0.375 ft³)</option>
				<option value="60" data-yield="0.45" data-set-bag_price="5.75">60 lb concrete mix (0.45 ft³)</option>
				<option value="80" data-yield="0.60" data-set-bag_price="6.50">80 lb concrete mix (0.60 ft³)</option>
			</select>
		</div>
		<div class="col-6 col-md-3">
			<label class="form-label" for="bag_price">Price per bag</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="bag_price" name="bag_price" value="7.50" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
		<div class="col-6 col-md-3">
			<label class="form-label" for="waste">Extra for spills</label>
			<div class="input-group">
				<input class="form-control" type="number" id="waste" name="waste" value="10" min="0" step="any" inputmode="decimal">
				<span class="input-group-text">%</span>
			</div>
		</div>
		<div class="col-6" data-show="gravel:1">
			<label class="form-label" for="gravel_price">Gravel, 0.5 ft³ bag</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="gravel_price" name="gravel_price" value="5.50" min="0" step="any" inputmode="decimal" data-money>
			</div>
		</div>
	</div>
</fieldset>
