<?php defined('BASEPATH') OR exit('No direct script access allowed'); $y = (int) config_item('price_year'); ?>
<h2 id="supplier">What the vinyl supplier will ask you</h2>
<p>Vinyl fence is sold as a system, so the counter will want more than a length. Have these ready:</p>
<ul>
	<li><strong>Height and style:</strong> 4 ft picket, 5 ft semi-privacy or 6 ft privacy.</li>
	<li><strong>Section width:</strong> 6 ft or 8 ft. The posts are routed for one or the other, so you can't mix them on a run.</li>
	<li><strong>Post count by type:</strong> line, corner, end and gate posts are routed differently. A corner post has holes on two adjacent faces, an end post on one face only.</li>
	<li><strong>Gate width and swing:</strong> most walk gates are 4 or 5 ft.</li>
</ul>

<h2 id="example">Counting panels and posts</h2>
<p>Take 150 ft of 6 ft privacy with 2 corners, 2 ends and one 4 ft gate. Remove the gate opening first, leaving 146 ft. The corners, ends and gate posts break that into four straight runs of about 36½ ft.</p>
<div class="formula">Panels per run = ⌈Run length ÷ Panel width⌉ &nbsp;·&nbsp; Line posts per run = Panels − 1<br>⌈36.5 ÷ 6⌉ = 7 panels → 4 runs × 7 = 28 panels, 24 line posts</div>
<p>Add the 6 terminal posts (2 corner, 2 end, 2 gate) for <strong>30 posts</strong>, 30 caps and about 60 bags of concrete. At typical prices that is roughly $5,650 in material.</p>
<p>Notice the seventh panel in each run only fills half a foot. Vinyl panels cut cleanly, but a 6 in sliver looks odd. Sliding a corner or the gate a few inches often saves a panel per run, so lay the line out with stakes before you order.</p>

<h2 id="posts">Post types at a glance</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Post</th><th>Where it goes</th><th>Routing</th></tr></thead>
	<tbody>
		<tr><td>Line</td><td>Between panels on a straight run</td><td>Two opposite faces</td></tr>
		<tr><td>Corner</td><td>Where the fence turns</td><td>Two adjacent faces</td></tr>
		<tr><td>End</td><td>Where a run stops, e.g. at the house</td><td>One face</td></tr>
		<tr><td>Gate</td><td>Both sides of a gate</td><td>One face, reinforced</td></tr>
	</tbody>
</table>
</div>
<p>Fill gate posts with concrete or slide an aluminum insert inside them. A hollow 5×5 vinyl post flexes every time the gate slams, and the latch stops lining up.</p>

<h2 id="prices">Material prices (<?= $y ?>)</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Item</th><th>Typical price</th></tr></thead>
	<tbody>
		<tr><td>6 × 6 ft privacy panel</td><td>$120</td></tr>
		<tr><td>4 ft picket panel</td><td>$95</td></tr>
		<tr><td>5×5 line post (6 ft fence)</td><td>$45</td></tr>
		<tr><td>Corner, end or gate post</td><td>$55</td></tr>
		<tr><td>Post cap</td><td>$6</td></tr>
		<tr><td>4 ft gate kit</td><td>$250</td></tr>
	</tbody>
</table>
</div>
<p>Need help with the hole sizes? The <a href="<?= site_url('fence-post-concrete-calculator') ?>">fence post concrete calculator</a> works out bags per hole. For an installed price with labor for your state, use the <a href="<?= site_url('fence-cost-calculator') ?>">fence cost calculator</a>.</p>
<div class="tip"><strong>UK, Ireland, Europe or Australia:</strong> PVC fencing is sold in metric sections, often 1.8 m or 2.4 m wide. Switch to metric and enter your length in metres; the panel count still works if you treat 1.8 m as the 6 ft option.</div>
