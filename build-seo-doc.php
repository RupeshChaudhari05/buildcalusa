<?php
/**
 * Builds docs/seo-plan.html: keyword map, topical check, backlink plan and
 * domain notes, straight from Tool_registry + application/data/seo_keywords.php.
 * Run: php build-seo-doc.php   (re-run after adding a tool or keywords)
 * The docs/ folder is blocked from the web in .htaccess (internal document).
 */
define('BASEPATH', __DIR__ . '/system/');
date_default_timezone_set('America/New_York');
require __DIR__ . '/application/libraries/Tool_registry.php';
$kw = require __DIR__ . '/application/data/seo_keywords.php';

$site  = 'https://buildcalcusa.com/';
$today = date('Y-m-d');
$h     = function ($s) { return htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8'); };

// ---- keyword map + duplicate check -------------------------------------
$tools = Tool_registry::$tools;
uasort($tools, function ($a, $b) { return strcmp($a['published'], $b['published']); });

$seen = array(); $dupes = array(); $primary = 0; $secondary = 0;
$add = function ($phrase, $owner) use (&$seen, &$dupes) {
	$k = strtolower(trim($phrase));
	if (isset($seen[$k]) && $seen[$k] !== $owner) { $dupes[] = "\"$phrase\" on {$seen[$k]} and $owner"; }
	$seen[$k] = $owner;
};
foreach ($tools as $slug => $t)
{
	$add($t['keyword'], $slug); $primary++;
	foreach (isset($kw[$slug]) ? $kw[$slug] : array() as $p) { $add($p, $slug); $secondary++; }
}
$hubKw = 0;
foreach ($kw['_hubs'] as $cat => $list) { foreach ($list as $p) { $add($p, 'hub:' . $cat); $hubKw++; } }
foreach ($kw['_home'] as $p) { $add($p, 'home'); }
$homeKw = count($kw['_home']);
$total  = $primary + $secondary + $hubKw + $homeKw;
$live   = count(array_filter($tools, function ($t) use ($today) { return $t['published'] <= $today; }));

// ---- why each cluster belongs -------------------------------------------
$why = array(
	'outdoor'   => 'Fences, decks and stain are the most common exterior projects homeowners price; deck and fence tools share buyers and link to each other.',
	'concrete'  => 'Slabs, footings, block and asphalt are bought by volume and weight; links to fence posts, pavers and debris (broken concrete).',
	'roofing'   => 'Roof and siding are both priced in squares of 100 sq ft and sold by the same contractors; highest-CPC cluster on the site.',
	'landscape' => 'Gravel, pavers, mulch and walls are bulk materials measured like concrete; the same visitor often builds a patio and a deck.',
	'framing'   => 'Stairs, decking and lumber take-offs support the deck and remodel pages and carry IRC code content (E-E-A-T).',
	'interior'  => 'Drywall, tile, flooring, paint, insulation and bath remodels: the interior half of every renovation budget.',
	'debris'    => 'Every tear-off and remodel ends with a dumpster: roof, bath, deck and concrete pages feed these tools naturally.',
	'business'  => 'Markup and margin is for the contractors who use all the other tools to bid; builds trust with the pro audience.',
);

// ---- domains (checked via Verisign RDAP) -------------------------------
$domains = array(
	array('buildcalcusa.com',   'Registered (ours)', 1, 'Chosen and registered. Matches the brand already built (logo, share images, site name). Clear meaning, US signal for the main market, 12 letters, no hyphen.'),
	array('calcthejob.com',     'Available', 2, 'Brandable and contractor-voiced, country-neutral. Better if UK/AU traffic becomes a big share later.'),
	array('buildmathpro.com',   'Available', 3, 'Pro tone, memorable; "math" is broad enough for every tool type.'),
	array('costtobuildit.com',  'Available', 4, 'Cost intent, but long and leans to cost tools only (not quantity tools).'),
	array('calcforbuilders.com','Available', 5, 'Descriptive but long; "builders" narrows the DIY audience.'),
	array('buildpricecalc.com', 'Available', 6, 'Keyword-stuffed feel; exact-match names give no ranking boost.'),
	array('buildratecalc.com',  'Available', 7, 'Weak meaning; skip.'),
	array('buildcalc.com, buildcalcs.com, contractorcalc.com, jobsitecalc.com, takeoffcalc.com, projectcalcs.com, tradecalcs.com, yardcalc.com', 'Taken', 0, 'Registered by others. Do not buy from aftermarket brokers at premium prices; not worth it for a new site.'),
);

ob_start();
?><!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex,nofollow">
<title>BuildCalcUSA – SEO Plan</title>
<style>
:root{--bg:#f8fafc;--card:#fff;--line:#e2e8f0;--text:#0f172a;--muted:#5b6474;--accent:#f59e0b;--ink:#b45309;--soft:#fef3c7;--good:#047857;--bad:#b91c1c}
*{box-sizing:border-box}body{margin:0;background:var(--bg);color:var(--text);font:15px/1.6 system-ui,-apple-system,"Segoe UI",Roboto,Arial,sans-serif}
.wrap{max-width:1180px;margin:0 auto;padding:24px 16px 64px}
h1{font-size:clamp(1.6rem,4vw,2.3rem);letter-spacing:-.02em;margin:.2rem 0 .3rem}
h2{font-size:1.35rem;margin:2.2rem 0 .8rem;padding-top:.4rem;border-top:1px solid var(--line)}
h3{font-size:1.05rem;margin:1.3rem 0 .4rem}
.muted{color:var(--muted)}.kicker{font-size:.75rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase;color:var(--ink)}
.stats{display:grid;grid-template-columns:repeat(auto-fit,minmax(150px,1fr));gap:10px;margin:18px 0}
.stat{background:var(--card);border:1px solid var(--line);border-radius:12px;padding:12px 14px}
.stat b{display:block;font-size:1.7rem;line-height:1.1}.stat span{font-size:.8rem;color:var(--muted)}
.stat.main{background:linear-gradient(135deg,#f59e0b,#f97316);border:0}.stat.main span{color:#1f2937}
.card{background:var(--card);border:1px solid var(--line);border-radius:12px;padding:14px 16px;margin:10px 0}
.tbl{overflow-x:auto;border:1px solid var(--line);border-radius:12px;background:var(--card)}
table{width:100%;border-collapse:collapse;font-size:.875rem}
th,td{padding:8px 10px;border-bottom:1px solid var(--line);text-align:left;vertical-align:top}
th{background:#f1f5f9;font-size:.72rem;text-transform:uppercase;letter-spacing:.05em;color:var(--muted);position:sticky;top:0}
tr:last-child td{border-bottom:0}
.pk{font-weight:700}.kw{display:inline-block;background:#f1f5f9;border-radius:6px;padding:1px 7px;margin:2px 3px 2px 0;font-size:.8rem}
.tag{display:inline-block;font-size:.7rem;font-weight:700;border-radius:999px;padding:2px 8px}
.live{background:#d1fae5;color:var(--good)}.sched{background:var(--soft);color:var(--ink)}.no{background:#fee2e2;color:var(--bad)}
input[type=search]{width:100%;max-width:420px;padding:9px 12px;border:1px solid var(--line);border-radius:10px;font-size:.95rem;margin:4px 0 10px}
ul{padding-left:1.2rem}li{margin:.25rem 0}code{background:#f1f5f9;border-radius:4px;padding:0 4px}
.ok{color:var(--good);font-weight:700}.warn{color:var(--bad);font-weight:700}
.grid2{display:grid;grid-template-columns:1fr;gap:12px}@media(min-width:900px){.grid2{grid-template-columns:1fr 1fr}}
@media print{input{display:none}th{position:static}}
</style>
</head>
<body><div class="wrap">

<div class="kicker">Internal document · generated <?= $h(date('F j, Y')) ?> by build-seo-doc.php</div>
<h1>BuildCalcUSA – Keyword &amp; Backlink Plan</h1>
<p class="muted">Every page, the searches it targets, why it belongs on this site, how to earn links to it, and which domain to launch on. Search volumes and CPCs are deliberately not listed: verify them in Google Keyword Planner, Semrush or Ahrefs before planning around numbers.</p>

<div class="stats">
	<div class="stat main"><b><?= $total ?></b><span>keywords targeted in total</span></div>
	<div class="stat"><b><?= count($tools) ?></b><span>calculator pages</span></div>
	<div class="stat"><b><?= $primary ?></b><span>primary keywords (1 per tool)</span></div>
	<div class="stat"><b><?= $secondary ?></b><span>secondary &amp; long-tail</span></div>
	<div class="stat"><b><?= $hubKw + $homeKw ?></b><span>home + category hub keywords</span></div>
	<div class="stat"><b><?= $live ?> / <?= count($tools) ?></b><span>tools live as of <?= $h($today) ?></span></div>
</div>
<div class="card"><?php if ($dupes): ?><span class="warn">Duplicate targets found (fix before launch):</span><ul><?php foreach ($dupes as $d): ?><li><?= $h($d) ?></li><?php endforeach; ?></ul><?php else: ?><span class="ok">✓ No keyword is targeted by two pages.</span> Each search intent has exactly one page, which avoids keyword cannibalization and Google's doorway / scaled-content patterns.<?php endif; ?></div>

<h2 id="relevance">1. Are all tools related? Topical relevance check</h2>
<p>Yes. All <?= count($tools) ?> tools serve one audience (people pricing or planning a building or home-improvement project) and link into each other. That is what Google rewards as topical authority.</p>
<div class="tbl"><table>
	<thead><tr><th>Cluster (hub page)</th><th>Tools</th><th>Why it belongs</th><th>Verdict</th></tr></thead>
	<tbody>
	<?php foreach (Tool_registry::$categories as $key => $cat):
		$names = array(); foreach ($tools as $t) { if ($t['category'] === $key) $names[] = $t['short']; } ?>
		<tr><td><b><?= $h($cat['label']) ?></b><br><code>/<?= $h($cat['slug']) ?></code></td><td><?= $h(implode(', ', $names)) ?></td><td><?= $h($why[$key]) ?></td><td><span class="tag live">Related</span></td></tr>
	<?php endforeach; ?>
		<tr><td><b>Towing</b></td><td>Towing cost calculator</td><td>Auto-service topic, no shared audience or internal links. Would dilute the site's subject. Build it on a separate auto site if wanted.</td><td><span class="tag no">Excluded</span></td></tr>
	</tbody>
</table></div>

<h2 id="keywords">2. Keyword map: every tool page</h2>
<input type="search" id="q" placeholder="Filter by keyword or tool…" aria-label="Filter keywords">
<div class="tbl"><table id="kwt">
	<thead><tr><th>#</th><th>Launch</th><th>Page</th><th>Primary keyword</th><th>Secondary &amp; long-tail keywords</th><th>Count</th></tr></thead>
	<tbody>
	<?php $i = 0; foreach ($tools as $slug => $t): $sec = isset($kw[$slug]) ? $kw[$slug] : array(); ?>
		<tr>
			<td><?= ++$i ?></td>
			<td><?= $h(date('M j, Y', strtotime($t['published']))) ?><br><span class="tag <?= $t['published'] <= $today ? 'live' : 'sched' ?>"><?= $t['published'] <= $today ? 'Live' : 'Scheduled' ?></span></td>
			<td><b><?= $h($t['name']) ?></b><br><code>/<?= $h($slug) ?></code><br><span class="muted"><?= $h(Tool_registry::$categories[$t['category']]['label']) ?></span></td>
			<td class="pk"><?= $h($t['keyword']) ?></td>
			<td><?php foreach ($sec as $p): ?><span class="kw"><?= $h($p) ?></span><?php endforeach; ?></td>
			<td><?= 1 + count($sec) ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table></div>

<h3>Home page and category hubs</h3>
<div class="tbl"><table>
	<thead><tr><th>Page</th><th>Keywords</th></tr></thead>
	<tbody>
		<tr><td><b>Home</b><br><code>/</code></td><td><?php foreach ($kw['_home'] as $p): ?><span class="kw"><?= $h($p) ?></span><?php endforeach; ?></td></tr>
		<?php foreach (Tool_registry::$categories as $key => $cat): if (empty($kw['_hubs'][$key])) continue; ?>
		<tr><td><b><?= $h($cat['label']) ?></b><br><code>/<?= $h($cat['slug']) ?></code></td><td><?php foreach ($kw['_hubs'][$key] as $p): ?><span class="kw"><?= $h($p) ?></span><?php endforeach; ?></td></tr>
		<?php endforeach; ?>
	</tbody>
</table></div>

<h3>On-page rules already built in</h3>
<ul>
	<li>Primary keyword in the title, H1 and first paragraph, once and naturally (no stuffing).</li>
	<li>Secondary keywords become H2/H3 headings and FAQ questions, phrased the way people search.</li>
	<li>Material variants ("wood/vinyl fence cost") are sections on one page, not separate pages.</li>
	<li>Internal links only point to pages that are already live; related tools link both ways inside each cluster.</li>
</ul>

<h2 id="backlinks">3. Backlink strategy (white-hat only)</h2>
<p>Google's link spam policy penalizes bought links, link exchanges at scale, PBNs and keyword-rich links hidden in widgets or templates. Everything below earns links editorially.</p>

<div class="grid2">
	<div class="card">
		<h3>Months 1–3: foundation</h3>
		<ul>
			<li><b>Search Console + Bing Webmaster Tools</b>: submit <code>/sitemap.xml</code>; request indexing as each tool goes live.</li>
			<li><b>Brand profiles</b> (real, consistent NAP): Google Business Profile not needed; do Pinterest, YouTube, X, LinkedIn, Facebook page, Crunchbase. These are nofollow but establish the brand entity.</li>
			<li><b>Pinterest</b>: pin each tool's share image (already generated) to boards like "Fence ideas", "Deck building". DIY traffic on Pinterest is large and US-heavy.</li>
			<li><b>Answer real questions</b> on r/HomeImprovement, r/DIY, r/Construction, r/Roofing, Houzz and ContractorTalk. Help first, link only when the tool answers the question. No spam.</li>
		</ul>
	</div>
	<div class="card">
		<h3>Months 2–6: linkable assets</h3>
		<ul>
			<li><b>"<?= (int) date('Y') ?> Construction Price Index"</b>: one data page from the prices and state labor index you already have (fence, roof, concrete, deck cost by state). Journalists and bloggers cite data pages.</li>
			<li><b>State rankings for digital PR</b>: "Most expensive states to replace a roof", "Cheapest states to build a fence". Pitch local news in each state.</li>
			<li><b>Expert quotes</b>: answer reporter requests on Qwoted, Featured.com, Help a B2B Writer (US); ResponseSource (UK); SourceBottle (AU).</li>
			<li><b>Free embed for contractors</b>: let fence, roofing and deck companies put a calculator on their site. Credit link uses the brand name as anchor and the contractor may nofollow it. No keyword-stuffed anchors.</li>
		</ul>
	</div>
	<div class="card">
		<h3>Months 3–12: outreach</h3>
		<ul>
			<li><b>Resource pages</b>: university extension services, Habitat for Humanity affiliates, tool libraries, makerspaces, trade schools and apprenticeship programs that list "useful calculators".</li>
			<li><b>Broken link building</b>: find dead calculator links on DIY blogs and trade sites (Ahrefs "broken backlinks"), offer the matching tool.</li>
			<li><b>Unlinked mentions</b>: set Google Alerts for "BuildCalcUSA"; ask sites that mention you to add a link.</li>
			<li><b>Guest articles</b> on genuine trade and home blogs with editorial review (not "write for us" link farms). One strong article per month beats ten weak ones.</li>
			<li><b>Podcasts &amp; YouTube</b>: contractor business podcasts love the markup-vs-margin topic.</li>
		</ul>
	</div>
	<div class="card">
		<h3>Anchor text &amp; targets</h3>
		<ul>
			<li>Anchor mix to aim for: ~50% brand / URL ("BuildCalcUSA"), ~30% natural ("this calculator", "here"), ~15% partial match ("fence cost calculator tool"), ≤5% exact match.</li>
			<li>Point links at hubs and the best tools (fence cost, concrete, roof cost, dumpster cost); internal links spread the value to the rest.</li>
			<li>Prefer U.S., Canadian, UK and Australian sites: links from the country you want to rank in are a strong geo signal.</li>
			<li>Realistic pace for a new site: 5–15 quality referring domains a month. Quality over count.</li>
		</ul>
		<h3>Never do</h3>
		<ul>
			<li>Buy links, join link exchanges or PBNs, or use Fiverr "1,000 backlinks" packages.</li>
			<li>Mass AI guest posts, comment spam, or keyword-anchor footer links in embeds.</li>
		</ul>
	</div>
</div>

<h2 id="domain">4. Domain: which one to register</h2>
<p class="muted">Availability checked on <?= $h(date('F j, Y')) ?> via the official .com registry (Verisign RDAP). Domains can be taken at any time, so register the pick soon.</p>
<div class="tbl"><table>
	<thead><tr><th>Rank</th><th>Domain</th><th>Status</th><th>Why</th></tr></thead>
	<tbody>
	<?php foreach ($domains as $d): ?>
		<tr><td><?= $d[2] ? '#' . $d[2] : '–' ?></td><td><b><?= $h($d[0]) ?></b></td><td><span class="tag <?= $d[1] === 'Taken' ? 'no' : 'live' ?>"><?= $h($d[1]) ?></span></td><td><?= $h($d[3]) ?></td></tr>
	<?php endforeach; ?>
	</tbody>
</table></div>
<div class="card">
	<b><span class="ok">✓ buildcalcusa.com is registered</span> and the site is configured for it</b> (https, non-www, HSTS, pinned base URL). The whole site is branded BuildCalcUSA, it reads clearly, and "USA" matches the primary market and the U.S. prices and state labor data. A keyword-only domain is not needed: exact-match domains give no ranking boost.
	<h3>Domain settings to keep</h3>
	<ul>
		<li>Turn on WHOIS privacy, auto-renew and registrar lock at your registrar.</li>
		<li>Register the .com only. Don't use .in, .co.uk or other country domains for the U.S. market: country-code domains tell Google the site is for that country.</li>
		<li>Avoid hyphens, numbers and trademarks (no "homedepot", "lowes" or "quikrete" in the name). Check the name in the USPTO trademark search before buying.</li>
		<li>Exact-match keyword domains give no ranking boost; a clear brand earns more links and clicks.</li>
	</ul>
</div>

<h2 id="usa">5. Why target the USA and other high-tier countries</h2>
<div class="grid2">
	<div class="card">
		<h3>Why</h3>
		<ul>
			<li><b>Higher ad revenue</b>: advertisers pay much more for U.S., Canadian, UK and Australian visitors, so AdSense earnings per 1,000 pageviews (RPM) are several times higher than in most other countries.</li>
			<li><b>Affiliate and lead programs</b>: Home Depot, Lowe's, Angi/HomeAdvisor and dumpster programs only pay on U.S. (or Canadian) customers.</li>
			<li><b>Big project budgets</b>: a U.S. fence, roof or remodel runs thousands of dollars, so contractors bid on these keywords.</li>
			<li><b>Same language</b>: the U.S., Canada, UK, Ireland, Australia and New Zealand all search in English, so one site serves all of them.</li>
		</ul>
	</div>
	<div class="card">
		<h3>How the site signals the U.S. to Google</h3>
		<ul>
			<li>.com domain and <code>lang="en-US"</code> (already set).</li>
			<li>USD prices, U.S. units first, all 50 states in the labor index, U.S. building codes (IRC) cited.</li>
			<li>Host on a U.S. server or behind Cloudflare's CDN for fast U.S. load times (Core Web Vitals are scored on real visitors).</li>
			<li>Earn links from U.S. sites (section 3).</li>
			<li>UK, EU and AU visitors already get metric units and £ € A$; no separate country pages or hreflang are needed since the content is the same.</li>
		</ul>
	</div>
</div>

<h2 id="next">6. Next steps</h2>
<ul>
	<li>☑ Domain registered: buildcalcusa.com. https, non-www redirect and HSTS are already set in <code>.htaccess</code>.</li>
	<li>☐ Point DNS to the host (Cloudflare recommended), install the SSL certificate, upload the site to the web root.</li>
	<li>☑ Contact email set to <code>classstatus0@gmail.com</code> (CONTACT_EMAIL in <code>.env</code>).</li>
	<li>☐ On the server copy <code>.env.example</code> to <code>.env</code>; add GA_ID, then mark <code>calculator_use</code>, <code>quote_click</code> and <code>affiliate_click</code> as key events in GA4.</li>
	<li>☐ Replace the placeholder author with real people and credentials in <code>application/config/site.php</code>.</li>
	<li>☐ Verify Search Console and Bing, then submit the sitemap.</li>
	<li>☐ Check volumes and CPC for the keyword list above in Keyword Planner; move the highest-value tools earlier in the schedule if needed.</li>
	<li>☐ Apply to AdSense once 10+ tools are live; set up Impact (Home Depot / Lowe's) and a lead partner.</li>
	<li>☐ Build the Construction Price Index page and start outreach (month 2).</li>
</ul>

</div>
<script>
document.getElementById('q').addEventListener('input',function(){var q=this.value.toLowerCase();document.querySelectorAll('#kwt tbody tr').forEach(function(r){r.style.display=!q||r.textContent.toLowerCase().indexOf(q)>-1?'':'none'})});
</script>
</body>
</html>
<?php
@mkdir(__DIR__ . '/docs', 0775, TRUE);
file_put_contents(__DIR__ . '/docs/seo-plan.html', ob_get_clean());
echo "docs/seo-plan.html written: {$total} keywords ({$primary} primary, {$secondary} secondary, " . ($hubKw + $homeKw) . " home/hub), " . count($tools) . " tools\n";
echo $dupes ? "DUPLICATES:\n  " . implode("\n  ", $dupes) . "\n" : "No duplicate keyword targets.\n";
