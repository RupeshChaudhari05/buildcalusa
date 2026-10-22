<?php defined('BASEPATH') OR exit('No direct script access allowed'); $n = e(config_item('site_name')); ?>
<div class="container">
	<header class="page-head"><h1>About <?= $n ?></h1>
		<p class="lead-sm mb-0">Free, fast construction calculators built by people who estimate jobs for a living.</p></header>
	<div class="prose">
		<h2>Our mission</h2>
		<p><?= $n ?> exists to give homeowners, DIYers and working contractors in the United States, as well as builders in Canada, the UK, Europe and Australia, a fast, honest number before they buy materials or sign a quote. Every calculator works instantly in your browser, never asks for an email address, and shows exactly how the result was calculated.</p>

		<h2>Who builds and reviews the calculators</h2>
		<p>Our content is produced by the <strong><?= e(config_item('author_name')) ?></strong>: <?= e(config_item('author_role')) ?>. Each formula is checked against manufacturer coverage charts, building-code tables (such as the International Residential Code), and real job takeoffs before it is published.</p>
		<?php if (config_item('reviewer_name')): ?>
		<p>Technical review: <strong><?= e(config_item('reviewer_name')) ?></strong>, <?= e(config_item('reviewer_role')) ?>.</p>
		<?php endif; ?>

		<h2>How we keep prices current</h2>
		<p>Material prices are U.S. national averages compiled from major home-improvement retailers, supplier price sheets and published contractor cost data. Labor rates are scaled by state using relative construction trade wages. We re-check prices regularly, and every calculator page shows the date it was last reviewed. See our <a href="<?= site_url('editorial-policy') ?>">editorial policy</a> for the full methodology.</p>

		<h2>How we make money</h2>
		<p>The calculators are free because the site shows advertising (Google AdSense) and links to retailers such as The Home Depot and Lowe's. If you buy through those links we may earn a small commission at no extra cost to you. Advertisers and retailers never influence our formulas or prices. Read the full <a href="<?= site_url('disclaimer') ?>">disclosure</a>.</p>

		<h2>Contact us</h2>
		<p>Found an error, or want us to build a new calculator? <a href="<?= site_url('contact') ?>">Get in touch</a>. Corrections are reviewed within two business days.</p>
	</div>
</div>
