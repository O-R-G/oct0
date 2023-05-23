<?
require(__DIR__ . '/../static/php/config-paypal.php');
function getProductInfo($currency, $priceField){
	$price_pattern = '/\['.$currency['name'].'\]\((.*?)\)/';
	$type_pattern = '/\[type\]\((.*?)\)/';
	preg_match($price_pattern, trim($priceField), $temp);
	$output = array();
	if(!empty($temp)){
		if(!empty($temp[1]) && strtolower($temp[1]) !== 'sold out'){
			preg_match($type_pattern, trim($priceField), $temp_type);
			if(!empty($temp_type))
				$output['type'] = $temp_type[1];
			else
				$output['type'] = 'default';
			$output['price'] = $temp[1];
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

function printPayPalButtons($currency, $productInfo, $itemName){
	$key = slug($itemName);
	$output = '';
	$price = $productInfo['price'];
	$type = $productInfo['type'];
	
	if( is_numeric($price) )
	{
		$output = '<section id="buy-' . $key . '" class="buy-section">';
		$output .= '<div id="button-area' . $key . '-' . $currency['name'] . '" class="button-area button-area-' . $currency['name'] . '">';
		$output .= 		'<div id="paypal-button-container' . $key . '-' . $currency['name'] . '" price="'. $price . '" class="payment-option paypal-button-container"></div>';
		$output .= 		'<div id="paypal-cart-button-container' . $key . '-' . $currency['name'] . '" price="'. $price . '" class="payment-option paypal-button-container paypal-cart-button-container"><button id="paypal-cart-button' . $key . '-' . $currency['name'] . '" class="button paypal-cart-button" price="'. $price . '" itemName="'.$itemName.'" slug="'.$key.'" type="'.$type.'" onclick="addToCartByClick(event)">ADD TO CART</button></div>';
		$output .= 	'<div id="buy-button-container' . $key . '-' . $currency['name'] . '" class="buy-button-container">';
		$expandPaypal_param = "'button-area" . $key . "-" . $currency['name'] . "', '" . $currency['name'] . "', '" . $itemName. "', '" . $type . "'";
		$output .= 	'<button id="cost' . $key . '-' . $currency['name'] . '" class="button" onclick="expandPaypal('.$expandPaypal_param.')">' . $currency['symbol'] . $price . '</button>';
		$output .= '</div></div>';
		$output .= '</section>';
	}
	else if($type == 'doantion')
	{
		$output = '<div id="donate-buy-section" class="buy-section"><div id="paypal-donate-button-container"></div><button id="donate-btn" class="button">DONATE</button></div>';
	}
	else if($price == 'sold out')
	{
		$output = '<section id="buy' . $key . '" class="buy-section">';
		$output .= '<div id="button-area' . $key . '-' . $currency['name'] . '" class="button-area"><div class="sold-out red pseudo-button">SOLD OUT</div></div>';
		$output .= '</section>';
	}

	return $output;
}
?>
