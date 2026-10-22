<?php defined('BASEPATH') OR exit('No direct script access allowed'); $y = (int) config_item('price_year'); ?>
<h2 id="example">Topping up a 1,200 sq ft attic</h2>
<p>Most attics built before the 1990s have about 3½ in of old fiberglass, roughly <strong>R-11</strong>. In climate zone 4 (Virginia, Missouri, Kansas) the recommended level is R-49 to R-60, so you need to add at least <strong>R-38</strong>. With blown cellulose at about R-3.6 per inch, that is 10.6 in of new material. A 25 lb bag covers about 30 sq ft at that depth, so a 40 × 30 ft attic takes <strong>40 bags</strong>, roughly $640 in material.</p>
<div class="formula">R to add = Target R − Existing R<br>Depth (in) = R to add ÷ R per inch<br>Cellulose bags = Area × R to add ÷ 1,150 &nbsp;·&nbsp; Blown fiberglass bags = Area × R to add ÷ 2,100<br>Spray foam board feet = Area × Depth (in)</div>
<p>The bag constants come from typical coverage charts: a cellulose bag covers about 38 sq ft at R-30, and a fiberglass bag about 70 sq ft. Your bag's chart is the final word, so check it before you buy.</p>

<h2 id="r-values">Recommended R-values by climate zone</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Zone</th><th>Attic</th><th>2×4 / 2×6 walls</th><th>Floor over crawl</th></tr></thead>
	<tbody>
		<tr><td>1</td><td>R-30 to R-49</td><td>R-13 to R-15</td><td>R-13</td></tr>
		<tr><td>2 – 3</td><td>R-38 to R-60</td><td>R-13 to R-15</td><td>R-13 (zone 2), R-19 to R-25 (zone 3)</td></tr>
		<tr><td>4</td><td>R-49 to R-60</td><td>R-13 to R-15</td><td>R-19 to R-25</td></tr>
		<tr><td>5 – 8</td><td>R-49 to R-60</td><td>R-20, or R-13 + R-5 foam</td><td>R-25 to R-30</td></tr>
	</tbody>
</table>
</div>

<h2 id="material-cost">What each type costs (<?= $y ?>)</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Type</th><th>R per inch</th><th>Material</th><th>Installed</th></tr></thead>
	<tbody>
		<tr><td>Fiberglass batts</td><td>3.1 – 3.4</td><td>$0.55 (R-13) – $1.35 (R-38) /sq ft</td><td>$1.00 – $2.50 /sq ft</td></tr>
		<tr><td>Blown cellulose</td><td>3.4 – 3.8</td><td>$14 – $18 per 25 lb bag</td><td>$1.25 – $2.25 /sq ft</td></tr>
		<tr><td>Blown fiberglass</td><td>2.5 – 2.9</td><td>$40 – $50 per bag</td><td>$1.25 – $2.50 /sq ft</td></tr>
		<tr><td>Closed-cell spray foam</td><td>6.0 – 7.0</td><td>n/a</td><td>$1.00 – $1.50 per board ft</td></tr>
	</tbody>
</table>
</div>
<p>Spray foam is priced per board foot (1 sq ft, 1 in thick) and almost always installed by a pro, so the calculator treats its price as all-in.</p>

<h2 id="labor-cost">Installer rates by state</h2>
<p>For blowing an attic or hanging batts, contractors charge about $0.75 to $1.50 per square foot in labor on top of material. Removing old, damaged or rodent-soiled insulation is extra, often $1 to $2 per square foot.</p>
<div class="tbl-wrap">
<table>
	<thead><tr><th>State</th><th>Labor $/sq ft</th></tr></thead>
	<tbody>
	<?php foreach (labor_table(0.75, 1.5) as $r): ?>
		<tr><td><?= e($r[0]) ?></td><td><?= usd($r[1], 2) ?> – <?= usd($r[2], 2) ?></td></tr>
	<?php endforeach; ?>
	</tbody>
</table>
</div>

<h3>Mistakes that waste the money</h3>
<ul>
	<li><strong>Skipping air sealing.</strong> Insulation doesn't stop air. Foam the wiring and plumbing holes in the top plates first.</li>
	<li><strong>Blocking the soffits.</strong> Staple baffles in every rafter bay at the eaves before blowing, or the roof deck can't vent.</li>
	<li><strong>Squashing batts.</strong> An R-30 batt crammed into a 2×6 cavity performs closer to R-21.</li>
	<li><strong>No depth markers.</strong> Inspectors look for depth rulers stapled to the trusses, about one per 300 sq ft, so they can check blown insulation without disturbing it.</li>
</ul>
<div class="tip"><strong>UK, Europe or Australia:</strong> U.S. R-values are in imperial units. Divide by 5.68 to get metric RSI (R-38 is about RSI 6.7). UK guidance for lofts is usually 270 mm of mineral wool. Switch to metric for areas in m² and depths in cm.</div>
