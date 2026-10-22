/* Retaining Wall Calculator */
Calc(function (c) {
  var L = c.num('length'), H = c.num('height');
  var bh = c.num('block_h'), bw = c.num('block_w');
  var buried = Math.max(0, Math.round(c.num('buried')));
  var waste = Math.max(0, c.num('waste')) / 100;

  if (L <= 0 || H <= 0) return { warn: ['Enter the wall length and exposed height.'] };
  if (bh <= 0 || bw <= 0) return { warn: ['Enter the block height and face width.'] };

  var courses = Math.ceil(H / bh - 1e-9) + buried;
  var perCourse = Math.ceil(L * 12 / bw - 1e-9);
  var blocks = Math.ceil(courses * perCourse * (1 + waste));
  var caps = c.on('caps') ? Math.ceil(L * 12 / 12 * (1 + waste)) : 0;
  var totalHtFt = courses * bh / 12;

  // Base trench 24" wide x 6" deep of crushed stone; drain stone 12" behind the full wall height
  var baseYd = L * 2 * 0.5 / 27, baseTons = baseYd * 1.5;
  var drainYd = L * 1 * totalHtFt / 27, drainTons = drainYd * 1.4;
  var pipes = Math.ceil(L / 10);
  var fabricRolls = c.on('fabric') ? Math.ceil(L * (totalHtFt + 2) / 150) : 0;
  var face = L * H / 12;

  var blockCost = blocks * c.num('block_price');
  var capCost = caps * c.num('cap_price');
  var stoneCost = baseTons * c.num('base_price') + drainTons * c.num('drain_price');
  var drainCost = pipes * c.fx(14) + fabricRolls * c.fx(28);
  var labor = c.on('diy') ? 0 : face * c.num('labor_price') * c.region();
  var total = blockCost + capCost + stoneCost + drainCost + labor;

  var warn = [];
  if (H > 48) warn.push('Walls over 4 ft of exposed height need an engineered design and a permit in most U.S. towns.');
  else if (H > 36) warn.push('Above 3 ft, most block makers call for geogrid reinforcement every 2–3 courses. Check the manufacturer chart.');

  var rows = [
    ['Wall blocks × ' + c.n(blocks), c.money(blockCost)]
  ];
  if (caps) rows.push(['Cap stones × ' + c.n(caps), c.money(capCost)]);
  rows.push(['Base & drainage stone (' + c.q(baseTons + drainTons, 'ton', 1) + ')', c.money(stoneCost)]);
  rows.push(['Drain pipe' + (fabricRolls ? ' & fabric' : ''), c.money(drainCost)]);
  rows.push([c.on('diy') ? 'Labor (DIY)' : 'Labor – ' + c.regionName(), c.money(labor)]);
  rows.push(['Estimated total', c.money(total), 'total']);
  rows.push(['Courses (incl. ' + buried + ' buried)', c.n(courses), 'sub']);
  rows.push(['Blocks per course', c.n(perCourse), 'sub']);
  rows.push(['Base gravel (24" × 6" trench)', c.q(baseTons, 'ton', 1), 'sub']);
  rows.push(['Drainage stone (12" behind wall)', c.q(drainTons, 'ton', 1), 'sub']);
  rows.push(['4" perforated pipe, 10 ft lengths', c.n(pipes), 'sub']);
  if (fabricRolls) rows.push(['Filter fabric rolls (150 sq ft)', c.n(fabricRolls), 'sub']);

  return {
    hero: [
      { label: 'Estimated wall cost', value: c.money(total), sub: 'Typical range ' + c.money(total * 0.85) + ' – ' + c.money(total * 1.15) },
      { label: 'Wall blocks', value: c.n(blocks), sub: courses + ' courses × ' + perCourse },
      { label: 'Cap stones', value: caps ? c.n(caps) : 'None', sub: 'Wall face ' + c.q(face, 'area', 0) }
    ],
    rows: rows,
    warn: warn,
    note: 'Glue caps with masonry adhesive, not mortar. Call 811 before you dig the trench.'
  };
});
