<?php
defined('BASEPATH') OR exit('No direct script access allowed');

return array(
	'lead' => 'Price a roll-off dumpster by size, rental days and weight, including the overweight fees and permits that catch people out. A 20 yard for a week with 3 tons included comes to about $450.',

	'howto' => array(
		'name'  => 'Pricing a dumpster rental',
		'time'  => 'PT2M',
		'steps' => array(
			array('Pick the size', 'Choose 10 to 40 yards. The typical base price and weight allowance load for that size.'),
			array('Say what goes in it', 'Mixed debris, heavy concrete or dirt, or yard waste. Heavy loads use a flat-rate container.'),
			array('Enter days and weight', 'Set how long you need it and your best guess of the debris weight in tons.'),
			array('Add permits and surcharges', 'Turn on the street permit if it sits on a public road, and enter your hauler\'s real terms if you have a quote.'),
			array('Compare quotes', 'Share the link with each hauler or use it to check their line items against yours.'),
		),
	),

	'faqs' => array(
		array('How much does it cost to rent a dumpster for a week?', 'About <strong>$350 to $650</strong> for 7 days in 2026, from a 10 yard up to a 40 yard. A 20 yard, the most common size for remodels and roofs, runs about $450 with 3 tons included.'),
		array('How much does a 20 yard dumpster cost?', 'About <strong>$450</strong> for a week at national average prices, with about 3 tons of debris included. Expect $50 to $100 for every ton over that, and $5 to $15 for each extra day.'),
		array('What happens if my dumpster is overweight?', 'You pay a fee per ton over the allowance, usually $50 to $100, based on the landfill scale ticket. If the box is so heavy the truck can\'t lift it safely, the driver will ask you to unload some first.'),
		array('Do I need a permit for a dumpster?', 'Not usually if it sits on your own driveway. On a public street most cities want a permit, typically $25 to $100, and some limit how many days it can stay. Check with your city\'s public works department.'),
		array('Can I put concrete in a regular dumpster?', 'Small amounts mixed in, yes. A full load of concrete, brick or dirt goes in a heavy-debris container, usually 10 yards, filled only to the hauler\'s line and priced at a flat rate.'),
	),

	'shop' => array(
		array('label' => 'Contractor clean-up bags', 'q' => 'contractor trash bags 42 gallon'),
		array('label' => 'Plywood sheet (driveway protection)', 'q' => 'plywood sheet 3/4 in 4x8'),
		array('label' => 'Contractor wheelbarrow', 'q' => 'contractor wheelbarrow 6 cu ft'),
	),

	'sources' => array(
		array('U.S. EPA – Sustainable Management of Construction and Demolition Materials', 'https://www.epa.gov/smm/sustainable-management-construction-and-demolition-materials'),
		array('U.S. EPA – Household Hazardous Waste', 'https://www.epa.gov/hw/household-hazardous-waste-hhw'),
	),
);
