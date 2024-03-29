<?php 
$temp = $oo->urls_to_ids(array($current_language));
$language_id = end($temp);
// $nav = $oo->nav_full_tree($language_id);
$nav = $oo->nav(array(), $language_id);
// $tree = $oo->traverse($language_id);
// $nav = $oo->nav_full($tree);
?>
<div id="menu-toggle" class="fixed" onclick="toggle_menu()">
    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
    viewBox="0 0 150 150" style="enable-background:new 0 0 150 150;" xml:space="preserve">
    <style type="text/css">
        .st0{fill:none;stroke:#000000;stroke-width:9;stroke-miterlimit:10;}
    </style>
    <polyline class="st0" points="70.8,35.1 30.8,75.1 70.8,115.3 "/>
    <line class="st0" x1="30.8" y1="75.1" x2="120" y2="75.1"/>
    </svg>
</div>
<nav id="menu" class="full-height">
    <ul class="column">
    <ul class=""><?
if(!empty($nav))
{
    $tree_uri = array_slice($uri, 1);
    $tree_ids = $oo->urls_to_ids($tree_uri);
    $prevd = $nav[0]['depth'];

    foreach($nav as $key => $n) {
        $d = $n['depth'];
        if($d > $prevd) {
            $expanded = isset($nav[$key - 1]) && in_array($nav[$key - 1]['o']['id'], $uu->ids); 
            ?><ul class="nav-level<?php echo $expanded ? ' expanded' : ''; ?>"><?
        }
        else {
            for($i = 0; $i < $prevd - $d; $i++) { 
                ?></ul><? 
            }
        }
        $to_expand = isset($nav[$key + 1]) && $nav[$key + 1]['depth'] > $d;
        $active = in_array($n['o']['id'], $tree_ids);
        $class = $active ? ($to_expand ? 'expanded' : 'active' ) : '';
        ?><li class="<?php echo $class; ?>"><?
        
            if(!$to_expand) {
                ?><a href="<? echo '/' . $current_language . '/' . $n['url']; ?>"><?
                echo $n['o']['name1'];
                ?></a><?
            }
            else {
                ?><span class="submenu-toggle" onclick="toggle_submenu(this)"><?= $n['o']['name1']; ?></span><?
            }
        ?></li><?
        $prevd = $d;
    }
}
?></ul>
</ul>
</nav>
<script>
    function toggle_submenu(target){
        let li = target.parentNode;
        // let next_sibling = li.nextElementSibling;
        // if(!next_sibling.tagName) return;
        li.classList.toggle('expanded');
        
    }
</script>
<style>
#menu {
    display: none;
    padding: var(--padding);
    padding-bottom: 60px; /* save space for mailing list input */
    z-index:1000;
    width: 50vw;
    left: 0;
    top: 0;
    position: fixed;
    overflow: scroll;
    background-color: #fff;
}
.viewing-menu #menu {
    display: block;
}
#menu-toggle {
    top: calc( var(--padding) - 5px);
    right: calc( var(--padding) - 5px);
    width: 48px;
    height: 48px;
    cursor: pointer;
    z-index: 1100;
    transition: transform .5s;
    transition-timing-function: steps(8, end);
}
#menu-toggle > img {
    display: block;
    width: 100%;
}
#menu-toggle:hover .st0 {
    /* stroke-width:12; */
    animation: var(--arrow-animation);
}
.viewing-menu #menu-toggle {
    transform: rotate(630deg);

}
.nav-level {
    display: none;
}
.expanded + .nav-level{
    display: block;
}
.submenu-toggle {
    cursor: pointer;
}
#menu li > a,
#menu li > span
{
    float: left;
    border-bottom: none;
    border-bottom: 2px solid transparent;
}
#menu li > a:hover,
#menu li > span:hover,
#menu li.active > a,
#menu li.active > span
{
    border-bottom: 2px solid;
}
#menu li + li,
#menu li + ul,
#menu ul + li {
    margin-top: 5px;
}
#menu li:after {
    content: '';
    display: block;
    clear: both;
    height: 0;
}
@media screen and (max-width: 500px) {
    #menu {
        width: 100vw;
    }
}
</style>
<?php