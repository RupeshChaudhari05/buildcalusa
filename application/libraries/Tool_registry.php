<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Central list of calculators and their release schedule.
 *
 * A tool is "live" once its `published` date has passed (site timezone).
 * Until then its URL returns 404 and it is left out of the sitemap, feed,
 * navigation and internal links, so pages roll out on schedule without a
 * redeploy. `updated` is the date the content or prices were last reviewed;
 * change it only when you actually change something on the page.
 *
 * Per-tool FAQ / HowTo data lives in application/data/tools/{slug}.php and
 * the calculator + article markup in application/views/tools/{slug}/.
 */
class Tool_registry {

	/**
	 * Category hubs. Each gets its own page at /{slug}; hubs with fewer than
	 * two live tools are noindexed so they never count as thin content.
	 */
	public static $categories = array(
		'concrete' => array(
			'label' => 'Concrete & Paving',
			'slug'  => 'concrete-calculators',
			'intro' => 'Slabs, footings, block walls and driveways. These tools give you cubic yards, bag counts and tonnage the way a ready-mix plant or asphalt supplier quotes them, so the number you order matches the number on the ticket.',
		),
		'roofing' => array(
			'label' => 'Roofing & Siding',
			'slug'  => 'roofing-calculators',
			'intro' => 'Roofs and siding are both bought in squares of 100 sq ft, but measured from the ground in feet and pitch. These calculators do the conversion, add the right waste for gables, hips and cut-up walls, and price the tear-off.',
		),
		'outdoor' => array(
			'label' => 'Fencing & Outdoor',
			'slug'  => 'fence-outdoor-calculators',
			'intro' => 'Fences, decks and other outdoor builds where the material list is long and the labor varies a lot by state. Each tool gives a full take-off: posts, boards, fasteners and concrete.',
		),
		'landscape' => array(
			'label' => 'Landscaping',
			'slug'  => 'landscaping-calculators',
			'intro' => 'Gravel, mulch, pavers and retaining walls. Bulk material is sold by the ton or cubic yard and bagged material by the cubic foot; these tools work out both so you can compare a delivery against a trunk-load of bags.',
		),
		'framing' => array(
			'label' => 'Framing & Lumber',
			'slug'  => 'framing-calculators',
			'intro' => 'Stairs, decking and lumber take-offs. Code limits (IRC) are checked where they apply, and lumber is rounded up to the stock lengths a yard actually sells.',
		),
		'interior' => array(
			'label' => 'Interior & Remodeling',
			'slug'  => 'interior-calculators',
			'intro' => 'Drywall, tile, flooring, paint and insulation, plus remodel budgets. Openings are deducted, waste is added by layout, and every price can be swapped for your supplier\'s.',
		),
		'debris' => array(
			'label' => 'Demolition & Debris',
			'slug'  => 'demolition-debris-calculators',
			'intro' => 'Every tear-off and remodel ends with a pile. These tools size the dumpster, check the load against its weight limit, and price a rental against a junk-removal crew, so you don\'t pay for a second haul or an overweight fee.',
		),
		'business' => array(
			'label' => 'Contractor Business',
			'slug'  => 'contractor-business-calculators',
			'intro' => 'Numbers for running the job, not just building it: markup versus margin, overhead and pricing a bid so the work actually pays.',
		),
	);

