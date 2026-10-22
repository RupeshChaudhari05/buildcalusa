<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="mb-3">
	<span class="form-label d-block">How do you want to measure the debris?</span>
	<div class="seg" role="radiogroup" aria-label="Measure by">
		<input type="radio" name="mode" id="mode-project" value="project" checked><label for="mode-project">By project</label>
		<input type="radio" name="mode" id="mode-pile" value="pile"><label for="mode-pile">By pile size</label>
		<input type="radio" name="mode" id="mode-loads" value="loads"><label for="mode-loads">Pickup loads</label>
	</div>
</div>

<div class="row g-3" data-show="mode:project">
	<div class="col-12">
		<label class="form-label" for="project">Project</label>
		<select class="form-select" id="project" name="project" data-fill>
			<option value="kitchen" data-kind="area" data-ypu="0.0667" data-dens="450" data-hint="Kitchen floor area. A full gut: cabinets, counters, drywall and flooring." data-set-p_area="150" selected>Kitchen remodel (full gut)</option>
			<option value="bath" data-kind="count" data-ypu="4" data-dens="900" data-hint="Number of bathrooms being gutted to the studs." data-set-p_count="1">Bathroom remodel</option>
			<option value="roof" data-kind="area" data-ypu="0.0025" data-dens="1000" data-hint="Roof area, not the footprint. 100 sq ft is one square." data-set-p_area="2000">Roof tear-off (asphalt shingles)</option>
			<option value="deck" data-kind="area" data-ypu="0.04" data-dens="350" data-hint="Deck surface area, including the framing underneath." data-set-p_area="300">Deck removal</option>
			<option value="drywall" data-kind="area" data-ypu="0.005" data-dens="500" data-hint="Square feet of wall and ceiling board coming down." data-set-p_area="1000">Drywall demolition</option>
			<option value="flooring" data-kind="area" data-ypu="0.00667" data-dens="350" data-hint="Floor area of carpet, pad, laminate or wood being pulled." data-set-p_area="800">Flooring or carpet removal</option>
			<option value="garage" data-kind="area" data-ypu="0" data-dens="300" data-hint="Floor area of the garage or basement, then pick how full it is." data-set-p_area="400">Garage or basement cleanout</option>
			<option value="house" data-kind="count" data-ypu="7" data-base="4" data-dens="300" data-hint="Bedrooms in the house being cleared out." data-set-p_count="3">Whole-house cleanout</option>
		</select>
	</div>
	<div class="col-6" data-show="project:kitchen|roof|deck|drywall|flooring|garage">
		<label class="form-label" for="p_area">Area</label>
		<div class="input-group">
			<input class="form-control" type="number" id="p_area" name="p_area" value="150" min="0" step="any" inputmode="decimal" data-u="area">
			<span class="input-group-text" data-ul="area">sq ft</span>
		</div>
	</div>
	<div class="col-6" data-show="project:bath|house">
		<label class="form-label" for="p_count">How many</label>
		<input class="form-control" type="number" id="p_count" name="p_count" value="1" min="0" step="1" inputmode="numeric">
	</div>
	<div class="col-6" data-show="project:roof">
		<label class="form-label" for="layers">Shingle layers</label>
		<select class="form-select" id="layers" name="layers">
			<option value="1" selected>1 layer</option>
			<option value="2">2 layers</option>
			<option value="3">3 layers</option>
		</select>
	</div>
	<div class="col-6" data-show="project:garage">
		<label class="form-label" for="fill">How full is it?</label>
		<select class="form-select" id="fill" name="fill">
			<option value="0.02">Light (boxes along the walls)</option>
			<option value="0.04" selected>Medium (can't park inside)</option>
			<option value="0.07">Heavy (packed to the ceiling)</option>
		</select>
	</div>
	<div class="col-12">
		<span class="form-text d-block" id="p_hint">Kitchen floor area. A full gut: cabinets, counters, drywall and flooring.</span>
	</div>
</div>

<div class="row g-3" data-show="mode:pile">
	<div class="col-4">
		<label class="form-label" for="pile_l">Pile length</label>
		<div class="input-group">
			<input class="form-control" type="number" id="pile_l" name="pile_l" value="12" min="0" step="any" inputmode="decimal" data-u="len">
			<span class="input-group-text" data-ul="len">ft</span>
		</div>
	</div>
	<div class="col-4">
		<label class="form-label" for="pile_w">Width</label>
		<div class="input-group">
			<input class="form-control" type="number" id="pile_w" name="pile_w" value="8" min="0" step="any" inputmode="decimal" data-u="len">
			<span class="input-group-text" data-ul="len">ft</span>
		</div>
	</div>
	<div class="col-4">
		<label class="form-label" for="pile_h">Height</label>
		<div class="input-group">
			<input class="form-control" type="number" id="pile_h" name="pile_h" value="4" min="0" step="any" inputmode="decimal" data-u="len">
			<span class="input-group-text" data-ul="len">ft</span>
		</div>
	</div>
	<div class="col-12">
		<label class="form-label" for="bulky">What's in the pile?</label>
		<select class="form-select" id="bulky" name="bulky">
			<option value="1" selected>Broken-down debris that stacks flat</option>
			<option value="1.2">Bulky items: furniture, appliances, branches (+20%)</option>
		</select>
	</div>
</div>

<div class="row g-3" data-show="mode:loads">
	<div class="col-6">
		<label class="form-label" for="loads">Pickup loads</label>
		<input class="form-control" type="number" id="loads" name="loads" value="4" min="0" step="any" inputmode="decimal">
	</div>
	<div class="col-6">
		<label class="form-label" for="bed">Truck bed</label>
		<select class="form-select" id="bed" name="bed">
			<option value="2.5" selected>8 ft bed (about 2.5 yd³, level with the sides)</option>
			<option value="2">6 ft bed (about 2 yd³)</option>
		</select>
	</div>
</div>

<div class="row g-3 mt-0" data-show="mode:pile|loads">
	<div class="col-12">
		<label class="form-label" for="debris">Type of debris</label>
		<select class="form-select" id="debris" name="debris">
			<option value="600" selected>Mixed construction debris</option>
			<option value="300">Household junk and furniture</option>
			<option value="350">Wood and lumber</option>
			<option value="250">Yard waste</option>
			<option value="2000">Heavy: concrete, brick, dirt or rock</option>
		</select>
	</div>
</div>

<fieldset>
	<legend>Room to spare</legend>
	<div class="row g-3">
		<div class="col-6">
			<label class="form-label" for="headroom">Extra headroom</label>
			<div class="input-group">
				<input class="form-control" type="number" id="headroom" name="headroom" value="15" min="0" step="any" inputmode="decimal">
				<span class="input-group-text">%</span>
			</div>
		</div>
		<div class="col-6">
			<span class="form-text d-block mt-4">Debris never packs as tight as you plan. 10 to 20% covers the awkward pieces.</span>
		</div>
	</div>
</fieldset>
