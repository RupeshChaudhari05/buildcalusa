<?php defined('BASEPATH') OR exit('No direct script access allowed'); $y = (int) config_item('price_year'); ?>
<h2 id="example">Pricing a $37,000 job</h2>
<p>The default job has $37,000 of direct cost: $12,000 materials, $15,000 labor, $8,000 subs and $2,000 for equipment and permits. Overhead at 15% adds $5,550, so the job breaks even at $42,550. To keep 10% of the selling price as net profit, the bid is:</p>
<div class="formula">Bid = Break-even cost ÷ (1 − Net margin) = $42,550 ÷ 0.90 = $47,278</div>
<p>That bid is a 27.8% markup on direct cost. It sounds like a lot until you see where it goes: $5,550 runs the business and $4,728 is profit.</p>

<h2 id="markup-vs-margin">Markup vs. margin</h2>
<p>Markup is profit divided by cost. Margin is profit divided by price. They describe the same dollars, but margin is always the smaller number.</p>
<div class="formula">Margin = Markup ÷ (1 + Markup) &nbsp;&nbsp;·&nbsp;&nbsp; Markup = Margin ÷ (1 − Margin)</div>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Markup on cost</th><th>Gross margin</th></tr></thead>
	<tbody>
		<tr><td>10%</td><td>9.1%</td></tr>
		<tr><td>15%</td><td>13.0%</td></tr>
		<tr><td>20%</td><td>16.7%</td></tr>
		<tr><td>25%</td><td>20.0%</td></tr>
		<tr><td>33.3%</td><td>25.0%</td></tr>
		<tr><td>50%</td><td>33.3%</td></tr>
		<tr><td>100%</td><td>50.0%</td></tr>
	</tbody>
</table>
</div>

<h3>Why "10 and 10" isn't 20%</h3>
<p>The old rule of 10% overhead and 10% profit is applied twice, one on top of the other: 1.10 × 1.10 = 1.21. That is a 21% markup on cost, which is only a 17.4% gross margin. Contractors who quote "20% margin" while using 10 and 10 are short about 2.6 points on every job. On a $500,000 year, that is around $13,000.</p>

<h2 id="typical-markup">Typical markups by type of work</h2>
<p>These are common ranges, not rules. Your own overhead decides the right number.</p>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Work</th><th>Typical markup on direct cost</th></tr></thead>
	<tbody>
		<tr><td>New construction, larger GC jobs</td><td>10% – 20%</td></tr>
		<tr><td>Residential remodeling</td><td>25% – 50%</td></tr>
		<tr><td>Small jobs and handyman work</td><td>40% – 75%</td></tr>
		<tr><td>Service and repair calls</td><td>50% – 100%</td></tr>
	</tbody>
</table>
</div>

<h2 id="overhead">Find your real overhead percentage</h2>
<p>Add up a year of costs that don't belong to any one job, then divide by a year of direct job cost. $120,000 of overhead on $800,000 of direct cost is 15%. The table shows what a small crew typically carries.</p>
<div class="tbl-wrap">
<table>
	<thead><tr><th>Annual overhead item (<?= $y ?>, 3-person crew)</th><th>Typical range</th></tr></thead>
	<tbody>
		<tr><td>Truck payment, fuel, insurance (per truck)</td><td>$9,000 – $16,000</td></tr>
		<tr><td>General liability insurance</td><td>$1,500 – $5,000</td></tr>
		<tr><td>Office, phone, software</td><td>$3,000 – $8,000</td></tr>
		<tr><td>Marketing and lead services</td><td>$3,000 – $12,000</td></tr>
		<tr><td>Owner time spent estimating (unbilled)</td><td>$15,000 – $40,000</td></tr>
	</tbody>
</table>
</div>
<p>The last line is the one most people leave out. If you spend 15 hours a week bidding and only win a third of the jobs, that time has to be paid for out of the jobs you do win.</p>
<div class="tip"><strong>UK, Ireland, Europe and Australia:</strong> pick your currency above. Enter costs without VAT or GST, then add VAT (20% UK, 23% Ireland) or GST (10% Australia, 15% NZ) to the bid if you are registered.</div>
