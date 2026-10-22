<?php defined('BASEPATH') OR exit('No direct script access allowed'); $y = (int) config_item('price_year');
// 16 × 12 ft raised deck, 40 ft of wood railing, 3 steps, permit, national labor (same as the calculator defaults)
$decks = array('Pressure-treated pine' => 4, 'Cedar' => 7, 'Composite' => 11, 'PVC' => 14, 'Ipe' => 15);
?>
<h2 id="answer">The short answer</h2>
<p>A new deck built by a contractor costs about <strong>$35 to $75 per square foot</strong> in <?= $y ?>. Where you land depends on three things: the decking material, how high the deck sits off the ground, and how much railing it needs. The default here, a 16 × 12 ft pressure-treated deck about 3 ft up with railing on three sides and three steps, comes to about <strong>$7,750</strong>, or $40 per sq ft.</p>
<div class="formula">Total = Area × (Decking $ + Framing $ × height factor + Labor $ × height factor × state index)
      + Footings × $ each + Railing ft × $/ft + Steps × $/step + Permit</div>
<p>Labor is the largest single line. On that default deck it is about $3,450 of the $7,750, more than the decking and framing put together.</p>

<h2 id="material">Same deck, different decking (<?= $y ?>)</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Decking</th><th>Material $/sq ft</th><th>16 × 12 deck total</th><th>Per sq ft</th></tr></thead>
	<tbody>
	<?php foreach ($decks as $name => $p):
		$total = 192 * $p + 192 * 6 + 5 * 120 + 40 * 30 + 3 * 90 + 300 + 192 * 18; ?>
		<tr><td><?= e($name) ?></td><td>$<?= $p ?></td><td><?= usd($total) ?></td><td><?= usd($total / 192) ?></td></tr>
	<?php endforeach; ?>
	</tbody>
</table>
</div>
<p>Swapping pine for composite adds only about $1,300 here, because the framing, footings and labor do not change. Composite also skips the yearly cleaning and staining. Most crews still frame composite decks with pressure-treated lumber, so the structure costs the same either way.</p>

<h2 id="height">Height changes everything underneath</h2>
<p>A deck 8 ft off the ground needs longer posts, heavier beams, more bracing and scaffolding or ladders for the crew. The calculator adds about 35% to framing, footings and labor for second-story decks, and takes about 15% off for decks that sit near the ground. A ground-level deck often needs no railing at all, since most codes only require guards when the walking surface is more than 30 in above grade.</p>

<h2 id="labor">Deck labor by state</h2>
<div class="tbl-wrap">
<table>
	<thead><tr><th>State</th><th>Framing &amp; decking labor $/sq ft</th></tr></thead>
	<tbody>
	<?php foreach (labor_table(15, 25) as $r): ?>
		<tr><td><?= e($r[0]) ?></td><td><?= usd($r[1]) ?> – <?= usd($r[2]) ?></td></tr>
	<?php endforeach; ?>
	</tbody>
</table>
</div>

<h2 id="quote">Reading a deck quote</h2>
<ul>
	<li><strong>Ledger attachment.</strong> A deck bolted to the house needs flashing and through-bolts or structural screws at the ledger. Ask how it will be attached. Failed ledgers cause most deck collapses.</li>
	<li><strong>Footing depth.</strong> Footings go below the frost line. In northern states that means 42 to 48 in holes, which takes more time and concrete.</li>
	<li><strong>Railing.</strong> Railing often costs as much as the decking. Cable and aluminum look clean but run $75 to $110 per foot installed.</li>
</ul>
<p>To count boards, screws and hidden clips for the surface, use the <a href="<?= site_url('deck-board-calculator') ?>">deck board calculator</a>. For the stairs, the <a href="<?= site_url('stair-stringer-calculator') ?>">stair stringer calculator</a> checks rise and run against code.</p>
<div class="tip"><strong>UK, Europe or Australia:</strong> switch to metric to price per m². Treated softwood decking is the cheap option in the UK and Europe, and hardwoods such as merbau or spotted gum are common in Australia. Enter your local supplier's price per m² for a real figure.</div>
