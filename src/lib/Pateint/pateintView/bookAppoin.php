<?php
/*  Author's Name: Muskan Kushwah
    Date:           30/12/2022
    Purpose: This page is mainly showing the view of a how booking appoinment will happen.
*/
//including all the required files
$val=dirname(__DIR__,2);
include_once($val.'/getConfigure.php');
include_once(indexx.'/sessionHelp.php'); 
include_once(confs.'/getModels.php');
include_once(pateintC.'/getCheck.php');
require_once('../pateintController/getCheck.php');
$obj=new check();
$t=date('d-m-Y');
$date=date("d",strtotime($t));
$day=date("D",strtotime($t));
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
<h1>Slot Lists</h1>
<div class=container>
    <table class="table inner">
    <thead>
    <tr>
        <th>Slots</th>
        <th>Mon</th>
        <th>Tues</th>
        <th>Wed</th>
        <th>Thu</th>
        <th>Fri</th>
        <th>Sat</th>
        <th>Sun</th>
        
    </tr>
    </thead>
    <tbody id=appoinmentCode>
    </tbody>
   
    </table>
</div>
<button type="submit" id="book_btn">home</button>
<button type="submit" id="home_btn">Logout</button>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
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
                 var check=false;
                var slot=resp[i].Slot;
                const d = new Date();
                let cday=d.getDay();
                if(cday=="Mon" || check==true){
                    day="Mon";
                    var url='/Pateint/pateintController/doRequest.php?slot='+resp[i]+'$id'+id+'$day'+day;
                    var title='Request';
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
                    else if(data2=='false' && day=="Mon"){
                        temp="Unavailable";
                    }
                    else{
                        var url='/Pateint/pateintController/doRequest.php?slot='+resp[i]+'$id'+id+'$day'+day;
                        var title='Request';
                        temp="<a href='"+url+"'>"+title+"</a>"  ;
                    }
                    var string = "<tr>" +
                    "<td>" + resp[i].Slot + "</td>" +
                    "<td>" + resp[i].time + "</td>" +
                    "<td>" + temp + "</td>" ;
                    $('#appoinmentCode').append(string);
                }
                else if(cday=="Tue"|| check==true){
                    day="Tue";
                    var url='/Pateint/pateintController/doRequest.php?slot='+resp[i]+'$id'+id+'$day'+day;
                    var title='Request';
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
                    else if(data2=='false' && day=="Tue"){
                        temp="Unavailable";
                    }
                    else{
                        var url='/Pateint/pateintController/doRequest.php?slot='+resp[i]+'$id'+id+'$day'+day;
                        var title='Request';
                        temp="<a href='"+url+"'>"+title+"</a>"  ;
                    }
                    var string = "<tr>" +
                    "<td>" + resp[i].Slot + "</td>" +
                    "<td>" + resp[i].time + "</td>" +
                    "<td>" + temp + "</td>" ;
                    $('#appoinmentCode').append(string);
                }
                else if(cday=="Wed"|| check==true){
                    day="Wed";
                    var url='/Pateint/pateintController/doRequest.php?slot='+resp[i]+'$id'+id+'$day'+day;
                    var title='Request';
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
                    else if(data2=='false' && day=="Wed"){
                        temp="Unavailable";
                    }
                    else{
                        var url='/Pateint/pateintController/doRequest.php?slot='+resp[i]+'$id'+id+'$day'+day;
                        var title='Request';
                        temp="<a href='"+url+"'>"+title+"</a>"  ;
                    }
                    var string = "<tr>" +
                    "<td>" + resp[i].Slot + "</td>" +
                    "<td>" + resp[i].time + "</td>" +
                    "<td>" + temp + "</td>" ;
                    $('#appoinmentCode').append(string);
                }
                else if(cday=="Thu"|| check==true){
                    day="Thu";
                    var url='/Pateint/pateintController/doRequest.php?slot='+resp[i]+'$id'+id+'$day'+day;
                    var title='Request';
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
                    else if(data2=='false' && day=="Thu"){
                        temp="Unavailable";
                    }
                    else{
                        var url='/Pateint/pateintController/doRequest.php?slot='+resp[i]+'$id'+id+'$day'+day;
                        var title='Request';
                        temp="<a href='"+url+"'>"+title+"</a>"  ;
                    }
                    var string = "<tr>" +
                    "<td>" + resp[i].Slot + "</td>" +
                    "<td>" + resp[i].time + "</td>" +
                    "<td>" + temp + "</td>" ;
                    $('#appoinmentCode').append(string);
                }
                else if(cday=="Fri"|| check==true){
                    day="Fri";
                    var url='/Pateint/pateintController/doRequest.php?slot='+resp[i]+'$id'+id+'$day'+day;
                    var title='Request';
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
                    else if(data2=='false' && day=="Fri"){
                        temp="Unavailable";
                    }
                    else{
                        var url='/Pateint/pateintController/doRequest.php?slot='+resp[i]+'$id'+id+'$day'+day;
                        var title='Request';
                        temp="<a href='"+url+"'>"+title+"</a>"  ;
                    }
                    var string = "<tr>" +
                    "<td>" + resp[i].Slot + "</td>" +
                    "<td>" + resp[i].time + "</td>" +
                    "<td>" + temp + "</td>" ;
                    $('#appoinmentCode').append(string);
                }
                else if(cday=="Sat" || check==true){
                    day="Sat";
                    var url='/Pateint/pateintController/doRequest.php?slot='+resp[i]+'$id'+id+'$day'+day;
                    var title='Request';
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
                    else if(data2=='false' && day=="Sat"){
                        temp="Unavailable";
                    }
                    else{
                        var url='/Pateint/pateintController/doRequest.php?slot='+resp[i]+'$id'+id+'$day'+day;
                        var title='Request';
                        temp="<a href='"+url+"'>"+title+"</a>"  ;
                    }
                    var string = "<tr>" +
                    "<td>" + resp[i].Slot + "</td>" +
                    "<td>" + resp[i].time + "</td>" +
                    "<td>" + temp + "</td>" ;
                    $('#appoinmentCode').append(string);
                }
                else if(cday=="Sun" || check==true){
                    day="Sun";
                    var url='/Pateint/pateintController/doRequest.php?slot='+resp[i]+'$id'+id+'$day'+day;
                    var title='Request';
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
                    else if(data2=='false' && day=="Sun"){
                        temp="Unavailable";
                    }
                    else{
                        var url='/Pateint/pateintController/doRequest.php?slot='+resp[i]+'$id'+id+'$day'+day;
                        var title='Request';
                        temp="<a href='"+url+"'>"+title+"</a>"  ;
                    }
                    var string = "<tr>" +
                    "<td>" + resp[i].Slot + "</td>" +
                    "<td>" + resp[i].time + "</td>" +
                    "<td>" + temp + "</td>" ;
                    $('#appoinmentCode').append(string);
                }
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
        window.location.replace("./pateintDashboard.php");
    }
    document.getElementById("home_btn").addEventListener("click",redirectFunc2);
    function redirectFunc2(){
        window.location.replace("../pateintController/getLogout.php");
    }
</script>
</html>