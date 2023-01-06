<?php
/*  Author's Name: Muskan Kushwah
    Date:           30/12/2022
    Purpose: This page is how pateint will book an slot from a specified doctor.
*/
//including all the required files
$val=dirname(__DIR__,2);
include_once($val.'/getConfigure.php');
include_once(indexx.'/sessionHelp.php'); 
include_once(confs.'/getModels.php');
$obj=new models();
$id=$_GET['id'];
$slot=$_GET['slot'];
$email=$_SESSION['Email'];
$gday=$_GET['day'];
$t1=[&$email];
$res=$obj->select("pId","pEmail=?","Pateint",$t1,'s');
$pid=$res['pId'];
$t=date('d-m-Y');
$day=date("D",strtotime($t));
$date=date("d",strtotime($t));
$month=date("m",strtotime($t));
$year=date("Y",strtotime($t));
//setting up the
$tval;
if($day=='Mon'){
    $tval=0;
}
else if($day=='Tue'){
    $tval=1;
}
else if($day=='Wed'){
    $tval=2;
}
else if($day=='Thu'){
    $tval=3;
}
else if($day=='Fri'){
    $tval=4;
}
else if($day=='Sat'){
    $tval=5;
}
else if($day=='Sun'){
    $tval=6;
}
$tval2;
if($gday=='Mon'){
    $tval2=0;
}
else if($gday=='Tue'){
    $tval2=1;
}
else if($gday=='Wed'){
    $tval2=2;
}
else if($gday=='Thu'){
    $tval2=3;
}
else if($gday=='Fri'){
    $tval2=4;
}
else if($gday=='Sat'){
    $tval2=5;
}
else if($gday=='Sun'){
    $tval2=6;
}
if(($tval2-$tval)>=0){
    $rem=$tval2-$tval;
    $date+=$rem;
}
if($date>31){
    $month+=1;
    $date=1;
}
$date=$date."-".$month."-".$year;
$obj->insert("pId,dId,slot,date","$pid,$id,$slot,$date","slotBook");
header("Location:../pateintView/pateintDashboard.php");
?>