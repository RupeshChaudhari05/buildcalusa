<?php
defined('BASEPATH') OR exit('No direct script access allowed');

return array(
	'lead' => 'Tiles, boxes, grout and thinset for a floor, wall, shower or backsplash, with waste set by layout. A 10 × 12 ft floor in 12×24 tile takes 65 tiles, or 9 boxes.',

	'howto' => array(
		'name'  => 'Working out a tile order',
		'time'  => 'PT2M',
		'steps' => array(
			array('Measure the area', 'Enter length and width, plus any extra area such as a closet or niche.'),
			array('Pick the tile size', 'Choose a common size like 12×24 or 3×6 subway, or type in your own.'),
			array('Set joint and layout', 'Enter the grout joint and tile thickness, then pick straight, offset, diagonal or herringbone.'),
			array('Box count and prices', 'Type in tiles per box from the label, and your tile, setting material and labor prices.'),
			array('Take the list', 'Copy, print or share the tile, box, grout and thinset counts.'),
		),
	),

	'faqs' => array(
		array('How many tiles do I need for a 10×12 room?', '<strong>65 tiles of 12×24</strong> (9 boxes of 8), or about 130 tiles of 12×12, with 10% waste. Add 15 to 20% instead for diagonal or herringbone.'),
		array('How much extra tile should I buy?', '10% for a straight grid, 12% for offset, 15% for diagonal and 20% for herringbone. Keep one sealed box for repairs.'),
		array('How much grout do I need?', 'About 6 lb per 100 sq ft for 12×24 porcelain with ⅛ in joints. 3×6 subway tile takes roughly twice that. One 25 lb bag covers most bathroom floors.'),
		array('How much thinset do I need for tile?', 'One 50 lb bag per 95 sq ft with a ¼ × ⅜ in notch, for tiles up to 12 in. With the ½ in notch needed for 12×24 and larger, a bag covers about 50 sq ft.'),
		array('How much does tile installation cost per square foot?', '$6 to $12 for labor on standard floor tile, and $12 to $25 for showers, mosaics and herringbone. With $4 porcelain, most floors come to $11 to $17 per square foot installed.'),
	),

	'shop' => array(
		array('label' => 'Porcelain floor tile 12×24', 'q' => '12x24 porcelain floor tile'),
		array('label' => 'Modified thinset mortar 50 lb', 'q' => 'modified thinset mortar 50 lb'),
		array('label' => 'Sanded grout 25 lb', 'q' => 'sanded grout 25 lb'),
		array('label' => 'Tile spacers & leveling system', 'q' => 'tile leveling system'),
		array('label' => 'Square-notch tile trowel', 'q' => 'square notch tile trowel'),
	),

	'sources' => array(
		array('Tile Council of North America (TCNA) – Handbook for Ceramic, Glass and Stone Tile Installation', 'https://www.tcnatile.com/products-and-services/publications/'),
		array('ANSI A108 / A118 – American National Standards for Installation of Ceramic Tile', 'https://www.tcnatile.com/products-and-services/publications/'),
	),
);
