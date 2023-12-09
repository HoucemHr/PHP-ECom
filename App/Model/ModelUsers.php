<?php
require_once "c:/xampp/htdocs/Myproject/App/Model/Database.php";


class ModelUsers{
    private $connection;
    public function __construct(){
        $this->connection = Database::getInstance()->getConnection();
    }
    public function fetchAll(){
        $query = "select * from EcomDB.users";
        return $this->connection->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchByMail($mail){
        $query = "select * from EcomDB.users where email = ?";
        try{
            $user = $this->connection->prepare($query);
            $user->execute([$mail]);
            $user = $user->fetch(PDO::FETCH_NUM);
            //not found either xe
        }catch(PDOException $e){
            return "exception here:"; //. $e->getMessage();
        }
        return $user;
    }

    public function addUser($userData){
        try{
            $query = "insert into EcomDB.users values(null, :email, :password , null)";
            $prepared = $this->connection->prepare($query)->execute($userData);
        }catch(PDOException $e){
            echo "Add User Failed With : " . $e->getMessage();
        }     
    }
}