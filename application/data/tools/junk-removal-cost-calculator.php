<?php
defined('BASEPATH') OR exit('No direct script access allowed');

return array(
	'lead' => 'Price junk removal by truckload or by item, with stairs and same-day fees, and see what the same load costs in a dumpster you fill yourself. A half truckload runs about $425.',

	'howto' => array(
		'name'  => 'Pricing junk removal',
		'time'  => 'PT2M',
		'steps' => array(
			array('Pick a pricing mode', 'By truckload for piles and cleanouts, or single items for a couch, a fridge or a hot tub.'),
			array('Estimate the load', 'Choose how much of a 15 yd³ truck the pile fills, or enter how many of each item.'),
			array('Add access and timing', 'Enter flights of stairs and turn on same-day pickup if you need it.'),
			array('Compare with a dumpster', 'In truckload mode the result shows the dumpster you would rent for the same volume.'),
		),
	),

	'faqs' => array(
		array('How much does junk removal cost?', 'About <strong>$100 to $700</strong> in 2026. A minimum pickup is about $100, a half truckload about $425 and a full 15 yd³ truck about $700, including labor and dump fees.'),
		array('How much does it cost to remove a single couch?', 'About <strong>$100 to $150</strong> for one couch carried out from the ground floor. Expect about $25 more per flight of stairs.'),
		array('Is a dumpster cheaper than junk removal?', 'Yes, for big loads you can fill yourself. A 20 yard dumpster for a week costs about $450 and holds more than a full truck. For a one-day cleanout or heavy items upstairs, a crew is often worth the difference.'),
		array('Why does fridge removal cost more?', 'Usually <strong>$125 to $175</strong>, about $50 more than other appliances, because the refrigerant has to be recovered by a certified technician before the unit can be scrapped or landfilled.'),
		array('Do junk removal companies take concrete and dirt?', 'Yes, most do, but they charge more, often 30 to 50% above the normal load price, because heavy debris fills the truck\'s weight limit long before its volume.'),
	),

	'shop' => array(
		array('label' => 'Heavy-duty contractor bags', 'q' => 'contractor trash bags 42 gallon'),
		array('label' => 'Furniture moving straps', 'q' => 'furniture lifting straps'),
		array('label' => 'Hand truck / dolly', 'q' => 'convertible hand truck'),
	),

	'sources' => array(
		array('U.S. EPA – Responsible Appliance Disposal (refrigerant recovery)', 'https://www.epa.gov/rad'),
		array('U.S. EPA – Sustainable Management of Construction and Demolition Materials', 'https://www.epa.gov/smm/sustainable-management-construction-and-demolition-materials'),
	),
);
