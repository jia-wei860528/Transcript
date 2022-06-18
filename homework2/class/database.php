<?php
class Database{
    public function getConnection(){
        $connect=new PDO("mysql:host=localhost;port=3306;dbname=homework","root","");
        return $connect;
    }
}
?>