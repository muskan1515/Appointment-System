<?php

/*Author's Name: Muskan Kushwah
Date: 30/12/2022
Purpose:This page is mainly built for redirecting according to the 
$_REQUEST['tval']:  'tval'->1  (signup page) 'tval'->2 . (login page) 
*/
$val=dirname(__DIR__);
include_once($val.'/html/getConfigure.php');
    switch($_REQUEST['tval']){
        //if 1 happen then simply access the signup file and 
        //through its object get the user signed up happen
        case 1:
            include_once(pateintC.'/getSignup.php');
            $obj=new signupUser();
            $result=$obj->getsignuped($_REQUEST);
            break;
        //if 2 happen then simply access the login file and 
        //through its object get the user logged  up happen
        case 2:
            include_once(pateintC.'/getLogin.php');
            $obj=new loginUser();
            $result = $obj->getlogged($_REQUEST);
            break;
        //default case scenario
        case 3:
            include_once(pateintC.'/bookAppoinmentCode.php');
            $result = getbooked();
            break;
        case 4:
            include_once(pateintC.'/bookAppoinCode.php');
            $result = getSlotBooked();
            break;
        case 5:
            include_once(pateintC.'/getCheck.php');
            $result = getbooked($_REQUEST);
            break;
        case 6:
            include_once(pateintC.'/getCheck.php');
            $result = checkUnavail($_REQUEST);
            break;
        case 7:
            
            include_once(pateintC.'/appoinHistoryCode.php');
            $result = getRows();
            break;
        case 8:
            include_once(doctorC.'/pateintHistoryCode.php');
            $result = getHistory($_REQUEST);
            break;
        default:
            die();
    }
    return $result;
?>