/* Drywall Calculator */
Calc(function (c) {
  var L = c.num('length'), W = c.num('width'), H = c.num('height');
  var doors = Math.max(0, Math.round(c.num('doors'))), windows = Math.max(0, Math.round(c.num('windows')));
  var sheetArea = parseFloat(c.val('sheet')) || 32, waste = Math.max(0, c.num('waste')) / 100;

  if (L <= 0 || W <= 0 || H <= 0) return { warn: ['Enter the room length, width and wall height.'] };

  var walls = 2 * (L + W) * H;
  var ceiling = c.on('ceiling') ? L * W : 0;
  var openings = doors * 21 + windows * 15;
  var net = Math.max(0, walls + ceiling - openings);
  if (!net) return { warn: ['Doors and windows cover the whole wall area.'] };

  var sheets = Math.ceil(net * (1 + waste) / sheetArea);
  var mudLb = net * 0.138, buckets = Math.max(1, Math.ceil(mudLb / 61.7));
  var tapeFt = net * 0.37, rolls = Math.max(1, Math.ceil(tapeFt / 250));
  var screws = Math.ceil(sheets * sheetArea), screwLb = screws / 320, boxes = Math.max(1, Math.ceil(screwLb / 5));

  var sheetCost = sheets * c.num('sheet_price');
  var mudCost = buckets * c.num('mud_price');
  var tapeCost = rolls * c.num('tape_price');
  var screwCost = boxes * c.num('screw_price');
  var materials = sheetCost + mudCost + tapeCost + screwCost;
  var labor = c.on('diy') ? 0 : net * c.num('labor_price') * c.region();
  var total = materials + labor;

  return {
    hero: [
      { label: 'Estimated drywall cost', value: c.money(total), sub: 'Typical range ' + c.money(total * 0.85) + ' – ' + c.money(total * 1.15) },
      { label: 'Sheets needed', value: c.n(sheets), sub: c.optText('sheet').split(' (')[0] + ', +' + c.n(waste * 100) + '% waste' },
      { label: 'Drywall area', value: c.q(net, 'area', 0), sub: 'Cost ' + c.per(total / net, 'area') }
    ],
    rows: [
      ['Drywall sheets × ' + sheets, c.money(sheetCost)],
      ['Joint compound × ' + buckets + ' (4.5 gal)', c.money(mudCost)],
      ['Paper tape × ' + rolls + ' (250 ft rolls)', c.money(tapeCost)],
      ['Screws × ' + boxes + ' (5 lb boxes)', c.money(screwCost)],
      ['Materials subtotal', c.money(materials)],
      [c.on('diy') ? 'Labor (DIY)' : 'Labor – ' + c.regionName(), c.money(labor)],
      ['Estimated total', c.money(total), 'total'],
      ['Wall area', c.q(walls, 'area', 0), 'sub'],
      ['Ceiling area', c.q(ceiling, 'area', 0), 'sub'],
      ['Doors & windows deducted', '−' + c.q(openings, 'area', 0), 'sub'],
      ['Joint compound', c.q(mudLb, 'lb', 0), 'sub'],
      ['Tape', c.q(tapeFt, 'len', 0), 'sub'],
      ['Screws (1¼")', '≈ ' + c.n(screws), 'sub']
    ],
    note: 'Use ⅝" Type X where code requires fire-rated assemblies (garage walls shared with the house), and moisture-resistant board in bathrooms. Add corner bead for outside corners.'
  };
});
