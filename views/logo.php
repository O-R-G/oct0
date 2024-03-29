<?
    /*
        view for a straight line menu with all reqd css
    */

    ?><style>
        /* :root {
            --octo-box-size: min(min(100vw, 100vh), 700px);
        } */

        /* #menu {
            height: 100vh;
            position: relative;
        } */

        #logo {
            font-size: 3rem; 
            font-family: mtdbt2f4d-88, Helvetica, Arial, sans-serif;
            /* padding: 20px; */
            z-index: 1000;
            white-space: nowrap;

        }
        .viewing-menu #logo {
            /* opacity: 0.25; */
            pointer-events: none;
        }
        #logo a {
            border-bottom: none;
        }
        /* #main-title {
            font-size: 2.0em;
            border-radius: 50%;
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
        } */



        @media screen and (max-width: 768px) {
    
            #oct0 {
                font-size: 2.0em;
            }

            .static {
                border-bottom: 4px solid #000;
            }
        }
        @media screen and (max-width: 768px) {
            .viewing-menu #logo {
                display: none;
            }
        }
    </style>
    <div id="logo" class="centre fixed">
        <h1><a class="active prevent-font-animation" href='/<?php echo $current_language; ?>'>OCT0</a></h1>
    </div>
