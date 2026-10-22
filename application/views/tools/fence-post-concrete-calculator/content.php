<?php defined('BASEPATH') OR exit('No direct script access allowed'); $y = (int) config_item('price_year');
// [post label, post size in, round?, fence height ft, hole dia in, hole depth in]
$holes = array(
	array('4×4 wood', 3.5, FALSE, 4, 10, 22),
	array('4×4 wood', 3.5, FALSE, 6, 10, 30),
	array('4×4 wood', 3.5, FALSE, 8, 10, 38),
	array('6×6 wood', 5.5, FALSE, 6, 16, 30),
	array('6×6 wood', 5.5, FALSE, 8, 16, 38),
	array('Chain link line, 1⅞ in', 1.875, TRUE, 4, 8, 24),
	array('Chain link terminal, 2⅜ in', 2.375, TRUE, 4, 10, 30),
);
?>
<h2 id="example">A 6 ft fence, one hole at a time</h2>
<p>A 4×4 post for a 6 ft fence goes in a 10 in hole about 30 in deep. The hole holds about 1.36 ft³. The post takes up about 0.21 ft³ of that, which leaves <strong>1.15 ft³ of concrete</strong>. With 10% extra for spills, that is about 3.4 bags of 50 lb fast-setting mix, or about 2.1 bags of 80 lb mix.</p>
<p>Across the 21 posts of a typical 150 ft run, you need about 71 bags of fast-setting mix, because the leftover from one hole goes into the next. If you insist on whole bags per hole, it is 84.</p>
<div class="formula">Concrete per hole = (π × (hole diameter ÷ 2)² − post area) × concrete depth ÷ 1,728
Bags per post = concrete per hole × (1 + extra %) ÷ bag yield</div>
<p>Inches go in, cubic feet come out, which is why the formula divides by 1,728. A square post's area is width × width. A round post's is π × radius².</p>

<h2 id="hole-size">Hole size and bags per hole</h2>
<p>The rule most fence crews use: the hole is about three times the post width, and the depth is one third of the fence height above ground plus 6 in. In cold states, go below the frost line no matter what the rule says, or the posts will heave.</p>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Post</th><th>Fence</th><th>Hole</th><th>50 lb fast-set</th><th>80 lb mix</th></tr></thead>
	<tbody>
	<?php foreach ($holes as $h):
		$area = M_PI * pow($h[4] / 2, 2) - ($h[2] ? M_PI * pow($h[1] / 2, 2) : $h[1] * $h[1]);
		$ft3  = $area * $h[5] / 1728; ?>
		<tr><td><?= e($h[0]) ?></td><td><?= $h[3] ?> ft</td><td><?= $h[4] ?> × <?= $h[5] ?> in</td><td><?= number_format($ft3 / 0.375, 1) ?></td><td><?= number_format($ft3 / 0.6, 1) ?></td></tr>
	<?php endforeach; ?>
	</tbody>
</table>
</div>
<p>Bag counts are per hole with no extra added. The calculator adds your spill allowance on top.</p>

<h2 id="price">What the bags cost (<?= $y ?>)</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Bag</th><th>Yield</th><th>Typical price</th><th>Cost per ft³</th></tr></thead>
	<tbody>
		<tr><td>40 lb concrete mix</td><td>0.30 ft³</td><td>$5.25</td><td>$17.50</td></tr>
		<tr><td>50 lb fast-setting</td><td>0.375 ft³</td><td>$7.50</td><td>$20.00</td></tr>
		<tr><td>60 lb concrete mix</td><td>0.45 ft³</td><td>$5.75</td><td>$12.78</td></tr>
		<tr><td>80 lb concrete mix</td><td>0.60 ft³</td><td>$6.50</td><td>$10.83</td></tr>
	</tbody>
</table>
</div>
<p>Fast-setting mix costs more per cubic foot, but you pour it dry into the hole, add water and keep moving. It sets in 20 to 40 minutes, and you can hang rails a few hours later. Regular mix is cheaper but has to be mixed in a tub or wheelbarrow, and the posts need bracing overnight.</p>

<h2 id="tips">Things that change the count</h2>
<ul>
	<li><strong>Gravel in the bottom.</strong> Six inches of gravel under the post lets water drain away from the end grain. It also cuts the concrete per hole by about a fifth.</li>
	<li><strong>Belled holes.</strong> A post-hole digger tends to flare the top of the hole. A 10 in hole that ends up 12 in across at the top takes about a quarter more concrete.</li>
	<li><strong>Gate posts.</strong> Hinge posts take the most load, so dig them wider and deeper than the line posts.</li>
</ul>
<p>For the full fence price, use the <a href="<?= site_url('fence-cost-calculator') ?>">fence cost calculator</a>. For slabs and footings, use the <a href="<?= site_url('concrete-calculator') ?>">concrete calculator</a>. Call 811 before you dig.</p>
<div class="tip"><strong>UK, Europe or Australia:</strong> switch to metric to enter holes in centimetres. Postcrete in the UK comes in 20 kg bags of about 0.009 m³. A 75 mm post in a 250 mm wide, 600 mm deep hole takes about three bags.</div>
