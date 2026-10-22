<?php defined('BASEPATH') OR exit('No direct script access allowed'); $y = (int) config_item('price_year'); ?>
<h2 id="formula">The 1.125 rule</h2>
<p>A standard block is 7⅝ × 7⅝ × 15⅝ in. With a ⅜ in mortar joint it covers a nominal 8 × 16 in of wall, which is 0.889 sq ft. So every square foot of wall takes 1.125 blocks, whatever the block's depth.</p>
<div class="formula">Blocks = (Length × Height − Openings) × 1.125 × (1 + Waste)<br>Mortar bags (80 lb) = Blocks ÷ 13</div>
<p>Worked example: a 30 ft wall, 8 ft tall, with no openings, is 240 sq ft. 240 × 1.125 = 270 blocks, plus 5% for breakage and cuts, comes to <strong>284 blocks</strong>. At about 13 blocks per 80 lb bag of Quikrete Mortar Mix, that is 22 bags.</p>

<h3>What the supplier will ask you</h3>
<ul>
	<li><strong>Stretchers, corners or both?</strong> Corner blocks have one finished end. You need two per course at every outside corner.</li>
	<li><strong>Half blocks?</strong> Count one per course at each wall end if you want to avoid cutting.</li>
	<li><strong>Bond beam or lintel blocks?</strong> Every opening needs a lintel, and most engineered walls have a bond beam at the top.</li>
	<li><strong>Mortar type?</strong> Type S for below-grade and retaining work, Type N for above-grade, non-structural walls.</li>
</ul>

<h2 id="material-cost">Block wall material prices (<?= $y ?>)</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Item</th><th>Typical price</th><th>Coverage</th></tr></thead>
	<tbody>
		<tr><td>8 × 8 × 16 standard block</td><td>$2 – $3</td><td>1.125 per sq ft</td></tr>
		<tr><td>12 × 8 × 16 block</td><td>$3.25 – $4.50</td><td>1.125 per sq ft</td></tr>
		<tr><td>Mortar Mix, 80 lb</td><td>$8 – $10</td><td>About 13 blocks</td></tr>
		<tr><td>Core-fill grout, 80 lb</td><td>$6 – $7</td><td>0.6 cu ft</td></tr>
		<tr><td>#4 rebar, 20 ft</td><td>$12 – $16</td><td>About $0.70 per ft</td></tr>
		<tr><td>Ladder joint reinforcement, 10 ft</td><td>$5 – $7</td><td>Every 2nd course</td></tr>
	</tbody>
</table>
</div>
<p>An 8 in block's two cores hold about 0.28 cu ft of grout. When only the rebar cells are filled, the calculator grouts one core per block in a vertical line every 48 in, plus 10% for grout lost into the joints.</p>

<h2 id="labor-cost">Mason rates by state</h2>
<p>Masons usually price block work by the square foot of wall: about $10 – $15 for plain 8 in block, more for split-face or curved walls. These rates cover laying only, not the footing.</p>
<div class="tbl-wrap">
<table>
	<thead><tr><th>State</th><th>Labor $/sq ft</th></tr></thead>
	<tbody>
	<?php foreach (labor_table(10, 15) as $r): ?>
		<tr><td><?= e($r[0]) ?></td><td><?= usd($r[1]) ?> – <?= usd($r[2]) ?></td></tr>
	<?php endforeach; ?>
	</tbody>
</table>
</div>
<p>One mason with a tender lays around 100 – 150 blocks a day on a straight wall. Mix mortar in small batches. Once it stiffens on the board it is done, and retempering with extra water weakens the joint.</p>
<div class="tip"><strong>Outside the U.S.?</strong> UK and Australian blocks are usually 440 × 215 mm (10 per m²) or 390 × 190 mm (12.5 per m²). Switch to metric, then adjust the count with the waste field, or divide the wall area by your block's face area.</div>
