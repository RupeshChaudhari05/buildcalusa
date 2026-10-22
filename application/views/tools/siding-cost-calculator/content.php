<?php defined('BASEPATH') OR exit('No direct script access allowed'); $y = (int) config_item('price_year'); ?>
<h2 id="example">A 1,330 sq ft re-side, worked out</h2>
<p>Take a one-story ranch, 50 × 30 ft. The perimeter is 160 ft, and at 9 ft to the eaves that is 1,440 sq ft of wall. Two gable ends, 30 ft wide and 7.5 ft tall, add 225 sq ft, for 1,665 sq ft gross.</p>
<p>Take out 12 windows (15 sq ft each), 2 doors (21) and a 16 × 7 garage door (112), and 1,331 sq ft of wall gets covered. Add 10% for cuts and you order 14.6 squares. In vinyl at $6 per sq ft installed, with tear-off and new house wrap, that comes to about <strong>$10,700</strong>.</p>
<div class="formula">Net wall = Perimeter × Wall height + Gables × (Width × Height ÷ 2) − Openings
Siding = Net × (1 + waste) × Price × 50% material + Net × Price × 50% labor × state × stories
Total = Siding + Removal + House wrap + Soffit &amp; fascia</div>
<p>Siding is sold in squares of 100 sq ft, like roofing. Crews charge labor on the wall they actually cover, but you pay for the waste in material. That is why the formula splits the two.</p>

<h2 id="material-cost">Installed siding prices (<?= $y ?>)</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Siding</th><th>Installed $/sq ft</th><th>Same house</th><th>Lasts</th></tr></thead>
	<tbody>
		<tr><td>Vinyl</td><td>$4 – $8</td><td>$10,700</td><td>20–40 yrs</td></tr>
		<tr><td>Engineered wood</td><td>$5 – $9</td><td>$12,100</td><td>25–30 yrs</td></tr>
		<tr><td>Metal (steel, aluminum)</td><td>$6 – $11</td><td>$14,200</td><td>30–50 yrs</td></tr>
		<tr><td>Stucco</td><td>$7 – $11</td><td>$14,900</td><td>50+ yrs</td></tr>
		<tr><td>Fiber cement</td><td>$6 – $13</td><td>$15,600</td><td>30–50 yrs</td></tr>
		<tr><td>Wood lap or cedar shingle</td><td>$7 – $12</td><td>$16,300</td><td>20–40 yrs</td></tr>
	</tbody>
</table>
</div>
<p>The "same house" column uses the middle of each range with removal and house wrap. The calculator shows the same comparison for your own walls under the total.</p>

<h2 id="before-you-sign">Things a siding bid should spell out</h2>
<ul>
	<li><strong>Who pays for rot.</strong> Sheathing behind old siding near windows and the sill plate is often soft. Get a price per sheet before the old siding comes off.</li>
	<li><strong>Window and door trim.</strong> Vinyl uses J-channel. Fiber cement and wood need trim boards and flashing tape, which can add $50 to $150 per window.</li>
	<li><strong>Painting.</strong> Pre-finished fiber cement costs more up front. Primed boards need two coats of paint on site, so compare like with like. The <a href="<?= site_url('paint-calculator') ?>">paint calculator</a> gives gallons.</li>
	<li><strong>Height.</strong> A second story needs staging or a lift, which is why labor climbs about 10% per story.</li>
</ul>

<h2 id="labor">Siding labor by state</h2>
<p>Labor is usually around half of an installed price. For vinyl, that works out to roughly $2.50 to $4 per sq ft of wall.</p>
<div class="tbl-wrap">
<table>
	<thead><tr><th>State</th><th>Vinyl labor per sq ft</th></tr></thead>
	<tbody>
	<?php foreach (labor_table(2.5, 4) as $r): ?>
		<tr><td><?= e($r[0]) ?></td><td><?= usd($r[1], 2) ?> – <?= usd($r[2], 2) ?></td></tr>
	<?php endforeach; ?>
	</tbody>
</table>
</div>
<div class="tip"><strong>UK, Ireland, Europe or Australia:</strong> switch to metric and your currency, then enter a local installed price per m². Cladding choices differ: render and brick slips are common in the UK and Europe, and fibre cement weatherboard in Australia.</div>
