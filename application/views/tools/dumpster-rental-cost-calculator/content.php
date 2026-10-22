<?php defined('BASEPATH') OR exit('No direct script access allowed'); $y = (int) config_item('price_year'); ?>
<h2 id="answer">What a roll-off really costs</h2>
<p>A roll-off dumpster rents for about <strong>$350 to $650 for a week</strong> in <?= $y ?>, depending on size. The default here, a 20 yard container for 7 days with 3 tons included, comes to <strong>$450</strong>. The base price is rarely where the bill goes wrong. Weight is.</p>
<div class="formula">Total = Base price × local index
      + (Days − days included) × extra-day fee
      + max(0, your tons − tons included) × overweight fee
      + permit + surcharges</div>
<p>Haulers charge overweight fees from the landfill scale ticket, not from a guess. Ask for a copy of the ticket with the invoice. Reputable haulers send it without a fuss.</p>

<h2 id="sizes">Price by size (<?= $y ?>)</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Size</th><th>Typical job</th><th>Price, 7 days</th><th>Weight included</th></tr></thead>
	<tbody>
		<tr><td>10 yard</td><td>Bathroom gut, small deck, concrete patio</td><td>$350</td><td>2 tons</td></tr>
		<tr><td>15 yard</td><td>Kitchen remodel, garage cleanout</td><td>$400</td><td>2.5 tons</td></tr>
		<tr><td>20 yard</td><td>Roof tear-off up to about 3,000 sq ft, whole-house flooring</td><td>$450</td><td>3 tons</td></tr>
		<tr><td>30 yard</td><td>Addition, major remodel, siding job</td><td>$550</td><td>4 tons</td></tr>
		<tr><td>40 yard</td><td>Whole-house cleanout, new construction</td><td>$650</td><td>5 tons</td></tr>
	</tbody>
</table>
</div>
<p>Roofing is the job that most often runs heavy. One layer of asphalt shingles weighs roughly 1.5 to 2 tons per 1,000 sq ft of roof, so a two-layer tear-off on a big house can blow past a 3 ton allowance. Run the numbers in the <a href="<?= site_url('roofing-shingle-calculator') ?>">roofing shingle calculator</a> first, and price the whole job with the <a href="<?= site_url('roof-cost-calculator') ?>">roof cost calculator</a>.</p>

<h2 id="extra-fees">Where the bill grows</h2>
<ul>
	<li><strong>Overweight tons.</strong> Usually $50 to $100 per ton. Concrete, tile, plaster and wet debris are the usual culprits.</li>
	<li><strong>Extra days.</strong> About $5 to $15 a day once the included term runs out. Schedule the pickup before the crew starts the next job.</li>
	<li><strong>Trip fee.</strong> If a car blocks the driveway on pickup day, expect $75 to $150 for the wasted trip.</li>
	<li><strong>Banned items.</strong> Tires, mattresses and appliances with refrigerant are often $10 to $50 each.</li>
	<li><strong>Overfilling.</strong> Drivers won't haul a load above the rim. Anything sticking up comes out before the truck leaves.</li>
</ul>
<p>Put two sheets of plywood under the wheels when the dumpster sits on a driveway. A loaded 20 yard box can crack thin asphalt or leave ruts in pavers.</p>

<h2 id="by-state">20 yard rental by state</h2>
<p>Landfill tipping fees drive most of the difference between states. The figures below scale a $400 to $500 national range by our regional index.</p>
<div class="tbl-wrap">
<table>
	<thead><tr><th>State</th><th>20 yard, 7 days</th></tr></thead>
	<tbody>
	<?php foreach (labor_table(400, 500) as $r): ?>
		<tr><td><?= e($r[0]) ?></td><td><?= usd($r[1]) ?> – <?= usd($r[2]) ?></td></tr>
	<?php endforeach; ?>
	</tbody>
</table>
</div>
<p>For a remodel, the dumpster is a small slice of the budget. See the <a href="<?= site_url('bathroom-remodel-cost-calculator') ?>">bathroom remodel</a> and <a href="<?= site_url('deck-cost-calculator') ?>">deck cost</a> calculators. Breaking out an old slab? The <a href="<?= site_url('concrete-calculator') ?>">concrete calculator</a> gives you the cubic yards to plan the heavy-debris box.</p>
<div class="tip"><strong>UK, Ireland, Europe or Australia:</strong> in the UK this is skip hire, and skips are still sized in cubic yards, from 2 yd mini skips to 8 yd builder's skips and 12 to 16 yd roll-on roll-offs. A skip on the road needs a council licence. Australian skip bins are sized in m³ (1 yd³ is about 0.76 m³). Switch to metric and enter your local price.</div>
