<?php
/**
 * Generates social share images and app icons. Run: php build-images.php
 *  - assets/img/og/{slug}.png  (1200×630, one per tool in the registry)
 *  - assets/img/icon-180.png, icon-192.png, icon-512.png and /favicon.ico
 * Re-run after adding a tool. Fonts: Segoe UI (Windows) or DejaVu (Linux).
 */
define('BASEPATH', __DIR__ . '/system/');
require __DIR__ . '/application/libraries/Tool_registry.php';

$bold = is_file('C:/Windows/Fonts/segoeuib.ttf') ? 'C:/Windows/Fonts/segoeuib.ttf' : '/usr/share/fonts/truetype/dejavu/DejaVuSans-Bold.ttf';
$reg  = is_file('C:/Windows/Fonts/segoeui.ttf') ? 'C:/Windows/Fonts/segoeui.ttf' : '/usr/share/fonts/truetype/dejavu/DejaVuSans.ttf';
$year = 2026;

/** Draws the calculator mark (yellow tile + dark outline) at x,y with size s. */
function mark($im, $x, $y, $s)
{
	$yel = imagecolorallocate($im, 245, 158, 11);
	$ink = imagecolorallocate($im, 11, 18, 32);
	imagefilledrectangle($im, $x, $y, $x + $s, $y + $s, $yel);
	imagesetthickness($im, max(2, (int) round($s / 16)));
	$p = $s * 0.27;
	imagerectangle($im, (int) ($x + $p), (int) ($y + $s * 0.16), (int) ($x + $s - $p), (int) ($y + $s * 0.84), $ink);
	imageline($im, (int) ($x + $s * 0.38), (int) ($y + $s * 0.32), (int) ($x + $s * 0.62), (int) ($y + $s * 0.32), $ink);
	foreach (array(0.46, 0.6, 0.72) as $row)
	{
		foreach (array(0.38, 0.5, 0.62) as $col)
		{
			imagefilledrectangle($im, (int) ($x + $s * $col - $s * 0.02), (int) ($y + $s * $row - $s * 0.02), (int) ($x + $s * $col + $s * 0.02), (int) ($y + $s * $row + $s * 0.02), $ink);
		}
	}
}

/** Word-wraps $text to fit $max px wide. */
function wrap($size, $font, $text, $max)
{
	$lines = array('');
	foreach (explode(' ', $text) as $w)
	{
		$try = trim(end($lines) . ' ' . $w);
		$box = imagettfbbox($size, 0, $font, $try);
		if ($box[2] - $box[0] > $max && end($lines) !== '') { $lines[] = $w; }
		else { $lines[count($lines) - 1] = $try; }
	}

	return $lines;
}

@mkdir(__DIR__ . '/assets/img/og', 0775, TRUE);
$images = Tool_registry::$tools;
// Site-wide default (home and other pages) -> assets/img/og-image.png
$images['../og-image'] = array('name' => 'Construction calculators for pricing real jobs', 'blurb' => 'Concrete, roofing, fencing, decks, drywall, tile, landscaping and more, with labor priced by state.');
foreach ($images as $slug => $t)
{
	$im  = imagecreatetruecolor(1200, 630);
	$bg  = imagecolorallocate($im, 11, 18, 32);
	$yel = imagecolorallocate($im, 245, 158, 11);
	$wht = imagecolorallocate($im, 241, 245, 249);
	$mut = imagecolorallocate($im, 148, 163, 184);
	imagefilledrectangle($im, 0, 0, 1200, 630, $bg);
	// tape-measure strip
	imagefilledrectangle($im, 0, 600, 1200, 630, $yel);
	for ($x = 0; $x < 1200; $x += 15) { imageline($im, $x, 600, $x, $x % 60 === 0 ? 618 : 608, $bg); }

	mark($im, 80, 70, 72);
	imagettftext($im, 30, 0, 172, 118, $wht, $bold, 'BuildCalcUSA');
	$y = 250;
	foreach (wrap(64, $bold, $t['name'], 1040) as $line) { imagettftext($im, 64, 0, 80, $y, $wht, $bold, $line); $y += 88; }
	$y += 6;
	foreach (wrap(28, $reg, $t['blurb'], 1040) as $line) { imagettftext($im, 28, 0, 80, $y, $mut, $reg, $line); $y += 44; }
	imagettftext($im, 24, 0, 80, 560, $yel, $bold, 'Free  ·  ' . $year . ' U.S. prices  ·  ft or m  ·  no sign-up');
	imagepng($im, __DIR__ . "/assets/img/og/{$slug}.png", 9);
	imagedestroy($im);
	echo "og/{$slug}.png\n";
}

$pngs = array();
foreach (array(16, 32, 48, 180, 192, 512) as $s)
{
	$im = imagecreatetruecolor($s, $s);
	imagefilledrectangle($im, 0, 0, $s, $s, imagecolorallocate($im, 245, 158, 11));
	mark($im, 0, 0, $s);
	ob_start(); imagepng($im, NULL, 9); $pngs[$s] = ob_get_clean();
	if ($s >= 180) { file_put_contents(__DIR__ . "/assets/img/icon-{$s}.png", $pngs[$s]); echo "icon-{$s}.png\n"; }
	imagedestroy($im);
}

// favicon.ico with embedded PNGs (16, 32, 48)
$sizes  = array(16, 32, 48);
$ico    = pack('vvv', 0, 1, count($sizes));
$offset = 6 + 16 * count($sizes);
$data   = '';
foreach ($sizes as $s)
{
	$ico    .= pack('CCCCvvVV', $s, $s, 0, 0, 1, 32, strlen($pngs[$s]), $offset);
	$offset += strlen($pngs[$s]);
	$data   .= $pngs[$s];
}
file_put_contents(__DIR__ . '/favicon.ico', $ico . $data);
echo "favicon.ico\n";
