<?php 
    class Connect extends PDO{
        //Connection variable
        const HOST = "localhost";
        const DB = "gestComds";
        const USER = "root";
        const PSW = "";

        public function __construct(){
            try {
               parent::__construct("mysql:dbname=".self::DB.";host=".self::HOST, self::USER, self::PSW);
                echo "DONE";
            } catch (PDOException $e) {
                echo $e->getMessage()." ".$e->getFile()." ".$e->getLine();
            }
        }
    }
