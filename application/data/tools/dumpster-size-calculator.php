<?php
defined('BASEPATH') OR exit('No direct script access allowed');

return array(
	'lead' => 'Find the right roll-off size from your project, the size of the debris pile, or the number of pickup loads, with a check on weight as well as space. A 150 sq ft kitchen gut needs a 15 yard.',

	'howto' => array(
		'name'  => 'Sizing a dumpster in four steps',
		'time'  => 'PT1M',
		'steps' => array(
			array('Choose how to measure', 'Pick a project type, measure the debris pile, or count pickup loads.'),
			array('Enter the job', 'Give the area or count for the project, or the pile length, width and height.'),
			array('Set the headroom', 'Leave 10 to 20% extra so awkward pieces still fit below the rim.'),
			array('Check the weight line', 'The tool picks the smallest size that fits by volume and includes enough weight. Heavy debris gets a heavy-debris container.'),
		),
	),

	'faqs' => array(
		array('What size dumpster do I need for a kitchen remodel?', 'A <strong>15 yard</strong> for most kitchens. A 150 sq ft full gut makes about 10 yd³ of debris, which fills a 15 yard about two-thirds. Open-plan kitchens that take out walls usually need a 20.'),
		array('How many pickup loads fit in a 10 yard dumpster?', 'About <strong>4 loads</strong> from an 8 ft bed filled level with the sides, since each load is roughly 2.5 yd³. With a 6 ft bed it is closer to 5.'),
		array('What size dumpster do I need for a roof tear-off?', 'Usually a <strong>10 or 15 yard</strong>, and weight decides it, not space. One layer of shingles weighs about 250 lb per square, so a 10 yard with a 2-ton allowance holds roughly 16 squares before overage starts.'),
		array('Is it better to rent a bigger dumpster?', 'Yes, when you are close to the line. The step up to the next size usually costs far less than a second haul, and an overfilled container can be refused at pickup.'),
		array('Can I put concrete or dirt in any dumpster?', 'No. Concrete, brick, dirt and rock go in a 10 yard heavy-debris container, filled only to the fill line. A larger container full of heavy material would be over the legal weight for the truck.'),
	),

	'shop' => array(
		array('label' => 'Heavy-duty contractor trash bags', 'q' => 'contractor trash bags 42 gallon'),
		array('label' => 'Plywood sheet to protect the driveway', 'q' => '3/4 plywood sheet 4x8'),
	),

	'sources' => array(
		array('U.S. EPA – Sustainable Management of Construction and Demolition Materials', 'https://www.epa.gov/smm/sustainable-management-construction-and-demolition-materials'),
		array('U.S. EPA – Volume-to-Weight Conversion Factors (2016)', 'https://www.epa.gov/sites/default/files/2016-04/documents/volume_to_weight_conversion_factors_memorandum_04192016_508fnl.pdf'),
	),
);
