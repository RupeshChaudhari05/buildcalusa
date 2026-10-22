<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('e'))
{
	/** HTML-escape shortcut for views. */
	function e($s)
	{
		return htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
	}
}

if ( ! function_exists('asset'))
{
	/** Asset URL with a file-mtime version string for long-lived caching. */
	function asset($path)
	{
		$file = FCPATH . 'assets/' . $path;
		$v    = is_file($file) ? filemtime($file) : '1';

		return base_url('assets/' . $path) . '?v=' . $v;
	}
}

if ( ! function_exists('js_src'))
{
	/** Script URL: minified build (assets/dist) in production, readable source otherwise. */
	function js_src($path)
	{
		$dist = ENVIRONMENT === 'production' && is_file(FCPATH . 'assets/dist/' . $path);

		return asset(($dist ? 'dist/' : 'js/') . $path);
	}
}

if ( ! function_exists('icon'))
{
	/** Inline SVG icon (stroke style, inherits currentColor). */
	function icon($name, $size = 24, $class = '')
	{
		static $paths = array(
			'fence'    => '<path d="M4 21V7l2-3 2 3v14M10 21V7l2-3 2 3v14M16 21V7l2-3 2 3v14M2 10h20M2 17h20"/>',
			'deck'     => '<path d="M3 9h18M3 13h18M3 17h18M5 17v4M19 17v4M3 9l3-5h12l3 5"/>',
			'road'     => '<path d="M5 21 9 3M19 21 15 3M12 4v3M12 11v3M12 18v3"/>',
			'roof'     => '<path d="M2 12 12 3l10 9M5 10v11h14V10M9 21v-6h6v6"/>',
			'concrete' => '<path d="M3 17h18v4H3zM6 17V9h12v8M9 9V5h6v4"/>',
			'stairs'   => '<path d="M3 21h6v-5h5v-5h5V6h3M3 21V3"/>',
			'wall'     => '<path d="M3 3h18v18H3zM3 9h18M3 15h18M9 3v6M15 9v6M9 15v6"/>',
			'tile'     => '<path d="M3 3h8v8H3zM13 3h8v8h-8zM3 13h8v8H3zM13 13h8v8h-8z"/>',
			'gravel'     => '<path d="M2 20h20M4 20c1-4 3-7 8-7s7 3 8 7"/><circle cx="9" cy="17" r=".6"/><circle cx="13" cy="16" r=".6"/><circle cx="15" cy="18" r=".6"/><circle cx="11" cy="18.5" r=".6"/>',
			'paver'      => '<path d="M3 4h18v16H3zM3 9.3h18M3 14.6h18M9 4v5.3M15 4v5.3M6 9.3v5.3M12 9.3v5.3M18 9.3v5.3M9 14.6V20M15 14.6V20"/>',
			'pitch'      => '<path d="M3 19h18L3 7z"/><path d="M7 19a4 4 0 0 0-1.2-2.9"/><path d="M14 13.7V19"/>',
			'paint'      => '<rect x="3" y="3" width="15" height="6" rx="1"/><path d="M18 6h3v5h-9v3"/><rect x="10" y="14" width="4" height="7" rx="1"/>',
			'retaining'  => '<path d="M3 21h18M5 21v-4h6v4M8 17v-4h6v4M11 13V9h6v4M14 9V5h6"/>',
			'block'      => '<rect x="2" y="7" width="20" height="10" rx="1"/><rect x="5" y="9.5" width="5" height="5"/><rect x="14" y="9.5" width="5" height="5"/>',
			'flooring'   => '<path d="M3 4h18v16H3zM3 8h18M3 12h18M3 16h18M10 4v4M16 8v4M7 12v4M14 16v4"/>',
			'mulch'      => '<path d="M5 20c0-8 5-13 14-14-1 9-6 14-14 14z"/><path d="M5 20 13 12"/>',
			'insulation' => '<path d="M3 4h18v16H3z"/><path d="M3 9c3 0 3 3 6 3s3-3 6-3 3 3 6 3M3 14c3 0 3 3 6 3s3-3 6-3 3 3 6 3"/>',
			'lumber'     => '<rect x="3" y="7" width="18" height="10" rx="1"/><path d="M6 10h8M8 14h9"/><circle cx="17.5" cy="10" r="1"/>',
			'percent'    => '<path d="M19 5 5 19"/><circle cx="7" cy="7" r="2.5"/><circle cx="17" cy="17" r="2.5"/>',
			'bath'       => '<path d="M3 12h18v3a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5zM6 12V5a2 2 0 0 1 4 0M6 20l-1 2M18 20l1 2"/>',
			'siding'     => '<path d="M3 10 12 3l9 7v11H3z"/><path d="M3 13h18M3 16h18M3 19h18"/>',
			'dumpster'   => '<path d="M2 8h20l-2 11H4z"/><path d="M5 8l2-4h10l2 4M8 12v4M12 12v4M16 12v4"/>',
			'weight'     => '<path d="M6 8h12l3 13H3z"/><circle cx="12" cy="5" r="2.5"/>',
			'truck'      => '<path d="M1 6h13v10H1zM14 10h4l3 3v3h-7z"/><circle cx="5.5" cy="18" r="2"/><circle cx="17.5" cy="18" r="2"/>',
			'sun'      => '<circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/>',
			'moon'     => '<path d="M21 12.8A9 9 0 1 1 11.2 3a7 7 0 0 0 9.8 9.8z"/>',
			'share'    => '<circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><path d="m8.6 13.5 6.8 4M15.4 6.5l-6.8 4"/>',
			'copy'     => '<rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/>',
			'print'    => '<path d="M6 9V2h12v7M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2M6 14h12v8H6z"/>',
			'menu'     => '<path d="M3 6h18M3 12h18M3 18h18"/>',
			'check'    => '<path d="M20 6 9 17l-5-5"/>',
			'calc'     => '<rect x="4" y="2" width="16" height="20" rx="2"/><path d="M8 6h8M8 10h.01M12 10h.01M16 10h.01M8 14h.01M12 14h.01M16 14h.01M8 18h.01M12 18h4"/>',
			'shield'   => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/>',
			'bolt'     => '<path d="M13 2 3 14h9l-1 8 10-12h-9l1-8z"/>',
			'globe'    => '<circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15 15 0 0 1 0 20M12 2a15 15 0 0 0 0 20"/>',
			'cart'     => '<circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.7 13.4a2 2 0 0 0 2 1.6h9.7a2 2 0 0 0 2-1.6L23 6H6"/>',
			'clock'    => '<circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>',
			'reset'    => '<path d="M3 12a9 9 0 1 0 3-6.7L3 8"/><path d="M3 3v5h5"/>',
			'arrow'    => '<path d="M5 12h14M12 5l7 7-7 7"/>',
			'user'     => '<circle cx="12" cy="8" r="4"/><path d="M4 21a8 8 0 0 1 16 0"/>',
			'mail'     => '<rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 6-10 7L2 6"/>',
		);

		$cls = $class !== '' ? ' class="' . e($class) . '"' : '';

		return '<svg' . $cls . ' width="' . (int) $size . '" height="' . (int) $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . (isset($paths[$name]) ? $paths[$name] : '') . '</svg>';
	}
}

