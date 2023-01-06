<?php
function unscheduleFunc(){
    include_once(confs.'/getModels.php');
    include_once(pateintC.'/getCheck.php');
    $obj=new models();
    $tobj=new Check();
    //printing all the listed slot of the day
    $result=$obj->selectMul("*","","Slotss");
    $result_array = array();
        while($row = mysqli_fetch_assoc($result)){
            array_push($result_array, $row);
        }
            echo json_encode($result_array);
    }
        
?>