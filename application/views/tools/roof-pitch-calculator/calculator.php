<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="mb-3">
	<span class="form-label d-block">What do you know?</span>
	<div class="seg" role="radiogroup" aria-label="Input mode">
		<input type="radio" name="mode" id="mode-rr" value="rr" checked><label for="mode-rr">Rise &amp; run</label>
		<input type="radio" name="mode" id="mode-ang" value="ang"><label for="mode-ang">Angle</label>
	</div>
</div>

<div class="row g-3" data-show="mode:rr">
	<div class="col-6">
		<label class="form-label" for="rise">Rise</label>
		<div class="input-group">
			<input class="form-control" type="number" id="rise" name="rise" value="6" min="0" step="any" inputmode="decimal" data-u="in">
			<span class="input-group-text" data-ul="in">in</span>
		</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="run">Run</label>
		<div class="input-group">
			<input class="form-control" type="number" id="run" name="run" value="12" min="0" step="any" inputmode="decimal" data-u="in">
			<span class="input-group-text" data-ul="in">in</span>
		</div>
	</div>
	<div class="col-12"><div class="form-text">Hold a level 12 in out from the roof and measure straight down to the surface. That measurement is the rise.</div></div>
</div>
<div class="row g-3" data-show="mode:ang">
	<div class="col-6">
		<label class="form-label" for="angle">Roof angle</label>
		<div class="input-group">
			<input class="form-control" type="number" id="angle" name="angle" value="26.57" min="0" max="89" step="any" inputmode="decimal">
			<span class="input-group-text">°</span>
		</div>
	</div>
</div>

<fieldset>
	<legend>Rafter length (optional)</legend>
	<div class="row g-3">
		<div class="col-6">
			<label class="form-label" for="span">Building span</label>
			<div class="input-group">
				<input class="form-control" type="number" id="span" name="span" value="24" min="0" step="any" inputmode="decimal" data-u="len">
				<span class="input-group-text" data-ul="len">ft</span>
			</div>
			<div class="form-text">Outside wall to outside wall.</div>
		</div>
		<div class="col-6">
			<label class="form-label" for="overhang">Overhang (level)</label>
			<div class="input-group">
				<input class="form-control" type="number" id="overhang" name="overhang" value="12" min="0" step="any" inputmode="decimal" data-u="in">
				<span class="input-group-text" data-ul="in">in</span>
			</div>
		</div>
		<div class="col-6">
			<label class="form-label" for="ridge">Ridge board thickness</label>
			<div class="input-group">
				<input class="form-control" type="number" id="ridge" name="ridge" value="1.5" min="0" step="any" inputmode="decimal" data-u="in">
				<span class="input-group-text" data-ul="in">in</span>
			</div>
		</div>
	</div>
</fieldset>

<fieldset>
	<legend>Pitch diagram</legend>
	<svg id="pitch-svg" class="diagram" viewBox="0 0 400 220" role="img" aria-label="Roof pitch diagram"></svg>
</fieldset>
