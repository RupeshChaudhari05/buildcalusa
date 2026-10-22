<?php
defined('BASEPATH') OR exit('No direct script access allowed');

return array(
	'lead' => 'Work out how many gallons of paint a room takes, with doors and windows taken off, ceiling, trim and primer optional, and a price with or without a painter. A 12 × 14 bedroom needs about 2 gallons and a quart for two coats.',

	'howto' => array(
		'name'  => 'Getting a paint count in four steps',
		'time'  => 'PT2M',
		'steps' => array(
			array('Measure the room', 'Enter length, width and wall height. Count the doors and windows; standard sizes are taken off for you.'),
			array('Set coats and coverage', 'Two coats is normal. Use the coverage printed on the can, or 250 to 300 sq ft for new drywall or a big color change.'),
			array('Add ceiling, trim or primer', 'Turn on whatever else you are painting. Each gets its own product and price.'),
			array('Read the shopping list', 'The result rounds to gallons, quarts and 5-gallon buckets the way a paint counter sells them, with labor for your state if you are hiring out.'),
		),
	),

	'faqs' => array(
		array('How much paint do I need for a 12×12 room?', 'About <strong>2 gallons</strong> for two coats on the walls of a 12 × 12 ft room with 8 ft ceilings, one door and two windows (about 330 sq ft). Add half a gallon to a gallon of ceiling white if you are doing the ceiling.'),
		array('How many square feet does a gallon of paint cover?', 'About 350 to 400 sq ft per coat on smooth, previously painted walls. Plan on 250 to 300 sq ft on new drywall, textured walls or a dark-to-light color change.'),
		array('Do I need two coats of paint?', 'Yes, in most cases. One coat can work when you repaint the same color with a premium paint, but two coats give even color and sheen, especially with eggshell and satin.'),
		array('Is a 5-gallon bucket cheaper than gallons?', 'Yes. A 5-gallon bucket usually costs about what 4.5 single gallons would, so it pays once you need more than 4 gallons of one color. It also keeps the color consistent across the whole job.'),
		array('How much does it cost to paint a room?', 'About <strong>$900 to $1,100</strong> to have a painter do the walls of a 12 × 14 bedroom with two coats, using mid-grade paint. Doing it yourself costs around $100 to $150 in paint plus supplies.'),
	),

	'shop' => array(
		array('label' => 'Interior paint, eggshell, 1 gal', 'q' => 'interior paint eggshell 1 gallon'),
		array('label' => 'Interior paint, 5 gal bucket', 'q' => 'interior paint 5 gallon'),
		array('label' => 'Ceiling paint, flat white', 'q' => 'ceiling paint flat white 1 gallon'),
		array('label' => 'PVA drywall primer', 'q' => 'pva drywall primer'),
		array('label' => '9 in roller kit and tray', 'q' => '9 in paint roller kit'),
	),

	'sources' => array(
		array('Sherwin-Williams – Paint calculator and coverage guidance', 'https://www.sherwin-williams.com/homeowners/paint-calculator'),
		array('Benjamin Moore – How much paint do I need', 'https://www.benjaminmoore.com/en-us/paint-calculator'),
	),
);
