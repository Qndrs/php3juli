<?php
// hier gaat het naar toe: http://localhost/index.php/user/list?limit=2
// hier gaat het naar toe: http://localhost/index.php/user/list/limit/2
// hier gaat het naar toe: http://localhost/user/list/limit/2

// http://localhost/rest-vb-root/index.php/user/list?limit=3
require __DIR__ . "/inc/bootstrap.php"; // loader van mn applicatie

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );
// var_dump($uri) ;
if ((isset($uri[3]) && $uri[3] != 'user') || !isset($uri[4])) {
    header("HTTP/1.1 404 Not Found"); 
    // spelen met headers https://reqbin.com/
    exit();
}
 
require PROJECT_ROOT_PATH . "/Controller/Api/UserController.php";
 
$objFeedController = new UserController();
$strMethodName = $uri[4] . 'Action'; // komt listAction
$objFeedController->{$strMethodName}(); // evalueert tot de functienaam: $objFeedController->listAction()  

// let op! http://localhost/rest-vb-root/index.php/user/list (geneste map, dus zijn nu de $uri[] keys aangepast (1 segment hoger))

?>