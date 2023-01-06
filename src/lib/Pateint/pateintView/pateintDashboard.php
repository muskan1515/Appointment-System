<?php
/*  Author's Name: Muskan Kushwah
    Date:           30/12/2022
    Purpose: This page is mainly showing the view of a Pateint's Dashboard of the library system.
*/
//including all the required files
$val=dirname(__DIR__,2);
include_once($val.'/getConfigure.php');
include_once(indexx.'/sessionHelp.php'); 
if(!isset($_SESSION['Email'])){
    header("Location:../../index.php");
}
?>
<!Doctype html>
<style>
.btn-group button {
  background-color: #04AA6D; /* Green background */
  border: 1px solid green; /* Green border */
  color: white; /* White text */
  padding: 10px 24px; /* Some padding */
  cursor: pointer; /* Pointer/hand icon */
  float: left; /* Float the buttons side by side */
}
</style>
<body>
<h1>Pateint's View</h1>
<button type="submit" id="book_btn">Book An Appoinment</button>
<button type="submit" id="his_btn">Appoinment History</button>
<button type="submit" id="logout_btn">Logout</button>
</body>
<script>
  //jquery function for redirecting to the page according to the click buttons
  document.getElementById("book_btn").addEventListener("click",redirectFunc1);
    function redirectFunc1(){
        window.location.replace("./bookAppoinment.php");
    }
    document.getElementById("his_btn").addEventListener("click",redirectFunc2);
    function redirectFunc2(){
        window.location.replace("./appoinmentHistory.php");
    }
    document.getElementById("logout_btn").addEventListener("click",redirectFunc3);
    function redirectFunc3(){
        window.location.replace("../pateintController/getLogout.php");
    }
</script>
</html>