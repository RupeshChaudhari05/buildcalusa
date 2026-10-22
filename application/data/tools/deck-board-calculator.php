<?php
defined('BASEPATH') OR exit('No direct script access allowed');

return array(
	'lead' => 'Get the board count, linear feet and screw or clip count for a deck, priced for pine, cedar, composite or PVC. A 16 × 12 ft deck takes 29 boards at 16 ft.',

	'howto' => array(
		'name'  => 'Working out a decking order',
		'time'  => 'PT2M',
		'steps' => array(
			array('Measure the deck', 'Length is the direction the boards run. Width is measured across the boards.'),
			array('Pick the decking', 'Choose pine, cedar, composite or PVC. The price per foot fills in, and you can change it.'),
			array('Set board length and gap', 'Pick the length you will buy and the gap. 3/16 in is standard for dry boards.'),
			array('Add joists, waste and fasteners', 'Enter joist spacing and waste (10% for straight runs), then choose screws or hidden clips.'),
			array('Take the list to the yard', 'Share or print the boards, fasteners and cost.'),
		),
	),

	'faqs' => array(
		array('How many deck boards do I need for a 16×12 deck?', '<strong>29 boards at 16 ft</strong>, using 5½ in boards, a 3/16 in gap and 10% waste. That is 26 rows and 416 linear feet. With 12 ft boards you need about 39, joined over joists.'),
		array('How many screws per deck board?', 'Two at every joist. A 16 ft board on 16 in centers crosses 13 joists, so it takes 26 screws. A 192 sq ft deck needs about 650 to 700.'),
		array('What gap should I leave between deck boards?', '3/16 to 1/4 in for composite and kiln-dried wood. Wet pressure-treated pine is usually laid tight, because it shrinks to about 1/8 in as it dries.'),
		array('How much does it cost to replace deck boards?', 'About <strong>$1,800</strong> for a 16 × 12 ft deck in pressure-treated pine: $620 in boards and screws plus about $1,150 of labor at $6 per square foot. Composite raises the boards to about $1,740.'),
		array('How much waste should I add for decking?', '10% for straight runs. Use 15% for diagonal, herringbone or picture-frame borders, or for decks with a lot of notching around posts.'),
	),

	'shop' => array(
		array('label' => '5/4×6 pressure-treated deck boards', 'q' => '5/4 x 6 pressure treated deck board'),
		array('label' => 'Composite decking boards', 'q' => 'composite decking board 16 ft'),
		array('label' => 'Exterior deck screws (350 count)', 'q' => 'exterior deck screws 2-1/2 in'),
		array('label' => 'Hidden deck fastener clips', 'q' => 'hidden deck fasteners clips'),
		array('label' => 'Deck stain & sealer', 'q' => 'deck stain sealer'),
	),

	'sources' => array(
		array('American Wood Council – DCA 6 Prescriptive Residential Wood Deck Construction Guide', 'https://awc.org/publications/dca-6/'),
		array('International Residential Code R507 – Exterior Decks', 'https://codes.iccsafe.org/content/IRC2021P2/chapter-5-floors'),
	),
);
