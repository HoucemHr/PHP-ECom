<?php
    require_once "c:/xampp/htdocs/Myproject/Routing/Router.php";
    $router = new Router();
    $router->addRoute("/", "ControllerHome@index"); 
    $router->addRoute("/Products", "ControllerProduct@productList");
    $router->addRoute("/ControllerLogin", "ControllerLogin@loginCheck");
    $router->addRoute("/males", "ControllerProduct@males");
    $router->addRoute("/females","ControllerProduct@females");
    $router->addRoute("/kids", "ControllerProduct@kids");
    $router->addRoute("/ShoppingBag", "ControllerBag@index");
    $router->addRoute("/Home", "ControllerHome@index");
    $router->addRoute("/ControllerLogin/newUser", "ControllerLogin@newUser");
    $router->addRoute("/ControllerProduct/show", "ControllerProduct@show");
    $router->addRoute("/ControllerBag/addToBag", "ControllerBag@addToBag");
    $router->addRoute("/ControllerBag/order", "ControllerBag@order");


