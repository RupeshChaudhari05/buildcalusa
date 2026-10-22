/* Dumpster Size Calculator */
Calc(function (c) {
  var SIZES = [10, 15, 20, 30, 40];
  var ALLOW = { 10: 2, 15: 2.5, 20: 3, 30: 4, 40: 5 };          // typical tons included
  var DIM = { 10: [12, 8, 3.5], 15: [16, 8, 4], 20: [22, 8, 4], 30: [22, 8, 6], 40: [22, 8, 8] };

  var mode = c.val('mode') || 'project', raw = 0, dens = 600, what = '';

  if (mode === 'project') {
    var o = c.opt('project');
    dens = parseFloat(o.dens) || 600;
    var hint = typeof document.getElementById === 'function' && document.getElementById('p_hint');
    if (hint && o.hint) hint.textContent = o.hint;
    if (o.kind === 'count') {
      var n = Math.max(0, c.num('p_count'));
      raw = n > 0 ? (parseFloat(o.base) || 0) + n * (parseFloat(o.ypu) || 0) : 0;
      what = c.optText('project') + ' × ' + c.n(n);
    } else {
      var A = Math.max(0, c.num('p_area'));
      var ypu = c.val('project') === 'garage' ? parseFloat(c.val('fill')) : parseFloat(o.ypu);
      raw = A * ypu;
      if (c.val('project') === 'roof') raw *= parseFloat(c.val('layers')) || 1;
      what = c.optText('project') + ', ' + c.q(A, 'area', 0);
    }
  } else if (mode === 'pile') {
    var L = c.num('pile_l'), W = c.num('pile_w'), H = c.num('pile_h');
    raw = L * W * H / 27 * (parseFloat(c.val('bulky')) || 1);
    dens = parseFloat(c.val('debris')) || 600;
    what = 'Pile ' + c.q(L, 'len', 1) + ' × ' + c.q(W, 'len', 1) + ' × ' + c.q(H, 'len', 1);
  } else {
    var loads = Math.max(0, c.num('loads')), bed = parseFloat(c.val('bed')) || 2.5;
    raw = loads * bed;
    dens = parseFloat(c.val('debris')) || 600;
    what = c.n(loads, 1) + ' pickup loads';
  }

  if (raw <= 0) return { warn: ['Enter the size of the job or the debris pile.'] };

  var head = Math.max(0, c.num('headroom')) / 100;
  var need = raw * (1 + head);
  var tons = raw * dens / 2000;
  var heavy = dens >= 1500;
  var warn = [], ok = [], label, cap, count = 1, allow;
  var sizeName = function (s) { return s + ' yard' + (c.sys === 'metric' ? ' (' + c.q(s, 'vol', 1) + ')' : ''); };

  if (heavy) {
    // Concrete, dirt and rock go in small heavy-debris boxes, filled only to the fill line
    count = Math.max(Math.ceil(need / 10), Math.ceil(tons / 10));
    cap = 10; allow = 10;
    label = (count > 1 ? count + ' × ' : '') + sizeName(10) + ' heavy debris';
    warn.push('Heavy debris goes in a 10 yard heavy-debris container (some haulers offer 15). Fill it only to the line marked inside: a bigger box full of concrete would be over the legal truck weight.');
  } else {
    var byVol = null, both = null;
    SIZES.forEach(function (s) {
      if (byVol === null && s >= need) byVol = s;
      if (both === null && s >= need && ALLOW[s] >= tons) both = s;
    });
    // Step up at most one size for weight; beyond that, paying overage beats renting a far bigger box
    if (both !== null && byVol !== null && SIZES.indexOf(both) > SIZES.indexOf(byVol) + 1) both = null;
    if (both !== null) {
      cap = both;
      if (byVol !== null && byVol !== both) {
        ok.push('By volume a ' + byVol + ' yard is enough, but about ' + c.q(tons, 'ton', 1) + ' is over its usual ' + c.q(ALLOW[byVol], 'ton', 1) + ' allowance. The ' + both + ' yard includes ' + c.q(ALLOW[both], 'ton', 1) + ', or keep the ' + byVol + ' yard and pay overage on the difference.');
      }
    } else if (byVol !== null) {
      // Fits by space but no size includes this much weight: smallest that fits, plus overage
      cap = byVol;
    } else {
      // More than one 40 yard can hold
      cap = 40;
      count = Math.ceil(need / 40);
    }
    allow = ALLOW[cap];
    label = (count > 1 ? count + ' × ' : '') + sizeName(cap);
  }

  var fill = raw / (cap * count) * 100;
  var d = DIM[cap];
  var rows = [
    ['Debris', what],
    ['Debris volume', c.q(raw, 'vol', 1)],
    ['With ' + c.n(head * 100) + '% headroom', c.q(need, 'vol', 1)],
    ['Container', label, 'total'],
    ['Typical inside size', c.q(d[0], 'len', 0) + ' × ' + c.q(d[1], 'len', 0) + ' × ' + c.q(d[2], 'len', 1)],
    ['Estimated weight', c.q(tons, 'ton', 1), 'sub'],
    ['Weight usually included', c.q(allow * count, 'ton', 1), 'sub']
  ];
  if (mode !== 'loads') rows.splice(5, 0, ['Same as about', c.n(raw / 2.5, 1) + ' pickup loads (8 ft bed)', 'sub']);

  if (fill > 90 && !heavy) warn.push('That fills the container to the brim. Nothing can stick out above the top edge, so consider the next size up.');
  if (!heavy && tons > allow * count) warn.push('Expect an overweight charge: about ' + c.q(tons - allow * count, 'ton', 1) + ' over the usual allowance.');

  return {
    hero: [
      { label: 'Recommended dumpster', value: label, sub: 'Fills about ' + c.n(Math.min(fill, 100)) + '% by volume' },
      { label: 'Debris volume', value: c.q(raw, 'vol', 1), sub: c.q(need, 'vol', 1) + ' with headroom' },
      { label: 'Estimated weight', value: c.q(tons, 'ton', 1), sub: c.q(allow * count, 'ton', 1) + ' usually included' }
    ],
    rows: rows,
    warn: warn,
    ok: ok,
    note: 'Sizes and weight allowances vary by hauler and by landfill. Confirm both, and the overage price per ton, when you book.'
  };
});
