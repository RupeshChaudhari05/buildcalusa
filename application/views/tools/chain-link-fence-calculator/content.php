<?php defined('BASEPATH') OR exit('No direct script access allowed'); $y = (int) config_item('price_year'); ?>
<h2 id="parts">Every part, and how many you need</h2>
<p>Chain link has more small parts than any other residential fence, and running short of tension bands on a Saturday afternoon stops the job. These are the counting rules the calculator uses:</p>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Part</th><th>How many</th></tr></thead>
	<tbody>
		<tr><td>Fabric (50 ft rolls)</td><td>Fence length minus gates ÷ 50, rounded up</td></tr>
		<tr><td>Terminal posts</td><td>1 per end, 1 per corner, 2 per gate</td></tr>
		<tr><td>Line posts</td><td>Every 10 ft between terminals</td></tr>
		<tr><td>Top rail (21 ft)</td><td>Length minus gates ÷ 20.5 (joints overlap)</td></tr>
		<tr><td>Tension bars</td><td>1 per end and gate post, 2 per corner</td></tr>
		<tr><td>Tension bands</td><td>Fence height in ft − 1, per tension bar</td></tr>
		<tr><td>Brace bands &amp; rail end cups</td><td>1 each per tension bar</td></tr>
		<tr><td>Fence ties</td><td>1 per foot of height on line posts, 1 per 24 in of top rail</td></tr>
	</tbody>
</table>
</div>

<h2 id="example">A 150 ft backyard, counted</h2>
<p>For 150 ft of 6 ft fence with 2 corners, 2 ends and one 4 ft gate, the fabric covers 146 ft. That is <strong>3 rolls</strong>, 8 sticks of top rail, 6 terminal posts and 12 line posts.</p>
<div class="formula">Tension bars = Ends + 2 × Corners + 2 × Gates = 2 + 4 + 2 = 8<br>Tension bands = 8 × (6 − 1) = 40</div>
<p>Concrete runs about 1½ bags (50 lb) per line post and 2½ per terminal post, so 33 bags. With 11½ gauge fabric the material total comes to about $1,800, or roughly $12 per foot.</p>

<h2 id="prices">Material prices (<?= $y ?>)</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Item</th><th>4 ft fence</th><th>6 ft fence</th></tr></thead>
	<tbody>
		<tr><td>Fabric, 50 ft roll (11½ gauge)</td><td>$110</td><td>$175</td></tr>
		<tr><td>Line post, 1⅝ in</td><td>$15</td><td>$21</td></tr>
		<tr><td>Terminal post, 2⅜ in</td><td>$30</td><td>$38</td></tr>
		<tr><td>Top rail, 1⅜ in × 21 ft</td><td>$28</td><td>$28</td></tr>
		<tr><td>Walk gate</td><td>$110</td><td>$120</td></tr>
	</tbody>
</table>
</div>
<p>9 gauge fabric is heavier wire and costs about 45% more. It's worth it for dog runs and commercial lots, but rarely needed around a house.</p>

<h2 id="mistakes">Mistakes that cost a second trip</h2>
<ul>
	<li><strong>Setting line posts first.</strong> Set and string the terminal posts, let the concrete cure, then set line posts to the string.</li>
	<li><strong>Ordering terminal posts at line-post size.</strong> Terminals take the pull of the stretched fabric. They need the heavier 2⅜ in tube.</li>
	<li><strong>Stretching by hand.</strong> Rent or buy a fence stretcher. Hand-pulled fabric sags within a season.</li>
	<li><strong>Wrong post height.</strong> Line posts are usually fence height + 2 ft, and terminals the same, so they sit a couple of inches above the fabric.</li>
</ul>
<p>The <a href="<?= site_url('fence-post-concrete-calculator') ?>">fence post concrete calculator</a> sizes the holes and bags in detail. For an installed price with labor for your state, use the <a href="<?= site_url('fence-cost-calculator') ?>">fence cost calculator</a>. Comparing materials? See the <a href="<?= site_url('wood-fence-calculator') ?>">wood</a> and <a href="<?= site_url('vinyl-fence-calculator') ?>">vinyl</a> fence calculators.</p>
<div class="tip"><strong>UK, Ireland, Europe or Australia:</strong> chain link (chain wire or chain mesh) is often sold in 10, 15 or 25 m rolls. Switch to metric, then divide the fenced length by your roll length instead of 50 ft.</div>
