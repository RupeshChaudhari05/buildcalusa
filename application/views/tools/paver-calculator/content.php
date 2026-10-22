<?php defined('BASEPATH') OR exit('No direct script access allowed'); $y = (int) config_item('price_year'); ?>
<h2 id="example">What a 12 × 16 ft patio takes</h2>
<p>A 12 by 16 ft patio is 192 sq ft. A 6 × 9 in paver covers 0.375 sq ft, so the bare count is 512. Add 5% for cuts in a running bond and you need <strong>538 pavers</strong>. Under them goes 4 in of crushed base (about 4.1 tons once you allow for compaction), 1 in of bedding sand (just under a ton), three bags of polymeric sand and seven 8 ft lengths of edge restraint.</p>
<p>At the default prices that is roughly $990 in materials. With a crew at $12 per sq ft, the total lands near $3,300, or about $17 per sq ft installed.</p>
<div class="formula">Pavers = Area × (1 + waste %) ÷ (Paver length × Paver width ÷ 144)<br>Base tons = Area × Depth in ÷ 12 ÷ 27 × 1.15 × 1.5</div>
<p>The 1.15 factor covers compaction. Loose crushed stone loses 15–20% of its volume when you run a plate compactor over it.</p>

<h2 id="prices">Paver and base material prices (<?= $y ?>)</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Item</th><th>Typical price</th><th>Per sq ft of patio</th></tr></thead>
	<tbody>
		<tr><td>4 × 8 in holland paver</td><td>$0.70 each</td><td>$3.15</td></tr>
		<tr><td>6 × 9 in paver</td><td>$1.10 each</td><td>$2.93</td></tr>
		<tr><td>12 × 12 in paver</td><td>$3.00 each</td><td>$3.00</td></tr>
		<tr><td>24 × 24 in slab</td><td>$12 each</td><td>$3.00</td></tr>
		<tr><td>Crushed base (bulk)</td><td>$35 / ton</td><td>$0.75 at 4 in</td></tr>
		<tr><td>Bedding sand (bulk)</td><td>$45 / ton</td><td>$0.21</td></tr>
		<tr><td>Polymeric sand, 50 lb</td><td>$35 / bag</td><td>$0.47</td></tr>
	</tbody>
</table>
</div>
<p>Natural stone, permeable pavers and tumbled finishes run 2–3 times these prices.</p>

<h2 id="labor">Installed cost by state</h2>
<p>Hardscape crews quote $10–$18 per sq ft for a standard patio, including excavation, base, compaction and polymeric sand. Curves, borders and steps push it higher.</p>
<div class="tbl-wrap">
<table>
	<thead><tr><th>State</th><th>Labor $/sq ft</th></tr></thead>
	<tbody>
	<?php foreach (labor_table(10, 18) as $r): ?>
		<tr><td><?= e($r[0]) ?></td><td><?= usd($r[1], 2) ?> – <?= usd($r[2], 2) ?></td></tr>
	<?php endforeach; ?>
	</tbody>
</table>
</div>

<h3>Where paver jobs go wrong</h3>
<ul>
	<li><strong>Skimping on base.</strong> Sand is a leveling bed, not a foundation. Compact the base in 2 in lifts and wet it slightly before each pass.</li>
	<li><strong>Too much bedding sand.</strong> Keep it at 1 in. Thick sand lets pavers rock and rut.</li>
	<li><strong>No slope.</strong> Pitch the patio ⅛–¼ in per foot away from the house. Over 16 ft, that is a 2–4 in drop.</li>
	<li><strong>Edging left off along the lawn.</strong> Without a restraint, the outer rows creep out within a season.</li>
	<li><strong>Polymeric sand on damp pavers.</strong> It hazes the surface. Wait for a dry forecast, sweep the joints full and mist lightly.</li>
</ul>
<div class="tip"><strong>UK, Europe or Australia?</strong> Switch to metric and your currency. Block paving is usually 200 × 100 mm (enter 20 × 10 cm), laid on 100–150 mm of Type 1 sub-base and about 40 mm of sharp sand.</div>
