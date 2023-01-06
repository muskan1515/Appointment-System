<?php
/*
Author's Name: Muskan Kushwah
Date: 29/12/2022
Purpose: This class dbControl is designed for building up the session
using the mysqli_connect() method
*/
class dbControl{
    public $host="mysql";
    public $username="root";
    public $password="123456";
    public $databasename="APPOINMENTdb";
    public $conn;
    //this is the main function thats leading for the connection formation
    function getdbSession(){
        $this->conn=mysqli_connect($this->host,$this->username,$this->password,$this->databasename);
        if(!$this->conn){
         return false;
        }
        else{
         return $this->conn;
        }
    }
    //this function will destroy the connection 
    function destroySession(){
        if($this->conn)
         mysqli_close($this->conn);
    }
}
?>