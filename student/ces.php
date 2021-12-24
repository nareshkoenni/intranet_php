
<?php
    if( (!isset($_SESSION)) ) // if the session is no  set then start to new session
    {
         session_start();
    }
    if(($_SESSION["uname"]!="")){
    
?>

<?php require 'studentContainer.php'; ?>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"
    type="text/javascript"></script>
<script>
    // Open and close the sidebar on medium and small screens
    function w3_open() {
      document.getElementById("mySidebar").style.display = "block";
      document.getElementById("myOverlay").style.display = "block";
    }

    function w3_close() {
      document.getElementById("mySidebar").style.display = "none";
      document.getElementById("myOverlay").style.display = "none";
    }

    // Change style of top container on scroll
    window.onscroll = function() {myFunction();};
    function myFunction() {
      if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        document.getElementById("myTop").classList.add("w3-card-4", "w3-animate-opacity");
        document.getElementById("myIntro").classList.add("w3-show-inline-block");
      } else {
        document.getElementById("myIntro").classList.remove("w3-show-inline-block");
        document.getElementById("myTop").classList.remove("w3-card-4", "w3-animate-opacity");
      }
    }

    // Accordions
    function myAccordion(id) {
      var x = document.getElementById(id);
      if (x.className.indexOf("w3-show") === -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme";
      } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme", "");
      }
    }
    function showCourses(str) {
      if (str==="") {
        document.getElementById("txtHint").innerHTML="";
        return;
      }
      var xmlhttp=new XMLHttpRequest();
      xmlhttp.onreadystatechange=function() {
        if (this.readyState===4 && this.status===200) {
          document.getElementById("txtHint").innerHTML=this.responseText;
        }
      };
      xmlhttp.open("GET","getFile.php?course="+str+"&key=course",true);
      xmlhttp.send();
    }
    function showform(str) {
      if (str==="") {
        document.getElementById("txtHint").innerHTML="";
        return;
      }
      var x = document.getElementById("sem").value;
    //  document.getElementById("demo").innerHTML = x;
      var xmlhttp=new XMLHttpRequest();
      xmlhttp.onreadystatechange=function() {
        if (this.readyState===4 && this.status===200) {
          document.getElementById("txtHint").innerHTML=this.responseText;
        }
      };
      xmlhttp.open("GET","getFile.php?course="+str+"&sem="+x,true);
      xmlhttp.send();
    }
    function showCourse() {
            var str='';
            var val=document.getElementById('branch');
            for (i=0;i< val.length;i++) { 
                if(val[i].selected){
                    str += val[i].value + ','; 
                }
            }         
            var str=str.slice(0,str.length -1);
            var x = document.getElementById("sem").value;
            $.ajax({          
                    type: "GET",
                    url: "get_course.php",
    //        	data:'branch_id='+str,
                    data:{branch_id:str,sem:x},
                    success: function(data){
                            $("#course_list").html(data);
                    }
            });
    }
</script>    



<br>

<div class="w3-container w3-main" style="margin-left:250px;">
  <div class="w3-container w3-center w3-green"> <h4>Course End Survey</h4></div>
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
        <select class="w3-select w3-border w3-half w3-round-xlarge" name="Branch" id="branch" onchange="showCourse()">
                    <option value=""selected>Select Branch</option>
                    <option value="CSE">CSE</option>
                    <option value="IT">IT</option>
                    <option value="ECE">ECE</option>
                    <option value="EEE">EEE</option>
         </select>
        <br><br>
         <select class="w3-select w3-border w3-half w3-round-xlarge" name="Course" id="course_list" onchange="showform(this.value)">
                    <option value=""selected>Select Course</option>
 						
                    
         </select>
    </form>
    <br><br><br>
    <div id="txtHint"></div>

    <div class="w3-row-padding">
          
        
        
    </div>
</div>    
</body>
</html>

<br><br><br><br><br><br>
<?php require 'footer.php';?>
<?php

    }else{
    echo header("Location:index.php");
}