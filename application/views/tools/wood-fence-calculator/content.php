<?php defined('BASEPATH') OR exit('No direct script access allowed'); $y = (int) config_item('price_year'); ?>
<h2 id="example">The take-off for a 150 ft privacy fence</h2>
<p>A 150 ft run of 6 ft pressure-treated privacy fence with two corners, two ends and one 4 ft walk gate needs <strong>335 pickets, 22 posts and 60 rails</strong>. Add 44 bags of fast-set concrete and about 2,250 screws. At typical store prices the material comes to roughly $2,230, or about $15 per foot.</p>
<p>The gate opening comes off before the pickets are counted: 150 − 4 = 146 ft of picketed fence. Each 5½ in picket butted tight covers 5½ in, so:</p>
<div class="formula">Pickets = Picketed length (in) ÷ (Picket width + Gap − Overlap) × (1 + Waste)<br>146 × 12 ÷ 5.5 × 1.05 = 335</div>
<p>Posts are counted run by run. The corners, ends and gate posts split this fence into four straight runs of about 36½ ft. At 8 ft spacing each run needs 5 sections and 4 line posts, so the fence has 16 line posts plus 6 corner, end and gate posts.</p>

<h2 id="styles">Pickets per section by style</h2>
<p>Style changes the picket count more than anything else. These are for an 8 ft section with 5½ in pickets:</p>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Style</th><th>Covers per picket</th><th>Pickets per 8 ft</th></tr></thead>
	<tbody>
		<tr><td>Privacy, side by side</td><td>5½ in</td><td>18</td></tr>
		<tr><td>Shadowbox, 1 in overlap</td><td>4½ in</td><td>22</td></tr>
		<tr><td>Board-on-board, 1½ in overlap</td><td>4 in</td><td>24</td></tr>
		<tr><td>Picket fence, 2½ in gap</td><td>8 in</td><td>12</td></tr>
	</tbody>
</table>
</div>
<p>Board-on-board takes about a third more pickets than side by side, but it stays private after the boards shrink. Wet pressure-treated pickets can lose ¼ in of width as they dry, so a tight side-by-side fence will show slivers of light by the second summer.</p>

<h2 id="posts">Post length and rails by fence height</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Fence height</th><th>Depth in ground</th><th>Post to buy</th><th>Rails per section</th></tr></thead>
	<tbody>
		<tr><td>4 ft</td><td>2 ft</td><td>8 ft (cut down)</td><td>2</td></tr>
		<tr><td>6 ft</td><td>2 ft</td><td>8 ft</td><td>3</td></tr>
		<tr><td>8 ft</td><td>3 ft</td><td>12 ft</td><td>4</td></tr>
	</tbody>
</table>
</div>
<p>In states with deep frost, set posts below the frost line even if that means a 10 ft post for a 6 ft fence. Use 4×6 or 6×6 posts on the hinge side of any gate; a 4×4 will lean within a few years.</p>

<h2 id="prices">Material prices (<?= $y ?>)</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Item</th><th>Typical price</th></tr></thead>
	<tbody>
		<tr><td>6 ft dog-ear PT picket</td><td>$3.25</td></tr>
		<tr><td>2×4×8 PT rail</td><td>$5.50</td></tr>
		<tr><td>4×4×8 PT post</td><td>$12</td></tr>
		<tr><td>50 lb fast-setting concrete</td><td>$7.50</td></tr>
		<tr><td>Exterior screws, 5 lb box</td><td>$35</td></tr>
	</tbody>
</table>
</div>
<p>These are store prices for doing it yourself. Contractor quotes carry delivery, waste and markup on top. For an installed price with labor for your state, use the <a href="<?= site_url('fence-cost-calculator') ?>">fence cost calculator</a>.</p>

<h2 id="mistakes">Where take-offs go wrong</h2>
<ul>
	<li><strong>Forgetting gate posts.</strong> Every gate needs a post on both sides, even in the middle of a run.</li>
	<li><strong>Nails instead of screws.</strong> Ring-shank nails are faster, but screws let you replace a split picket without damaging the rest.</li>
	<li><strong>No spare pickets.</strong> Expect a few split or badly warped boards in every bundle. That is what the waste allowance covers.</li>
</ul>
<div class="tip"><strong>UK, Ireland, Europe or Australia:</strong> switch to metric and enter your board width in centimetres. Feather-edge boards in the UK are usually 100 or 125 mm wide and lap by about 25 mm, so use the overlap field.</div>
