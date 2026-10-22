/* Concrete Block (CMU) Calculator */
Calc(function (c) {
  var L = c.num('length'), H = c.num('height'), open = c.num('openings');
  var waste = Math.max(0, c.num('waste')) / 100;
  var core = parseFloat(c.opt('block').core) || 0;
  var fill = c.val('fill');

  if (L <= 0 || H <= 0) return { warn: ['Enter the wall length and height.'] };

  var face = Math.max(0, L * H - open);
  if (face <= 0) return { warn: ['Openings are larger than the wall.'] };

  // 8 x 16 in nominal face = 0.889 sq ft, so 1.125 blocks per sq ft
  var net = face * 1.125;
  var blocks = Math.ceil(net * (1 + waste));
  var mortar = Math.ceil(blocks / 13); // Quikrete Mortar Mix 80 lb: about 13 standard blocks per bag
  var courses = Math.ceil(H * 12 / 8 - 1e-9);
  var cols = Math.floor(L * 12 / 48) + 1;

  var groutFt3 = 0;
  if (core > 0 && fill === 'full') groutFt3 = net * core;
  if (core > 0 && fill === '48') groutFt3 = cols * courses * core / 2; // one of two cores per block
  groutFt3 *= 1.1;
  var groutBags = Math.ceil(groutFt3 / 0.6 - 1e-9);

  var rebarBars = fill !== 'none' && core > 0 ? cols : 0;
  var rebarFt = rebarBars * (H + 2); // 2 ft dowel lap into the footing
  var ladderRows = Math.floor(courses / 2);
  var ladderPieces = ladderRows * Math.ceil(L / 10);

  var blockCost = blocks * c.num('block_price');
  var mortarCost = mortar * c.num('mortar_price');
  var groutCost = groutBags * c.num('grout_price');
  var steelCost = rebarFt * c.fx(0.7) + ladderPieces * c.fx(6);
  var labor = c.on('diy') ? 0 : face * c.num('labor_price') * c.region();
  var total = blockCost + mortarCost + groutCost + steelCost + labor;

  var rows = [
    ['Blocks × ' + c.n(blocks), c.money(blockCost)],
    ['Mortar Mix 80 lb × ' + mortar, c.money(mortarCost)]
  ];
  if (groutBags) rows.push(['Core grout 80 lb × ' + groutBags, c.money(groutCost)]);
  if (steelCost) rows.push(['Rebar & ladder wire', c.money(steelCost)]);
  rows.push([c.on('diy') ? 'Labor (DIY)' : 'Labor – ' + c.regionName(), c.money(labor)]);
  rows.push(['Estimated total', c.money(total), 'total']);
  rows.push(['Wall face (net)', c.q(face, 'area', 0), 'sub']);
  rows.push(['Courses (8 in)', c.n(courses), 'sub']);
  if (groutFt3) rows.push(['Grout volume', c.q(groutFt3 / 27, 'vol', 2), 'sub']);
  if (rebarBars) rows.push(['Vertical #4 rebar', rebarBars + ' bars × ' + c.q(H + 2, 'len', 1), 'sub']);
  if (ladderPieces) rows.push(['Ladder reinforcement, 10 ft', c.n(ladderPieces) + ' (every 2nd course)', 'sub']);

  var warn = [];
  if (core === 0 && fill !== 'none') warn.push('4 in solid block has no cores to grout. Grout and rebar are left out.');

  return {
    hero: [
      { label: 'Estimated block wall cost', value: c.money(total), sub: 'Typical range ' + c.money(total * 0.85) + ' – ' + c.money(total * 1.15) },
      { label: 'Blocks', value: c.n(blocks), sub: '+' + Math.round(waste * 100) + '% waste' },
      { label: 'Mortar bags (80 lb)', value: c.n(mortar), sub: '≈ 13 blocks per bag' }
    ],
    rows: rows,
    warn: warn,
    note: 'Footing, lintels over openings and bond beams are extra. Rebar size and spacing for a load-bearing or retaining wall should come from your plans or an engineer.'
  };
});
