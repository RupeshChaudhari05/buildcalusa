# BuildCalcUSA – launch checklist (CodeIgniter 3)

## Where things live
| What | File |
|---|---|
| Tool list, publish dates, titles, meta descriptions | `application/libraries/Tool_registry.php` |
| Site settings (AdSense, GA4, affiliate ids, author, price year) | `application/config/site.php` |
| Local-only overrides (preview all tools) | `application/config/development/site.php` |
| Routes | `application/config/routes.php` |
| Calculator form / article for a tool | `application/views/tools/{slug}/calculator.php`, `content.php` |
| FAQ, HowTo, shopping list, sources for a tool | `application/data/tools/{slug}.php` |
| Calculator formula | `assets/js/tools/{slug}.js` |
| Shared engine (units, currency, share URL, ads lazy-load) | `assets/js/app.js` |
| Labor index by state / country | `application/data/regions.php` |

## Build step (speed)
Run these after changing any CSS, JS or view, and before every deploy:

```
npm install          # first time only
npm run build        # purges Bootstrap, minifies CSS+JS -> assets/dist/
php build-images.php # after adding a tool: share images, icons, favicon.ico
```

Production pages inline `assets/dist/site.css` (~8 KB gzipped) and load the minified scripts from `assets/dist/`.
Localhost uses the readable source files. If `assets/dist/` is missing, production falls back to the source files.
Upload `assets/dist/`. You don't need to upload `node_modules/`.

## Release schedule (one tool every 3 days)
| Date | Tool | Date | Tool |
|---|---|---|---|
| Oct 24 | Fence cost | Nov 17 | Gravel |
| Oct 27 | Deck boards | Nov 20 | Pavers |
| Oct 30 | Asphalt | Nov 23 | Roof pitch |
| Nov 2 | Roofing shingles | Nov 26 | Paint |
| Nov 5 | Concrete | Nov 29 | Retaining wall |
| Nov 8 | Stair stringer | Dec 2 | Concrete block |
| Nov 11 | Drywall | Dec 5 | Flooring |
| Nov 14 | Tile | Dec 8 | Mulch |
| | | Dec 11 | Insulation |
| | | Dec 14 | Board foot |
| | | Dec 17 | Contractor markup |
| | | Dec 20 | Bathroom remodel cost |
| Dec 23 | Wood fence (materials) | Jan 4 | Deck cost |
| Dec 26 | Fence post concrete | Jan 7 | Roof cost (asphalt/metal/tile) |
| Dec 29 | Vinyl fence (materials) | Jan 10 | Siding cost |
| Jan 1 | Chain link fence (materials) | Jan 13 | Deck & fence stain |
| Jan 16 | Dumpster rental cost | Jan 22 | Dumpster weight |
| Jan 19 | Dumpster size | Jan 25 | Junk removal cost |

The dumpster tools sit in the "Demolition & Debris" hub (`/demolition-debris-calculators`).
Towing was left out on purpose: it is an auto topic, not construction, and would dilute the site's topical focus.

**Before the January launches:** re-check prices, then raise `price_year` to 2027. Otherwise titles still say [2026] in 2027.

**No duplicate-intent pages.** The "wood/vinyl/chain link fence cost" searches are answered by sections on `/fence-cost-calculator`. The material calculators target "how many pickets, panels or rolls". Don't add separate cost pages for each material: Google treats that as scaled or doorway content.

## Lead gen ("Get free local quotes")
- Paste a partner tracking link per trade into `quote_links` in `application/config/site.php`. Partners include Angi/HomeAdvisor, Modernize (QuinStreet) and Networx.
- Trades without a link show no button. The button sits under the result, is optional, and never blocks the calculator.
- The partner's own form collects contact details and TCPA consent. The privacy policy and disclaimer already describe this.

Category hub pages (e.g. `/concrete-calculators`) appear once a category has a live tool. They are noindexed until the category has two.

## Date-wise release
A tool goes live automatically at midnight (America/New_York) on its `published` date.
Until then its URL returns 404, and it is left out of the sitemap, RSS feed, menus and related links.
On localhost every tool is shown (`show_unpublished = TRUE` in the development config).

Only change a tool's `updated` date when you actually revise its content or prices.
Faking "freshness" breaks Google's spam policies.

## Before going live
1. Upload everything to the web root. Hosts other than localhost run in **production** mode automatically (see `.htaccess`).
2. In `.htaccess`, uncomment the **https + non-www** redirect and the **HSTS** header.
3. In `application/config/site.php`:
   - `author_name`, `author_role`, `reviewer_name`: use real people and real credentials (E-E-A-T).
   - `site_email`: a working inbox.
4. Make `application/cache/` writable (full-page cache, 60 min).
5. Google Search Console: verify the domain and submit `/sitemap.xml`.
6. Bing Webmaster Tools: import from Search Console.

## AdSense
1. Apply with 8+ live tools plus the About, Privacy, Terms, Contact and Editorial pages (all included).
2. Once approved, set `adsense_client` (ca-pub-…) and the two slot ids. `/ads.txt` is generated from the client id.
3. **EEA/UK/Switzerland:** turn on Google's certified CMP in AdSense > Privacy & messaging (required for personalized ads).
4. Ads load after the first scroll or tap, or after 3 s, which keeps Core Web Vitals green. Ad boxes reserve height, so there is no layout shift.

## Affiliates
- Home Depot and Lowe's run their programs through Impact. Paste your tracking prefix (ending in `?u=`) into `aff_homedepot` / `aff_lowes`.
- Amazon Associates: set `amazon_tag`.
- Quikrete has no affiliate program, so Quikrete products link to Home Depot / Lowe's search pages.

## Adding a new tool
1. Add an entry to `Tool_registry::$tools` with a future `published` date.
2. Add a route in `routes.php` and a one-line method in `controllers/Tools.php`.
3. Create the four files listed above (copy the fence tool as a template).
4. Run `npm run build` and `php build-images.php`.

Write copy like an estimator explaining a real job:
- lead with the number and show a worked example
- include details only someone who has done the work would know
- no filler, no em dashes, and no stock phrases ("whether you're", "comprehensive", "ensure")
