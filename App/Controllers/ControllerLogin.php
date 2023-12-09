
<?php
require_once "c:/xampp/htdocs/Myproject/App/Controllers/Controller.php";
require_once "c:/xampp/htdocs/Myproject/App/Model/ModelUsers.php";
class ControllerLogin extends Controller {
    private $model;
    public function __construct(){
        $this->model = new ModelUsers();
    }
    public function index(){
    }

    //set to null for use cases that don't need it 
    public function loginCheck($data = null){
        $exists = $this->model->fetchByMail($data);//result set or false
        return $exists;
    }

    public function newUser($userData){
        $this->model->addUser($userData);
    }

}