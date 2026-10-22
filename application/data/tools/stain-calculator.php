<?php
defined('BASEPATH') OR exit('No direct script access allowed');

return array(
	'lead' => 'Gallons of stain for a deck or fence, counting railings, stairs and both sides, by wood condition and number of coats. A 16 × 12 deck with railing takes about 2.2 gallons.',

	'howto' => array(
		'name'  => 'Working out how much stain to buy',
		'time'  => 'PT1M',
		'steps' => array(
			array('Pick deck or fence', 'Decks count the floor, railing and stairs. Fences count length times height, on one or both sides.'),
			array('Enter the size', 'Measure the deck or the fence run. For fences, choose solid, board-on-board or spaced pickets.'),
			array('Set the wood condition', 'Weathered and rough wood soaks up far more stain than new boards. Coverage per gallon fills in.'),
			array('Choose the stain', 'Semi-transparent usually takes one coat and solid color two. Check the price per gallon.'),
			array('Buy the total', 'The result tells you how many gallons and 5-gallon pails to buy, plus cleaner and labor if a crew does it.'),
		),
	),

	'faqs' => array(
		array('How much stain do I need for a 12x16 deck?', 'About <strong>2 to 3 gallons</strong> for one coat of semi-transparent stain on weathered wood, including 40 ft of railing and three steps. New, smooth boards take closer to 1.5 gallons.'),
		array('How many square feet does a gallon of deck stain cover?', 'About 200 to 300 sq ft on new smooth wood, 150 to 200 on weathered wood and 100 to 150 on rough-sawn lumber. The label usually shows the best case.'),
		array('How much stain do I need for a 150 ft fence?', 'About <strong>11 gallons</strong> to stain a 6 ft privacy fence on both sides with one coat on weathered wood. One side only takes about half that.'),
		array('Should I use one or two coats of deck stain?', 'One coat for transparent and most semi-transparent stains, since a second coat cannot soak in and tends to peel. Solid color stains need two coats.'),
		array('How much does it cost to have a deck stained?', 'About <strong>$1.00 to $1.75 per sq ft</strong> for cleaning and one coat, depending on your state. A 16 × 12 deck with railing and stairs comes to about $650 with materials.'),
	),

	'shop' => array(
		array('label' => 'Semi-transparent deck stain, 1 gal', 'q' => 'semi transparent deck stain 1 gallon'),
		array('label' => 'Deck stain, 5 gal pail', 'q' => 'deck stain 5 gallon'),
		array('label' => 'Deck cleaner and brightener', 'q' => 'deck cleaner brightener'),
		array('label' => 'Deck stain pad applicator', 'q' => 'deck stain pad applicator'),
		array('label' => 'Pump sprayer', 'q' => 'pump sprayer 2 gallon'),
	),

	'sources' => array(
		array('Behr – Deck stain coverage and application', 'https://www.behr.com/consumer/inspiration/how-to/how-to-stain-a-deck'),
		array('Sherwin-Williams – SuperDeck exterior stain product data', 'https://www.sherwin-williams.com/en-us/feature/superdeck'),
	),
);
