<?php
    require_once "Routing/Routes.php";
    //meaning i have supplied an email
    //problem when i click button and mail empty
    //whatever i echo will be recieved by  the js promise
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
    //however all our url will have an additional prefixed / if isset
    // so this extra / must be prefixed to the route key
    //custom url --> route --> real url 
   
