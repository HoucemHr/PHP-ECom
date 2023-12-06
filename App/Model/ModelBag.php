<?php
    require_once "c:/xampp/htdocs/Myproject/App/Model/Model.php";
    class ModelBag extends Model{

        public function __construct($db){
            parent::__construct($db);
            $this->table = "EcomDB.Bag";
        }

        public function bagById(){
            //$query = "select * from " . $this->table . "where ID = $id";
            //$bagProducts = $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }

    }