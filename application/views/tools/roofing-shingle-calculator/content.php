<?php defined('BASEPATH') OR exit('No direct script access allowed'); $y = (int) config_item('price_year'); ?>
<h2 id="measure">Measure the roof without climbing it</h2>
<p>You don't need to get on the roof. Measure the house footprint at the drip line, including the overhangs, then find the pitch. To get the pitch, hold a level against a rafter tail or the gable trim, measure 12 in along it, and measure straight up to the roof edge. That rise is the pitch: 6 in up per 12 in across is a 6/12 roof.</p>
<p>Roofers buy in <strong>squares</strong>, which are 100 sq ft of roof surface. A sloped roof has more surface than the footprint it covers, so the footprint is multiplied by a slope factor:</p>
<div class="formula">Squares = Length × Width × √(1 + (pitch ÷ 12)²) × (1 + waste %) ÷ 100<br>Bundles = Squares × 3</div>
<p>For a 50 × 30 ft footprint at 6/12, the factor is 1.118. That gives 1,677 sq ft of roof, or 18.4 squares with 10% waste, which is <strong>56 bundles</strong>.</p>

<h2 id="pitch">Slope factors and waste</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Pitch</th><th>Factor</th><th>Notes</th></tr></thead>
	<tbody>
		<tr><td>4/12</td><td>1.054</td><td>Double underlayment if below 4/12</td></tr>
		<tr><td>6/12</td><td>1.118</td><td>Most common on newer homes</td></tr>
		<tr><td>8/12</td><td>1.202</td><td>Crews start to charge a steep fee</td></tr>
		<tr><td>10/12</td><td>1.302</td><td>Needs roof jacks and harnesses</td></tr>
		<tr><td>12/12</td><td>1.414</td><td>45°, slow going</td></tr>
	</tbody>
</table>
</div>
<p>Use 10% waste on a plain gable, 15% on a hip roof and up to 20% on a roof cut up with valleys and dormers. Ridge cap and starter are separate items. Don't count on leftover field shingles to cover them.</p>

<h2 id="material-cost">Roofing materials (<?= $y ?>)</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Material</th><th>Price</th><th>Per square</th></tr></thead>
	<tbody>
		<tr><td>3-tab shingles</td><td>$32 / bundle</td><td>$96</td></tr>
		<tr><td>Architectural shingles</td><td>$40 / bundle</td><td>$120</td></tr>
		<tr><td>Designer shingles</td><td>$65 / bundle</td><td>$195</td></tr>
		<tr><td>Synthetic underlayment</td><td>$120 / roll</td><td>$12 (10 squares per roll)</td></tr>
		<tr><td>#15 felt</td><td>$30 / roll</td><td>$7.50 (4 squares per roll)</td></tr>
		<tr><td>Ridge cap</td><td>$65 / bundle</td><td>About 33 linear ft per bundle</td></tr>
	</tbody>
</table>
</div>
<p>Starter strip covers about 105 ft per bundle along the eaves. Drip edge comes in 10 ft sticks, and you need about 320 nails per square. The sample roof comes to about $7,900 with tear-off.</p>

<h2 id="labor-cost">Roofing labor by state</h2>
<p>Installation averages $150 to $220 per square, plus about $100 per square to strip and haul away one old layer.</p>
<div class="tbl-wrap">
<table>
	<thead><tr><th>State</th><th>Labor $/square</th></tr></thead>
	<tbody>
	<?php foreach (labor_table(150, 220) as $r): ?>
		<tr><td><?= e($r[0]) ?></td><td><?= usd($r[1]) ?> – <?= usd($r[2]) ?></td></tr>
	<?php endforeach; ?>
	</tbody>
</table>
</div>

<h2 id="quote">Before you sign a roofing quote</h2>
<ul>
	<li>Ask how many layers are coming off. Count them at the eave edge yourself. Most codes allow two layers, so a third roof means a full tear-off.</li>
	<li>Check that the quote includes ice-and-water shield at the eaves where you get ice dams, plus new drip edge and flashing.</li>
	<li>Ask for a price per sheet for rotten decking. $70 to $120 per sheet is normal, and it is where surprise charges come from.</li>
	<li>Ask for rooftop delivery. Bundles weigh 60 to 80 lb, and most suppliers will boom them up.</li>
</ul>
<div class="tip"><strong>UK, Europe or Australia:</strong> switch to metric for roof area in m². Squares and bundles are U.S. packaging. For concrete tile, slate or metal, take the m² figure and use your supplier's coverage per m².</div>
