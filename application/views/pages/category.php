<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<header class="page-head">
		<h1><?= e($cat['label']) ?> calculators</h1>
		<p class="lead-sm mb-0"><?= e($cat['intro']) ?></p>
	</header>
	<?php $this->load->view('partials/tool_list', array('tools' => $tools)); ?>

	<h2 class="section-h">Other trades</h2>
	<p class="small">
	<?php
	$links = array();
	foreach (Tool_registry::$categories as $key => $c)
	{
		if ($c['slug'] === $cat['slug']) continue;
		foreach (Tool_registry::live() as $t)
		{
			if ($t['category'] === $key) { $links[] = '<a href="' . site_url($c['slug']) . '">' . e($c['label']) . '</a>'; break; }
		}
	}
	echo implode(' · ', $links);
	?>
	</p>
	<?= ad_slot('ad_slot_after_content') ?>
</div>
