<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Production serves the built assets (npm run build): inlined CSS + minified JS.
$dist     = ENVIRONMENT === 'production' && is_file(FCPATH . 'assets/dist/site.css');
$home     = base_url();
$name     = config_item('site_name');
$live     = Tool_registry::live();
$by_cat   = array();
foreach ($live as $t)
{
	$by_cat[$t['category']][] = $t;
}

$org = array(
	'@context' => 'https://schema.org',
	'@graph'   => array(
		array(
			'@type' => 'Organization',
			'@id'   => $home . '#org',
			'name'  => $name,
			'url'   => $home,
			'logo'  => base_url('assets/img/icon.svg'),
			'email' => config_item('site_email'),
		),
		array(
			'@type'      => 'WebSite',
			'@id'        => $home . '#website',
			'name'       => $name,
			'url'        => $home,
			'inLanguage' => 'en-US',
			'publisher'  => array('@id' => $home . '#org'),
		),
	),
);
?><!doctype html>
<html lang="en-US" data-bs-theme="light">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script>try{if(localStorage.getItem('theme')==='dark')document.documentElement.setAttribute('data-bs-theme','dark')}catch(e){}</script>
<title><?= e($meta['title']) ?></title>
<meta name="description" content="<?= e($meta['desc']) ?>">
<meta name="robots" content="<?= e($meta['robots']) ?>">
<link rel="canonical" href="<?= e($meta['canonical']) ?>">
<?php if ($dist): ?>
<style><?= file_get_contents(FCPATH . 'assets/dist/site.css') ?></style>
<?php else: ?>
<link rel="stylesheet" href="<?= asset('css/bootstrap.min.css') ?>">
<link rel="stylesheet" href="<?= asset('css/app.css') ?>">
<?php endif; ?>
<?php if (config_item('adsense_client')): ?>
<link rel="preconnect" href="https://pagead2.googlesyndication.com" crossorigin>
<meta name="google-adsense-account" content="<?= e(config_item('adsense_client')) ?>">
<?php endif; ?>
<?php if (config_item('ga_id') || config_item('adsense_client')): ?>
<script>
window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments)}
<?php if (config_item('consent_mode')): ?>
gtag('consent','default',{ad_storage:'denied',ad_user_data:'denied',ad_personalization:'denied',analytics_storage:'denied',wait_for_update:500,region:['AT','BE','BG','HR','CY','CZ','DK','EE','FI','FR','DE','GR','HU','IE','IT','LV','LT','LU','MT','NL','PL','PT','RO','SK','SI','ES','SE','IS','LI','NO','GB','CH']});
gtag('consent','default',{ad_storage:'granted',ad_user_data:'granted',ad_personalization:'granted',analytics_storage:'granted'});
<?php endif; ?>
<?php if (config_item('ga_id')): ?>gtag('js',new Date());gtag('config','<?= e(config_item('ga_id')) ?>');<?php endif; ?>
</script>
<?php endif; ?>
<?php if (config_item('google_site_verification')): ?><meta name="google-site-verification" content="<?= e(config_item('google_site_verification')) ?>"><?php endif; ?>
<?php if (config_item('bing_site_verification')): ?><meta name="msvalidate.01" content="<?= e(config_item('bing_site_verification')) ?>"><?php endif; ?>
<link rel="icon" href="<?= base_url('favicon.ico') ?>" sizes="32x32">
<link rel="icon" href="<?= base_url('assets/img/icon.svg') ?>" type="image/svg+xml">
<link rel="apple-touch-icon" href="<?= base_url('assets/img/icon-180.png') ?>">
<link rel="manifest" href="<?= site_url('site.webmanifest') ?>">
<link rel="alternate" type="application/rss+xml" title="<?= e($name) ?> – New Calculators" href="<?= site_url('feed.xml') ?>">
<meta name="theme-color" content="#ffffff">
<meta property="og:site_name" content="<?= e($name) ?>">
<meta property="og:type" content="<?= e($meta['type']) ?>">
<meta property="og:title" content="<?= e($meta['title']) ?>">
<meta property="og:description" content="<?= e($meta['desc']) ?>">
<meta property="og:url" content="<?= e($meta['canonical']) ?>">
<?php $og = ! empty($meta['og_image']) ? $meta['og_image'] : 'assets/img/og-image.png'; ?>
<meta property="og:image" content="<?= base_url($og) ?>">
<meta property="og:image:alt" content="<?= e($meta['title']) ?>">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:locale" content="en_US">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= e($meta['title']) ?>">
<meta name="twitter:description" content="<?= e($meta['desc']) ?>">
<meta name="twitter:image" content="<?= base_url($og) ?>">
<?php if ( ! empty($meta['published'])): ?>
<meta property="article:published_time" content="<?= e($meta['published']) ?>">
<meta property="article:modified_time" content="<?= e($meta['updated']) ?>">
<?php endif; ?>
<?= json_ld($org) ?>
<?php foreach ($meta['schema'] as $s): ?>
<?= json_ld($s) ?>
<?php endforeach; ?>
</head>
<body data-ads="<?= e(config_item('adsense_client')) ?>" data-ga="<?= e(config_item('ga_id')) ?>" data-ga-load="<?= e(config_item('ga_load')) ?>">
<a class="visually-hidden-focusable skip" href="#main">Skip to content</a>

