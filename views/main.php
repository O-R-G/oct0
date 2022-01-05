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

?><section id="main">
    <div id='content'>
    <div id='columns'>
        <div id='en'><?
            echo $body;
        ?></div>
        <div id='fr'><?
            echo $notes;
        ?></div>
        <div id='go-back'><?
            if (!empty($item['url'])) {
                ?><br><a href='/'>×</a>
                &nbsp;<a href='/contact'>→</a><?
            }
        ?></div>
    </div>
    </div>
</section>
