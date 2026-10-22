<?php defined('BASEPATH') OR exit('No direct script access allowed'); $n = e(config_item('site_name')); $mail = e(config_item('site_email')); ?>
<div class="container">
	<header class="page-head"><h1>Privacy policy</h1>
		<p class="lead-sm mb-0">Effective <?= long_date('2026-10-24') ?>.</p></header>
	<div class="prose">
		<h2>Summary</h2>
		<p><?= $n ?> does not require an account or email address. Numbers you enter into calculators are processed in your browser and are not sent to our servers. If you share a result link, your inputs are included in that link's URL.</p>

		<h2>Information collected automatically</h2>
		<p>Like most websites, our hosting provider logs standard request data (IP address, browser type, pages visited, time) for security and performance. We may use Google Analytics to understand aggregate usage.</p>

		<h2>Stored on your device</h2>
		<p>We use your browser's local storage to remember your theme (light/dark), units (imperial/metric) and currency. These preferences never leave your device.</p>

		<h2>Advertising and cookies</h2>
		<p>We use Google AdSense to show ads. Third-party vendors, including Google, use cookies to serve ads based on your prior visits to this and other websites. Google's use of advertising cookies enables it and its partners to serve ads to you based on your visits to this site and/or other sites on the internet.</p>
		<p>You can opt out of personalized advertising by visiting <a href="https://www.google.com/settings/ads" rel="nofollow noopener" target="_blank">Google Ads Settings</a>, or opt out of some third-party vendors' cookies at <a href="https://www.aboutads.info/choices/" rel="nofollow noopener" target="_blank">aboutads.info</a>. Learn more in <a href="https://policies.google.com/technologies/partner-sites" rel="nofollow noopener" target="_blank">How Google uses information from sites that use its services</a>.</p>
		<p>Visitors in the European Economic Area, the UK and Switzerland are shown a consent message, provided through a Google-certified consent management platform, before any personalized ads or analytics cookies are used.</p>

		<h2>Affiliate links</h2>
		<p>When you click a retailer link (for example, The Home Depot or Lowe's), that retailer or its affiliate network may set cookies to attribute a purchase. Their own privacy policies apply.</p>

		<h2>Contractor quote requests</h2>
		<p>Some calculators show an optional "Get free local quotes" link. It opens a partner's website, where you can choose to send your project details to local contractors. We don't receive or store what you enter there. The partner's privacy policy and consent terms apply, including any consent to be contacted by phone or text.</p>

		<h2>Your rights (GDPR / UK GDPR / CCPA)</h2>
		<p>Depending on where you live, you may have the right to access, correct or delete personal data, to object to processing, and to opt out of the "sale" or "sharing" of personal information for targeted advertising. Because we don't collect names or emails, most data is held by our ad and analytics providers; you can exercise those choices through the links above or by emailing <a href="mailto:<?= $mail ?>"><?= $mail ?></a>.</p>

		<h2>Children</h2>
		<p>This site is not directed at children under 13, and we do not knowingly collect their data.</p>

		<h2>Changes</h2>
		<p>We will post any updates to this policy on this page and revise the effective date.</p>
	</div>
</div>
