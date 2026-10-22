<?php
defined('BASEPATH') OR exit('No direct script access allowed');

return array(
	'lead' => 'Squares, bundles, underlayment, ridge cap and a full replacement price from the footprint and pitch. A 50 × 30 ft house at 6/12 needs 56 bundles.',

	'howto' => array(
		'name'  => 'Pricing a shingle roof from the ground',
		'time'  => 'PT3M',
		'steps' => array(
			array('Measure the footprint', 'Measure the length and width of the house at the drip line, including overhangs.'),
			array('Find the pitch', 'Measure the rise over 12 in of run with a level and tape, then pick it from the list.'),
			array('Pick roof style and shingle', 'Gable, hip or complex sets the waste. Then choose 3-tab, architectural or designer shingles.'),
			array('Set labor and tear-off', 'Choose your state. Turn tear-off on if old shingles are coming off, or turn on DIY.'),
			array('Check the materials list', 'Compare the squares, bundles, underlayment, ridge cap and total with your roofer\'s bid.'),
		),
	),

	'faqs' => array(
		array('How many bundles of shingles do I need for a 30 × 50 roof?', '<strong>56 bundles</strong> at a 6/12 pitch. The roof surface is about 1,677 sq ft, which is 18.4 squares with 10% waste, at 3 bundles per square.'),
		array('How many square feet does a bundle of shingles cover?', 'About <strong>33.3 sq ft</strong>, since most 3-tab and architectural shingles come 3 bundles to a square. Some heavy designer lines need 4 or 5 bundles per square, so read the wrapper.'),
		array('How much does it cost to reshingle a roof in 2026?', '<strong>$450 to $700 per square</strong> installed for architectural shingles with tear-off. A typical 18 to 20 square roof runs about $8,000 to $14,000.'),
		array('How much waste should I add for roofing shingles?', '10% for a plain gable, 15% for a hip roof and up to 20% for a roof with many valleys, dormers or skylights.'),
		array('What is the minimum roof pitch for asphalt shingles?', '<strong>2/12</strong>. Between 2/12 and 4/12 the IRC (R905.2) requires a double layer of underlayment. Below 2/12, use a low-slope membrane.'),
	),

	'shop' => array(
		array('label' => 'Architectural asphalt shingles', 'q' => 'architectural shingles bundle'),
		array('label' => 'Synthetic roof underlayment', 'q' => 'synthetic roof underlayment roll'),
		array('label' => 'Hip & ridge cap shingles', 'q' => 'hip and ridge cap shingles'),
		array('label' => 'Starter strip shingles', 'q' => 'starter strip shingles'),
		array('label' => 'Roofing coil nails', 'q' => 'roofing coil nails 1-1/4 in'),
	),

	'sources' => array(
		array('International Residential Code R905.2 – Asphalt shingles', 'https://codes.iccsafe.org/content/IRC2021P2/chapter-9-roof-assemblies'),
		array('Asphalt Roofing Manufacturers Association (ARMA)', 'https://www.asphaltroofing.org/'),
	),
);
