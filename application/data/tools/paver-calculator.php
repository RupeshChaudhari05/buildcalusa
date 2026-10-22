<?php
defined('BASEPATH') OR exit('No direct script access allowed');

return array(
	'lead' => 'Get the full material list for a paver patio or walkway: paver count with cut waste, tons of crushed base, bedding sand, polymeric sand and edging, plus an installed price for your state.',

	'howto' => array(
		'name'  => 'How to use the paver calculator',
		'time'  => 'PT2M',
		'steps' => array(
			array('Measure the patio', 'Enter length and width. Add any steps or odd-shaped bits as extra square feet.'),
			array('Choose the paver and pattern', 'Pick a paver size and laying pattern. Herringbone and circles need more cuts, so the waste goes up.'),
			array('Set the base depth', 'Use 4 in for patios and walks, and 6–8 in for driveways or clay soil.'),
			array('Check prices and labor', 'Enter your supplier\'s prices and your state, or turn on DIY to see materials only.'),
		),
	),

	'faqs' => array(
		array('How many pavers do I need for a 12 × 12 patio?', 'About <strong>404</strong> pavers of 6 × 9 in, including 5% for cuts (144 sq ft ÷ 0.375 sq ft each, plus 5%). With 12 × 12 in pavers you need about 152.'),
		array('How much does a paver patio cost per square foot?', 'Typically $15–$25 per sq ft installed in 2026, and $4–$6 per sq ft in materials if you do it yourself. Concrete pavers on a simple rectangle are at the low end, and natural stone with curves is at the top.'),
		array('How much base do I need under pavers?', '4 in of compacted crushed stone for patios and walks, and 6–8 in for driveways. That is about 2.1 tons per 100 sq ft at 4 in, after compaction.'),
		array('How much sand goes under pavers?', '1 in of coarse bedding sand: about 0.45 tons per 100 sq ft. Polymeric sand for the joints is extra, roughly one 50 lb bag per 75 sq ft for standard pavers.'),
		array('Is it cheaper to pour concrete or lay pavers?', 'Yes, a plain concrete slab usually costs less up front ($8–$12 per sq ft against $15–$25 for pavers). Pavers flex with frost and can be lifted and relaid for repairs, so they often cost less over 20 years.'),
	),

	'shop' => array(
		array('label' => 'Concrete patio pavers', 'q' => 'concrete patio pavers'),
		array('label' => 'All-purpose paver base', 'q' => 'paver base 0.5 cu ft'),
		array('label' => 'Paver leveling sand', 'q' => 'paver leveling sand'),
		array('label' => 'Polymeric sand 50 lb', 'q' => 'polymeric sand 50 lb'),
		array('label' => 'Paver edge restraint', 'q' => 'paver edging restraint'),
	),

	'sources' => array(
		array('Interlocking Concrete Pavement Institute (ICPI) – Tech Spec 2: Construction of Interlocking Concrete Pavements', 'https://icpi.org/tech-specs'),
	),
);
