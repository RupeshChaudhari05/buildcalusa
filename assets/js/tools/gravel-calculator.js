/* Gravel Calculator */
Calc(function (c) {
  var shape = c.val('shape') || 'rect';
  var area = shape === 'circle'
    ? Math.PI * Math.pow(c.num('diameter') / 2, 2)
    : c.num('length') * c.num('width');
  var depth = c.num('depth');
  var extra = Math.max(0, c.num('extra')) / 100;
  var density = c.num('density');

  if (!(area > 0) || !(depth > 0)) return { warn: ['Enter the area and depth.'] };

  var ft3 = area * depth / 12;
  var yd3 = ft3 / 27 * (1 + extra);
  var tons = yd3 * density;
  var bags = Math.ceil(yd3 * 27 / 0.5 - 1e-9);
  var stone = tons * c.num('ton_price');
  var bulk = stone + c.num('delivery');
  var bagCost = bags * c.num('bag_price');
  var trucks = Math.max(1, Math.ceil(tons / 15));

  var ok = [], warn = [];
  if (bagCost < bulk) ok.push('Bags are cheaper for a job this small: ' + c.n(bags) + ' bags vs. ' + c.money(bulk) + ' delivered.');
  else ok.push('Bulk delivery saves ' + c.money(bagCost - bulk) + ' over bags (and ' + c.n(bags) + ' trips to the car).');
  if (tons > 15) warn.push('More than one tandem load. Ask whether the yard has a tri-axle (about 20 tons) to save a delivery fee.');

  return {
    hero: [
      { label: 'Gravel needed', value: c.q(tons, 'ton', 2), sub: c.q(yd3, 'vol', 2) + ' incl. ' + Math.round(extra * 100) + '% extra' },
      { label: 'Bulk cost', value: c.money(bulk), sub: 'incl. delivery' },
      { label: '0.5 ft³ bags', value: c.n(bags), sub: c.money(bagCost) }
    ],
    rows: [
      ['Area covered', c.q(area, 'area', 0)],
      ['Depth', c.q(depth, 'in', 1)],
      ['Volume (before extra)', c.q(ft3 / 27, 'vol', 2)],
      ['Stone (' + c.optText('material') + ')', c.money(stone)],
      ['Delivery', c.money(c.num('delivery'))],
      ['Bulk total', c.money(bulk), 'total'],
      ['Bagged total (' + c.n(bags) + ' bags)', c.money(bagCost), 'sub'],
      ['Cost per ' + c.unit('area'), c.per(bulk / area, 'area'), 'sub'],
      ['Truckloads (~15 tons each)', c.n(trucks), 'sub']
    ],
    ok: ok,
    warn: warn,
    note: 'Weights are for dry stone. Wet stone weighs 5–10% more, which matters if the yard sells by scale weight.'
  };
});
