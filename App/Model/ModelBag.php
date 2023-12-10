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

        public function addProduct(){
            try{
                $query = "insert into " . $this->table . " values(null, :mail, :PID, :quantiy, :size, :color)";
                $params = ["mail"=> $_SESSION["email"], "PID"=> $_POST["PID"], "quantity" => $_POST["quantity"],
                "color" => $_POST["color"], "size" => $_POST["size"]];
                $prepared = $this->db->prepare($query);
                $prepared->execute($params);
            }catch(PDOException $e){
                die("addProduct Failure with : " .$e->getMessage());
            }
            
        }

        public function addToOrders(){
            $addingquery = "insert into EcomDB.orders(email, total) select email, sum(b.quantity * p.Price)
            from EcomDB.bag as b inner join EcomDB.products as p on b.productID = p.ID
            where email = :email";
            $preparedAdding = $this->db->prepare($addingquery);
            $preparedAdding->execute($_SESSION);
            $dletionquery = "delete from " . $this->table . " where email = :email" ;
            $preparedDelete = $this->db->prepare($dletionquery);
            $preparedDelete->execute($_SESSION);
        }

    }