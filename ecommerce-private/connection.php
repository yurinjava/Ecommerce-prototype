<?php

 class Connection{
    private $host='127.0.0.1';
    private $dbname= 'ecommerce_prototype';
    private $user = 'root';
    private $pass = '';
 
    public function connect(){
        try{
            $conection = new PDO( "mysql:host=$this->host;dbname=$this->dbname", "$this->user", "$this->pass");
            return $conection;
        }catch(PDOException $e){
            echo '<p>'.$e->getmessage().'</p>';
        }
    }
}

?>