/* Tile Calculator */
Calc(function (c) {
  var area = c.num('length') * c.num('width') + Math.max(0, c.num('extra'));
  var tl = c.num('tile_l'), tw = c.num('tile_w'), j = Math.max(0, c.num('joint')), t = c.num('thick');
  var waste = Math.max(0, c.num('waste')) / 100, perBox = Math.max(1, Math.round(c.num('per_box')));

  if (area <= 0) return { warn: ['Enter the length and width of the area to tile.'] };
  if (tl <= 0 || tw <= 0) return { warn: ['Enter the tile length and width.'] };

  var tileSqft = tl * tw / 144;
  var laidSqft = (tl + j) * (tw + j) / 144; // one tile plus its share of grout joint
  var tiles = Math.ceil(area * (1 + waste) / laidSqft);
  var boxes = Math.ceil(tiles / perBox);
  var boughtSqft = boxes * perBox * tileSqft;

  // Grout: joint length per sq ft × joint width × depth × sanded grout density (0.067 lb/in³), +10%
  var groutLb = area * ((tl + tw) / (tl * tw)) * 144 * j * t * 0.067 * 1.1;
  var groutBags = Math.max(1, Math.ceil(groutLb / 25));

  // Thinset coverage per 50 lb bag depends on trowel notch (tile size)
  var big = Math.max(tl, tw), cover = big <= 12 ? 95 : big > 15 ? 50 : 70;
  var notch = big <= 12 ? '¼ × ⅜" notch' : big > 15 ? '½" notch' : '⅜ × ½" notch';
  var thinsetBags = Math.ceil(area / cover);

  var tileCost = boughtSqft * c.num('tile_price');
  var thinsetCost = thinsetBags * c.num('thinset_price');
  var groutCost = groutBags * c.num('grout_price');
  var labor = c.on('diy') ? 0 : area * c.num('labor_price') * c.region();
  var total = tileCost + thinsetCost + groutCost + labor;

  var warn = [];
  if (big >= 15 && j < 0.125) warn.push('Large-format tile usually needs at least a ⅛" (3 mm) joint. Check the manufacturer\'s recommendation.');
  if (c.val('layout') === 'herringbone' && waste < 0.15) warn.push('Herringbone layouts typically need 15–20% waste.');

  return {
    hero: [
      { label: 'Estimated tile project cost', value: c.money(total), sub: 'Typical range ' + c.money(total * 0.85) + ' – ' + c.money(total * 1.15) },
      { label: 'Tiles needed', value: c.n(tiles), sub: '+' + c.n(waste * 100) + '% waste' },
      { label: 'Boxes', value: c.n(boxes), sub: perBox + ' tiles · ' + c.q(perBox * tileSqft, 'area', 1) + ' per box' },
      { label: 'Grout', value: c.q(groutLb, 'lb', 1), sub: groutBags + ' × 25 lb bag' },
      { label: 'Area', value: c.q(area, 'area', 1), sub: 'Cost ' + c.per(total / area, 'area') }
    ],
    rows: [
      ['Tile (' + c.q(boughtSqft, 'area', 1) + ' in ' + boxes + ' boxes)', c.money(tileCost)],
      ['Thinset × ' + thinsetBags + ' (50 lb, ' + notch + ')', c.money(thinsetCost)],
      ['Grout × ' + groutBags + ' (25 lb sanded)', c.money(groutCost)],
      [c.on('diy') ? 'Labor (DIY)' : 'Labor – ' + c.regionName(), c.money(labor)],
      ['Estimated total', c.money(total), 'total'],
      ['Tile size', c.q(tl, 'in', 1) + ' × ' + c.q(tw, 'in', 1), 'sub'],
      ['Coverage per tile (incl. joint)', c.q(laidSqft, 'area', 2), 'sub'],
      ['Grout joint', c.q(j, 'in', 3), 'sub']
    ],
    warn: warn,
    note: 'Buy all boxes from the same lot number, and keep one spare box for future repairs. Backer board, membrane, trim and underlayment are not included.'
  };
});
