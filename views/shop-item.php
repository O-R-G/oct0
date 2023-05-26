<?
require_once(__DIR__ . '/paypal.php');

$name = isset($item['name1']) ? $item['name1'] : '';
$deck = isset($item['deck']) ? $item['deck'] : '';
$body = isset($item['body']) ? $item['body'] : '';
$body2 = isset($item['address1']) ? $item['address1'] : '';
$notes = isset($item['notes']) ? $item['notes'] : '';
$date = isset($item['begin']) ? $item['begin'] : '';
$find = '/<div><br><\/div>/';
$replace = '';
$body = preg_replace($find, $replace, $body); 
$body2 = preg_replace($find, $replace, $body2);
$notes = preg_replace($find, $replace, $notes);

?><section id="main">
    <div id='content'>
    <div id='columns' class="columnsDisabled">
        <div id='en'><?
            echo $body;
        ?></div><div id='fr'><?
            echo $body2;
        ?>
        </div>
    </div>
    <div id='nav'><?
        $next = ($uri[1] == 'about') ? 'contact' : 'about'; 
        if (!empty($item['url'])) {
            ?><a href='/'>
                <img class='inline-svg' src='media/svg/x-12-k.svg'>
            </a>
            <a href='/<?= $next; ?>'>
                <img class='inline-svg' src='media/svg/arrow-right-12-k.svg'>
            </a><?
        }
    ?>
    </div>
    </div>
	<div id="single-product-container"></div>
</section>
<script type="text/javascript" src="/static/js/shop/main.js"></script>
<script>
	let products = <?= json_encode($products, true); ?>;
	let singleProductContainer = document.getElementById('single-product-container');
	init_product(singleProductContainer, products);
</script>