if ( ! function_exists('ad_slot'))
{
	/**
	 * AdSense unit with reserved height (prevents layout shift / CLS).
	 * Renders nothing until ADSENSE_CLIENT and the slot id are set in .env.
	 * SHOW_AD_PLACEHOLDERS=true outlines the ad positions on localhost for layout checks.
	 */
	function ad_slot($slot_key)
	{
		$client = (string) config_item('adsense_client');
		$slot   = (string) config_item($slot_key);
		if ($client === '' || $slot === '')
		{
			return ENVIRONMENT !== 'production' && config_item('show_ad_placeholders')
				? '<div class="ad-wrap ad-placeholder" aria-hidden="true"><span>Ad position (' . e($slot_key) . ')</span></div>'
				: '';
		}

		return '<div class="ad-wrap"><span class="ad-label">Advertisement</span>'
			. '<ins class="adsbygoogle" style="display:block" data-ad-client="' . e($client) . '" data-ad-slot="' . e($slot) . '" data-ad-format="auto" data-full-width-responsive="true"></ins></div>';
	}
}

if ( ! function_exists('aff_url'))
{
	/**
	 * Retailer search URL for a product, wrapped in the affiliate prefix when set.
	 * $store: homedepot | lowes | amazon
	 */
	function aff_url($store, $query)
	{
		$q = rawurlencode($query);
		switch ($store)
		{
			case 'lowes':
				$url    = 'https://www.lowes.com/search?searchTerm=' . $q;
				$prefix = (string) config_item('aff_lowes');
				break;

			case 'amazon':
				$tag = (string) config_item('amazon_tag');

				return 'https://www.amazon.com/s?k=' . $q . ($tag !== '' ? '&tag=' . rawurlencode($tag) : '');

			default:
				$url    = 'https://www.homedepot.com/s/' . $q;
				$prefix = (string) config_item('aff_homedepot');
		}

		return $prefix !== '' ? $prefix . rawurlencode($url) : $url;
	}
}

