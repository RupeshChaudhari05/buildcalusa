/* Junk Removal Cost Calculator */
Calc(function (c) {
  // USD per item (same figures shown under each field)
  var ITEMS = [
    ['mattress', 'Mattress or box spring', 90],
    ['couch', 'Couch or sofa', 125],
    ['fridge', 'Fridge or freezer', 150],
    ['washer', 'Washer or dryer', 90],
    ['tv', 'TV', 75],
    ['piano', 'Upright piano', 350],
    ['hottub', 'Hot tub', 450]
  ];
  var region = c.region();
  var truck = c.val('mode') !== 'items';
  var rows = [], base = 0, yd = 0;

  if (truck) {
    yd = parseFloat(c.opt('load').yd) || 0;
    base = c.num('load_price');
    if (c.on('heavy')) base *= 1.4;
    rows.push([c.optText('load') + (c.on('heavy') ? ', heavy debris (+40%)' : ''), c.money(base * region)]);
  } else {
    ITEMS.forEach(function (it) {
      var n = Math.max(0, Math.round(c.num(it[0])));
      if (!n) return;
      var cost = n * c.fx(it[2]);
      base += cost;
      rows.push([it[1] + ' × ' + n, c.money(cost * region)]);
    });
    if (!base) return { warn: ['Enter at least one item, or switch to pricing by truckload.'] };
  }

  var loadCost = base * region;
  var flights = Math.max(0, Math.round(c.num('flights')));
  var stairs = flights * c.num('flight_price') * region;
  var sameday = c.on('sameday') ? c.fx(50) : 0;
  var total = loadCost + stairs + sameday;

  if (stairs) rows.push(['Stairs, ' + flights + ' flight' + (flights === 1 ? '' : 's'), c.money(stairs)]);
  if (sameday) rows.push(['Same-day pickup', c.money(sameday)]);
  rows.push(['Estimated total', c.money(total), 'total']);
  rows.push(['Prices for', c.regionName(), 'sub']);

  var hero = [{ label: 'Estimated junk removal cost', value: c.money(total), sub: 'Typical range ' + c.money(total * 0.85) + ' – ' + c.money(total * 1.15) }];
  var ok = [], note;

  if (truck && yd) {
    // The dumpster you'd rent and load yourself for the same volume
    var dSize = yd <= 10 ? 10 : yd <= 15 ? 15 : 20;
    var dumpster = c.fx({ 10: 350, 15: 400, 20: 450 }[dSize]) * region;
    hero.push({ label: 'Cost per yd³', value: c.money(total / yd, 2), sub: c.n(yd, 1) + ' yd³ hauled' });
    hero.push({ label: dSize + ' yd dumpster instead', value: c.money(dumpster), sub: 'You do the loading' });
    rows.push(['Same volume in a ' + dSize + ' yd dumpster (7 days)', c.money(dumpster), 'sub']);
    if (dumpster < total * 0.8) ok.push('A dumpster saves about ' + c.money(total - dumpster) + ' if you have the time and the hands to load it.');
    else ok.push('For this amount, a junk crew costs about the same as a dumpster and does the lifting for you.');
    note = 'Junk crews price by how much of the truck you fill, and the crew does the carrying. A dumpster wins on big, slow jobs like remodels; a crew wins on one-day cleanouts and heavy single items.';
  } else {
    note = 'Single-item prices include the crew carrying it out. Fridges and freezers cost more because the refrigerant has to be recovered before disposal.';
  }

  return { hero: hero, rows: rows, ok: ok, note: note };
});
