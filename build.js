/*
 * Asset build: npm run build
 *  - removes Bootstrap rules no view or script uses (PurgeCSS)
 *  - merges it with assets/css/app.css and minifies -> assets/dist/site.css
 *  - minifies assets/js/app.js and every tool script -> assets/dist/
 * Production pages inline dist/site.css and load the dist scripts
 * (see application/views/layouts/main.php). Re-run after editing CSS, JS or views.
 */
const fs = require('fs');
const path = require('path');
const { PurgeCSS } = require('purgecss');
const csso = require('csso');
const { minify } = require('terser');

const root = __dirname;
const dist = path.join(root, 'assets/dist');
const kb = (s) => (Buffer.byteLength(s) / 1024).toFixed(1) + ' KB';

function walk(dir, ext, out = []) {
  for (const f of fs.readdirSync(dir, { withFileTypes: true })) {
    const p = path.join(dir, f.name);
    if (f.isDirectory()) walk(p, ext, out);
    else if (p.endsWith(ext)) out.push(p);
  }
  return out;
}

(async () => {
  fs.mkdirSync(path.join(dist, 'tools'), { recursive: true });

  // PHP views: only tag names and class="…" attributes count, so words in article text
  // (table, card, toast…) don't keep unused Bootstrap components alive.
  const fromViews = (src) => {
    const out = new Set();
    for (const m of src.matchAll(/<([a-z][a-z0-9]*)/g)) out.add(m[1]);
    for (const m of src.matchAll(/\bclass\s*=\s*"([^"]*)"/g)) m[1].split(/[\s'"<>?=:$();.,]+/).forEach((x) => x && out.add(x));
    for (const m of src.matchAll(/\b(type|role|hidden|disabled|readonly|open)\b/g)) out.add(m[1]);
    return [...out];
  };
  const fromScripts = (src) => src.match(/[A-Za-z0-9_-]+/g) || [];

  const [purged] = await new PurgeCSS().purge({
    content: [
      ...walk(path.join(root, 'application/views'), '.php').map((f) => ({ raw: fs.readFileSync(f, 'utf8'), extension: 'php' })),
      ...walk(path.join(root, 'assets/js'), '.js').map((f) => ({ raw: fs.readFileSync(f, 'utf8'), extension: 'js' })),
    ],
    extractors: [{ extractor: fromViews, extensions: ['php'] }, { extractor: fromScripts, extensions: ['js'] }],
    css: [path.join(root, 'assets/css/bootstrap.min.css')],
    safelist: { greedy: [/data-bs-theme/] },
    variables: true,
  });
  // No file inputs on the site
  const bs = purged.css.replace(/[^{}]*(file-selector-button|file-upload-button)[^{}]*\{[^{}]*\}/g, '');
  const app = fs.readFileSync(path.join(root, 'assets/css/app.css'), 'utf8');
  const css = csso.minify(bs + '\n' + app, { restructure: true }).css;
  fs.writeFileSync(path.join(dist, 'site.css'), css);
  console.log('site.css', kb(css));

  const jobs = [['assets/js/app.js', 'app.js'], ...fs.readdirSync(path.join(root, 'assets/js/tools')).filter(f => f.endsWith('.js')).map(f => ['assets/js/tools/' + f, 'tools/' + f])];
  for (const [src, out] of jobs) {
    const code = fs.readFileSync(path.join(root, src), 'utf8');
    const res = await minify(code, { compress: { passes: 2 }, mangle: true, format: { comments: false } });
    fs.writeFileSync(path.join(dist, out), res.code);
    console.log(out.padEnd(44), kb(code), '->', kb(res.code));
  }
})().catch((e) => { console.error(e); process.exit(1); });
