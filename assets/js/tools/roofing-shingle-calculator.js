/* Roofing Shingle Calculator */
Calc(function (c) {
  var L = c.num('length'), W = c.num('width');
  var pitch = parseFloat(c.val('pitch')) || 0;
  var mult = Math.sqrt(1 + Math.pow(pitch / 12, 2));
  var style = c.val('style'), waste = Math.max(0, c.num('waste')) / 100;
  var region = c.region(), ul = c.opt('underlay');

  if (L <= 0 || W <= 0) return { warn: ['Enter the roof length and width.'] };

  var area = L * W * mult;                       // sq ft of roof surface
  var squares = area * (1 + waste) / 100;
  var bundles = Math.ceil(squares * 3);
  var rolls = Math.ceil(area * 1.1 / 100 / (parseFloat(ul.sq) || 10));

  var ridge = style === 'gable' ? L : L + W * 1.4; // ridge + hips (approx.)
  var eaves = style === 'gable' ? 2 * L : 2 * (L + W);
  var perimeter = 2 * (L + W);
  var ridgeBundles = Math.ceil(ridge / 33);
  var starterBundles = Math.ceil(eaves / 105);
  var drip = Math.ceil(perimeter / 10 * 1.05);
  var nails = squares * 320, nailBoxes = Math.ceil(nails / 7200);

  var shingles = bundles * c.num('bundle_price');
  var underlay = rolls * c.num('underlay_price');
  var accessories = ridgeBundles * c.fx(65) + starterBundles * c.fx(45) + drip * c.fx(12) + nailBoxes * c.fx(85);
  var labor = c.on('diy') ? 0 : squares * c.num('labor_price') * region;
  var tear = c.on('tearoff') ? area / 100 * c.num('tearoff_price') * region : 0;
  var total = shingles + underlay + accessories + labor + tear;

  var rows = [
    ['Shingles (' + c.n(bundles) + ' bundles)', c.money(shingles)],
    ['Underlayment (' + c.n(rolls) + ' rolls)', c.money(underlay)],
    ['Ridge cap, starter, drip edge, nails', c.money(accessories)],
    [c.on('diy') ? 'Labor (DIY)' : 'Labor – ' + c.regionName(), c.money(labor)]
  ];
  if (tear) rows.push(['Tear-off & disposal', c.money(tear)]);
  rows.push(['Estimated total', c.money(total), 'total']);
  rows.push(['Pitch multiplier (' + pitch + '/12)', '× ' + mult.toFixed(3), 'sub']);
  rows.push(['Ridge cap bundles (~33 lf each)', c.n(ridgeBundles), 'sub']);
  rows.push(['Starter strip bundles (~105 lf each)', c.n(starterBundles), 'sub']);
  rows.push(['Drip edge (10 ft pieces)', c.n(drip), 'sub']);
  rows.push(['Coil nails (~320 per square)', c.n(Math.ceil(nails / 100) * 100) + ' (' + nailBoxes + ' box' + (nailBoxes > 1 ? 'es' : '') + ')', 'sub']);

  var warn = [];
  if (pitch < 2) warn.push('Asphalt shingles need at least 2/12 pitch. Use a low-slope membrane roof instead.');
  else if (pitch < 4) warn.push('Pitches from 2/12 to 4/12 need a double layer of underlayment (per most manufacturers and the IRC).');
  if (pitch >= 9) warn.push('Steep roofs (9/12+) often add 20–50% to labor for safety equipment.');

  return {
    hero: [
      { label: 'Estimated roof cost', value: c.money(total), sub: 'Typical range ' + c.money(total * 0.85) + ' – ' + c.money(total * 1.2) },
      { label: 'Roofing squares', value: c.n(squares, 1), sub: 'incl. ' + Math.round(waste * 100) + '% waste' },
      { label: 'Shingle bundles', value: c.n(bundles), sub: '3 bundles per square' },
      { label: 'Roof area', value: c.q(area, 'area', 0), sub: 'before waste' }
    ],
    rows: rows,
    warn: warn,
    note: 'Add for skylights, chimneys, valleys, ice-and-water shield in cold climates, and any rotten decking ($70–$120 per sheet).'
  };
});
