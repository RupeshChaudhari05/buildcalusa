<?php
defined('BASEPATH') OR exit('No direct script access allowed');

return array(
	'lead' => 'Cubic yards, 60 and 80 lb bag counts and cost for slabs, footings, columns, walls and steps, plus a straight answer on bags versus ready-mix. A 10 × 10 ft slab at 4 in needs 1.36 yd³.',

	'howto' => array(
		'name'  => 'Figuring concrete for a pour',
		'time'  => 'PT2M',
		'steps' => array(
			array('Pick the shape', 'Slab, footing, column, wall or steps.'),
			array('Enter the dimensions', 'Lengths in feet and thickness in inches, or switch to metric.'),
			array('Set quantity and waste', 'Enter how many identical pieces you are pouring. Keep 5 to 10% extra.'),
			array('Check prices', 'Put in your plant\'s price per yard and your store\'s bag prices.'),
			array('Order', 'Read yards and bag counts, then share or print the estimate for the supplier.'),
		),
	),

	'faqs' => array(
		array('How many bags of concrete are in a yard?', '<strong>45 × 80 lb bags</strong> (0.60 ft³ each), 60 × 60 lb bags (0.45 ft³ each) or 90 × 40 lb bags.'),
		array('How much concrete do I need for a 10 × 10 slab?', '<strong>1.36 yd³</strong> at 4 in thick with 10% waste: 62 × 80 lb bags or 82 × 60 lb bags. At 6 in thick, plan on about 2 yd³.'),
		array('How much does a yard of concrete cost in 2026?', '<strong>$150 to $185 per cubic yard</strong> for ready-mix in most of the U.S., plus short-load fees on small orders. Bagged concrete works out to $290 to $320 per yard.'),
		array('Should I use 60 lb or 80 lb bags of concrete?', 'Either. It is the same mix. 80 lb bags are cheaper per cubic foot and mean fewer trips. 60 lb bags are easier to carry and mix by hand.'),
		array('How thick should a concrete slab be?', '4 in for patios, walks and shed floors. 5 to 6 in for driveways and garages. 6 in or more with rebar for trucks or RVs.'),
	),

	'shop' => array(
		array('label' => 'Quikrete 80 lb Concrete Mix', 'q' => 'quikrete 80 lb concrete mix'),
		array('label' => 'Quikrete 60 lb Concrete Mix', 'q' => 'quikrete 60 lb concrete mix'),
		array('label' => 'Quikrete Fast-Setting Concrete 50 lb', 'q' => 'quikrete fast setting concrete 50 lb'),
		array('label' => 'Concrete form tubes (Sonotube)', 'q' => 'concrete form tube'),
		array('label' => 'Rebar & wire mesh', 'q' => 'concrete wire mesh'),
	),

	'sources' => array(
		array('Quikrete – Concrete Mix product data (yields)', 'https://www.quikrete.com/productlines/concretemix.asp'),
		array('American Concrete Institute (ACI)', 'https://www.concrete.org/'),
		array('Portland Cement Association – Concrete basics', 'https://www.cement.org/'),
	),
);
