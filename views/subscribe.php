<?php
require_once('static/php/vendor/autoload.php');
$key = getenv('BREVO_API_KEY');
// var_dump($key);
// $config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', $key);

// $apiInstance = new SendinBlue\Client\Api\ContactsApi(
//     new GuzzleHttp\Client(),
//     $config
// );

// Configure API key authorization: api-key
$config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', $key);
// var_dump($key);
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api-key', 'Bearer');
// Configure API key authorization: partner-key
// $config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKey('partner-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('partner-key', 'Bearer');

$apiInstance = new Brevo\Client\Api\ContactsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$limit = 10;
$offset = 0;
$temp = $oo->urls_to_ids(array('sign-up'));
$body = empty(trim(strip_tags($item['body']))) ? '' : $item['body'];

preg_match('/\[list\-name\]\((.*?)\)/', trim($item['deck']), $temp);
$listId = 0;
if(!empty($temp))
    $listName = $temp[1];
try {
    $lists_obj = $apiInstance->getLists();
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

if($listId) {
?>
    <script>
        function checkEmpty(event){
            let t = event.target;
            if(t.value === '') {
                // t.setAttribute('data-is-empty', true)
                t.parentNode.setAttribute('data-is-empty', true)
            }
            else {
                // t.setAttribute('data-is-empty', false)
                t.parentNode.setAttribute('data-is-empty', false)
            }
        }
        function checkForm(form){
            // event.preventDefault();
            let thisForm = form ? form : document.querySelector('form');
            let thisEmailInput = thisForm.querySelector('input[name="email"]');
            return thisEmailInput && thisEmailInput.value !== '';
            // if(thisEmailInput && thisEmailInput.value !== '')
            //     thisForm.submit();
            // else console.log('empty email')
        }
        function submitSubscribeForm(event){
            event.preventDefault();
            let form = event.target;
            while(form.tagName.toLowerCase() !== 'form'){
                if(form === document.body) return;
                form = form.parentNode;
            }
                
            valid = checkForm(event.target.parentNode);
            if(!valid) return;
            let url = '/static/php/subscribeHandler.php';
            fetch(url, {
                method: 'POST',
                // headers: {
                //     'Content-Type': 'multipart/form-data'
                // },
                body: new FormData(form)
            })
                .then((response)=>response.json())
                .then((data)=>{
                if(data['status'] == 'error') throw new Error(data['body']);
                else {
                    document.getElementById('subscribe-error-message').innerHTML = '';
                    document.getElementById('subscribe-success-message').innerHTML = data['body'];
                    setTimeout(()=>{
                        document.getElementById('subscribe-success-message').innerHTML = '';
                    }, 4000);
                }
                })
                .catch((err)=>{
                document.getElementById('subscribe-error-message').innerHTML = err;
                setTimeout(()=>{
                    document.getElementById('subscribe-error-message').innerHTML = '';
                }, 4000);
                });
        }
    </script>
    <main id="main">
        <div id="content">
            <?= $body; ?>
            <form id="subscribe-form" class="subscribe-form" method="POST">
                <input type="hidden" name="action" value="sign-up">
                <input type="hidden" name="listId" value="<?= $listId; ?>">
                <div id="email-input-wrapper" class="input-wrapper" data-is-empty="true">
                    <input type="email" name="email" oninput="checkEmpty(event)">
                    <div class="pseudo-placeholder"><?= $item['notes']; ?></div>
                </div>
                <button class="mailinglist-submit" onclick="submitSubscribeForm(event)"></button>
                <div id="subscribe-messages">
                    <span id="subscribe-success-message"></span>
                    <span id="subscribe-error-message"></span>
                </div>
            </form>
        </div>
    </div>
    <style>
        /* #subscribe-container
        {
            bottom: var(--padding);
            left: var(--padding);
            z-index: 1100;
        } */
        #subscribe-form {
            position: relative;
            width: 45vw;
            max-width: 300px;
            display: flex;
            align-items: center;
        }
        .input-wrapper {
            position: relative;
        }
        #email-input-wrapper {
            flex: 1;
        }
        .pseudo-placeholder {
            position: absolute;
            pointer-events: none;
            padding: 2px 5px;
            left: 0;
            top: 0;
            height: 100%;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            max-width: 100%;
        }
        input[name="email"]
        {
            width: 100%;
            outline: none;
            padding: 0;
            box-shadow: none;
            
            /* min-width: 25vw; */
            border: none;
            border-bottom: 2px solid #000;
            padding: 2px 5px;
            font-family: inherit;
            font-size: inherit;
        }
        input[name="email"]:focus ~ .pseudo-placeholder,
        [data-is-empty='false'] > .pseudo-placeholder{
            display: none;
        }
        /* [data-is-empty="true"] ~ button {
            opacity: 0;
            pointer-events: none;
        } */
        .mailinglist-submit
        {
            appearance: none;
            -webkit-appearance: none;
            background-color: transparent;
            border: none;
            border-radius: 0;
            width: 22px;
            height: 22px;
            background-image: url('/media/svg/arrow-right-12-k.svg');
            background-size: 100%;
            cursor: pointer;
            vertical-align: middle;
            opacity: 1;
            pointer-events: auto;
        }
        #subscribe-messages {
            padding: 2px 5px;
            position: absolute;
            transform: translate(0, -100%);
        }
        #subscribe-error-message {
            color: #f00;
        }
    </style><?
}
