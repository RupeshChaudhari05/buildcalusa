<?php defined('BASEPATH') OR exit('No direct script access allowed'); $y = (int) config_item('price_year'); ?>
<h2 id="answer">How junk haulers price a job</h2>
<p>Most crews price by how much of their truck your stuff fills. A standard box truck holds about 15 cubic yards, and in <?= $y ?> a half load runs about <strong>$425</strong> while a full truck runs about <strong>$700</strong>. The price includes the crew carrying everything out, the drive, and the dump fees.</p>
<div class="formula">Total = Load price (or Σ items × price each) × local index
      + stairs × per-flight fee + same-day fee
Heavy debris (concrete, dirt, shingles): load price × 1.4</div>
<p>The estimator on site makes the final call. They look at the pile, point at a line on the truck, and quote from that. If you've already measured the pile, you can check their number: length × width × height in feet, divided by 27, gives cubic yards.</p>

<h2 id="prices">Truckload prices (<?= $y ?>)</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Load</th><th>About</th><th>Price</th><th>Per yd³</th></tr></thead>
	<tbody>
		<tr><td>Minimum</td><td>1 yd³</td><td>$100</td><td>$100</td></tr>
		<tr><td>1/8 truck</td><td>2 yd³</td><td>$175</td><td>$88</td></tr>
		<tr><td>1/4 truck</td><td>4 yd³</td><td>$275</td><td>$69</td></tr>
		<tr><td>1/2 truck</td><td>7.5 yd³</td><td>$425</td><td>$57</td></tr>
		<tr><td>3/4 truck</td><td>11 yd³</td><td>$575</td><td>$52</td></tr>
		<tr><td>Full truck</td><td>15 yd³</td><td>$700</td><td>$47</td></tr>
	</tbody>
</table>
</div>
<p>The per-yard price falls as the load grows, so it pays to clear the whole garage in one visit instead of booking two small pickups.</p>

<h2 id="crew-or-dumpster">Junk crew or dumpster?</h2>
<ul>
	<li><strong>Crew wins:</strong> one-day cleanouts, estate clear-outs, a few heavy items, and anything upstairs. You never touch it.</li>
	<li><strong>Dumpster wins:</strong> remodels and roof jobs that make debris over a week or more. A <a href="<?= site_url('dumpster-rental-cost-calculator') ?>">20 yard dumpster</a> runs about $450 for a week, well under the $700 for a full truck, and holds a third more.</li>
	<li><strong>Check the weight first.</strong> Concrete and dirt fill a dumpster's weight allowance long before its volume. The <a href="<?= site_url('dumpster-weight-calculator') ?>">dumpster weight calculator</a> shows when a crew is the cheaper route. Not sure of the volume? Use the <a href="<?= site_url('dumpster-size-calculator') ?>">dumpster size calculator</a>.</li>
</ul>

<h2 id="tips">Ways to cut the bill</h2>
<ul>
	<li>Stage everything in the garage or driveway before the crew arrives. You pay for carry time and stairs.</li>
	<li>Sort out scrap metal. Many scrap yards pay for it, and some crews knock a little off when there's less going to the landfill.</li>
	<li>Ask whether usable furniture goes to donation. Many franchise junk haulers donate what they can and will give you the receipt.</li>
	<li>Book a weekday morning. Same-day and weekend slots often cost more.</li>
</ul>

<h2 id="labor">Half-truck price by state</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>State</th><th>1/2 truckload</th></tr></thead>
	<tbody>
	<?php foreach (labor_table(375, 475) as $r): ?>
		<tr><td><?= e($r[0]) ?></td><td><?= usd($r[1]) ?> – <?= usd($r[2]) ?></td></tr>
	<?php endforeach; ?>
	</tbody>
</table>
</div>
<div class="tip"><strong>UK, Ireland, Europe or Australia:</strong> UK "man and van" clearance firms price the same way, by how much of the van you fill, and must hold a waste carrier licence. Ask to see it, because fly-tipping fines can land on the householder. In Australia, rubbish removal is often quoted per m³. Switch to metric and enter your local price.</div>
