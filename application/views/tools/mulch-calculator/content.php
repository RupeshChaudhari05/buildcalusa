<?php defined('BASEPATH') OR exit('No direct script access allowed'); $y = (int) config_item('price_year'); ?>
<h2 id="rule">The quick rule: 1 yard covers 108 sq ft at 3 in</h2>
<p>Mulch is sold by the cubic yard in bulk and by the 2 cubic foot bag at the store. One cubic yard spread 3 in deep covers 108 sq ft. At 2 in it covers 162 sq ft. Everything else is multiplication.</p>
<div class="formula">Cubic yards = Area (sq ft) × Depth (in) ÷ 12 ÷ 27<br>Bags (2 ft³) = Cubic yards × 13.5</div>
<p>Two beds of 30 × 6 ft are 360 sq ft. At 3 in deep that is 90 cubic feet, or <strong>3.33 cubic yards</strong>. In bags it is 45 bags. A landscape yard will round the order up to 3.5 yards.</p>

<h2 id="prices">Mulch prices (<?= $y ?>)</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Type</th><th>Bulk $/yd³</th><th>2 ft³ bag</th><th>Bagged $/yd³</th><th>Lasts</th></tr></thead>
	<tbody>
		<tr><td>Shredded hardwood</td><td>$35</td><td>$4.00</td><td>$54</td><td>1 season</td></tr>
		<tr><td>Dyed hardwood</td><td>$40</td><td>$4.50</td><td>$61</td><td>1 season (color fades)</td></tr>
		<tr><td>Pine bark nuggets</td><td>$45</td><td>$5.00</td><td>$68</td><td>2 seasons</td></tr>
		<tr><td>Cedar</td><td>$55</td><td>$6.00</td><td>$81</td><td>2–3 seasons</td></tr>
		<tr><td>Rubber</td><td>$250</td><td>$9.00</td><td>$122+</td><td>10+ years</td></tr>
	</tbody>
</table>
</div>
<p>Delivery usually runs $50–$100, and many yards have a 2–3 yard minimum for delivery. Bag prices drop during spring promotions ("5 for $10" deals are common in April and May), which is when bags beat bulk on small jobs. Rubber mulch bags are often 0.8 ft³, so check the bag size before you compare.</p>

<h3>Bags or bulk?</h3>
<p>Below about 3 yards, bags often come out even or cheaper once you add delivery. Above that, bulk wins, and you skip the plastic and the 40-plus trips from the car. Bulk mulch is also fresher. Bagged mulch can sit on a pallet for months and arrive sour-smelling.</p>

<h2 id="labor">Paying someone to spread it</h2>
<p>Landscapers usually charge $45–$75 per yard to spread mulch on top of the material price, more if they edge and weed first. Per square foot, that works out to:</p>
<div class="tbl-wrap">
<table>
	<thead><tr><th>State</th><th>Spreading labor $/sq ft</th></tr></thead>
	<tbody>
	<?php foreach (labor_table(0.45, 0.75) as $r): ?>
		<tr><td><?= e($r[0]) ?></td><td><?= usd($r[1], 2) ?> – <?= usd($r[2], 2) ?></td></tr>
	<?php endforeach; ?>
	</tbody>
</table>
</div>

<h3>Habits that save mulch and plants</h3>
<ul>
	<li>Rake the old layer loose before topping up. You will usually only need 1–2 in.</li>
	<li>Keep mulch off tree trunks. "Mulch volcanoes" rot bark and invite pests.</li>
	<li>Edge the beds first. A clean 3 in trench holds the mulch in place and makes the job look finished.</li>
	<li>Don't put wood mulch right against the foundation in termite areas. Leave a gap of about 6 in, or use stone there.</li>
</ul>
<div class="tip"><strong>UK, Europe or Australia?</strong> Switch to metric. Bark is usually sold in 60–100 litre bags or 1 m³ bulk bags. One cubic metre covers about 13 m² at 75 mm deep.</div>
