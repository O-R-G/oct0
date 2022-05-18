<?
    /*
        view for a straight line menu with all reqd css
    */

    ?><style>
        body {
            font-family: mtdbt2f4d-88, Helvetica, Arial, sans-serif;
            font-size: 21px;
            line-height: 24px;
        }

        #badge {
            display: none;
        }

        :root {
            --octo-box-size: min(min(100vw, 100vh), 700px);
        }

        #menu {
            height: 100vh;
            position: relative;
        }

        #oct0 {
            font-size: 3.0em; 
            /*
            border: 1px solid;
            border-radius: 50%;
            width: 250px;
            height: 250px;
            */
            padding: 20px;
            z-index: 1000;
        }

        #main-title {
            font-size: 2.0em;
            border-radius: 50%;
        }

        #logo-numeral a {
            margin-left: 10px;
        }

        .octo-box {
            display: inline-block;
            padding: 0px;
            height: var(--octo-box-size);
            width: var(--octo-box-size);
            max-width: 700px;
            max-height: 700px;
        }

        .octo-arm {
            display: inline-block;
            top: 50%;
            left: 50%;
            height: 100px;
            width: 100px;
            text-align: center;
            transform: translate(-50%, -50%);
            border-radius: 50%;
            /* border: 1px solid #00F; */
            /* background-color: #CCC; */
            /* background-color: #FF0; */
        }

        .octo-arm a,
        #main-title {
            padding: 20px;
        }

        .octo-arm-number {
            font-size: 2.0em;
        }

        .octo-arm-name {
        }

        .absolute {
            position: absolute;
        }

        .fixed {
            position: fixed;
        }

        .octo-arm:nth-child(3) {
            transform: translate(-50%, -50%) rotate(0deg) translate(calc(var(--octo-box-size)/2.5));
        }

        .octo-arm:nth-child(4) {
            transform: translate(-50%, -50%) rotate(45deg) translate(calc(var(--octo-box-size)/2.5));
        }

        .octo-arm:nth-child(5) {
            transform: translate(-50%, -50%) rotate(90deg) translate(calc(var(--octo-box-size)/2.5));
        }

        .octo-arm:nth-child(6) {
            transform: translate(-50%, -50%) rotate(135deg) translate(calc(var(--octo-box-size)/2.5));
        }

        .octo-arm:nth-child(7) {
            transform: translate(-50%, -50%) rotate(180deg) translate(calc(var(--octo-box-size)/2.5));
        }

        .octo-arm:nth-child(8) {
            transform: translate(-50%, -50%) rotate(225deg) translate(calc(var(--octo-box-size)/2.5));
        }

        .octo-arm:nth-child(1) {
            transform: translate(-50%, -50%) rotate(270deg) translate(calc(var(--octo-box-size)/2.5));
        }

        .octo-arm:nth-child(2) {
            transform: translate(-50%, -50%) rotate(315deg) translate(calc(var(--octo-box-size)/2.5));
        }


        /*
        .active:hover {
            border-bottom: 3px solid #000;
        }

        .active a:hover {
            border-bottom: 3px solid #000;
        }
        */

        .static {
            border-bottom: 6px solid #000;
        }

        .octo-arm .static {
            border-bottom: none;
        }


        @media screen and (max-width: 768px) {
    
            #oct0 {
                font-size: 2.0em;
            }

            .static {
                border-bottom: 4px solid #000;
            }
        }
    </style>
    <div id="oct0" class="centre fixed">
        <div>
            <? if( $uri[1] ){
                ?><a class="active" href='/'>OCT</a><?
            } else {
                ?><span class=''>OCT</span><?
            } ?><span id="logo-numeral"><?
                $digit = 0;
                foreach($arms as $arm) {
                    $class = ($uri[1] == $arm['url']) ? 'static' : 'active';
                    if (!empty($arm['body']))
                        echo "<a href='/" . $arm['url'] . "' class='$class'>$digit</a>";
                    else 
                        echo "<span class='$class'>$digit</span>";
                    $digit++;
                }
            ?></span><span id='logo-zero' class='hidden'>0</span>
        </div>
    </div>
