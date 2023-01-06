<?php
/*  Author's Name: Muskan Kushwah
    Date:           30/12/2022
    Purpose: This page is mainly showing the view of a Appoinment history
    of all the doctor of the specified pateint.
*/
//including all the required files
$val=dirname(__DIR__,2);
include_once($val.'/getConfigure.php');
include_once(indexx.'/sessionHelp.php');
include_once(confs.'/dbController.php');
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
<h1>Appoinment History</h1>
<div class=container>
    <table class="table inner">
      <thead>
    <tr>
        <th>DoctorName</th>
        <th>Specialization</th>
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
$( document ).ready(function() {
    $.ajax({
        url: '../../action.php',
        method: 'post',
        data: {
          tval:7
        },
        success:function(data){
                console.log(data);
            const resp=JSON.parse(data);
            console.log(resp);
            var len = resp.length;
            for(var i=0; i<len; i++){
            var url='/Pateint/pateintController/removeAppoin.php?id='+resp[i].dName+'&slot='+resp[i].slot;
            var title='Remove';
            const date = new Date();
            var Cdate=date.getDate()+"-"+date.getMonth()+"-"+date.getFullYear();
            var temp='';
            if(Cdate<=resp[i].date)
              temp="<a href='"+url+"'>"+title+"</a>";
            var string = "<tr>" +
                    "<td>" + resp[i].dName + "</td>" +
                    "<td>" + resp[i].dSpecialization + "</td>" +
                    "<td>" + resp[i].slot + "</td>" +
                    "<td>" + resp[i].date + "</td>" +
                    "<td>" + temp + "</td>" +
                    "</tr>";
            $('#appoinHistory').append(string);
            }
        },
        error:{

        }
    });
});
  //jquery function for redirecting to the page according to the click buttons
    document.getElementById("home_btn").addEventListener("click",redirectFunc1);
    function redirectFunc1(){
        window.location.href="../pateintView/pateintDashboard.php";
    }
</script>
</html>



