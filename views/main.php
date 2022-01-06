<?
$name = $item['name1'];
$deck = $item['deck'];
$body = $item['body'];
$notes = $item['notes'];
$date = $item['begin'];
$find = '/<div><br><\/div>/';
$replace = '';
$body = preg_replace($find, $replace, $body); 
$notes = preg_replace($find, $replace, $notes);

$body = wrap_accents($body);
$notes = wrap_accents($notes);

?><section id="main">
    <div id='content'>
    <div id='columns'>
        <div id='en'><?
            echo $body;
        ?></div>
        <div id='fr'><?
            echo $notes;
        ?></div>
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
        ?></div>
    </div>
</section>
