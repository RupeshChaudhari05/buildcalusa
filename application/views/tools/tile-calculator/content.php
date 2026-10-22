<?php defined('BASEPATH') OR exit('No direct script access allowed'); $y = (int) config_item('price_year'); ?>
<h2 id="waste">Layout decides how much extra to buy</h2>
<p>The pattern changes the order more than anything else. Diagonal and herringbone layouts throw away a cut piece at every edge.</p>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Layout</th><th>Add for waste</th><th>Notes</th></tr></thead>
	<tbody>
		<tr><td>Straight grid</td><td>10%</td><td>Plain rooms</td></tr>
		<tr><td>Offset / brick</td><td>12%</td><td>Keep the offset at 33% or less on planks longer than 18 in, to limit lippage</td></tr>
		<tr><td>Diagonal</td><td>15%</td><td>Edge cuts on all four walls</td></tr>
		<tr><td>Herringbone / chevron</td><td>20%</td><td>Plus slower labor</td></tr>
	</tbody>
</table>
</div>

<h2 id="formula">Tile and box count</h2>
<p>Divide the area, plus waste, by what one tile covers <em>including its grout joint</em>. Round up to whole tiles, then to whole boxes.</p>
<div class="formula">Tiles = round up (Area × (1 + Waste %) ÷ ((Tile L + Joint) × (Tile W + Joint) ÷ 144))<br>Boxes = round up (Tiles ÷ Tiles per box)</div>
<p>A 12 × 10 ft floor is 120 sq ft. With 12×24 tile, ⅛ in joints and 10% waste, it needs <strong>65 tiles</strong>. At 8 tiles per box that is <strong>9 boxes</strong>, or 144 sq ft of tile.</p>

<h3>Grout and thinset</h3>
<p>Grout fills joint volume, so small tiles take much more of it per square foot:</p>
<div class="formula">Grout (lb/sq ft) = (L + W) ÷ (L × W) × 144 × Joint width × Tile thickness × 0.067</div>
<p>The sample floor needs about 7.5 lb, so one 25 lb bag. A 50 lb bag of thinset covers about 95 sq ft with a ¼ × ⅜ in notch. With the ½ in notch that a 12×24 needs, it covers about 50 sq ft, so this floor takes 3 bags.</p>

<h2 id="material-cost">Tile prices (<?= $y ?>)</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Tile</th><th>Material $/sq ft</th><th>Good for</th></tr></thead>
	<tbody>
		<tr><td>Ceramic</td><td>$1 – $5</td><td>Walls, backsplashes, light floors</td></tr>
		<tr><td>Porcelain</td><td>$3 – $10</td><td>Floors, showers, outdoors</td></tr>
		<tr><td>Wood-look porcelain plank</td><td>$3 – $8</td><td>Living areas, kitchens</td></tr>
		<tr><td>Travertine, slate</td><td>$5 – $15</td><td>Floors, feature walls</td></tr>
		<tr><td>Marble</td><td>$8 – $25</td><td>Baths</td></tr>
		<tr><td>Glass, mosaic</td><td>$10 – $30</td><td>Backsplashes, accents</td></tr>
	</tbody>
</table>
</div>
<p>Setting materials add $0.75 to $1.50 per square foot, more in wet areas once you count backer board or membrane. At $4 per square foot porcelain and $8 labor, the sample floor comes to about $1,630.</p>

<h2 id="labor-cost">Tile setter rates by state</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>State</th><th>Floor tile labor $/sq ft</th></tr></thead>
	<tbody>
	<?php foreach (labor_table(6, 12) as $r): ?>
		<tr><td><?= e($r[0]) ?></td><td><?= usd($r[1], 2) ?> – <?= usd($r[2], 2) ?></td></tr>
	<?php endforeach; ?>
	</tbody>
</table>
</div>
<p>Showers, mosaics and herringbone run $12 to $25 per square foot.</p>

<h2 id="counter">What the tile counter won't mention</h2>
<ul>
	<li>Buy every box from the same lot. Shade and size vary from lot to lot, and a second order rarely matches.</li>
	<li>Large tile needs a flat floor. For tiles with any edge over 15 in, the floor should be within ⅛ in over 10 ft. Budget for self-leveler if it isn't.</li>
	<li>Back-butter large tiles as well as combing the floor, or you will get hollow spots.</li>
	<li>Keep one sealed box. It is the cheapest repair insurance you can buy.</li>
</ul>
<div class="tip"><strong>UK, Europe or Australia:</strong> switch to metric and enter tile size in centimetres (30 × 60 cm, for example). Results are in m², and you can price tile per m² in GBP, EUR or AUD.</div>
