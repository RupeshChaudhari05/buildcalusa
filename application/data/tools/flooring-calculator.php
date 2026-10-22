<?php
defined('BASEPATH') OR exit('No direct script access allowed');

return array(
	'lead' => 'Count the boxes of laminate, vinyl plank or hardwood (or square yards of carpet) for a room, with waste for your layout and an installed price for your state. A 12 × 15 room takes 9 boxes of LVP.',

	'howto' => array(
		'name'  => 'Ordering flooring in four steps',
		'time'  => 'PT2M',
		'steps' => array(
			array('Pick the floor', 'Choose laminate, LVP, engineered or solid hardwood, or carpet. Typical box size and prices load automatically.'),
			array('Measure', 'Enter the room length and width, plus any closets or halls in square feet.'),
			array('Choose the layout', 'Straight, diagonal or herringbone sets the waste. Check the box size on the carton and change it if yours differs.'),
			array('Add the extras', 'Turn on underlayment, quarter round or tear-out, set your state, and read the box count and total.'),
		),
	),

	'faqs' => array(
		array('How many boxes of flooring do I need for 200 sq ft?', '<strong>10 boxes</strong> of 22 sq ft flooring, or 10 boxes of 24 sq ft LVP, once you add 10% waste (220 sq ft). A diagonal layout (15% waste) takes 11 boxes of the 22 sq ft size.'),
		array('How much extra flooring should I buy?', 'Add 10% for a straight lay in a plain room, 15% for diagonal or rooms with lots of corners, and 20% for herringbone. Keep one spare box for repairs.'),
		array('How much does it cost to install vinyl plank flooring?', 'About <strong>$6 to $9 per square foot</strong> installed, with $2.50 to $5.00 for the plank and $2.50 to $4.00 for labor. A 12 × 15 room runs about $1,300 at mid-range prices.'),
		array('Do I need underlayment under vinyl plank?', 'No, not if the plank has a pad attached, which most LVP now does. Laminate and floating engineered wood do need it, and over concrete you also need a vapor barrier.'),
		array('How is carpet measured?', 'By the square yard: 9 sq ft = 1 sq yd. Because carpet comes on 12 ft rolls, a room wider than 12 ft needs a seam and some waste, so you often buy 10 to 15% more than the floor area.'),
	),

	'shop' => array(
		array('label' => 'Luxury vinyl plank flooring', 'q' => 'luxury vinyl plank flooring'),
		array('label' => 'Laminate flooring', 'q' => 'laminate flooring'),
		array('label' => 'Flooring underlayment 100 sq ft', 'q' => 'laminate flooring underlayment 100 sq ft'),
		array('label' => 'Quarter round moulding 8 ft', 'q' => 'quarter round moulding 8 ft'),
		array('label' => 'Flooring installation kit', 'q' => 'laminate flooring installation kit'),
	),

	'sources' => array(
		array('National Wood Flooring Association – Installation guidelines', 'https://www.nwfa.org/'),
		array('North American Laminate Flooring Association – Installation basics', 'https://www.nalfa.com/'),
	),
);
