<?
$request = $_SERVER['REQUEST_URI'];
$requestclean = strtok($request,"?");
$uri = explode('/', $requestclean);

require_once("views/head.php");
if (!$uri[1])
    require_once("views/temp.php");
else 
{
    exit('nothing here . . .');
}
require_once("views/foot.php");
?>
