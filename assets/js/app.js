/* BuildCalcUSA – shared UI + calculator engine (no dependencies) */
(function () {
  'use strict';
  var d = document, root = d.documentElement;
  var store = {
    get: function (k) { try { return localStorage.getItem(k); } catch (e) { return null; } },
    set: function (k, v) { try { localStorage.setItem(k, v); } catch (e) {} }
  };

  /* ---------- Theme ---------- */
  d.querySelectorAll('[data-theme-toggle]').forEach(function (b) {
    b.addEventListener('click', function () {
      var t = root.getAttribute('data-bs-theme') === 'dark' ? 'light' : 'dark';
      root.setAttribute('data-bs-theme', t);
      store.set('theme', t);
    });
  });

  /* ---------- Mobile nav ---------- */
  var navBtn = d.querySelector('[data-nav-toggle]'), nav = d.getElementById('nav');
  if (navBtn && nav) {
    navBtn.addEventListener('click', function () {
      var open = nav.classList.toggle('open');
      navBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
  }

  /* ---------- Home: filter the tool index ---------- */
  var filter = d.querySelector('[data-filter]');
  if (filter) {
    filter.addEventListener('input', function () {
      var q = filter.value.trim().toLowerCase(), any = false;
      d.querySelectorAll('.filter-group').forEach(function (g) {
        var shown = 0;
        g.querySelectorAll('.tool-grid > div').forEach(function (li) {
          var hit = !q || li.textContent.toLowerCase().indexOf(q) !== -1;
          li.hidden = !hit; if (hit) shown++;
        });
        g.hidden = !shown; if (shown) any = true;
      });
      var empty = d.querySelector('.filter-empty');
      if (empty) empty.hidden = any;
    });
  }

  /* ---------- Toast ---------- */
  var toastT;
  function toast(msg) {
    var toastEl = d.querySelector('.toast-msg'); // looked up late: on tool pages this script runs before the footer exists
    if (!toastEl) return;
    toastEl.textContent = msg; toastEl.hidden = false;
    clearTimeout(toastT); toastT = setTimeout(function () { toastEl.hidden = true; }, 2200);
  }
  function copyText(txt, msg) {
    var done = function () { toast(msg || 'Copied'); };
    if (navigator.clipboard && window.isSecureContext) { navigator.clipboard.writeText(txt).then(done); return; }
    var ta = d.createElement('textarea'); ta.value = txt; ta.style.position = 'fixed'; ta.style.opacity = '0';
    d.body.appendChild(ta); ta.select(); try { d.execCommand('copy'); done(); } catch (e) {} ta.remove();
  }

  /* ---------- Share (uses the live URL, so calculator inputs are included) ---------- */
  var NETS = {
    x: 'https://twitter.com/intent/tweet?url={u}&text={t}',
    facebook: 'https://www.facebook.com/sharer/sharer.php?u={u}',
    whatsapp: 'https://wa.me/?text={t}%20{u}',
    pinterest: 'https://pinterest.com/pin/create/button/?url={u}&description={t}',
    reddit: 'https://www.reddit.com/submit?url={u}&title={t}',
    linkedin: 'https://www.linkedin.com/sharing/share-offsite/?url={u}',
    email: 'mailto:?subject={t}&body={u}'
  };
  d.addEventListener('click', function (ev) {
    var a = ev.target.closest('[data-share]');
    if (!a) return;
    ev.preventDefault();
    var net = a.getAttribute('data-share'), url = location.href, title = d.title;
    if (net === 'native') {
      if (navigator.share) { navigator.share({ title: title, url: url }).catch(function () {}); }
      else { copyText(url, 'Link copied – paste it anywhere'); }
      return;
    }
    if (net === 'copy') { copyText(url, 'Link copied – it includes your numbers'); return; }
    var href = NETS[net].replace('{u}', encodeURIComponent(url)).replace('{t}', encodeURIComponent(title));
    if (net === 'email') { location.href = href; return; }
    window.open(href, '_blank', 'noopener,width=640,height=560');
  });

  /* ---------- Lazy third-party scripts (AdSense / GA4) – keeps LCP & INP fast ---------- */
  var thirdLoaded = false;
  function addScript(src, attrs) {
    var s = d.createElement('script'); s.async = true; s.src = src;
    for (var k in attrs || {}) s.setAttribute(k, attrs[k]);
    d.head.appendChild(s);
  }
  function loadThird() {
    if (thirdLoaded) return; thirdLoaded = true;
    var ads = d.body.getAttribute('data-ads'), ga = d.body.getAttribute('data-ga');
    var units = d.querySelectorAll('ins.adsbygoogle');
    if (ads && units.length) {
      addScript('https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=' + ads, { crossorigin: 'anonymous' });
      units.forEach(function () { (window.adsbygoogle = window.adsbygoogle || []).push({}); });
    }
    if (ga) {
      addScript('https://www.googletagmanager.com/gtag/js?id=' + ga);
      window.dataLayer = window.dataLayer || [];
      window.gtag = function () { window.dataLayer.push(arguments); };
      window.gtag('js', new Date()); window.gtag('config', ga);
    }
  }
  ['scroll', 'pointerdown', 'keydown', 'touchstart'].forEach(function (e) {
    addEventListener(e, loadThird, { once: true, passive: true });
  });
  addEventListener('load', function () { setTimeout(loadThird, 3000); });

  /* =================================================================
     Calculator engine
     Fields carry data-u="<kind>" (see UNITS) to be unit-aware and
     data-money to be currency-aware. Values typed in the current
     system/currency; C.num() always returns imperial units, so tool
     formulas are written once in feet / inches / USD-style numbers.
     ================================================================= */
  var UNITS = { // metric = imperial * f
    len:   { f: 0.3048,      i: 'ft',    m: 'm' },
    in:    { f: 2.54,        i: 'in',    m: 'cm' },
    area:  { f: 0.09290304,  i: 'sq ft', m: 'm²' },
    vol:   { f: 0.764555,    i: 'yd³',   m: 'm³' },
    cuft:  { f: 0.0283168,   i: 'ft³',   m: 'm³' },
    ton:   { f: 0.907185,    i: 'tons',  m: 'tonnes' },
    lb:    { f: 0.453592,    i: 'lb',    m: 'kg' },
    plen:  { f: 1 / 0.3048,     i: '/ft',    m: '/m' },
    parea: { f: 1 / 0.09290304, i: '/sq ft', m: '/m²' },
    pvol:  { f: 1 / 0.764555,   i: '/yd³',   m: '/m³' },
    pton:  { f: 1 / 0.907185,   i: '/ton',   m: '/tonne' }
  };
  // Approximate exchange rates from USD (edit prices for local quotes)
  var CUR = {
    USD: { r: 1,    loc: 'en-US' },
    CAD: { r: 1.37, loc: 'en-CA' },
    GBP: { r: 0.78, loc: 'en-GB' },
    EUR: { r: 0.91, loc: 'de-DE' },
    AUD: { r: 1.53, loc: 'en-AU' },
    NZD: { r: 1.68, loc: 'en-NZ' }
  };
  var CUR_REGION = { GBP: 'GB', EUR: 'EU', AUD: 'AU', NZD: 'NZ', CAD: 'CA-INTL' };

  // Intl formatters are slow to construct; build each variant once.
  var FMT = {};
  function fmt(loc, opts) {
    var key = loc + JSON.stringify(opts);
    return FMT[key] || (FMT[key] = new Intl.NumberFormat(loc, opts));
  }

  function guessLocale() {
    var l = (navigator.language || 'en-US').toLowerCase();
    if (/^en-gb/.test(l)) return ['metric', 'GBP'];
    if (/^en-au/.test(l)) return ['metric', 'AUD'];
    if (/^en-nz/.test(l)) return ['metric', 'NZD'];
    if (/^en-ca|^fr-ca/.test(l)) return ['imperial', 'CAD'];
    if (/^(de|fr|es|it|nl|pt|pl|sv|da|fi|en-ie|ga)/.test(l)) return ['metric', 'EUR'];
    return ['imperial', 'USD'];
  }

  function Calc(compute) {
    var form = d.getElementById('calc');
    if (!form) return;
    var self = this;
    this.form = form;
    this.sys = 'imperial';
    this.cur = 'USD';
    this.compute = compute;
    this.last = null;

    var q = new URLSearchParams(location.search);
    var g = guessLocale();
    var sys = q.get('u') === 'm' ? 'metric' : q.get('u') === 'i' ? 'imperial' : (store.get('sys') || g[0]);
    var cur = CUR[q.get('c')] ? q.get('c') : (CUR[store.get('cur')] ? store.get('cur') : g[1]);

    // Defaults in the HTML are imperial / USD; convert them to the visitor's system
    this.setSys(sys, true);
    this.setCur(cur, true);
    var region = form.elements.namedItem('region');
    if (region && !q.has('region') && CUR_REGION[cur]) region.value = CUR_REGION[cur];

    // Restore shared values from the URL
    q.forEach(function (val, key) {
      var el = form.elements.namedItem(key);
      if (!el || key === 'u' || key === 'c') return;
      if (el.type === 'checkbox') el.checked = val === '1';
      else if (el.length && el[0] && el[0].type === 'radio') { el.forEach(function (r) { r.checked = r.value === val; }); }
      else el.value = val;
    });

    form.addEventListener('input', function () { self.run(); });
    form.addEventListener('change', function (ev) {
      var t = ev.target;
      if (t.hasAttribute && t.hasAttribute('data-fill')) self.fill(t);
      self.run();
    });
    form.addEventListener('submit', function (ev) { ev.preventDefault(); self.run(); });

    d.querySelectorAll('[data-sys]').forEach(function (b) {
      b.addEventListener('click', function () { self.setSys(b.getAttribute('data-sys'), true); store.set('sys', self.sys); self.run(); });
    });
    var curSel = d.querySelector('[data-cur]');
    if (curSel) curSel.addEventListener('change', function () { self.setCur(curSel.value, true); store.set('cur', self.cur); self.run(); });

    d.querySelectorAll('[data-calc-action]').forEach(function (b) {
      b.addEventListener('click', function () {
        var a = b.getAttribute('data-calc-action');
        if (a === 'copy') copyText(self.text(), 'Results copied');
        if (a === 'print') window.print();
        if (a === 'reset') location.href = location.pathname;
      });
    });

    this.run();
  }

  Calc.prototype = {
    // namedItem(), not elements[n]: a field called "length" would otherwise return the item count
    el: function (n) { return this.form.elements.namedItem(n); },

    /** Numeric value in imperial base units (ft, in, sq ft, yd³ …). */
    num: function (n) {
      var el = this.el(n);
      if (!el) return 0;
      var v = parseFloat(String(el.value).replace(',', '.'));
      if (!isFinite(v)) v = 0;
      var u = el.getAttribute && el.getAttribute('data-u');
      if (u && this.sys === 'metric') v = v / UNITS[u].f;
      return v;
    },
    /** Raw string value (selects / radios). */
    val: function (n) { var el = this.el(n); return el ? el.value : ''; },
    on: function (n) { var el = this.el(n); return !!(el && el.checked); },
    /** dataset of the selected <option>. */
    opt: function (n) {
      var el = this.el(n);
      return el && el.options ? (el.options[el.selectedIndex] || {}).dataset || {} : {};
    },
    optText: function (n) {
      var el = this.el(n);
      return el && el.options ? el.options[el.selectedIndex].text : '';
    },
    /** Labor-cost multiplier from the region select (1 when absent). */
    region: function () { var i = parseFloat(this.opt('region').index); return isFinite(i) ? i : 1; },
    regionName: function () { return this.el('region') ? this.optText('region') : ''; },

    /* ----- unit / currency switching ----- */
    convertField: function (el, factor) {
      var v = parseFloat(el.value);
      if (!isFinite(v) || v === 0) return;
      var n = v * factor;
      el.value = String(+n.toFixed(Math.abs(n) < 10 ? 2 : 1));
    },
    setSys: function (sys, convert) {
      var self = this;
      if (convert && sys !== this.sys) {
        this.form.querySelectorAll('[data-u]').forEach(function (el) {
          var f = UNITS[el.getAttribute('data-u')].f;
          self.convertField(el, sys === 'metric' ? f : 1 / f);
        });
      }
      this.sys = sys;
      d.querySelectorAll('[data-sys]').forEach(function (b) { b.setAttribute('aria-pressed', b.getAttribute('data-sys') === sys ? 'true' : 'false'); });
      d.querySelectorAll('[data-ul]').forEach(function (s) { s.textContent = self.unit(s.getAttribute('data-ul')); });
    },
    setCur: function (cur, convert) {
      var self = this;
      if (convert && cur !== this.cur) {
        var f = CUR[cur].r / CUR[this.cur].r;
        this.form.querySelectorAll('[data-money]').forEach(function (el) { self.convertField(el, f); });
      }
      this.cur = cur;
      var sel = d.querySelector('[data-cur]');
      if (sel) sel.value = cur;
      var sym = this.sym();
      d.querySelectorAll('[data-cs]').forEach(function (s) { s.textContent = sym; });
    },
    sym: function () {
      return (fmt(CUR[this.cur].loc, { style: 'currency', currency: this.cur, minimumFractionDigits: 0, maximumFractionDigits: 0 })
        .formatToParts(0).filter(function (p) { return p.type === 'currency'; })[0] || { value: '$' }).value;
    },
    /** Copy an option's data-set-<field> defaults (USD, imperial) into fields. */
    fill: function (select) {
      var o = select.options[select.selectedIndex], self = this;
      if (!o) return;
      Object.keys(o.dataset).forEach(function (k) {
        if (k.indexOf('set') !== 0) return;
        var name = k.slice(3).replace(/^[A-Z]/, function (c) { return c.toLowerCase(); }).replace(/[A-Z]/g, function (c) { return '_' + c.toLowerCase(); });
        var el = self.el(name);
        if (!el) return;
        var v = parseFloat(o.dataset[k]);
        var u = el.getAttribute('data-u');
        if (u && self.sys === 'metric') v *= UNITS[u].f;
        if (el.hasAttribute('data-money')) v *= CUR[self.cur].r;
        el.value = String(+v.toFixed(Math.abs(v) < 10 ? 2 : 1));
      });
    },
    /** Convert a USD default to the current currency (for formulas with built-in prices). */
    fx: function (usd) { return usd * CUR[this.cur].r; },

    /* ----- formatting ----- */
    unit: function (kind) { var u = UNITS[kind]; return u ? (this.sys === 'metric' ? u.m : u.i) : kind; },
    n: function (v, dec) {
      dec = dec === undefined ? 0 : dec;
      return fmt(CUR[this.cur].loc, { minimumFractionDigits: 0, maximumFractionDigits: dec }).format(isFinite(v) ? v : 0);
    },
    /** Format an imperial quantity in the current system: q(12, 'len') -> "12 ft" / "3.66 m". */
    q: function (v, kind, dec) {
      var u = UNITS[kind];
      if (this.sys === 'metric') v = v * u.f;
      return this.n(v, dec === undefined ? (this.sys === 'metric' ? 2 : 1) : dec) + ' ' + this.unit(kind);
    },
    money: function (v, dec) {
      return fmt(CUR[this.cur].loc, { style: 'currency', currency: this.cur, minimumFractionDigits: dec || 0, maximumFractionDigits: dec || 0 }).format(isFinite(v) ? v : 0);
    },
    /** Price per imperial quantity, shown per current unit: per(9.5, 'len') -> "$9.50/ft" or "$31.17/m". */
    per: function (pricePerImperial, kind) {
      var u = UNITS[kind];
      var p = this.sys === 'metric' ? pricePerImperial / u.f : pricePerImperial;
      return this.money(p, 2) + '/' + this.unit(kind).replace(/^\//, '');
    },

    /* ----- render ----- */
    run: function () {
      var self = this;
      // conditional fields: data-show="field:val1|val2"
      this.form.querySelectorAll('[data-show]').forEach(function (box) {
        var rule = box.getAttribute('data-show').split(':'), el = self.el(rule[0]);
        var cur = !el ? '' : el.type === 'checkbox' ? (el.checked ? '1' : '0') : el.value;
        var show = rule[1].split('|').indexOf(cur) !== -1;
        box.hidden = !show;
      });

      var r;
      try { r = this.compute(this) || {}; } catch (e) { r = { warn: ['Check your inputs.'] }; if (window.console) console.error(e); }
      this.last = r;

      var hero = d.getElementById('calc-hero');
      if (hero) {
        hero.innerHTML = (r.hero || []).map(function (h, i) {
          return '<div class="stat' + (i === 0 ? ' main' : '') + '"><div class="k">' + h.label + '</div><div class="v">' + h.value + '</div>' + (h.sub ? '<div class="s">' + h.sub + '</div>' : '') + '</div>';
        }).join('');
      }
      var rows = d.getElementById('calc-rows');
      if (rows) {
        rows.innerHTML = (r.rows || []).map(function (row) {
          return '<tr' + (row[2] ? ' class="' + row[2] + '"' : '') + '><td>' + row[0] + '</td><td>' + row[1] + '</td></tr>';
        }).join('');
      }
      var note = d.getElementById('calc-note');
      if (note) {
        note.innerHTML = (r.warn || []).map(function (w) { return '<div class="calc-warn">' + w + '</div>'; }).join('')
          + (r.ok || []).map(function (w) { return '<div class="calc-ok">' + w + '</div>'; }).join('')
          + (r.note ? '<p class="calc-note mb-2">' + r.note + '</p>' : '');
      }
      if (typeof r.draw === 'function') r.draw();
      if (hero && hero.parentNode) hero.parentNode.classList.add('ready');

      clearTimeout(this.urlT);
      this.urlT = setTimeout(function () { self.saveUrl(); }, 350);
    },
    /** Mirror inputs in the URL so results can be bookmarked and shared. */
    saveUrl: function () {
      var p = new URLSearchParams(), form = this.form, changed = false;
      Array.prototype.forEach.call(form.elements, function (el) {
        if (!el.name || el.disabled) return;
        if (el.type === 'radio') { if (el.checked && !el.defaultChecked) { p.set(el.name, el.value); changed = true; } return; }
        if (el.type === 'checkbox') { if (el.checked !== el.defaultChecked) { p.set(el.name, el.checked ? '1' : '0'); changed = true; } return; }
        var def = el.tagName === 'SELECT'
          ? (Array.prototype.filter.call(el.options, function (o) { return o.defaultSelected; })[0] || el.options[0] || {}).value
          : el.defaultValue;
        if (String(el.value) !== String(def)) { p.set(el.name, el.value); changed = true; }
      });
      if (this.sys === 'metric') { p.set('u', 'm'); changed = true; }
      if (this.cur !== 'USD') { p.set('c', this.cur); changed = true; }
      var qs = p.toString();
      history.replaceState(null, '', location.pathname + (changed && qs ? '?' + qs : '') + location.hash);
    },
    text: function () {
      var r = this.last || {}, strip = function (s) { return String(s).replace(/<[^>]+>/g, ''); };
      var out = [d.title.split(' – ')[0].split(' [')[0]];
      (r.hero || []).forEach(function (h) { out.push(strip(h.label) + ': ' + strip(h.value)); });
      (r.rows || []).forEach(function (row) { out.push(strip(row[0]) + ': ' + strip(row[1])); });
      out.push('', location.href);
      return out.join('\n');
    }
  };

  // Tool scripts load straight after the calculator markup, so it can run at once (before first paint).
  window.Calc = function (compute) {
    var go = function () { return new Calc(compute); };
    if (d.getElementById('calc') || d.readyState !== 'loading') go(); else d.addEventListener('DOMContentLoaded', go);
  };
  window.Calc.toast = toast;
})();
