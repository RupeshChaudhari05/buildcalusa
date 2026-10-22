/* Deck Cost Calculator */
Calc(function (c) {
  var L = c.num('length'), W = c.num('width');
  if (L <= 0 || W <= 0) return { warn: ['Enter the deck length and width.'] };

  var area = L * W;
  var elev = parseFloat(c.val('elev')) || 1;
  var region = c.region(), diy = c.on('diy');

  // Blank footings / railing length mean "estimate it"
  var footings = String(c.val('footings')).trim() === '' ? Math.max(4, Math.ceil(area / 40)) : Math.max(0, Math.round(c.num('footings')));
  var railFt = !c.on('railing') ? 0 : (String(c.val('rail_ft')).trim() === '' ? L + 2 * W : c.num('rail_ft'));
  var steps = Math.max(0, Math.round(c.num('steps')));

  var decking = area * c.num('deck_price');
  var framing = area * c.num('frame_price') * elev;
  var footCost = footings * c.num('footing_price') * elev;
  var railing = railFt * c.num('rail_price');
  var stairs = steps * c.num('step_price');
  var permit = c.num('permit');
  var labor = diy ? 0 : area * c.num('labor_price') * elev * region;
  var demo = c.on('demo') ? area * c.num('demo_price') * region : 0;
  var total = decking + framing + footCost + railing + stairs + permit + labor + demo;

  var rows = [
    ['Decking (' + c.optText('decking') + ')', c.money(decking)],
    ['Framing: joists, beams, ledger, hardware', c.money(framing)],
    ['Footings × ' + c.n(footings), c.money(footCost)]
  ];
  if (railFt) rows.push(['Railing, ' + c.q(railFt, 'len', 0) + ' (' + c.optText('rail_type').toLowerCase() + ')', c.money(railing)]);
  if (steps) rows.push(['Stairs, ' + steps + ' steps', c.money(stairs)]);
  if (permit) rows.push(['Permit', c.money(permit)]);
  rows.push([diy ? 'Labor (DIY)' : 'Labor – ' + c.regionName(), c.money(labor)]);
  if (demo) rows.push(['Old deck removal', c.money(demo)]);
  rows.push(['Estimated total', c.money(total), 'total']);
  rows.push(['Decking, framing &amp; footing materials', c.money(decking + framing + footCost), 'sub']);

  var warn = [];
  if (elev > 1.2) warn.push('Decks over 6 ft usually need engineered posts and beams, and some towns want stamped drawings.');

  return {
    hero: [
      { label: 'Estimated deck cost', value: c.money(total), sub: 'Typical range ' + c.money(total * 0.85) + ' – ' + c.money(total * 1.15) },
      { label: 'Cost per ' + c.unit('area'), value: c.per(total / area, 'area') },
      { label: 'Deck area', value: c.q(area, 'area', 0), sub: c.q(L, 'len', 0) + ' × ' + c.q(W, 'len', 0) }
    ],
    rows: rows,
    warn: warn,
    note: 'Covers the deck, railing and steps. Lighting, built-in benches, skirting and moving utility lines are extra.'
  };
});
