<?php
/*  Author's Name: Muskan Kushwah
    Date:           30/12/2022
    Purpose: This page is enabled for doctor to undo the
    slot unavailability thing by doctor.
*/
//including all the required files
$val=dirname(__DIR__,2);
include_once($val.'/getConfigure.php');
include_once(indexx.'/sessionHelp.php'); 
include_once(confs.'/getModels.php');
$obj=new models();
//getting the doctorId using the session email address
$tval=$_SESSION['Email'];
$x=$_GET['slot'];
$t1=[&$tval];
$res=$obj->select("dId","dEmail=?","DoctorInfo",$t1,'s');
$y=$res['dId'];
$t2=[&$y,&$x];
//deleting from the unAvailSlot table 
$obj->delete("dId=? AND slot=?","unAvailSlot",$t2,'ii');
header("Location:../doctorView/unSchedule.php");
?>