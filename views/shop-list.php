<style>
	
</style>
<section id="main">
<div id="products-container" class="content-container flex-container">
<?
	function renderProduct($child, $url, $media, $button_html){
		if(substr($child['name1'], 0, 1) == '.') return '';
		$allowed_tags = '<br><i><b><a>';
		$name_en = $child['deck'];
		$name_fr = $child['address2'];
		$name = '<div class="en">' . $name_en . '</div><div class="fr">' . $name_fr . '</div>';

		$thumbnail = false;
		foreach($media as $key => $m)
		{
			if(!in_array($m['type'], array('jpg', 'jpeg', 'gif', 'png', 'webp'))) continue;
			if(!$thumbnail || strpos('[thumbnail]', $m['caption']) !== false){
				$thumbnail = $m;
				break;
			}
		}
		$output = '<div class="product">';
		$output .= '<a class="product-link" href="'.$url.'">';
		$output .= '<div class="product-name">'.$name.'</div>';
		$output .= $thumbnail ? '<div class="product-thumbnail"><img src="'.m_url($thumbnail).'"></div>' : '';
		$output .= '</a>';
		$output .= '<div class="product-button">'. $button_html .'</div>';
		$output .= '</div>';
		return $output;
	}
	$children = $oo->children($item['id']);
	$url_base = '/' . $item['url'] . '/';
	
	foreach($children as $key => &$child)
	{
		if(substr($child['name1'], 0, 1) !== '.')
		{
			$url = $url_base . $child['url'];
			$url .= $currency !== $defaultCurrency ? '?currency=' . $currency : "";
			$media = $oo->media($child['id']);
			$productInfo = getProductInfo($currency, $child['notes']);
			$button_html = printPayPalButtons($currency, $productInfo, $child['name1']);
			echo renderProduct($child, $url, $media, $button_html);
		}
		else
			unset($children[$key]);			
	}
?>
</div>
</main>
