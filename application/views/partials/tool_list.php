<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row g-3 tool-grid">
	<?php foreach ($tools as $t): ?>
	<div class="col-12 col-sm-6 col-lg-4">
		<a class="card-x tool-card" href="<?= $t['url'] ?>">
			<span class="ic"><?= icon($t['icon'], 22) ?></span>
			<span><span class="t"><?= e($t['name']) ?><?php if ( ! empty($new) && $t['slug'] === $new): ?><span class="badge-new">New</span><?php endif; ?></span><span class="d"><?= e($t['blurb']) ?></span></span>
		</a>
	</div>
	<?php endforeach; ?>
</div>
