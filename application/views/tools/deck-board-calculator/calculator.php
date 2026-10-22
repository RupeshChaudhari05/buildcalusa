<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row g-3">
	<div class="col-6">
		<label class="form-label" for="length">Deck length (board direction)</label>
		<div class="input-group">
			<input class="form-control" type="number" id="length" name="length" value="16" min="0" step="any" inputmode="decimal" data-u="len">
			<span class="input-group-text" data-ul="len">ft</span>
		</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="width">Deck width</label>
		<div class="input-group">
			<input class="form-control" type="number" id="width" name="width" value="12" min="0" step="any" inputmode="decimal" data-u="len">
			<span class="input-group-text" data-ul="len">ft</span>
		</div>
	</div>
	<div class="col-12">
		<label class="form-label" for="board">Decking board</label>
		<select class="form-select" id="board" name="board" data-fill>
			<option value="pt54" data-w="5.5" data-max="16" data-set-board_price="1.17" selected>5/4×6 pressure-treated pine</option>
			<option value="pt26" data-w="5.5" data-max="24" data-set-board_price="1.33">2×6 pressure-treated pine</option>
			<option value="cedar" data-w="5.5" data-max="16" data-set-board_price="2.33">5/4×6 cedar</option>
			<option value="composite" data-w="5.5" data-max="16" data-set-board_price="3.75">Composite (5.5" grooved)</option>
			<option value="pvc" data-w="5.5" data-max="16" data-set-board_price="4.58">PVC / capped polymer</option>
		</select>
	</div>
	<div class="col-6">
		<label class="form-label" for="board_len">Board length</label>
		<select class="form-select" id="board_len" name="board_len">
			<option value="8">8 ft (2.4 m)</option>
			<option value="10">10 ft (3.0 m)</option>
			<option value="12">12 ft (3.7 m)</option>
			<option value="16" selected>16 ft (4.9 m)</option>
			<option value="20">20 ft (6.1 m)</option>
		</select>
	</div>
	<div class="col-6">
		<label class="form-label" for="gap">Gap between boards</label>
		<div class="input-group">
			<input class="form-control" type="number" id="gap" name="gap" value="0.1875" min="0" step="any" inputmode="decimal" data-u="in">
			<span class="input-group-text" data-ul="in">in</span>
		</div>
		<div class="form-text">3/16" = 0.1875 in</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="joist">Joist spacing (on center)</label>
		<div class="input-group">
			<input class="form-control" type="number" id="joist" name="joist" value="16" min="1" step="any" inputmode="decimal" data-u="in">
			<span class="input-group-text" data-ul="in">in</span>
		</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="waste">Waste</label>
		<div class="input-group">
			<input class="form-control" type="number" id="waste" name="waste" value="10" min="0" max="50" step="any" inputmode="decimal">
			<span class="input-group-text">%</span>
		</div>
	</div>
	<div class="col-12">
		<label class="form-label" for="fastener">Fasteners</label>
		<select class="form-select" id="fastener" name="fastener">
			<option value="screws" data-per="2" data-box="350" data-boxprice="40" selected>Deck screws – 2 per joist (box of 350)</option>
			<option value="clips" data-per="1" data-box="90" data-boxprice="45">Hidden clips – 1 per joist (box of 90)</option>
		</select>
	</div>
</div>

<fieldset>
	<legend>Prices (edit to match your quote)</legend>
	<div class="row g-3">
		<div class="col-6">
			<label class="form-label" for="board_price">Decking</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="board_price" name="board_price" value="1.17" min="0" step="any" inputmode="decimal" data-u="plen" data-money>
				<span class="input-group-text" data-ul="plen">/ft</span>
			</div>
			<div class="form-text">Per linear foot of board</div>
		</div>
		<div class="col-6">
			<label class="form-label" for="labor_price">Install labor</label>
			<div class="input-group">
				<span class="input-group-text" data-cs>$</span>
				<input class="form-control" type="number" id="labor_price" name="labor_price" value="6" min="0" step="any" inputmode="decimal" data-u="parea" data-money>
				<span class="input-group-text" data-ul="parea">/sq ft</span>
			</div>
		</div>
		<div class="col-12">
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
