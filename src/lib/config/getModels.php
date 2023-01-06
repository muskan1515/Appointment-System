<?php
/*
Author's Name: Muskan Kushwah
Date: 29/12/2022
Purpose: This class models is designed for providing the generic model
for every possible query 
*/
 //including all the required files
$val=dirname(__DIR__,1);
include_once($val.'/getConfigure.php');
include_once(confs.'/dbController.php');//including the  dbController for starting the connection.\
class models{
    public $obj;
    function __construct(){
        $this->obj=new dbControl();
    }
    function select($att,$cond,$name,$array,$type){
        $conn=$this->obj->getdbSession();//getting the connection using the object of dbControl class.
        if($conn){
            $cleanArray = [];
            foreach( $array as $val )
                $cleanArray[] = mysqli_real_escape_string( $conn, $val );
            $sql="SELECT  ".$att."  FROM  ".$name."  WHERE  ".$cond;
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt,$type,...$cleanArray);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row=mysqli_fetch_assoc($result);
            $this->obj->destroySession();
            return $row;
        }
    }
    function selectMul($att,$cond,$name){
        $conn=$this->obj->getdbSession();//getting the connection using the object of dbControl class.
        if($conn){
            if($cond!=''){
                $sql="SELECT ".$att." FROM ".$name." WHERE ".$cond;
                $res=mysqli_query($conn,$sql);
                $result_array = array();
        while($row = mysqli_fetch_assoc($res)){
            array_push($result_array, $row);
        }
               $this->obj->destroySession();
            }
            else{
                $sql="SELECT ".$att." FROM ".$name;
                $res=mysqli_query($conn,$sql);
                $result_array = array();
        while($row = mysqli_fetch_assoc($res)){
            array_push($result_array, $row);
        }
               $this->obj->destroySession();
            }
            return $array_push;
        }
    }
    function selectnestedMulC($att,$cond,$name,$array,$type){
        $conn=$this->obj->getdbSession();//getting the connection using the object of dbControl class.
        if($conn){
        $cleanArray = [];
        foreach( $array as $val )
            $cleanArray[] = mysqli_real_escape_string( $conn, $val );
        ###building the prepare statement
        $sql="SELECT ".$att." FROM ".$name." WHERE ".$cond;
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt,$type,...$cleanArray );
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $this->obj->destroySession();
        return $result;
        }
    }
    function delete($cond,$name,$array,$type){
        $conn=$this->obj->getdbSession();//getting the connection using the object of dbControl class.
            if($conn){
            if($cond==''){
                $cleanArray = [];
                foreach( $array as $val )
                $cleanArray[] = mysqli_real_escape_string( $conn, $val );
                ###building the prepare statement
                $sql="DELETE FROM ".$name;
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt,$type,...$cleanArray );
                mysqli_stmt_execute($stmt);
            }
            else{
                $cleanArray = [];
                foreach( $array as $val )
                $cleanArray[] = mysqli_real_escape_string( $conn, $val );
                ###building the prepare statement
                $sql="DELETE FROM ".$name." WHERE ".$cond;
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt,$type,...$cleanArray );
                mysqli_stmt_execute($stmt);
            }
            $this->obj->destroySession(); 
        }
    }
    function update($before,$after,$name,$array,$type){
        $conn=$this->obj->getdbSession();//getting the connection using the object of dbControl class.
        if($conn){
            $cleanArray = [];
            foreach( $array as $val )
                $cleanArray[] = mysqli_real_escape_string( $conn, $val );
            $sql="UPDATE ".$name." SET ".$before." WHERE ".$after;
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt,$type,...$cleanArray );
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            $this->obj->destroySession();
            return $res;
        }
        
    }
    function insert($att,$value,$name){
        $conn=$this->obj->getdbSession();//getting the connection using the object of dbControl class.
        if($conn){
            // $cleanArray = [];
            // foreach( $array as $val )
            //     $cleanArray[] = mysqli_real_escape_string( $conn, $val );
             ###building the prepare statement
            $sql="INSERT INTO ".$name." ( ".$att." ) VALUES  (".$value." )";
            $res=mysqli_query($conn,$sql);
            // $stmt = mysqli_prepare($conn, $sql);
            // mysqli_stmt_bind_param($stmt,$type,...$cleanArray );
            // mysqli_stmt_execute($stmt);
            // $res = mysqli_stmt_get_result($stmt);
            $this->obj->destroySession();
            return $res;
        }
        
    }
}

?>