<?php defined('BASEPATH') OR exit('No direct script access allowed'); $y = (int) config_item('price_year'); ?>
<h2 id="formula">Counting blocks for a retaining wall</h2>
<p>Work out the number of courses, then the blocks in each course. The first course always goes below grade, so add it to the count even though you will never see it.</p>
<div class="formula">Courses = ⌈Exposed height ÷ Block height⌉ + Buried courses<br>Blocks = Courses × ⌈Wall length × 12 ÷ Block width⌉ × (1 + Waste)</div>
<p>Worked example: a 40 ft wall, 36 in tall, in 6 in × 16 in blocks. That is 6 courses above grade plus 1 buried, so 7 courses. Each course needs 480 ÷ 16 = 30 blocks. 7 × 30 = 210, plus 5% for cuts at the ends and corners, comes to <strong>221 blocks</strong>.</p>

<h3>The stone matters as much as the block</h3>
<p>Most small walls fail from water, not weight. The calculator adds two separate stone quantities:</p>
<ul>
	<li><strong>Base:</strong> a trench 24 in wide and 6 in deep, filled with compacted crushed stone (¾ in minus). Level this course with a 4 ft level in both directions. Every error here doubles by the top course.</li>
	<li><strong>Drainage:</strong> 12 in of clean ¾ in stone behind the full height of the wall, with a 4 in perforated pipe at the bottom that daylights at one end.</li>
</ul>
<p>Wrap the drainage stone in filter fabric so soil does not wash into it and clog it within a few seasons.</p>

<h2 id="material-cost">Retaining wall material prices (<?= $y ?>)</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Item</th><th>Typical price</th><th>Notes</th></tr></thead>
	<tbody>
		<tr><td>Small wall block (4" × 12")</td><td>$3 – $4 each</td><td>Garden walls up to about 2 ft</td></tr>
		<tr><td>Medium block (6" × 16")</td><td>$5 – $7 each</td><td>Most DIY walls</td></tr>
		<tr><td>Large block (8" × 18")</td><td>$8 – $11 each</td><td>Taller walls, heavier to set</td></tr>
		<tr><td>Cap stone (12")</td><td>$4.50 – $7 each</td><td>Glued with masonry adhesive</td></tr>
		<tr><td>Crushed base stone</td><td>$30 – $45 per ton</td><td>Plus a $75 – $150 delivery fee</td></tr>
		<tr><td>Clean drainage stone</td><td>$40 – $55 per ton</td><td>¾ in washed</td></tr>
	</tbody>
</table>
</div>

<h2 id="labor-cost">Installed cost by state</h2>
<p>Landscapers price block walls by the square foot of face. Labor alone runs about $25 – $35 per sq ft for walls under 4 ft, or $40 – $55 with materials, before rock excavation or hauling away spoil.</p>
<div class="tbl-wrap">
<table>
	<thead><tr><th>State</th><th>Labor $/sq ft of face</th></tr></thead>
	<tbody>
	<?php foreach (labor_table(25, 35) as $r): ?>
		<tr><td><?= e($r[0]) ?></td><td><?= usd($r[1]) ?> – <?= usd($r[2]) ?></td></tr>
	<?php endforeach; ?>
	</tbody>
</table>
</div>

<h3>Mistakes that cost money</h3>
<ul>
	<li>Setting the first course on dirt. It will settle unevenly within a year.</li>
	<li>Backfilling with the clay you dug out. Clay holds water and pushes the wall over.</li>
	<li>Skipping geogrid above 3 ft. Block makers publish height limits for walls without it. Read yours before you order.</li>
	<li>Building over 4 ft without a permit. Most towns require an engineer's design at that height, and a failed wall is your liability.</li>
</ul>
<div class="tip"><strong>UK, Europe or Australia?</strong> Switch to metric. Block sizes vary by maker, so type your block's face height and width into the fields above. Many councils set their own height limit (often 1 m) before a wall needs approval.</div>
