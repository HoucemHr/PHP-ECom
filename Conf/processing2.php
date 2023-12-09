
<?php
    session_start();
    require_once "c:/xampp/htdocs/Myproject/Routing/Routes.php";
    require_once "c:/xampp/htdocs/Myproject/App/Model/ModelUsers.php";


    if(!empty(file_get_contents("php://input"))){
        $data = json_decode(file_get_contents("php://input"), true);
        $user = $data["email"];
        $exists = $router->dispatch("/ControllerLogin", $user);
        if($exists){
            echo "Found";
            session_destroy();
        }else{
            $userData = ["email" => $data["email"], "password" => $data["pass"]];
            //1) add user  
            $router->dispatch("/ControllerLogin/newUser", $userData);
            //2) new session for user 
            $_SESSION["email"] = $user;
            //3)echo success to be received by js
            echo "Success";
        }
    }else{
        echo "something went wrong";
        session_destroy();
    }