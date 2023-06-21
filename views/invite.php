<?php
$temp_id = $oo->urls_to_ids(array('temp'));
$temp_id = end($temp_id);

$item = $oo->get($temp_id);

?>
<div id="temp-container">
    <div id="temp-logo" class="image-block content-block"><img src="/media/jpg/email-logo.jpg"></div>
    <div class="text-block content-block">
        <div class="en"><?php echo $item['deck']; ?></div>
        <div class="fr"><?php echo $item['address2']; ?></div>
    </div>
    <div class="image-block content-block"><a href="/sign-up"><img src="/media/gif/O-4-1080-forever.gif"></a></div>
    <div class="text-block content-block">
        <div class="en">with</div>
        <div class="fr">avec</div>
    </div>
    <div class="image-block content-block"><img src="/media/jpg/email-1.jpg"></div>
    <div class="text-block content-block">
        <div class="en"><?php echo $item['body']; ?></div>
        <div class="fr"><?php echo $item['address1']; ?></div>
    </div>
    <div class="image-block content-block"><img id="semiotexte" src="/media/jpg/email-2.jpg"></div>
    <!--
    <div class="text-block content-block">
        <div class="en">Afterparty from 20:00 at Catherine Bastide <a href='https://maps.apple.com/?address=16%20Traverse%20Ste-H%C3%A9l%C3%A8ne,%2013007%20Marseille,%20France&ll=43.283743,5.350525&q=16%20Traverse%20Ste-H%C3%A9l%C3%A8ne&_ext=EiYpxOBRTLmjRUAxEj0M4a1gFUA5QrZ3qN+kRUBBaIWXvVBtFUBQBA%3D%3D'>16 Traverse Sainte Hélène 13007 Marseille</a></div>
        <div class="fr">Afterparty à partir de 20:00 chez Catherine Bastide <a href='https://maps.apple.com/?address=16%20Traverse%20Ste-H%C3%A9l%C3%A8ne,%2013007%20Marseille,%20France&ll=43.283743,5.350525&q=16%20Traverse%20Ste-H%C3%A9l%C3%A8ne&_ext=EiYpxOBRTLmjRUAxEj0M4a1gFUA5QrZ3qN+kRUBBaIWXvVBtFUBQBA%3D%3D'>16 Traverse Sainte Hélène 13007 Marseille</a></div>
    </div>
    -->
    <div class="text-block content-block">
        <div class="en">
		<a href="/sign-up">Join the OCT0 mailing list ...</a>
	</div>
        <div class="fr">
		<a href="/sign-up">Abonnez-vous à la liste d'envoi d’OCT0 ...</a>
	</div>
    </div>
    <!-- <?php require_once('views/subscribe.php'); ?> -->
    <style>
        #temp-container
        {
            max-width: 600px;
            margin: 0 auto;
            padding: 40px;
            font-size: 20px;
            line-height: 1.2;
        }
        .text-block{
            display: flex;
        }
        .text-block > div
        {
            flex: 1;
        }
        .text-block > .fr
        {
            padding-left: 80px;
        }
        #temp-logo
        {
            padding-bottom: 15px;
        }
        #temp-logo img
        {
            width: 30%;
            min-width: 120px;
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
        #main
        {
            margin-top: 28px;
        }
	#semiotexte {
             width: 85%;
	}
    </style>
</div>
