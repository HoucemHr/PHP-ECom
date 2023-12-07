
<?php
    require_once "c:/xampp/htdocs/Myproject/Routing/Routes.php";


    if(!empty(file_get_contents("php://input"))){
        $data = file_get_contents("php://input");
        $user = json_decode($data, true)["email"];
        $exists = $router->dispatch("/ControllerLogin", $user);
        if($exists){
            echo "Found";
        }else{
            //we add user  
            $router->dispatch("/ControllerLogin/addUser");
            //we redirect to home with newsession
        }
    }else{
        echo "something went wrong";
    }