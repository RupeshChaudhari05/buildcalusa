/* Dumpster Rental Cost Calculator */
Calc(function (c) {
  var size = parseFloat(c.val('size')) || 20;
  var debris = c.val('debris');
  var heavy = debris === 'heavy';
  var days = Math.max(1, Math.round(c.num('days')));
  var inclDays = Math.max(1, Math.round(c.num('incl_days')));
  var est = Math.max(0, c.num('est_tons'));
  var incl = Math.max(0, c.num('incl_tons'));
  var region = c.region();

  var base = c.num('base_price') * region;
  var extraDays = Math.max(0, days - inclDays);
  var dayCost = extraDays * c.num('extra_day');
  // Heavy-debris containers are usually a flat rate with no tonnage overage
  var overTons = heavy ? 0 : Math.max(0, est - incl);
  var overage = overTons * c.num('overage_price');
  var heavyFee = heavy ? c.num('heavy_fee') : 0;
  var permit = c.on('permit') ? c.num('permit_price') : 0;
  var distance = c.on('distance') ? c.num('distance_fee') : 0;
  var total = base + dayCost + overage + heavyFee + permit + distance;

  var rows = [[size + ' yard rental, ' + inclDays + ' days, ' + c.q(incl, 'ton', 1) + ' included', c.money(base)]];
  if (extraDays) rows.push(['Extra days × ' + extraDays, c.money(dayCost)]);
  if (heavyFee) rows.push(['Heavy-debris surcharge', c.money(heavyFee)]);
  if (!heavy) rows.push(['Overweight: ' + (overTons ? c.q(overTons, 'ton', 1) + ' over' : 'none'), c.money(overage)]);
  if (permit) rows.push(['Street permit', c.money(permit)]);
  if (distance) rows.push(['Distance surcharge', c.money(distance)]);
  rows.push(['Estimated total', c.money(total), 'total']);
  rows.push(['Prices for', c.regionName(), 'sub']);

  var warn = [], ok = [];
  if (heavy && size > 10) warn.push('Most haulers take concrete, brick or dirt only in a 10 yard container, or a larger one filled partway. A full ' + size + ' yard box of concrete would weigh far more than the truck can lift.');
  if (overTons > 0) warn.push('About ' + c.q(overTons, 'ton', 1) + ' over the allowance adds ' + c.money(overage) + '. Ask about a bigger weight allowance before delivery; it usually costs less than the overage.');
  else if (!heavy) ok.push('Your estimated ' + c.q(est, 'ton', 1) + ' fits inside the ' + c.q(incl, 'ton', 1) + ' allowance.');
  if (debris === 'yard') ok.push('Some haulers discount clean yard waste because it goes to compost instead of the landfill. Ask.');

  return {
    hero: [
      { label: 'Estimated rental cost', value: c.money(total), sub: 'Typical range ' + c.money(total * 0.9) + ' – ' + c.money(total * 1.15) },
      { label: 'Per day', value: c.money(total / days, 2), sub: days + ' day' + (days === 1 ? '' : 's') },
      { label: 'Weight', value: heavy ? 'Flat rate' : c.q(est, 'ton', 1), sub: heavy ? 'Fill to the hauler\'s line' : c.q(incl, 'ton', 1) + ' included' }
    ],
    rows: rows,
    warn: warn,
    ok: ok,
    note: 'Not allowed in most dumpsters: paint, solvents, batteries, tires and appliances with refrigerant. Expect a fee per item if they turn up in the load.'
  };
});
