<?php
defined('BASEPATH') OR exit('No direct script access allowed');

return array(
	'no_units' => TRUE,

	'lead' => 'Turn job cost, overhead and the profit you want into a bid price, and see the markup and margin side by side. The default $37,000 job bids at $47,278 for a 10% net margin.',

	'howto' => array(
		'name'  => 'Pricing a bid',
		'time'  => 'PT2M',
		'steps' => array(
			array('Enter direct costs', 'Fill in materials, labor with payroll burden, subcontractors and equipment or permits for this job.'),
			array('Set overhead', 'Enter overhead as a percentage of direct cost: your yearly overhead divided by your yearly direct job cost.'),
			array('Choose margin or markup', 'Price the profit as a net margin on the selling price or as a markup on cost, and enter the percentage.'),
			array('Check the bid', 'Read the bid price, break-even and profit. Copy or print the breakdown for your estimate file.'),
		),
	),

	'faqs' => array(
		array('What is a good markup for a contractor?', 'Most residential remodelers mark up <strong>25 to 50% on direct job cost</strong>, which covers overhead and leaves roughly 8 to 12% net profit. Large new-construction jobs often run 10 to 20%, and service work 50% or more.'),
		array('What is the difference between markup and margin?', 'Markup is profit divided by cost, and margin is profit divided by the selling price. A 25% markup is a 20% margin. Margin is always the smaller number.'),
		array('Is 10% overhead and 10% profit a 20% markup?', 'No. Applied in sequence it is 1.10 × 1.10 = <strong>21% markup</strong>, which is a 17.4% gross margin, not 20%.'),
		array('How do I calculate a bid from a target margin?', 'Divide your break-even cost by (1 − margin). With a $42,550 break-even and a 10% net margin: $42,550 ÷ 0.90 = <strong>$47,278</strong>.'),
		array('How do I figure my overhead percentage?', 'Divide a year of overhead by a year of direct job cost. $120,000 of overhead on $800,000 of direct cost is 15%. Recheck it every year, because overhead grows faster than most owners expect.'),
	),

	'sources' => array(
		array('U.S. Small Business Administration – Manage your finances', 'https://www.sba.gov/business-guide/manage-your-business/manage-your-finances'),
	),
);
