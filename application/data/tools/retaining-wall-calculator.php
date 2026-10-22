<?php
defined('BASEPATH') OR exit('No direct script access allowed');

return array(
	'lead' => 'Get the block count, caps, base gravel, drainage stone and cost for a segmental block retaining wall. Enter the length and height, pick a block size, and the take-off updates as you type.',

	'howto' => array(
		'name'  => 'How to estimate a block retaining wall',
		'time'  => 'PT2M',
		'steps' => array(
			array('Measure the wall', 'Enter the wall length and the exposed height above finished grade.'),
			array('Pick the block', 'Choose small, medium or large block, or type the face height and width from the product label.'),
			array('Set buried courses and caps', 'Keep at least one buried course, and turn caps on if the wall will be finished with a cap stone.'),
			array('Check stone and labor prices', 'Enter your supplier prices per ton and your installer rate per square foot of wall face.'),
			array('Order with the list', 'Use the block, cap, stone and pipe quantities as your order, and share the link with your supplier.'),
		),
	),

	'faqs' => array(
		array('How many blocks do I need for a 40 ft wall that is 3 ft tall?', 'About 221 medium blocks (6 in × 16 in). That is 6 courses above grade, 1 buried course and 30 blocks per course, plus 5% for cuts.'),
		array('How much does a retaining wall cost per square foot?', 'About $40 – $55 per square foot of wall face in 2026 for block walls under 4 ft, materials and labor together. Labor alone is $25 – $35 of that. A 40 ft × 3 ft wall comes to roughly $5,000 – $6,500.'),
		array('How tall can a retaining wall be without a permit?', 'In most U.S. towns, 4 ft of exposed height, measured from the bottom of the footing in some codes. Above that you usually need an engineered design and a permit. Some places set the limit at 3 ft, so check locally.'),
		array('Do I need gravel behind a retaining wall?', 'Yes. Use 12 in of clean ¾ in stone behind the full height, with a perforated drain pipe at the bottom. Without it, water pressure builds up behind the wall and tips it forward.'),
		array('How deep should the first course be buried?', 'One full course, or about 1 in for every 8 in of wall height, whichever is more. The block sits on a 6 in compacted gravel base, so the trench is usually 10 – 14 in deep.'),
	),

	'shop' => array(
		array('label' => 'Retaining wall block', 'q' => 'retaining wall block'),
		array('label' => 'Wall cap stones', 'q' => 'retaining wall cap'),
		array('label' => '4 in perforated drain pipe', 'q' => '4 in perforated drain pipe 10 ft'),
		array('label' => 'Landscape filter fabric', 'q' => 'non woven landscape fabric drainage'),
		array('label' => 'Masonry construction adhesive', 'q' => 'landscape block adhesive'),
	),

	'sources' => array(
		array('NCMA – Segmental Retaining Walls', 'https://ncma.org/resource-category/segmental-retaining-walls/'),
		array('Common Ground Alliance – Call 811 before you dig', 'https://call811.com/'),
	),
);
