<?php
defined('BASEPATH') OR exit('No direct script access allowed');

return array(
	'lead' => 'Add up the tons going into a roll-off: shingles by the square, plus drywall, wood, concrete, dirt or mixed debris by the yard. Then see what the overage costs. A 20-square tear-off plus some cleanup weighs about 3.3 tons.',

	'howto' => array(
		'name'  => 'Checking a load against the weight limit',
		'time'  => 'PT2M',
		'steps' => array(
			array('Enter any roofing', 'Type the number of shingle squares and layers. Leave it at 0 if there is no roof.'),
			array('Add the other debris', 'Pick each material and its volume in cubic yards. Add more rows for mixed jobs.'),
			array('Choose the dumpster', 'Pick the size. The usual weight allowance fills in, and you can change it to match your quote.'),
			array('Read the overage', 'See the total tons, how far over the allowance you are, and the fee at your price per ton.'),
		),
	),

	'faqs' => array(
		array('How much does a 20 yard dumpster full of debris weigh?', 'About <strong>6 tons</strong> when it is full of mixed construction debris at 600 lb per yard, double the 3 tons most haulers include. Household junk fills the same box at around 3 tons.'),
		array('How much do roofing shingles weigh in a dumpster?', 'About <strong>250 lb per square per layer</strong>, roughly 1,000 lb per cubic yard. A 20-square roof with one layer comes to about 2.5 tons.'),
		array('What happens if my dumpster is overweight?', 'You pay an overage, usually <strong>$50 to $100 per ton</strong> over the allowance, billed from the landfill scale ticket. A load far over the limit can be refused until some debris comes out.'),
		array('How much does a cubic yard of concrete debris weigh?', 'About <strong>2,000 lb</strong> (1 ton) when broken and loose. Solid concrete weighs about 4,000 lb per cubic yard.'),
		array('How much weight can a 10 yard dumpster hold?', 'Usually <strong>2 tons included</strong> for general debris. A 10 yard heavy-debris container carries around 10 tons of concrete, dirt or rock when filled to the fill line.'),
	),

	'sources' => array(
		array('U.S. EPA – Volume-to-Weight Conversion Factors (2016)', 'https://www.epa.gov/sites/default/files/2016-04/documents/volume_to_weight_conversion_factors_memorandum_04192016_508fnl.pdf'),
		array('U.S. EPA – Sustainable Management of Construction and Demolition Materials', 'https://www.epa.gov/smm/sustainable-management-construction-and-demolition-materials'),
	),
);
