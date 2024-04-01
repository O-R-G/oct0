<?php
require_once(__DIR__ . '/../static/php/list-functions.php');
$now_items = array();
$temp = $oo->urls_to_ids(array($current_language, 'now'));
// $now_children_ids = $oo->children_ids(end($temp));
// foreach($now_children_ids as $child_id) 
//     $now_items = array_merge($now_items, $oo->children($child_id));
$now_items = $oo->nav_full($oo->traverse(end($temp)));


$children_display_count = isset($_GET['home-item-count']) ? $_GET['home-item-count'] : count($now_items);

?><main id="main">
    <!-- <div id='content' class=""> -->
        <?php 
        foreach($now_items as $key => $now_item) {
            // echo $now_item['o']['name1'] . '<br>';
            if($key > $children_display_count) break;
            if($now_item['depth'] !== 2) continue;
            echo render_list_item($now_item['o'], array('home-list-item'), $now_item['url']);
        }
        ?>
    <!-- </div> -->
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
.list-item.home-list-item {
    width: 300px;
    height: 360px; 
    border: 2px solid;
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
    /* opacity: 0.5; */
    animation: var(--thumbnail-animation)
}
</style>
<script>
    let home_list_items = document.getElementsByClassName('home-list-item');
    let left_range = [0, 5];
    let top_range = [0, 5];
    let rotate_range = [-30, 30];
    for(let item of home_list_items) {
        console.log(item);
        let left = Math.random() * (left_range[1] - left_range[0]) + left_range[0];
        let top = Math.random() * (top_range[1] - top_range[0]) + top_range[0];
        let rotate = Math.random() * (rotate_range[1] - rotate_range[0]) + rotate_range[0];
        item.style.marginLeft = left + '%';
        item.style.marginTop = left + '%';
        item.style.transform = 'rotate(' + rotate + 'deg)';
    }
</script>