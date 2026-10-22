/* Concrete Calculator */
Calc(function (c) {
  var shape = c.val('shape') || 'slab';
  var qty = Math.max(1, Math.round(c.num('qty')));
  var waste = Math.max(0, c.num('waste')) / 100;
  var ft3 = 0, desc = '';

  if (shape === 'slab') {
    ft3 = c.num('s_len') * c.num('s_wid') * c.num('s_thk') / 12;
    desc = c.q(c.num('s_len'), 'len') + ' × ' + c.q(c.num('s_wid'), 'len') + ' × ' + c.q(c.num('s_thk'), 'in') + ' slab';
  } else if (shape === 'footing') {
    ft3 = c.num('f_len') * c.num('f_wid') / 12 * c.num('f_dep') / 12;
    desc = c.q(c.num('f_len'), 'len') + ' footing';
  } else if (shape === 'column') {
    var r = c.num('c_dia') / 24;
    ft3 = Math.PI * r * r * c.num('c_hgt');
    desc = c.q(c.num('c_dia'), 'in') + ' round column';
  } else if (shape === 'wall') {
    ft3 = c.num('w_len') * c.num('w_hgt') * c.num('w_thk') / 12;
    desc = c.q(c.num('w_len'), 'len') + ' wall';
  } else if (shape === 'stairs') {
    var n = Math.max(1, Math.round(c.num('t_steps')));
    var w = c.num('t_wid'), rise = c.num('t_rise') / 12, run = c.num('t_run') / 12;
    ft3 = w * run * rise * n * (n + 1) / 2 + w * (c.num('t_land') / 12) * n * rise;
    desc = n + ' steps';
  }

  ft3 *= qty;
  if (!(ft3 > 0)) return { warn: ['Enter the dimensions of your pour.'] };

  var total = ft3 * (1 + waste);
  var yd3 = total / 27;
  var b80 = Math.ceil(total / 0.6), b60 = Math.ceil(total / 0.45), b40 = Math.ceil(total / 0.3);
  var ready = yd3 * c.num('ready_price');
  var bags80 = b80 * c.num('bag80_price'), bags60 = b60 * c.num('bag60_price');

  var ok = [], warn = [];
  if (yd3 < 1) ok.push('Under 1 yd³: bagged concrete is practical. ' + c.n(b80) + ' × 80 lb bags will do it.');
  else if (yd3 < 4) warn.push('1–4 yd³: order ready-mix, but expect a short-load fee (often $50–$150 per yard under the plant minimum). Mixing ' + c.n(b80) + ' bags by hand is heavy work.');
  else ok.push('Over 4 yd³: order ready-mix delivered by truck. Round your order up to the next ½ yd.');

  return {
    hero: [
      { label: 'Concrete needed', value: c.q(yd3, 'vol', 2), sub: c.q(total, 'cuft', 1) + ' incl. ' + Math.round(waste * 100) + '% waste' },
      { label: '80 lb bags', value: c.n(b80), sub: c.money(bags80) },
      { label: 'Ready-mix cost', value: c.money(ready), sub: 'at ' + c.per(c.num('ready_price'), 'vol') },
      { label: '60 lb bags', value: c.n(b60), sub: c.money(bags60) }
    ],
    rows: [
      ['Pour', (qty > 1 ? qty + ' × ' : '') + desc],
      ['Volume (no waste)', c.q(ft3 / 27, 'vol', 2)],
      ['Volume with waste', c.q(yd3, 'vol', 2)],
      ['Quikrete 80 lb bags (0.60 ft³ each)', c.n(b80)],
      ['Quikrete 60 lb bags (0.45 ft³ each)', c.n(b60)],
      ['40 lb bags (0.30 ft³ each)', c.n(b40)],
      ['Ready-mix total', c.money(ready), 'total'],
      ['80 lb bag total', c.money(bags80), 'sub'],
      ['60 lb bag total', c.money(bags60), 'sub'],
      ['Weight of bagged mix (80 lb)', c.q(b80 * 80, 'lb', 0), 'sub']
    ],
    ok: ok,
    warn: warn,
    note: 'Bag yields are Quikrete published figures. Ready-mix price excludes delivery, pump and finishing labor.'
  };
});
