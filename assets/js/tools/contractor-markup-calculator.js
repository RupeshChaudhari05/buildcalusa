/* Contractor Markup Calculator */
Calc(function (c) {
  var materials = Math.max(0, c.num('materials')), labor = Math.max(0, c.num('labor'));
  var subs = Math.max(0, c.num('subs')), equip = Math.max(0, c.num('equipment'));
  var tax = materials * Math.max(0, c.num('tax')) / 100;
  var direct = materials + tax + labor + subs + equip;

  if (direct <= 0) return { warn: ['Enter at least one job cost.'] };

  var overhead = direct * Math.max(0, c.num('overhead')) / 100;
  var breakeven = direct + overhead;
  var bid, profit, netMargin, profitMarkup;

  if (c.val('mode') === 'markup') {
    profitMarkup = Math.max(0, c.num('markup')) / 100;
    bid = breakeven * (1 + profitMarkup);
    profit = bid - breakeven;
    netMargin = profit / bid;
  } else {
    netMargin = c.num('margin') / 100;
    if (netMargin >= 1 || netMargin < 0) return { warn: ['A profit margin has to be between 0% and 99%.'] };
    bid = breakeven / (1 - netMargin);
    profit = bid - breakeven;
    profitMarkup = profit / breakeven;
  }

  var totalMarkup = bid / direct - 1;      // what you add on top of direct cost
  var grossMargin = (bid - direct) / bid;  // overhead + profit as a share of the price
  var pct = function (v) { return c.n(v * 100, 1) + '%'; };

  var rows = [
    ['Materials', c.money(materials)]
  ];
  if (tax) rows.push(['Sales tax on materials', c.money(tax)]);
  rows.push(['Labor', c.money(labor)], ['Subcontractors', c.money(subs)], ['Equipment, permits, dumpsters', c.money(equip)]);
  rows.push(['Direct job cost', c.money(direct), 'sub']);
  rows.push(['Overhead (' + c.n(c.num('overhead'), 1) + '%)', c.money(overhead)]);
  rows.push(['Break-even price', c.money(breakeven), 'sub']);
  rows.push(['Net profit', c.money(profit)]);
  rows.push(['Bid price', c.money(bid), 'total']);
  rows.push(['Markup on direct cost', pct(totalMarkup), 'sub']);
  rows.push(['Gross margin (overhead + profit)', pct(grossMargin), 'sub']);
  rows.push([pct(netMargin) + ' net margin equals', pct(profitMarkup) + ' markup on break-even', 'sub']);

  var warn = [], ok = [];
  if (netMargin < 0.05) warn.push('Under 5% net margin leaves almost nothing for a change order that goes wrong or a slow-paying client.');
  else ok.push('Every ' + c.money(1000) + ' of direct cost sells for ' + c.money(1000 * (1 + totalMarkup)) + '.');

  return {
    hero: [
      { label: 'Bid price', value: c.money(bid), sub: 'Break-even ' + c.money(breakeven) },
      { label: 'Net profit', value: c.money(profit), sub: pct(netMargin) + ' of the price' },
      { label: 'Markup on cost', value: pct(totalMarkup), sub: 'Gross margin ' + pct(grossMargin) }
    ],
    rows: rows,
    warn: warn,
    ok: ok,
    note: 'Labor should include payroll taxes, workers\' comp and benefits (the "burden"), usually 25 to 40% on top of wages.'
  };
});
