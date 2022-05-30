<?php
require_once('static/php/vendor/autoload.php');

$key = getenv('SendinBlueApiKey');
// var_dump($key);
$config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', $key);

$apiInstance = new SendinBlue\Client\Api\ContactsApi(
    new GuzzleHttp\Client(),
    $config
);

if(!isset($_POST['action']))
{
    $limit = 10;
    $offset = 0;

    preg_match('/\[list\-name\]\((.*?)\)/', trim($item['notes']), $temp);
    $listId = 0;
    if(!empty($temp))
        $listName = $temp[1];

    try {
        $lists_obj = $apiInstance->getLists($limit, $offset);
        $lists = (array) $lists_obj;
        $lists = $lists[array_key_first($lists)]["lists"];
        forEach($lists as $l)
        {
            if($l['name'] == $listName)
            {
                $listId = $l['id'];
                break;
            }
        }
    } catch (Exception $e) {
        echo 'Exception when calling ContactsApi->getFolderLists: ', $e->getMessage(), PHP_EOL;
    }
    $join_msg_pattern = '/\[join\]\((.*)\)/';
    preg_match($join_msg_pattern, $item['deck'], $temp);
    if(!empty($temp)) $join_msg_fr = $temp[1];
    preg_match($join_msg_pattern, $item['body'], $temp);
    if(!empty($temp)) $join_msg_en = $temp[1];

    ?>
    <script>
        function checkForm(event){
            event.preventDefault();
            console.log('checkForm');
            if(document.getElementById('email').value !== '')
            {
                document.getElementById('newsletter-form').submit();
            }
            else console.log('empty email')
        }
    </script>
    <section id="main" >
        <div id='content'>
        <div id='newsletter-container' class="columnsDisabled">
            <form id="newsletter-form" method="POST">
                <div><?= $join_msg_en; ?><br><span class="fr"><?= $join_msg_fr; ?></span></div>
                <input type="hidden" name="action" value="sign-up">
                <input type="hidden" name="listId" value="<?= $listId; ?>">
                <input id="email" type="email" name="email">
                <button id="mailinglist-submit" onclick="checkForm(event)"></button>
            </form>
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
    </section>
    <style>
        #newsletter-container
        {
            max-width: 540px;
            padding: 1em;
        }
        #email
        {
            outline: none;
            padding: 0;
            box-shadow: none;
            min-width: 180px;
            width: 50%;
            border: none;
            border-bottom: 2px solid #000;
        }
        #mailinglist-submit
        {
            appearance: none;
            -webkit-appearance: none;
            background-color: transparent;
            border: none;
            width: 22px;
            height: 22px;
            background-image: url('media/svg/arrow-right-12-k.svg');
            background-size: 100%;
            cursor: pointer;
        }
    </style>
<? }
else if( $_POST['action'] == 'sign-up' )
{
    $createContact = new \SendinBlue\Client\Model\CreateContact(); // Values to create a contact
    $createContact['email'] = $_POST['email'];
    $createContact['listIds'] = [intval($_POST['listId'])];

    try {
        $result_obj = $apiInstance->createContact($createContact);        
        $result = (array) $result_obj;
        $result = $result[array_key_first($result)];
        if(isset($result['id']))
        {
            $success_msg_pattern = '/\[success\]\((.*?)\)/';
            preg_match($success_msg_pattern, $item['deck'], $temp);
            if(!empty($temp)) $success_msg_fr = $temp[1];
            preg_match($success_msg_pattern, $item['body'], $temp);
            if(!empty($temp)) $success_msg_en = $temp[1];
            ?>
            <section id="main" >
                <div id='content'>
                    <div id="columns" class="columnsDisabled">
                        <div id="en"><?= $success_msg_en; ?></div><div id="fr"><?= $success_msg_fr; ?></div>
                    </div>
                </div>
            </section>
            <?
        }
    } catch (Exception $e) {
        $error = (array) $e;
        $error = json_decode($error[array_key_first($error)], true);
        if($error['message'] == 'Invalid email address')
        {
            $error_msg_pattern = '/\[error_invalid\-email\]\((.*?)\)/';
        }
        else
            $error_msg_pattern = '/\[error_general\]\((.*?)\)/';

        preg_match($error_msg_pattern, $item['deck'], $temp);
        if(!empty($temp)) $error_msg_fr = $temp[1];
        preg_match($error_msg_pattern, $item['body'], $temp);
        if(!empty($temp)) $error_msg_en = $temp[1];
    }
    ?>
    <section id="main" >
        <div id='content'>
            <div id="columns" class="columnsDisabled">
                <div id="en"><?= $error_msg_en; ?></div><div id="fr"><?= $error_msg_fr; ?></div>
            </div>
        </div>
    </section>
    <?
}
