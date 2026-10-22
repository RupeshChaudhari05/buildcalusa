<?php
defined('BASEPATH') OR exit('No direct script access allowed');

return array(
	'lead' => 'Price a whole deck per square foot: decking, framing, footings, railing, stairs, permit and labor for your state. A 16 × 12 ft pressure-treated deck with railing comes to about $7,750.',

	'howto' => array(
		'name'  => 'Pricing a deck',
		'time'  => 'PT2M',
		'steps' => array(
			array('Enter the size', 'Length along the house and width out from it. The area drives decking, framing and labor.'),
			array('Pick height and decking', 'Choose how high the deck sits and the decking material. Typical prices fill in.'),
			array('Set railing and stairs', 'Leave railing length blank to price three open sides, or type the real length. Enter the number of steps.'),
			array('Choose your state', 'Labor scales to local rates. Turn on DIY to see materials only, or add removal of an old deck.'),
			array('Share the estimate', 'The link keeps your inputs, so you can send it to a contractor and compare it line by line with their quote.'),
		),
	),

	'faqs' => array(
		array('How much does a deck cost per square foot?', 'About <strong>$35 to $75 per sq ft</strong> built by a contractor in 2026. Pressure-treated decks land near the low end, and composite, PVC or second-story decks near the high end.'),
		array('How much does a 12x16 deck cost?', 'About <strong>$7,750</strong> for a pressure-treated 12 × 16 deck about 3 ft off the ground, with wood railing on three sides and three steps. In composite it is about $9,100.'),
		array('Is composite decking worth the extra cost?', 'Often, yes. On a 12 × 16 deck composite adds only about $1,300, because framing and labor stay the same, and it skips the yearly cleaning and staining that wood needs.'),
		array('How much is labor to build a deck?', 'Usually $15 to $25 per sq ft for framing and decking, depending on your state and how high the deck sits. Railing and stairs are usually priced on top of that.'),
		array('Do I need a permit to build a deck?', 'Usually, yes, for any deck attached to the house or more than 30 in off the ground. Permits commonly cost $200 to $500, and inspectors check footings, ledger attachment and railings.'),
	),

	'shop' => array(
		array('label' => 'Composite decking boards', 'q' => 'composite decking board 16 ft'),
		array('label' => 'Pressure-treated 2×10 joists', 'q' => 'pressure treated 2x10 16 ft'),
		array('label' => 'Joist hangers', 'q' => '2x10 joist hanger'),
		array('label' => 'Ledger structural screws', 'q' => 'ledger lok structural screws'),
		array('label' => 'Deck railing kit', 'q' => 'deck railing kit'),
	),

	'sources' => array(
		array('American Wood Council – DCA 6, Prescriptive Residential Wood Deck Construction Guide', 'https://awc.org/publications/dca-6/'),
		array('ICC – International Residential Code, Section R507 Decks', 'https://codes.iccsafe.org/'),
	),
);
