<?
require(__DIR__ . '/../static/php/config-paypal.php');
function getProductInfo($currency, $dataString){
	$price_pattern = '/\['.$currency['name'].'\]\((.*?)\)/';
	$type_pattern = '/\[type\]\((.*?)\)/';
	$name_pattern = '/\[name\]\((.*?)\)/';
	preg_match($price_pattern, trim($dataString), $temp);
	$output = array();
	if(!empty($temp)){
		if(!empty($temp[1]) && strtolower($temp[1]) !== 'sold out'){
			$output['price'] = $temp[1];
			preg_match($type_pattern, trim($dataString), $temp_type);
			if(!empty($temp_type))
				$output['type'] = $temp_type[1];
			else
				$output['type'] = 'default';
			preg_match($name_pattern, trim($dataString), $temp_name);
			if(!empty($temp_name))
				$output['name'] = $temp_name[1];
			else
				$output['name'] = '';
			
		}
		else{
			$output['type'] = 'default';
			$output['price'] = 'sold out';
		}
	}
	else
	{
		if(strpos(trim($priceField), '[donation]') !== false)
		{
			$output['type'] = 'donation';
			$output['price'] = 'donation';
		}
		else{
			$output['type'] = 'default';
			$output['price'] = 'sold out';
		}
	}
	
	return $output;
}
$raw_products = count($uri) > 2 ? array($item) : $oo->children($item['id']);
$productUrlBase = '/' . $item['url'] . '/';
$products = array();
foreach($raw_products as $key => &$child)
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
		$id = $child['url'];
		$id_idx = 0;
		while(isset($products[$id]))
		{
			$id_idx++;
			$id = $id . '-' . $id_idx;
		}
		// turn all linebreaks into spaces
		$name = '<span class="en">' . preg_replace( array('/<div><\/div>/', '/<\/div>(:?<br>)*?<div>/', '/<\/?div>/', '/\&nbsp;/'), array('', ' ', ' ', ''), html_entity_decode(trim($child['deck']))  ) . '</span><br>';
		$name .= '<span class="fr">' . preg_replace( array('/<div><\/div>/', '/<\/div>(:?<br>)*?<div>/', '/<\/?div>/', '/\&nbsp;/'), array('', ' ', ' ', ''), html_entity_decode(trim($child['address2']))  ) . '</span>';
		$products[$id] = array(
			'id'   => $id,
			'name' => $name, // name displayed on the website
			'paypalName' => html_entity_decode(trim($productInfo['name'])), // name displayed on the paypal popup window
			'imageSrc' => $thumbnail ? array(m_url($thumbnail)) : array(),
			'price' => $price,
			'url' => $url,
			'description' => '',
			'type' => $productInfo['type'],
			'inStock'  => $productInfo['price'] !== 'sold out'
		);
	}
	$products = array_values($products);
	
}
?>
