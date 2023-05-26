<?
	require_once(__DIR__ . '/paypal.php');
?>
<section id="main">
<div id="shop-container" class="content-container flex-container"></div>
<script type="text/javascript" src="/static/js/shop/main.js"></script>
<script>
	let products = <?= json_encode($products, true); ?>;
	let shopContainer = document.getElementById('shop-container');
	init_shop(shopContainer, products);
</script>
</main>
