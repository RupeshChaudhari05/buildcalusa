<?php defined('BASEPATH') OR exit('No direct script access allowed'); $y = (int) config_item('price_year'); ?>
<h2 id="formula">The board foot formula</h2>
<p>A board foot is a piece of wood 12 in × 12 in × 1 in, or 144 cubic inches. To find the board feet in any piece, multiply thickness in inches by width in inches by length in feet, then divide by 12.</p>
<div class="formula">Board feet = Thickness (in) × Width (in) × Length (ft) ÷ 12</div>
<p>The default list shows how it adds up. Four pieces of 8/4 red oak, 6 in wide and 8 ft long, are 2 × 6 × 8 ÷ 12 = 8 BF each, so 32 BF. Six pieces of 4/4 stock, 8 in wide and 6 ft long, are 4 BF each, so 24 BF. That makes 56 BF. With 15% waste you buy about 64 BF, which at $6 comes to roughly $386.</p>

<h2 id="quarters">Quarters, nominal sizes and what the yard measures</h2>
<p>Hardwood thickness is sold in quarters of an inch. 4/4 ("four quarter") is 1 in rough, 5/4 is 1¼ in, and 8/4 is 2 in. The board foot count uses that rough thickness, not what is left after planing.</p>
<p>Width is different. Under NHLA rules, hardwood is sold in random widths and the yard measures the actual width of each board, rounded to the nearest inch. Don't expect every board in a stack to be 6 in wide.</p>
<p>Softwood framing lumber uses nominal sizes. A 2×4 is really 1½ × 3½ in, but its board feet are figured on 2 × 4. That is why a 2×4×8 counts as 5.33 BF even though it holds less wood.</p>

<h3>Rough vs. S4S</h3>
<p>Rough lumber comes straight from the kiln. S4S (surfaced four sides) has been planed and ripped straight, and it usually costs 10 to 20% more per board foot. Planing removes about ⅛ in from each face, so 4/4 rough finishes near ¾ in and 8/4 near 1¾ in. If your plans call for a full 1 in, buy 5/4.</p>

<h2 id="common-boards">Board feet in common sizes</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Piece (nominal)</th><th>Board feet</th></tr></thead>
	<tbody>
		<tr><td>1×6 × 8 ft</td><td>4.00</td></tr>
		<tr><td>2×4 × 8 ft</td><td>5.33</td></tr>
		<tr><td>2×6 × 8 ft</td><td>8.00</td></tr>
		<tr><td>2×8 × 10 ft</td><td>13.33</td></tr>
		<tr><td>2×10 × 12 ft</td><td>20.00</td></tr>
		<tr><td>2×12 × 16 ft</td><td>32.00</td></tr>
		<tr><td>4×4 × 8 ft</td><td>10.67</td></tr>
		<tr><td>6×6 × 10 ft</td><td>30.00</td></tr>
	</tbody>
</table>
</div>

<h2 id="prices">Hardwood price per board foot (<?= $y ?>)</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Species (4/4 rough, FAS)</th><th>Typical $/BF</th></tr></thead>
	<tbody>
		<tr><td>Pressure-treated pine</td><td>$2 – $3</td></tr>
		<tr><td>Poplar</td><td>$4 – $5.50</td></tr>
		<tr><td>Western red cedar</td><td>$4.50 – $7</td></tr>
		<tr><td>Red oak</td><td>$5 – $7</td></tr>
		<tr><td>Hard maple</td><td>$6 – $8.50</td></tr>
		<tr><td>White oak</td><td>$7.50 – $10</td></tr>
		<tr><td>Cherry</td><td>$8 – $11</td></tr>
		<tr><td>Black walnut</td><td>$12 – $17</td></tr>
	</tbody>
</table>
</div>
<p>Thick stock costs more per board foot: 8/4 usually runs 10 to 25% over 4/4, and wide or long boards carry a premium too. Lower grades such as #1 Common are cheaper, but you will cut more of each board away.</p>
<p>Two habits save money at the yard. Bring a list in board feet, not pieces, because that is how the counter prices it. And carry a tape: random-width stock means a "6 in" board might be 5 or 7, and you pay for what is there.</p>
<div class="tip"><strong>UK, Europe and Australia:</strong> timber is usually sold by the cubic metre or by the linear metre. One cubic metre is about 424 board feet, and the calculator shows your total in m³ as well. Switch the currency above and enter your merchant's price per board foot (price per m³ ÷ 424).</div>