<header class="site-header">
	<div class="container d-flex align-items-center gap-2">
		<a class="brand" href="<?= $home ?>" aria-label="<?= e($name) ?> home">
			<span class="brand-mark"><?= icon('calc', 20) ?></span>
			<span>Build<b>Calc</b><span class="brand-usa">USA</span></span>
		</a>
		<nav id="nav" class="site-nav ms-auto" aria-label="Main">
			<a href="<?= site_url('calculators') ?>">All Calculators</a>
			<?php foreach (array_slice($live, 0, 4) as $t): ?>
			<a href="<?= $t['url'] ?>"><?= e($t['short']) ?></a>
			<?php endforeach; ?>
			<a href="<?= site_url('about') ?>">About</a>
		</nav>
		<button class="icon-btn" type="button" data-theme-toggle aria-label="Toggle dark mode">
			<span class="i-dark"><?= icon('moon', 20) ?></span><span class="i-light"><?= icon('sun', 20) ?></span>
		</button>
		<button class="icon-btn d-md-none" type="button" data-nav-toggle aria-controls="nav" aria-expanded="false" aria-label="Menu"><?= icon('menu', 22) ?></button>
	</div>
</header>

<?php if ($meta['crumbs']): ?>
<nav class="container crumbs" aria-label="Breadcrumb">
	<ol>
	<?php foreach ($meta['crumbs'] as $i => $c): ?>
		<?php if ($i === count($meta['crumbs']) - 1): ?>
		<li aria-current="page"><?= e($c[0]) ?></li>
		<?php else: ?>
		<li><a href="<?= e($c[1]) ?>"><?= e($c[0]) ?></a></li>
		<?php endif; ?>
	<?php endforeach; ?>
	</ol>
</nav>
<?php endif; ?>

<main id="main">
<?= $content ?>
</main>

<footer class="site-footer">
	<div class="container">
		<div class="row g-4">
			<div class="col-12 col-lg-4">
				<a class="brand mb-2" href="<?= $home ?>"><span class="brand-mark"><?= icon('calc', 20) ?></span><span>Build<b>Calc</b><span class="brand-usa">USA</span></span></a>
				<p class="small mb-2">Estimating calculators for builders, remodelers and homeowners. Prices are U.S. averages for <?= (int) config_item('price_year') ?>, and every tool also works in metric with £, € or A$.</p>
			</div>
			<?php foreach (Tool_registry::$categories as $key => $cat): if (empty($by_cat[$key])) continue; ?>
			<div class="col-6 col-md-4 col-lg-2">
				<h2 class="footer-h"><a href="<?= site_url($cat['slug']) ?>"><?= e($cat['label']) ?></a></h2>
				<ul class="footer-links">
				<?php foreach ($by_cat[$key] as $t): ?>
					<li><a href="<?= $t['url'] ?>"><?= e($t['name']) ?></a></li>
				<?php endforeach; ?>
				</ul>
			</div>
			<?php endforeach; ?>
			<div class="col-6 col-md-4 col-lg-2">
				<h2 class="footer-h">Company</h2>
				<ul class="footer-links">
					<li><a href="<?= site_url('about') ?>">About us</a></li>
					<li><a href="<?= site_url('editorial-policy') ?>">Editorial policy</a></li>
					<li><a href="<?= site_url('contact') ?>">Contact</a></li>
					<li><a href="<?= site_url('privacy-policy') ?>">Privacy policy</a></li>
					<li><a href="<?= site_url('terms-of-use') ?>">Terms of use</a></li>
					<li><a href="<?= site_url('disclaimer') ?>">Disclaimer</a></li>
				</ul>
			</div>
		</div>
		<p class="footer-legal">© <?= date('Y') ?> <?= e($name) ?>. Estimates are for planning only; always get written quotes from licensed local contractors. As an affiliate of retailers such as The Home Depot and Lowe's, we may earn from qualifying purchases. <a href="<?= site_url('disclaimer') ?>">Read our affiliate disclosure</a>.</p>
	</div>
</footer>

<div class="toast-msg" role="status" aria-live="polite" hidden></div>
<?php if (empty($meta['js'])): // tool pages load their scripts right after the calculator ?>
<script src="<?= js_src('app.js') ?>" defer></script>
<?php endif; ?>
</body>
</html>