	public static $tools = array(
		'fence-cost-calculator' => array(
			'name'      => 'Fence Cost Calculator',
			'short'     => 'Fence Cost',
			'icon'      => 'fence',
			'category'  => 'outdoor',
			'phase'     => 1,
			'published' => '2026-10-24',
			'updated'   => '2026-10-24',
			'keyword'   => 'fence cost calculator',
			'h1'        => 'Fence Cost Calculator {year} – Free & Accurate',
			'title'     => 'Fence Cost Calculator [{year}] – Free & Instant Estimate',
			'desc'      => 'Free fence cost calculator: wood, vinyl & chain link prices per foot, posts, gates and labor by state. Instant USD estimate, no email required.',
			'blurb'     => 'Wood, vinyl, chain link & aluminum fence cost with posts, gates and labor by state.',
		),
		'deck-board-calculator' => array(
			'name'      => 'Deck Board Calculator',
			'short'     => 'Deck Boards',
			'icon'      => 'deck',
			'category'  => 'framing',
			'phase'     => 1,
			'published' => '2026-10-27',
			'updated'   => '2026-10-27',
			'keyword'   => 'deck board calculator',
			'h1'        => 'Deck Board Calculator {year} – Free & Accurate',
			'title'     => 'Deck Board Calculator [{year}] – Free & Instant',
			'desc'      => 'Free deck board calculator: boards needed, linear feet, screws or hidden clips and USD cost with 10% waste. Instant results, no email required.',
			'blurb'     => 'Boards, linear feet, screws and cost for wood or composite decking.',
		),
		'asphalt-calculator' => array(
			'name'      => 'Asphalt Calculator',
			'short'     => 'Asphalt',
			'icon'      => 'road',
			'category'  => 'concrete',
			'phase'     => 1,
			'published' => '2026-10-30',
			'updated'   => '2026-10-30',
			'keyword'   => 'asphalt calculator',
			'h1'        => 'Asphalt Calculator {year} – Tons & Driveway Cost',
			'title'     => 'Asphalt Calculator [{year}] – Free & Instant Tons + Cost',
			'desc'      => 'Free asphalt calculator: tons of hot mix for any driveway or parking area, gravel base and USD cost per ton. Instant results, no email required.',
			'blurb'     => 'Tons of hot-mix asphalt, gravel base and driveway paving cost.',
		),
		'roofing-shingle-calculator' => array(
			'name'      => 'Roofing Shingle Calculator',
			'short'     => 'Roof Shingles',
			'icon'      => 'roof',
			'category'  => 'roofing',
			'phase'     => 2,
			'published' => '2026-11-02',
			'updated'   => '2026-11-02',
			'keyword'   => 'roofing shingle calculator',
			'h1'        => 'Roofing Shingle Calculator {year} – Squares, Bundles & Cost',
			'title'     => 'Roofing Shingle Calculator [{year}] – Free & Instant',
			'desc'      => 'Free roofing shingle calculator: roof squares, bundles, underlayment, ridge cap and USD cost with pitch & waste. Instant results, no email required.',
			'blurb'     => 'Squares, bundles, underlayment and roof replacement cost by pitch.',
		),
		'concrete-calculator' => array(
			'name'      => 'Concrete Calculator',
			'short'     => 'Concrete',
			'icon'      => 'concrete',
			'category'  => 'concrete',
			'phase'     => 2,
			'published' => '2026-11-05',
			'updated'   => '2026-11-05',
			'keyword'   => 'concrete calculator',
			'h1'        => 'Concrete Calculator {year} – Yards, Bags & Cost',
			'title'     => 'Concrete Calculator [{year}] – Free & Instant Yards + Bags',
			'desc'      => 'Free concrete calculator for slabs, footings, columns, walls & stairs: cubic yards, 60/80 lb bags and USD cost. Instant results, no email required.',
			'blurb'     => 'Cubic yards, 60/80 lb bags and cost for slabs, footings, columns & steps.',
		),
		'stair-stringer-calculator' => array(
			'name'      => 'Stair Stringer Calculator',
			'short'     => 'Stair Stringer',
			'icon'      => 'stairs',
			'category'  => 'framing',
			'phase'     => 3,
			'published' => '2026-11-08',
			'updated'   => '2026-11-08',
			'keyword'   => 'stair stringer calculator',
			'h1'        => 'Stair Stringer Calculator {year} – Rise, Run & Code Check',
			'title'     => 'Stair Stringer Calculator [{year}] – Free & Instant',
			'desc'      => 'Free stair stringer calculator: risers, treads, stringer length, angle and IRC code check with a live diagram and USD cost. No email required.',
			'blurb'     => 'Risers, treads, stringer length, angle and IRC code check with diagram.',
		),
		'drywall-calculator' => array(
			'name'      => 'Drywall Calculator',
			'short'     => 'Drywall',
			'icon'      => 'wall',
			'category'  => 'interior',
			'phase'     => 3,
			'published' => '2026-11-11',
			'updated'   => '2026-11-11',
			'keyword'   => 'drywall calculator',
			'h1'        => 'Drywall Calculator {year} – Sheets, Mud, Tape & Cost',
			'title'     => 'Drywall Calculator [{year}] – Free & Instant Sheets + Cost',
			'desc'      => 'Free drywall calculator: sheets for walls & ceilings, joint compound, tape, screws and USD install cost by state. Instant, no email required.',
			'blurb'     => 'Drywall sheets, joint compound, tape, screws and install cost.',
		),
		'tile-calculator' => array(
			'name'      => 'Tile Calculator',
			'short'     => 'Tile',
			'icon'      => 'tile',
			'category'  => 'interior',
			'phase'     => 3,
			'published' => '2026-11-14',
			'updated'   => '2026-11-14',
			'keyword'   => 'tile calculator',
			'h1'        => 'Tile Calculator {year} – Tiles, Boxes, Grout & Cost',
			'title'     => 'Tile Calculator [{year}] – Free & Instant Tiles + Grout',
			'desc'      => 'Free tile calculator: tiles & boxes needed, grout, thinset and USD cost for floors, walls and showers with layout waste. Instant, no email required.',
			'blurb'     => 'Tiles, boxes, grout and thinset for floors, walls and backsplashes.',
		),

		// Phase 4 – landscaping / hardscape cluster
		'gravel-calculator' => array(
			'name'      => 'Gravel Calculator',
			'short'     => 'Gravel',
			'icon'      => 'gravel',
			'category'  => 'landscape',
			'phase'     => 4,
			'published' => '2026-11-17',
			'updated'   => '2026-11-17',
			'keyword'   => 'gravel calculator',
			'h1'        => 'Gravel Calculator {year} – Tons, Cubic Yards & Cost',
			'title'     => 'Gravel Calculator [{year}] – Free Tons, Yards & Cost',
			'desc'      => 'Free gravel calculator: tons and cubic yards of crushed stone, pea gravel or river rock for driveways and paths, with USD delivery cost. No email.',
			'blurb'     => 'Tons and cubic yards of crushed stone, pea gravel or river rock.',
		),
		'paver-calculator' => array(
			'name'      => 'Paver Calculator',
			'short'     => 'Pavers',
			'icon'      => 'paver',
			'category'  => 'landscape',
			'phase'     => 4,
			'published' => '2026-11-20',
			'updated'   => '2026-11-20',
			'keyword'   => 'paver calculator',
			'h1'        => 'Paver Calculator {year} – Pavers, Base & Sand',
			'title'     => 'Paver Calculator [{year}] – Free Patio Pavers, Base & Sand',
			'desc'      => 'Free paver calculator: pavers, gravel base, bedding sand, edge restraint and joint sand for any patio or walkway, with USD cost. Instant, no email.',
			'blurb'     => 'Pavers, gravel base, bedding sand and edging for patios and walks.',
		),
		'roof-pitch-calculator' => array(
			'name'      => 'Roof Pitch Calculator',
			'short'     => 'Roof Pitch',
			'icon'      => 'pitch',
			'category'  => 'roofing',
			'phase'     => 4,
			'published' => '2026-11-23',
			'updated'   => '2026-11-23',
			'keyword'   => 'roof pitch calculator',
			'h1'        => 'Roof Pitch Calculator {year} – Pitch, Angle & Rafter Length',
			'title'     => 'Roof Pitch Calculator [{year}] – Pitch, Angle & Rafter',
			'desc'      => 'Free roof pitch calculator: convert rise and run to pitch (x/12), angle in degrees, slope % and rafter length, with a live diagram. Instant, no email.',
			'blurb'     => 'Pitch (x/12), angle, slope % and rafter length from rise and run.',
		),
		'paint-calculator' => array(
			'name'      => 'Paint Calculator',
			'short'     => 'Paint',
			'icon'      => 'paint',
			'category'  => 'interior',
			'phase'     => 4,
			'published' => '2026-11-26',
			'updated'   => '2026-11-26',
			'keyword'   => 'paint calculator',
			'h1'        => 'Paint Calculator {year} – Gallons for Any Room',
			'title'     => 'Paint Calculator [{year}] – Free Gallons & Cost per Room',
			'desc'      => 'Free paint calculator: gallons of wall, ceiling and trim paint plus primer for any room, minus doors and windows, with USD cost. Instant, no email.',
			'blurb'     => 'Gallons of wall, ceiling and trim paint plus primer, minus openings.',
		),

		// Phase 5 – block, flooring, mulch, insulation
		'retaining-wall-calculator' => array(
			'name'      => 'Retaining Wall Calculator',
			'short'     => 'Retaining Wall',
			'icon'      => 'retaining',
			'category'  => 'landscape',
			'phase'     => 5,
			'published' => '2026-11-29',
			'updated'   => '2026-11-29',
			'keyword'   => 'retaining wall calculator',
			'h1'        => 'Retaining Wall Calculator {year} – Blocks, Caps & Gravel',
			'title'     => 'Retaining Wall Calculator [{year}] – Blocks & Cost',
			'desc'      => 'Free retaining wall calculator: blocks, cap stones, base gravel and drainage stone for segmental block walls, with USD cost. Instant, no email.',
			'blurb'     => 'Wall blocks, caps, base gravel and drainage stone for block walls.',
		),
		'concrete-block-calculator' => array(
			'name'      => 'Concrete Block Calculator',
			'short'     => 'Concrete Block',
			'icon'      => 'block',
			'category'  => 'concrete',
			'phase'     => 5,
			'published' => '2026-12-02',
			'updated'   => '2026-12-02',
			'keyword'   => 'concrete block calculator',
			'h1'        => 'Concrete Block Calculator {year} – CMU, Mortar & Grout',
			'title'     => 'Concrete Block Calculator [{year}] – CMU, Mortar & Cost',
			'desc'      => 'Free concrete block (CMU) calculator: 8×8×16 blocks, mortar bags, core-fill grout and rebar for any wall, with USD cost. Instant, no email.',
			'blurb'     => 'CMU blocks, mortar bags, core grout and rebar for block walls.',
		),
		'flooring-calculator' => array(
			'name'      => 'Flooring Calculator',
			'short'     => 'Flooring',
			'icon'      => 'flooring',
			'category'  => 'interior',
			'phase'     => 5,
			'published' => '2026-12-05',
			'updated'   => '2026-12-05',
			'keyword'   => 'flooring calculator',
			'h1'        => 'Flooring Calculator {year} – Boxes, Underlayment & Cost',
			'title'     => 'Flooring Calculator [{year}] – Free Boxes & Install Cost',
			'desc'      => 'Free flooring calculator for laminate, vinyl plank, hardwood and carpet: boxes, underlayment, trim and USD install cost by state. No email.',
			'blurb'     => 'Laminate, LVP, hardwood or carpet: boxes, underlayment and cost.',
		),
		'mulch-calculator' => array(
			'name'      => 'Mulch Calculator',
			'short'     => 'Mulch',
			'icon'      => 'mulch',
			'category'  => 'landscape',
			'phase'     => 5,
			'published' => '2026-12-08',
			'updated'   => '2026-12-08',
			'keyword'   => 'mulch calculator',
			'h1'        => 'Mulch Calculator {year} – Cubic Yards or Bags',
			'title'     => 'Mulch Calculator [{year}] – Free Yards, Bags & Cost',
			'desc'      => 'Free mulch calculator: cubic yards of bulk mulch or 2 cu ft bags for any bed shape and depth, with USD cost for bags vs. delivery. No email.',
			'blurb'     => 'Bulk yards or 2 cu ft bags of mulch for any bed and depth.',
		),
		'insulation-calculator' => array(
			'name'      => 'Insulation Calculator',
			'short'     => 'Insulation',
			'icon'      => 'insulation',
			'category'  => 'interior',
			'phase'     => 5,
			'published' => '2026-12-11',
			'updated'   => '2026-12-11',
			'keyword'   => 'insulation calculator',
			'h1'        => 'Insulation Calculator {year} – R-Value, Rolls & Bags',
			'title'     => 'Insulation Calculator [{year}] – R-Value, Rolls & Cost',
			'desc'      => 'Free insulation calculator: batts, rolls or blown-in bags to reach the recommended R-value for your climate zone, with USD cost. No email.',
			'blurb'     => 'Batts, rolls or blown-in bags to hit the R-value for your zone.',
		),

		// Phase 6 – lumber, business, remodel cost
		'board-foot-calculator' => array(
			'name'      => 'Board Foot Calculator',
			'short'     => 'Board Feet',
			'icon'      => 'lumber',
			'category'  => 'framing',
			'phase'     => 6,
			'published' => '2026-12-14',
			'updated'   => '2026-12-14',
			'keyword'   => 'board foot calculator',
			'h1'        => 'Board Foot Calculator {year} – Lumber Volume & Cost',
			'title'     => 'Board Foot Calculator [{year}] – Free Lumber Cost',
			'desc'      => 'Free board foot calculator: board feet for any lumber list using nominal or actual sizes, with price per board foot and total USD cost. No email.',
			'blurb'     => 'Board feet and cost for a whole lumber list, nominal or actual.',
		),
		'contractor-markup-calculator' => array(
			'name'      => 'Contractor Markup Calculator',
			'short'     => 'Markup & Margin',
			'icon'      => 'percent',
			'category'  => 'business',
			'phase'     => 6,
			'published' => '2026-12-17',
			'updated'   => '2026-12-17',
			'keyword'   => 'contractor markup calculator',
			'h1'        => 'Contractor Markup Calculator {year} – Markup vs. Margin',
			'title'     => 'Contractor Markup Calculator [{year}] – Markup vs Margin',
			'desc'      => 'Free contractor markup calculator: turn job cost, overhead and target profit into a bid price, and convert markup to margin. Instant, no email.',
			'blurb'     => 'Price a bid from cost, overhead and profit; markup vs. margin.',
		),
		'bathroom-remodel-cost-calculator' => array(
			'name'      => 'Bathroom Remodel Cost Calculator',
			'short'     => 'Bathroom Remodel',
			'icon'      => 'bath',
			'category'  => 'interior',
			'phase'     => 6,
			'published' => '2026-12-20',
			'updated'   => '2026-12-20',
			'keyword'   => 'bathroom remodel cost calculator',
			'h1'        => 'Bathroom Remodel Cost Calculator {year}',
			'title'     => 'Bathroom Remodel Cost Calculator [{year}] – Free Estimate',
			'desc'      => 'Free bathroom remodel cost calculator: budget by size, finish level and state, line by line from tile and vanity to plumbing and labor. No email.',
			'blurb'     => 'Line-by-line remodel budget by bathroom size, finish level and state.',
		),

		// Phase 7 – fence cluster, deck/roof/siding cost, stain
		'wood-fence-calculator' => array(
			'name'      => 'Wood Fence Calculator',
			'short'     => 'Wood Fence',
			'icon'      => 'fence',
			'category'  => 'outdoor',
			'phase'     => 7,
			'published' => '2026-12-23',
			'updated'   => '2026-12-23',
			'keyword'   => 'wood fence calculator',
			'h1'        => 'Wood Fence Calculator {year} – Pickets, Rails & Posts',
			'title'     => 'Wood Fence Calculator [{year}] – Pickets, Posts & Rails',
			'desc'      => 'Free wood fence calculator: pickets, rails, posts, concrete and fasteners for privacy, board-on-board or shadowbox fences, with USD cost. No email.',
			'blurb'     => 'Pickets, rails, posts and concrete for privacy, board-on-board or shadowbox.',
		),
		'fence-post-concrete-calculator' => array(
			'name'      => 'Fence Post Concrete Calculator',
			'short'     => 'Post Concrete',
			'icon'      => 'concrete',
			'category'  => 'outdoor',
			'phase'     => 7,
			'published' => '2026-12-26',
			'updated'   => '2026-12-26',
			'keyword'   => 'concrete for fence posts calculator',
			'h1'        => 'Fence Post Concrete Calculator {year} – Bags per Post',
			'title'     => 'Fence Post Concrete Calculator [{year}] – Bags per Post',
			'desc'      => 'Free fence post concrete calculator: 40, 50, 60 or 80 lb bags per post hole, minus the post itself, for any hole size and post count. No email.',
			'blurb'     => 'Bags of concrete per post hole, minus the post, for the whole fence line.',
		),
		'vinyl-fence-calculator' => array(
			'name'      => 'Vinyl Fence Calculator',
			'short'     => 'Vinyl Fence',
			'icon'      => 'fence',
			'category'  => 'outdoor',
			'phase'     => 7,
			'published' => '2026-12-29',
			'updated'   => '2026-12-29',
			'keyword'   => 'vinyl fence calculator',
			'h1'        => 'Vinyl Fence Calculator {year} – Panels, Posts & Caps',
			'title'     => 'Vinyl Fence Calculator [{year}] – Panels, Posts & Cost',
			'desc'      => 'Free vinyl fence calculator: panels, line, corner, end and gate posts, caps and concrete for any layout, with USD material cost. Instant, no email.',
			'blurb'     => 'Panels, line/corner/end posts, caps and concrete for vinyl fencing.',
		),
		'chain-link-fence-calculator' => array(
			'name'      => 'Chain Link Fence Calculator',
			'short'     => 'Chain Link',
			'icon'      => 'fence',
			'category'  => 'outdoor',
			'phase'     => 7,
			'published' => '2027-01-01',
			'updated'   => '2027-01-01',
			'keyword'   => 'chain link fence calculator',
			'h1'        => 'Chain Link Fence Calculator {year} – Fabric, Posts & Rail',
			'title'     => 'Chain Link Fence Calculator [{year}] – Materials & Cost',
			'desc'      => 'Free chain link fence calculator: fabric rolls, top rail, line and terminal posts, tension bars, bands and ties, with USD material cost. No email.',
			'blurb'     => 'Fabric rolls, top rail, posts, tension bars, bands and ties.',
		),
		'deck-cost-calculator' => array(
			'name'      => 'Deck Cost Calculator',
			'short'     => 'Deck Cost',
			'icon'      => 'deck',
			'category'  => 'outdoor',
			'phase'     => 7,
			'published' => '2027-01-04',
			'updated'   => '2027-01-04',
			'keyword'   => 'deck cost calculator',
			'h1'        => 'Deck Cost Calculator {year} – Cost per Square Foot',
			'title'     => 'Deck Cost Calculator [{year}] – Free Cost per Sq Ft',
			'desc'      => 'Free deck cost calculator: price a new deck per square foot with framing, footings, decking, railing and stairs for wood or composite, by state. No email.',
			'blurb'     => 'Full deck price per sq ft: framing, footings, decking, railing and stairs.',
		),
		'roof-cost-calculator' => array(
			'name'      => 'Roof Cost Calculator',
			'short'     => 'Roof Cost',
			'icon'      => 'roof',
			'category'  => 'roofing',
			'phase'     => 7,
			'published' => '2027-01-07',
			'updated'   => '2027-01-07',
			'keyword'   => 'roof cost calculator',
			'h1'        => 'Roof Cost Calculator {year} – Asphalt, Metal & Tile',
			'title'     => 'Roof Cost Calculator [{year}] – Metal, Shingle & Tile',
			'desc'      => 'Free roof replacement cost calculator: asphalt, metal, tile or slate roof cost by size, pitch and state, with tear-off. Instant USD estimate, no email.',
			'blurb'     => 'Roof replacement cost for asphalt, metal, tile or slate by pitch and state.',
		),
		'siding-cost-calculator' => array(
			'name'      => 'Siding Cost Calculator',
			'short'     => 'Siding Cost',
			'icon'      => 'siding',
			'category'  => 'roofing',
			'phase'     => 7,
			'published' => '2027-01-10',
			'updated'   => '2027-01-10',
			'keyword'   => 'siding cost calculator',
			'h1'        => 'Siding Cost Calculator {year} – Vinyl, Fiber Cement & Wood',
			'title'     => 'Siding Cost Calculator [{year}] – Free Install Estimate',
			'desc'      => 'Free siding cost calculator: squares of vinyl, fiber cement, wood or metal siding for your house, minus windows and doors, with labor by state. No email.',
			'blurb'     => 'Squares of vinyl, fiber cement, wood or metal siding and install cost.',
		),
		'stain-calculator' => array(
			'name'      => 'Deck & Fence Stain Calculator',
			'short'     => 'Stain',
			'icon'      => 'paint',
			'category'  => 'outdoor',
			'phase'     => 7,
			'published' => '2027-01-13',
			'updated'   => '2027-01-13',
			'keyword'   => 'stain calculator',
			'h1'        => 'Deck & Fence Stain Calculator {year} – Gallons & Cost',
			'title'     => 'Stain Calculator [{year}] – Deck & Fence Gallons',
			'desc'      => 'Free deck and fence stain calculator: gallons of stain for any deck or fence, one or both sides, by wood condition and coats, with USD cost. No email.',
			'blurb'     => 'Gallons of stain for decks and fences, by wood condition and coats.',
		),

		// Phase 8 – demolition & debris
		'dumpster-rental-cost-calculator' => array(
			'name'      => 'Dumpster Rental Cost Calculator',
			'short'     => 'Dumpster Cost',
			'icon'      => 'dumpster',
			'category'  => 'debris',
			'phase'     => 8,
			'published' => '2027-01-16',
			'updated'   => '2027-01-16',
			'keyword'   => 'dumpster rental cost calculator',
			'h1'        => 'Dumpster Rental Cost Calculator {year} – Price by Size',
			'title'     => 'Dumpster Rental Cost Calculator [{year}] – Free Estimate',
			'desc'      => 'Free dumpster rental cost calculator: price a 10 to 40 yard roll-off by size, rental days, weight allowance, overage fees and permit. No email.',
			'blurb'     => 'Roll-off rental price by size, days, weight allowance and overage fees.',
		),
		'dumpster-size-calculator' => array(
			'name'      => 'Dumpster Size Calculator',
			'short'     => 'Dumpster Size',
			'icon'      => 'dumpster',
			'category'  => 'debris',
			'phase'     => 8,
			'published' => '2027-01-19',
			'updated'   => '2027-01-19',
			'keyword'   => 'what size dumpster do i need calculator',
			'h1'        => 'Dumpster Size Calculator {year} – What Size Do I Need?',
			'title'     => 'Dumpster Size Calculator [{year}] – What Size Do I Need?',
			'desc'      => 'Free dumpster size calculator: cubic yards of debris by project or pile size, and the right 10, 15, 20, 30 or 40 yard dumpster. Instant, no email.',
			'blurb'     => 'Cubic yards of debris and the right 10 to 40 yard dumpster.',
		),
		'dumpster-weight-calculator' => array(
			'name'      => 'Dumpster Weight Calculator',
			'short'     => 'Dumpster Weight',
			'icon'      => 'weight',
			'category'  => 'debris',
			'phase'     => 8,
			'published' => '2027-01-22',
			'updated'   => '2027-01-22',
			'keyword'   => 'dumpster weight calculator',
			'h1'        => 'Dumpster Weight Calculator {year} – Tons of Debris',
			'title'     => 'Dumpster Weight Calculator [{year}] – Tons & Overage Fees',
			'desc'      => 'Free dumpster weight calculator: tons of shingles, drywall, concrete, dirt or mixed debris, checked against the weight limit with overage fees. No email.',
			'blurb'     => 'Tons of debris by material, checked against the weight limit.',
		),
		'junk-removal-cost-calculator' => array(
			'name'      => 'Junk Removal Cost Calculator',
			'short'     => 'Junk Removal',
			'icon'      => 'truck',
			'category'  => 'debris',
			'phase'     => 8,
			'published' => '2027-01-25',
			'updated'   => '2027-01-25',
			'keyword'   => 'junk removal cost calculator',
			'h1'        => 'Junk Removal Cost Calculator {year} – Truckload Prices',
			'title'     => 'Junk Removal Cost Calculator [{year}] – Free Estimate',
			'desc'      => 'Free junk removal cost calculator: price by truckload fraction or single items, with stairs, heavy items and disposal fees, vs. renting a dumpster. No email.',
			'blurb'     => 'Junk hauler price by truckload or item, compared with a dumpster.',
		),
	);

