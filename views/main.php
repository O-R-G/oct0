<?
$name = isset($item['name1']) ? $item['name1'] : '';
$deck = isset($item['deck']) ? $item['deck'] : '';
$body = isset($item['body']) ? $item['body'] : '';
$body2 = isset($item['address1']) ? $item['address1'] : '';
$notes = isset($item['notes']) ? $item['notes'] : '';

// $body = wrap_accents($body);
// $notes = wrap_accents($notes);

?><section id="main">
    <div id='content' class="">
        <?php echo $body; ?>
    </div>
</section>
<style>
</style>