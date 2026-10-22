<?php defined('BASEPATH') OR exit('No direct script access allowed'); $y = (int) config_item('price_year'); ?>
<h2 id="compare">What one roof costs in nine materials</h2>
<p>Same house every time: a 50 × 30 ft footprint at 6/12 pitch, which is about 1,677 sq ft of roof, or 18.4 squares with 10% waste. Each total includes tearing off one layer, replacing 10% of the decking and a $400 permit, at national average labor.</p>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Material (<?= $y ?>)</th><th>Installed $/sq ft</th><th>This roof</th><th>Lasts</th></tr></thead>
	<tbody>
		<tr><td>3-tab asphalt</td><td>$4.50</td><td>$10,900</td><td>15–20 yrs</td></tr>
		<tr><td>Architectural asphalt</td><td>$5.50</td><td>$12,700</td><td>25–30 yrs</td></tr>
		<tr><td>Exposed-fastener metal</td><td>$8.00</td><td>$17,300</td><td>30–45 yrs</td></tr>
		<tr><td>Stone-coated steel</td><td>$10.50</td><td>$22,000</td><td>40–50 yrs</td></tr>
		<tr><td>Cedar shake</td><td>$11.50</td><td>$23,800</td><td>25–35 yrs</td></tr>
		<tr><td>Concrete tile</td><td>$12.00</td><td>$24,700</td><td>40–50 yrs</td></tr>
		<tr><td>Standing seam metal</td><td>$13.00</td><td>$26,600</td><td>40–70 yrs</td></tr>
		<tr><td>Clay tile</td><td>$17.00</td><td>$33,900</td><td>50–100 yrs</td></tr>
		<tr><td>Natural slate</td><td>$22.00</td><td>$43,200</td><td>75–150 yrs</td></tr>
	</tbody>
</table>
</div>
<p>The calculator runs this comparison for your own roof under the total, so you can see what an upgrade really costs before a salesperson brings it up. For bundle counts on a shingle job, use the <a href="<?= site_url('roofing-shingle-calculator') ?>">roofing shingle calculator</a>.</p>

<h2 id="formula">How the estimate is built</h2>
<div class="formula">Roof area = Length × Width × √(1 + (pitch ÷ 12)²)
Roofing = Squares × Price per square × (40% material + 60% labor × state × stories × steep)
Total = Roofing + Tear-off + Decking + Permit</div>
<p>Roofers quote by the square, 100 sq ft of roof surface, and they bill the waste squares too. About 60% of an installed price is labor, so that is the part that moves with your state, the number of stories and the pitch. At 8/12 and steeper, crews need roof jacks and harnesses, and the calculator adds 15% to labor.</p>

<h2 id="what-moves-it">What pushes a roof quote up</h2>
<ul>
	<li><strong>Layers.</strong> Pull up a shingle at the eave and count. A second layer adds about $50 a square to tear-off and fills an extra dumpster.</li>
	<li><strong>Rotten decking.</strong> Nobody knows how much until the old roof is off. Get the price per sheet in writing before work starts.</li>
	<li><strong>Weight.</strong> Tile and slate can weigh five times as much as shingles. Switching to them often means an engineer's letter and extra framing.</li>
	<li><strong>Cut-up roofs.</strong> Valleys, dormers and skylights add waste and flashing time. Metal panels on a complex roof waste more than shingles.</li>
</ul>

<h2 id="labor">Roofing labor per square by state</h2>
<p>For architectural shingles, labor usually runs about $300 to $380 per square. Metal and tile crews charge more because the work is slower and needs specialists.</p>
<div class="tbl-wrap">
<table>
	<thead><tr><th>State</th><th>Labor per square</th></tr></thead>
	<tbody>
	<?php foreach (labor_table(300, 380) as $r): ?>
		<tr><td><?= e($r[0]) ?></td><td><?= usd($r[1]) ?> – <?= usd($r[2]) ?></td></tr>
	<?php endforeach; ?>
	</tbody>
</table>
</div>
<div class="tip"><strong>UK, Ireland, Europe or Australia:</strong> pick your currency and edit the price per square to a local quote. Common materials differ: concrete and clay tile and slate are standard in the UK, and Colorbond steel is standard in Australia, so the U.S. defaults are only a starting point.</div>
