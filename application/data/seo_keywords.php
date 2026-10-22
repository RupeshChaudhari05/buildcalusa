<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Secondary / long-tail keywords per page (the primary keyword lives in
 * Tool_registry). Used by build-seo-doc.php to produce docs/seo-plan.html.
 * Rule: a phrase may appear under ONE page only (one page per search intent).
 */
return array(
	'_home' => array('construction calculators', 'contractor calculators', 'construction cost calculator', 'building materials calculator', 'home improvement calculators', 'diy project calculators'),

	'_hubs' => array(
		'concrete'  => array('concrete calculators', 'paving calculators'),
		'roofing'   => array('roofing calculators', 'siding calculators'),
		'outdoor'   => array('fence calculators', 'deck calculators'),
		'landscape' => array('landscaping calculators', 'hardscape calculators'),
		'framing'   => array('lumber calculators', 'framing calculators'),
		'interior'  => array('remodeling calculators', 'interior renovation calculators'),
		'debris'    => array('demolition calculators', 'dumpster calculators'),
		'business'  => array('contractor business calculators', 'construction pricing calculators'),
	),

	'fence-cost-calculator'            => array('fence cost per foot', 'wood fence cost calculator', 'vinyl fence cost calculator', 'chain link fence cost calculator', 'fence installation cost', 'privacy fence cost', 'cost to install fence per linear foot'),
	'deck-board-calculator'            => array('how many deck boards do i need', 'decking calculator', 'composite decking calculator', 'deck screw calculator', 'deck boards per square foot'),
	'asphalt-calculator'               => array('asphalt tonnage calculator', 'how much asphalt do i need', 'asphalt driveway cost calculator', 'asphalt cost per ton', 'blacktop calculator'),
	'roofing-shingle-calculator'       => array('shingle calculator', 'how many bundles of shingles do i need', 'roofing calculator', 'roofing squares calculator', 'shingle bundle calculator'),
	'concrete-calculator'              => array('concrete slab calculator', 'how many bags of concrete do i need', 'concrete yard calculator', 'quikrete calculator', 'concrete cost calculator', 'cubic yards of concrete calculator', 'concrete footing calculator'),
	'stair-stringer-calculator'        => array('stair calculator', 'stair rise and run calculator', 'deck stair calculator', 'how to calculate stair stringers', 'stair stringer layout', 'stair code calculator'),
	'drywall-calculator'               => array('how many sheets of drywall do i need', 'drywall cost calculator', 'sheetrock calculator', 'drywall mud calculator', 'drywall square footage calculator'),
	'tile-calculator'                  => array('how much tile do i need', 'tile square footage calculator', 'grout calculator', 'floor tile calculator', 'backsplash tile calculator', 'thinset calculator'),
	'gravel-calculator'                => array('how much gravel do i need', 'gravel driveway calculator', 'crushed stone calculator', 'pea gravel calculator', 'tons of gravel calculator', 'river rock calculator'),
	'paver-calculator'                 => array('patio paver calculator', 'how many pavers do i need', 'paver base calculator', 'paver sand calculator', 'paver patio cost calculator'),
	'roof-pitch-calculator'            => array('roof slope calculator', 'roof angle calculator', 'rafter length calculator', 'roof pitch to degrees', 'how to measure roof pitch'),
	'paint-calculator'                 => array('how much paint do i need', 'paint calculator for room', 'paint gallon calculator', 'ceiling paint calculator', 'interior painting cost calculator'),
	'retaining-wall-calculator'        => array('retaining wall block calculator', 'how many retaining wall blocks do i need', 'retaining wall cost calculator', 'landscape wall calculator'),
	'concrete-block-calculator'        => array('cinder block calculator', 'cmu calculator', 'block wall calculator', 'how many concrete blocks do i need', 'mortar calculator for block'),
	'flooring-calculator'              => array('laminate flooring calculator', 'vinyl plank flooring calculator', 'hardwood flooring calculator', 'carpet calculator', 'flooring cost calculator'),
	'mulch-calculator'                 => array('how much mulch do i need', 'mulch calculator yards', 'bags of mulch calculator', 'mulch coverage calculator', 'rubber mulch calculator'),
	'insulation-calculator'            => array('attic insulation calculator', 'blown in insulation calculator', 'r value calculator', 'insulation cost calculator', 'how much insulation do i need'),
	'board-foot-calculator'            => array('lumber calculator', 'board feet calculator', 'hardwood board foot calculator', 'how to calculate board feet', 'lumber cost calculator'),
	'contractor-markup-calculator'     => array('markup vs margin calculator', 'construction markup calculator', 'contractor profit margin calculator', 'how to price a construction job', 'overhead and profit calculator'),
	'bathroom-remodel-cost-calculator' => array('bathroom renovation cost calculator', 'small bathroom remodel cost', 'cost to remodel a bathroom', 'bathroom remodel cost per square foot', 'master bathroom remodel cost'),
	'wood-fence-calculator'            => array('wood fence material calculator', 'fence picket calculator', 'privacy fence calculator', 'how many fence pickets do i need', 'board on board fence calculator', 'shadowbox fence calculator'),
	'fence-post-concrete-calculator'   => array('how much concrete per fence post', 'bags of concrete per fence post', 'post hole concrete calculator', 'quikrete fence post calculator', 'concrete for 4x4 post'),
	'vinyl-fence-calculator'           => array('vinyl fence panel calculator', 'how many vinyl fence posts do i need', 'pvc fence calculator', 'vinyl fence materials list'),
	'chain-link-fence-calculator'      => array('chain link fence material calculator', 'chain link fence parts calculator', 'chain link fence materials list', 'chain link fence post spacing', 'how many chain link fence posts do i need'),
	'deck-cost-calculator'             => array('deck cost per square foot', 'cost to build a deck', 'composite deck cost calculator', 'deck building cost calculator', '12x12 deck cost'),
	'roof-cost-calculator'             => array('metal roof cost calculator', 'roof replacement cost calculator', 'roof cost per square foot', 'cost to replace roof', 'standing seam metal roof cost', 'tile roof cost'),
	'siding-cost-calculator'           => array('vinyl siding cost calculator', 'siding calculator', 'fiber cement siding cost', 'how much siding do i need', 'siding cost per square foot', 'hardie board siding cost'),
	'stain-calculator'                 => array('deck stain calculator', 'fence stain calculator', 'how much stain do i need for my deck', 'how much stain for a fence', 'stain coverage per gallon'),
	'dumpster-rental-cost-calculator'  => array('dumpster rental cost', 'how much does a dumpster cost', '20 yard dumpster cost', 'roll off dumpster price', 'dumpster rental price per day'),
	'dumpster-size-calculator'         => array('what size dumpster do i need', 'dumpster size guide', 'roofing dumpster size', 'dumpster size for kitchen remodel', '10 vs 20 yard dumpster'),
	'dumpster-weight-calculator'       => array('dumpster weight limit', 'construction debris weight per cubic yard', 'debris weight calculator', 'roofing shingles weight per square', 'dumpster overweight fee'),
	'junk-removal-cost-calculator'     => array('junk removal prices', 'junk removal cost per load', 'junk removal truck load price', 'how much does junk removal cost', 'junk removal vs dumpster'),
);
