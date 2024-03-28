<?
$temp = $oo->urls_to_ids(array($current_language));
$root_id = end($temp);
$menu_ids = count($uu->ids) > 2 ? array_slice($uu->ids, 0, 2) : $uu->ids;
// var_dump($menu_ids);
$nav = $oo->nav($menu_ids, $root_id);
// $nav = $oo->nav(array(), $root_id);
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
<header id="menu" class="">
    <ul class="nav-level"><?
        if(!empty($nav)) {
            $prevd = $nav[0]['depth'];
            foreach($nav as $n) {
                $d = $n['depth'];
                if($d > $prevd) {
                    ?><ul class="submenu-wrapper nav-level"><li><?
                        if(count($uri) > 3) {
                            ?><a href="<?php echo implode('/', array_slice($uri, 0, 3)); ?>">
                                All
                            </a><?
                        } else {
                            ?><span>All</span><?
                        } ?>
                    </li><?
                } else {
                    for($i = 0; $i < $prevd - $d; $i++) {
                        ?></ul><?
                    }
                }
                ?><li><?
                    if($n['o']['id'] != $uu->id) {
                        ?><a href="<? echo $host.$current_language."/".$n['url']; ?>"><?
                            echo $n['o']['name1'];
                        ?></a><?
                    } else {
                        ?><span><?= $n['o']['name1']; ?></span><?
                    }
                ?></li><?
                $prevd = $d;
            }
        }
    ?></ul>
</header>
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
    /* display: none; */
    padding: var(--padding);
    /* padding-bottom: 60px;
    z-index:1000;
    width: 50vw;
    left: 0;
    top: 0;
    position: fixed;
    overflow: scroll;
    background-color: #fff; */
}
#menu > .nav-level > li {
    display: none;
}
.viewing-menu #menu > .nav-level > li {
    display: block;
}
.viewing-menu #menu .submenu-wrapper {
    /* hide submenu when  */
    display: none;
}
.nav-level > .nav-level > .nav-level {
    /* hide nav items deeper than "submenu" if any */
    display: none;
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
    /* display: none; */
}
.expanded + .nav-level{
    display: block;
}

/* .submenu-toggle {
    cursor: pointer;
} */
#menu li > a
{
    /* float: left; */
    /* border-bottom: none; */
    border-bottom: 2px solid transparent;
}
#menu li > span {
    border-bottom: 2px solid #000;
}
#menu li > a:hover,
#menu li > span:hover,
#menu li.active > a,
#menu li.active > span
{
    border-bottom: 2px solid #000;
}
/* #menu li + li,
#menu li + ul,
#menu ul + li {
    margin-top: 5px;
} */
/* #menu li:after {
    content: '';
    display: block;
    clear: both;
    height: 0;
} */
.submenu-wrapper {
    padding: 1em;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 900;
    width: 100vw;
    max-width: 100%;
}
.submenu-wrapper > li {
    display: inline-block;
    border-color: transparent;
}
.submenu-wrapper > li:hover, 
.submenu-wrapper > li.active {
    border-color: #000;
}
.submenu-wrapper > li + li{
    /* margin-top: 5px; */
    margin-left: 1em;
}

@media screen and (max-width: 500px) {
    #menu {
        width: 100vw;
    }
}
</style>