<?php
defined('BASEPATH') OR exit('No direct script access allowed');

return array(
	'lead' => 'Sheets, mud, tape and screws for any room, with doors and windows deducted and labor priced for your state. A 14 × 12 ft bedroom with ceiling takes 19 sheets of 4×8.',

	'howto' => array(
		'name'  => 'Counting drywall for a room',
		'time'  => 'PT2M',
		'steps' => array(
			array('Measure the room', 'Enter length, width and wall height.'),
			array('Count the openings', 'Enter doors and windows. Standard sizes are deducted for you.'),
			array('Ceiling and sheet size', 'Turn the ceiling on or off and choose 4×8, 4×10 or 4×12 sheets.'),
			array('Waste and prices', 'Use 10% waste for plain rooms and more for complex ones, and put in your own board and labor prices.'),
			array('Take the list', 'Copy, print or share the sheet, mud, tape and screw counts.'),
		),
	),

	'faqs' => array(
		array('How many sheets of drywall do I need for a 12×14 room?', '<strong>19 sheets of 4×8</strong> with 8 ft walls, the ceiling, one door, two windows and 10% waste. Walls only, it is about 13 sheets.'),
		array('How much does it cost to drywall a room?', 'About <strong>$1,430</strong> for a 12 × 14 bedroom with ceiling: $365 in materials and about $1,070 of labor at $2 per square foot. Most rooms land between $2.25 and $3.50 per square foot installed.'),
		array('How much joint compound do I need?', 'About 138 lb per 1,000 sq ft of board, which is one 4.5 gal bucket for every 450 sq ft. Lightweight all-purpose sands easier on the top coats.'),
		array('Should I use 4×8 or 4×12 drywall?', '4×12 on long walls and ceilings, because it means fewer butt joints to tape. Use 4×8 when you work alone, carry board upstairs or cover short walls.'),
		array('How much waste should I add for drywall?', '10% for most rooms, 12 to 15% for rooms with lots of openings or tall walls, and 15 to 20% for vaulted ceilings and angled walls.'),
	),

	'shop' => array(
		array('label' => '½" drywall sheets 4×8', 'q' => '1/2 in drywall 4 ft x 8 ft'),
		array('label' => 'All-purpose joint compound 4.5 gal', 'q' => 'all purpose joint compound 4.5 gal'),
		array('label' => 'Paper drywall tape 250 ft', 'q' => 'paper drywall tape 250 ft'),
		array('label' => '1-1/4" coarse drywall screws 5 lb', 'q' => '1-1/4 coarse drywall screws 5 lb'),
		array('label' => 'Drywall corner bead', 'q' => 'drywall corner bead'),
	),

	'sources' => array(
		array('USG – The Gypsum Construction Handbook', 'https://www.usg.com/content/usgcom/en/resource-center/gypsum-construction-handbook.html'),
		array('Gypsum Association – GA-216 Application and Finishing of Gypsum Panel Products', 'https://gypsum.org/'),
	),
);
