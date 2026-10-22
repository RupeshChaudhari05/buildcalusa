<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller']   = 'pages/home';
$route['404_override']         = 'pages/not_found';
$route['translate_uri_dashes'] = FALSE;

// Calculators (live on their publish date, see libraries/Tool_registry.php)
$route['fence-cost-calculator']      = 'tools/fence';
$route['deck-board-calculator']      = 'tools/deck';
$route['asphalt-calculator']         = 'tools/asphalt';
$route['roofing-shingle-calculator'] = 'tools/roofing';
$route['concrete-calculator']        = 'tools/concrete';
$route['stair-stringer-calculator']  = 'tools/stairs';
$route['drywall-calculator']         = 'tools/drywall';
$route['tile-calculator']            = 'tools/tile';
$route['gravel-calculator']                = 'tools/gravel';
$route['paver-calculator']                 = 'tools/paver';
$route['roof-pitch-calculator']            = 'tools/pitch';
$route['paint-calculator']                 = 'tools/paint';
$route['retaining-wall-calculator']        = 'tools/retaining';
$route['concrete-block-calculator']        = 'tools/block';
$route['flooring-calculator']              = 'tools/flooring';
$route['mulch-calculator']                 = 'tools/mulch';
$route['insulation-calculator']            = 'tools/insulation';
$route['board-foot-calculator']            = 'tools/boardfoot';
$route['contractor-markup-calculator']     = 'tools/markup';
$route['bathroom-remodel-cost-calculator'] = 'tools/bathroom';
$route['wood-fence-calculator']            = 'tools/woodfence';
$route['fence-post-concrete-calculator']   = 'tools/postconcrete';
$route['vinyl-fence-calculator']           = 'tools/vinylfence';
$route['chain-link-fence-calculator']      = 'tools/chainlink';
$route['deck-cost-calculator']             = 'tools/deckcost';
$route['roof-cost-calculator']             = 'tools/roofcost';
$route['siding-cost-calculator']           = 'tools/siding';
$route['stain-calculator']                 = 'tools/stain';
$route['dumpster-rental-cost-calculator']  = 'tools/dumpstercost';
$route['dumpster-size-calculator']         = 'tools/dumpstersize';
$route['dumpster-weight-calculator']       = 'tools/dumpsterweight';
$route['junk-removal-cost-calculator']     = 'tools/junk';
$route['demolition-debris-calculators']    = 'pages/category/debris';

// Category hubs
$route['concrete-calculators']            = 'pages/category/concrete';
$route['roofing-calculators']             = 'pages/category/roofing';
$route['fence-outdoor-calculators']       = 'pages/category/outdoor';
$route['landscaping-calculators']         = 'pages/category/landscape';
$route['framing-calculators']             = 'pages/category/framing';
$route['interior-calculators']            = 'pages/category/interior';
$route['contractor-business-calculators'] = 'pages/category/business';

// Site pages
$route['calculators']      = 'pages/calculators';
$route['about']            = 'pages/about';
$route['contact']          = 'pages/contact';
$route['editorial-policy'] = 'pages/editorial';
$route['privacy-policy']   = 'pages/privacy';
$route['terms-of-use']     = 'pages/terms';
$route['disclaimer']       = 'pages/disclaimer';

// SEO / machine files
$route['sitemap\.xml']          = 'seo/sitemap';
$route['robots\.txt']           = 'seo/robots';
$route['ads\.txt']              = 'seo/ads';
$route['feed\.xml']             = 'seo/feed';
$route['site\.webmanifest']     = 'seo/manifest';

// Block the old boilerplate controllers from being reachable
$route['welcome(.*)'] = 'pages/not_found';
$route['pages(.*)']   = 'pages/not_found';
$route['tools(.*)']   = 'pages/not_found';
$route['seo(.*)']     = 'pages/not_found';
