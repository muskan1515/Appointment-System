<?php
function getSlotBooked(){
    include_once(confs.'/getModels.php');
        include_once(pateintC.'/getCheck.php');
    $obj=new models();
    $tobj=new Check();
        $docId=$_POST['id'];
        $t=$t=date('d-m-Y');
        $day=date("D",strtotime($t));
        $check=false;
        $result=$obj->selectMul("*","","Slotss");
        echo json_encode($result);
    }
    ?>