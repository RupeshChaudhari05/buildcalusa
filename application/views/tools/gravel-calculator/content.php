<?php defined('BASEPATH') OR exit('No direct script access allowed'); $y = (int) config_item('price_year'); ?>
<h2 id="example">Worked example: a 20 × 10 ft parking pad</h2>
<p>A 20 by 10 ft pad covered 3 in deep is 200 sq ft × 0.25 ft = 50 cubic feet. Divide by 27 to get 1.85 cubic yards, then add 10% for compaction and the stone that disappears into soft ground: 2.04 cubic yards. At 1.4 tons per yard, #57 stone comes to about <strong>2.9 tons</strong>. At $45 a ton plus a $100 delivery fee, the gravel calculator puts the job at roughly $230.</p>
<p>The same pad in 0.5 ft³ bags would take 110 bags and cost over $600, so bags only make sense for small beds and patching.</p>
<div class="formula">Tons = Length × Width × (Depth in ÷ 12) ÷ 27 × (1 + extra %) × Density (t/yd³)</div>

<h2 id="stone-types">Gravel types, weight and price (<?= $y ?>)</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Material</th><th>Tons per yd³</th><th>Bulk $/ton</th><th>Good for</th></tr></thead>
	<tbody>
		<tr><td>#57 crushed stone</td><td>1.4</td><td>$45</td><td>Driveway top coat, drainage, under sheds</td></tr>
		<tr><td>Crusher run / road base</td><td>1.5</td><td>$35</td><td>Compacted base under pavers and driveways</td></tr>
		<tr><td>Pea gravel</td><td>1.35</td><td>$55</td><td>Paths, play areas, dog runs</td></tr>
		<tr><td>Decomposed granite</td><td>1.4</td><td>$60</td><td>Walkways and patios that pack firm</td></tr>
		<tr><td>River rock</td><td>1.3</td><td>$90</td><td>Dry creek beds, borders</td></tr>
		<tr><td>Crushed concrete</td><td>1.2</td><td>$30</td><td>Cheap base for farm lanes and fill</td></tr>
	</tbody>
</table>
</div>
<p>Prices are typical quarry and landscape-yard rates before delivery. Most yards add a flat $75–$150 delivery charge within 10–15 miles, and some have a 3–5 ton minimum.</p>

<h3>How deep should gravel be?</h3>
<p>Two inches is enough for a decorative bed. Walkways need 3 in so the stone does not kick aside. A gravel driveway needs 4–6 in of crusher run, compacted in two lifts, with 2–3 in of #57 on top. Round stone like pea gravel rolls under tires, so keep it off driveways.</p>

<h2 id="spread-cost">Delivered and spread: cost per sq ft by state</h2>
<p>If you pay a landscaper to deliver, grade and spread the stone, expect about $1.50–$3.00 per sq ft for a 3 in layer, scaled to local wages:</p>
<div class="tbl-wrap">
<table>
	<thead><tr><th>State</th><th>Installed $/sq ft</th></tr></thead>
	<tbody>
	<?php foreach (labor_table(1.5, 3) as $r): ?>
		<tr><td><?= e($r[0]) ?></td><td><?= usd($r[1], 2) ?> – <?= usd($r[2], 2) ?></td></tr>
	<?php endforeach; ?>
	</tbody>
</table>
</div>

<h3>What the yard will ask you</h3>
<ul>
	<li>Which size of stone. Say "#57" or "¾-inch clean", not just "gravel".</li>
	<li>Tons or yards. Ask which one their price is in before you compare quotes.</li>
	<li>Where to dump it. A tandem truck needs about 10 ft of width and firm ground. Put plywood down if the drop is on the lawn.</li>
	<li>Whether they spread. Many drivers will "tailgate spread" a strip for free if you ask when you book.</li>
</ul>
<p>Lay landscape fabric under decorative gravel to keep it from sinking into the soil, but skip it under a driveway base.</p>
<div class="tip"><strong>UK, Europe or Australia?</strong> Switch to metric and your local currency. Builders' merchants sell aggregate in 850 kg bulk bags (UK) or by the cubic metre (Australia). One cubic metre of 20 mm gravel weighs about 1.6–1.7 tonnes, so enter 1.4 t/yd³ as the density and the calculator handles the conversion.</div>
