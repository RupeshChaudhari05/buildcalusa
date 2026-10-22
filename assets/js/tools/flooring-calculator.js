/* Flooring Calculator */
Calc(function (c) {
  var L = c.num('length'), W = c.num('width'), extra = Math.max(0, c.num('extra'));
  var type = c.val('type'), t = c.opt('type'), waste = Math.max(0, c.num('waste')) / 100;
  var region = c.region(), diy = c.on('diy'), carpet = type === 'carpet';

  if (L <= 0 || W <= 0) return { warn: ['Enter the room length and width.'] };

  var room = L * W, area = room + extra;
  var buyArea, boxes = 0, sqyd = 0, unitLabel;

  if (carpet) {
    // Carpet comes off a 12 ft roll: you pay for whole strips, not just floor area
    // Try running the roll both ways and keep the layout with less offcut
    var rollArea = Math.min(Math.ceil(W / 12) * 12 * L, Math.ceil(L / 12) * 12 * W);
    buyArea = Math.max(area * (1 + waste), rollArea + extra * (1 + waste));
    sqyd = Math.ceil(buyArea / 9);
    buyArea = sqyd * 9;
    unitLabel = c.n(sqyd) + ' sq yd';
  } else {
    var box = c.num('box_size');
    if (box <= 0) return { warn: ['Enter the square feet per box from the carton.'] };
    boxes = Math.ceil(area * (1 + waste) / box);
    buyArea = boxes * box;
    unitLabel = c.n(boxes) + ' boxes';
  }

  var flooring = buyArea * c.num('mat_price');
  var rolls = c.on('underlay') ? Math.ceil(area * 1.05 / 100) : 0;
  var underlay = rolls * c.num('underlay_price');
  var perim = 2 * (L + W);
  var pieces = c.on('trim') ? Math.ceil(perim * 1.1 / 8) : 0;
  var trim = pieces * c.num('trim_price');
  var removal = c.on('removal') ? area * c.num('removal_price') * region : 0;
  var labor = diy ? 0 : area * c.num('labor_price') * region;
  var total = flooring + underlay + trim + removal + labor;

  var warn = [];
  if (t.pad === '1' && !c.on('underlay') && type !== 'solid') warn.push('Floating laminate and engineered floors need underlayment unless the planks have a pad attached. Turn it on above.');
  if (type === 'solid') warn.push('Solid hardwood goes down over a plywood subfloor with 15 lb felt or rosin paper, not foam underlayment. It cannot go over concrete.');

  var rows = [
    [(carpet ? 'Carpet + pad: ' : 'Flooring: ') + unitLabel + ' (' + c.q(buyArea, 'area', 0) + ')', c.money(flooring)]
  ];
  if (rolls) rows.push(['Underlayment × ' + rolls + ' rolls', c.money(underlay)]);
  if (pieces) rows.push(['Quarter round × ' + pieces + ' (8 ft)', c.money(trim)]);
  if (removal) rows.push(['Remove old floor', c.money(removal)]);
  rows.push([diy ? 'Labor (DIY)' : 'Install labor – ' + c.regionName(), c.money(labor)]);
  rows.push(['Estimated total', c.money(total), 'total']);
  rows.push(['Floor area', c.q(area, 'area', 0), 'sub']);
  rows.push(['Ordered incl. waste', c.q(buyArea, 'area', 0), 'sub']);
  rows.push(['Room perimeter', c.q(perim, 'len', 0), 'sub']);

  return {
    hero: [
      { label: carpet ? 'Carpet to order' : 'Boxes to order', value: unitLabel, sub: c.q(buyArea, 'area', 0) + ' incl. ' + c.n(waste * 100) + '% waste' },
      { label: 'Estimated total', value: c.money(total), sub: 'Range ' + c.money(total * 0.85) + ' – ' + c.money(total * 1.15) },
      { label: 'Installed cost', value: c.per(total / area, 'area'), sub: c.q(area, 'area', 0) + ' of floor' }
    ],
    rows: rows,
    warn: warn,
    note: 'Let planks sit in the room for 48 hours before installing. Transitions, stair nosing and leveling compound for dips over 3/16 in per 10 ft are extra.'
  };
});
