<?php
function getBooked(){
        include_once(confs.'/getModels.php');
        include_once(pateintC.'/getCheck.php');
        $obj=new models();
        $tobj=new Check();
        $result=$obj->selectMul("dId,dName,dSpecialization","","DoctorInfo");
        echo json_encode($result); 
    }
?>