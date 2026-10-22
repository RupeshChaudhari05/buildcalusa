/* Chain Link Fence Calculator – material take-off */
Calc(function (c) {
  var L = c.num('length'), H = parseFloat(c.val('height')) || 6;
  var spacing = c.num('spacing'), gateW = c.num('gate_w');
  var corners = Math.max(0, Math.round(c.num('corners'))), ends = Math.max(0, Math.round(c.num('ends'))), gates = Math.max(0, Math.round(c.num('gates')));

  if (!(L > 0)) return { warn: ['Enter the total fence length.'] };
  if (!(spacing > 0)) return { warn: ['Enter the line post spacing.'] };
  var run = L - gates * gateW;
  if (run <= 0) return { warn: ['The gate openings are longer than the fence.'] };

  // Straight runs between terminal posts
  var lines = ends > 0 ? Math.ceil(ends / 2) : 0;
  var segs = Math.max(1, corners + gates + lines);
  var bays = Math.ceil(run / segs / spacing);
  var linePosts = segs * Math.max(0, bays - 1);
  var terminals = ends + corners + 2 * gates;
  if (terminals === 0) linePosts = segs * bays; // closed loop with no corners or gates

  var rolls = Math.ceil(run / 50);
  var railSticks = Math.ceil(run / 20.5); // 21 ft swaged sticks, ~6 in lost at each joint
  var bars = ends + 2 * corners + 2 * gates; // one per fabric end at each terminal
  var bands = bars * (H - 1);
  var braceBands = bars, endCups = bars;
  var ties = linePosts * H + Math.ceil(run / 2); // 1 per ft on line posts, 1 per 24 in on top rail
  var tieBags = Math.ceil(ties / 100);
  var bags = Math.ceil(linePosts * 1.5 + terminals * 2.5);

  // Fittings at typical store prices (USD, converted to the chosen currency)
  var fit = {
    bars: bars * c.fx(H),
    bands: bands * c.fx(1.25),
    brace: braceBands * c.fx(1.5),
    cups: endCups * c.fx(3),
    loop: linePosts * c.fx(2.5),
    dome: terminals * c.fx(4),
    ties: tieBags * c.fx(12)
  };
  var fittings = 0;
  for (var k in fit) fittings += fit[k];

  var fabricCost = rolls * c.num('fabric_price') * (parseFloat(c.val('gauge')) || 1);
  var lineCost = linePosts * c.num('line_post_price');
  var termCost = terminals * c.num('term_post_price');
  var railCost = railSticks * c.num('rail_price');
  var gateCost = gates * c.num('gate_price');
  var bagCost = bags * c.num('concrete_price');
  var total = fabricCost + lineCost + termCost + railCost + fittings + gateCost + bagCost;

  var warn = [];
  if (spacing > 10) warn.push('Keep line posts at 10 ft or closer. Wider spacing lets the fabric sag between posts.');

  return {
    hero: [
      { label: 'Fabric rolls (50 ft)', value: c.n(rolls), sub: H + ' ft high, ' + c.q(run, 'len', 0) + ' to cover' },
      { label: 'Posts', value: c.n(linePosts + terminals), sub: linePosts + ' line, ' + terminals + ' terminal' },
      { label: 'Top rail', value: c.n(railSticks) + ' sticks', sub: '21 ft, swaged' },
      { label: 'Material cost', value: c.money(total), sub: c.per(total / L, 'len') }
    ],
    rows: [
      ['Fabric × ' + rolls + ' rolls' + (c.val('gauge') !== '1' ? ' (9 gauge)' : ''), c.money(fabricCost)],
      ['Line posts × ' + linePosts + ' (' + c.q(H + 2, 'len', 0) + ')', c.money(lineCost)],
      ['Terminal posts × ' + terminals + ' (end, corner, gate)', c.money(termCost)],
      ['Top rail × ' + railSticks, c.money(railCost)],
      ['Tension bars × ' + bars + ', tension bands × ' + bands, c.money(fit.bars + fit.bands)],
      ['Brace bands × ' + braceBands + ', rail end cups × ' + endCups, c.money(fit.brace + fit.cups)],
      ['Loop caps × ' + linePosts + ', dome caps × ' + terminals, c.money(fit.loop + fit.dome)],
      ['Fence ties: ' + c.n(ties) + ' (' + tieBags + ' bags of 100)', c.money(fit.ties)],
      ['Walk gates × ' + gates, c.money(gateCost)],
      ['Concrete × ' + bags + ' (50 lb)', c.money(bagCost)],
      ['Material total', c.money(total), 'total']
    ],
    warn: warn,
    note: 'Materials only; carriage bolts come with the bands. For an installed price with labor, use the <a href="fence-cost-calculator">fence cost calculator</a>.'
  };
});
