<?
$name = isset($item['name1']) ? $item['name1'] : '';
$deck = isset($item['deck']) ? $item['deck'] : '';
$body = isset($item['body']) ? $item['body'] : '';
$body2 = isset($item['address1']) ? $item['address1'] : '';
$notes = isset($item['notes']) ? $item['notes'] : '';
// $body = wrap_accents($body);
// $notes = wrap_accents($notes);

?><main id="main">
    <div id='content' class="">
        <?php echo $body; ?>
    </div>
</main>
<style>
    /* .submenu-wrapper {
        display: none;
    } */
</style>