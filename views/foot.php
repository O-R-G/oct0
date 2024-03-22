        <script type='text/javascript' src='/static/js/global.js'></script>
        <script type='text/javascript' src='/static/js/ui.js'></script>
        <script>
                (function(){
                        /* 
                          add query strings to links
                          mostly used for a/b tests
                        */
                        // console.log('foot');
                        <?php 
                                $params = array();
                                foreach($_GET as $key => $value)
                                        $params[] = $value === '' ? $key : $key . '=' . $value;
                                $params = implode('&', $params);
                        ?>
                        let params = '<?php echo $params; ?>';
                        console.log(params);
                        if(!params) return;
                        let anchors = document.querySelectorAll('a[href]');
                        // console.log(anchors);
                        for(let a of anchors) {
                                a.href += a.href.indexOf('?') !== -1 ? '&' + params : '?' + params;
                        }
                }())
                
        </script>
	</body>
</html>
