<?
// open-records-generator
require_once('open-records-generator/config/config.php');
require_once('open-records-generator/config/url.php');

// site
require_once('static/php/config.php');

$db = db_connect("guest");
$oo = new Objects();
$mm = new Media();
$ww = new Wires();
$uu = new URL();

if($uu->id)
	$item = $oo->get($uu->id);
else
	$item = $oo->get(0);
$name = ltrim(strip_tags($item["name1"]), ".");
$nav = $oo->nav($uu->ids);
$show_menu = false;
if($uu->id) {
	$is_leaf = empty($oo->children_ids($uu->id));
	$internal = (substr($_SERVER['HTTP_REFERER'], 0, strlen($host)) === $host);	
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

?><!DOCTYPE html>
<html>
	<head>
		<title><? echo $site; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="/static/css/main.css">
		<link rel="stylesheet" href="/static/css/sf-mono.css">
		<link rel="stylesheet" href="/static/css/mtdbt2f4d.css">
		<link rel="apple-touch-icon" href="/media/png/touchicon.png" />
        <link rel="stylesheet" href="https://sibforms.com/forms/end-form/build/sib-styles.css">
        <script type='text/javascript' src='/static/js/loop.js'></script>
	</head>
	<body class='black'>
    <style>
        body {
            font-family: mtdbt2f4d-8, Helvetica, Arial, sans-serif;
            font-size: 21px;
            line-height: 24px;
        }

        #badge {
            display: none;
        }

        :root {
            --octo-box-size: min(min(100vw, 100vh), 700px);
        }

        #menu {
            height: 100vh;
            position: relative;
        }

        #oct0 {
            font-size: 1.75em;
            /*
            border: 1px solid;
            border-radius: 50%;
            width: 250px;
            height: 250px;
            */
            padding: 20px;
        }

        #main-title {
            font-size: 1.75em;
            border-radius: 50%;
        }

        .octo-box {
            display: inline-block;
            padding: 0px;
            height: var(--octo-box-size);
            width: var(--octo-box-size);
            max-width: 700px;
            max-height: 700px;
        }

        .octo-arm {
            display: inline-block;
            top: 50%;
            left: 50%;
            height: 100px;
            width: 100px;
            text-align: center;
            transform: translate(-50%, -50%);
            border-radius: 50%;
            /* border: 1px solid #00F; */
            /* background-color: #CCC; */
            /* background-color: #FF0; */
        }

        .octo-arm a,
        #main-title {
            padding: 20px;
        }

        .octo-arm-number {
            font-size: 1.75em;
        }

        .octo-arm-name {
            display: none;
        }

        .absolute {
            position: absolute;
        }

        .fixed {
            position: fixed;
        }

        .octo-arm:nth-child(3) {
            transform: translate(-50%, -50%) rotate(0deg) translate(calc(var(--octo-box-size)/2.5));
        }

        .octo-arm:nth-child(4) {
            transform: translate(-50%, -50%) rotate(45deg) translate(calc(var(--octo-box-size)/2.5));
        }

        .octo-arm:nth-child(5) {
            transform: translate(-50%, -50%) rotate(90deg) translate(calc(var(--octo-box-size)/2.5));
        }

        .octo-arm:nth-child(6) {
            transform: translate(-50%, -50%) rotate(135deg) translate(calc(var(--octo-box-size)/2.5));
        }

        .octo-arm:nth-child(7) {
            transform: translate(-50%, -50%) rotate(180deg) translate(calc(var(--octo-box-size)/2.5));
        }

        .octo-arm:nth-child(8) {
            transform: translate(-50%, -50%) rotate(225deg) translate(calc(var(--octo-box-size)/2.5));
        }

        .octo-arm:nth-child(1) {
            transform: translate(-50%, -50%) rotate(270deg) translate(calc(var(--octo-box-size)/2.5));
        }

        .octo-arm:nth-child(2) {
            transform: translate(-50%, -50%) rotate(315deg) translate(calc(var(--octo-box-size)/2.5));
        }

        .black {
            color: #000;
        }

        .black a:link,
        .black a:visited {
            color: #000;
        }

        .black a:hover {
            /* color: #00F; */
        }

        .blue {
            color: #00F;
        }

        .blue a:link,
        .blue a:visited {
            color: #000;
        }

        .blue a:hover {
            /* color: #000; */
        }

        #logo-numeral .blue {
            color: #000;
            border-bottom: 3px solid #000;
        }
    </style>
    <div id="menu" class="hidden">
        <div class="centre fixed octo-box"><?
            foreach($arms as $arm) {
                if(empty($arm['rank'])) $arm['rank'] = 0;
                $class = ($arm['rank'] == $item['rank']) ? 'blue' : '';
                ?><div class='fixed octo-arm'>
                    <a href='/<?= $arm['url']; ?>'>
                        <div class='octo-arm-number <?= $class; ?>'><?= $arm['rank']; ?></div>
                        <div class='octo-arm-name <?= $class; ?>'><?= $arm['name1']; ?></div>
                    </a>
                </div><?
            }          
        ?></div>
    </div>
    <div id="oct0" class="centre fixed">
        <a href='#' onclick='hide_show_menu();'>
            OCT<span id="logo-numeral"><?
                foreach($arms as $arm) {
                    if(empty($arm['rank'])) $arm['rank'] = 0;
                    $class = (($arm['rank'] == $item['rank']) && (!empty($item['url']))) ? 'blue' : '';
                    ?><span class='<?= $class; ?>'><?= $arm['rank']; ?></span><?
                }
            ?></span><span id='logo-zero' class='hidden'>0</span>
        </a>
    </div>
    <script>
        var arms_loop = [];
        let octo_arm_a = document.querySelectorAll('.octo-arm a');
        let sOct0 = document.getElementById('oct0');
        [].forEach.call(octo_arm_a, function(el, i){
            arms_loop[i] = new Loop(el, true);
        });
        sOct0.addEventListener('click', function(){
            if(arms_loop.length != 0 && arms_loop[1].looper != null) {
                arms_loop.forEach(function(el, i){
                    el.pause();
                });
            } else {
                arms_loop.forEach(function(el, i){
                    el.begin();
                });
            }
        });
    </script>
