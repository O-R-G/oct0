<?
$uri = explode('/', $_SERVER['REQUEST_URI']);

require_once("views/head.php");
// require_once("views/dial.php");
require_once("views/line.php");
if ($uri[1] == 'print')
    require_once("views/print.php");
else if ($uri[1] == 'read')
    require_once("views/read.php");
else if ($uri[1] == 'sign-up')
    require_once("views/subscribe.php");
// else if ($uri[1] == 'shop')
//    require_once("views/shop.php");
else 
    require_once("views/main.php");
// require_once("views/subscribe.php");
require_once("views/badge.php");
require_once("views/foot.php");
?>
