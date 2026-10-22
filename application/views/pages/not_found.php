<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<header class="page-head" style="padding:2.5rem 0 1rem">
		<h1>Page not found</h1>
		<p class="lead-sm">That page doesn't exist, or it hasn't gone live yet. These calculators are available now:</p>
	</header>
	<?php $this->load->view('partials/tool_list', array('tools' => array_slice($live, 0, 8))); ?>
	<p class="mt-4"><a class="btn-x primary" href="<?= base_url() ?>">Back to the home page</a></p>
</div>
