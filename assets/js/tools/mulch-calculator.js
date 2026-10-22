/* Mulch Calculator */
Calc(function (c) {
  var shape = c.val('shape') || 'rect';
  var beds = Math.max(1, Math.round(c.num('beds')));
  var area;
  if (shape === 'circle') area = Math.PI * Math.pow(c.num('diameter') / 2, 2);
  else if (shape === 'tri') area = c.num('tri_base') * c.num('tri_height') / 2;
  else area = c.num('length') * c.num('width');
  area *= beds;
  var depth = c.num('depth');

  if (!(area > 0) || !(depth > 0)) return { warn: ['Enter the bed size and depth.'] };

  var ft3 = area * depth / 12;
  var yd3 = ft3 / 27;
  var bags = Math.ceil(ft3 / 2 - 1e-9);
  var order = Math.max(1, Math.ceil(yd3 * 2 - 1e-9) / 2); // yards sell in ½ yd steps, 1 yd minimum
  var bulk = order * c.num('yd_price') + c.num('delivery');
  var bagCost = bags * c.num('bag_price');

  var ok = [], warn = [];
  if (bagCost <= bulk) ok.push('Bags are cheaper here: ' + c.money(bagCost) + ' for ' + c.n(bags) + ' bags vs. ' + c.money(bulk) + ' delivered.');
  else ok.push('Bulk saves ' + c.money(bagCost - bulk) + ' over ' + c.n(bags) + ' bags.');
  if (c.on('topup') && depth > 2) warn.push('For a top-up, 1–2 in over old mulch is usually enough. More than 3–4 in total can starve roots of air.');
  if (!c.on('topup') && depth > 4) warn.push('Over 4 in deep holds too much moisture against plants. 2–3 in is the usual target.');

  return {
    hero: [
      { label: 'Mulch needed', value: c.q(yd3, 'vol', 2), sub: c.q(area, 'area', 0) + ' at ' + c.q(depth, 'in', 1) },
      { label: '2 ft³ bags', value: c.n(bags), sub: c.money(bagCost) },
      { label: 'Bulk delivered', value: c.money(bulk), sub: 'order ' + c.n(order, 1) + ' yd³' }
    ],
    rows: [
      ['Area (' + beds + ' bed' + (beds > 1 ? 's' : '') + ')', c.q(area, 'area', 0)],
      ['Volume', c.q(ft3, 'cuft', 1)],
      ['Bulk mulch (' + c.n(order, 1) + ' yd³)', c.money(order * c.num('yd_price'))],
      ['Delivery', c.money(c.num('delivery'))],
      ['Bulk total', c.money(bulk), 'total'],
      ['Bagged total (' + c.n(bags) + ' × 2 ft³)', c.money(bagCost), 'sub'],
      ['Coverage of 1 yd³ at this depth', c.q(27 / (depth / 12), 'area', 0), 'sub']
    ],
    ok: ok,
    warn: warn,
    note: 'One cubic yard fills 13.5 bags of 2 ft³. Keep mulch 2–3 in away from tree trunks and house siding.'
  };
});
