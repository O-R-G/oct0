<?php
$temp_id = $oo->urls_to_ids(array('temp'));
$temp_id = end($temp_id);

$item = $oo->get($temp_id);

?>
<div id="temp-container">
    <div id="logo" class="image-block content-block"><a href="/invite"><img src="/media/gif/O-4-1080-forever.gif"></a></div> 
    <style>
        #temp-container
        {
            max-width: 600px;
            margin: 0 auto;
            padding: 40px;
            font-size: 20px;
            line-height: 1.2;
        }
        .image-block img
        {
            display: block;
            width: 100%;
            /* max-width: 500px; */
            margin: 0 auto;
        }
        .content-block + .content-block
        {
            margin-top: 28px;
        }
        #temp-container #content,
        #temp-container #content > div
        {
            padding: 0;
        }
	#logo {
		position: fixed;
    		z-index: 1000;
		left: 50%;
		top: 50%;
		transform: translate(-50%, -50%);
		width: 100%;;
		max-width: 520px;
		text-align: center;
		border-bottom: none;
	}

	/* vertical iPhone */
	@media screen and (max-width: 500px) {
		#logo {
			max-width: 75%;
		}
	}
    </style>
</div>
