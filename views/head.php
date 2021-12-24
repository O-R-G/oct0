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

$animationType = isset($_GET['animationType']) ? $_GET['animationType'] : 0;

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
        <script type='text/javascript' src='/static/js/loop.js'></script>
	</head>
	<body><?
    ?>
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
  --octo-box-size: min(100vw, 100vh);
}

#menu {
    height: 100vh;
    position: relative;
}

.octo-box {
    padding: 0px;
    display: block;
    height: var(--octo-box-size);
    width: var(--octo-box-size);
    /* background-color: #FF0; */
}

.octo-arm {
    margin-top: -12px;
    /*transform:rotate(var(--r)) translate(calc(var(--octo-box-size) * .95 / 2)) rotate(calc(var(--r)*-1));*/
}
/*.octo-arm:first-child {
    transform:rotate(0deg) translate(calc(var(--octo-box-size) * .95 / 2)) rotate(0deg);
}
.octo-arm:nth-child(2) {
    transform:rotate(45deg) translate(calc(var(--octo-box-size) * .95 / 2)) rotate(-45deg);
}
.octo-arm:nth-child(3) {
    transform:rotate(90deg) translate(calc(var(--octo-box-size) * .95 / 2)) rotate(-90deg);
}
.octo-arm:nth-child(4) {
    transform:rotate(135deg) translate(calc(var(--octo-box-size) * .95 / 2)) rotate(-135deg);
}
.octo-arm:nth-child(5) {
    transform:rotate(180deg) translate(calc(var(--octo-box-size) * .95 / 2)) rotate(-180deg);
}
.octo-arm:nth-child(6) {
    transform:rotate(225deg) translate(calc(var(--octo-box-size) * .95 / 2)) rotate(-225deg);
}
.octo-arm:nth-child(7) {
    transform:rotate(270deg) translate(calc(var(--octo-box-size) * .95 / 2)) rotate(-270deg);
}
.octo-arm:nth-child(8) {
    transform:rotate(315deg) translate(calc(var(--octo-box-size) * .95 / 2)) rotate(-315deg);
}*/

.absolute {
    position: absolute;
}

.fixed {
    position: fixed;
}

</style>
<div id="menu" class="hidden">
  <ul class="centre octo-box fixed" style="--octo-box-size:min(95vh,95vw)">
    <li class="centre fixed octo-arm" style="--r:0deg"><a href='0'>*</a></li>
    <li class="centre fixed octo-arm" style="--r:45deg"><a href='1'>1</a></li>
    <li class="centre fixed octo-arm" style="--r:90deg"><a href='2'>2</a></li>
    <li class="centre fixed octo-arm" style="--r:135deg"><a href='3'>3</a></li>
    <li class="centre fixed octo-arm" style="--r:180deg"><a href='4'>4</a></li>
    <li class="centre fixed octo-arm" style="--r:225deg"><a href='5'>5</a></li>
    <li class="centre fixed octo-arm" style="--r:270deg"><a href='6'>6</a></li>
    <li class="centre fixed octo-arm" style="--r:315deg"><a href='7'>7</a></li>
  </ul>
</div>
<div id="oct01234567" class="centre fixed hidden">
    <a href='#menu' onclick='hide_show_menu();'>OCT01234567</a>
</div>
<div id="oct0" class="centre fixed">
    <a href='#menu' onclick='hide_show_menu();'>OCT0<span id="logo-numeral">1234567</span></a>
</div>
<script>
    var animationType = <?= $animationType; ?>;
    var sOcto_arm = document.getElementsByClassName('octo-arm');
    var octo_box_size = 0.95 * Math.min( window.innerHeight, window.innerWidth );
    var arms_loop = [];
    if(sOcto_arm)
    {
        if(animationType == 0)
        {
            [].forEach.call(sOcto_arm, function(el, i){
                el.style.transform = 'rotate(' + (i * 45 + 270) + 'deg) translate(calc(' + parseInt(0.95 * octo_box_size / 2 * 10)/10  + 'px)) rotate(-'+ (i * 45 + 270) +'deg)';
                arms_loop[i] = new Loop(el, true);
            });
            let sOct0 = document.getElementById('oct0');
            sOct0.addEventListener('click', function(){
                if(arms_loop.length != 0 && arms_loop[1].looper != null)
                {
                    arms_loop.forEach(function(el, i){
                        el.pause();
                    });
                }
                else
                {
                    arms_loop.forEach(function(el, i){
                        el.begin();
                    });
                }
            });
            window.addEventListener('resize', function(){
                octo_box_size = 0.95 * Math.min( window.innerHeight, window.innerWidth );
                [].forEach.call(sOcto_arm, function(el, i){
                    el.style.transform = 'rotate(' + (i * 45 + 270) + 'deg) translate(calc(' + parseInt(0.95 * octo_box_size / 2 * 10)/10  + 'px)) rotate(-'+ (i * 45 + 270) +'deg)';
                    arms_loop[i] = new Loop(el, true);
                });

            });
        }
        else if(animationType == 2)
        {
            [].forEach.call(sOcto_arm, function(el, i){
                let delay = 0.5 * parseInt(8 * Math.random()) / 8;
                delay = Math.round(delay * 100) / 100;
                el.style.delay = '-' + delay + 's';
            });
        }
        
    }
</script>