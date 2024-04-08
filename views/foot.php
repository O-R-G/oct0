        <script type='text/javascript' src='/static/js/global.js'></script>
        <!-- <script type='text/javascript' src='/static/js/ui.js'></script> -->
        <script>
                (function(){
                        /* 
                          add query strings to links
                          mostly used for a/b tests
                        */
                        <?php 
                                $params = array();
                                foreach($_GET as $key => $value)
                                        $params[] = $value === '' ? $key : $key . '=' . $value;
                                $params = implode('&', $params);
                        ?>
                        let params = '<?php echo $params; ?>';
                        if(!params) return;
                        let anchors = document.querySelectorAll('a[href]');
                        for(let a of anchors) {
                                a.href += a.href.indexOf('?') !== -1 ? '&' + params : '?' + params;
                                if(a.classList.contains('prevent-font-animation')) continue;
                                a.setAttribute('animation', 'font');
                        }
                }());
                (function(){
                        /* 
                          add animation attribute
                        */
                        /*
                        let elements_to_animate = document.querySelectorAll('a:not(.prevent-font-animation), span.submenu-toggle:not(.prevent-font-animation)');
                        for(let el of elements_to_animate) {
                                el.setAttribute('data-animation', 'font');
                        }
                        */
                }());
                
        </script>
	</body>
</html>
