<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	/**
	 * Render a view inside the main layout.
	 *
	 * $meta keys: title, desc, canonical, type (website|article), schema (list of
	 * JSON-LD arrays), crumbs ([[name, url], ...]), robots, published, updated, js.
	 */
	protected function render($view, array $data, array $meta)
	{
		$meta += array(
			'canonical' => current_url(),
			'type'      => 'website',
			'schema'    => array(),
			'crumbs'    => array(),
			'robots'    => 'index,follow,max-image-preview:large,max-snippet:-1',
			'js'        => NULL,
		);

		if ($meta['crumbs'])
		{
			$items = array();
			foreach ($meta['crumbs'] as $i => $c)
			{
				$items[] = array('@type' => 'ListItem', 'position' => $i + 1, 'name' => $c[0], 'item' => $c[1]);
			}
			$meta['schema'][] = array('@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => $items);
		}

		if ( ! empty($meta['updated']))
		{
			$this->output->set_header('Last-Modified: ' . gmdate('D, d M Y H:i:s', strtotime($meta['updated'] . ' 06:00 America/New_York')) . ' GMT');
		}
		$this->cache_headers();

		$this->load->view('layouts/main', array(
			'meta'    => $meta,
			'content' => $this->load->view($view, $data, TRUE),
		));
	}

	/** Branded 404 page (noindex). Used for unknown URLs and not-yet-published tools. */
	protected function render_404()
	{
		$this->output->set_status_header(404);
		$this->load->view('layouts/main', array(
			'meta' => array(
				'title'     => 'Page not found – ' . config_item('site_name'),
				'desc'      => 'This page does not exist.',
				'canonical' => current_url(),
				'type'      => 'website',
				'schema'    => array(),
				'crumbs'    => array(),
				'robots'    => 'noindex,follow',
				'js'        => NULL,
			),
			'content' => $this->load->view('pages/not_found', array('live' => Tool_registry::live()), TRUE),
		));
	}

	/** Full-page file cache + CDN-friendly headers in production. */
	protected function cache_headers()
	{
		if (ENVIRONMENT !== 'production')
		{
			return;
		}
		$minutes = (int) config_item('page_cache_minutes');
		$this->output->cache($minutes);
		$this->output->set_header('Cache-Control: public, max-age=600, s-maxage=' . ($minutes * 60) . ', stale-while-revalidate=86400');
	}
}
