/* Vinyl Fence Calculator – material take-off */
Calc(function (c) {
  var L = c.num('length'), panelW = parseFloat(c.val('panel_w')) || 6, gateW = c.num('gate_w');
  var corners = Math.max(0, Math.round(c.num('corners'))), ends = Math.max(0, Math.round(c.num('ends'))), gates = Math.max(0, Math.round(c.num('gates')));

  if (!(L > 0)) return { warn: ['Enter the total fence length.'] };
  var run = L - gates * gateW;
  if (run <= 0) return { warn: ['The gate openings are longer than the fence.'] };

  // Straight runs between terminal posts; panels can be cut, so each run rounds up on its own
  var lines = ends > 0 ? Math.ceil(ends / 2) : 0;
  var segs = Math.max(1, corners + gates + lines);
  var bays = Math.ceil(run / segs / panelW);
  var panels = segs * bays;
  var terminals = ends + corners + 2 * gates;
  var linePosts = segs * Math.max(0, bays - 1);
  if (terminals === 0) linePosts = panels; // closed loop with no corners or gates
  var posts = terminals + linePosts;
  var bags = Math.ceil(posts * c.num('bags_per_post'));

  var widthFactor = panelW === 8 ? 1.25 : 1;
  var panelCost = panels * c.num('panel_price') * widthFactor;
  var lineCost = linePosts * c.num('line_post_price');
  var termCost = terminals * c.num('term_post_price');
  var capCost = posts * c.num('cap_price');
  var gateCost = gates * c.num('gate_price');
  var bagCost = bags * c.num('concrete_price');
  var total = panelCost + lineCost + termCost + capCost + gateCost + bagCost;

  var mix = [linePosts + ' line'];
  if (corners) mix.push(corners + ' corner');
  if (ends) mix.push(ends + ' end');
  if (gates) mix.push(2 * gates + ' gate');

  var warn = [];
  if (panelW === 8) warn.push('8 ft panels sag without an aluminum stiffener in the bottom rail. Budget about $20 per panel if the kit does not include one.');
  if (gates && gateW > 5) warn.push('Vinyl gates wider than 5 ft need a steel-reinforced post or a double drive gate.');

  return {
    hero: [
      { label: 'Fence panels', value: c.n(panels), sub: c.optText('height') + ', ' + panelW + ' ft wide' },
      { label: 'Posts', value: c.n(posts), sub: mix.join(', ') },
      { label: 'Material cost', value: c.money(total), sub: c.per(total / L, 'len') }
    ],
    rows: [
      ['Panels × ' + c.n(panels) + (panelW === 8 ? ' (8 ft = 1.25 × 6 ft price)' : ''), c.money(panelCost)],
      ['Line posts × ' + c.n(linePosts), c.money(lineCost)],
      ['Corner, end & gate posts × ' + c.n(terminals), c.money(termCost)],
      ['Post caps × ' + c.n(posts), c.money(capCost)],
      ['Gate kits × ' + gates, c.money(gateCost)],
      ['Concrete × ' + c.n(bags) + ' (50 lb)', c.money(bagCost)],
      ['Material total', c.money(total), 'total'],
      ['Straight runs', c.n(segs) + ', about ' + c.q(run / segs, 'len', 1) + ' each', 'sub'],
      ['Panelled length (gates removed)', c.q(run, 'len', 0), 'sub']
    ],
    warn: warn,
    note: 'Materials only. Panels at the end of each run are usually cut to fit. For an installed price with labor, use the <a href="fence-cost-calculator">fence cost calculator</a>.'
  };
});
