/* Stair Stringer Calculator */
Calc(function (c) {
  var rise = c.num('rise'), maxR = c.num('max_riser'), run = c.num('tread');
  var nosing = c.num('nosing'), width = c.num('width'), spacing = Math.max(c.num('spacing'), 6);

  if (rise <= 0 || maxR <= 0 || run <= 0) return { warn: ['Enter the total rise, max riser height and tread depth.'] };

  // Dimensions in inches; imperial shows fractions to 1/16", metric shows cm
  var dim = function (inches) {
    if (c.sys === 'metric') return c.q(inches, 'in', 1);
    var whole = Math.floor(inches), sixteenths = Math.round((inches - whole) * 16);
    if (sixteenths === 16) { whole++; sixteenths = 0; }
    if (!sixteenths) return whole + '"';
    var num = sixteenths, den = 16;
    while (num % 2 === 0) { num /= 2; den /= 2; }
    return (whole ? whole + ' ' : '') + num + '/' + den + '"';
  };

  var risers = Math.ceil(rise / maxR - 1e-9);
  var riser = rise / risers;
  var treads = risers - 1;
  var totalRun = treads * run;
  var diag = Math.sqrt(riser * riser + run * run);
  var hyp = Math.sqrt(rise * rise + totalRun * totalRun);
  var boardIn = hyp + diag; // extra step diagonal for top/bottom cuts
  var angle = Math.atan(riser / run) * 180 / Math.PI;
  var stringers = Math.ceil(width / spacing) + 1;
  var comfort = 2 * riser + run;

  var stock = [8, 10, 12, 14, 16, 18, 20];
  var needFt = boardIn / 12, boardFt = stock.filter(function (s) { return s >= needFt; })[0] || 0;

  var lumber = stringers * (boardFt || Math.ceil(needFt)) * c.num('stringer_price');
  var treadCost = treads * c.num('tread_price');
  var labor = c.on('diy') ? 0 : risers * c.num('labor_price') * c.region();
  var total = lumber + treadCost + labor;

  var warn = [], ok = [];
  if (riser > 7.75 + 1e-6) warn.push('Riser ' + dim(riser) + ' exceeds the IRC maximum of 7¾". Lower the max riser height.');
  if (run < 10 - 1e-6) warn.push('Tread depth is below the IRC minimum of 10".');
  if (width < 36 - 1e-6) warn.push('Stair width is below the IRC minimum of 36".');
  if (run < 11 && (nosing < 0.75 || nosing > 1.25)) warn.push('IRC requires a ¾"–1¼" nosing when treads are under 11" deep.');
  if (angle > 37 || angle < 30) warn.push('Stair angle ' + c.n(angle, 1) + '° is outside the comfortable 30°–37° range.');
  if (comfort < 24 || comfort > 26) warn.push('Comfort check: 2 × riser + tread = ' + dim(comfort) + ' (ideal 24"–26").');
  if (!boardFt) warn.push('Stringer is longer than 20 ft. Use a landing or engineered stringers.');
  if (!warn.length) ok.push('Meets IRC R311.7 riser, tread, nosing and width limits.');

  var draw = function () {
    var svg = document.getElementById('stair-svg');
    if (!svg) return;
    var W = 400, H = 240, pad = 30;
    var s = Math.min((W - 2 * pad - 20) / Math.max(totalRun, 1), (H - 2 * pad) / rise);
    var x0 = pad + 10, y0 = H - pad;
    var pts = [[x0, y0]], x = x0, y = y0, i;
    for (i = 0; i < risers; i++) {
      y -= riser * s; pts.push([x, y]);
      if (i < treads) { x += run * s; pts.push([x, y]); }
    }
    var poly = pts.map(function (p) { return p[0].toFixed(1) + ',' + p[1].toFixed(1); }).join(' ');
    // stringer underside, parallel to the pitch line, one board depth (11.25") below
    var depth = 11.25 * s * Math.cos(Math.atan(riser / run));
    var bottom = (x0 + depth * 0.6).toFixed(1) + ',' + y0 + ' ' + x.toFixed(1) + ',' + (y + depth).toFixed(1);
    svg.innerHTML =
      '<line x1="' + (x0 - 20) + '" y1="' + y0 + '" x2="' + (W - 10) + '" y2="' + y0 + '" stroke="currentColor" stroke-opacity=".35"/>' +
      '<line x1="' + x + '" y1="' + y + '" x2="' + (W - 10) + '" y2="' + y + '" stroke="currentColor" stroke-opacity=".35"/>' +
      '<polygon points="' + poly + ' ' + bottom + '" fill="#f59e0b" fill-opacity=".25" stroke="#f59e0b" stroke-width="2" stroke-linejoin="round"/>' +
      '<line x1="' + (x0 - 14) + '" y1="' + y0 + '" x2="' + (x0 - 14) + '" y2="' + y + '" stroke="currentColor" stroke-width="1"/>' +
      '<text x="' + (x0 - 18) + '" y="' + ((y0 + y) / 2) + '" font-size="11" fill="currentColor" text-anchor="middle" transform="rotate(-90 ' + (x0 - 18) + ' ' + ((y0 + y) / 2) + ')">Rise ' + dim(rise) + '</text>' +
      '<text x="' + ((x0 + x) / 2) + '" y="' + (y0 + 18) + '" font-size="11" fill="currentColor" text-anchor="middle">Run ' + dim(totalRun) + '</text>' +
      '<text x="' + (x0 + 6) + '" y="' + (y0 - riser * s / 2 + 4) + '" font-size="10" fill="currentColor">' + dim(riser) + '</text>' +
      '<text x="' + (W - 12) + '" y="' + (pad - 8) + '" font-size="11" fill="currentColor" text-anchor="end">' + c.n(angle, 1) + '° · ' + risers + ' risers / ' + treads + ' treads</text>';
  };

  return {
    hero: [
      { label: 'Risers × height', value: risers + ' × ' + dim(riser), sub: treads + ' treads at ' + dim(run) + ' each' },
      { label: 'Stringer length', value: dim(hyp), sub: 'Buy ' + (boardFt ? boardFt + ' ft' : '20+ ft') + ' boards' },
      { label: 'Stair angle', value: c.n(angle, 1) + '°', sub: 'Total run ' + dim(totalRun) }
    ],
    rows: [
      ['Stringers × ' + stringers + ' (' + (boardFt || Math.ceil(needFt)) + ' ft ' + c.optText('lumber') + ')', c.money(lumber)],
      ['Treads × ' + treads, c.money(treadCost)],
      [c.on('diy') ? 'Labor (DIY)' : 'Labor – ' + c.regionName(), c.money(labor)],
      ['Estimated total', c.money(total), 'total'],
      ['Riser height', dim(riser), 'sub'],
      ['Tread depth + nosing', dim(run) + ' + ' + dim(nosing), 'sub'],
      ['Total run (footprint)', dim(totalRun), 'sub'],
      ['2R + T comfort', dim(comfort), 'sub'],
      ['Stringers needed', stringers + ' at ≤ ' + dim(spacing) + ' on center', 'sub']
    ],
    warn: warn,
    ok: ok,
    note: 'Cut the bottom of each stringer short by one tread thickness so the first riser matches the others. Check local code before you build.',
    draw: draw
  };
});
