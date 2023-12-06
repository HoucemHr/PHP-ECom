<?php
    require_once "c:/xampp/htdocs/Myproject/App/Model/ModelBag.php";
    class ControllerBag{
        private $model;

        public function __construct(){
            $this->model = new ModelBag(Database::getInstance()->getConnection());
        }
        public function index(){
            $bagProducts = $this->model->bagById();
            require_once "c:/xampp/htdocs/Myproject/App/Views/Bag.php";
        }
    }