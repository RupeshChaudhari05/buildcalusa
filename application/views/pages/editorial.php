<?php defined('BASEPATH') OR exit('No direct script access allowed'); $n = e(config_item('site_name')); ?>
<div class="container">
	<header class="page-head"><h1>Editorial policy &amp; methodology</h1>
		<p class="lead-sm mb-0">How every <?= $n ?> calculator is researched, tested, priced and corrected.</p></header>
	<div class="prose">
		<h2>1. Formulas</h2>
		<p>Each calculator uses standard quantity-takeoff formulas from U.S. estimating practice. Coverage figures come from manufacturer data (for example, Quikrete bag yields, USG joint-compound coverage and shingle bundles per square), and code limits come from the International Residential Code (IRC). The formula is printed on every page so you can check the math yourself.</p>

		<h2>2. Testing</h2>
		<p>Before launch, every calculator is tested against hand calculations and real project takeoffs, including edge cases such as very small jobs, metric input and zero values. We re-test whenever a formula changes.</p>

		<h2>3. Prices</h2>
		<ul>
			<li><strong>Materials:</strong> national averages from large U.S. home-improvement retailers and supplier price lists, for <?= (int) config_item('price_year') ?>.</li>
			<li><strong>Labor:</strong> typical contractor rates, scaled by a state index based on relative construction trade wages (U.S. average = 1.00).</li>
			<li><strong>Currencies:</strong> converted at approximate exchange rates for convenience. Local prices outside the U.S. vary, so every price field can be edited.</li>
		</ul>
		<p>Each page shows a "last updated" date. We change that date only when we actually review or update the content or prices.</p>

		<h2>4. Independence</h2>
		<p>Advertising and affiliate partners have no input into our formulas, default prices or recommendations. Affiliate links are labeled and use <code>rel="sponsored"</code>.</p>

		<h2>5. Corrections</h2>
		<p>If you find a mistake, <a href="<?= site_url('contact') ?>">tell us</a>. We review every report, fix confirmed errors promptly, and update the page's review date.</p>

		<h2>6. Limitations</h2>
		<p>Calculators give planning estimates, not engineered designs or binding quotes. Structural work, such as footings, stairs and roofs, must follow your local building code and may require a permit, inspection, or a licensed professional.</p>
	</div>
</div>
