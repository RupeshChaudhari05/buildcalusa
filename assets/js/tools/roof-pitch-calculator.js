/* Roof Pitch Calculator */
Calc(function (c) {
  var p; // rise per 12 of run
  if (c.val('mode') === 'ang') {
    var a = c.num('angle');
    if (a <= 0 || a >= 89) return { warn: ['Enter an angle between 0° and 89°.'] };
    p = Math.tan(a * Math.PI / 180) * 12;
  } else {
    var rise = c.num('rise'), run = c.num('run');
    if (run <= 0 || rise < 0) return { warn: ['Enter the rise and the run.'] };
    p = rise / run * 12;
  }

  var angle = Math.atan(p / 12) * 180 / Math.PI;
  var factor = Math.sqrt(1 + (p / 12) * (p / 12));
  var span = c.num('span'), over = c.num('overhang'), ridge = c.num('ridge');

  // Pitch as x/12 with the nearest quarter, e.g. "6 1/2/12"
  var q = Math.round(p * 4) / 4, whole = Math.floor(q), frac = q - whole;
  var fracTxt = frac === 0.25 ? ' 1/4' : frac === 0.5 ? ' 1/2' : frac === 0.75 ? ' 3/4' : '';
  var pitchTxt = (whole || !fracTxt ? whole : '') + fracTxt + '/12';
  pitchTxt = pitchTxt.trim();

  // Inches: fractions to 1/16" in imperial, cm in metric
  var dim = function (inches) {
    if (c.sys === 'metric') return c.q(inches, 'in', 1);
    var ft = Math.floor(inches / 12), rem = inches - ft * 12;
    var w = Math.floor(rem), s = Math.round((rem - w) * 16);
    if (s === 16) { w++; s = 0; }
    if (w === 12) { ft++; w = 0; }
    var n = s, d = 16;
    while (n && n % 2 === 0) { n /= 2; d /= 2; }
    return (ft ? ft + ' ft ' : '') + w + (n ? ' ' + n + '/' + d : '') + '"';
  };

  var rafterRun = span > 0 ? Math.max(0, span * 12 / 2 - ridge / 2) : 0;
  var rafter = (rafterRun + over) * factor;
  var stock = [8, 10, 12, 14, 16, 18, 20, 22, 24];
  var buy = stock.filter(function (s) { return s * 12 >= rafter; })[0];

  var cls, warn = [], ok = [];
  if (p < 2) { cls = 'Flat / very low slope'; warn.push('Below 2/12, asphalt shingles are not allowed (IRC R905.2.2). Use a membrane roof such as TPO, EPDM or modified bitumen.'); }
  else if (p < 4) { cls = 'Low slope'; warn.push('2/12 to under 4/12: shingles need two layers of underlayment (IRC R905.2.2).'); }
  else if (p <= 9) { cls = 'Conventional'; ok.push('Standard shingle roof. ' + (p <= 6 ? 'Walkable without roof jacks in dry weather.' : 'Most crews use roof jacks or a harness from about 7/12.')); }
  else { cls = 'Steep'; warn.push('Above 9/12 crews need staging and harnesses, and labor usually costs 20–40% more.'); }

  var rows = [
    ['Pitch', pitchTxt + ' (' + c.n(p, 2) + ' in 12)'],
    ['Angle', c.n(angle, 2) + '°'],
    ['Slope', c.n(p / 12 * 100, 1) + '%'],
    ['Ratio', '1 : ' + (p ? c.n(12 / p, 2) : '∞')],
    ['Roof area multiplier', '× ' + c.n(factor, 3)],
    ['Class', cls, 'total']
  ];
  if (span > 0) {
    rows.push(['Rafter run (half span − ½ ridge)', dim(rafterRun), 'sub']);
    rows.push(['Rafter length incl. overhang', dim(rafter), 'sub']);
    rows.push(['Stock length to buy', buy ? buy + ' ft' : 'over 24 ft (engineered)', 'sub']);
    rows.push(['Ridge height above wall plate', dim(rafterRun * p / 12), 'sub']);
  }

  var draw = function () {
    var svg = document.getElementById('pitch-svg');
    if (!svg) return;
    var W = 400, H = 220, x0 = 50, y0 = 180, runPx = 280;
    var risePx = Math.min(runPx * p / 12, 150);
    var runShown = risePx < runPx * p / 12 ? risePx * 12 / p : runPx;
    var x1 = x0 + runShown, y1 = y0 - risePx;
    svg.innerHTML =
      '<polygon points="' + x0 + ',' + y0 + ' ' + x1.toFixed(1) + ',' + y0 + ' ' + x1.toFixed(1) + ',' + y1.toFixed(1) + '" fill="#f59e0b" fill-opacity=".2" stroke="none"/>' +
      '<line x1="' + x0 + '" y1="' + y0 + '" x2="' + x1.toFixed(1) + '" y2="' + y1.toFixed(1) + '" stroke="#f59e0b" stroke-width="4" stroke-linecap="round"/>' +
      '<line x1="' + x0 + '" y1="' + y0 + '" x2="' + x1.toFixed(1) + '" y2="' + y0 + '" stroke="currentColor" stroke-width="1.5"/>' +
      '<line x1="' + x1.toFixed(1) + '" y1="' + y0 + '" x2="' + x1.toFixed(1) + '" y2="' + y1.toFixed(1) + '" stroke="currentColor" stroke-width="1.5" stroke-dasharray="4 3"/>' +
      '<text x="' + ((x0 + x1) / 2).toFixed(1) + '" y="' + (y0 + 20) + '" font-size="12" fill="currentColor" text-anchor="middle">Run 12</text>' +
      '<text x="' + (x1 + 8).toFixed(1) + '" y="' + ((y0 + y1) / 2 + 4).toFixed(1) + '" font-size="12" fill="currentColor">Rise ' + c.n(p, 2) + '</text>' +
      '<text x="' + (x0 + 34) + '" y="' + (y0 - 8) + '" font-size="12" fill="currentColor">' + c.n(angle, 1) + '°</text>' +
      '<text x="' + (W - 12) + '" y="24" font-size="13" font-weight="700" fill="currentColor" text-anchor="end">' + pitchTxt + ' pitch</text>';
  };

  return {
    hero: [
      { label: 'Roof pitch', value: pitchTxt, sub: c.n(p, 2) + ' in of rise per 12 in of run' },
      { label: 'Angle', value: c.n(angle, 1) + '°', sub: 'Slope ' + c.n(p / 12 * 100, 0) + '%' },
      { label: span > 0 ? 'Rafter length' : 'Area multiplier', value: span > 0 ? dim(rafter) : '× ' + c.n(factor, 3), sub: span > 0 ? (buy ? 'Buy ' + buy + ' ft stock' : 'Over 24 ft') : 'Footprint × this = roof area' }
    ],
    rows: rows,
    warn: warn,
    ok: ok,
    note: 'Multiply the roof footprint (including overhangs) by the area multiplier to get the actual roof surface for ordering shingles.',
    draw: draw
  };
});
