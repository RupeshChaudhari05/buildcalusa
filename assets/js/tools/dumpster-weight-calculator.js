/* Dumpster Weight Calculator */
(function () {
  var bound = false;

  // Show rows that have a volume (e.g. from a shared link), and wire the Add button once
  function syncRows(c) {
    var rows = document.querySelectorAll('[data-dwrow]'), btn = document.getElementById('dw-add');
    rows.forEach(function (r) {
      if (c.num('v' + r.getAttribute('data-dwrow')) > 0) r.hidden = false;
    });
    if (btn && !bound) {
      bound = true;
      btn.addEventListener('click', function () {
        var next = document.querySelector('[data-dwrow][hidden]');
        if (next) {
          next.hidden = false;
          var v = next.querySelector('input[name^="v"]');
          if (v) v.focus();
        }
        btn.hidden = !document.querySelector('[data-dwrow][hidden]');
      });
    }
    if (btn) btn.hidden = !document.querySelector('[data-dwrow][hidden]');
  }

  Calc(function (c) {
    if (typeof document.querySelectorAll === 'function') syncRows(c);

    var rows = [], lbs = 0, vol = 0, heavyLbs = 0, lightVol = 0;

    // Roof tear-off: about 250 lb and 0.25 yd³ per square per layer
    var sq = Math.max(0, c.num('roof_sq')), layers = parseFloat(c.val('layers')) || 1;
    if (sq > 0) {
      var rl = sq * 250 * layers, rv = sq * 0.25 * layers;
      lbs += rl; vol += rv; lightVol += rv;
      rows.push(['Shingles, ' + c.n(sq, 1) + ' squares × ' + layers + ' layer' + (layers > 1 ? 's' : ''), c.q(rl, 'lb', 0)]);
    }

    for (var i = 1; i <= 6; i++) {
      var v = Math.max(0, c.num('v' + i));
      if (!v) continue;
      var o = c.opt('m' + i), d = parseFloat(o.d) || 0, w = v * d;
      lbs += w; vol += v;
      if (o.heavy === '1') heavyLbs += w; else lightVol += v;
      rows.push([c.optText('m' + i) + ', ' + c.q(v, 'vol', 1), c.q(w, 'lb', 0)]);
    }

    if (lbs <= 0) return { warn: ['Add the debris going in: roof squares or at least one material with a volume.'] };

    var tons = lbs / 2000;
    var box = c.opt('size'), yd = parseFloat(box.yd) || 15, heavyBox = box.heavybox === '1';
    var included = Math.max(0, c.num('included'));
    var over = Math.max(0, tons - included);
    var fee = over * c.num('over_price');
    var fill = vol / yd * 100;
    var warn = [], ok = [];

    rows.push(['Total weight', c.q(tons, 'ton', 2), 'total']);
    rows.push(['Included with the ' + c.optText('size').split(' (')[0], c.q(included, 'ton', 1)]);
    rows.push(['Over the allowance', c.q(over, 'ton', 2)]);
    rows.push(['Overage fee', c.money(fee), 'total']);
    rows.push(['Debris volume', c.q(vol, 'vol', 1) + ' (' + c.n(fill) + '% of the container)', 'sub']);

    if (heavyLbs > 0 && !heavyBox && yd > 15) {
      warn.push('Concrete, brick, dirt or rock in a ' + yd + ' yard: most haulers refuse heavy debris in anything over 10 to 15 yards. Put it in a 10 yard heavy-debris container instead.');
    }
    if (heavyBox && lightVol > 0) {
      ok.push('Heavy-debris containers often need a clean load: one heavy material only. Mixed trash in it can be billed as general debris.');
    }
    if (fill > 100) warn.push('The debris is about ' + c.q(vol, 'vol', 1) + ', more than a ' + yd + ' yard holds. Step up a size or plan two hauls.');
    if (heavyBox && fill > 70 && heavyLbs > 0) warn.push('Fill a heavy-debris container only to the line marked inside, usually well below the rim.');
    if (over > 0 && !heavyBox && yd <= 30) {
      ok.push('Weight, not space, is the limit here. A bigger size includes more tons, but compare its price with the ' + c.money(fee) + ' overage.');
    }
    if (over <= 0) ok.push('Within the allowance, with about ' + c.q(included - tons, 'ton', 1) + ' to spare.');

    return {
      hero: [
        { label: 'Total weight', value: c.q(tons, 'ton', 2), sub: c.q(lbs, 'lb', 0) },
        { label: 'Overage fee', value: c.money(fee), sub: over > 0 ? c.q(over, 'ton', 2) + ' over ' + c.q(included, 'ton', 1) : 'Within the allowance' },
        { label: 'Debris volume', value: c.q(vol, 'vol', 1), sub: c.n(fill) + '% of a ' + yd + ' yard' }
      ],
      rows: rows,
      warn: warn,
      ok: ok,
      note: 'Weights are typical loose densities. Wet debris weighs more, and the landfill scale ticket decides the final bill.'
    };
  });
})();
