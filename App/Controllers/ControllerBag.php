<?php
    require_once "c:/xampp/htdocs/Myproject/App/Model/ModelBag.php";
    class ControllerBag{
        private $model;

        public function __construct(){
            $this->model = new ModelBag(Database::getInstance()->getConnection());
        }
        public function index(){
            if(isset($_SESSION["email"])){
                $bagProducts = $this->model->bagByMail();
            }
            require_once "c:/xampp/htdocs/Myproject/App/Views/Bag.php";
        }

        public function addToBag(){
            $this->model->addProduct();
            header("Location: /Myproject/index.php");
        }

        public function order(){
            $this->model->addToOrders();
            header("Location: /Myproject/index.php");
        }
    }