<?php
defined('BASEPATH') OR exit('No direct script access allowed');

return array(
	'lead' => 'Count vinyl fence panels and every post by type (line, corner, end and gate), plus caps and concrete. A 150 ft, 6 ft privacy fence with one gate takes about 28 panels and 30 posts.',

	'howto' => array(
		'name'  => 'How to get a vinyl fence material list',
		'time'  => 'PT2M',
		'steps' => array(
			array('Measure the fence line', 'Enter the total length and the width of any gate openings.'),
			array('Pick height and section width', 'Choose the style and whether the system uses 6 ft or 8 ft sections.'),
			array('Count corners, ends and gates', 'These decide how many routed terminal posts you need.'),
			array('Enter your prices', 'Use your supplier\'s panel, post and gate prices to get a material total.'),
		),
	),

	'faqs' => array(
		array('How many vinyl fence panels do I need for 100 ft?', 'About <strong>17</strong> panels of 6 ft for a straight 100 ft run (100 ÷ 6, rounded up). Each corner or gate splits the run and can add one cut panel.'),
		array('How many posts does a vinyl fence need?', 'One more post than panels on each straight run, plus a post on each side of every gate. A straight 100 ft run of 6 ft panels needs 18 posts.'),
		array('Are 6 ft or 8 ft vinyl panels better?', '6 ft panels are stiffer and easier to fit to short runs. 8 ft panels need fewer posts but should have an aluminum stiffener in the bottom rail to stop sagging.'),
		array('How much concrete per vinyl fence post?', 'About two 50 lb bags per post for a 6 ft fence, in a 10 to 12 in hole about 30 in deep. Gate posts are often filled with concrete as well.'),
		array('Can you cut vinyl fence panels?', 'Yes. Cut the rails with a fine-tooth saw and re-drill the end of the bottom rail for the bracket or post routing. Plan the layout so cuts are not tiny slivers.'),
	),

	'shop' => array(
		array('label' => 'Vinyl privacy fence panels', 'q' => 'vinyl privacy fence panel 6 ft x 6 ft'),
		array('label' => 'Vinyl fence line posts', 'q' => 'vinyl fence line post 5x5'),
		array('label' => 'Vinyl fence corner and end posts', 'q' => 'vinyl fence corner post'),
		array('label' => 'Vinyl fence gate kit', 'q' => 'vinyl fence gate 4 ft'),
		array('label' => 'Vinyl post caps', 'q' => 'vinyl fence post cap 5x5'),
	),

	'sources' => array(
		array('Common Ground Alliance – Call 811 before you dig', 'https://call811.com/'),
		array('ASTM F964 – Standard specification for rigid PVC exterior profiles used for fencing', 'https://www.astm.org/f0964-13.html'),
	),
);
