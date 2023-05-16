<?php
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
// $acceptedCurrencies = array_keys($currencies);
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
