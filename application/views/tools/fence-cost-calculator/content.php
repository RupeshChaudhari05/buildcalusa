<?php defined('BASEPATH') OR exit('No direct script access allowed'); $y = (int) config_item('price_year'); ?>
<h2 id="example">A 150 ft wood fence, priced out</h2>
<p>Take a typical back yard: 150 linear feet of 6 ft pressure-treated privacy fence with one walk gate. At the default prices it comes to about <strong>$5,900</strong>, or roughly $39 per foot installed:</p>
<ul>
	<li>Materials: 150 ft × $25 = $3,750</li>
	<li>Labor: 150 ft × $12 = $1,800</li>
	<li>One gate: $350</li>
</ul>
<p>The take-off for that job is 21 posts, 57 rails, about 344 pickets and 42 bags of post concrete. That is what the calculator lists under the total, and it is the list a lumber yard will want.</p>
<div class="formula">Total = (Length × Material $/ft × Height factor) + (Gates × Gate price) + (Length × Labor $/ft × Site factor × State index)</div>
<p>Prices are for a 6 ft fence. Drop to 4 ft and materials fall about 20%. Go to 8 ft and they rise about 35%, because the posts get longer and the holes get deeper.</p>

<h2 id="material-cost">Price per foot by material (<?= $y ?>)</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Material</th><th>Material $/ft</th><th>Installed $/ft</th><th>Lasts</th></tr></thead>
	<tbody>
		<tr><td>Chain link</td><td>$15</td><td>$20 – $28</td><td>15–20 yrs</td></tr>
		<tr><td>Pressure-treated pine</td><td>$25</td><td>$32 – $45</td><td>15–20 yrs</td></tr>
		<tr><td>Cedar</td><td>$32</td><td>$40 – $55</td><td>20–30 yrs</td></tr>
		<tr><td>Aluminum</td><td>$32</td><td>$40 – $60</td><td>30+ yrs</td></tr>
		<tr><td>Vinyl</td><td>$35</td><td>$42 – $60</td><td>25–30 yrs</td></tr>
		<tr><td>Composite</td><td>$45</td><td>$55 – $75</td><td>25–30 yrs</td></tr>
		<tr><td>Wrought iron</td><td>$50</td><td>$60 – $90</td><td>50+ yrs</td></tr>
	</tbody>
</table>
</div>
<p>Material prices include posts, rails, pickets or panels and hardware. A walk gate runs $250 to $800. A double drive gate costs two to three times that and needs 6×6 posts set deeper than the line posts.</p>

<h2 id="by-material">Wood, vinyl and chain link fence cost</h2>
<p>Pick the material in the calculator and the prices below load in automatically. Here is what moves the number for each one.</p>

<h3 id="wood-fence-cost">Wood fence cost</h3>
<p>A 6 ft pressure-treated pine privacy fence runs about <strong>$32 to $45 per foot installed</strong>, so 150 ft lands near $5,900 with one gate. Cedar adds roughly a quarter to the material bill. Board-on-board and shadowbox styles use 30 to 50% more pickets than side-by-side privacy, and the pickets are most of the material cost. Budget for stain too: a sealed fence lasts years longer, and a bare pine fence starts to gray and check in its first summer.</p>

<h3 id="vinyl-fence-cost">Vinyl fence cost</h3>
<p>Vinyl privacy fence comes to about <strong>$42 to $60 per foot installed</strong>. It's sold in 6 or 8 ft panels, so the count of sections and posts decides the price more than the exact footage. Corner, end and gate posts cost more than line posts, and gate posts usually need an aluminum insert. Labor is close to wood, because the posts still have to be set in concrete and kept plumb.</p>

<h3 id="chain-link-fence-cost">Chain link fence cost</h3>
<p>Chain link is the cheapest at <strong>$20 to $28 per foot installed</strong> for 4 to 6 ft residential galvanized fabric. Heavier 9-gauge wire, black vinyl coating and privacy slats each add to that, and slats can nearly double the material cost. Terminal posts at ends, corners and gates take more concrete than line posts, so a short run with many corners costs more per foot than a long straight one.</p>

<h2 id="labor-cost">Installer rates by state</h2>
<p>Most crews charge $8 to $18 per linear foot. Chain link is at the bottom of that range, and 8 ft privacy and iron are at the top. Rocky or clay soil can add 15 to 25%, because the post holes take longer to dig.</p>
<div class="tbl-wrap">
<table>
	<thead><tr><th>State</th><th>Labor $/ft (wood or vinyl)</th></tr></thead>
	<tbody>
	<?php foreach (labor_table(10, 15) as $r): ?>
		<tr><td><?= e($r[0]) ?></td><td><?= usd($r[1]) ?> – <?= usd($r[2]) ?></td></tr>
	<?php endforeach; ?>
	</tbody>
</table>
</div>

<h2 id="mistakes">Mistakes that cost money</h2>
<ul>
	<li><strong>Building on a guessed property line.</strong> Find the survey pins first, or set the fence a few inches inside your line. Moving 150 ft of fence costs more than the survey.</li>
	<li><strong>Shallow posts.</strong> Bury about a third of the post length: 2 to 3 ft for a 6 ft fence. In cold states, go below the frost line or the posts will heave.</li>
	<li><strong>Too few gate posts.</strong> Each gate needs its own post, which the calculator adds. Use a 4×6 or 6×6 on the hinge side.</li>
	<li><strong>Ignoring the finished side.</strong> Many towns and HOAs require the good side to face the neighbor. Check before you order panels.</li>
</ul>
<p>Call 811 a few days before you dig. Marking buried lines is free.</p>
<div class="tip"><strong>UK, Ireland, Europe or Australia:</strong> switch to metric and pick your currency. Exchange rates are approximate and panel sizes differ (UK panels are usually 1.83 m wide), so enter a local price per metre for a real number.</div>
