<?php
    session_start();
    if(!isset($_SESSION["email"])){
        session_destroy();
    }
    require_once "Routing/Routes.php";
    $url = isset($_GET['url']) ? "/" . $_GET['url'] : '/';
    $router->dispatch($url);    
    

    


