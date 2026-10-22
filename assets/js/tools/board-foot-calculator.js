/* Board Foot Calculator */
(function () {
  var ROWS = 6, bound = false;

  // Show rows that have a quantity (e.g. from a shared link), and wire the Add row button once
  function syncRows(c) {
    var rows = document.querySelectorAll('[data-bfrow]'), btn = document.getElementById('bf-add');
    rows.forEach(function (r) {
      var i = r.getAttribute('data-bfrow');
      if (c.num('q' + i) > 0) r.hidden = false;
    });
    if (btn && !bound) {
      bound = true;
      btn.addEventListener('click', function () {
        var next = document.querySelector('[data-bfrow][hidden]');
        if (next) {
          next.hidden = false;
          var q = next.querySelector('input[name^="q"]');
          if (q) { q.value = 1; q.dispatchEvent(new Event('input', { bubbles: true })); q.focus(); }
        }
        btn.hidden = !document.querySelector('[data-bfrow][hidden]');
      });
    }
    if (btn) btn.hidden = !document.querySelector('[data-bfrow][hidden]');
  }

  Calc(function (c) {
    if (typeof document.querySelectorAll === 'function') syncRows(c);

    var price = Math.max(0, c.num('price')), waste = Math.max(0, c.num('waste')) / 100;
    var total = 0, pieces = 0, rows = [];

    for (var i = 1; i <= ROWS; i++) {
      var t = parseFloat(c.val('t' + i)) || 0, w = c.num('w' + i), l = c.num('l' + i);
      var q = Math.max(0, Math.round(c.num('q' + i)));
      if (q <= 0 || t <= 0 || w <= 0 || l <= 0) continue;
      var each = t * w * l / 12, bf = each * q;
      total += bf; pieces += q;
      rows.push([q + ' × ' + c.n(t, 2) + '" × ' + c.n(w, 2) + '" × ' + c.n(l, 2) + '\' (' + c.n(each, 2) + ' BF each)', c.n(bf, 2) + ' BF', 'sub']);
    }

    if (total <= 0) return { warn: ['Enter at least one board with a quantity above zero.'] };

    var withWaste = total * (1 + waste), cost = withWaste * price;
    var out = rows.slice();
    out.push(['Board feet in your list', c.n(total, 2) + ' BF']);
    out.push(['Waste allowance (' + c.n(waste * 100, 1) + '%)', c.n(withWaste - total, 2) + ' BF']);
    out.push(['Board feet to buy', c.n(withWaste, 2) + ' BF']);
    out.push([c.optText('species') + ' at ' + c.money(price, 2) + '/BF', c.money(cost, 2)]);
    out.push(['Estimated lumber cost', c.money(cost, 2), 'total']);
    out.push(['Volume (cubic metres)', c.n(withWaste * 0.0023597, 3) + ' m³', 'sub']);

    var warn = [];
    if (waste < 0.1) warn.push('Rough hardwood almost always loses 15% or more to checks, sapwood and defects. Under 10% waste is optimistic.');

    return {
      hero: [
        { label: 'Lumber cost', value: c.money(cost), sub: c.n(withWaste, 1) + ' BF at ' + c.money(price, 2) + '/BF' },
        { label: 'Board feet (list)', value: c.n(total, 2), sub: pieces + ' pieces' },
        { label: 'With ' + c.n(waste * 100) + '% waste', value: c.n(withWaste, 1) + ' BF' }
      ],
      rows: out,
      warn: warn,
      note: 'Hardwood is sold by the board foot in the rough. Surfacing (S4S) takes about ⅛" off each face, so buy 4/4 to finish at ¾".'
    };
  });
})();
