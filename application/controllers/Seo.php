<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/** sitemap.xml, robots.txt, ads.txt, feed.xml and the PWA manifest. */
class Seo extends MY_Controller {

	private static $static_pages = array('calculators', 'about', 'editorial-policy', 'contact', 'privacy-policy', 'terms-of-use', 'disclaimer');

	public function sitemap()
	{
		$last = Tool_registry::last_modified();
		$xml  = '<?xml version="1.0" encoding="UTF-8"?>' . "\n"
			. '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

		$xml .= $this->url(base_url(), $last);
		foreach (Tool_registry::live() as $t)
		{
			$xml .= $this->url($t['url'], max($t['published'], $t['updated']));
		}
		// Category hubs that are indexable (two or more live tools)
		$count = array();
		foreach (Tool_registry::live() as $t)
		{
			$count[$t['category']] = isset($count[$t['category']]) ? $count[$t['category']] + 1 : 1;
		}
		foreach (Tool_registry::$categories as $key => $cat)
		{
			if ( ! empty($count[$key]) && $count[$key] >= 2)
			{
				$xml .= $this->url(site_url($cat['slug']), $last);
			}
		}
		foreach (self::$static_pages as $p)
		{
			$xml .= $this->url(site_url($p), $p === 'calculators' ? $last : NULL);
		}

		$this->send('application/xml', $xml . '</urlset>');
	}

	public function robots()
	{
		$txt = ENVIRONMENT === 'production'
			? "User-agent: *\nAllow: /\nDisallow: /application/\nDisallow: /system/\n\nSitemap: " . site_url('sitemap.xml') . "\n"
			: "User-agent: *\nDisallow: /\n";

		$this->send('text/plain', $txt);
	}

	public function ads()
	{
		// IAB ads.txt: one "domain, publisher id, relationship, cert authority id" per line
		$client = (string) config_item('adsense_client');
		$lines  = array();
		if ($client !== '')
		{
			$lines[] = 'google.com, ' . preg_replace('/^ca-/', '', $client) . ', DIRECT, f08c47fec0942fa0';
		}
		foreach ((array) config_item('ads_txt_extra') as $extra)
		{
			$lines[] = $extra;
		}
		$txt = $lines ? implode("\n", $lines) . "\n" : "# No ad networks configured yet: set ADSENSE_CLIENT in .env\n";

		$this->send('text/plain', $txt);
	}

	public function feed()
	{
		$name = e(config_item('site_name'));
		$xml  = '<?xml version="1.0" encoding="UTF-8"?>' . "\n"
			. '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom"><channel>'
			. '<title>' . $name . ' – New Calculators</title>'
			. '<link>' . base_url() . '</link>'
			. '<atom:link href="' . site_url('feed.xml') . '" rel="self" type="application/rss+xml"/>'
			. '<description>' . e(config_item('site_tagline')) . '</description>'
			. '<language>en-us</language>'
			. '<lastBuildDate>' . date(DATE_RSS, strtotime(Tool_registry::last_modified())) . '</lastBuildDate>';

		foreach (Tool_registry::live() as $t)
		{
			$xml .= '<item><title>' . e($t['name']) . '</title><link>' . $t['url'] . '</link><guid>' . $t['url'] . '</guid>'
				. '<pubDate>' . date(DATE_RSS, strtotime($t['published'] . ' 08:00')) . '</pubDate>'
				. '<description>' . e($t['desc']) . '</description></item>';
		}

		$this->send('application/rss+xml', $xml . '</channel></rss>');
	}

	public function manifest()
	{
		$json = json_encode(array(
			'name'             => config_item('site_name') . ' – Contractor Calculators',
			'short_name'       => config_item('site_name'),
			'start_url'        => base_url() . '?source=pwa',
			'scope'            => base_url(),
			'display'          => 'standalone',
			'background_color' => '#ffffff',
			'theme_color'      => config_item('theme_color'),
			'icons'            => array(
				array('src' => base_url('assets/img/icon-192.png'), 'sizes' => '192x192', 'type' => 'image/png'),
				array('src' => base_url('assets/img/icon-512.png'), 'sizes' => '512x512', 'type' => 'image/png', 'purpose' => 'any maskable'),
				array('src' => base_url('assets/img/icon.svg'), 'sizes' => 'any', 'type' => 'image/svg+xml'),
			),
		), JSON_UNESCAPED_SLASHES);

		$this->send('application/manifest+json', $json);
	}

	private function url($loc, $lastmod)
	{
		return '  <url><loc>' . e($loc) . '</loc>' . ($lastmod ? '<lastmod>' . $lastmod . '</lastmod>' : '') . "</url>\n";
	}

	private function send($type, $body)
	{
		if (ENVIRONMENT === 'production')
		{
			$this->output->cache((int) config_item('page_cache_minutes'));
		}
		$this->output->set_content_type($type, 'utf-8')->set_output($body);
	}
}
