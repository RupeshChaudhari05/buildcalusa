/* Fence Cost Calculator */
Calc(function (c) {
  var L = c.num('length'), spacing = Math.max(c.num('spacing'), 1);
  var gates = Math.max(0, Math.round(c.num('gates')));
  var h = c.opt('height'), m = c.opt('material');
  var heightFt = parseFloat(c.val('height'));
  var region = c.region(), terrain = parseFloat(c.val('terrain')) || 1;

  if (L <= 0) return { warn: ['Enter the total fence length.'] };

  var material = L * c.num('mat_price') * parseFloat(h.m);
  var gateCost = gates * c.num('gate_price');
  var labor = c.on('diy') ? 0 : L * c.num('labor_price') * parseFloat(h.l) * terrain * region;
  var removal = c.on('removal') ? L * c.num('removal_price') * region : 0;
  var total = material + gateCost + labor + removal;

  // Material take-off
  var sections = Math.ceil(L / spacing);
  var posts = sections + 1 + gates;
  var rails = m.kind === 'wood' ? sections * (heightFt >= 6 ? 3 : 2) : 0;
  var pickets = m.kind === 'wood' ? Math.ceil(L * 12 / 5.5 * 1.05) : 0;
  var bags = posts * (heightFt >= 6 ? 2 : 1.5);

  var rows = [
    ['Materials (' + c.optText('material').split(' – ')[0] + ', ' + heightFt + ' ft)', c.money(material)],
    ['Gates × ' + gates, c.money(gateCost)],
    [c.on('diy') ? 'Labor (DIY)' : 'Labor – ' + c.regionName(), c.money(labor)]
  ];
  if (removal) rows.push(['Old fence removal', c.money(removal)]);
  rows.push(['Estimated total', c.money(total), 'total']);
  rows.push(['Posts (incl. gate posts)', c.n(posts), 'sub']);
  if (rails) rows.push(['Rails (2×4, ' + c.q(spacing, 'len', 0) + ')', c.n(rails), 'sub']);
  if (pickets) rows.push(['Pickets (5½" wide, +5%)', c.n(pickets), 'sub']);
  rows.push(['Concrete for posts (50 lb bags)', c.n(Math.ceil(bags)), 'sub']);

  return {
    hero: [
      { label: 'Estimated fence cost', value: c.money(total), sub: 'Typical range ' + c.money(total * 0.85) + ' – ' + c.money(total * 1.15) },
      { label: 'Cost per ' + c.unit('len'), value: c.per(total / L, 'len') },
      { label: 'Fence length', value: c.q(L, 'len', 0), sub: 'Lifespan ' + m.life }
    ],
    rows: rows,
    note: 'Add 10–20% for permits, surveys, steep grades or premium hardware. Always call 811 before you dig post holes.'
  };
});
