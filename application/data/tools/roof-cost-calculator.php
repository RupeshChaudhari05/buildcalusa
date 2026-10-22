<?php
defined('BASEPATH') OR exit('No direct script access allowed');

return array(
	'lead' => 'Installed roof replacement cost from the footprint and pitch, with tear-off, decking and permit, compared across nine materials. A 50 × 30 ft house at 6/12 runs about $12,700 in architectural shingles and $26,600 in standing seam metal.',

	'howto' => array(
		'name'  => 'Pricing a roof replacement',
		'time'  => 'PT3M',
		'steps' => array(
			array('Measure the footprint', 'Measure the house length and width at the drip line, including the overhangs.'),
			array('Set pitch, shape and stories', 'Pick the pitch, gable, hip or complex roof, and the number of stories.'),
			array('Choose a material', 'Pick the roof you want. Its typical installed price per square fills in, and you can overwrite it with a quote.'),
			array('Add tear-off and decking', 'Choose how many old layers come off and what share of the decking needs replacing.'),
			array('Compare materials', 'Read the total, then check the list under it to see the same roof in every other material.'),
		),
	),

	'faqs' => array(
		array('How much does a metal roof cost?', 'About <strong>$8 to $13 per sq ft installed</strong>: $8 for exposed-fastener panels and around $13 for standing seam. On a 1,677 sq ft roof with tear-off, that is roughly $17,300 to $26,600.'),
		array('How much does it cost to replace a roof in 2026?', 'About <strong>$12,700</strong> for a typical 18 to 19 square roof in architectural shingles, including tear-off, some decking and a permit. Most homes land between $10,000 and $16,000 in asphalt.'),
		array('Is a metal roof worth it over shingles?', 'Often, yes, if you plan to stay. Standing seam costs about twice as much as architectural shingles but can last two to three times longer, and it sheds snow and handles high wind better.'),
		array('How much does it cost to tear off a roof?', 'About <strong>$100 per square</strong> for one layer of shingles, including disposal, and about $50 a square more for a second layer. Most codes allow no more than two layers on a roof.'),
		array('How much is a roof per square?', 'For architectural shingles, about <strong>$550 per square installed</strong> ($5.50 per sq ft) before tear-off. Metal runs $800 to $1,300 per square, and slate $2,000 or more.'),
	),

	'shop' => array(
		array('label' => 'Standing seam metal roofing panels', 'q' => 'standing seam metal roofing panel'),
		array('label' => 'Corrugated metal roof panels', 'q' => 'corrugated metal roofing panel'),
		array('label' => 'Architectural asphalt shingles', 'q' => 'architectural shingles bundle'),
		array('label' => 'Ice and water shield', 'q' => 'ice and water shield roll'),
		array('label' => 'Roof sheathing plywood 4×8', 'q' => 'roof sheathing osb 7/16 4x8'),
	),

	'sources' => array(
		array('Metal Roofing Alliance – residential metal roofing', 'https://metalroofing.com/'),
		array('National Roofing Contractors Association (NRCA)', 'https://www.nrca.net/'),
		array('International Residential Code, Chapter 9 – Roof Assemblies', 'https://codes.iccsafe.org/content/IRC2021P2/chapter-9-roof-assemblies'),
	),
);
