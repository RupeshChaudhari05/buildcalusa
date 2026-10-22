<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MY_Controller {

	public function home()
	{
		$home = base_url();
		$live = Tool_registry::live();

		$list = array();
		$i    = 0;
		foreach ($live as $t)
		{
			$list[] = array('@type' => 'ListItem', 'position' => ++$i, 'url' => $t['url'], 'name' => $t['name']);
		}

		$this->render('pages/home', array(
			'live'     => $live,
			'upcoming' => Tool_registry::upcoming(),
		), array(
			'title'  => 'Free Contractor Calculators [' . config_item('price_year') . '] – Fence, Concrete, Roofing & More | ' . config_item('site_name'),
			'desc'   => 'Free construction cost calculators for contractors & DIYers: fence, deck, concrete, asphalt, roofing, drywall & tile. Instant USD estimates, no email.',
			'canonical' => $home,
			'schema' => array(
				array('@context' => 'https://schema.org', '@type' => 'ItemList', 'name' => 'Construction calculators', 'itemListElement' => $list),
			),
		));
	}

	public function calculators()
	{
		$this->render('pages/calculators', array('live' => Tool_registry::live()), array(
			'title'  => 'All Construction Calculators (' . config_item('price_year') . ') – Free & Instant | ' . config_item('site_name'),
			'desc'   => 'Every free contractor calculator on ' . config_item('site_name') . ' by category: outdoor, concrete & paving, roofing, framing and interior. No sign-up, no email.',
			'crumbs' => array(array('Home', base_url()), array('Calculators', site_url('calculators'))),
		));
	}

	/** Category hub, e.g. /concrete-calculators. Noindexed until it has two live tools. */
	public function category($key = '')
	{
		if ( ! isset(Tool_registry::$categories[$key]))
		{
			return $this->render_404();
		}

		$cat   = Tool_registry::$categories[$key];
		$tools = array_filter(Tool_registry::live(), function ($t) use ($key) { return $t['category'] === $key; });
		if ( ! $tools)
		{
			return $this->render_404();
		}

		$list = array();
		$i    = 0;
		foreach ($tools as $t)
		{
			$list[] = array('@type' => 'ListItem', 'position' => ++$i, 'url' => $t['url'], 'name' => $t['name']);
		}
		$url = site_url($cat['slug']);

		$this->render('pages/category', array('cat' => $cat, 'tools' => $tools), array(
			'title'  => $cat['label'] . ' Calculators (' . config_item('price_year') . ') – Free & Instant | ' . config_item('site_name'),
			'desc'   => mb_strimwidth('Free ' . strtolower($cat['label']) . ' calculators: ' . implode(', ', array_map(function ($t) { return strtolower($t['short']); }, $tools)) . '. Instant USD estimates, no email.', 0, 158, '…'),
			'robots' => count($tools) >= 2 ? 'index,follow,max-image-preview:large,max-snippet:-1' : 'noindex,follow',
			'schema' => array(
				array('@context' => 'https://schema.org', '@type' => 'CollectionPage', 'name' => $cat['label'] . ' calculators', 'url' => $url,
					'mainEntity' => array('@type' => 'ItemList', 'itemListElement' => $list)),
			),
			'crumbs' => array(array('Home', base_url()), array($cat['label'], $url)),
		));
	}

	public function about()
	{
		$this->page('about', 'About ' . config_item('site_name') . ' – Who Builds These Calculators', 'Who we are, how our construction calculators and cost data are researched, reviewed and kept up to date.', 'About');
	}

	public function contact()
	{
		$this->page('contact', 'Contact ' . config_item('site_name'), 'Report a calculation issue, suggest a calculator, or ask about partnerships. We read every message.', 'Contact');
	}

	public function editorial()
	{
		$this->page('editorial', 'Editorial Policy & Methodology – ' . config_item('site_name'), 'How we build formulas, source material and labor prices, review accuracy and correct mistakes on every calculator.', 'Editorial Policy');
	}

	public function privacy()
	{
		$this->page('privacy', 'Privacy Policy – ' . config_item('site_name'), 'What data ' . config_item('site_name') . ' collects, how cookies and Google AdSense advertising work, and your choices under GDPR and CCPA.', 'Privacy Policy');
	}

	public function terms()
	{
		$this->page('terms', 'Terms of Use – ' . config_item('site_name'), 'The terms that apply when you use ' . config_item('site_name') . ' calculators and content.', 'Terms of Use');
	}

	public function disclaimer()
	{
		$this->page('disclaimer', 'Disclaimer & Affiliate Disclosure – ' . config_item('site_name'), 'Estimates are for planning only. How we earn money through ads and affiliate links with retailers like Home Depot and Lowe\'s.', 'Disclaimer');
	}

	public function not_found()
	{
		$this->render_404();
	}

	private function page($view, $title, $desc, $crumb)
	{
		$this->render('pages/' . $view, array(), array(
			'title'  => $title,
			'desc'   => $desc,
			'crumbs' => array(array('Home', base_url()), array($crumb, current_url())),
		));
	}
}
