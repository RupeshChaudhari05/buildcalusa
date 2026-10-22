/* Roof Cost Calculator – installed replacement cost, compared across materials */
Calc(function (c) {
  var L = c.num('length'), W = c.num('width');
  var pitch = parseFloat(c.val('pitch')) || 0;
  var factor = Math.sqrt(1 + Math.pow(pitch / 12, 2));
  var waste = Math.max(0, c.num('waste')) / 100;
  var stories = parseFloat(c.val('stories')) || 1;
  var layers = parseInt(c.val('layers'), 10) || 0;
  var region = c.region(), m = c.opt('material');

  if (L <= 0 || W <= 0) return { warn: ['Enter the house length and width.'] };

  var area = L * W * factor;                 // roof surface, sq ft
  var squares = area * (1 + waste) / 100;    // squares billed, incl. waste
  var steep = pitch >= 8 ? 1.15 : 1;         // steep-roof charge on labor
  var LABOR = 0.6;                           // labor share of an installed price

  // Installed roofing for a given price per square: material share + labor share scaled by region, stories, steepness
  function roofing(perSquare) {
    var installed = squares * perSquare;
    return installed * (1 - LABOR) + installed * LABOR * region * stories * steep;
  }

  var tear = layers > 0 ? area / 100 * (c.num('tear_price') + (layers > 1 ? c.num('tear2_price') : 0)) * region : 0;
  var sheets = Math.ceil(area / 32 * Math.max(0, c.num('deck_pct')) / 100);
  var decking = sheets * c.num('sheet_price');
  var permit = c.num('permit');
  var extras = tear + decking + permit;

  var main = roofing(c.num('sq_price'));
  var total = main + extras;

  var rows = [
    ['Roofing installed (' + c.n(squares, 1) + ' squares)', c.money(main)]
  ];
  if (layers > 0) rows.push(['Tear-off, ' + layers + ' layer' + (layers > 1 ? 's' : '') + ' – ' + c.regionName(), c.money(tear)]);
  if (decking) rows.push(['Decking: ' + c.n(sheets) + ' sheets replaced', c.money(decking)]);
  if (permit) rows.push(['Permit', c.money(permit)]);
  rows.push(['Estimated total', c.money(total), 'total']);
  rows.push(['<strong>Same roof, other materials</strong>', '', 'sub']);

  // Comparison: the selected material uses the (editable) price field, the rest use their default prices
  var sel = document.getElementById('material'), cur = c.val('material');
  if (sel) Array.prototype.forEach.call(sel.options, function (o) {
    var p = o.value === cur ? c.num('sq_price') : c.fx(parseFloat(o.dataset.p));
    var t = roofing(p) + extras;
    var name = o.text.replace('Asphalt – ', '').replace('Metal – ', 'Metal, ');
    name = name.charAt(0).toUpperCase() + name.slice(1);
    rows.push([(o.value === cur ? '› ' : '') + name + ' (' + o.dataset.life + ')', c.money(t), 'sub']);
  });

  var warn = [], ok = [];
  var minPitch = parseFloat(m.min) || 0;
  if (pitch < minPitch) warn.push(c.optText('material') + ' needs at least ' + minPitch + '/12 pitch. Pick a low-slope option such as standing seam metal.');
  if (/tile|slate/.test(cur)) warn.push('Tile and slate weigh 800–1,500 lb per square. Have the framing checked before switching from shingles.');
  if (steep > 1) ok.push('Steep-roof charge (+15% on labor) applied for ' + pitch + '/12.');

  return {
    hero: [
      { label: 'Estimated roof cost', value: c.money(total), sub: 'Typical range ' + c.money(total * 0.85) + ' – ' + c.money(total * 1.2) },
      { label: 'Cost per sq ft of roof', value: c.per(total / area, 'area') },
      { label: 'Roofing squares', value: c.n(squares, 1), sub: c.q(area, 'area', 0) + ' of roof + ' + Math.round(waste * 100) + '%' }
    ],
    rows: rows,
    warn: warn,
    ok: ok,
    note: 'Installed prices include underlayment, flashing and labor. Chimneys, skylights, ice-and-water shield in cold states and gutters are extra.'
  };
});
