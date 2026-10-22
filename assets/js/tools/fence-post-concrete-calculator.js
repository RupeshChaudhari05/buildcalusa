/* Fence Post Concrete Calculator */
Calc(function (c) {
  var posts = Math.max(0, Math.round(c.num('posts')));
  var d = c.num('hole_d'), depth = c.num('hole_depth'), p = c.num('post_size');
  var round = c.opt('post').shape === 'round';
  var yieldFt3 = parseFloat(c.opt('bag').yield) || 0.6;
  var waste = Math.max(0, c.num('waste')) / 100;
  var gravel = c.on('gravel');
  var fenceIn = c.num('fence_h') * 12;

  if (posts <= 0 || d <= 0 || depth <= 0) return { warn: ['Enter the number of posts and the hole size.'] };
  if (p >= d) return { warn: ['The post is as wide as the hole. Make the hole about 3 times the post width.'] };

  // Concrete fills the hole around the embedded post; a gravel base takes the bottom 6 in.
  var gravelIn = gravel ? Math.min(6, depth) : 0;
  var concIn = depth - gravelIn;
  var holeArea = Math.PI * Math.pow(d / 2, 2);
  var postArea = round ? Math.PI * Math.pow(p / 2, 2) : p * p;
  var perPostFt3 = (holeArea - postArea) * concIn / 1728;
  var perPostWaste = perPostFt3 * (1 + waste);
  var bagsPerPost = perPostWaste / yieldFt3;
  var totalBags = Math.ceil(bagsPerPost * posts);
  var noSplit = Math.ceil(bagsPerPost) * posts;
  var concCost = totalBags * c.num('bag_price');

  var gravelBags = gravel ? Math.ceil(holeArea * gravelIn / 1728 * posts / 0.5) : 0;
  var gravelCost = gravelBags * c.num('gravel_price');
  var total = concCost + gravelCost;

  // Rules of thumb: hole about 3x the post width, depth a third of the above-ground height plus 6 in
  var ok = [], warn = [];
  var minD = p * 2.5, goodD = p * 3;
  var minDepth = fenceIn / 3 + 6;
  if (d < minD) warn.push('Hole is narrow for this post. Aim for about ' + c.q(goodD, 'in', 0) + ' wide so there is concrete all around it.');
  else ok.push('Hole width works for this post (rule of thumb: about ' + c.q(goodD, 'in', 0) + ').');
  if (fenceIn > 0 && depth < minDepth) warn.push('Hole is shallow for a ' + c.q(fenceIn / 12, 'len', 0) + ' fence. Go at least ' + c.q(Math.ceil(minDepth), 'in', 0) + ' deep, deeper below your frost line.');
  else if (fenceIn > 0) ok.push('Depth meets the one-third-plus-6-inch rule (' + c.q(Math.ceil(minDepth), 'in', 0) + ').');

  var rows = [
    ['Concrete per hole (incl. ' + c.n(waste * 100) + '% extra)', c.q(perPostWaste, 'cuft', 2)],
    ['Bags per post (' + c.optText('bag').split(' (')[0] + ')', c.n(bagsPerPost, 1)],
    ['Concrete bags × ' + c.n(totalBags), c.money(concCost)]
  ];
  if (gravel) rows.push(['Gravel bags (0.5 ft³) × ' + c.n(gravelBags), c.money(gravelCost)]);
  rows.push(['Estimated total', c.money(total), 'total']);
  rows.push(['If every hole gets whole bags only', c.n(noSplit) + ' bags', 'sub']);
  rows.push(['Concrete depth in each hole', c.q(concIn, 'in', 0), 'sub']);
  rows.push(['Total concrete', c.q(perPostWaste * posts, 'cuft', 1), 'sub']);

  return {
    hero: [
      { label: 'Bags per post', value: c.n(bagsPerPost, 1), sub: c.optText('bag').split(' (')[0] + ', ' + c.n(posts) + ' posts' },
      { label: 'Total bags', value: c.n(totalBags), sub: 'Mixing leftovers into the next hole' },
      { label: 'Concrete cost', value: c.money(total), sub: c.money(total / posts, 2) + ' per post' }
    ],
    rows: rows,
    ok: ok,
    warn: warn,
    note: 'Buy two or three spare bags. Holes dug by hand usually end up wider at the top than planned, and one rock pocket can eat a whole bag.'
  };
});
