<?php defined('BASEPATH') OR exit('No direct script access allowed'); $y = (int) config_item('price_year'); ?>
<h2 id="code">The limits an inspector checks</h2>
<p>Most U.S. states build to the International Residential Code, section R311.7. These are the numbers inspectors put a tape on:</p>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Item</th><th>IRC limit</th></tr></thead>
	<tbody>
		<tr><td>Riser height</td><td>7¾ in max</td></tr>
		<tr><td>Tread depth</td><td>10 in min, nose to nose</td></tr>
		<tr><td>Riser variation in one flight</td><td>⅜ in max</td></tr>
		<tr><td>Nosing (treads under 11 in)</td><td>¾ to 1¼ in</td></tr>
		<tr><td>Stair width</td><td>36 in min</td></tr>
		<tr><td>Headroom</td><td>6 ft 8 in min</td></tr>
	</tbody>
</table>
</div>
<p>The ⅜ in rule is the one that fails jobs. It usually happens at the top or bottom step, when nobody allowed for the finished flooring or the tread thickness.</p>

<h2 id="layout">Laying out a 9 ft rise</h2>
<p>Measure the total rise from finished floor to finished floor. Measure it plumb at the spot where the bottom step will land, because yards and slabs are rarely level.</p>
<div class="formula">Risers = round up (Total rise ÷ 7.75) · Riser = Total rise ÷ Risers · Treads = Risers − 1<br>Run = Treads × Tread depth · Stringer = √(Rise² + Run²) · Angle = atan(Riser ÷ Tread)</div>
<p>For a 108 in rise, 108 ÷ 7.75 = 13.9, which rounds up to <strong>14 risers at 7-11/16 in</strong> and 13 treads. At 10½ in per tread the run is 136½ in. The stringer works out to about 174 in, or 14½ ft, so buy 16 ft 2×12s. The angle is 36.3°, inside the comfortable 30 to 37° band.</p>

<h2 id="material-cost">Stringer and tread prices (<?= $y ?>)</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Item</th><th>Typical price</th><th>Use</th></tr></thead>
	<tbody>
		<tr><td>2×12 pressure-treated, per ft</td><td>$2.40 – $3.00</td><td>Decks, exterior</td></tr>
		<tr><td>2×12 Douglas fir / SPF, per ft</td><td>$2.00 – $2.60</td><td>Basements, interior</td></tr>
		<tr><td>Precut stringer, 3–5 steps</td><td>$25 – $60</td><td>Fixed rise, rarely fits</td></tr>
		<tr><td>LVL stringer, per ft</td><td>$6 – $9</td><td>Long spans</td></tr>
		<tr><td>Tread</td><td>$15 – $35</td><td>Oak: $40 – $90</td></tr>
	</tbody>
</table>
</div>
<p>Keep stringers at 16 in on center or less, and closer to 12 in under most composite treads. Even a 36 in stair gets at least three.</p>

<h2 id="labor-cost">Carpenter rates per step, by state</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>State</th><th>Labor per step</th></tr></thead>
	<tbody>
	<?php foreach (labor_table(100, 200) as $r): ?>
		<tr><td><?= e($r[0]) ?></td><td><?= usd($r[1]) ?> – <?= usd($r[2]) ?></td></tr>
	<?php endforeach; ?>
	</tbody>
</table>
</div>

<h2 id="cutting">Cutting the first stringer</h2>
<ul>
	<li>Clamp stair gauges to a framing square at the riser and tread numbers, then step the layout down the board.</li>
	<li>Cut the bottom of the stringer short by one tread thickness. If you skip this, the first step is too tall and the inspector will catch it.</li>
	<li>Leave at least 5 in of solid wood, called the throat, under each notch. Finish the inside corners with a handsaw rather than overcutting with the circular saw.</li>
	<li>Test-fit the first stringer, then trace it for the rest.</li>
</ul>
<div class="tip"><strong>UK, Europe or Australia:</strong> switch to metric for centimetre results. Limits differ: UK Approved Document K allows up to a 220 mm rise on private stairs, and Australia's NCC sets risers at 115 to 190 mm. Enter your local maximum riser.</div>
