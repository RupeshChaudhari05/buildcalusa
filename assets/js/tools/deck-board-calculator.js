/* Deck Board Calculator */
Calc(function (c) {
  var L = c.num('length'), W = c.num('width');
  var b = c.opt('board'), f = c.opt('fastener');
  var boardW = parseFloat(b.w) || 5.5, boardLen = parseFloat(c.val('board_len')) || 16;
  var gap = Math.max(c.num('gap'), 0), joist = Math.max(c.num('joist'), 1);
  var waste = Math.max(c.num('waste'), 0) / 100;

  if (L <= 0 || W <= 0) return { warn: ['Enter the deck length and width.'] };

  var area = L * W;
  var rows = Math.ceil(W * 12 / (boardW + gap));
  var crossings = Math.floor(L * 12 / joist) + 1;
  var linear = rows * L;
  var boards = Math.ceil(linear * (1 + waste) / boardLen);

  var perCross = parseFloat(f.per) || 2;
  var fasteners = Math.ceil(rows * crossings * perCross);
  var boxes = Math.ceil(fasteners / (parseFloat(f.box) || 350));
  var fastCost = boxes * c.fx(parseFloat(f.boxprice) || 40);

  var boardPrice = c.num('board_price');
  var boardCost = boards * boardLen * boardPrice;
  var labor = c.on('diy') ? 0 : area * c.num('labor_price') * c.region();
  var total = boardCost + fastCost + labor;

  var warn = [];
  if (joist > (parseFloat(b.max) || 16)) warn.push('Joist spacing is wider than this board allows (' + b.max + '" o.c. max). Most composite and 5/4 boards need 16" o.c., or 12" for diagonal layouts.');
  if (gap < 0.125 && c.val('board').indexOf('pt') === 0) warn.push('Wet pressure-treated boards shrink as they dry; many builders install them tight and let the gap open naturally.');

  var fastName = c.val('fastener') === 'clips' ? 'Hidden clips' : 'Deck screws';

  return {
    hero: [
      { label: 'Deck boards needed', value: c.n(boards) + ' × ' + c.q(boardLen, 'len', c.sys === 'metric' ? 1 : 0), sub: 'Includes ' + c.n(waste * 100) + '% waste · ' + c.n(rows) + ' rows' },
      { label: 'Deck area', value: c.q(area, 'area', 0) },
      { label: 'Linear feet', value: c.q(linear, 'len', 0), sub: 'Before waste' },
      { label: 'Total cost', value: c.money(total) },
      { label: 'Cost per ' + c.unit('area'), value: c.per(total / area, 'area') }
    ],
    rows: [
      ['Boards: ' + c.n(boards) + ' × ' + c.money(boardLen * boardPrice, 2), c.money(boardCost)],
      [fastName + ': ' + c.n(fasteners) + ' (' + c.n(boxes) + ' box' + (boxes > 1 ? 'es' : '') + ')', c.money(fastCost)],
      [c.on('diy') ? 'Labor (DIY)' : 'Install labor – ' + c.regionName(), c.money(labor)],
      ['Estimated total', c.money(total), 'total'],
      ['Joist crossings per row', c.n(crossings), 'sub'],
      ['Board rows across width', c.n(rows), 'sub']
    ],
    warn: warn,
    note: 'Decking only: framing, joists, railings, stairs and permits are extra. Stagger butt joints over joists, and leave about 1/8" end gaps on composite boards.'
  };
});
