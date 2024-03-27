<?
$root_id = end($oo->urls_to_ids(array($current_language)));
$nav = $oo->nav($uu->ids, $root_id);
?><header id="menu" class="">
    <ul>
        <ul class="nav-level"><?
            if(!empty($nav)) {
                $prevd = $nav[0]['depth'];
                foreach($nav as $n) {
                    $d = $n['depth'];
                    if($d > $prevd) {
                        ?><ul class="nav-level"><?
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
    </ul>
</header>
