<?php
    session_start();
    if(!isset($_SESSION["email"])){
        session_destroy();
    }
    require_once "Routing/Routes.php";

    if(!empty(file_get_contents("php://input"))){
        $data = file_get_contents("php://input");
        $user = json_decode($data, true)["email"];
        $result = $router->dispatch("/ControllerLogin", $user);
        if($router->dispatch("/ControllerLogin", $user)){
            echo "1";//found
        }
        else{
            echo "0";
        }
        
    }
    else{
    $url = isset($_GET['url']) ? "/" . $_GET['url'] : '/';
    $router->dispatch($url);    
    }

    

    //the added / to take care of empty string after localhost
    //however all our url will have an additional prefixed / if isset according to the above code
    // so this extra / must be prefixed to the route key
    //custom url --> route --> real url 
   
