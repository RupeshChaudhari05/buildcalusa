<?php defined('BASEPATH') OR exit('No direct script access allowed'); $y = (int) config_item('price_year'); ?>
<h2 id="formula">Pitch, angle and slope are the same thing three ways</h2>
<p>Roofers in the U.S. talk in pitch: inches of rise for every 12 inches of run. A 6/12 roof climbs 6 in over each foot. Engineers and most of the rest of the world use the angle in degrees. Slope percent is the same ratio times 100.</p>
<div class="formula">Pitch = Rise ÷ Run × 12<br>Angle = arctan(Rise ÷ Run)<br>Area multiplier = √(1 + (Pitch ÷ 12)²)</div>
<p>Worked example: a 6/12 roof is 26.57°, a 50% slope, with a multiplier of 1.118. A 24 ft span with a 1½ in ridge board and a 12 in level overhang needs a rafter of about <strong>14 ft 5 9/16 in</strong> along the slope, so you buy 16 ft stock.</p>

<h3>Measuring pitch without climbing on the roof</h3>
<ul>
	<li><strong>From the attic:</strong> hold a level against the underside of a rafter, mark 12 in along the level, and measure straight up to the rafter.</li>
	<li><strong>From a ladder at the eave:</strong> rest a level on the shingles with one end touching, level it, and measure down from the 12 in mark.</li>
	<li><strong>From the gable end:</strong> measure the ridge height above the wall plate and half the span. Then pitch = height ÷ half span × 12.</li>
</ul>
<p>Shingles add thickness, so a reading taken on top of the roof can come out a hair low. Round to the nearest half pitch.</p>

<h2 id="pitch-table">Roof pitch chart (<?= $y ?>)</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Pitch</th><th>Angle</th><th>Slope</th><th>Area multiplier</th></tr></thead>
	<tbody>
	<?php for ($p = 1; $p <= 12; $p++): ?>
		<tr><td><?= $p ?>/12</td><td><?= number_format(rad2deg(atan($p / 12)), 2) ?>°</td><td><?= number_format($p / 12 * 100, 1) ?>%</td><td>× <?= number_format(sqrt(1 + pow($p / 12, 2)), 3) ?></td></tr>
	<?php endfor; ?>
	</tbody>
</table>
</div>
<p>Use the multiplier with the <a href="<?= site_url('roofing-shingle-calculator') ?>">roofing shingle calculator</a>: a 1,500 sq ft footprint at 6/12 is about 1,677 sq ft of actual roof.</p>

<h2 id="what-pitch-means">What your pitch means for the job</h2>
<ul>
	<li><strong>Under 2/12:</strong> no asphalt shingles. Use a membrane such as TPO, EPDM or modified bitumen.</li>
	<li><strong>2/12 to under 4/12:</strong> shingles are allowed with two layers of underlayment (IRC R905.2.2). Metal panels often work better here.</li>
	<li><strong>4/12 to 9/12:</strong> standard shingle work. Up to about 6/12 most crews walk it in dry weather.</li>
	<li><strong>Over 9/12:</strong> steep-slope rates apply. Expect roof jacks, harnesses and a labor premium of 20 – 40%.</li>
</ul>
<p>Pitch also changes your bid. A 12/12 roof has 41% more surface than its footprint, and every square of it is slower to work than on a 4/12.</p>
<div class="tip"><strong>Working in degrees?</strong> The UK, Europe and Australia usually specify roof pitch as an angle. Switch the calculator to angle mode, enter the degrees from the drawings, and read off the U.S. pitch and the rafter length in metric.</div>
