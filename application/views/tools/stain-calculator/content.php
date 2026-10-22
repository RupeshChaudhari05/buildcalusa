<?php defined('BASEPATH') OR exit('No direct script access allowed'); $y = (int) config_item('price_year'); ?>
<h2 id="example">Two typical jobs</h2>
<p>A 16 × 12 ft deck with 40 ft of railing and three steps has about <strong>380 sq ft</strong> of wood to stain once you count both faces of the balusters and the stairs. On weathered boards one coat of semi-transparent stain covers about 175 sq ft per gallon, so you need about 2.2 gallons. Buy three.</p>
<p>A 150 ft privacy fence, 6 ft tall, stained on both sides is a much bigger job: about 1,980 sq ft with posts and rails, or 11.3 gallons. That is two 5-gallon pails and two single gallons.</p>
<div class="formula">Gallons = Area × Coats ÷ Coverage per gallon
Deck area = Length × Width + Railing ft × 4 + Steps × 10
Fence area = Length × Height × Sides × Style factor × 1.1</div>
<p>The railing and stair allowances are rules of thumb. A foot of baluster railing has roughly 4 sq ft of wood once you count every face, and each step adds about 10 sq ft of tread, riser and stringer.</p>

<h2 id="coverage">Coverage depends on the wood, not the label</h2>
<p>Cans often promise 250 to 300 sq ft per gallon. That holds on new, smooth boards. Wood that has been in the sun for a few years drinks stain, and rough-sawn cedar can take twice as much.</p>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Wood</th><th>Coverage per gallon</th><th>Notes</th></tr></thead>
	<tbody>
		<tr><td>New, smooth</td><td>200 – 300 sq ft</td><td>Let new pressure-treated lumber dry out first</td></tr>
		<tr><td>Weathered</td><td>150 – 200 sq ft</td><td>Clean and brighten before staining</td></tr>
		<tr><td>Rough-sawn</td><td>100 – 150 sq ft</td><td>Back-brush to work it into the grain</td></tr>
	</tbody>
</table>
</div>

<h2 id="price">Stain prices (<?= $y ?>)</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Type</th><th>Per gallon</th><th>Coats</th><th>Lasts on a deck</th></tr></thead>
	<tbody>
		<tr><td>Transparent / clear sealer</td><td>$35</td><td>1</td><td>1 – 2 years</td></tr>
		<tr><td>Semi-transparent</td><td>$42</td><td>1 – 2</td><td>2 – 3 years</td></tr>
		<tr><td>Solid color</td><td>$45</td><td>2</td><td>3 – 5 years</td></tr>
	</tbody>
</table>
</div>
<p>A 5-gallon pail usually costs about what 4½ single gallons would, so the calculator switches to pails once you need about four gallons or more.</p>

<h2 id="labor">Staining labor by state</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>State</th><th>Clean and stain, $/sq ft</th></tr></thead>
	<tbody>
	<?php foreach (labor_table(1, 1.75) as $r): ?>
		<tr><td><?= e($r[0]) ?></td><td><?= usd($r[1], 2) ?> – <?= usd($r[2], 2) ?></td></tr>
	<?php endforeach; ?>
	</tbody>
</table>
</div>

<h2 id="mistakes">Where stain jobs go wrong</h2>
<ul>
	<li><strong>Staining too soon.</strong> New pressure-treated wood is wet from the plant. Sprinkle water on it: if the water beads up, wait a few more weeks.</li>
	<li><strong>Skipping the cleaner.</strong> Gray, weathered fibers and mildew keep stain from soaking in. A cleaner and brightener the day before makes the color even.</li>
	<li><strong>Too much on the deck floor.</strong> Semi-transparent stain that puddles turns sticky and peels. Wipe off what has not soaked in after 15 to 20 minutes.</li>
</ul>
<p>Pricing the whole deck? Use the <a href="<?= site_url('deck-cost-calculator') ?>">deck cost calculator</a>. For fences, the <a href="<?= site_url('fence-cost-calculator') ?>">fence cost calculator</a> covers materials and labor. For interior walls, use the <a href="<?= site_url('paint-calculator') ?>">paint calculator</a>.</p>
<div class="tip"><strong>UK, Europe or Australia:</strong> switch to metric. Most fence and decking stains outside the U.S. are sold in litres, so divide the gallons by 0.264 to get litres, then check the tin's coverage per litre.</div>