	/**
	 * Lead-gen trade per tool (keys of $config['quote_links'] in config/site.php).
	 * Tools not listed here never show the "Get free local quotes" button.
	 */
	public static $trades = array(
		'fence-cost-calculator' => 'fence', 'wood-fence-calculator' => 'fence', 'vinyl-fence-calculator' => 'fence',
		'chain-link-fence-calculator' => 'fence', 'fence-post-concrete-calculator' => 'fence',
		'deck-board-calculator' => 'deck', 'deck-cost-calculator' => 'deck', 'stain-calculator' => 'deck',
		'roofing-shingle-calculator' => 'roofing', 'roof-cost-calculator' => 'roofing', 'roof-pitch-calculator' => 'roofing',
		'siding-cost-calculator' => 'siding',
		'concrete-calculator' => 'concrete', 'concrete-block-calculator' => 'concrete', 'asphalt-calculator' => 'paving',
		'gravel-calculator' => 'landscaping', 'paver-calculator' => 'landscaping', 'retaining-wall-calculator' => 'landscaping', 'mulch-calculator' => 'landscaping',
		'drywall-calculator' => 'drywall', 'paint-calculator' => 'painting', 'insulation-calculator' => 'insulation',
		'tile-calculator' => 'flooring', 'flooring-calculator' => 'flooring', 'bathroom-remodel-cost-calculator' => 'remodel',
		'dumpster-rental-cost-calculator' => 'dumpster', 'dumpster-size-calculator' => 'dumpster', 'dumpster-weight-calculator' => 'dumpster',
		'junk-removal-cost-calculator' => 'junk',
	);

