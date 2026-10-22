/* Wood Fence Calculator – material take-off */
Calc(function (c) {
  var L = c.num('length'), H = parseFloat(c.val('height')) || 6;
  var spacing = c.num('spacing'), gateW = c.num('gate_w');
  var corners = Math.max(0, Math.round(c.num('corners'))), ends = Math.max(0, Math.round(c.num('ends'))), gates = Math.max(0, Math.round(c.num('gates')));
  var pw = c.num('picket_w'), pitch = pw + c.num('gap') - c.num('overlap');
  var railsPer = Math.max(1, Math.round(c.num('rails')));

  if (!(L > 0)) return { warn: ['Enter the total fence length.'] };
  if (!(spacing > 0)) return { warn: ['Enter the post spacing.'] };
  if (!(pitch > 0)) return { warn: ['The overlap has to be smaller than the picket width plus the gap.'] };

  var run = L - gates * gateW; // length that gets pickets
  if (run <= 0) return { warn: ['The gate openings are longer than the fence.'] };

  // Straight runs between terminal posts (ends, corners, gate posts)
  var lines = ends > 0 ? Math.ceil(ends / 2) : 0;
  var segs = Math.max(1, corners + gates + lines);
  var bays = Math.ceil(run / segs / spacing);
  var sections = segs * bays;
  var terminals = ends + corners + 2 * gates;
  var linePosts = segs * Math.max(0, bays - 1);
  var posts = terminals + linePosts;
  if (terminals === 0) posts = sections; // closed loop with no corners or gates

  var pickets = Math.ceil(run * 12 / pitch * (1 + Math.max(0, c.num('waste')) / 100));
  var rails = sections * railsPer;
  var stock = [8, 10, 12, 16];
  var railLen = stock.filter(function (s) { return s >= spacing; })[0] || 16;
  var postLen = [8, 10, 12, 14, 16].filter(function (s) { return s >= H + c.num('post_depth'); })[0] || 16;
  var screws = pickets * railsPer * 2 + rails * 4;
  var boxes = Math.ceil(screws / 450);
  var bags = Math.ceil(posts * c.num('bags_per_post'));

  var picketCost = pickets * c.num('picket_price');
  var railCost = rails * c.num('rail_price') * railLen / 8;
  var postCost = posts * c.num('post_price') * postLen / 8;
  var bagCost = bags * c.num('concrete_price');
  var screwCost = boxes * c.num('screw_price');
  var gateCost = gates * c.num('gate_hw_price');
  var total = picketCost + railCost + postCost + bagCost + screwCost + gateCost;

  var warn = [];
  if (spacing > 8) warn.push('Spans over 8 ft let 2×4 rails sag. Keep posts at 8 ft or less for wood.');
  if (H >= 8 && railsPer < 4) warn.push('An 8 ft fence needs at least 4 rails to keep pickets from cupping.');
  if (c.num('post_depth') < H / 3) warn.push('Bury about a third of the above-ground height, and go below the frost line in cold states.');

  return {
    hero: [
      { label: 'Pickets', value: c.n(pickets), sub: c.q(pw, 'in', 1) + ' wide, incl. ' + Math.round(c.num('waste')) + '% waste' },
      { label: 'Posts', value: c.n(posts), sub: c.q(postLen, 'len', 0) + ' 4×4s' },
      { label: 'Rails', value: c.n(rails), sub: c.q(railLen, 'len', 0) + ' 2×4s' },
      { label: 'Material cost', value: c.money(total), sub: c.per(total / L, 'len') }
    ],
    rows: [
      ['Pickets × ' + c.n(pickets), c.money(picketCost)],
      ['Rails × ' + c.n(rails) + ' (' + railsPer + ' per section)', c.money(railCost)],
      ['Posts × ' + c.n(posts) + ' (' + terminals + ' end/corner/gate, ' + linePosts + ' line)', c.money(postCost)],
      ['Fast-set concrete × ' + c.n(bags) + ' (50 lb)', c.money(bagCost)],
      ['Exterior screws: ' + c.n(screws) + ' (' + boxes + ' × 5 lb box)', c.money(screwCost)],
      ['Gate hardware × ' + gates, c.money(gateCost)],
      ['Material total', c.money(total), 'total'],
      ['Sections', c.n(sections) + ' at ≤ ' + c.q(spacing, 'len', 1), 'sub'],
      ['Picketed length (gates removed)', c.q(run, 'len', 0), 'sub']
    ],
    warn: warn,
    note: 'Materials only; the gate itself is not included. For an installed price with labor for your state, use the <a href="fence-cost-calculator">fence cost calculator</a>.'
  };
});
