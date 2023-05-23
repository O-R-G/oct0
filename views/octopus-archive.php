<?
$name = isset($item['name1']) ? $item['name1'] : '';
$deck = isset($item['deck']) ? $item['deck'] : '';
$body = isset($item['body']) ? $item['body'] : '';
$body2 = isset($item['address1']) ? $item['address1'] : '';
$notes = isset($item['notes']) ? $item['notes'] : '';
$date = isset($item['begin']) ? $item['begin'] : '';
$find = '/<div><br><\/div>/';
$replace = '';
$body = preg_replace($find, $replace, $body); 
$body2 = preg_replace($find, $replace, $body2);
$notes = preg_replace($find, $replace, $notes);

$children = $oo->children($item['id']);
?><section id="main">
    <div id="">
        <div id='octopus-archive-container' class="">
        <?
            foreach($children as $key => $child)
            {
                $media = $oo->media($child['id']);
                $thumbnail = m_url($media[0]);
                ?><div class="archive-item" order="<?= $key; ?>">
                    <div class="archive-item-name"><?= $child['name1']; ?></div>
                    <div class="archive-item-thumbnail"><img src="<?= $thumbnail; ?>"></div>
                </div><div class="leg"></div><?
            }
        ?>
        </div>
    <div id='nav'><?
        $next = ($uri[1] == 'about') ? 'contact' : 'about'; 
        if (!empty($item['url'])) {
            ?><a href='/'>
                <img class='inline-svg' src='media/svg/x-12-k.svg'>
            </a>
            <a href='/<?= $next; ?>'>
                <img class='inline-svg' src='media/svg/arrow-right-12-k.svg'>
            </a><?
        }
    ?>
    </div>
    </div>
</section>
<style>
    #octopus-archive-container
    {
        position: relative;
        width: 100vw;
        max-width: 100%;
        height: 100vh;
        padding:20px;
        box-sizing: border-box;
    }
    .archive-item{
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        padding: 10px;
        background-color: #fff;
        z-index: 20;
    }
    .archive-item:hover
    {
        z-index: 30;
    }
    .archive-item-name
    {
        background-color: #fff;
        padding: 5px;
    }
    .leg{
        position: absolute;
        left: 50%;
        top: 50%;
        transform-origin: left center;
        height: 3px;
        background-color: #000;
        margin-bottom: 0;
        z-index: 10;
    }
    /* .archive-item:first-child{
        top: 5px;
        left: 5px;
        transform-origin: left center;
        transform: translate(0, 0) rotate(45deg);
    }
    .archive-item:nth-child(2){
        left: 50%;
        top: 5px;
        transform-origin: center center;
        transform: translate(-50%, 100%) rotate(90deg);
    }
    .archive-item:nth-child(3){
        right: 5px;
        top: 5px;
        transform-origin: right center;
        transform: translate(0, 0) rotate(-45deg);
    }
    .archive-item:nth-child(4){
        right: 5px;
        top: 50%;
        transform-origin: right center;
        transform: translate(0, -50%) rotate(0);
    }
    .archive-item:nth-child(5){
        right: 5px;
        bottom: 5px;
        transform-origin: right bottom;
        transform: translate(0, 0) rotate(45deg);
    }
    .archive-item:nth-child(6){
        left: 50%;
        bottom: 5px;
        transform-origin: center center;
        transform: translate(-50%, -100%) rotate(90deg);
    }
    .archive-item:nth-child(7){
        left: 5px;
        bottom: 5px;
        transform-origin: left center;
        transform: translate(0, 0) rotate(-45deg);
    }
    .archive-item:nth-child(8){
        left: 5px;
        top: 50%;
        transform-origin: left center;
        transform: translate(0, -50%) rotate(0);
    } */
    .archive-item-thumbnail
    {
        
        position: absolute;
        z-index: -1;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        /* display: none; */
    }
    .archive-item-thumbnail img
    {
        width: 20vw;
        height: 20vh;
        object-fit: contain;
    }
