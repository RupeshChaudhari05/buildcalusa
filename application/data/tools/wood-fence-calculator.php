<?php
defined('BASEPATH') OR exit('No direct script access allowed');

return array(
	'lead' => 'Count every board for a wood fence: pickets for privacy, board-on-board or shadowbox styles, rails, posts, concrete and screws. A 150 ft, 6 ft privacy fence takes about 335 pickets and 22 posts.',

	'howto' => array(
		'name'  => 'How to get a wood fence material list',
		'time'  => 'PT2M',
		'steps' => array(
			array('Measure the fence line', 'Enter the total length, then count corners, ends and gates along the line.'),
			array('Pick height and style', 'Height sets the rails and post depth. Style sets how much each picket overlaps or gaps.'),
			array('Check picket size and spacing', 'A 1×6 picket is 5½ in wide. Keep posts at 8 ft or closer for wood.'),
			array('Enter your prices', 'Type in your lumber yard\'s prices to get a material total you can take to the counter.'),
		),
	),

	'faqs' => array(
		array('How many pickets do I need for a 100 ft fence?', 'About <strong>230</strong> side-by-side 5½ in pickets, including 5% waste (100 × 12 ÷ 5.5 × 1.05). Board-on-board with a 1½ in overlap takes about 315.'),
		array('How many pickets are in an 8 ft section?', '18 pickets of 5½ in for a side-by-side privacy fence. Board-on-board needs about 24, shadowbox about 22, and a spaced picket fence with 2½ in gaps about 12.'),
		array('How many rails does a 6 ft wood fence need?', '3 rails per section. Use 2 for a 4 ft fence and 4 for an 8 ft fence so the pickets stay flat.'),
		array('How long should posts be for a 6 ft fence?', '8 ft, with 2 ft in the ground. In cold states set them below the frost line, which can mean buying 10 ft posts.'),
		array('How many screws do I need for a wood fence?', 'About 2 screws per picket at each rail, plus 4 per rail at the posts. A 150 ft privacy fence with 3 rails uses roughly 2,250 screws, or five 5 lb boxes.'),
	),

	'shop' => array(
		array('label' => '6 ft dog-ear fence pickets', 'q' => '6 ft dog ear pressure treated fence picket'),
		array('label' => '2×4×8 pressure-treated rails', 'q' => '2x4x8 pressure treated lumber'),
		array('label' => '4×4×8 fence posts', 'q' => '4x4x8 pressure treated post'),
		array('label' => 'Quikrete Fast-Setting Concrete 50 lb', 'q' => 'quikrete fast setting concrete 50 lb'),
		array('label' => 'Exterior fence screws', 'q' => 'exterior wood screws 2 in 5 lb'),
	),

	'sources' => array(
		array('Common Ground Alliance – Call 811 before you dig', 'https://call811.com/'),
		array('American Wood Protection Association – Use category standards for treated wood', 'https://awpa.com/'),
	),
);
