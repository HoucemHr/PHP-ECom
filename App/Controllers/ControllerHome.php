<?php
require_once "App/Controllers/Controller.php";
class ControllerHome extends Controller{



    //this function loads the home view in index
    public function index(){
        //being included in index
        include("App/Views/Home/Home.php");
    }


}