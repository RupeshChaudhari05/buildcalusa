<?php
defined('BASEPATH') OR exit('No direct script access allowed');

return array(
	'lead' => 'Bags of concrete per fence post hole, with the post subtracted, for any hole size and bag weight. A 4×4 in a 10 × 30 in hole takes about 3.4 bags of 50 lb fast-setting mix.',

	'howto' => array(
		'name'  => 'Counting bags for your posts',
		'time'  => 'PT1M',
		'steps' => array(
			array('Count the posts', 'Include corner, end and gate posts. The fence cost calculator gives you the count if you only know the length.'),
			array('Enter the hole size', 'Use the diameter and depth you will actually dig. Check the warnings: they flag holes that are too narrow or too shallow for the fence height.'),
			array('Pick the post', 'Choose 4×4, 6×6 or round chain link posts. The post size fills in, and the concrete it displaces is taken off.'),
			array('Choose the bag', 'Pick fast-setting or regular mix in the size your store stocks, and check the price.'),
			array('Read the total', 'Total bags assumes leftover mix goes into the next hole. The whole-bags line shows the count if every hole gets its own full bags.'),
		),
	),

	'faqs' => array(
		array('How many bags of concrete do I need per fence post?', 'About <strong>3 to 4 bags</strong> of 50 lb fast-setting mix, or 2 bags of 80 lb mix, for a 4×4 post in a 10 in wide, 30 in deep hole. A 6×6 in a 16 in hole takes about two and a half times that.'),
		array('How deep should a fence post hole be?', 'One third of the fence height above ground plus 6 in. That is about 30 in for a 6 ft fence. In cold climates, go below the local frost line, which can be 36 to 48 in or more.'),
		array('How wide should a fence post hole be?', 'About 3 times the post width: 10 to 12 in for a 4×4 and 16 to 18 in for a 6×6. A narrower hole leaves too little concrete around the post to resist leaning.'),
		array('Is fast-setting concrete better for fence posts?', 'Yes for most homeowners. You pour it in dry, add water and it sets in 20 to 40 minutes, so there is no mixing and little bracing. It costs more per cubic foot than regular 80 lb mix.'),
		array('Should I put gravel in the bottom of a fence post hole?', 'Yes. About 6 in of gravel lets water drain away from the bottom of the post, which helps wood posts last longer. It also cuts the concrete needed per hole by about a fifth.'),
	),

	'shop' => array(
		array('label' => 'Quikrete Fast-Setting Concrete Mix, 50 lb', 'q' => 'quikrete fast setting concrete mix 50 lb'),
		array('label' => 'Quikrete Concrete Mix, 80 lb', 'q' => 'quikrete concrete mix 80 lb'),
		array('label' => 'All-purpose gravel, 0.5 cu ft', 'q' => 'all purpose gravel 0.5 cu ft'),
		array('label' => 'Post hole digger', 'q' => 'post hole digger'),
		array('label' => 'Post level', 'q' => 'post level'),
	),

	'sources' => array(
		array('Quikrete – Fast-Setting Concrete Mix', 'https://www.quikrete.com/productlines/fastsettingconcretemix.asp'),
		array('Quikrete – Concrete Mix yields', 'https://www.quikrete.com/productlines/concretemix.asp'),
		array('Common Ground Alliance – Call 811 before you dig', 'https://call811.com/'),
	),
);
