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
include_once(confs.'/dbController.php');
class Check{
    function checkBooked(){
        $x=$_POST['id'];
        $y=$_POST['slot'];
        $z=$_POST['day'];
        $t=date('d-m-Y');
        $date=date("d",strtotime($t));
        $day=date("D",strtotime($t));
        if($z==''){
           $gday=$day;
        }
        else{
           $gday=$z;
        }
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
        $tobj=new models();
        $t2=[&$x,&$y,$date];
        $row=$tobj->select("*","dId=? AND slot=? AND date=?","slotBook",$t2,"iii");
        if($row)
         echo true;
        else 
         echo false;
    }
    function checkUnavail(){
        $x=$_POST['id'];
        $y=$_POST['slot'];
        $z=$_POST['day'];
        $tobj=new models();
        $t2=[&$x,$y];
        $row=$tobj->select("*","dId=? AND slot=?","unAvailSlot",$t2,"ii");
        if($row)
         echo true;
        else
         echo false;
    }
}

?>
