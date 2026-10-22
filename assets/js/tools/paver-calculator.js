/* Paver Calculator */
Calc(function (c) {
  var L = c.num('length'), W = c.num('width');
  var area = L * W + Math.max(0, c.num('extra_area'));
  var pl = c.num('paver_l'), pw = c.num('paver_w');
  var waste = Math.max(0, c.num('waste')) / 100;

  if (!(area > 0)) return { warn: ['Enter the patio size.'] };
  if (!(pl > 0 && pw > 0)) return { warn: ['Enter the paver length and width.'] };

  var paverSqft = pl * pw / 144;
  var pavers = Math.ceil(area * (1 + waste) / paverSqft);
  var paverCost = pavers * c.num('paver_price');

  // Base: +15% for compaction; bedding sand 1 in, +10%
  var baseYd = area * c.num('base_depth') / 12 / 27 * 1.15;
  var baseTons = baseYd * 1.5;
  var sandYd = area * (1 / 12) / 27 * 1.1;
  var sandTons = sandYd * 1.35;
  var sandBags = Math.ceil(sandYd * 27 / 0.5);
  var poly = Math.ceil(area / 75);
  var edgeFt = c.num('edge_ft') > 0 ? c.num('edge_ft') : 2 * (L + W);
  var edgePcs = Math.ceil(edgeFt / 8);

  var baseCost = baseTons * c.num('base_price');
  var sandCost = sandTons * c.num('sand_price');
  var polyCost = poly * c.num('poly_price');
  var edgeCost = edgePcs * c.num('edge_price');
  var labor = c.on('diy') ? 0 : area * c.num('labor_price') * c.region();
  var materials = paverCost + baseCost + sandCost + polyCost + edgeCost;
  var total = materials + labor;

  var warn = [];
  if (c.num('base_depth') < 4) warn.push('Less than 4 in of base usually heaves or settles within a few winters.');

  return {
    hero: [
      { label: 'Estimated patio cost', value: c.money(total), sub: c.per(total / area, 'area') + (c.on('diy') ? ' (DIY)' : ' installed') },
      { label: 'Pavers', value: c.n(pavers), sub: 'incl. ' + Math.round(waste * 100) + '% for cuts' },
      { label: 'Gravel base', value: c.q(baseTons, 'ton', 1), sub: c.q(baseYd, 'vol', 2) }
    ],
    rows: [
      ['Pavers × ' + c.n(pavers), c.money(paverCost)],
      ['Crushed base (' + c.q(c.num('base_depth'), 'in', 0) + ' deep)', c.money(baseCost)],
      ['Bedding sand (1 in): ' + c.q(sandTons, 'ton', 1), c.money(sandCost)],
      ['Polymeric sand × ' + poly, c.money(polyCost)],
      ['Edge restraint × ' + edgePcs + ' (' + c.q(edgeFt, 'len', 0) + ')', c.money(edgeCost)],
      ['Materials subtotal', c.money(materials), 'sub'],
      [c.on('diy') ? 'Labor (DIY)' : 'Labor – ' + c.regionName(), c.money(labor)],
      ['Estimated total', c.money(total), 'total'],
      ['Patio area', c.q(area, 'area', 0), 'sub'],
      ['Bedding sand in 0.5 ft³ bags', c.n(sandBags), 'sub']
    ],
    warn: warn,
    note: 'Excavation spoil removal, steps, seat walls and sealing are extra. Dig out base depth + 1 in of sand + paver thickness.'
  };
});
