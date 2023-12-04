<?php
    require_once "Routing/Router.php" ;
    $router = new Router();
    $router->addRoute("/", "ControllerHome@index");
    // the key is the uri and hence it is the one getting affected with the extra / 
    $router->addRoute("/Products", "ControllerProduct@productList");
    $router->addRoute("/ControllerLogin", "ControllerLogin@Login");
