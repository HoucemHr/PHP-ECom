<?php

    require_once "Routing/Routes.php";

    //the added / to take care of empty string after localhost
    //however all our url will have an additional prefixed / if isset
    // so this extra / must be prefixed to the route key
    //custom url --> route --> real url 
    $url = isset($_GET['url']) ? "/" . $_GET['url'] : '/';
    $router->dispatch($url);
