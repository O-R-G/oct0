<?php
require_once(__DIR__ . '/../static/php/list-functions.php');

// if(count($uri) === 3) {
//     $list_item = $item;
//     $list_id = $item['id'];
//     $list_url_base = implode('/', $uri);
//     $active_submenu_item_slug = '';
    
// }
// else{
//     $temp = array_slice($uri, 0, 3);
//     $list_url_base = implode('/', $temp);
//     $temp = $oo->urls_to_ids($temp);
//     $list_id = end($temp);
//     $list_item = $oo->get($list_id);
//     $active_submenu_item_slug = $uri[3];
// }
// $filter_items = $oo->children($list_id);
// foreach($filter_items as $key => $child) 
//     if (substr($child['name1'], 0, 1) === '.') unset($filter_items[$key]);
// $filter_items = array_values($filter_items);
// $filter_items_all = array(
//     'name1' => 'All',
//     'url' => ''
// );
// array_unshift( $filter_items, $filter_items_all);

// $filter_html = render_filter($filter_items, '', array(), $list_url_base, $active_submenu_item_slug);

// $list_items = array();
// $list_html = '';
// foreach($filter_items as $fi) {
//     if($fi['url'] === '') continue;
//     if( $active_submenu_item_slug === '' || $active_submenu_item_slug == $fi['url'] ) {
//         $children = $oo->children($fi['id']);
//         foreach($children as $child) {
//             if (substr($child['name1'], 0, 1) === '.') continue;
//             $list_items[] = $child;
//             // $list_html .= render_list_item($child, array(), $list_url_base . '/' . $fi['url']);
//         }
//         if($active_submenu_item_slug == $fi['url']) break;
//     }
// }
if($submenu_depth && count($uu->ids) < $submenu_depth + 1) {
    /* fetching list items that are not direct children */
    $list_items = array();
    $temp = $oo->nav_full($oo->traverse($item['id']));
    $list_depth = $submenu_depth - count($uu->ids) + 2;
    foreach($temp as $t) {
        if($t['depth'] !== $list_depth) continue;
        $this_item = $t['o'];
        $this_item['url'] = implode('/', array_slice($uri, 0, $list_depth + 1)) . '/' . $t['url'];
        $list_items[] = $this_item;
    }
} else {
    $list_items = $oo->children($item['id']);
    foreach($list_items as $key => &$list_item) {
        if(substr($list_item['name1'], 0, 1) === '.') {
            unset($list_items[$key]);
            continue;
        }
        $list_item['url'] = implode('/', $uri) . '/'. $list_item['url'];
    }
    unset($list_item);
    $list_items = array_values($list_items);
}

$list_url_base = implode('/', $uri);
function sort_by_rank_then_begin_desc($a, $b){
    /* if it happens in the past, sort by begin in a descending manner */
    if($a['rank'] !== $b['rank']) return $a['rank'] > $b['rank'] ? -1 : 1;
    if($a['begin'] == $b['begin']) return 0;
    return $a['begin'] > $b['begin'] ? -1 : 1;
}
function sort_by_rank_then_begin_asc($a, $b){
    if($a['rank'] !== $b['rank']) return $a['rank'] > $b['rank'] ? -1 : 1;
    if($a['begin'] == $b['begin']) return 0;
    return $a['begin'] > $b['begin'] ? 1 : -1;
}
if(isset($uri[2]) && $uri[2] === 'now')
    usort($list_items, "sort_by_rank_then_begin_asc");
else
    usort($list_items, "sort_by_rank_then_begin_desc");

?><main id="main">
    <section class="list-wrapper">
        <?php 
        if(count($list_items) > 0):
            foreach($list_items as $list_item){
                echo render_list_item($list_item, array(), $list_item['url']);
            } 
        else:
            echo 'There is no avaliable item under this category for now.';
        endif;
        ?>
    </section>
</main>
<style>
.list-wrapper {
    padding: 0.5em;
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