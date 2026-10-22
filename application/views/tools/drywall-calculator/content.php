<?php defined('BASEPATH') OR exit('No direct script access allowed'); $y = (int) config_item('price_year'); ?>
<h2 id="example">One bedroom, start to finish</h2>
<p>A 14 × 12 ft bedroom with 8 ft walls, one door and two windows, ceiling included:</p>
<ul>
	<li>Walls: 2 × (14 + 12) × 8 = 416 sq ft</li>
	<li>Ceiling: 14 × 12 = 168 sq ft</li>
	<li>Minus one door (21 sq ft) and two windows (15 sq ft each) = <strong>533 sq ft</strong></li>
	<li>Plus 10% waste = 586 sq ft ÷ 32 = <strong>19 sheets of 4×8</strong></li>
</ul>
<p>It also takes 2 buckets of mud, 1 roll of tape and 1 box of screws. Hung and finished by a crew, that is about $1,430, or $2.68 per square foot of board.</p>
<div class="formula">Net area = 2 × (L + W) × H + Ceiling − (Doors × 21) − (Windows × 15)<br>Sheets = round up (Net area × (1 + Waste %) ÷ Sheet area)</div>

<h2 id="consumables">Mud, tape and screws</h2>
<p>The USG Gypsum Construction Handbook puts a three-coat finish at about <strong>138 lb of ready-mix compound</strong> and <strong>370 ft of paper tape</strong> per 1,000 sq ft of board. A 4.5 gal bucket holds about 62 lb. Screws run about one per square foot, so 32 per 4×8 sheet. Space them 12 in apart on ceilings and 16 in on walls.</p>

<h2 id="material-cost">Board and finishing prices (<?= $y ?>)</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Item</th><th>Typical price</th><th>Covers</th></tr></thead>
	<tbody>
		<tr><td>½ in sheet, 4×8</td><td>$13 – $18</td><td>32 sq ft</td></tr>
		<tr><td>½ in sheet, 4×12</td><td>$20 – $26</td><td>48 sq ft</td></tr>
		<tr><td>⅝ in Type X, 4×8</td><td>$17 – $24</td><td>32 sq ft</td></tr>
		<tr><td>Moisture-resistant, 4×8</td><td>$17 – $22</td><td>32 sq ft</td></tr>
		<tr><td>Joint compound, 4.5 gal</td><td>$18 – $24</td><td>About 450 sq ft</td></tr>
		<tr><td>Paper tape, 250 ft</td><td>$4 – $6</td><td>About 675 sq ft</td></tr>
		<tr><td>Screws, 5 lb</td><td>$30 – $40</td><td>About 1,600 screws</td></tr>
	</tbody>
</table>
</div>

<h2 id="labor-cost">Hang and finish rates by state</h2>
<p>$1.50 to $3.00 per square foot buys a Level 4 finish, which is ready for flat or eggshell paint. A Level 5 skim coat or a textured ceiling adds $0.50 to $1.00.</p>
<div class="tbl-wrap">
<table>
	<thead><tr><th>State</th><th>Hang + finish $/sq ft</th></tr></thead>
	<tbody>
	<?php foreach (labor_table(1.5, 3) as $r): ?>
		<tr><td><?= e($r[0]) ?></td><td><?= usd($r[1], 2) ?> – <?= usd($r[2], 2) ?></td></tr>
	<?php endforeach; ?>
	</tbody>
</table>
</div>

<h2 id="mistakes">Where drywall estimates go wrong</h2>
<ul>
	<li><strong>9 ft walls.</strong> Two 4 ft sheets leave a 1 ft strip to fill. Order 54 in wide board instead: two rows make 9 ft exactly, with one seam and no filler strip.</li>
	<li><strong>Too little waste.</strong> Use 10% on plain rooms, 12 to 15% when there are lots of windows and soffits, and 15 to 20% for vaults and stairwells.</li>
	<li><strong>The wrong ceiling board.</strong> On 24 in joist spacing, ½ in board sags. Use ⅝ in or a sag-resistant ceiling board.</li>
	<li><strong>Not planning to get 12 ft sheets in.</strong> 4×12s save a lot of taping on long walls, but check they will fit through the door and up the stairs. A rented panel lift costs about $40 a day for ceilings.</li>
</ul>
<div class="tip"><strong>Plasterboard in the UK, Europe or Australia:</strong> switch to metric. A 4×8 sheet is the same as the common 1200 × 2400 mm board, so the sheet count holds. Enter your local board price.</div>
