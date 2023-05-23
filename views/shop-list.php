<?
	$children = $oo->children($item['id']);
	$productUrlBase = '/' . $item['url'] . '/';
	$products = array();
	foreach($children as $key => &$child)
	{
		if(substr($child['name1'], 0, 1) == '.')
			continue;
		else{
			$url = $productUrlBase . $child['url'];
			$url .= $currency !== $defaultCurrency ? '?currency=' . $currency : "";
			$media = $oo->media($child['id']);
			$thumbnail = false;
			foreach($media as $key => $m)
			{
				if(!in_array($m['type'], array('jpg', 'jpeg', 'gif', 'png', 'webp'))) continue;
				if(!$thumbnail || strpos('[thumbnail]', $m['caption']) !== false){
					$thumbnail = $m;
					break;
				}
			}
			$productInfo = getProductInfo($currency, $child['notes']);
			$price = array(
				'amount' => $productInfo['price'],
				'symbol' => $currency['symbol']
			);
			// $shipping = $shippingOptions_arr[$productInfo['type']];
			$shipping = $productInfo['type'] == 'default' ? $shippingOptions_arr[$shippingOptions_arr['default']][strtoupper($currency['name'])] : $shippingOptions_arr[$productInfo['type']][strtoupper($currency['name'])];
			$id = $child['url'];
			$id_idx = 0;
			while(isset($products[$id]))
			{
				$id_idx++;
				$id = $id . '-' . $id_idx;
			}
			$products[$id] = array(
				'id'   => $id,
				'name' => '<div class="en">' . trim($child['deck']) . '</div><div class="fr">' . $child['address2'] . '</div>',
				'imageSrc' => $thumbnail ? array(m_url($thumbnail)) : array(),
				'price' => $price,
				'url' => $url,
				'description' => '',
				'shipping' => $shipping,
				'inStock'  => $productInfo['price'] !== 'sold out'
			);
		}
		$products = array_values($products);
			// echo renderProduct($child, $url, $media, $button_html);
	}
?>
<section id="main">
<div id="shop-container" class="content-container flex-container"></div>
<script type="text/javascript" src="/static/js/shop/main.js"></script>
<script>
	let client_id = '<?= $client_id; ?>';
	let products = <?= json_encode($products, true); ?>;
	let shopContainer = document.getElementById('shop-container');
	init_shop(shopContainer, products);
</script>
</main>
