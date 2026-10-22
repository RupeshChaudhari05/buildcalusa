/* Bathroom Remodel Cost Calculator */
Calc(function (c) {
  var area = c.num('area'), wet = parseFloat(c.val('wet')) || 0, region = c.region();
  if (area <= 0) return { warn: ['Enter the bathroom floor area.'] };

  var demo = area * c.num('demo_sqft') * region;
  var tile = area * c.num('tile_sqft');
  var drywall = area * c.num('drywall_sqft');
  var labor = area * c.num('labor_sqft') * region;
  var shower = c.num('shower') * wet;
  var plumbing = c.num('plumbing') * region;
  var extras = 0, extraRows = [];
  if (c.on('move_plumbing')) { var mp = c.fx(2500) * region; extras += mp; extraRows.push(['Relocate plumbing', c.money(mp)]); }
  if (c.on('convert')) { var cv = c.fx(3000); extras += cv; extraRows.push(['Tub-to-shower conversion', c.money(cv)]); }
  if (c.on('heated')) { var hf = c.fx(15) * area; extras += hf; extraRows.push(['Heated floor', c.money(hf)]); }

  var items = [
    ['Demolition & haul-off', demo],
    ['Floor tile, installed', tile],
    ['Tub / shower & surround', shower],
    ['Vanity & top', c.num('vanity')],
    ['Toilet', c.num('toilet')],
    ['Faucets, valve, accessories', c.num('fixtures')],
    ['Lighting, fan, electrical', c.num('lighting')],
    ['Drywall, prep & paint', drywall],
    ['Plumbing labor', plumbing],
    ['General labor – ' + c.regionName(), labor]
  ];
  var subtotal = extras;
  items.forEach(function (i) { subtotal += i[1]; });
  var contingency = subtotal * Math.max(0, c.num('contingency')) / 100;
  var total = subtotal + contingency;

  var rows = items.filter(function (i) { return i[1] > 0; }).map(function (i) { return [i[0], c.money(i[1])]; });
  rows = rows.concat(extraRows);
  rows.push(['Subtotal', c.money(subtotal), 'sub']);
  rows.push(['Contingency (' + c.n(c.num('contingency')) + '%)', c.money(contingency)]);
  rows.push(['Estimated total', c.money(total), 'total']);

  var warn = [];
  if (wet === 0 && c.num('area') > 0 && c.val('preset') !== 'half') warn.push('Tub / shower is set to none, so no shower cost is included.');
  if (c.num('contingency') < 10) warn.push('Older homes often hide rot under the toilet or galvanized pipe in the walls. Keep at least 10% contingency.');

  return {
    hero: [
      { label: 'Estimated remodel cost', value: c.money(total), sub: 'Typical range ' + c.money(total * 0.85) + ' – ' + c.money(total * 1.15) },
      { label: 'Cost per ' + c.unit('area'), value: c.per(total / area, 'area') },
      { label: 'Finish level', value: c.optText('finish').split(' – ')[0], sub: c.q(area, 'area', 0) }
    ],
    rows: rows,
    warn: warn,
    note: 'Allowances include installation unless they are labor lines. Permits, design fees and moving walls are extra.'
  };
});