if ( ! function_exists('regions'))
{
	function regions()
	{
		static $r = NULL;

		return $r !== NULL ? $r : ($r = require APPPATH . 'data/regions.php');
	}
}

if ( ! function_exists('region_options'))
{
	/** <option> list for the labor region select (value = code, data-index = multiplier). */
	function region_options()
	{
		$intl  = array('CA-INTL', 'GB', 'IE', 'EU', 'AU', 'NZ');
		$us    = '';
		$world = '';
		$html  = '';
		foreach (regions() as $code => $r)
		{
			$opt = '<option value="' . $code . '" data-index="' . $r[1] . '">' . e($r[0]) . '</option>';
			if ($code === 'US')
			{
				$html = $opt;
			}
			elseif (in_array($code, $intl, TRUE))
			{
				$world .= $opt;
			}
			else
			{
				$us .= $opt;
			}
		}

		return $html . '<optgroup label="United States">' . $us . '</optgroup><optgroup label="International">' . $world . '</optgroup>';
	}
}

if ( ! function_exists('labor_table'))
{
	/**
	 * Rows of [state, low, high] for a labor-cost-by-state table,
	 * scaling a national low/high rate by each state's index.
	 */
	function labor_table($low, $high, $codes = array('CA', 'NY', 'MA', 'WA', 'IL', 'CO', 'TX', 'FL', 'GA', 'NC', 'OH', 'AZ'))
	{
		$regions = regions();
		$rows    = array();
		foreach ($codes as $c)
		{
			$rows[] = array($regions[$c][0], $low * $regions[$c][1], $high * $regions[$c][1]);
		}

		return $rows;
	}
}

if ( ! function_exists('initial_visibility'))
{
	/**
	 * Adds `hidden` to data-show="field:a|b" blocks whose condition is false for
	 * the form's default values, so the first paint already matches what the
	 * calculator script will show (no layout shift when JS runs).
	 */
	function initial_visibility($html)
	{
		$vals = array();
		foreach (array_reverse(preg_match_all('/<input\b[^>]*>/i', $html, $m) ? $m[0] : array()) as $tag)
		{
			if ( ! preg_match('/\sname="([^"]+)"/', $tag, $n)) continue;
			$type = preg_match('/\stype="([^"]+)"/', $tag, $t) ? strtolower($t[1]) : 'text';
			$checked = (bool) preg_match('/\schecked\b/', $tag);
			if ($type === 'checkbox')
			{
				$vals[$n[1]] = $checked ? '1' : '0';
			}
			elseif ($type === 'radio')
			{
				if ($checked) { $vals[$n[1]] = preg_match('/\svalue="([^"]*)"/', $tag, $v) ? $v[1] : 'on'; }
			}
			else
			{
				$vals[$n[1]] = preg_match('/\svalue="([^"]*)"/', $tag, $v) ? $v[1] : '';
			}
		}
		if (preg_match_all('/<select\b[^>]*\sname="([^"]+)"[^>]*>(.*?)<\/select>/is', $html, $sm, PREG_SET_ORDER))
		{
			foreach ($sm as $s)
			{
				preg_match_all('/<option\b([^>]*)>/i', $s[2], $opts);
				$pick = NULL;
				foreach ($opts[1] as $o)
				{
					$val = preg_match('/\svalue="([^"]*)"/', $o, $v) ? $v[1] : NULL;
					if ($pick === NULL) { $pick = $val; }
					if (preg_match('/\sselected\b/', $o)) { $pick = $val; break; }
				}
				$vals[$s[1]] = (string) $pick;
			}
		}

		return preg_replace_callback('/\sdata-show="([^":]+):([^"]*)"/', function ($m) use ($vals) {
			$cur = isset($vals[$m[1]]) ? $vals[$m[1]] : '';
			return in_array($cur, explode('|', $m[2]), TRUE) ? $m[0] : $m[0] . ' hidden';
		}, $html);
	}
}

if ( ! function_exists('usd'))
{
	function usd($n, $dec = 0)
	{
		return '$' . number_format($n, $dec);
	}
}

if ( ! function_exists('json_ld'))
{
	function json_ld(array $data)
	{
		return '<script type="application/ld+json">' . json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) . '</script>';
	}
}

if ( ! function_exists('long_date'))
{
	function long_date($ymd)
	{
		return date('F j, Y', strtotime($ymd));
	}
}
