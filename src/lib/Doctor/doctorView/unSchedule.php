<?php
/*  Author's Name: Muskan Kushwah
    Date:           30/12/2022
    Purpose: This page is mainly showing how the doctor will make there specified slot
    unavailable.
*/
//including all the required files
$val=dirname(__DIR__,2);
include_once($val.'/getConfigure.php');
include_once(indexx.'/sessionHelp.php'); 

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
<h1>Slots Window</h1>
<div class=container>
    <table class="table inner">
        <thead>
    <tr>
        <th>Time</th>
    </tr>
</thead>
<tbody id=unScheduledPage>
</tbody>
    </table>
</div>
<button type="submit" id="book_btn">home</button>
<button type="submit" id="home_btn">Logout</button>
</body>
<script>
  //jquery function for redirecting to the page according to the click buttons
  $( document ).ready(function() {
    var id = location.search.split('id=')[1];
    $.ajax({
        url: '../../action.php',
        method: 'post',
        data: {
            id:id,
           tval:4
        },
        success:function(data){
            const resp=JSON.parse(data);
            var len = resp.length;
            for(var i=0; i<len; i++){
                const d = new Date();
                let cday=d.getDay();
                    var url='/Doctor/doctorController/unDo.php?slot='+resp[i].slot;
                    var title='Undo';
                    var url2='/Doctor/doctorController/makeUnavail.php?slot='+resp[i].slot;
                    var title2='Unavailable';
                    var data1=false;
                    var data2=true;
                    $.ajax({
                        url: '../../action.php',
                        method:'post',
                        data:{
                            id:id,
                            slot:resp[i].Slot,
                            day:day,
                            tval:5
                        },
                        success: function(data){
                             data1=JSON.parse(data);
                        }
                    });
                    $.ajax({
                        url: '../../action.php',
                        method:'post',
                        data:{
                            id:id,
                            slot:resp[i].Slot,
                            day:day,
                            tval:6
                        },
                        success: function(data){
                            data2=JSON.parse(data);
                        }

                    });
                    var temp="";
                    if(data1=='true'){
                        temp="Booked";
                    }
                    else if(data2=='true' ){
                        temp="Already did!!"+"<a href='"+url+"'>"+title+"</a>";
                    }
                    else{
                        temp="<a href='"+url2+"'>"+title2+"</a>";
                    }
                    var string = "<tr>" +
                    "<td>" + resp[i].Slot + "</td>" +
                    "<td>" + resp[i].time + "</td>" +
                    "<td>" + temp + "</td>" ;
                    $('#appoinmentCode').append(string);
                }

"</tr>";
}
},
error:{

}
});
});
  document.getElementById("book_btn").addEventListener("click",redirectFunc1);
    function redirectFunc1(){
        window.location.replace("./doctorDashboard.php");
    }
    document.getElementById("home_btn").addEventListener("click",redirectFunc2);
    function redirectFunc2(){
        window.location.replace("../../Pateint/pateintController/getLogout.php");
    }
</script>
</html>