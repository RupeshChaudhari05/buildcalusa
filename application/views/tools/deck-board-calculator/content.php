<?php defined('BASEPATH') OR exit('No direct script access allowed'); $y = (int) config_item('price_year'); ?>
<h2 id="yard">What the lumber yard will ask you</h2>
<p>Call in a decking order and the counter will want four things: the board profile (5/4×6 or 2×6), the length, the count and the fasteners. The calculator gives you all four. For a 16 × 12 ft deck with boards running the 16 ft way, the answer is <strong>29 boards at 16 ft</strong> and about 680 screws.</p>

<h2 id="formula">The math behind the count</h2>
<p>A 5/4×6 or 2×6 is really 5½ in wide. Add a 3/16 in gap and each row takes up about 5.69 in. Divide the deck width by that to get rows, then multiply by the length:</p>
<div class="formula">Rows = Width (in) ÷ (Board width + Gap)<br>Boards = Rows × Length × (1 + Waste %) ÷ Board length<br>Screws = Rows × Joist crossings × 2</div>
<p>For the 12 ft width that is 144 ÷ 5.69 = 25.3, so 26 rows. 26 rows × 16 ft = 416 linear feet. Add 10% and divide by 16, and you get 29 boards. On 16 in centers a 16 ft board crosses 13 joists, so 26 × 13 × 2 = 676 screws, which is two 350-count boxes.</p>

<h3>Board length matters more than people think</h3>
<p>Buy boards that span the deck in one piece if you can. Every butt joint needs two joists or a sister block under it, and with 12 ft boards on a 16 ft deck you would need about 39 boards plus a row of joints. Where joints can't be avoided, stagger them so no two neighboring rows break on the same joist.</p>

<h2 id="material-cost">Decking prices (<?= $y ?>)</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Decking</th><th>Per linear ft</th><th>12 ft board</th><th>Lasts</th></tr></thead>
	<tbody>
		<tr><td>5/4×6 pressure-treated pine</td><td>$1.17</td><td>$14</td><td>10–15 yrs</td></tr>
		<tr><td>2×6 pressure-treated pine</td><td>$1.33</td><td>$16</td><td>10–15 yrs</td></tr>
		<tr><td>5/4×6 cedar</td><td>$2.33</td><td>$28</td><td>15–20 yrs</td></tr>
		<tr><td>Composite</td><td>$3.75</td><td>$45</td><td>25–30 yrs</td></tr>
		<tr><td>PVC / capped polymer</td><td>$4.58</td><td>$55</td><td>30+ yrs</td></tr>
	</tbody>
</table>
</div>
<p>On the sample deck, pine boards and screws cost about $620. The same deck in composite runs about $1,740 in boards alone. Composite never needs stain, so over 20 years the gap narrows a lot.</p>

<h2 id="labor-cost">Labor to lay decking, by state</h2>
<p>Re-decking a sound frame usually costs $4 to $8 per square foot in labor. A new deck with framing, footings and railing is a different job, at $15 to $35 per square foot all-in.</p>
<div class="tbl-wrap">
<table>
	<thead><tr><th>State</th><th>Decking labor $/sq ft</th></tr></thead>
	<tbody>
	<?php foreach (labor_table(4, 8) as $r): ?>
		<tr><td><?= e($r[0]) ?></td><td><?= usd($r[1], 2) ?> – <?= usd($r[2], 2) ?></td></tr>
	<?php endforeach; ?>
	</tbody>
</table>
</div>

<h3>Notes from the job</h3>
<ul>
	<li>Wet pressure-treated pine is usually laid tight. It shrinks to about a 1/8 in gap as it dries.</li>
	<li>Check the crown on each board and lay it crown up, so water runs off instead of pooling.</li>
	<li>Composite moves with temperature. Follow the maker's end-gap chart, and pre-drill near board ends.</li>
	<li>Many composites need 12 in joist spacing for diagonal runs. Check before you order.</li>
</ul>
<div class="tip"><strong>UK, Europe or Australia:</strong> switch to metric to enter metres and a gap in centimetres. Decking there is usually priced per metre, so enter your supplier's per-metre price.</div>
