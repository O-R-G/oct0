<?
// open-records-generator
require_once('open-records-generator/config/config.php');
require_once('open-records-generator/config/url.php');

// site
require_once('static/php/config.php');
require_once('static/php/function.php');

$db = db_connect("guest");
$oo = new Objects();
$mm = new Media();
$ww = new Wires();
$uu = new URL();

if($uu->id)
	$item = $oo->get($uu->id);
else
	$item = $oo->get(0);
// $name = ltrim(strip_tags($item["name1"]), ".");
$nav = $oo->nav($uu->ids);
$show_menu = false;
if($uu->id) {
	$is_leaf = empty($oo->children_ids($uu->id));
	$internal = (isset($_SERVER['HTTP_REFERER']) && substr($_SERVER['HTTP_REFERER'], 0, strlen($host)) === $host);	
	if(!$is_leaf && $internal)
		$show_menu = true;
} else  
    if ($uri[1])  
        $uu->id = -1;

$arms = $oo->children(0);
foreach($arms as $key => $arm) {
    if(substr($arm['name1'], 0, 1) == '.')
        unset($arms[$key]);
}

$isTestCart = isset($_GET['testCart']);
if($isTestCart)
	$bodyClass .= 'testCart ';

if($uri[1] == 'penumbra' && count($uri) == 2)
	$card_image = "/media/jpg/octo_penumbra_square_1.jpg";
else
	$card_image = "/media/jpg/og.jpg";

$default_language = getenv('DEFAULT_LANG') ? getenv('DEFAULT_LANG') : 'fr';
$current_language = $uri[1] ? $uri[1] : $default_language;
$animation_version = isset($_GET['animation']) ? $_GET['animation'] : 0;
?><!DOCTYPE html>
<html>
	<head>
		<title><? echo $site; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="og:image" content="<?= $card_image; ?>" />
		<meta name="og:type" content="website" />
		<meta name="og:title" content="OCT01234567" />
		<meta name="og:url" content="https://www.octo.productions" />
		<meta name="og:description" content="OCT0 is a non-profit production office based in Marseille, France operating internationally." />
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:title" content="OCT01234567" />
		<meta name="twitter:site" content="https://www.octo.productions" />
		<meta name="twitter:description" content="OCT0 is a non-profit production office based in Marseille, France operating internationally." />
		<meta name="twitter:image" content="https://www.octo.productions<?= $card_image; ?>" />
		<link rel="stylesheet" href="/static/css/main.css">
		<link rel="stylesheet" href="/static/css/sf-mono.css">
		<link rel="stylesheet" href="/static/css/mtdbt2f4d.css">
		<?= $uri[1] == 'shop' ? '<link rel="stylesheet" href="/static/css/shop.css">' : ''; ?>
		<link rel="apple-touch-icon" href="/media/png/touchicon.png" />
		<link rel="stylesheet" href="https://sibforms.com/forms/end-form/build/sib-styles.css">
		<script type='text/javascript' src='/static/js/loop.js'></script>
		<link rel="preload" href="/static/fonts/mtdbt2f4d-0/mtdbt2f4d-0-webfont.woff2" as="font" type="font/woff2" crossorigin>
		<link rel="preload" href="/static/fonts/mtdbt2f4d-1/mtdbt2f4d-1-webfont.woff2" as="font" type="font/woff2" crossorigin>
		<link rel="preload" href="/static/fonts/mtdbt2f4d-2/mtdbt2f4d-2-webfont.woff2" as="font" type="font/woff2" crossorigin>
		<link rel="preload" href="/static/fonts/mtdbt2f4d-3/mtdbt2f4d-3-webfont.woff2" as="font" type="font/woff2" crossorigin>
		<link rel="preload" href="/static/fonts/mtdbt2f4d-4/mtdbt2f4d-4-webfont.woff2" as="font" type="font/woff2" crossorigin>
		<link rel="preload" href="/static/fonts/mtdbt2f4d-5/mtdbt2f4d-5-webfont.woff2" as="font" type="font/woff2" crossorigin>
		<link rel="preload" href="/static/fonts/mtdbt2f4d-66/mtdbt2f4d-66-webfont.woff2" as="font" type="font/woff2" crossorigin>
		<link rel="preload" href="/static/fonts/mtdbt2f4d-88/mtdbt2f4d-88-webfont.woff2" as="font" type="font/woff2" crossorigin>
	</head>
	<body current-lang = '<?php echo $current_language; ?>' animation-version='<?php echo $animation_version; ?>'>

