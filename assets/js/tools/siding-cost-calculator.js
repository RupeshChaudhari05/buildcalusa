/* Siding Cost Calculator */
Calc(function (c) {
  var gross;
  if (c.val('mode') === 'area') {
    gross = c.num('gross_area');
  } else {
    var walls = c.num('perimeter') * c.num('wall_h');
    var gables = Math.max(0, Math.round(c.num('gables'))) * c.num('gable_w') * c.num('gable_rise') / 2;
    gross = walls + gables;
  }
  if (gross <= 0) return { warn: ['Enter the wall measurements or the total wall area.'] };

  var openings = Math.round(c.num('windows')) * 15 + Math.round(c.num('doors')) * 21 + Math.round(c.num('garage')) * 112;
  var net = Math.max(0, gross - openings);
  if (net <= 0) return { warn: ['Doors and windows add up to more than the wall area. Check the counts.'] };

  var waste = Math.max(0, c.num('waste')) / 100;
  var order = net * (1 + waste);          // sq ft of siding to buy
  var squares = order / 100;
  var stories = parseFloat(c.val('stories')) || 1;
  var region = c.region();
  var LABOR = 0.5;                         // labor share of an installed price

  // Material is bought for the waste too; labor is paid on the wall actually covered
  function siding(perSqFt) {
    return order * perSqFt * (1 - LABOR) + net * perSqFt * LABOR * region * stories;
  }

  var removal = c.on('removal') ? net * c.num('removal_price') * region : 0;
  var wrap = c.on('wrap') ? net * c.num('wrap_price') : 0;
  var trim = c.on('trim') ? c.num('trim_lf') * c.num('trim_price') * region : 0;
  var extras = removal + wrap + trim;

  var main = siding(c.num('sf_price'));
  var total = main + extras;

  var rows = [['Siding installed (' + c.n(squares, 1) + ' squares)', c.money(main)]];
  if (removal) rows.push(['Old siding removal – ' + c.regionName(), c.money(removal)]);
  if (wrap) rows.push(['House wrap', c.money(wrap)]);
  if (trim) rows.push(['Soffit & fascia (' + c.q(c.num('trim_lf'), 'len', 0) + ')', c.money(trim)]);
  rows.push(['Estimated total', c.money(total), 'total']);
  rows.push(['Gross wall area', c.q(gross, 'area', 0), 'sub']);
  rows.push(['Doors & windows deducted', '−' + c.q(openings, 'area', 0), 'sub']);
  rows.push(['Siding to order (+' + Math.round(waste * 100) + '%)', c.q(order, 'area', 0), 'sub']);
  rows.push(['<strong>Same house, other siding</strong>', '', 'sub']);

  var sel = document.getElementById('material'), cur = c.val('material');
  if (sel) Array.prototype.forEach.call(sel.options, function (o) {
    var p = o.value === cur ? c.num('sf_price') : c.fx(parseFloat(o.dataset.p));
    // default prices are per sq ft (imperial); c.num() returns the field in imperial terms too
    rows.push([(o.value === cur ? '› ' : '') + o.text + ' (' + o.dataset.life + ')', c.money(siding(p) + extras), 'sub']);
  });

  return {
    hero: [
      { label: 'Estimated siding cost', value: c.money(total), sub: 'Typical range ' + c.money(total * 0.85) + ' – ' + c.money(total * 1.15) },
      { label: 'Siding squares', value: c.n(squares, 1), sub: 'incl. ' + Math.round(waste * 100) + '% waste' },
      { label: 'Net wall area', value: c.q(net, 'area', 0) },
      { label: 'Cost per sq ft', value: c.per(total / net, 'area'), sub: 'of wall covered' }
    ],
    rows: rows,
    note: 'Installed prices include starter strip, J-channel or trim, and fasteners. Corner boards, window wraps, rot repair and painting (fiber cement, wood) can add 10–20%.'
  };
});
