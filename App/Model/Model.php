<?php
    require_once $_SERVER["DOCUMENT_ROOT"] . '/Myproject/'."App/Model/Database.php";


    abstract class Model{

    protected $db; // will store a Database get connection object
    protected  $table; // child will set this ariable accordingly

    public function __construct($db /*this variable serves as a connectio to a db*/){
        $this->db = $db; 
    }

    public abstract function findAll();

    public abstract function find($key);

    public abstract function delete($id);

    public abstract function update($id, $data);

    public abstract function save($data);
    

}