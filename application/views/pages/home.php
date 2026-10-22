<?php defined('BASEPATH') OR exit('No direct script access allowed');
$y = (int) config_item('price_year');
$by_cat = array();
foreach ($live as $t) { $by_cat[$t['category']][] = $t; }
$newest = $live ? key($live) : NULL;
?>
<div class="container">
	<section class="home-hero">
		<span class="pill mb-3"><?= icon('bolt', 14) ?> <?= count($live) ?> free calculators · updated <?= long_date(Tool_registry::last_modified()) ?></span>
		<h1>Construction calculators with <span>real <?= $y ?> costs</span></h1>
		<p>Quantities and costs for concrete, roofing, fencing, decks, drywall, tile and more. Labor is adjusted for your state, and you can swap in your supplier's prices. No sign-up, no email.</p>
		<form class="filter" role="search" onsubmit="return false">
			<label class="visually-hidden" for="tool-filter">Find a calculator</label>
			<input class="form-control" id="tool-filter" type="search" placeholder="Find a calculator: concrete, fence, tile…" data-filter autocomplete="off">
		</form>
	</section>

	<?php if ($live): ?>
		<?php foreach (Tool_registry::$categories as $key => $cat): if (empty($by_cat[$key])) continue; ?>
		<section class="filter-group" aria-labelledby="h-<?= $key ?>">
			<h2 id="h-<?= $key ?>" class="section-h"><a href="<?= site_url($cat['slug']) ?>"><?= e($cat['label']) ?></a></h2>
			<?php $this->load->view('partials/tool_list', array('tools' => $by_cat[$key], 'new' => count($live) > 1 ? $newest : NULL)); ?>
		</section>
		<?php endforeach; ?>
		<p class="filter-empty text-body-secondary mt-3" hidden>No calculator matches that yet. <a href="<?= site_url('contact') ?>">Tell us what you need</a>.</p>
	<?php else: ?>
		<p class="text-body-secondary text-center">The first calculators go live shortly.</p>
	<?php endif; ?>

	<?php if ($upcoming): ?>
	<section aria-labelledby="soon-h">
		<h2 id="soon-h" class="section-h">Coming soon</h2>
		<div class="row g-3">
			<?php foreach (array_slice($upcoming, 0, 3) as $t): ?>
			<div class="col-12 col-md-4">
				<div class="card-x tool-card soon">
					<span class="ic"><?= icon($t['icon'], 22) ?></span>
					<span><span class="t"><?= e($t['name']) ?></span><span class="d">Launching <?= date('M j', strtotime($t['published'])) ?></span></span>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</section>
	<?php endif; ?>

	<?= ad_slot('ad_slot_after_calc') ?>

	<section aria-labelledby="why-h">
		<h2 id="why-h" class="section-h">Why contractors use <?= e(config_item('site_name')) ?></h2>
		<div class="row g-3">
			<div class="col-12 col-md-6 col-lg-3"><div class="card-x feature h-100"><div class="ic"><?= icon('bolt', 20) ?></div><h3>Results as you type</h3><p>No reload and no waiting. Pages load in about a second, even on a weak jobsite signal.</p></div></div>
			<div class="col-12 col-md-6 col-lg-3"><div class="card-x feature h-100"><div class="ic"><?= icon('shield', 20) ?></div><h3>No email, no sign-up</h3><p>Your numbers stay in your browser. We never ask for contact details to show a result.</p></div></div>
			<div class="col-12 col-md-6 col-lg-3"><div class="card-x feature h-100"><div class="ic"><?= icon('globe', 20) ?></div><h3>Labor priced by state</h3><p>All 50 states, plus Canada, the UK, Europe and Australia, with feet or metres.</p></div></div>
			<div class="col-12 col-md-6 col-lg-3"><div class="card-x feature h-100"><div class="ic"><?= icon('share', 20) ?></div><h3>Share the exact estimate</h3><p>Each result has its own link. Send it to a client or crew, or save it as a PDF.</p></div></div>
		</div>
	</section>

	<section class="prose mt-4" style="max-width:820px">
		<h2>How the numbers are worked out</h2>
		<p>Each calculator uses the take-off method an estimator would use by hand. Concrete is figured in cubic yards from length × width × depth. Roofing area is the footprint times a pitch factor, sold in squares of 100 sq ft. Drywall area is the wall area minus doors and windows. The formula is printed on every page.</p>
		<p>Material prices are national averages for <?= $y ?>, and labor is scaled by state. If you have a quote, type it over the default price and the total follows. Read more in our <a href="<?= site_url('editorial-policy') ?>">editorial policy</a>.</p>
	</section>
</div>
