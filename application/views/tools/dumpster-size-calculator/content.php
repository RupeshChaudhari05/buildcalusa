<?php defined('BASEPATH') OR exit('No direct script access allowed'); $y = (int) config_item('price_year'); ?>
<h2 id="example">A kitchen gut, sized out</h2>
<p>A 150 sq ft kitchen taken down to the studs (cabinets, countertops, drywall, flooring) makes about <strong>10 cubic yards</strong> of loose debris. Add 15% for the pieces that won't lie flat and you need room for 11.5 yd³. That rules out a 10 yard, so the answer is a <strong>15 yard dumpster</strong>, about two-thirds full. At roughly 450 lb per cubic yard the load weighs about 2.3 tons, just inside the 2.5 tons most haulers include with a 15.</p>
<div class="formula">Volume (yd³) = length × width × height (ft) ÷ 27
Size = smallest container ≥ volume × (1 + headroom), and its weight allowance ≥ estimated tons</div>
<p>The second half of that rule is the part people skip. Roofing is the classic case: shingles are small but heavy, so a roof tear-off runs out of weight allowance long before it runs out of space. A 2,000 sq ft roof with one layer is only about 5 yd³ of shingles, but it weighs around 2.5 tons. By volume a 10 yard fits. By weight you either take a 15 or pay overage on the 10.</p>

<h2 id="sizes">Dumpster sizes at a glance (<?= $y ?>)</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Size</th><th>Inside, approx.</th><th>Pickup loads</th><th>Weight usually included</th><th>Typical jobs</th></tr></thead>
	<tbody>
		<tr><td>10 yard</td><td>12 × 8 × 3.5 ft</td><td>4</td><td>2 tons</td><td>One bathroom, small deck, roof up to about 16 squares</td></tr>
		<tr><td>15 yard</td><td>16 × 8 × 4 ft</td><td>6</td><td>2.5 tons</td><td>Kitchen gut, 400 sq ft deck, one-car garage</td></tr>
		<tr><td>20 yard</td><td>22 × 8 × 4 ft</td><td>8</td><td>3 tons</td><td>Whole-floor flooring, two-car garage, large remodel</td></tr>
		<tr><td>30 yard</td><td>22 × 8 × 6 ft</td><td>12</td><td>4 tons</td><td>Whole-house cleanout, addition or major renovation</td></tr>
		<tr><td>40 yard</td><td>22 × 8 × 8 ft</td><td>16</td><td>5 tons</td><td>New construction, commercial cleanouts</td></tr>
	</tbody>
</table>
</div>
<p>Pickup loads assume an 8 ft bed filled level with the sides, about 2.5 yd³. Dimensions vary a little between haulers, but the length and height are what matter for fitting it on a driveway and lifting debris over the wall.</p>

<h2 id="mistakes">Mistakes that cost a second haul</h2>
<ul>
	<li><strong>Measuring the room, not the debris.</strong> Demolition bulks up. A cabinet that fit flat against a wall takes twice the space in pieces unless you break it down.</li>
	<li><strong>Filling above the rim.</strong> Haulers won't pull a container with debris sticking out over the top. Anything above the walls comes off by hand, on your time.</li>
	<li><strong>Mixing in concrete or dirt.</strong> Heavy material goes in a separate 10 yard heavy-debris box, filled only to the line painted inside. A 20 yard full of concrete is over the road weight limit.</li>
	<li><strong>Skipping the plywood.</strong> Lay two sheets of plywood under the rails to keep them from cracking or scuffing the driveway.</li>
</ul>
<p>If the job also needs a budget, the <a href="<?= site_url('dumpster-rental-cost-calculator') ?>">dumpster rental cost calculator</a> prices the size you land on here. Remodel and roof numbers come from the <a href="<?= site_url('bathroom-remodel-cost-calculator') ?>">bathroom remodel</a> and <a href="<?= site_url('roof-cost-calculator') ?>">roof cost</a> calculators.</p>
<div class="tip"><strong>UK, Ireland or Australia:</strong> UK skips are sold in cubic yards too, but smaller: a builder's skip is 6 to 8 yd³, and roll-on roll-off containers start around 20. Australian skip bins are sold in cubic metres, so switch to metric to see the volume in m³ and compare with your local bin sizes.</div>
