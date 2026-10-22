<?php defined('BASEPATH') OR exit('No direct script access allowed');
$by_cat = array();
foreach ($live as $t) { $by_cat[$t['category']][] = $t; }
?>
<div class="container">
	<header class="page-head">
		<h1>All calculators</h1>
		<p class="lead-sm mb-0"><?= count($live) ?> estimating tools, grouped by trade. Every one runs in your browser and none of them ask for an email.</p>
	</header>
	<?php foreach (Tool_registry::$categories as $key => $cat): if (empty($by_cat[$key])) continue; ?>
	<section id="<?= $key ?>" class="mb-4" aria-labelledby="h-<?= $key ?>">
		<h2 id="h-<?= $key ?>" class="section-h"><a href="<?= site_url($cat['slug']) ?>"><?= e($cat['label']) ?></a></h2>
		<?php $this->load->view('partials/tool_list', array('tools' => $by_cat[$key])); ?>
	</section>
	<?php endforeach; ?>
	<?= ad_slot('ad_slot_after_content') ?>
</div>
