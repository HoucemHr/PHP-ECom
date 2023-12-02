
<?php

    //this DS saves us the \\ because the first \is ignored 
    require_once $_SERVER["DOCUMENT_ROOT"] . '/Myproject/'."Conf/App.php";//conf is visible to the index so we need to make sure all the required files are
    //included with the right path accordingly to where they get called(used) since it's a runtime issue
 
    class Database{
        private static $instance;
        private $connection;

        private function __construct(){
            try{
                $this->connection = new PDO("mysql:host =" . App::$host . ";dbname =" . App::$dbname, App::$user, App::$password );
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException  $e){
                die("Failure : " . $e->getMessage());
            }
        }

        public static function getInstance(){
            if(self::$instance == null) {
                //storing our only instance
                self::$instance = new Database();
            }
            return self::$instance;
        }
        //in this method you are forced tto have an instance in order for you to call it
        public function getConnection(){
            return $this->connection;
        }

    }


