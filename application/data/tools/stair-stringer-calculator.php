<?php
defined('BASEPATH') OR exit('No direct script access allowed');

return array(
	'lead' => 'Risers, treads, exact riser height, stringer length and angle for deck, basement or interior stairs, checked against IRC limits with a live diagram. A 9 ft rise works out to 14 risers at 7-11/16 in.',

	'howto' => array(
		'name'  => 'Laying out stair stringers',
		'time'  => 'PT2M',
		'steps' => array(
			array('Measure the total rise', 'Measure plumb from the lower finished surface to the top of the upper finished floor or deck boards.'),
			array('Set riser and tread limits', 'Keep 7.75 in max riser and 10 in min tread for the IRC, or enter your local limits.'),
			array('Enter width and nosing', 'Stair width, nosing and stringer spacing set the number of stringers.'),
			array('Read the code check', 'Green means the layout is within IRC R311.7. Red tells you which number to change.'),
			array('Mark the square', 'Use the riser and tread figures on your framing square, and print or share the layout.'),
		),
	),

	'faqs' => array(
		array('How many stairs do I need for a 9 foot rise?', '<strong>14 risers</strong> at about 7-11/16 in, with 13 treads, using the 7¾ in IRC maximum. With 10½ in treads the stair needs about 11 ft 4½ in of floor.'),
		array('What is the maximum stair riser height by code?', '<strong>7¾ in</strong> under the International Residential Code, with no more than ⅜ in difference between risers in a flight. Commercial (IBC) stairs are held to 7 in.'),
		array('How long should a stair stringer be?', 'The square root of rise² plus run². For a 108 in rise and 136½ in run that is about 174 in, so buy 16 ft boards. Always buy at least one step longer than the measurement to allow for the end cuts.'),
		array('How many stringers do I need for 36 inch stairs?', '3 at 16 in on center, or 4 if the treads are composite and need 12 in spacing. Check the tread maker\'s span rating.'),
		array('What is the best angle for stairs?', '30 to 37°. The steepest a code stair can be is about 37.8°, with 7¾ in risers and 10 in treads. Below 30° the stair takes up a lot of floor.'),
	),

	'shop' => array(
		array('label' => '2×12 pressure-treated lumber', 'q' => '2x12 pressure treated lumber'),
		array('label' => 'Precut stair stringers', 'q' => 'pressure treated stair stringer'),
		array('label' => 'Framing square with stair gauges', 'q' => 'framing square stair gauges'),
		array('label' => 'Stair treads', 'q' => 'stair tread'),
		array('label' => 'Stringer hangers / connectors', 'q' => 'simpson strong tie stair stringer connector'),
	),

	'sources' => array(
		array('ICC – International Residential Code R311.7 Stairways', 'https://codes.iccsafe.org/content/IRC2021P2/chapter-3-building-planning'),
		array('American Wood Council – Prescriptive Residential Wood Deck Construction Guide (DCA 6)', 'https://awc.org/publications/dca6/'),
	),
);
