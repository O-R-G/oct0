<?
// error_reporting(E_ALL);
// ini_set('display_errors', '1');
$request = $_SERVER['REQUEST_URI'];
$requestclean = strtok($request,"?");
$uri = explode('/', $requestclean);

/*
if(!$uri[1]) {
    header('Location: /en/now');
    exit();
}
*/

require_once("views/head.php");
require_once("views/language-toggle.php");
// require_once("views/menu.php");
require_once("views/menu-simple.php");
require_once("views/o.php");
// require_once("views/badge.php");
// require_once("views/logo.php");

// ** clean up this logic !! **     
if(count($uri) == 1) {
    require_once('views/home.php');
} else if ($uri[1] == 'shop'){
    if(count($uri) <= 2)
        require_once("views/shop-list.php");   
    else
        require_once("views/shop-item.php");  
}
else if($uri[1] == 'octopus-archive')
{
    require_once("views/octopus-archive.php");
}
else if(
        // count($uri) == 2 || 
        isset($uri[2]) && $uri[2] == 'now' && count($uri) < 5 ||
        isset($uri[2]) && $uri[2] == 'archive' && count($uri) < 5 ||
        isset($uri[2]) && $uri[2] == 'editions' && count($uri) < 4) {
    require_once("views/list.php");
}
else if(isset($uri[2]) && $uri[2] == 'sign-up')
    require_once("views/subscribe.php");
else 
    require_once("views/main.php");

require_once("views/subscribe-icon.php");
require_once("views/foot.php");
?>
