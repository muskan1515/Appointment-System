<?php
/*Author's Name: Muskan Kushwah
    Date: 30/12/2022
    Purpose: The class loginUser is created to make the user logged in,
     also the chechking state of a user to that of the database.
*/
 //including all the required files
$val=dirname(__DIR__,2);
include_once($val.'/getConfigure.php');
include_once(indexx.'/sessionHelp.php');
include_once(confs.'/dbController.php');
class loginUser{
//This is the function that accessing the database connection 
//and chechking the database for logging in.
    function getlogged(){
        
        //getting the connection using the object of dbControl class.
        include_once(confs.'/getModels.php');//including the  dbController for starting the connection.\
        $ob=new models();
        //putting to the local variable the values that needed for inserting in table
        $email=$_POST['temail'];
        $pass=$_POST['tpass'];
        //handling all the exceptions of the validations for server-side 
        $emailreg="/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/";
        $pswreg="/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{4,20}$/";
        if($email=='' || !preg_match($emailreg,$email)){
            return 'notvalidemail';
        }
        else if($pass==''||!preg_match($pswreg,$pass)){
            return 'notvalidpass';
        }
        else{
            $obj=new dbControl();
            $conn=$obj->getdbSession();
            $array =[ &$email,&$pass];
            $rowt=$ob->select("*","pEmail=? AND pPass=?","Pateint",$array,"ss");
            $row=$ob->select("*","dEmail=? AND dPass=?","DoctorInfo",$array,"ss");
            if($rowt){
                $_SESSION['Email']=$rowt['pEmail'];
                $_SESSION['isdoc']=0;
                session_commit();
                echo 'false';
            } 
            else if($row){
                $_SESSION['Email']=$row['dEmail'];
                $_SESSION['isDoc']=1;
                session_commit();
                echo 'true';
            }
            else{
                echo 'not in';
            }
        }
    }
}

?>