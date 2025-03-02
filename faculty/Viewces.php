<?php
    if( (!isset($_SESSION)) ) // if the session is no  set then start to new session
    {
         session_start();
    }
    if(($_SESSION["uname"]!="")){
    
?>

<!DOCTYPE html>
<html>
<title>BVRITH</title>
<link rel = "icon" href = "../images/logo.jpg" type = "image/x-icon">
<?php require 'facultyContainer.php'; ?>

<script>
    // Open and close the sidebar on medium and small screens
    function showform(str) {
    
      if (str==="") {
        document.getElementById("txtHint").innerHTML="";
        return;
      }
       var w = document.getElementById("batch").value;
      var x = document.getElementById("sem").value;
      var y = document.getElementById("branch").value;
      var z = document.getElementById("section").value;
    //  document.getElementById("demo").innerHTML = x;
      var xmlhttp=new XMLHttpRequest();
      xmlhttp.onreadystatechange=function() {
        if (this.readyState===4 && this.status===200) {
          document.getElementById("txtHint").innerHTML=this.responseText;
        }
      };
      xmlhttp.open("GET","GetViewCes.php?course="+str+"&sem="+x+"&branch="+y+"&section="+z+"&batch="+w,true);
      xmlhttp.send();
    }
    function showCourse() {
            var str='';
            var val=document.getElementById('section');
            for (i=0;i< val.length;i++) { 
                if(val[i].selected){
                    str += val[i].value + ','; 
                }
            }         
            var str=str.slice(0,str.length -1);
            var x = document.getElementById('sem').value;
            var y = document.getElementById('branch').value;
            var w = document.getElementById("batch").value;
            //alert("str"+str+x+y);
            $.ajax({          
                    type: "GET",
                    url: "get_course.php",
    //        	data:'section_id='+str,
                    data:{section_id:str,sem:x,branch:y,batch:w},
                    success: function(data){
                            $("#course_list1").html(data);
                    }
            });
    }
</script>    



<div class="w3-container w3-main" style="margin-left:250px;">
  <div class="w3-container w3-center w3-green"> <h4>Course End Survey View</h4></div>
  <br>
    
<form name="dashboard">
    
        <select class="w3-select w3-border w3-half w3-round-xlarge" name="Semester" id="sem" >
                    <option value=""selected>Select Semester</option>
                    <option value="11">1-1</option>
                    <option value="12">1-2</option>
                    <option value="21">2-1</option>
                    <option value="22">2-2</option>
                    <option value="31">3-1</option>
                    <option value="32">3-2</option>
                    <option value="41">4-1</option>
                    <option value="42">4-2</option>
         </select>
        <select class="w3-select w3-border w3-half w3-round-xlarge" name="Branch" id="branch">
                    <option value=""selected>Select Branch</option>
                    <option value="CSE">CSE</option>
                    <option value="IT">IT</option>
                    <option value="ECE">ECE</option>
                    <option value="EEE">EEE</option>
                    <option value="CSE(AIML)">CSE(AIML)</option>
         </select>
         <select class="w3-select w3-border w3-half w3-round-xlarge" name="Batch" id="batch">
                    <option value="" selected>Select Batch</option>
                    <option value="16-20">16-20</option>
                    <option value="17-21">17-21</option>
                    <option value="18-22">18-22</option>
                    <option value="19-23">19-23</option>
                    <option value="20-24">20-24</option>
                    <option value="21-25">21-25</option>
                    <option value="22-26">22-26</option>
                    <option value="23-27">23-27</option>
         </select>
    <br><br>
        <select class="w3-select w3-border w3-half w3-round-xlarge" name="Section" id="section" onchange="showCourse()">
                    <option value=""selected>Select Section</option>  
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
        </select>
         <select class="w3-select w3-border w3-half w3-round-xlarge" name="Course" id="course_list1" onchange="showform(this.value)">
                    <option value=""selected>Select Course</option>
         </select>
</form>
  <br><p class="w3-text-yellow">Note : Please change section tab to populate list of courses</p><br> <br>
  <div id="txtHint"></div>

    <div class="w3-row-padding"></div>
</form>
</div>
</body>
</html>

<br><br><br><br><br><br>
<?php require '../footer.php';?>
<?php

    }else{
     echo header("Location:../index.php");
}