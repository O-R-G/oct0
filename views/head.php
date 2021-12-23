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
    font-size: 48px;
    transform:rotate(var(--r)) translate(calc(var(--octo-box-size) * .95 / 2)) rotate(calc(var(--r)*-1));
}

.absolute {
    position: absolute;
}

.fixed {
    position: fixed;
}

</style>
<div id="menu" class="hidden">
  <ul class="centre octo-box absolute" style="--octo-box-size:min(95vh,95vw)">
    <li class="centre absolute octo-arm" style="--r:0deg"><a href='0'>*</a></li>
    <li class="centre absolute octo-arm" style="--r:45deg"><a href='1'>1</a></li>
    <li class="centre absolute octo-arm" style="--r:90deg"><a href='2'>2</a></li>
    <li class="centre absolute octo-arm" style="--r:135deg"><a href='3'>3</a></li>
    <li class="centre absolute octo-arm" style="--r:180deg"><a href='4'>4</a></li>
    <li class="centre absolute octo-arm" style="--r:225deg"><a href='5'>5</a></li>
    <li class="centre absolute octo-arm" style="--r:270deg"><a href='6'>6</a></li>
    <li class="centre absolute octo-arm" style="--r:315deg"><a href='7'>7</a></li>
  </ul>
</div>
<div id="oct01234567" class="centre fixed hidden">
    <a href='#menu' onclick='hide_show_menu();'>OCT01234567</a>
</div>
<div id="oct0" class="centre fixed">
    <a href='#menu' onclick='hide_show_menu();'>OCT0</a>
</div>
<script>
    var animationType = <?= $animationType; ?>;
    console.log(animationType);
    var sOcto_arm = document.getElementsByClassName('octo-arm');
    if(sOcto_arm)
    {
        if(animationType == 1)
        {
            [].forEach.call(sOcto_arm, function(el, i){
                let duration = 5 * Math.random() + 0.5;
                duration = Math.round(duration * 100) / 100;
                console.log(duration);
                el.style.animationDuration = duration + 's';
            });
        }
        else if(animationType == 2)
        {
            console.log('hihi');
            [].forEach.call(sOcto_arm, function(el, i){
                let delay = 0.5 * parseInt(8 * Math.random()) / 8;
                delay = Math.round(delay * 100) / 100;
                console.log(delay);
                el.style.delay = '-' + delay + 's';
            });
        }
        
    }
</script>