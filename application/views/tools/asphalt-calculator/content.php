<?php defined('BASEPATH') OR exit('No direct script access allowed'); $y = (int) config_item('price_year'); ?>
<h2 id="answer">Short answer for a single-car driveway</h2>
<p>A 50 × 12 ft driveway paved 3 in thick takes about <strong>11.4 tons</strong> of hot mix. Over a 6 in stone base, with a crew doing the work, that is roughly <strong>$4,100</strong> at the defaults, or just under $7 per square foot.</p>

<h2 id="thickness">How thick, for what traffic</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Use</th><th>Compacted asphalt</th><th>Stone base</th><th>Tons per 100 sq ft</th></tr></thead>
	<tbody>
		<tr><td>Walkway, golf-cart path</td><td>2 in</td><td>4 in</td><td>1.3</td></tr>
		<tr><td>Car driveway</td><td>3 in</td><td>6 in</td><td>1.9</td></tr>
		<tr><td>Trucks, RV, small lot</td><td>4 in (binder + top)</td><td>8 in</td><td>2.5</td></tr>
	</tbody>
</table>
</div>
<p>The base does more to stop cracking than the asphalt does. A thin mat on a good base outlasts a thick mat on soft clay.</p>

<h2 id="formula">Turning square feet into tons</h2>
<p>Plants sell by weight. Compacted hot mix weighs about 145 lb per cubic foot:</p>
<div class="formula">Tons = Length × Width × (Thickness in ÷ 12) × 145 ÷ 2,000 × (1 + Waste %)</div>
<p>50 × 12 × 0.25 ft = 150 cubic feet. × 145 lb = 21,750 lb, or 10.9 tons. Add 5% and you get 11.4 tons. A single tri-axle hauls about 20 tons, so this is one load.</p>

<h2 id="material-cost">Paving prices (<?= $y ?>)</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Item</th><th>Typical U.S. price</th><th>Notes</th></tr></thead>
	<tbody>
		<tr><td>Hot mix asphalt</td><td>$100 – $200 / ton</td><td>Plant price; default $130</td></tr>
		<tr><td>Crushed stone base</td><td>$25 – $50 / ton</td><td>About 1.35 tons per yd³</td></tr>
		<tr><td>Paving labor and equipment</td><td>$2.50 – $5 / sq ft</td><td>Grade, pave, roll</td></tr>
		<tr><td>New driveway, all-in</td><td>$5 – $10 / sq ft</td><td>On prepared ground</td></tr>
		<tr><td>Sealcoating</td><td>$0.20 – $0.40 / sq ft</td><td>Every 2–3 years</td></tr>
	</tbody>
</table>
</div>
<p>Liquid asphalt binder is a petroleum product, so prices follow crude oil. Small jobs often pay a plant minimum or a trucking charge that the per-ton price hides.</p>

<h2 id="labor-cost">Paving labor by state</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>State</th><th>Paving labor $/sq ft</th></tr></thead>
	<tbody>
	<?php foreach (labor_table(2.5, 5) as $r): ?>
		<tr><td><?= e($r[0]) ?></td><td><?= usd($r[1], 2) ?> – <?= usd($r[2], 2) ?></td></tr>
	<?php endforeach; ?>
	</tbody>
</table>
</div>

<h2 id="timing">Timing the job</h2>
<ul>
	<li>In northern states most plants shut down from late fall to spring. Book early, or expect cold patch until they reopen.</li>
	<li>The mat is laid loose and rolled down. A crew spreads about 3¾ in to finish at 3 in, which is why the waste allowance matters.</li>
	<li>Keep cars off for 2 to 3 days, longer in hot weather. Wait 6 to 12 months before the first sealcoat.</li>
	<li>If the old driveway is sound, ask about a 1½ to 2 in overlay instead of a tear-out.</li>
</ul>
<div class="tip"><strong>UK, Europe or Australia:</strong> switch to metric for tonnes and m². Tarmac and bitumen surfacing is priced per tonne or per m² there, so enter your local rate.</div>
