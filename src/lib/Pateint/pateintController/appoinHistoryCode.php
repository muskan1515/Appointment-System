<?php
    //including all the required files
    
    function getRows(){
      $val=dirname(__DIR__);
      include_once('./getConfigure.php');  
    include_once(confs.'/getModels.php');
    include_once(indexx.'/sessionHelp.php');
    $obj=new models();
    if(isset($_SESSION['Email'])){
      
        $email=$_SESSION['Email'];
        $array=[&$email];
        $temp=$obj->select("pId","pEmail=?","Pateint",$array,"s");
        $tuid=$temp['pId'];
        if(!$temp){
          echo "Failed!!";
        }
        else{
          //after selecting showing the tabular form for appoinments 
            $array =[ &$tuid];
            $result=$obj->selectnestedMulC("DoctorInfo.dName,DoctorInfo.dSpecialization,slotBook.slot,slotBook.date","slotBook.pId=?","DoctorInfo JOIN slotBook ON slotBook.dId=DoctorInfo.dId",$array,"i");
            
            $result_array = array();
        while($row = mysqli_fetch_assoc($result)){
            array_push($result_array, $row);
        }
            echo json_encode($result_array);
        }
    }
  }
    ?>