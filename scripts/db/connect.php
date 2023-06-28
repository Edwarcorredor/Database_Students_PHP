<?php

    namespace App;

    class connect{
        public $con;
        function __construct(){
            try{
                $this->con=new \PDO($_ENV["DSN"].":host=".$_ENV["HOST"].";dbname=".$_ENV["DBNAME"].";user=".$_ENV["USERNAME"].";password=".$_ENV["PASSWORD"]);
                $this->con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch(\PDOException $e){
                echo "Connection failed". $e->getMessage();
            }
        }          
    }
?>