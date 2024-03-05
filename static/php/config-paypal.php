<?php
$paypal_mode = getenv('PAYPAL_MODE') ? getenv('PAYPAL_MODE') : 'live';
$client_id = $paypal_mode === 'live' ? getenv('PAYPAL_CLIENT_ID_LIVE') : getenv('PAYPAL_CLIENT_ID_SANDBOX');

$currencies = array(
    'eur' => array(
        'name'   => 'eur',
        'symbol' => '€',
        'isDefault' => true
    ),
    'usd' => array(
        'name'   => 'usd',
        'symbol' => '$',
        'isDefault' => false
    ),
    'gbp' => array(
        'name'   => 'gbp',
        'symbol' => '£',
        'isDefault' => false
    )
);
$defaultCurrency = array();
foreach($currencies as $c)
{
    if($c['isDefault'])
    {
        $defaultCurrency = $c;
        break;
    }
}
$currency = isset($_GET['currency']) && isset($currencies[$_GET['currency']]) ? $currencies[$_GET['currency']] : $defaultCurrency;
$shippingOptions_arr = array(
	'default' => 'issue',
	'issue' => array(
	    'USD' => array(
            array(
                "id" => "SHIP_US",
                "label" => "DOMESTIC",
                "type" => "SHIPPING",
                "selected" => true,
                "amount" => array(
                    'value' => "10.00",
                    'currency_code' => "USD"
                )
            )
        ), 
	    'EUR' => array(
	        array(
                'id' => "SHIP_EU",
	            'label' => "WITHIN EU",
	            'type' => "SHIPPING",
	            'selected' => true,
	            'amount' => array(
                    'value' => "10.00",
	                'currency_code' => "EUR"
                )
            ),
	        array(
	        	'id' => "SHIP_WORLD",
	            'label' => "REST OF THE WORLD",
	            'type' => "SHIPPING",
	            'selected' => false,
	            'amount' => array(
	                'value' => "40.00",
	                'currency_code' => "EUR"
                )
            )
        ),
	    'GBP' => array(
	        array(
                'id' => "SHIP_UK",
	            'label' => "WITHIN UK",
	            'type' => "SHIPPING",
	            'selected' => true,
	            'amount' => array(
                    'value' => "10.00",
	                'currency_code' => "GBP"
                )
            ),
	        array(
	        	'id' => "SHIP_WORLD",
	            'label' => "REST OF THE WORLD",
	            'type' => "SHIPPING",
	            'selected' => false,
	            'amount' => array(
	                'value' => "30.00",
	                'currency_code' => "GBP"
                )
            )
        )
    ),
	'archive' => array(
	    'USD' => array(
            array(
                'id' => "SHIP_US",
                'label' => "DOMESTIC",
                'type' => "SHIPPING",
                'selected' => true,
                'amount' => array(
                    'value' => "10.00",
                    'currency_code' => "USD"
                )
            )
            
        ), 
	    'EUR' => array(
	        array(
                'id' => "SHIP_EU",
	            'label' => "WITHIN EU",
	            'type' => "SHIPPING",
	            'selected' => true,
	            'amount' => array(
	                'value' => "8.00",
	                'currency_code' => "EUR"
                )
            ),
	        array(
	        	'id' => "SHIP_WORLD",
	            'label' => "REST OF THE WORLD",
	            'type' => "SHIPPING",
	            'selected' => false,
	            'amount' => array(
	                'value' => "40.00",
	                'currency_code' => "EUR"
                )
            )
	    ),
	    'GBP' => array(
	        array(
	        	'id' => "SHIP_UK",
	            'label' => "WITHIN UK",
	            'type' => "SHIPPING",
	            'selected' => true,
	            'amount' => array(
	                'value' => "5.00",
	                'currency_code' => "GBP"
                )
	        ),
	        array(
	        	'id' => "SHIP_WORLD",
	            'label' => "REST OF THE WORLD",
	            'type' => "SHIPPING",
	            'selected' => false,
	            'amount' => array(
	                'value' => "30.00",
	                'currency_code' => "GBP"
                )
            )
        )
	)
);