<?php
defined('BASEPATH') OR exit('No direct script access allowed');

return array(
	'lead' => 'Work out cubic yards or 2 cu ft bags of mulch for rectangular, round or triangular beds, and see whether bags or a bulk delivery is cheaper for your job.',

	'howto' => array(
		'name'  => 'How to use the mulch calculator',
		'time'  => 'PT1M',
		'steps' => array(
			array('Pick the bed shape', 'Choose rectangle, circle or triangle and enter its size. Set the number of beds if you have several of the same size.'),
			array('Choose a depth', 'Use 3 in for new beds and 1–2 in when topping up old mulch.'),
			array('Pick the mulch', 'Choose the type. Bulk and bag prices fill in, and you can change them.'),
			array('Compare bags and bulk', 'The result shows yards, bags, and which is cheaper once delivery is included.'),
		),
	),

	'faqs' => array(
		array('How many bags of mulch are in a yard?', '<strong>13.5</strong> bags of 2 cu ft, or 9 bags of 3 cu ft. A cubic yard is 27 cubic feet.'),
		array('How much area does a yard of mulch cover?', 'About 108 sq ft at 3 in deep, 162 sq ft at 2 in, and 324 sq ft at 1 in.'),
		array('How deep should mulch be?', '2–3 in for most beds. Going deeper than 4 in can keep soil too wet and suffocate shallow roots. For a top-up, add 1–2 in.'),
		array('Is it cheaper to buy mulch in bags or bulk?', 'Bulk is cheaper above about 3 yards. Bulk hardwood runs about $35 a yard against roughly $54 a yard in bags. Below that, delivery fees can make bags cheaper, especially during spring sales.'),
		array('How much does a yard of mulch cost?', 'In 2026, $30–$45 for shredded hardwood or dyed mulch, $45–$60 for pine bark or cedar, plus $50–$100 delivery. Having it spread adds roughly $45–$75 a yard.'),
	),

	'shop' => array(
		array('label' => 'Hardwood mulch 2 cu ft bag', 'q' => 'hardwood mulch 2 cu ft'),
		array('label' => 'Pine bark nuggets', 'q' => 'pine bark nuggets mulch'),
		array('label' => 'Rubber mulch', 'q' => 'rubber mulch'),
		array('label' => 'Landscape bed edger', 'q' => 'landscape bed edger tool'),
		array('label' => 'Bow rake', 'q' => 'bow rake'),
	),

	'sources' => array(
		array('Penn State Extension – Mulching Landscape Plants', 'https://extension.psu.edu/mulching-landscape-plants'),
		array('Morton Arboretum – Mulching trees and shrubs', 'https://mortonarb.org/plant-and-protect/tree-plant-care/mulching-trees-and-shrubs/'),
	),
);
