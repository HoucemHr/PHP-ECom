
<?php
    require_once $_SERVER["DOCUMENT_ROOT"] . '/Myproject/' . "App/Model/Model.php";


    class  ProductModel extends Model{

        public function __construct($db){
            parent::__construct($db);
            $this->table = "EcomDB.products";
        }
        
        public function findAll(){
            try{
                $query = "select * from ". $this->table;
                return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
            }catch(Exception $e){
                die("Failure : " . $e->getMessage());
            }catch(Error $e){
                die("Failure : " . $e->getMessage());
            }
        }

        public function find($key){
            try{
                $query = "select Label, IMG, Price  from " . $this->table . " where ID = $key";
                return $this->db->query($query)->fetch(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                die("Fetching failed".$e->getMessage());
            }
        }

        public function delete($id){
            return $this->db->exec("delete from " . $this->table . " where id = $id");
        }

        public function update($id, $data)
        {   
            try{
                $pdoSt = $this->db->prepare("update " . $this->table . " set Designation = ?, CategoryId = ?, Price = ?,
                Quantity = ? where ID = ?");
                
                $data[sizeof($data)] = $id;
                $pdoSt->execute($data);
                return 1;
            //putting Exception bcz passing wrong number of parameters in execute does not fit in the pDOException category
            }catch(Exception $e){
                die( "Update Failure : " . $e->getMessage());
            }
        }

        public function save($data){
            if($this->find($data[0])){
                $this->update($data[0], array_slice($data, 2));                      
                echo "Existant element was updated";
                return 1;
            } 
            try{
                $this->db->prepare("insert into  " . $this->table . " values(?, ?, ?, ?, ?)")->execute($data);
                echo "Successful insertion";
            }catch(PDOException $e){
                die( "Insert failure".$e->getMessage());
            } 
        }
        public function males(){
            $query = "select * from " . $this->table . " where Gender = 'M'";
            try{
                return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo "Failure : " . $e->getMessage();
            }
        }

        public function females(){
            $query = "select * from " . $this->table . " where Gender = 'F'";
            try{
                return $this->db->query($query)->fetchAll(PDO::FETCH_NUM);
            }catch(PDOException $e){
                echo "Failure : " . $e->getMessage();
            }             
        }

        public function kids(){
            //fix the age column
            $query = "select * from " . $this->table . " where Age < 16 ";
            try{
                return $this->db->query($query)->fetchAll(PDO::FETCH_NUM);
            }catch(PDOException $e){
                echo "Failure : " . $e->getMessage();
            }  
        }

    }