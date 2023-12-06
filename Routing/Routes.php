<?php
    require_once "Routing/Router.php" ;
    $router = new Router();
    $router->addRoute("/", "ControllerHome@index");
    // the key is the uri and hence it is the one getting affected with the extra / 
    $router->addRoute("/Products", "ControllerProduct@productList");
    $router->addRoute("/ControllerLogin", "ControllerLogin@Login");
    $router->addRoute("/males", "ControllerProduct@males");
    $router->addRoute("/females","ControllerProduct@females");
    $router->addRoute("/kids", "ControllerProduct@kids");
    $router->addRoute("/ShoppingBag", "ControllerBag@index");
    $router->addRoute("/Home", "ControllerHome@index");

