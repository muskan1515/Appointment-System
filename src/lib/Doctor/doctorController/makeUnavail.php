<?php
/*  Author's Name: Muskan Kushwah
    Date:           30/12/2022
    Purpose: This page is enabled for doctor to unavail
    there particular slots.
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
$t=date('d-m-Y');
$day=date("D",strtotime($t));
$date=date("d",strtotime($t));
$t2=[&$y,&$x,&$date];
//deleting from the bookSlot table 
$obj->delete("dId=? AND slot=? AND date=?","slotBook",$t2,'iii');
$obj->insert("dId,slot","$y,$x","unAvailSlot");
header("Location:../doctorView/unSchedule.php");
?>