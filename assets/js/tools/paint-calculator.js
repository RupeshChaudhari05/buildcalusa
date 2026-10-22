/* Paint Calculator */
Calc(function (c) {
  var L = c.num('length'), W = c.num('width'), H = c.num('height');
  var doors = Math.max(0, Math.round(c.num('doors'))), windows = Math.max(0, Math.round(c.num('windows')));
  var coats = Math.max(1, Math.round(c.num('coats'))), cover = c.num('coverage');
  var region = c.region(), diy = c.on('diy');

  if (L <= 0 || W <= 0 || H <= 0) return { warn: ['Enter the room length, width and wall height.'] };
  if (cover <= 0) return { warn: ['Enter the coverage per gallon from the can (usually 350–400 sq ft).'] };

  var walls = Math.max(0, 2 * (L + W) * H - doors * 20 - windows * 15);
  var ceiling = c.on('ceiling') ? L * W : 0;
  var ceilCoats = parseFloat(c.val('ceiling_coats')) || 1;
  // Baseboard around the room plus casing on both sides of each door and around each window
  var trimLf = c.on('trim') ? 2 * (L + W) + doors * 34 + windows * 14 : 0;

  var wallGal = walls * coats / cover;
  var ceilGal = ceiling * ceilCoats / cover;
  var trimGal = trimLf * 2 / 400; // two coats, about 1 qt per 100 lf per coat
  var primerGal = c.on('primer') ? (walls + ceiling) / 300 : 0;

  // Turn gallons into what you actually carry out of the store
  function buy(gal, price) {
    if (gal <= 0) return { text: '', cost: 0 };
    var buckets = 0, parts = [], cost = 0;
    if (gal > 4) { buckets = Math.floor(gal / 5); if (gal - buckets * 5 > 3.5) buckets++; }
    var rest = Math.max(0, gal - buckets * 5);
    var whole = Math.floor(rest), frac = rest - whole, quarts = 0;
    if (frac > 0.25) whole++; else if (frac > 0.01) quarts = 1;
    if (buckets) { parts.push(buckets + ' × 5 gal'); cost += buckets * price * 4.5; }
    if (whole) { parts.push(whole + ' gal'); cost += whole * price; }
    if (quarts) { parts.push('1 qt'); cost += price * 0.35; }
    return { text: parts.join(' + '), cost: cost };
  }

  var wb = buy(wallGal, c.num('paint_price'));
  var cb = buy(ceilGal, c.num('ceiling_price'));
  var tb = buy(trimGal, c.num('trim_price'));
  var pb = buy(primerGal, c.num('primer_price'));
  var materials = wb.cost + cb.cost + tb.cost + pb.cost;
  var labor = diy ? 0 : ((walls + ceiling) * c.num('labor_price') + trimLf * c.fx(1.25)) * region;
  var total = materials + labor;

  var litres = function (g) { return c.sys === 'metric' ? ' (' + c.n(g * 3.785, 1) + ' L)' : ''; };

  var rows = [['Wall paint: ' + wb.text, c.money(wb.cost)]];
  if (ceiling) rows.push(['Ceiling paint: ' + cb.text, c.money(cb.cost)]);
  if (trimLf) rows.push(['Trim enamel: ' + tb.text, c.money(tb.cost)]);
  if (primerGal) rows.push(['Primer: ' + pb.text, c.money(pb.cost)]);
  rows.push(['Paint subtotal', c.money(materials)]);
  rows.push([diy ? 'Labor (DIY)' : 'Labor – ' + c.regionName(), c.money(labor)]);
  rows.push(['Estimated total', c.money(total), 'total']);
  rows.push(['Wall area (after openings)', c.q(walls, 'area', 0), 'sub']);
  if (ceiling) rows.push(['Ceiling area', c.q(ceiling, 'area', 0), 'sub']);
  if (trimLf) rows.push(['Trim', c.q(trimLf, 'len', 0), 'sub']);
  rows.push(['Wall paint needed', c.n(wallGal, 2) + ' gal' + litres(wallGal), 'sub']);
  if (primerGal) rows.push(['Primer needed', c.n(primerGal, 2) + ' gal' + litres(primerGal), 'sub']);

  return {
    hero: [
      { label: 'Wall paint', value: c.n(wallGal, 1) + ' gal', sub: 'Buy ' + wb.text + ' · ' + coats + ' coat' + (coats > 1 ? 's' : '') + litres(wallGal) },
      { label: 'Estimated total', value: c.money(total), sub: diy ? 'Paint and primer only' : 'Range ' + c.money(total * 0.85) + ' – ' + c.money(total * 1.15) },
      { label: 'Wall area', value: c.q(walls, 'area', 0), sub: doors + ' door' + (doors === 1 ? '' : 's') + ', ' + windows + ' window' + (windows === 1 ? '' : 's') + ' deducted' }
    ],
    rows: rows,
    note: 'Buy all the wall paint at once and box it (pour every can into one bucket) so the color matches wall to wall. Rollers, tape, drop cloths and patching compound are extra, usually $40–$80 per room.'
  };
});
