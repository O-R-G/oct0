<?
$show_submenu = isset($uri[2]) && in_array($uri[2], array('now', 'archive')) ? 1 : 0;
$submenu_depth = $show_submenu == 0 ? false : 2;

$temp = $oo->urls_to_ids(array($current_language));
$menu_root_id = end($temp);
$menu_ids = ! $submenu_depth ? array() : ( count($uu->ids) > $submenu_depth ? array_slice($uu->ids, 0, $submenu_depth) : $uu->ids );
$nav = $oo->nav($menu_ids, $menu_root_id);


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
<header id="menu" class="" show-submenu="<?php echo $show_submenu; ?>">
    <ul class="nav-level"><?
        if(!empty($nav)) {
            $prevd = $nav[0]['depth'];
            foreach($nav as $n) {
                $d = $n['depth'];
                if($d > $prevd) {
                    if($submenu_depth && $d === $submenu_depth) {
                        ?><ul class="submenu-wrapper nav-level"><li><?
                        if(count($uu->ids) > $submenu_depth) {
                            ?><a id="submenu-all" href="<?php echo implode('/', array_slice($uri, 0, $submenu_depth + 1)); ?>">
                                All
                            </a><?
                        } else {
                            ?><span>All</span><?
                        } ?>
                        </li><?
                    } else if ($d < $submenu_depth) {
                        ?><ul class="nav-level"><?
                    }
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
<style>
#menu {
    padding: 0;
}
#menu > .nav-level > li {
    display: none;
}
.viewing-menu #menu {
    padding: var(--padding);
    padding-top: 75px;
}
.viewing-menu #menu > .nav-level > li {
    display: block;
}
.viewing-menu #menu .submenu-wrapper {
    display: none;
}
.nav-level > .nav-level > .nav-level {
    /* hide nav items deeper than "submenu" if any */
    display: none;
}
#menu-toggle {
    top: calc( var(--padding) - 5px);
    left: calc( var(--padding) - 5px);
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
    animation: var(--arrow-animation);
}
.viewing-menu #menu-toggle {
    transform: rotate(630deg);

}
#menu li > a
{
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

/* submenu */

#menu[show-submenu="1"] .expanded + .nav-level{
    display: block;
}


#menu[show-submenu="1"] .submenu-wrapper {
    padding: 1em;
    position: fixed;
    top: 0;
    left: 50px;
    z-index: 900;
    width: 100vw;
    max-width: 100%;
}
#menu[show-submenu="1"] .submenu-wrapper > li {
    display: inline-block;
    border-color: transparent;
}
#menu[show-submenu="1"] .submenu-wrapper > li:hover, 
#menu[show-submenu="1"] .submenu-wrapper > li.active {
    border-color: #000;
}
#menu[show-submenu="1"] .submenu-wrapper > li + li{
    margin-left: 1em;
}
#menu[show-submenu="1"] ~ #main {
    padding-top: 2.5em;
}
</style>
