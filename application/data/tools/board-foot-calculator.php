<?php
defined('BASEPATH') OR exit('No direct script access allowed');

return array(
	'no_units' => TRUE,

	'lead' => 'Add up the board feet in a whole lumber list and price it by species. The default list of oak comes to 56 BF, about 64 BF with waste, and roughly $386.',

	'howto' => array(
		'name'  => 'Pricing a lumber list',
		'time'  => 'PT2M',
		'steps' => array(
			array('Pick the species', 'Choose a species to load a typical price per board foot, then overwrite it with your yard\'s price.'),
			array('Enter each board', 'For each size, set the thickness in quarters, the width in inches, the length in feet and the quantity. Use Add row for more sizes.'),
			array('Set the waste', 'Leave 15% for clean hardwood, or use 25 to 30% for lower grades like #1 Common.'),
			array('Take the list to the yard', 'Copy or share the result. It lists board feet per size and the total to buy.'),
		),
	),

	'faqs' => array(
		array('How many board feet are in a 2×4×8?', '<strong>5.33 board feet.</strong> Board feet use the nominal size, so 2 × 4 × 8 ÷ 12 = 5.33, even though a 2×4 actually measures 1½ × 3½ in.'),
		array('How much does a board foot of hardwood cost?', 'About <strong>$4.50 for poplar, $6 for red oak, $8.50 for white oak and $14 for walnut</strong> (4/4 rough, 2026 averages). Thicker stock like 8/4 typically costs 10 to 25% more per board foot.'),
		array('Do you use actual or nominal size for board feet?', 'Nominal thickness and actual width. Hardwood is measured by its rough thickness in quarters (4/4, 8/4) and the actual width of each board, rounded to the nearest inch. Softwood framing lumber uses nominal sizes for both.'),
		array('How much extra lumber should I buy?', '15% for clean FAS hardwood, and 25 to 30% for #1 Common or for projects with many short parts. Rough boards have end checks, sapwood and knots that get cut away.'),
		array('How do I convert board feet to cubic meters?', 'Multiply by 0.00236. One cubic meter is about 424 board feet, so 64 BF is about 0.15 m³.'),
	),

	'shop' => array(
		array('label' => 'Red oak boards', 'q' => 'red oak board 1x6'),
		array('label' => 'Poplar boards', 'q' => 'poplar board 1x8'),
		array('label' => 'Walnut hardwood board', 'q' => 'walnut hardwood board'),
		array('label' => 'Pressure-treated 2×6 lumber', 'q' => '2x6 pressure treated lumber'),
	),

	'sources' => array(
		array('NHLA – Rules for the Measurement & Inspection of Hardwood & Cypress', 'https://www.nhla.com/rules-inspection/'),
		array('USDA Forest Products Laboratory – Wood Handbook', 'https://www.fpl.fs.usda.gov/documnts/fplgtr/fpl_gtr190.pdf'),
	),
);