	public static function today()
	{
		return date('Y-m-d');
	}

	public static function is_live(array $tool)
	{
		if ( ! is_file(APPPATH . 'views/tools/' . $tool['slug'] . '/calculator.php'))
		{
			return FALSE;
		}

		return (bool) config_item('show_unpublished') || $tool['published'] <= self::today();
	}

	/** Tool with computed fields, or NULL if the slug is unknown. */
	public static function get($slug)
	{
		if ( ! isset(self::$tools[$slug]))
		{
			return NULL;
		}

		$year = (string) config_item('price_year');
		$tool = self::$tools[$slug] + array('slug' => $slug);
		$tool['h1']    = str_replace('{year}', $year, $tool['h1']);
		$tool['title'] = str_replace('{year}', $year, $tool['title']);
		$tool['url']   = site_url($slug);

		return $tool;
	}

	/** Live tools, newest first. */
	public static function live()
	{
		$out = array();
		foreach (array_keys(self::$tools) as $slug)
		{
			$tool = self::get($slug);
			if (self::is_live($tool))
			{
				$out[$slug] = $tool;
			}
		}
		uasort($out, function ($a, $b) { return strcmp($b['published'], $a['published']); });

		return $out;
	}

	/** Scheduled tools that are not public yet, soonest first. */
	public static function upcoming()
	{
		$out = array();
		foreach (array_keys(self::$tools) as $slug)
		{
			$tool = self::get($slug);
			if ($tool['published'] > self::today())
			{
				$out[$slug] = $tool;
			}
		}
		uasort($out, function ($a, $b) { return strcmp($a['published'], $b['published']); });

		return $out;
	}

	/** Live tools to cross-link from a tool page: same category first. */
	public static function related($slug, $limit = 6)
	{
		$cat  = self::$tools[$slug]['category'];
		$live = self::live();
		unset($live[$slug]);

		$same  = array_filter($live, function ($t) use ($cat) { return $t['category'] === $cat; });
		$other = array_diff_key($live, $same);

		return array_slice($same + $other, 0, $limit, TRUE);
	}

	/** Most recent date any live page changed. */
	public static function last_modified()
	{
		$dates = array();
		foreach (self::live() as $t)
		{
			$dates[] = max($t['updated'], $t['published']);
		}

		return $dates ? min(max($dates), self::today()) : self::today();
	}

	/** Per-tool FAQ / HowTo / shopping data. */
	public static function data($slug)
	{
		$file = APPPATH . 'data/tools/' . $slug . '.php';

		return is_file($file) ? require $file : array();
	}
}
