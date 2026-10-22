<?php defined('BASEPATH') OR exit('No direct script access allowed');

$money = function ($name, $label, $value, $col = 'col-6') {
	?>
	<div class="<?= $col ?>">
		<label class="form-label" for="<?= $name ?>"><?= $label ?></label>
		<div class="input-group">
			<span class="input-group-text" data-cs>$</span>
			<input class="form-control" type="number" id="<?= $name ?>" name="<?= $name ?>" value="<?= $value ?>" min="0" step="any" inputmode="decimal" data-money>
		</div>
	</div>
	<?php
};
$pct = function ($name, $label, $value, $col = 'col-6', $attrs = '') {
	?>
	<div class="<?= $col ?>"<?= $attrs ?>>
		<label class="form-label" for="<?= $name ?>"><?= $label ?></label>
		<div class="input-group">
			<input class="form-control" type="number" id="<?= $name ?>" name="<?= $name ?>" value="<?= $value ?>" min="0" step="any" inputmode="decimal">
			<span class="input-group-text">%</span>
		</div>
	</div>
	<?php
};
?>
<fieldset class="mt-0 pt-0 border-0">
	<legend>Direct job cost</legend>
	<div class="row g-3">
		<?php $money('materials', 'Materials', 12000); $money('labor', 'Labor (incl. burden)', 15000); $money('subs', 'Subcontractors', 8000); $money('equipment', 'Equipment, permits, dumpsters', 2000); ?>
		<?php $pct('tax', 'Sales tax on materials', 0, 'col-12 col-md-6'); ?>
	</div>
</fieldset>

<fieldset>
	<legend>Overhead &amp; profit</legend>
	<div class="row g-3">
		<?php $pct('overhead', 'Overhead (% of direct cost)', 15, 'col-12'); ?>
		<div class="col-12">
			<span class="form-label d-block">Price the profit as</span>
			<div class="seg" role="radiogroup" aria-label="Profit method">
				<input type="radio" name="mode" id="mode-margin" value="margin" checked><label for="mode-margin">Net margin %</label>
				<input type="radio" name="mode" id="mode-markup" value="markup"><label for="mode-markup">Markup on cost %</label>
			</div>
		</div>
		<?php $pct('margin', 'Target net profit margin', 10, 'col-12 col-md-6', ' data-show="mode:margin"'); ?>
		<?php $pct('markup', 'Profit markup on break-even cost', 10, 'col-12 col-md-6', ' data-show="mode:markup"'); ?>
		<div class="col-12"><div class="form-text">Margin is profit as a share of the selling price. Markup is profit as a share of your cost. Same dollars, different percentages.</div></div>
	</div>
</fieldset>
