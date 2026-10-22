<?php
defined('BASEPATH') OR exit('No direct script access allowed');

return array(
	'lead' => 'Find how much insulation it takes to bring an attic, wall or floor up to the recommended R-value for your climate zone: batts, blown-in bags or spray foam, with a price. A typical 1,200 sq ft attic top-up in zone 4 takes about 40 bags of cellulose.',

	'howto' => array(
		'name'  => 'Sizing an insulation job in five steps',
		'time'  => 'PT3M',
		'steps' => array(
			array('Choose the location and zone', 'Pick attic, walls or floor, and your IECC climate zone. The recommended R-value fills in for you.'),
			array('Measure the area', 'Enter length and width for an attic or floor, or wall length and height for walls.'),
			array('Check what is there now', 'In an attic, measure the old insulation. Inches of fiberglass times 3 gives a fair R-value.'),
			array('Pick a material', 'Batts, blown cellulose, blown fiberglass or closed-cell spray foam. Each has its own price field.'),
			array('Read depth, bags and cost', 'The result shows the R to add, the settled depth, bags or board feet, and the total with labor for your state.'),
		),
	),

	'faqs' => array(
		array('How many bags of blown insulation do I need?', 'About <strong>40 bags</strong> of 25 lb cellulose to add R-38 over 1,200 sq ft. As a rule of thumb, divide the area by (1,150 ÷ R-value) for cellulose, or by (2,100 ÷ R-value) for blown fiberglass, then check the chart on the bag.'),
		array('What R-value should my attic be?', 'R-49 to R-60 in most of the U.S. (zones 4 to 8), R-38 to R-60 in zones 2 and 3, and R-30 to R-49 in south Florida and Hawaii.'),
		array('How thick is R-38 insulation?', 'About 10½ in of blown cellulose, 12 in of fiberglass batts, or 14 in of blown fiberglass. Blown insulation settles, so it goes in a little deeper than the settled figure.'),
		array('Can I put new insulation on top of old insulation?', 'Yes, as long as the old insulation is dry, free of mold and not soiled by rodents. Put unfaced material on top. A second vapor barrier would trap moisture.'),
		array('How much does it cost to insulate an attic?', 'About <strong>$1,800 to $2,500</strong> to blow R-38 of cellulose over a 1,200 sq ft attic with a contractor, or around $650 in bags if you do it yourself with a borrowed blower.'),
	),

	'shop' => array(
		array('label' => 'Blown-in cellulose insulation', 'q' => 'blown in cellulose insulation'),
		array('label' => 'Blown-in fiberglass insulation', 'q' => 'blown in fiberglass insulation'),
		array('label' => 'R-30 unfaced fiberglass batts', 'q' => 'r-30 unfaced fiberglass insulation'),
		array('label' => 'Attic rafter vent baffles', 'q' => 'attic rafter vent baffle'),
		array('label' => 'Great Stuff gaps and cracks foam', 'q' => 'great stuff gaps and cracks spray foam'),
	),

	'sources' => array(
		array('U.S. Department of Energy – Insulation and R-values', 'https://www.energy.gov/energysaver/insulation'),
		array('ENERGY STAR – Recommended home insulation R-values', 'https://www.energystar.gov/saveathome/seal_insulate/identify-problems-you-want-fix/diy-checks-inspections/insulation-r-values'),
	),
);
