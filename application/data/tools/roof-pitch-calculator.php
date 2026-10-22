<?php
defined('BASEPATH') OR exit('No direct script access allowed');

return array(
	'no_units' => FALSE,

	'lead' => 'Turn rise and run into roof pitch, angle and slope, or work back from degrees. Add the building span and you also get the common rafter length and the stock length to buy.',

	'howto' => array(
		'name'  => 'How to find your roof pitch',
		'time'  => 'PT1M',
		'steps' => array(
			array('Measure the rise', 'Hold a level 12 in out from the roof or rafter and measure straight down or up to the surface.'),
			array('Enter rise and run', 'Type the rise and leave the run at 12 in, or switch to angle mode if your plans give degrees.'),
			array('Add the span for rafters', 'Enter the building span, the level overhang and the ridge board thickness.'),
			array('Read the results', 'See pitch, angle, slope, area multiplier, rafter length and what the pitch means for shingles and labor.'),
		),
	),

	'faqs' => array(
		array('What angle is a 6/12 roof pitch?', '26.57°. A 6/12 roof rises 6 in for every 12 in of run, which is a 50% slope and an area multiplier of 1.118.'),
		array('What is the most common roof pitch?', 'Between 4/12 and 9/12 on most U.S. houses, with 6/12 the most common. That range sheds water well and can still be walked without staging.'),
		array('What is the lowest pitch for asphalt shingles?', '2/12. Between 2/12 and 4/12 the IRC (R905.2.2) requires two layers of underlayment. Below 2/12 you need a low-slope membrane roof.'),
		array('How do I convert roof pitch to degrees?', 'Take the arctangent of rise ÷ run. For 8/12 that is arctan(8 ÷ 12) = 33.69°. The chart on this page lists 1/12 through 12/12.'),
		array('How long is a rafter for a 24 ft span at 6/12?', 'About 14 ft 5 9/16 in along the slope with a 12 in level overhang and a 1½ in ridge board, so buy 16 ft lumber. Use the calculator for your exact span.'),
	),

	'shop' => array(
		array('label' => 'Speed square (rafter square)', 'q' => 'speed square rafter'),
		array('label' => 'Pitch gauge / angle finder', 'q' => 'roof pitch gauge angle finder'),
		array('label' => '2×8 lumber, 16 ft', 'q' => '2x8x16 lumber'),
		array('label' => 'Roof jacks / roof brackets', 'q' => 'roof jacks roofing brackets'),
	),

	'sources' => array(
		array('ICC – 2021 IRC Section R905.2 Asphalt Shingles', 'https://codes.iccsafe.org/content/IRC2021P2/chapter-9-roof-assemblies#IRC2021P2_Pt03_Ch09_SecR905.2'),
	),
);
