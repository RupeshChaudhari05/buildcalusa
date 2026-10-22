<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Allowances by finish level (USD). *_sqft fields are per sq ft of floor area.
$levels = array(
	'budget'  => array('Budget – keep the layout, stock fixtures', array('demo_sqft' => 20, 'tile_sqft' => 12, 'shower' => 2000, 'vanity' => 600, 'toilet' => 300, 'fixtures' => 400, 'lighting' => 500, 'drywall_sqft' => 20, 'plumbing' => 1200, 'labor_sqft' => 60)),
	'mid'     => array('Midrange – tiled shower, quality fixtures', array('demo_sqft' => 35, 'tile_sqft' => 20, 'shower' => 6000, 'vanity' => 2000, 'toilet' => 600, 'fixtures' => 1200, 'lighting' => 1200, 'drywall_sqft' => 35, 'plumbing' => 2500, 'labor_sqft' => 120)),
	'upscale' => array('Upscale – custom shower, glass, stone', array('demo_sqft' => 50, 'tile_sqft' => 40, 'shower' => 14000, 'vanity' => 5000, 'toilet' => 1500, 'fixtures' => 3000, 'lighting' => 2500, 'drywall_sqft' => 55, 'plumbing' => 4500, 'labor_sqft' => 250)),
);
$mid = $levels['mid'][1];

$field = function ($name, $label, $value, $per_sqft = FALSE) {
	?>
	<div class="col-6 col-md-4">
		<label class="form-label" for="<?= $name ?>"><?= $label ?></label>
		<div class="input-group">
			<span class="input-group-text" data-cs>$</span>
			<input class="form-control" type="number" id="<?= $name ?>" name="<?= $name ?>" value="<?= $value ?>" min="0" step="any" inputmode="decimal"<?= $per_sqft ? ' data-u="parea"' : '' ?> data-money>
			<?php if ($per_sqft): ?><span class="input-group-text" data-ul="parea">/sq ft</span><?php endif; ?>
		</div>
	</div>
	<?php
};
?>
<div class="row g-3">
	<div class="col-12 col-md-6">
		<label class="form-label" for="preset">Bathroom type</label>
		<select class="form-select" id="preset" name="preset" data-fill>
			<option value="half" data-set-area="20" data-set-wet="0">Half bath (toilet + sink)</option>
			<option value="small" data-set-area="40" data-set-wet="1" selected>Small full bath (5 × 8 ft)</option>
			<option value="standard" data-set-area="60" data-set-wet="1">Standard full bath</option>
			<option value="primary" data-set-area="120" data-set-wet="1.8">Primary / master bath</option>
		</select>
	</div>
	<div class="col-12 col-md-6">
		<label class="form-label" for="area">Floor area</label>
		<div class="input-group">
			<input class="form-control" type="number" id="area" name="area" value="40" min="0" step="any" inputmode="decimal" data-u="area">
			<span class="input-group-text" data-ul="area">sq ft</span>
		</div>
	</div>
	<div class="col-12 col-md-6">
		<label class="form-label" for="wet">Tub / shower</label>
		<select class="form-select" id="wet" name="wet">
			<option value="0">None (half bath)</option>
			<option value="1" selected>Tub/shower combo or one shower</option>
			<option value="1.1">Walk-in shower, larger</option>
			<option value="1.8">Separate tub and shower</option>
		</select>
	</div>
	<div class="col-12 col-md-6">
		<label class="form-label" for="finish">Finish level</label>
		<select class="form-select" id="finish" name="finish" data-fill>
			<?php foreach ($levels as $k => $l): ?>
			<option value="<?= $k ?>"<?php foreach ($l[1] as $f => $v) echo ' data-set-' . $f . '="' . $v . '"'; ?><?= $k === 'mid' ? ' selected' : '' ?>><?= e($l[0]) ?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="col-12 col-md-6">
		<label class="form-label" for="region">Labor rates for</label>
		<select class="form-select" id="region" name="region"><?= region_options() ?></select>
	</div>
	<div class="col-12 col-md-6">
		<label class="form-label" for="contingency">Contingency</label>
		<div class="input-group">
			<input class="form-control" type="number" id="contingency" name="contingency" value="10" min="0" step="any" inputmode="decimal">
			<span class="input-group-text">%</span>
		</div>
	</div>
	<div class="col-12">
		<div class="form-check form-switch">
			<input class="form-check-input" type="checkbox" role="switch" id="move_plumbing" name="move_plumbing" value="1">
			<label class="form-check-label" for="move_plumbing">Move the toilet, shower or sink drain (+$2,500)</label>
		</div>
		<div class="form-check form-switch">
			<input class="form-check-input" type="checkbox" role="switch" id="convert" name="convert" value="1">
			<label class="form-check-label" for="convert">Convert tub to walk-in shower (+$3,000)</label>
		</div>
		<div class="form-check form-switch">
			<input class="form-check-input" type="checkbox" role="switch" id="heated" name="heated" value="1">
			<label class="form-check-label" for="heated">Heated floor (+$15/sq ft)</label>
		</div>
	</div>
</div>

<fieldset>
	<legend>Allowances (set by finish level, edit any line)</legend>
	<div class="row g-3">
		<?php
		$field('demo_sqft', 'Demolition &amp; haul-off', $mid['demo_sqft'], TRUE);
		$field('tile_sqft', 'Floor tile, installed', $mid['tile_sqft'], TRUE);
		$field('drywall_sqft', 'Drywall, prep &amp; paint', $mid['drywall_sqft'], TRUE);
		$field('labor_sqft', 'General labor (carpentry, setting, PM)', $mid['labor_sqft'], TRUE);
		$field('shower', 'Tub / shower, with surround', $mid['shower']);
		$field('vanity', 'Vanity &amp; top', $mid['vanity']);
		$field('toilet', 'Toilet', $mid['toilet']);
		$field('fixtures', 'Faucets, valve, accessories', $mid['fixtures']);
		$field('lighting', 'Lighting, fan, electrical', $mid['lighting']);
		$field('plumbing', 'Plumbing labor', $mid['plumbing']);
		?>
	</div>
</fieldset>
