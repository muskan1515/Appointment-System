<?php
/*  Author's Name: Muskan Kushwah
    Date:           30/12/2022
    Purpose: This page is how pateint will remove an slot from a specified doctor.
*/
//including all the required files
$val=dirname(__DIR__,2);
include_once($val.'/getConfigure.php');
include_once(indexx.'/sessionHelp.php'); 
include_once(confs.'/getModels.php');
$obj=new models();
//getting the doctorId for the respective
//doctor session email
$dname=$_GET['id'];
$slot=$_GET['slot'];
$tval=$_SESSION['Email'];
$t=[&$dname];
$temp=$obj->select("dEmail","dName=?","DoctorInfo",$t,'s');
$demail=$temp['dEmail'];
$t2=[&$tval];
$t1=[&$demail];
$res=$obj->select("pId","pEmail=?","Pateint",$t2,'s');
$res2=$obj->select("dId","dEmail=?","DoctorInfo",$t1,'s');
$pid=$res['pId'];
$did=$res2['dId'];
$t=[&$did,&$slot,&$pid];
$obj->delete("dId=? AND slot=? AND pId=?","slotBook",$t,'iii');
header("Location:../pateintView/appoinmentHistory.php");
?>