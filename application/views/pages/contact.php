<?php defined('BASEPATH') OR exit('No direct script access allowed'); $mail = e(config_item('site_email')); ?>
<div class="container">
	<header class="page-head"><h1>Contact us</h1>
		<p class="lead-sm mb-0">We read every message and usually reply within two business days.</p></header>
	<div class="prose">
		<div class="card-x p-4 my-3" style="max-width:560px">
			<p class="mb-2 d-flex align-items-center gap-2"><?= icon('mail', 20) ?> <strong>Email:</strong> <a href="mailto:<?= $mail ?>"><?= $mail ?></a></p>
			<p class="small text-body-secondary mb-0">Please include the calculator URL (use its Share button so your inputs are included) and what result you expected.</p>
		</div>
		<h2>What to contact us about</h2>
		<ul>
			<li><strong>Corrections:</strong> a formula, price or code reference looks wrong.</li>
			<li><strong>New calculators:</strong> a tool you'd like us to build.</li>
			<li><strong>Partnerships:</strong> suppliers, manufacturers and trade associations.</li>
			<li><strong>Privacy requests:</strong> see our <a href="<?= site_url('privacy-policy') ?>">privacy policy</a>.</li>
		</ul>
		<p>We can't give project-specific engineering advice. For structural questions, consult a licensed local contractor or engineer.</p>
	</div>
</div>
