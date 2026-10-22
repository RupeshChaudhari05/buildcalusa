<?php
defined('BASEPATH') OR exit('No direct script access allowed');

return array(
	'lead' => 'Turn a driveway or lot size into tons of hot mix, base stone and a paving budget. A 50 × 12 ft driveway at 3 in needs about 11.4 tons.',

	'howto' => array(
		'name'  => 'Estimating asphalt tonnage',
		'time'  => 'PT2M',
		'steps' => array(
			array('Measure the area', 'Enter length and width. Break odd shapes into rectangles and run each one.'),
			array('Set the thickness', '2 in for paths, 3 in for car driveways, 4 in or more where trucks will park.'),
			array('Leave density and waste alone', '145 lb per cubic foot and 5% are standard unless your plant gives you other figures.'),
			array('Add the base and prices', 'Turn on the stone base and enter the price per ton and the local paving rate.'),
			array('Compare quotes', 'Share or print the tons, truckloads and total, and hold paving bids up against it.'),
		),
	),

	'faqs' => array(
		array('How many tons of asphalt do I need for a driveway?', 'About <strong>11.4 tons</strong> for a 50 × 12 ft driveway at 3 in, including 5% waste. A two-car 24 × 50 ft driveway at the same depth takes about 23 tons.'),
		array('How much does a ton of asphalt cost?', '$100 to $200 per ton at the plant in 2026, and $130 is a fair average. Installed, a driveway runs about $5 to $10 per square foot.'),
		array('How much does a 50 × 12 asphalt driveway cost?', 'About <strong>$4,100</strong> with 3 in of asphalt at $130 per ton, a 6 in stone base at $35 per ton and $3.50 per square foot labor. That is roughly $6.90 per square foot.'),
		array('How much area does a ton of asphalt cover?', 'About 80 sq ft at 2 in thick, 55 sq ft at 3 in and 40 sq ft at 4 in.'),
		array('Is asphalt cheaper than concrete for a driveway?', 'Yes, usually by 30 to 50%. Concrete runs $8 to $15 per square foot. Asphalt needs sealcoating every few years and lasts 15 to 25 years, against 30 or more for concrete.'),
	),

	'shop' => array(
		array('label' => 'Quikrete Asphalt Repair / Cold Patch', 'q' => 'quikrete asphalt repair'),
		array('label' => 'Driveway sealcoat (4.75 gal)', 'q' => 'asphalt driveway sealer'),
		array('label' => 'Asphalt crack filler', 'q' => 'asphalt crack filler'),
		array('label' => 'Hand tamper', 'q' => 'hand tamper 10 in'),
	),

	'sources' => array(
		array('National Asphalt Pavement Association – Asphalt basics', 'https://www.asphaltpavement.org/'),
		array('Asphalt Institute – Residential driveway guidance', 'https://www.asphaltinstitute.org/'),
	),
);
