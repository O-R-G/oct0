<?php
require_once(__DIR__ . '/vendor/autoload.php');
$response = array(
    'status' => 'error',
    'body' => 'test'
);
// var_dump($_POST);
if(!isset($_POST['email'])) {
    $response['body'] = 'missing email';
    exit(json_encode($response));
}
if(!isset($_POST['listId'])) {
    $response['body'] = 'missing listId';
    exit(json_encode($response));
}
exit(json_encode($response));
$key = getenv('BREVO_API_KEY');
$config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', $key);
$apiInstance = new Brevo\Client\Api\ContactsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$createContact = new \Brevo\Client\Model\CreateContact(); // Values to create a contact
$createContact['email'] = $_POST['email'];
$createContact['listIds'] = [intval($_POST['listId'])];

try {
    $result_obj = $apiInstance->createContact($createContact);        
    $result = (array) $result_obj;
    $result = $result[array_key_first($result)];
    $response['status'] = 'success';
    $response['body'] = 'subscribed!';
    exit(json_encode($response));
} catch (Exception $e) {
    $response['body'] = 'error when handling the request';
    exit(json_encode($response));
}