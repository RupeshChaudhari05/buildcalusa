<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$slug     = $tool['slug'];
$reviewer = config_item('reviewer_name');
$faqs     = isset($data['faqs']) ? $data['faqs'] : array();
$howto    = isset($data['howto']) ? $data['howto'] : NULL;
$shop     = isset($data['shop']) ? $data['shop'] : array();
$sources  = isset($data['sources']) ? $data['sources'] : array();
?>
<div class="container">
	<header class="page-head">
		<h1><?= e($tool['h1']) ?></h1>
		<?php if ( ! empty($data['lead'])): ?><p class="lead-sm mb-0"><?= $data['lead'] ?></p><?php endif; ?>
		<div class="pills">
			<span class="pill"><?= icon('check', 14) ?> Free</span>
			<span class="pill"><?= icon('shield', 14) ?> No email or sign-up</span>
			<span class="pill"><?= icon('bolt', 14) ?> Instant results</span>
			<span class="pill"><?= icon('globe', 14) ?> ft / m · $ £ € A$</span>
		</div>
		<div class="byline">
			<span><?= icon('user', 14) ?> By <a href="<?= site_url('about') ?>"><?= e(config_item('author_name')) ?></a></span>
			<?php if ($reviewer): ?><span><?= icon('shield', 14) ?> Reviewed by <?= e($reviewer) ?><?= config_item('reviewer_role') ? ', ' . e(config_item('reviewer_role')) : '' ?></span><?php endif; ?>
			<span><?= icon('clock', 14) ?> Updated <time datetime="<?= e($tool['updated']) ?>"><?= long_date($tool['updated']) ?></time></span>
		</div>
	</header>

	<section class="card-x calc" aria-label="<?= e($tool['name']) ?>">
		<div class="calc-bar">
			<?php if (empty($data['no_units'])): ?>
			<div class="seg" role="group" aria-label="Units">
				<button type="button" data-sys="imperial" aria-pressed="true">Imperial (ft)</button>
				<button type="button" data-sys="metric" aria-pressed="false">Metric (m)</button>
			</div>
			<?php endif; ?>
			<label class="visually-hidden" for="cur">Currency</label>
			<select id="cur" class="form-select" data-cur>
				<option value="USD">USD $</option>
				<option value="CAD">CAD $</option>
				<option value="GBP">GBP £</option>
				<option value="EUR">EUR €</option>
				<option value="AUD">AUD $</option>
				<option value="NZD">NZD $</option>
			</select>
			<button type="button" class="btn-x ms-auto" data-calc-action="reset" title="Reset to defaults"><?= icon('reset', 16) ?> Reset</button>
		</div>
		<div class="calc-grid">
			<div class="calc-body">
				<form id="calc" novalidate autocomplete="off">
					<?= initial_visibility($this->load->view('tools/' . $slug . '/calculator', array(), TRUE)) ?>
				</form>
			</div>
			<div class="result" aria-live="polite">
				<div class="result-inner">
					<div id="calc-hero" class="hero-grid"></div>
					<table class="rtable"><tbody id="calc-rows"></tbody></table>
					<div id="calc-note"></div>
					<div class="actions mt-2">
						<button type="button" class="btn-x primary" data-share="native"><?= icon('share', 16) ?> Share result</button>
						<button type="button" class="btn-x" data-calc-action="copy"><?= icon('copy', 16) ?> Copy</button>
						<button type="button" class="btn-x" data-calc-action="print"><?= icon('print', 16) ?> Print / PDF</button>
					</div>
					<?php
					$trade = isset(Tool_registry::$trades[$slug]) ? Tool_registry::$trades[$slug] : NULL;
					$links = (array) config_item('quote_links');
					if ($trade && ! empty($links[$trade])): ?>
					<a class="btn-x quote-btn mt-2" href="<?= e($links[$trade]) ?>" rel="sponsored nofollow noopener" target="_blank">Get free local quotes from <?= e($trade === 'remodel' ? 'remodelers' : $trade . ' pros') ?> →</a>
					<span class="d-block calc-note">Optional. Opens our partner's site; we may be paid for referrals.</span>
					<?php endif; ?>
					<p class="calc-note mt-2 mb-0">Prices are <?= (int) config_item('price_year') ?> U.S. averages; currency conversion is approximate. Edit any price to match your local quote.</p>
				</div>
			</div>
		</div>
	</section>

	<?php // Loaded right after the calculator (not deferred) so results render before the rest of the page lays out: no layout shift. ?>
	<script src="<?= js_src('app.js') ?>"></script>
	<script src="<?= js_src('tools/' . $slug . '.js') ?>"></script>

	<?= ad_slot('ad_slot_after_calc') ?>

	<?php if ($shop): ?>
	<aside class="card-x shop mt-4" aria-label="Shop materials">
		<h2 class="h6 fw-bold d-flex align-items-center gap-2 mb-2"><?= icon('cart', 18) ?> Shopping list: compare prices</h2>
		<ul>
		<?php foreach ($shop as $s): ?>
			<li>
				<span><?= e($s['label']) ?></span>
				<span class="stores">
					<a class="btn-x" href="<?= e(aff_url('homedepot', $s['q'])) ?>" rel="sponsored nofollow noopener" target="_blank">Home Depot</a>
					<a class="btn-x" href="<?= e(aff_url('lowes', $s['q'])) ?>" rel="sponsored nofollow noopener" target="_blank">Lowe's</a>
				</span>
			</li>
		<?php endforeach; ?>
		</ul>
		<p class="calc-note mt-2 mb-0">We may earn a commission from these links at no cost to you. <a href="<?= site_url('disclaimer') ?>">Disclosure</a>.</p>
	</aside>
	<?php endif; ?>

	<div class="row">
		<div class="col-12">
			<article class="prose mt-4">
				<?php if ($howto): ?>
				<h2 id="how-to"><?= e($howto['name']) ?></h2>
				<ol class="steps">
					<?php foreach ($howto['steps'] as $s): ?>
					<li><strong><?= e($s[0]) ?>.</strong> <?= e($s[1]) ?></li>
					<?php endforeach; ?>
				</ol>
				<?php endif; ?>

				<?php $this->load->view('tools/' . $slug . '/content', array('tool' => $tool)); ?>

				<?php if ($sources): ?>
				<h3>Sources &amp; references</h3>
				<ul class="small">
					<?php foreach ($sources as $s): ?>
					<li><a href="<?= e($s[1]) ?>" rel="nofollow noopener" target="_blank"><?= e($s[0]) ?></a></li>
					<?php endforeach; ?>
				</ul>
				<?php endif; ?>
			</article>

			<?php if ($faqs): ?>
			<section class="faq" style="max-width:780px" aria-labelledby="faq-h">
				<h2 id="faq-h" class="section-h">Frequently asked questions</h2>
				<?php foreach ($faqs as $i => $f): ?>
				<details<?= $i === 0 ? ' open' : '' ?>>
					<summary><?= e($f[0]) ?></summary>
					<div class="ans"><?= $f[1] ?></div>
				</details>
				<?php endforeach; ?>
			</section>
			<?php endif; ?>

			<?= ad_slot('ad_slot_after_content') ?>

			<section class="card-x author-box mt-4" style="max-width:780px" aria-label="About this calculator">
				<div class="av"><?= icon('shield', 26) ?></div>
				<div>
					<h2 class="h6 fw-bold mb-1">How this calculator was built</h2>
					<p class="small text-body-secondary mb-2">Written by the <?= e(config_item('author_name')) ?> (<?= e(config_item('author_role')) ?>). Formulas follow standard U.S. estimating practice and manufacturer coverage data; prices come from national retail and contractor averages for <?= (int) config_item('price_year') ?>. First published <?= long_date($tool['published']) ?>, last reviewed <?= long_date($tool['updated']) ?>.</p>
					<p class="small mb-0"><a href="<?= site_url('editorial-policy') ?>">Editorial policy</a> · <a href="<?= site_url('contact') ?>">Report an error</a></p>
				</div>
			</section>

			<section class="mt-4 no-print" style="max-width:780px">
				<h2 class="h6 fw-bold">Share this calculator</h2>
				<div class="share-row">
					<button type="button" class="btn-x" data-share="copy"><?= icon('copy', 16) ?> Copy link</button>
					<a class="btn-x" href="#" data-share="whatsapp">WhatsApp</a>
					<a class="btn-x" href="#" data-share="facebook">Facebook</a>
					<a class="btn-x" href="#" data-share="x">X</a>
					<a class="btn-x" href="#" data-share="pinterest">Pinterest</a>
					<a class="btn-x" href="#" data-share="reddit">Reddit</a>
					<a class="btn-x" href="#" data-share="email">Email</a>
				</div>
			</section>
		</div>
	</div>

	<?php if ($related): ?>
	<section class="related" aria-labelledby="rel-h">
		<h2 id="rel-h" class="section-h">Related calculators</h2>
		<?php $this->load->view('partials/tool_list', array('tools' => $related)); ?>
	</section>
	<?php endif; ?>
</div>
