/* Deck & Fence Stain Calculator */
Calc(function (c) {
  var deck = c.val('surface') !== 'fence';
  var area, detail;

  if (deck) {
    var L = c.num('d_len'), W = c.num('d_wid');
    if (L <= 0 || W <= 0) return { warn: ['Enter the deck length and width.'] };
    var floor = L * W;
    var rail = Math.max(0, c.num('rail_ft')) * 4;            // baluster railing ≈ 4 sq ft of wood per foot, both faces
    var stairs = Math.max(0, Math.round(c.num('steps'))) * 10; // tread, riser and stringers ≈ 10 sq ft per step
    area = floor + rail + stairs;
    detail = [['Deck floor', c.q(floor, 'area', 0)], ['Railing', c.q(rail, 'area', 0)], ['Stairs', c.q(stairs, 'area', 0)]];
  } else {
    var FL = c.num('f_len'), FH = c.num('f_hgt');
    if (FL <= 0 || FH <= 0) return { warn: ['Enter the fence length and height.'] };
    var sides = parseFloat(c.val('sides')) || 2, style = parseFloat(c.val('style')) || 1;
    area = FL * FH * sides * style * 1.1;                       // +10% for posts and rails
    detail = [['Fence faces (' + (sides === 2 ? 'both sides' : 'one side') + ')', c.q(area, 'area', 0)]];
  }

  var cover = c.num('coverage');
  if (cover <= 0) return { warn: ['Enter the coverage per gallon from the can.'] };
  var coats = Math.max(1, Math.round(c.num('coats')));
  var gal = area * coats / cover;
  var price = c.num('stain_price');

  // 5-gallon pails once you need about 4 gallons or more
  var pails = Math.floor(gal / 5), rest = gal - pails * 5, gallons = Math.ceil(rest - 0.05);
  if (rest >= 4) { pails++; gallons = 0; }
  if (gallons < 0) gallons = 0;
  var buy = [], stainCost = pails * price * 4.5 + gallons * price;
  if (pails) buy.push(pails + ' × 5 gal');
  if (gallons) buy.push(gallons + ' gal');

  var cleanerGal = c.on('cleaner') ? Math.ceil(area / 200) : 0;
  var cleanerCost = cleanerGal * c.fx(25);
  var labor = c.on('diy') ? 0 : area * c.num('labor_price') * (1 + 0.5 * (coats - 1)) * c.region();
  var total = stainCost + cleanerCost + labor;

  var rows = detail.concat([
    ['Stain: ' + buy.join(' + '), c.money(stainCost)]
  ]);
  if (cleanerGal) rows.push(['Cleaner / brightener × ' + cleanerGal + ' gal', c.money(cleanerCost)]);
  rows.push([c.on('diy') ? 'Labor (DIY)' : 'Labor – ' + c.regionName(), c.money(labor)]);
  rows.push(['Estimated total', c.money(total), 'total']);
  rows.push(['Coats', String(coats), 'sub']);

  var litres = c.sys === 'metric' ? ' (' + c.n(gal * 3.785, 1) + ' L)' : '';

  return {
    hero: [
      { label: 'Stain needed', value: c.n(gal, 1) + ' gal' + litres, sub: 'Buy ' + buy.join(' + ') },
      { label: 'Area to stain', value: c.q(area, 'area', 0), sub: coats + (coats > 1 ? ' coats' : ' coat') },
      { label: 'Estimated cost', value: c.money(total), sub: c.on('diy') ? 'Materials only' : 'Incl. labor' }
    ],
    rows: rows,
    note: 'Buy all the stain at once and box the cans together (pour them into one bucket) so the color matches from end to end.'
  };
});
