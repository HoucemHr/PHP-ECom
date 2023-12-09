<?php
    require_once "c:/xampp/htdocs/Myproject/App/Model/Model.php";
    class ModelBag extends Model{

        public function __construct($db){
            parent::__construct($db);
            $this->table = "EcomDB.Bag";
        }

        public function bagByMail(){
            try{
                $query = "select p.Label as label, b.quantity as quantity, b.quantity * p.Price as price from " 
                . $this->table . " as b inner join EcomDB.products as p on p.ID = b.productID
                where b.email = :email";
                $result = $this->db->prepare($query);
                $result->execute($_SESSION);
                return $result->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                die("Getting Bag Products Failed With : " . $e->getMessage());
            }
            
        }

    }