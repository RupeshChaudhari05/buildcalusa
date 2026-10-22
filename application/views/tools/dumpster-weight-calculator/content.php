<?php defined('BASEPATH') OR exit('No direct script access allowed'); $y = (int) config_item('price_year'); ?>
<h2 id="short-answer">Why a half-empty dumpster can still be overweight</h2>
<p>Haulers price a roll-off by size, but the landfill bills them by the ton, so every rental comes with a weight allowance and a per-ton charge above it. Take a re-roof with some cleanup: 20 squares of one-layer shingles, 2 yd³ of mixed debris and 1 yd³ of old lumber. That's only about 8 yd³, half of a 15 yard. It weighs <strong>about 3.3 tons</strong>, which is 0.8 tons over a typical 2.5-ton allowance. At $75 a ton that's close to $60 extra.</p>
<div class="formula">Weight (lb) = volume (yd³) × loose density (lb/yd³)
Shingles: squares × layers × 250 lb
Overage = (total tons − tons included) × price per ton</div>

<h2 id="weights">What debris weighs in a dumpster (<?= $y ?>)</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Material</th><th>lb per yd³ (loose)</th><th>Tons in 10 yd³</th></tr></thead>
	<tbody>
		<tr><td>Yard waste</td><td>250</td><td>1.25</td></tr>
		<tr><td>Household junk, furniture</td><td>300</td><td>1.5</td></tr>
		<tr><td>Wood and lumber</td><td>350</td><td>1.75</td></tr>
		<tr><td>Drywall</td><td>500</td><td>2.5</td></tr>
		<tr><td>Mixed construction debris</td><td>600</td><td>3</td></tr>
		<tr><td>Asphalt shingles</td><td>1,000</td><td>5</td></tr>
		<tr><td>Concrete or brick, broken</td><td>2,000</td><td>10</td></tr>
		<tr><td>Dirt</td><td>2,000</td><td>10</td></tr>
		<tr><td>Roofing tile</td><td>2,400</td><td>12</td></tr>
		<tr><td>Gravel or rock</td><td>2,700</td><td>13.5</td></tr>
	</tbody>
</table>
</div>
<p>These are loose figures, with the air gaps you get when debris is thrown in. Solid concrete weighs about twice what broken concrete does per yard. Wet material is the other trap: drywall and dirt that sat in the rain can weigh a third more, and the scale doesn't care why.</p>

<h2 id="limits">Weight limits and heavy debris</h2>
<p>General debris containers usually include 2 tons for a 10 yard, rising to about 5 tons for a 40. Heavy material works differently. Concrete, brick, dirt and rock go in a 10 yard heavy-debris container that can carry around 10 tons, but only when it's filled to the line painted inside. Put the same material in a 30 yard and the truck can't legally lift it.</p>
<ul>
	<li><strong>Keep heavy loads clean.</strong> Many haulers price a heavy-debris box as one material. A few bags of trash on top can turn it into a mixed load at a higher rate.</li>
	<li><strong>Spread heavy items out.</strong> A pile of concrete at one end can put the load off balance when the container is winched up.</li>
	<li><strong>Ask about the scale ticket.</strong> Overage is billed from the landfill weight, usually a few days after pickup. Ask for a copy.</li>
</ul>
<p>Not sure of the volume yet? The <a href="<?= site_url('dumpster-size-calculator') ?>">dumpster size calculator</a> works it out from the project, and the <a href="<?= site_url('dumpster-rental-cost-calculator') ?>">rental cost calculator</a> prices the container. Re-roofing? Shingle squares come from the <a href="<?= site_url('roofing-shingle-calculator') ?>">roofing shingle calculator</a>.</p>
<div class="tip"><strong>Outside the U.S.?</strong> Switch to metric and weights show in tonnes (1 U.S. ton is 0.907 tonnes) and volumes in m³. UK skip hire usually caps weight by skip size rather than charging per tonne, so check the hire terms before loading soil or hardcore.</div>
