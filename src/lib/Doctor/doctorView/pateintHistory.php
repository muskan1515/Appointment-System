<?php
/*  Author's Name: Muskan Kushwah
    Date:           30/12/2022
    Purpose: This will let the doctor to get all his/her pateint accounted history.
*/
//including all the required files
$val=dirname(__DIR__,2);
include_once($val.'/getConfigure.php');
include_once(ACT.'/sessionHelp.php');//including the  dbController for starting the connection.\
include_once(confs.'/dbController.php');
$email=$_SESSION['Email'];
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
<h1>Pateint History</h1>
<div class=container>
    <table class="table inner">
    <thead>
    <tr>
        <th>DoctorName</th>
        <th>Specialization</th>
        <th>Email</th>
        <th>Slot</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody id=appoinHistory>
</tbody>
   
    </table>

<div class="btn-group">
  <button type="submit" id="home_btn">Home</button>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script>
  var email='<?php echo $email;?>';
  //jquery function for redirecting to the page according to the click buttons
  $( document ).ready(function() {
    $.ajax({
        url: '../../action.php',
        method: 'post',
        data: {
          email:email,
          tval:8
        },
        success:function(data){
            const resp=JSON.parse(data);
            console.log(resp);
            var len = resp.length;
            for(var i=0; i<len; i++){
            var string = "<tr>" +
                    "<td>" + resp[i].pName + "</td>" +
                    "<td>" + resp[i].pAge + "</td>" +
                    "<td>" + resp[i].pEmail + "</td>" +
                    "<td>" + resp[i].slot + "</td>" +
                    "<td>" + resp[i].date + "</td>" +
                    "</tr>";
            $('#appoinHistory').append(string);
            }
        },
        error:{

        }
    });
});  
  document.getElementById("home_btn").addEventListener("click",redirectFunc1);
    function redirectFunc1(){
        window.location.href="./doctorDashboard.php";
    }
</script>
</html>

