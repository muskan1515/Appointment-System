<?php
/*  Author's Name: Muskan Kushwah
    Date:           30/12/2022
    Purpose: This page is how pateint will book an slot from a specified doctor.
*/
//including all the required files
$val=dirname(__DIR__,2);
include_once($val.'/getConfigure.php');
include_once(indexx.'/sessionHelp.php'); 
if(!isset($_SESSION['Email'])){
    header("Location:".indexx."/index.php");
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
<h1>Doctor's List</h1>
<div class=container>
    <table class="table inner">
    <thead>
    <tr>
        <th>Doctor Name</th>
        <th>Doctor's Specialization</th>
    </tr>
    </thead>
    <tbody id=appoinmentCode>
    </tbody>
    
    </table>
</div>
<button type="submit" id="home_btn">Home Button</button>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script>
$( document ).ready(function() {
    $.ajax({
        url: '../../action.php',
        method: 'post',
        data: {
           tval:3
        },
        success:function(data){
            console.log(data);
            const resp=JSON.parse(data);
            console.log(resp);
            var len = resp.length;
            for(var i=0; i<len; i++){
            var url='/Pateint/pateintView/bookAppoin.php?id='+resp[i].dId;
            var title='Book';
            var string = "<tr>" +
                    "<td>" + resp[i].dId + "</td>" +
                    "<td>" + resp[i].dName + "</td>" +
                    "<td>" + resp[i].dSpecialization + "</td>" +
                    "<td>" + "<a href='"+url+"'>"+title+"</a>" + "</td>" +
                    "</tr>";
            $('#appoinmentCode').append(string);
            }
        },
        error:{

        }
    });
});
  //jquery function for redirecting to the page according to the click buttons
    document.getElementById("home_btn").addEventListener("click",redirectFunc2);
    function redirectFunc2(){
        window.location.replace("./pateintDashboard.php");
    }
</script>
</html>