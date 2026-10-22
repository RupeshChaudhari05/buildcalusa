<?php
defined('BASEPATH') OR exit('No direct script access allowed');

return array(
	'lead' => 'The full chain link parts list: fabric rolls, line and terminal posts, top rail, tension bars, bands, caps and ties. A 150 ft, 6 ft fence with one gate takes 3 rolls and 18 posts.',

	'howto' => array(
		'name'  => 'How to get a chain link fence material list',
		'time'  => 'PT2M',
		'steps' => array(
			array('Measure the fence line', 'Enter the total length and the width of each gate opening.'),
			array('Pick height and gauge', 'Height sets the roll size and post length. Most homes use 11½ gauge fabric.'),
			array('Count corners, ends and gates', 'These are the terminal posts that hold the stretched fabric.'),
			array('Check the parts list', 'The results list every fitting, so you can buy the whole job in one trip.'),
		),
	),

	'faqs' => array(
		array('How many line posts do I need for chain link?', 'One every <strong>10 ft</strong> between terminal posts. A straight 100 ft run between two end posts needs 9 line posts.'),
		array('How many tension bands per post?', 'Fence height in feet minus one, for each tension bar. A 6 ft fence needs 5 bands per bar, and a corner post has two bars, so 10 bands.'),
		array('How many rolls of chain link do I need?', 'Divide the fenced length (without gates) by 50 and round up. 146 ft needs 3 rolls of 50 ft.'),
		array('What is the difference between line and terminal posts?', 'Terminal posts go at ends, corners and gates and take the pull of the stretched fabric, so they are heavier: usually 2⅜ in against 1⅜ to 1⅝ in for line posts.'),
		array('How many fence ties do I need?', 'About one per foot of height on each line post, plus one every 24 in along the top rail. A 150 ft, 6 ft fence uses about 145 ties.'),
	),

	'shop' => array(
		array('label' => 'Chain link fabric, 50 ft roll', 'q' => 'chain link fence fabric 50 ft roll'),
		array('label' => 'Chain link line posts', 'q' => 'chain link line post 1-5/8'),
		array('label' => 'Chain link terminal posts', 'q' => 'chain link terminal post 2-3/8'),
		array('label' => 'Chain link top rail', 'q' => 'chain link top rail 1-3/8 x 21 ft'),
		array('label' => 'Tension bands and fittings', 'q' => 'chain link tension band'),
	),

	'sources' => array(
		array('Chain Link Fence Manufacturers Institute – Product manual and installation guide', 'https://chainlinkinfo.org/'),
		array('ASTM F567 – Standard practice for installation of chain-link fence', 'https://www.astm.org/f0567-14a.html'),
	),
);
