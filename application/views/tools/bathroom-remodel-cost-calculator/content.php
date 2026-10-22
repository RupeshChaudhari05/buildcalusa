<?php defined('BASEPATH') OR exit('No direct script access allowed'); $y = (int) config_item('price_year'); ?>
<h2 id="budgets">What a bathroom remodel costs in <?= $y ?></h2>
<p>A small full bath (about 5 × 8 ft) gutted and rebuilt with a tiled shower, a new vanity and mid-grade fixtures runs about <strong>$24,000</strong> at national-average labor, including a 10% contingency. Keep the layout and use stock fixtures and the same room comes in near $10,500.</p>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Bathroom</th><th>Budget</th><th>Midrange</th><th>Upscale</th></tr></thead>
	<tbody>
		<tr><td>Half bath (20 sq ft)</td><td>$5,500</td><td>$13,000</td><td>$27,000</td></tr>
		<tr><td>Small full bath (40 sq ft)</td><td>$10,500</td><td>$24,000</td><td>$51,000</td></tr>
		<tr><td>Standard full bath (60 sq ft)</td><td>$13,000</td><td>$28,500</td><td>$59,500</td></tr>
		<tr><td>Primary bath (120 sq ft)</td><td>$22,000</td><td>$48,000</td><td>$98,000</td></tr>
	</tbody>
</table>
</div>
<p>These are the calculator's defaults with 10% contingency, rounded. They line up with national remodeling surveys, but local quotes can easily land 20% either side.</p>
<div class="formula">Total = Area × (Demo + Floor tile + Drywall + Labor $/sq ft) + Shower × Tub factor + Vanity + Toilet + Fixtures + Lighting + Plumbing + Extras, then + Contingency %</div>

<h2 id="drivers">What actually moves the price</h2>
<ul>
	<li><strong>The shower.</strong> A fiberglass tub/shower unit is about $2,000 installed. A tiled walk-in with a glass door is $10,000 to $15,000. It is the biggest single line in most bids.</li>
	<li><strong>Moving drains.</strong> Shifting a toilet or shower drain means opening the floor, and on a slab, cutting concrete. Budget $2,500 or more.</li>
	<li><strong>Labor.</strong> Labor is usually 40 to 60% of the bill. Remodel crews bill by the hour or by the job, and the hourly rate tracks local wages:</li>
</ul>
<div class="tbl-wrap">
<table>
	<thead><tr><th>State</th><th>Remodel labor $/hour</th></tr></thead>
	<tbody>
	<?php foreach (labor_table(55, 95) as $r): ?>
		<tr><td><?= e($r[0]) ?></td><td><?= usd($r[1]) ?> – <?= usd($r[2]) ?></td></tr>
	<?php endforeach; ?>
	</tbody>
</table>
</div>

<h2 id="overspend">Where people overspend, and where they shouldn't save</h2>
<p>Designer faucets, wall-hung toilets and stone vanity tops add thousands without changing how the room works. Most of that money is in the brand name.</p>
<p>The waterproofing behind the shower tile is the opposite. A sheet membrane or liquid membrane adds a few hundred dollars, and skipping it is how a five-year-old shower ends up torn out. Spend there, and on a fan that actually vents outside (most inspectors want at least 50 CFM, ducted to the exterior, not into the attic).</p>

<h2 id="timeline">How long it takes</h2>
<p>A small bath takes about 3 to 5 weeks once work starts, and a primary bath 6 to 10. The usual holdups are a special-order vanity and the shower glass. Glass can't be measured until the tile is done, and it has a 1 to 3 week lead time. Inspections for plumbing and electrical rough-in add a few days.</p>
<div class="tip"><strong>UK, Ireland, Europe and Australia:</strong> switch to metric and your currency, and pick your country under labor rates. Bathroom fitters outside the U.S. often quote a fixed price per room, so put that figure in the labor line for the closest result.</div>
