<?php
require_once(__DIR__ . '/../static/php/list-functions.php');

if(count($uri) === 3) {
    $archive_item = $item;
    $archive_id = $item['id'];
    $archive_url_base = implode('/', $uri);
    $active_filter_slug = '';
    
}
else{
    $temp = array_slice($uri, 0, 3);
    $archive_url_base = implode('/', $temp);
    $temp = $oo->urls_to_ids($temp);
    $archive_id = end($temp);
    $archive_item = $oo->get($archive_id);
    $active_filter_slug = $uri[3];
}
$filter_items = $oo->children($archive_id);
foreach($filter_items as $key => $child) 
    if (substr($child['name1'], 0, 1) === '.') unset($filter_items[$key]);
$filter_items = array_values($filter_items);
$filter_items_all = array(
    'name1' => 'All',
    'url' => ''
);
array_unshift( $filter_items, $filter_items_all);

$filter_html = render_filter($filter_items, '', array(), $archive_url_base, $active_filter_slug);

$list_items = array();
$list_html = '';
foreach($filter_items as $fi) {
    if($fi['url'] === '') continue;
    if( $active_filter_slug === '' || $active_filter_slug == $fi['url'] ) {
        $children = $oo->children($fi['id']);
        foreach($children as $child) {
            if (substr($child['name1'], 0, 1) === '.') continue;
            $list_html .= render_list_item($child, array(), $archive_url_base . '/' . $fi['url']);
        }
        if($active_filter_slug == $fi['url']) break;
    }
}
foreach($list_items as $key => $child) {
    if (substr($child['name1'], 0, 1) === '.') continue;

}
    
$list_items = array_values($list_items);

?><main id="main" data-active-filter-slug="<?php echo $active_filter_slug; ?>">
    <!-- <section><?php echo $filter_html; ?></section> -->
    <section class="list-wrapper">
        <?php echo $list_html; ?>
    </section>
</main>
<style>
#main {
    padding-top: 3.5em;
}
.list-item {
    display: inline-block;
    width: 240px;
    height: 300px; 
    max-width: 32vw;
    max-width: 40vw;
    vertical-align: top;
    border-color: transparent;
    position: relative;
    margin: 0.5em;
}
.list-item-thumbnail-wrapper {
    height: 100%;
    position: relative;
    overflow: hidden;
}
.list-item-thumbnail {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    object-fit: cover;
    z-index: 5;
    transition: all .5s;
    /* transition-timing-function: steps(8, end); */
}
.list-item-title {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate3d(-50%, -50%, 0);
    z-index: 10;
    opacity: 0;
    text-align: center;
}
.list-item:hover .list-item-title{
    opacity: 1;
}
.list-item:hover .list-item-thumbnail {
    filter: grayscale(100%) blur(5px);
    opacity: 0.5;
    animation: var(--thumbnail-animation)
}
</style>