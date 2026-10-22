<?php
defined('BASEPATH') OR exit('No direct script access allowed');

return array(
	'lead' => 'Installed siding cost from your wall measurements, minus windows and doors, with removal, house wrap and a side-by-side price for six materials. A one-story 50 × 30 ft house comes to about $10,700 in vinyl.',

	'howto' => array(
		'name'  => 'Pricing new siding',
		'time'  => 'PT3M',
		'steps' => array(
			array('Measure the walls', 'Add up the length of all four walls and measure the height to the eaves. Or enter the total wall area if you have it.'),
			array('Add the gables', 'Enter the number of gable ends and their width and height from the eave line to the peak.'),
			array('Count the openings', 'Count windows, entry doors and garage doors. Their area comes off the total.'),
			array('Pick the siding and extras', 'Choose the material and stories, then turn removal, house wrap and soffit and fascia on or off.'),
			array('Compare materials', 'Read the total and check the list under it to see the same walls in every other siding.'),
		),
	),

	'faqs' => array(
		array('How much does it cost to side a house?', 'About <strong>$10,700</strong> to re-side a one-story house with 1,330 sq ft of wall in vinyl, including tear-off and house wrap. Fiber cement on the same house runs about $15,600.'),
		array('How much is siding per square?', 'About <strong>$600 per square</strong> installed for vinyl ($6 per sq ft), $950 for fiber cement and $1,000 for wood. A square covers 100 sq ft of wall.'),
		array('How many squares of siding do I need?', 'Net wall area plus 10%, divided by 100. A house with 1,331 sq ft of wall after openings needs <strong>14.6 squares</strong>.'),
		array('Is fiber cement better than vinyl?', 'It depends on the climate and budget. Fiber cement costs about 50% more, resists fire and won\'t melt or crack in the cold, but it needs paint every 10 to 15 years. Vinyl costs less and needs only washing.'),
		array('Should I deduct windows and doors from siding?', 'Yes, deduct them, then add 10% for waste. Some crews skip deducting windows smaller than 15 sq ft to cover trim cuts, but the 10% waste covers that.'),
	),

	'shop' => array(
		array('label' => 'Vinyl siding', 'q' => 'vinyl siding'),
		array('label' => 'Fiber cement lap siding', 'q' => 'fiber cement lap siding'),
		array('label' => 'House wrap roll', 'q' => 'house wrap roll 9 ft'),
		array('label' => 'Vinyl J-channel', 'q' => 'vinyl siding j channel'),
		array('label' => 'Vinyl soffit panels', 'q' => 'vinyl soffit panel'),
	),

	'sources' => array(
		array('Vinyl Siding Institute – installation manual', 'https://www.vinylsiding.org/'),
		array('James Hardie – installation instructions', 'https://www.jameshardie.com/'),
	),
);
