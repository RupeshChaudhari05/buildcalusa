<?php defined('BASEPATH') OR exit('No direct script access allowed'); $y = (int) config_item('price_year'); ?>
<h2 id="bags-or-truck">Bags or a truck?</h2>
<p>This is the first decision, and the volume answers it for you.</p>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Volume</th><th>Order</th><th>Why</th></tr></thead>
	<tbody>
		<tr><td>Under 1 yd³</td><td>Bags</td><td>Post holes, pads, steps. About 45 × 80 lb bags per yard.</td></tr>
		<tr><td>1 – 4 yd³</td><td>Ready-mix with a short-load fee, or a mixer rental</td><td>Mixing 60+ bags by hand is a long, hard day.</td></tr>
		<tr><td>Over 4 yd³</td><td>Ready-mix</td><td>Cheaper per yard, stronger and placed in one pour.</td></tr>
	</tbody>
</table>
</div>

<h2 id="formula">Volume by shape</h2>
<p>Everything is worked in feet, then divided by 27 to get cubic yards. Thickness in inches gets divided by 12 first.</p>
<div class="formula">Slab, footing, wall: L × W × Thickness (ft)<br>Round column: 3.1416 × (Diameter ÷ 2)² × Height<br>Steps: Width × Run × Rise × n(n + 1) ÷ 2, plus the landing<br>Cubic yards = ft³ × (1 + waste) ÷ 27</div>
<p>A 10 × 10 ft patio at 4 in is 10 × 10 × 0.333 = 33.3 ft³. With 10% added that is 36.7 ft³, or <strong>1.36 yd³</strong>. In bags that is 62 × 80 lb (0.60 ft³ each) or 82 × 60 lb (0.45 ft³ each). Ready-mix comes to about $224 against roughly $403 in 80 lb bags.</p>

<h2 id="material-cost">What concrete costs (<?= $y ?>)</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Product</th><th>Typical price</th><th>Per yd³</th></tr></thead>
	<tbody>
		<tr><td>Ready-mix, 3,000–4,000 psi</td><td>$150 – $185 / yd³</td><td>$165</td></tr>
		<tr><td>Quikrete 80 lb bag</td><td>$6.50</td><td>About $293</td></tr>
		<tr><td>Quikrete 60 lb bag</td><td>$5.25</td><td>About $315</td></tr>
		<tr><td>Short-load fee</td><td>$50 – $150 / yd</td><td>Below the plant minimum</td></tr>
		<tr><td>Pump truck</td><td>$500 – $1,500 / day</td><td>When the truck can't reach</td></tr>
	</tbody>
</table>
</div>

<h2 id="labor-cost">Form and finish labor by state</h2>
<p>Forming, placing and finishing a slab adds $3 to $6 per square foot, so a finished 4 in slab lands around $6 to $12 per square foot. Stamped or colored work costs more.</p>
<div class="tbl-wrap">
<table>
	<thead><tr><th>State</th><th>Slab labor $/sq ft</th></tr></thead>
	<tbody>
	<?php foreach (labor_table(3, 6) as $r): ?>
		<tr><td><?= e($r[0]) ?></td><td><?= usd($r[1], 2) ?> – <?= usd($r[2], 2) ?></td></tr>
	<?php endforeach; ?>
	</tbody>
</table>
</div>

<h2 id="plant">What the plant will ask when you order</h2>
<ul>
	<li><strong>Yardage, rounded up.</strong> Most plants sell in ¼ yd steps. Running short mid-pour leaves a cold joint, so round up.</li>
	<li><strong>Strength and slump.</strong> 3,000 psi is fine for patios. Ask for 4,000 psi for driveways and anywhere road salt is used. Don't let the driver add water to make it easier to place, because it weakens the mix.</li>
	<li><strong>Access.</strong> A full truck weighs 30 tons or more and can crack an existing driveway. Plants also charge standby time once unloading runs past the free minutes, so have the crew and forms ready.</li>
</ul>
<p>Cut control joints at a spacing of about 2 to 3 times the slab thickness in inches, expressed in feet. For a 4 in slab that is every 8 to 12 ft.</p>
<div class="tip"><strong>UK, Europe or Australia:</strong> switch to metric for m³ (1 yd³ = 0.765 m³). Ready-mix there is quoted per m³, so enter your local price per m³.</div>
