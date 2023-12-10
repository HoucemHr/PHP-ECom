
<?php
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
        