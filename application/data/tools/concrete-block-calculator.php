<?php
defined('BASEPATH') OR exit('No direct script access allowed');

return array(
	'lead' => 'Count concrete blocks, mortar bags, core grout and rebar for any CMU wall. Enter the length and height, deduct doors and windows, and see what the wall will cost to lay.',

	'howto' => array(
		'name'  => 'How to estimate a block wall',
		'time'  => 'PT2M',
		'steps' => array(
			array('Enter the wall size', 'Type the wall length and height, and the area of any doors or windows to deduct.'),
			array('Pick the block', 'Choose 4, 6, 8 or 12 in block. The 8 × 8 × 16 is the standard.'),
			array('Choose the core fill', 'Pick no grout, rebar cells every 48 in, or a fully grouted wall.'),
			array('Check prices', 'Enter your block, mortar and grout prices and the mason rate per square foot.'),
			array('Use the list', 'Order the blocks, mortar bags, grout bags and steel shown, and share the link with your supplier.'),
		),
	),

	'faqs' => array(
		array('How many concrete blocks are in a square foot?', '1.125. A standard block covers a nominal 8 × 16 in, which is 0.889 sq ft, so a 100 sq ft wall takes 113 blocks before waste.'),
		array('How many blocks does one bag of mortar lay?', 'About 13 standard 8 × 8 × 16 blocks per 80 lb bag of mortar mix. A 284-block wall needs about 22 bags.'),
		array('How much does a concrete block wall cost per square foot?', 'About $15 – $20 per square foot in 2026 for a plain 8 in wall with rebar cells grouted every 48 in, labor included. The footing is extra.'),
		array('How much grout fills an 8 inch block?', 'About 0.28 cu ft per block when both cores are filled, so 1 cubic yard fills roughly 95 blocks. Filling just the rebar cells uses far less.'),
		array('Do I need rebar in a block wall?', 'Yes, for any retaining, load-bearing or tall wall. A common pattern is #4 bars every 48 in in grouted cells, but the exact spacing should come from your plans or an engineer.'),
	),

	'shop' => array(
		array('label' => '8 × 8 × 16 concrete block', 'q' => '8x8x16 concrete block'),
		array('label' => 'Quikrete Mortar Mix 80 lb', 'q' => 'quikrete mortar mix 80 lb'),
		array('label' => 'Quikrete Type S mortar', 'q' => 'quikrete type s mortar mix'),
		array('label' => '#4 rebar, 20 ft', 'q' => '#4 rebar 20 ft'),
		array('label' => 'Ladder joint reinforcement', 'q' => 'ladder wire masonry reinforcement'),
	),

	'sources' => array(
		array('NCMA – Concrete Masonry Unit resources', 'https://ncma.org/'),
		array('Quikrete – Mortar Mix product data', 'https://www.quikrete.com/productlines/mortarmix.asp'),
	),
);
