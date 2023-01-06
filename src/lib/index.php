<?php
 /*Author's Name: Muskan Kushwah
 Date: 30/12/2022
 Purpose:this will be the main page showing the flow of management 
  system.
*/
 $val=dirname(__DIR__);
 include_once('./getconfigure.php');  
 include_once(indexx.'/sessionHelp.php');
 if(isset($_SESSION['Email'])){
    if($_SESSION['isDoc']==0){
      header("Location:./Pateint/pateintView/pateintDashboard.php");
    }
    else{
      header("Location:./Doctor/doctorView/doctorDashboard.php");
    }
 } 
?>
<!Doctype html>
<style>
.btn-group button {
  background-color: #006400; /* Green background */
  border: 1px solid green; /* Green border */
  color: white; /* White text */
  padding: 10px 24px; /* Some padding */
  cursor: pointer; /* Pointer/hand icon */
  float: left; /* Float the buttons side by side */
}
</style>
<body>
<h1>Doctor Appoinment Management System</h1>
<div class="btn-group">
  <button type="submit" id="sig_btn">Signup</button>
  <button type="submit" id="log_btn">Login</button>
</div>
</body>
<script>
  //jquery function for redirecting to the page according to the click buttons
    document.getElementById("sig_btn").addEventListener("click",redirectFunc1);
    function redirectFunc1(){
        window.location.href="./Pateint/pateintView/isSignup.php";
    }
    document.getElementById("log_btn").addEventListener("click",redirectFunc2);
    function redirectFunc2(){
        window.location.href="./Pateint/pateintView/isLogin.php";
    }
</script>
</html>
