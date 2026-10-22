<?php defined('BASEPATH') OR exit('No direct script access allowed'); $y = (int) config_item('price_year'); ?>
<h2 id="example">A 12 × 14 bedroom, worked out</h2>
<p>Take a 14 × 12 ft bedroom with 8 ft walls, one door and two windows. That is 416 sq ft of wall. Take off 20 sq ft for the door and 15 sq ft for each window, and you are left with <strong>366 sq ft</strong> to paint. Two coats at 350 sq ft per gallon comes to 2.1 gallons, so you buy <strong>2 gallons and a quart</strong>. Add the ceiling and you need roughly another half gallon of flat white per coat.</p>
<div class="formula">Wall area = 2 × (Length + Width) × Height − (Doors × 20) − (Windows × 15)<br>Gallons = Wall area × Coats ÷ Coverage per gallon<br>Primer gallons = (Walls + Ceiling) ÷ 300</div>
<p>The calculator rounds the way a paint counter does. Under a quarter gallon left over gets a quart. Anything more gets a full gallon. Past 4 gallons of one color, a 5-gallon bucket is usually cheaper per gallon.</p>

<h2 id="coverage">Why the label's coverage number runs high</h2>
<p>Most cans claim 350 to 400 sq ft per gallon. That figure assumes a smooth, previously painted wall in a similar color. Real jobs fall short of it in a few predictable ways:</p>
<ul>
	<li><strong>New drywall</strong> soaks up the first coat. Prime it with a PVA drywall primer, or plan on about 250 sq ft per gallon for the first coat.</li>
	<li><strong>Big color changes</strong>, especially deep reds and yellows, can take a third coat. A gray-tinted primer cuts that down.</li>
	<li><strong>Textured walls</strong> such as knockdown or orange peel use 10 to 20% more paint than smooth walls.</li>
	<li><strong>Spraying</strong> loses 20 to 30% to overspray compared with a roller.</li>
</ul>
<p>Painters also box their paint: they pour every gallon of a color into one 5-gallon bucket before starting, so a slight difference between cans never shows up as a line on the wall. Keep a labeled quart for touch-ups.</p>

<h2 id="material-cost">Paint prices (<?= $y ?>)</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Product</th><th>Per gallon</th><th>5-gallon bucket</th></tr></thead>
	<tbody>
		<tr><td>Contractor-grade interior flat</td><td>$25 – $35</td><td>$110 – $150</td></tr>
		<tr><td>Mid-grade eggshell or satin</td><td>$40 – $50</td><td>$180 – $225</td></tr>
		<tr><td>Premium interior</td><td>$60 – $80</td><td>$275 – $350</td></tr>
		<tr><td>Ceiling flat white</td><td>$25 – $35</td><td>$110 – $150</td></tr>
		<tr><td>Trim enamel, semi-gloss</td><td>$50 – $70</td><td>n/a</td></tr>
		<tr><td>Drywall or stain-blocking primer</td><td>$20 – $40</td><td>$90 – $160</td></tr>
	</tbody>
</table>
</div>
<p>Premium paint costs more per gallon but often covers in one fewer coat over a similar color. On a repaint, that saves more in labor than it costs in paint.</p>

<h2 id="labor-cost">What painters charge by state</h2>
<p>Most interior painters quote by the square foot of wall, with two coats and basic prep included: about <strong>$1.75 to $3.50 per sq ft</strong>. Trim is often priced separately at $1 to $2 per linear foot. Heavy patching, wallpaper removal and high ceilings are extra.</p>
<div class="tbl-wrap">
<table>
	<thead><tr><th>State</th><th>Walls, 2 coats, $/sq ft</th></tr></thead>
	<tbody>
	<?php foreach (labor_table(1.75, 3.5) as $r): ?>
		<tr><td><?= e($r[0]) ?></td><td><?= usd($r[1], 2) ?> – <?= usd($r[2], 2) ?></td></tr>
	<?php endforeach; ?>
	</tbody>
</table>
</div>
<div class="tip"><strong>UK, Europe or Australia:</strong> one U.S. gallon is 3.79 litres, and 350 sq ft per gallon works out to about 8.6 m² per litre. Paint in the UK and Australia is sold in 2.5 L, 5 L and 10 L tins, and many brands list 10 to 12 m² per litre. Switch to metric, enter the coverage from your tin converted to m² per gallon (m² per litre × 3.79), and the result shows litres alongside gallons.</div>
