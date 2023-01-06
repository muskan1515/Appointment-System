<?php
/* Author's Name: Muskan Kushwah
Date: 30/12/2022
Purpose: The class signupUser is created to make the user signed up to the library system,
 & also managing the insertion of the new user's data to the database table -->User.
*/
 //including all the required files
$val=dirname(__DIR__,2);
include_once($val.'/getConfigure.php');
include_once(indexx.'/sessionHelp.php');  
include_once(confs.'/getModels.php');
class signupUser{
    // this function check for validation and for the data insertion to the table happen
    function getsignuped(){
    //for letting the dbController file added for building the connection    
    $tobj=new models();
        //putting to the local variable the values that needed for inserting in table
        $name=$_POST['tname'];
        $email=$_POST['temail'];
        $contactinfo=$_POST['tcont'];
        $pass=$_POST['tpass'];
        $age=$_POST['tage'];
        $isDoc=$_POST['tdoc'];
        $spec=$_POST['tspec'];
        //handling all the exceptions of the validations for server-side 
        $namereg="/^[a-zA-Z ]{2,30}$/";
        $agereg="/^[0-9]{1,2}$/";
        $mobreg='/^[0-9]{10}+$/';
        $emailreg="/^[a-z0-9_%+-]+@[a-z0-9-]+\.[a-z]{2,4}$/";
        $pswreg="/^(?=*[0-9])(?=*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{4,20 }$/";
        if($name==''||!preg_match($namereg,$name)){
          echo 'namef';
          exit();
        }
        else if($age==''||!preg_match($agereg,$age)){
          echo 'agef';
          exit();
        }
        else if($email==''||!preg_match($emailreg,$email)){
          echo 'emailf';
          exit();
        }
        else if($contactinfo==''||!preg_match($mobreg,$contactinfo)){
          echo 'contactf';
          exit();
        }
        else if($pass==''){
          echo 'phonef';
          exit();
        }
        else if($isDoc==1 && $spec==''){
          echo 'specf';
          exit();
        }
        else if($isDoc=='1'){
        //checking for the duplications
          $t1=[&$email];
          $sql=$tobj->selectnestedMulC("*"," dEmail=?","DoctorInfo",$t1,"s");
          $rows=array();
            while($row=mysqli_fetch_assoc($sql)){
              $rows[]=$row;
            }
            foreach($rows as $row){
              if($row['dEmail']==$email){
                echo 'Emailex';
                exit();
              }
              else if($row['dContact']==$contactinfo){
                echo 'Phoneex';
                exit();
              }
            } 
              $name= "Dr.".$name;
              $res=$tobj->insert("dName,dAge,dEmail,dContact,dPass,dSpecialization","'$name','$age','$email','$contactinfo','$pass','$spec'","DoctorInfo");
              if($res>0){
              $_SESSION['Email']=$email;
              $_SESSION['isDoc']=1;
              session_commit();
              echo 'trueeee';
            }
            else{
              echo 'false';
            }
        }
        else{
          //chechking for the duplications
          $t1=[&$email];
          $sql=$tobj->selectnestedMulC("*","pEmail=?","Pateint",$t1,"s");
          $rows=array();
            while($row=mysqli_fetch_assoc($sql)){
              $rows[]=$row;
            }
            foreach($rows as $row){
              if($row['pEmail']==$email){
                echo 'Emailex';
                exit();
              }
              else if($row['pContact']==$contactinfo){
                echo 'Phoneex';
                exit();
              }
            }
            
              $res=$tobj->insert("pName,pAge,pEmail,pPass,pContact","'$name','$age','$email','$pass','$contactinfo'","Pateint");
              if($res>0){
                $_SESSION['Email']=$email;
                $_SESSION['isDoc']=0;
              session_commit();
              echo 'true';
            }
            else{
              echo 'false';
            }
        }
  }
}
?>