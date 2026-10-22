<?php
defined('BASEPATH') OR exit('No direct script access allowed');

return array(
	'lead' => 'Enter the size and depth of the area to get tons and cubic yards of stone, the number of bags, and what bulk delivery costs compared with bags from the store.',

	'howto' => array(
		'name'  => 'How to use the gravel calculator',
		'time'  => 'PT1M',
		'steps' => array(
			array('Pick the stone', 'Choose crushed stone, pea gravel, river rock, road base or decomposed granite. Density and price fill in for you.'),
			array('Measure the area', 'Enter length and width, or the diameter for a round bed.'),
			array('Set the depth', 'Use 2 in for beds, 3 in for paths and 4–6 in for driveway base.'),
			array('Check the price', 'Put in your yard\'s price per ton and delivery fee, then compare bulk against bags.'),
		),
	),

	'faqs' => array(
		array('How many tons of gravel do I need for a 20 × 20 driveway?', 'About <strong>5.7 tons</strong> of #57 stone at 3 in deep (400 sq ft, 4.1 yd³ with 10% extra). For a new driveway, add 4 in of crusher run underneath, which is another 8 tons or so.'),
		array('How much does a ton of gravel cost?', 'Most crushed stone costs $30–$60 a ton at the yard in 2026. Decorative stone like river rock runs $80–$150 a ton. Delivery usually adds $75–$150.'),
		array('How many square feet does a ton of gravel cover?', 'One ton of #57 stone covers about 80 sq ft at 3 in deep, or 120 sq ft at 2 in. Lighter stone like crushed concrete covers a little more.'),
		array('Is it cheaper to buy gravel in bags or bulk?', 'Bulk is cheaper for anything over about half a cubic yard. A 0.5 ft³ bag at $5.50 works out to roughly $300 a cubic yard, compared with $60–$80 a yard in bulk.'),
		array('How much is a cubic yard of gravel in tons?', 'About <strong>1.4 tons</strong> for crushed stone. Road base packs to about 1.5 tons and pea gravel about 1.35. Ask the supplier, because moisture and stone type change the figure.'),
	),

	'shop' => array(
		array('label' => 'Pea gravel 0.5 cu ft bag', 'q' => 'pea gravel 0.5 cu ft bag'),
		array('label' => 'All-purpose gravel / crushed stone bag', 'q' => 'all purpose gravel bag'),
		array('label' => 'Commercial landscape fabric', 'q' => 'commercial landscape fabric'),
		array('label' => 'Steel landscape edging', 'q' => 'steel landscape edging'),
		array('label' => 'Hand tamper', 'q' => 'hand tamper'),
	),

	'sources' => array(
		array('Federal Highway Administration – Gravel Roads Construction & Maintenance Guide', 'https://www.fhwa.dot.gov/construction/pubs/ots15002.pdf'),
		array('USGS – Crushed Stone Statistics and Information', 'https://www.usgs.gov/centers/national-minerals-information-center/crushed-stone-statistics-and-information'),
	),
);
