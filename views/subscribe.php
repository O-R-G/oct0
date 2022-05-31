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

    preg_match('/\[list\-name\]\((.*?)\)/', trim($item['deck']), $temp);
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

    if($listId != 0) {
    ?>
        <script>
            function checkForm(event){
                event.preventDefault();
                let thisForm = event.target.parentNode;
                while(thisForm.tagName.toLowerCase() != 'form')
                    thisForm = thisForm.parentNode;
                let thisEmailInput = thisForm.querySelector('input[name="email"]');
                if(thisEmailInput && thisEmailInput.value !== '')
                    thisForm.submit();
                else console.log('empty email')
            }
        </script>
        <section id="main" >
            <div id='content'>
                <div id="columns" class="columnsDisabled">
                    <div id='en'>
                        <form id="newsletter-form-en" class="newsletter-form" method="POST">
                            <div><?= trim($item['body']); ?></div>
                            <input type="hidden" name="action" value="sign-up">
                            <input type="hidden" name="listId" value="<?= $listId; ?>">
                            <input type="email" name="email">
                            <button class="mailinglist-submit" onclick="checkForm(event)"></button>
                        </form>
                    </div><div id='fr'>
                        <form id="newsletter-form-fr" class="newsletter-form" method="POST">
                            <div><?= trim($item['notes']); ?></div>
                            <input type="hidden" name="action" value="sign-up">
                            <input type="hidden" name="listId" value="<?= $listId; ?>">
                            <input type="email" name="email">
                            <button class="mailinglist-submit" onclick="checkForm(event)"></button>
                        </form>
                    </div>
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
            .newsletter-container
            {
                /*max-width: 540px;*/
                /*padding: 1em;*/
            }
            input[name="email"]
            {
                outline: none;
                padding: 0;
                box-shadow: none;
                min-width: 180px;
                width: 50%;
                border: none;
                border-bottom: 2px solid #000;
                padding: 5px;
            }
            .mailinglist-submit
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
                vertical-align: middle;
            }
        </style><?
    } else { ?><script>window.location.href="/sign-up/error";</script><? }
}
else if( $_POST['action'] == 'sign-up' )
{
    $createContact = new \SendinBlue\Client\Model\CreateContact(); // Values to create a contact
    $createContact['email'] = $_POST['email'];
    $createContact['listIds'] = [intval($_POST['listId'])];

    try {
        $result_obj = $apiInstance->createContact($createContact);        
        $result = (array) $result_obj;
        $result = $result[array_key_first($result)];
        if(isset($result['id'])){
            ?><script>window.location.href="/sign-up/success";</script><?
        }
    } catch (Exception $e) {
        // $error = (array) $e;
        // $error = json_decode($error[array_key_first($error)], true);
        ?><script>window.location.href="/sign-up/error";</script><?
    }
<<<<<<< HEAD
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
=======
    
}
>>>>>>> e08385e3446fedb0d5842e0d4863916ab72c04b2
