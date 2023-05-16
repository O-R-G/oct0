<script src="/static/js/shop.js"></script>
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
				$output['type'] = '';
			$output['price'] = $temp[1];
		}
		else{
			$output['type'] = 'sold out';
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
			$output['type'] = 'sold out';
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
<script>
	var currency = <?= json_encode($currency, true); ?>;
	console.log(currency);
	paypal_url += '&currency='+currency['name'].toUpperCase();
	// if(!isDonation) {
		console.log(paypal_url);
		var paypal_script = loadScript(paypal_url);
	// }
	document.body.classList.add('viewing-'+currency['name']);

</script>
<style>
	/*
	tmp for dev only
	should be cleaned up
*/

.thumbsContainer.shop {
	width: 250px;
	position: relative;
	padding: 20px;
}

.buy-section {
	position: fixed;
	width: 200px;
	left: 20px;
	bottom: 20px;
}

.product .buy-section {
	position: absolute;
	margin: initial;
	left: 30px;
	bottom: 30px;
}

.buy-section + .buy-section {
	left: 230px;
}

/* obvo all of this is an ugly hack to be fixed */

.buy-button-container {
	display: inline-block;
	width: 100%;
}

.issue-img {
	display: block;
}

.viewing-paypal .button-area {
	background-color: #FFF;
}

.viewing-usd .button-area-eur,
.viewing-usd .button-area-gbp,
.viewing-eur .button-area-usd,
.viewing-eur .button-area-gbp,
.viewing-gbp .button-area-usd,
.viewing-gbp .button-area-eur {
	display: none;
}

.paypal-button-container,
body.loading .viewing-paypal .paypal-button-container {
	display: none;
	height: 35px;
}

.cart-button-container {
	display: block;
	width: 200px;
	height: 35px;
}

.cart-button-container .button {
	background-color: #0C0;
	color: #FFF;
}

.cart-button-container .button:hover {
	background-color: #0F0;
}

.paypal-button-container: hover {
	/* opacity: 1.0; */
}

.paypal-button-container > div {
	display: block;
}

.viewing-paypal .download-code-container,
.viewing-paypal .paypal-button-container {
		display: block; 
	/*pointer-events: initial;*/
	/*height: initial;*/
	/*margin-top: 11px;*/
}

.viewing-paypal .buy-button-container .button {
	background-color: #000;
	border-color: #000;
	position: relative;
		color: #FFF;
}

body.loading .viewing-paypal:before {
	content: "Loading . . .";
	/*position: absolute;*/
	display: block;
	width: 100%;
	height: 35px;
	/*top: -21px;*/
	/*left: 10px;*/
	border-radius: 4px;
	border: 1px solid #ccc;
	background-color: #ccc;
	color: #000;
	z-index: 100;
	text-align: center;
	font-size: 18px;
	padding-top: 6px;
	box-sizing: border-box;
	margin-bottom: 5px;
}

.shopItemLink {
	display: block;
}

#currencySwitchWrapper {
	display: none;
	position: fixed;
	bottom: 20px;
	right: 20px;
	z-index: 90;
}

.currency {
	color: #000;
}

.currencyOption {
	display: inline-block;
	width: 40px;
	padding: 2px 5px;
	cursor: pointer;
	/* border-radius: 4px; */
	text-align: center;
}

a.currencyOption.active,
a.currencyOption:hover,
.currencyOption.active,
.currencyOption:hover {
	background-color: #0C0;
	color: #fff;
}

.pseudo-button {
	width: 100%;
	height: 35px;
	border-radius: 4px;
	box-sizing: border-box;
	font-size: 18px;
	text-align: center;
	vertical-align: top;
	padding-top: 7px;
	font-family: 'Arial', sans-serif;
}

.pseudo-button.sold-out {
	color: #FFF;
	background-color: none;
	border: 1px solid #FFF;    
}

#donate-btn {
	pointer-events: none;
}

#donate-buy-section form {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	opacity: 0;
}
#donate-buy-section form input[type="image"]
{
	width: 100%;
	height: 100%;
}
.payment-option	{
	margin-bottom: 5px;
}
.paypal-cart-button {
	/*
	background-color: #0C0;
	border-color: #0C0;
	*/
}

.paypal-cart-button:hover {
	/*
	background-color: #a9a9a9;
	border-color: #a9a9a9;
	*/
}

.paypal-cart-button-container,
.viewing-paypal .paypal-cart-button-container {
	display: none;
}

.testCart .viewing-paypal .paypal-cart-button-container {
	display: block;
}

/*form[name="Donate"]
{
	margin-top: 21px;
	width: 200px;
	height: 35px;
	position: relative;
	overflow: hidden;
}

form[name="Donate"]:after
{
	content: "DONATE";
	position: absolute;
	top: 0;
	left: 0;
	display: block;
	width: 100%;
	height: 100%;
	pointer-events: none;
}*/

	#cart-symbol {
			position: fixed;
			left: 20px;
			bottom: -35px;
			z-index: 1000;
			cursor: pointer;
	}

	#cart-symbol:hover,
	.viewing-cart #cart-symbol {
			background-color: #0C0;
			color: #fff;
	}

	.viewing-cart-symbol#cart-symbol {
		bottom: 20px;
		transition: bottom 0.25s;
	}

	#cart-container {
			width: 100vw;
			max-width: 100%;
			position: fixed;
			bottom: 0;
			left: 0;
			transform: translate(0, 100%);
			z-index: 1000;
			padding: 20px;
			padding-right: 60px;
			padding-bottom: 75px;
			background-color: #fff;
			min-height: 25vh;
			max-height: 50vh;
			overflow: scroll;
			box-sizing: border-box;
	}

	.viewing-cart #cart-container {
			/* transition: transform .5s; */
			transform: translate(0, 0%);
	}

	#btn-close-cart {
			position: absolute;
			right: 10px;
			top: 15px;
			cursor: pointer;
			padding: 5px 10px;
	}
	#buy-section-cart {
			position: absolute;
			left: 20px;
	}
	.item-row,
	.item-row-default
	{
			display: flex;
	}
	.item-row
	{
			margin-top: 10px;
	}

	.item-column
	{
			display: inline-block;
			flex-basis: 50px;
			padding: 0 15px;
			text-align: right;
	}
	.item-name.item-column
	{
			flex: 1;
			text-align: left;
	}
	.item-remove
	{
			flex-basis: 80px;
			cursor: pointer;
	}
	.item-row-default .item-remove
	{
			cursor: default;
	}
	.item-quantity-container
	{
			position: relative;
	}
	.item-quantity
	{
			text-align: center;
	}
	.item-quantity-minus,
	.item-quantity-plus
	{
			position: absolute;
			top: 0;
			padding: 0 5px;
			cursor: pointer;
	}
	.item-quantity-minus
	{
			left: 10px;
	}
	.item-quantity-plus
	{
			right: 10px;
	}
</style>