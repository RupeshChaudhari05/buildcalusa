<?php
defined('BASEPATH') OR exit('No direct script access allowed');

return array(
	'lead' => 'Build a line-by-line bathroom budget from the room size, finish level and your state\'s labor rates. A small midrange full bath comes out near $24,000 with contingency.',

	'howto' => array(
		'name'  => 'Budgeting a bathroom remodel',
		'time'  => 'PT3M',
		'steps' => array(
			array('Pick the bathroom type', 'Choose half, small full, standard or primary bath, or type in the exact floor area.'),
			array('Choose a finish level', 'Budget, midrange or upscale fills in an allowance for every line, from demolition to the vanity.'),
			array('Pick your state and extras', 'Labor scales to local wages. Turn on moving plumbing, a tub-to-shower conversion or a heated floor if you need them.'),
			array('Adjust the allowances', 'Swap in real quotes or the price of the vanity and fixtures you have picked out.'),
			array('Save the budget', 'Share or print the line items and compare them against contractor bids.'),
		),
	),

	'faqs' => array(
		array('How much does a bathroom remodel cost in 2026?', 'About <strong>$24,000 for a small midrange full bath</strong> (40 sq ft) at national-average labor, including 10% contingency. Budget remodels of the same room run near $10,500 and upscale ones near $51,000.'),
		array('What is the most expensive part of a bathroom remodel?', 'The shower or tub area. A tiled walk-in shower with glass costs $10,000 to $15,000, against about $2,000 for a fiberglass unit. Across the whole job, labor is usually 40 to 60% of the cost.'),
		array('Can I remodel a bathroom for $10,000?', 'Yes, if you keep the layout. A small full bath with a fiberglass tub/shower, a stock vanity and basic fixtures comes to about $10,500 in the calculator at national-average labor.'),
		array('How long does a bathroom remodel take?', 'About 3 to 5 weeks for a small bath and 6 to 10 weeks for a primary bath. Special-order vanities and shower glass, which is measured after tile, cause most delays.'),
		array('Does moving the toilet add a lot to the cost?', 'Yes, usually <strong>$2,500 or more</strong>. The floor has to be opened to re-route the 3 in drain, and on a concrete slab it has to be cut and patched.'),
	),

	'shop' => array(
		array('label' => '36 in bathroom vanity with top', 'q' => '36 inch bathroom vanity with top'),
		array('label' => 'Elongated comfort-height toilet', 'q' => 'elongated comfort height toilet'),
		array('label' => 'Porcelain floor tile', 'q' => 'porcelain floor tile 12x24'),
		array('label' => 'Shower waterproofing membrane', 'q' => 'shower waterproofing membrane kit'),
		array('label' => 'Bathroom exhaust fan 80 CFM', 'q' => 'bathroom exhaust fan 80 cfm'),
	),

	'sources' => array(
		array('Remodeling magazine – Cost vs. Value Report', 'https://www.remodeling.hw.net/cost-vs-value/2024/'),
		array('ICC – International Residential Code, Chapter 15 (exhaust ventilation)', 'https://codes.iccsafe.org/content/IRC2021P2/chapter-15-exhaust-systems'),
	),
);
