<?
$request = $_SERVER['REQUEST_URI'];
$requestclean = strtok($request,"?");
$uri = explode('/', $requestclean);

require_once("views/head.php");
require_once("views/language-toggle.php");
require_once("views/menu.php");
require_once("views/line.php");
require_once("views/subscribe.php");

if ($uri[1] == 'shop'){
    if(count($uri) <= 2)
        require_once("views/shop-list.php");   
    else
        require_once("views/shop-item.php");  
}
else if($uri[1] == 'octopus-archive')
{
    require_once("views/octopus-archive.php");
}
else 
    require_once("views/main.php");

// require_once("views/badge.php");
require_once("views/foot.php");
?>
