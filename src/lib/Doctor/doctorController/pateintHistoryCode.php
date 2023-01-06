
<?php
function getHistory(){
$val=dirname(__DIR__,2);
include_once($val.'/getConfigure.php');
include_once(confs.'/dbController.php');
include_once(confs.'/getModels.php');
    $obj=new models();
        $email=$_POST['email'];
        $array=[&$email];
        $temp=$obj->select("dId","dEmail=?","DoctorInfo",$array,"s");
        $tuid=$temp['dId'];
        if(!$temp){
          echo "Failed!!";
        }
        else{
            $array =[&$tuid];
            //showing the data in tabular form
            $result=$obj->selectnestedMulC("Pateint.pName,Pateint.pAge,Pateint.pEmail,slotBook.slot,slotBook.date","slotBook.dId=?","Pateint JOIN slotBook ON slotBook.pId=Pateint.pId",$array,"i");
            $result_array = array();
        while($row = mysqli_fetch_assoc($result)){
            array_push($result_array, $row);
        }
            echo json_encode($result_array);
        }
        
}
    ?>