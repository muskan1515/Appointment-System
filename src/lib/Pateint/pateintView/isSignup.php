<?php 
/*Author's Name: Muskan Kushwah
Date: 30/12/2022
Purpose: This page is mainly showing the view of a signup page of the library system.
*/
 //including all the required files
$val=dirname(__DIR__,2);
include_once($val.'/getConfigure.php');
include_once(indexx.'/sessionHelp.php'); 
// directly landing the user to either admin or user dashboard
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
<!-- html code for the form accepting the required information of new user .
 further use and checking for building the session. -->
<form id="signupForm" >
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name" placeholder="Name please" value="<?php echo (!empty($_GET['name']) ? $_GET['name'] : '');?>"><br>
  <label for="age"><br><font size="2">(must be in the numeric form)<br></font>Age:</label><br>
  <input type="text" id="age" name="age" placeholder="Age please" value="<?php echo (!empty($_GET['name']) ? $_GET['age'] : '');?>"><br>
  <label for="email">Email:</label><br>
  <input type="text" id="email" name="email" placeholder="Email please" value="<?php echo (!empty($_GET['email']) ? $_GET['email'] : '');?>"><br><br>
  <label for="contInfo"><br><font size="2">(must be in the format 9192XXXXXX)<br></font>Contact: </label><br></label><br>
  <input type="text" id="contInfo" name="contInfo" placeholder="Contact please" value="<?php echo (!empty($_GET['contInfo']) ? $_GET['contInfo'] : '');?>"><br><br>
  <label for="pass"><br><font size="2">(Can Contain Aphabet,Number,<br>Special_Char(!@$%^&*) only!!!)<br></font>Password: </label><br>
  <input type="password" id="pass" name="pass" value="" value="<?php echo (!empty($_GET['pass']) ? $_GET['pass'] : '');?>"><br><br>
  <input type="checkbox" id="isDoctor" name="isDoctor" value="" onclick="getDiv()">
  <label for="isDoctor"> SignUp as a Doctor</label><br>
  <div id=getSpecify style="display: none">
  <label for="isDoc">Choose Specialization:</label>
    <select name="isDoc" id="isDoc">
    <option value="Default"></option>
    <option value="Hands">Hands</option>
    <option value="Eyes">Eyes</option>
    <option value="Hair">Hair</option>
    <option value="Skin">Skin</option>
    <option value="Heart">Heart</option>
    <option value="General">General</option>
    </select>
  </div>
  <input type="submit" id="subbtn" value="Submit">
</form> 
<div id="response_sign"></div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- including the google cdn for the ajax usability -->
<script>
    // this ajax function mainly handling the client-side validation
    // and also performing the redirection from one page to another 
    // after validation
    function getDiv(){
        var x = document.getElementById("getSpecify");
        var y=document.getElementById("isDoctor");
        if (y.checked == true) {
            x.style.display = "block";
        }
        else{
            x.style.display = "none";
        }
    }
    $(document).on('click','#subbtn',function(event){
        event.preventDefault();
        var email=$('#email').val();
        var age=$('#age').val();
        var psw=$('#pass').val();
        var psw2=$('#rPass').val();
        var name=$('#name').val();
        var spec=$('#isDoc :selected').text();
        if(spec!=''){
          var isDoc=1;
        }
        else{
          var isDoc=0;
        }
        var cntinfo=$('#contInfo').val();
        var  uniId=$('#uniId').val();
        var atpos=email.indexOf('@');
        var dotpos=email.lastIndexOf('.com');
        var dotpos2=email.lastIndexOf('.in');
        if(name==''){
            alert('Name cant be empty!!!');
        }
        else if(name!=name.match(/^[a-zA-Z .]{2,30}$/)){
         alert('Enter a valid Name!!!');
        }
        else if(age==''){
            alert('Age cant be empty!!!');
        }
        else if(age!=age.match(/^[0-9]{1,2}$/)){
            alert('Enter a valid Age!!!');
        }
        else if(email==''){
            alert('Email cant be empty!!!');
        }
        else if(email!=email.match(/^[a-zA-Z0-9_%]+@[a-zA-Z0-9]+\.[a-z]{2,4}$/)){
            alert('Follow the pattern for email!!');
        }
        else if(cntinfo!=cntinfo.match("[0-9]+")||cntinfo.length<10||cntinfo.length>10){
            alert("Invalid Contact Info");
        }
        else if(psw==""){
            alert("Password cannot be empty !!!");
        }
        else if(psw!=psw.match(/^(?=.*[0-9])(?=.*[!@$%^&*])[a-zA-Z0-9!@$%^&*]{4,20}$/)){
            alert("Password must be strong !!!");
        }
        else if(psw.length<4){
            alert("Password must be of length 4 !!!");
        }
        else{
            $.ajax({
                type:"POST",
                url:"../../action.php",
                data:{
                    tname:name,
                    tage:age,
                    temail:email,
                    tpass:psw,
                    tdoc:isDoc,
                    tspec:spec,
                    tcont:cntinfo,
                    tval:1
                },
                //for storing and showing the reponse of the ajax function
                success: function(data){
                    data=$.trim(data);
                    if(data=='namef'){
                      alert('Enter a valid name!!');
                    }
                    else if(data=='agef'){
                        alert('Enter a valid Age!!');
                    }
                    else if(data=='emailf'){
                        alert('Enter a valid Email!!');
                    }
                    else if(data=='contactf'){
                        alert('Enter a valid Contact!!');
                    }
                    else if(data=='passf'){
                        alert('Enter a valid and string Password!!');
                    }
                    else if(data=='UniqIdex'){
                        alert('This UniqId already exists!!!!');

                    }
                    else if(data=='Emailex'){
                        alert('This Email already exists!!!!');
                    }
                    else if(data=='Phoneex'){
                        alert('This Contact No. already exists!!!!');
                    }
                    else if(data=='specf'){
                        alert('Specification cant be empty!!!!');
                    }
                   else if(data=='false'){
                    alert("Retry!!!");
                   window.location.href="../../index.php";
                   }
                   else if(data=='true'){
                    window.location.href="./pateintDashboard.php"; 
                   }
                   else if(data=='trueeee'){
                    window.location.href="../../Doctor/doctorView/doctorDashboard.php"; 
                   }
                   else{
                    
                    alert("Retry!!");
                   }
                } 
            });
            //reseting back the form if validation were not proper
            $('#signupForm')[0].reset();
        }
    });
</script>
</html>


