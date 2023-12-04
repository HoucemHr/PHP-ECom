<?php
    $root = $_SERVER["DOCUMENT_ROOT"] . '/Myproject/';
    require_once $root . 'App/Model/ModelProduct.php';
    
    //require_once 'App/Model/Model.php';
    //require_once 'App/Model/Database.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/Myproject/'.'App/Controllers/Controller.php';
    //require_once 'App/Views/View.php'; 
    //require_once 'App/Views/Product/ProdList.php';



    class ControllerProduct extends Controller{
        private $model;


        public function __construct() {
            $this->model = new ProductModel(Database::getInstance()->getConnection());
        }

        public function index(){
            if ($_POST['formtype'] == 'productlist'){
                $products = $this->model->findAll();
                include_once("App/Views/Product/ProdList.php");
            }
           

        }
        public function productList(){
            $products = $this->model->findAll(); 
            include("App/Views/Product/ProdList.php");
        }

        public function create(){
            $categories = $this->model->findAll();
            include_once("App/Views/Product/create.php");
        }

        public function show($id){
            $row = $this->model->find($id);
            include_once("App/Views/Product/find.php");
        }

        public function edit($id){
            $old = $this->model->save($id);       
        }


    }

    