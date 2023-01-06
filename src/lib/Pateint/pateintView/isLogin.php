<?php
/*
 Author's Name: Muskan Kushwah
Date: 30/12/2022
Purpose: This page is mainly showing the view of a login page of the management system.
*/
 //including all the required files
$val=dirname(__DIR__,2);
include_once($val.'/getConfigure.php');
include_once(indexx.'/sessionHelp.php'); 
  //directly landing the user to either admin or user dashboard
  // according to isAdmin value of the session
  if(isset($_SESSION['Email'])){
    if($_SESSION['isDoc']==0){
      header("Location:./Pateint/pateintView/pateintDashboard.php");
    }
    else{
      header("Location:./Doctor/doctorView/doctorDashboard.php");
    }
  }
?>
<!DOCTYPE html>
<html>
<body>
<!-- 
html code for the form accepting the email and password for
 further use and checking for building the session. -->
<h2>HTML Forms</h2>
<form id="loginForm">
  <label for="email">Email:</label><br>
  <input type="text" id="email" name="email" placeholder="Email please"><br>
  <label for="pass">Password:</label><br>
  <input type="password" id="pass" name="pass" value=""><br><br>
  <input type="submit" id="logbtn" value="Submit">
  <div id="msg"></div>
</form> 
</body>
<!-- including the google cdn for the ajax usability -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    var response="";
    // this ajax function mainly handling the client-side validation
    // and also performing the redirection from one page to another 
    // after validation
    $(document).on('click','#logbtn',function(event){ 
        event.preventDefault();
        var email=$('#email').val();
        var psw=$('#pass').val();
        var atpos=email.indexOf('@');
        var dotpos=email.lastIndexOf('.com');
        if(email==''){
            alert(' Email cant be Empty!!');
        }
        else if(email!=email.match(/^[a-zA-Z0-9_%]+@[a-zA-Z0-9]+\.[a-z]{2,4}$/)){
            alert('Email is not valid!!');
        }
        else if(psw==''){
            alert("Password cant be empty !!!")
        }
        else if(psw!=psw.match(/^(?=.*[0-9])(?=.*[!@$%^&*])[a-zA-Z0-9!@$%^&*]{4,20}$/)){
            alert("Password must be strong !!!");
        }
        else{
            $.ajax({
                type:"POST",
                url:"../../action.php",
                data:{
                    temail:email,
                    tpass:psw,
                    tval:2
                },
                //for storing and showing the reponse of the ajax function 
                success: function(data){
                   data=$.trim(data);
                   if(data==''){
                    alert("Both must be strong and valid!!");
                   }
                   else if(data=='false'){
                    window.location.href="./pateintDashboard.php";}
                   else if(data=='true'){
                   window.location.href="../../Doctor/doctorView/doctorDashboard.php";
                    }
                   else{
                    alert(" Wrong Credentials!!!");
                   }
                 }
            });
            //reseting back the form if validation were not proper
            $('#loginForm')[0].reset();
        }
    });
</script>
</html>
