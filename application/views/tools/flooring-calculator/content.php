<?php defined('BASEPATH') OR exit('No direct script access allowed'); $y = (int) config_item('price_year'); ?>
<h2 id="example">How many boxes for a 12 × 15 room</h2>
<p>A 12 × 15 ft room is 180 sq ft. Add 10% for a straight lay and you need 198 sq ft. Luxury vinyl plank usually comes about 24 sq ft to the box, so 198 ÷ 24 = 8.25, which rounds up to <strong>9 boxes</strong>. At $3.50 a square foot for the plank and $3 for labor, the room comes in around <strong>$1,300 installed</strong>.</p>
<div class="formula">Floor area = Length × Width + Closets and halls<br>Boxes = ⌈Floor area × (1 + Waste %) ÷ Sq ft per box⌉<br>Carpet sq yd = ⌈Larger of (area + waste) or (12 ft strips × room length) ÷ 9⌉</div>
<p>Carpet is the odd one out. It comes off a 12 ft roll, so a 13 ft wide room needs two strips and you pay for the offcut. The calculator checks the roll layout and orders whichever is larger.</p>

<h2 id="waste">How much extra to order</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Layout</th><th>Add</th><th>Why</th></tr></thead>
	<tbody>
		<tr><td>Straight lay, rectangular room</td><td>8 – 10%</td><td>End cuts, a few damaged pieces</td></tr>
		<tr><td>Many closets, angles or doorways</td><td>12 – 15%</td><td>More short offcuts you can't reuse</td></tr>
		<tr><td>Diagonal</td><td>15%</td><td>Every row ends in an angle cut</td></tr>
		<tr><td>Herringbone or chevron</td><td>20%</td><td>Pattern pieces, borders</td></tr>
	</tbody>
</table>
</div>
<p>Keep the leftover box. Discontinued colors are common, and a spare box is the only way to fix a damaged plank five years from now. Check that every carton shows the same lot or run number before the delivery driver leaves.</p>

<h2 id="material-cost">Flooring prices (<?= $y ?>)</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Floor</th><th>Material $/sq ft</th><th>Labor $/sq ft</th><th>Typical box</th></tr></thead>
	<tbody>
		<tr><td>Laminate</td><td>$1.50 – $4.00</td><td>$2.00 – $3.50</td><td>18 – 22 sq ft</td></tr>
		<tr><td>Luxury vinyl plank</td><td>$2.50 – $5.00</td><td>$2.50 – $4.00</td><td>20 – 28 sq ft</td></tr>
		<tr><td>Engineered hardwood</td><td>$4.00 – $9.00</td><td>$4.00 – $6.00</td><td>20 – 30 sq ft</td></tr>
		<tr><td>Solid hardwood</td><td>$5.00 – $10.00</td><td>$5.00 – $8.00</td><td>18 – 22 sq ft</td></tr>
		<tr><td>Carpet with pad</td><td>$2.50 – $5.00</td><td>$1.00 – $2.00</td><td>Sold by sq yd</td></tr>
		<tr><td>Foam underlayment</td><td>$0.30</td><td>Included</td><td>100 sq ft roll</td></tr>
	</tbody>
</table>
</div>
<p>Solid hardwood labor often doesn't include sanding and finishing. Unfinished strip flooring adds $3 to $5 per square foot for that.</p>

<h2 id="labor-cost">Install labor by state</h2>
<p>Floating floors (laminate and click LVP) are the cheapest to install, at about $2 to $4 per square foot. Old flooring removal, furniture moving and subfloor leveling are usually quoted on top.</p>
<div class="tbl-wrap">
<table>
	<thead><tr><th>State</th><th>LVP or laminate, $/sq ft</th></tr></thead>
	<tbody>
	<?php foreach (labor_table(2.5, 4) as $r): ?>
		<tr><td><?= e($r[0]) ?></td><td><?= usd($r[1], 2) ?> – <?= usd($r[2], 2) ?></td></tr>
	<?php endforeach; ?>
	</tbody>
</table>
</div>

<h3>Before the installer shows up</h3>
<ul>
	<li>Check the subfloor with a 10 ft straightedge. Most click floors allow no more than 3/16 in of dip over 10 ft.</li>
	<li>Over a concrete slab, put down a vapor barrier unless the plank has one built in.</li>
	<li>Undercut the door casings so the plank slides under them instead of being caulked around them.</li>
</ul>
<div class="tip"><strong>UK, Europe or Australia:</strong> switch to metric. Packs are labeled in m² (often 1.5 to 2.5 m² per pack), so enter that as the coverage per box. Carpet in the UK is usually sold in 4 m and 5 m widths, not 12 ft, so treat the carpet result as a minimum and check the roll width with your supplier.</div>