</style>
<script>
    let wW = window.innerWidth;
    let wH = window.innerHeight;
    let center = {
        x: wW / 2,
        y: wH / 2
    };
    let sArchive_items = document.getElementsByClassName('archive-item');
    let sLegs = document.getElementsByClassName('leg');
    let deg = 135;
    function styleArchiveItems(){
        for(let i = 0; i < sArchive_items.length; i++)
        {
            
            let x, y;
            deg = deg % 360;
            let l_dev = 0.5 * Math.random() + 0.3;
            l_dev = parseFloat(l_dev.toFixed(2));
            let leg = sLegs[i];
            console.log(leg);
            let thumbnail = sArchive_items[i].querySelector('.archive-item-thumbnail');
            // let l = i % 2 == 0 ? Math.sqrt(wW * wW + wH * wH) / 2 : (parseInt(i % 2) % 2 == 0 ? wH / 2 : wW / 2);
            if(i == 0)
            {
                let x = -wW / 2 * l_dev;
                let y = -wH / 2 * l_dev;
                let rad = Math.atan(y / x) + Math.PI;
                sArchive_items[i].style.transform = 'translate(calc('+x+'px - 50%), calc('+y+'px - 50%))';
                leg.style.width = Math.sqrt(x * x + y * y) + 'px';
                leg.style.transform = 'rotate(' + rad + 'rad)';
                continue;
            }
            else if(i == 1)
            {
                // let x = 0;
                let y = -wH / 2 * l_dev;
                let rad = 3 * Math.PI / 2;
                sArchive_items[i].style.transform = 'translate(calc( -50%), calc('+y+'px - 50%))';
                leg.style.width = Math.abs(y) + 'px';
                leg.style.transform = 'rotate(' + rad + 'rad)';
                // thumbnail.style.top = '0';
                // thumbnail.style.left = '50%';
                // thumbnail.style.transform = 'translate(-50%, 0)';
                continue;
            }
            else if(i == 2)
            {
                let x = wW / 2 * l_dev;
                let y = -wH / 2 * l_dev;
                let rad = Math.atan( y / x);
                sArchive_items[i].style.transform = 'translate(calc('+x+'px - 50%), calc('+y+'px - 50%))';
                leg.style.width = Math.sqrt(x * x + y * y) + 'px';
                leg.style.transform = 'rotate(' + rad + 'rad)';
                // thumbnail.style.top = '0';
                // thumbnail.style.right = '0';
                continue;
            }
            else if(i == 3)
            {
                let x = wW / 2 * l_dev;
                // let y = -wH / 2 * l_dev + 'px';
                let rad = 0;
                sArchive_items[i].style.transform = 'translate(calc('+x+'px - 50%), calc( -50%))';
                leg.style.width = Math.abs(x) + 'px';
                leg.style.transform = 'rotate(' + rad + 'rad)';
                // thumbnail.style.top = '50%';
                // thumbnail.style.right = '0';
                // thumbnail.style.transform = 'translate(0, -50%)';
                continue;
            }
            else if(i == 4)
            {
                let x = wW / 2 * l_dev;
                let y = wH / 2 * l_dev;
                let rad = Math.atan( y / x);
                sArchive_items[i].style.transform = 'translate(calc('+x+'px - 50%), calc('+y+'px - 50%))';
                leg.style.width = Math.sqrt(x * x + y * y) + 'px';
                leg.style.transform = 'rotate(' + rad + 'rad)';
                // thumbnail.style.bottom = '0';
                // thumbnail.style.right = '0';
                continue;
            }
            else if(i == 5)
            {
                let y = wH / 2 * l_dev;
                let rad = Math.PI / 2;
                sArchive_items[i].style.transform = 'translate(calc( -50%), calc('+y+'px - 50%))';
                leg.style.width = Math.abs(y) + 'px';
                leg.style.transform = 'rotate(' + rad + 'rad)';
                // thumbnail.style.bottom = '0';
                // thumbnail.style.left = '50%';
                // thumbnail.style.transform = 'translate(-50%, 0)';
                continue;
            }
            else if(i == 6)
            {
                let x = -wW / 2 * l_dev;
                let y = wH / 2 * l_dev;
                let rad = Math.atan( y / x) + Math.PI;
                sArchive_items[i].style.transform = 'translate(calc('+x+'px - 50%), calc('+y+'px - 50%))';
                leg.style.width = Math.sqrt(x * x + y * y) + 'px';
                leg.style.transform = 'rotate(' + rad + 'rad)';
                continue;
            }
            else if(i == 7)
            {
                let x = -wW / 2 * l_dev;
                let rad = Math.PI;
                // let y = -wH / 2 * l_dev + 'px';
                sArchive_items[i].style.transform = 'translate(calc('+x+'px - 50%), calc( -50%))';
                leg.style.width = Math.abs(x) + 'px';
                leg.style.transform = 'rotate(' + rad + 'rad)';
                continue;
            }
        }
    }
    styleArchiveItems();
    window.addEventListener('resize', function(){
        wW = window.innerWidth;
        wH = window.innerHeight;
        styleArchiveItems();
    });
    
</script>
