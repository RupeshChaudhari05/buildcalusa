/* Insulation Calculator */
Calc(function (c) {
  var loc = c.val('location'), zone = parseInt(c.val('zone'), 10) || 4, type = c.val('type');
  var L = c.num('length'), W = c.num('width'), region = c.region();
  var diy = c.on('diy') || type === 'foam';

  if (L <= 0 || W <= 0) return { warn: ['Enter the length and width (or wall height).'] };
  var area = L * W;

  // Recommended R-value ranges (DOE / ENERGY STAR), [low, high]
  var REC = {
    attic: [null, [30, 49], [38, 60], [38, 60], [49, 60], [49, 60], [49, 60], [49, 60], [49, 60]],
    walls: [null, [13, 15], [13, 15], [13, 15], [13, 15], [20, 21], [20, 21], [20, 21], [20, 21]],
    floor: [null, [13, 13], [13, 13], [19, 25], [19, 25], [25, 30], [25, 30], [25, 30], [25, 30]]
  };
  var rec = REC[loc][zone];
  var existing = loc === 'attic' ? Math.max(0, c.num('existing_r')) : 0;
  var target = c.num('target_r') > 0 ? c.num('target_r') : rec[0];
  var need = Math.max(0, target - existing);

  if (!need) {
    return {
      hero: [{ label: 'Insulation to add', value: 'None', sub: 'R-' + c.n(existing) + ' already meets R-' + c.n(target) }],
      ok: ['Your existing insulation already meets the target for zone ' + zone + '. Air-sealing the attic floor is the next best upgrade.']
    };
  }

  var warn = [], rows = [], materials = 0, qtyLabel, depth, buyR = need;
  // Batt sizes stores actually stock for each location
  var BATTS = { attic: [13, 19, 30, 38], walls: [11, 13, 15, 19, 21], floor: [13, 19, 25, 30] }[loc];
  var BATT_COVER = { 11: 88, 13: 88, 15: 72, 19: 75, 21: 60, 25: 50, 30: 53, 38: 43 };

  if (type === 'batts') {
    // Cheapest single batt, or two layers in an attic, that reaches the R needed
    var best = null;
    var opts = loc === 'attic' ? BATTS.concat([0]) : [0];
    BATTS.forEach(function (a) {
      opts.forEach(function (b) {
        if (loc !== 'attic' && b) return;
        var r = a + b, n = b ? 2 : 1;
        if (r >= need && (!best || r < best.r || (r === best.r && n < best.layers.length))) best ={ r: r, layers: b ? [a, b].sort(function (x, y) { return y - x; }) : [a] };
      });
    });
    if (!best) {
      var top = BATTS[BATTS.length - 1];
      best = { r: loc === 'attic' ? top * 2 : top, layers: loc === 'attic' ? [top, top] : [top] };
      if (loc !== 'attic') warn.push('No single batt reaches R-' + c.n(need) + ' here. Use the deepest batt that fits the framing and add rigid foam.');
    }
    buyR = best.r;
    depth = buyR / 3.2;
    materials = area * buyR / 10 * c.num('batt_price');
    var packs = best.layers.map(function (r) { return Math.ceil(area * 1.05 / BATT_COVER[r]); });
    qtyLabel = best.layers.map(function (r, i) { return packs[i] + ' bags of R-' + r; }).join(' + ');
    best.layers.forEach(function (r, i) { rows.push(['R-' + r + ' batts: ' + packs[i] + ' bags (≈' + BATT_COVER[r] + ' sq ft each)', c.money(area * r / 10 * c.num('batt_price'))]); });
    if (best.layers.length === 2) warn.push('Lay the second layer of batts across the joists, unfaced, so it covers the tops of the framing.');
    if (loc === 'walls' && buyR > 15) warn.push('R-' + buyR + ' needs 2×6 walls. In a 2×4 wall, use R-13 or R-15 batts plus R-5 continuous foam board outside the studs.');
  } else if (type === 'cellulose' || type === 'blownfg') {
    var cell = type === 'cellulose';
    depth = need / (cell ? 3.6 : 2.7);
    var perBag = (cell ? 1150 : 2100) / need; // sq ft one bag covers at this R
    var bags = Math.ceil(area / perBag);
    materials = bags * c.num(cell ? 'cell_price' : 'fg_price');
    qtyLabel = bags + ' bags';
    rows.push([(cell ? 'Cellulose (25 lb)' : 'Blown fiberglass') + ': ' + bags + ' bags', c.money(materials)]);
    rows.push(['Coverage per bag at R-' + c.n(need), c.q(perBag, 'area', 0), 'sub']);
    if (loc !== 'attic') warn.push('Loose-fill bag counts are for open attics. Dense-packing closed walls or netted floors takes about 2 to 3 times as many bags, so get an installer quote.');
  } else {
    depth = need / 6.5;
    var bf = area * depth;
    materials = bf * c.num('foam_price');
    qtyLabel = c.n(bf) + ' board ft';
    rows.push(['Closed-cell foam: ' + c.n(bf) + ' board ft (installed)', c.money(materials)]);
    if (depth > 3.5 && loc === 'walls') warn.push('More than 3½ in of closed-cell foam will not fit a 2×4 wall. Most installers spray 2 to 3 in (R-13 to R-20).');
  }

  var labor = diy ? 0 : area * c.num('labor_price') * region;
  var total = materials + labor;

  rows.push([type === 'foam' ? 'Labor (included in foam price)' : diy ? 'Labor (DIY)' : 'Labor – ' + c.regionName(), c.money(labor)]);
  rows.push(['Estimated total', c.money(total), 'total']);
  rows.push(['Area', c.q(area, 'area', 0), 'sub']);
  rows.push(['Recommended for zone ' + zone, 'R-' + rec[0] + (rec[1] > rec[0] ? ' to R-' + rec[1] : ''), 'sub']);
  if (existing) rows.push(['Existing', 'R-' + c.n(existing), 'sub']);
  rows.push(['Installed depth (settled)', c.q(depth, 'in', 1), 'sub']);

  return {
    hero: [
      { label: 'Insulation to add', value: 'R-' + c.n(buyR), sub: '≈ ' + c.q(depth, 'in', 1) + ' deep · target R-' + c.n(target) },
      { label: 'Estimated total', value: c.money(total), sub: c.per(total / area, 'area') },
      { label: 'Material', value: qtyLabel, sub: c.q(area, 'area', 0) }
    ],
    rows: rows,
    warn: warn,
    note: 'Seal the top plates, wiring holes and the attic hatch before adding insulation. Keep blown insulation 3 in away from recessed lights that are not IC-rated, and use baffles so soffit vents stay open.'
  };
});
