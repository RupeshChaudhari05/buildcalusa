/* Asphalt Calculator */
Calc(function (c) {
  var L = c.num('length'), W = c.num('width');
  var t = c.num('thickness'), density = c.num('density') || 145;
  var waste = Math.max(c.num('waste'), 0) / 100;

  if (L <= 0 || W <= 0 || t <= 0) return { warn: ['Enter the length, width and thickness.'] };

  var area = L * W;
  var cuft = area * t / 12;
  var tons = cuft * density / 2000 * (1 + waste);
  var yards = cuft / 27;
  var trucks = Math.ceil(tons / 20);
  var asphalt = tons * c.num('ton_price');

  var baseOn = c.on('base');
  var baseTons = baseOn ? area * c.num('base_depth') / 12 * 100 / 2000 * (1 + waste) : 0;
  var baseCost = baseTons * c.num('base_price');

  var labor = c.on('diy') ? 0 : area * c.num('labor_price') * c.region();
  var total = asphalt + baseCost + labor;

  var warn = [];
  if (t < 2) warn.push('Under 2" of compacted asphalt tends to crack quickly; 2–3" is the residential minimum.');
  if (baseOn && c.num('base_depth') < 4) warn.push('A base under 4" of compacted stone is usually too thin for vehicle traffic.');

  var rows = [
    ['Hot mix asphalt: ' + c.q(tons, 'ton', 1), c.money(asphalt)]
  ];
  if (baseOn) rows.push(['Gravel base: ' + c.q(baseTons, 'ton', 1), c.money(baseCost)]);
  rows.push([c.on('diy') ? 'Labor (material only)' : 'Paving labor – ' + c.regionName(), c.money(labor)]);
  rows.push(['Estimated total', c.money(total), 'total']);
  rows.push(['Paved area', c.q(area, 'area', 0), 'sub']);
  rows.push(['Asphalt volume (compacted)', c.q(yards, 'vol', 2), 'sub']);
  rows.push(['Truckloads (~20 tons each)', c.n(trucks), 'sub']);

  return {
    hero: [
      { label: 'Asphalt needed', value: c.q(tons, 'ton', 1), sub: 'Includes ' + c.n(waste * 100) + '% waste & compaction' },
      { label: 'Total cost', value: c.money(total) },
      { label: 'Cost per ' + c.unit('area'), value: c.per(total / area, 'area') }
    ],
    rows: rows,
    warn: warn,
    note: 'Excavation, removing an old driveway, drainage work and sealcoating are extra. Most plants charge a minimum (small-load) fee for orders under about 5 tons.'
  };
});
