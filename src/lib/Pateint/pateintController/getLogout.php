<?php
/*
Author's Name: Muskan Kushwah
Date: 30/12/2022
Purpose:this page is mainly for the logging out of a user
*/
 //including all the required files
$val=dirname(__DIR__,2);
include_once($val.'/getConfigure.php');
include_once(indexx.'/sessionHelp.php');  
unset($_SESSION['Uniqid']);
unset($_SESSION['Email']);
session_commit();
header("location:../../index.php");
?>