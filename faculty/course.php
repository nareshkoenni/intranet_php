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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


<?php require 'facultyContainer.php'; ?>

<script>
    // Open and close the sidebar on medium and small screens
   
    function showcourseCO() {
        var str = document.getElementById("course_list1").value; // corrected ID (was "Course", should be "course_list1")

        if (str === "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        }

        var w = document.getElementById("batch").value;
        var x = document.getElementById("sem").value;
        var y = document.getElementById("branch").value;

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getCourseCOs.php?course=" + str + "&sem=" + x + "&branch=" + y + "&batch=" + w, true);
        xmlhttp.send();
    }

    function showMappings() {
        var str = document.getElementById("course_list1").value; // corrected ID (was "Course", should be "course_list1")

        if (str === "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        }

        var w = document.getElementById("batch").value;
        var x = document.getElementById("sem").value;
        var y = document.getElementById("branch").value;

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getMapping.php?course=" + str + "&sem=" + x + "&branch=" + y + "&batch=" + w, true);
        xmlhttp.send();
    }


    function showCourse1() {
//            var str='';
//            var val=document.getElementById('section');
//            for (i=0;i< val.length;i++) { 
//                if(val[i].selected){
//                    str += val[i].value + ','; 
//                }
//            }         
          //  var str=str.slice(0,str.length -1);
            var x1 = document.getElementById('sem').value;
            var y1 = document.getElementById('branch').value;
            var w1 = document.getElementById("batch").value;
            //alert("str"+x1+y1+w1);
            $.ajax({          
                    type: "GET",
                    url: "get_course.php",
    //        	data:'section_id='+str,
                    data:{sem:x1,branch:y1,batch:w1},
                    success: function(data){
                            $("#course_list1").html(data);
                    }
            });
    }
</script>    

<div class="w3-mobile w3-container" style="margin-left:250px;">
    <button onclick="document.getElementById('newCourse').style.display='block'" class="w3-btn w3-green w3-round-xlarge">New Course?</button>
    <button onclick="document.getElementById('assignCourse').style.display='block'" class="w3-btn w3-green w3-round-xlarge">Assign Course</button>
   

</div>
<br>
<div class="w3-container w3-main" style="margin-left:250px;">
    <div class="w3-container w3-center w3-green"> <h4>Course</h4></div> <br>
    <div class="w3-third">  
        <select class="w3-select w3-border w3-round-xlarge" name="Semester" id="sem">
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
    </div>
    <div class="w3-third">
        <select class="w3-select w3-border w3-round-xlarge" name="Branch" id="branch" >
                    <option value=""selected>Select Branch</option>
                    <option value="CSE">CSE</option>
                    <option value="IT">IT</option>
                    <option value="ECE">ECE</option>
                    <option value="EEE">EEE</option>
                    <option value="AIML">AIML</option>
                    <option value="All">All</option>
                    
         </select>
    </div>
    <div class="w3-third">
         <select class="w3-select w3-border w3-round-xlarge" name="Batch" id="batch" onchange="showCourse1()">
                    <option value="" selected>Select Batch</option>
                    <option value="18-22">18-22</option>
                    <option value="19-23">19-23</option>
                    <option value="20-24">20-24</option>
                    <option value="21-25">21-25</option>
                    <option value="22-26">22-26</option>
                    <option value="23-27">23-27</option>
                    <option value="24-28">24-28</option>
         </select>
    </div>
<!--    <div class="w3-half">
        <select class="w3-select w3-border w3-round-xlarge" name="Section" id="section" onchange="showCourse()">
                    <option value=""selected>Select Section</option>  
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
        </select>
    </div>-->
    <div class="w3-half">
         <select class="w3-select w3-border w3-round-xlarge" name="Course" id="course_list1">
                    <option value=""selected>Select Course</option>
         </select>
    </div>
    <div class="w3-half">
        <button onClick="showcourseCO()" class="w3-btn w3-green w3-round-xlarge">Show Course COs</button>
    </div>
    <div class="w3-half">
      <button onClick="showMappings()"  class="w3-btn w3-green w3-round-xlarge">Show Course Mapping</button>
    </div>      
  

  <br><p class="w3-text-yellow">Note : Please change batch tab to populate list of courses</p><br> <br>
  <div id="txtHint" class="w3-container w3-round-xlarge w3-center"></div>
</div>
<div id="assignCourse" class="w3-modal">
   
    <div class="w3-modal-content w3-card-4 w3-animate-zoom w3-round-xlarge" style="max-width:650px">
       <script>
         function showCourse() {
            var x = document.getElementById('asem').value;
            var y = document.getElementById('abranch').value;
            var w = document.getElementById("abatch").value;
            //alert("str"+str+x+y);
            $.ajax({          
                    type: "GET",
                    url: "get_course.php",
    //        	data:'section_id='+str,
                    data:{sem:x,branch:y,batch:w},
                    success: function(data){
                            $("#acourse_list1").html(data);
                    }
            });
        }
        </script>      
      <div class="w3-center"><br>
        <span onclick="document.getElementById('assignCourse').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
      </div>
       <form class="w3-container" action="courseMapping.php" onsubmit="editButton.disabled = true; return true;" method="post">
         
         <div class="w3-third">  
        <select class="w3-select w3-border w3-round-xlarge" name="Semester" id="asem">
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
    </div>
    <div class="w3-third">
        <select class="w3-select w3-border w3-round-xlarge" name="Branch" id="abranch" >
                    <option value=""selected>Select Branch</option>
                    <option value="CSE">CSE</option>
                    <option value="IT">IT</option>
                    <option value="ECE">ECE</option>
                    <option value="EEE">EEE</option>
                    <option value="AIML">AIML</option>
                    
         </select>
    </div>
    <div class="w3-third">
         <select class="w3-select w3-border w3-round-xlarge" name="Batch" id="abatch">
                    <option value="" selected>Select Batch</option>
                    <option value="18-22">18-22</option>
                    <option value="19-23">19-23</option>
                    <option value="20-24">20-24</option>
                    <option value="21-25">21-25</option>
                    <option value="22-26">22-26</option>
                    <option value="23-27">23-27</option>
                    <option value="24-28">24-28</option>
         </select>
    </div>
    
<!--    <div class="w3-third">
         <select class="w3-select w3-border w3-round-xlarge" name="Course" id="acourse_list1">
                    <option value=""selected>Select Course</option>
         </select>
    </div>-->
    <div class="w3-third w3-mobile w3-hover-text-green">
                
                <select class="w3-select w3-border w3-round-xlarge" name="Course" id="acourse_list1" >
                    <option value="" selected>Select Course</option>
                   <?php include '../dbcon.php';?>		
                    <?php  
                        error_reporting(0);
                        $sql = "SELECT course_id from course order by course_id";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)) {
                     ?>        
                            <option value='<?php echo $row["course_id"];?>'><?php echo $row["course_id"] ;?></option>  						
                    <?php
                        }
                        mysqli_close($conn);

                    ?>
                </select>
            </div>        
           
    <div class="w3-third">
        <select class="w3-select w3-border w3-round-xlarge" name="Section" id="asection">
                    <option value=""selected>Select Section</option>  
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
        </select>
    </div>       
    
      <div class="w3-container w3-border-top">
          <button class="w3-margin w3-half w3-button w3-green" id="addButton" type="submit">Map</button>
          <button onclick="document.getElementById('assignCourse').style.display='none'" type="button" class="w3-margin w3-half w3-button w3-red">Cancel</button>
      </div>
      </form>      
    </div>
  </div>
  <div id="newCourse" class="w3-modal">
   
    <div class="w3-modal-content w3-card-4 w3-animate-zoom w3-round-xlarge" style="max-width:750px">
      
      <div class="w3-center"><br>
        <span onclick="document.getElementById('newCourse').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
      </div>
       <form class="w3-container" action="addCourse.php" onsubmit="editButton.disabled = true; return true;" method="post">
         
         <div class="w3-mobile">  
            <input class="w3-input" type="text" placeholder="Enter course_id  (eg:BH23_PPS for theory, BH23_PPSLab for lab)" name="course_id" maxlength="100" >
        </div>
        
        <div class="w3-mobile">
            <input class="w3-input" type="text" placeholder="Enter CO1" name="CO1">
        </div>

        <div class="w3-mobile">
             <input class="w3-input" type="text" placeholder="Enter CO2" name="CO2">
        </div>
        <div class="w3-mobile">
            <input class="w3-input" type="text" placeholder="Enter CO3" name="CO3">
        </div>       
        <div class="w3-mobile">
            <input class="w3-input" type="text" placeholder="Enter CO4" name="CO4">
        </div>
        <div class="w3-mobile">
            <input class="w3-input" type="text" placeholder="Enter CO5 (optional for lab)" name="CO5">
        </div>
        <div class="w3-mobile">
            <input class="w3-input" type="text" placeholder="Enter CO6 (optional for lab)"  name="CO6">
        </div>
        <div class="w3-mobile">
            <input class="w3-input" type="text" placeholder="Enter Text book name" name="textbook">
        </div>
        <div class="w3-mobile">
            <input class="w3-input" type="text" placeholder="Enter Reference book name" name="referencebook">
        </div>
           <br>
      <div class="w3-half ">
          <button class="w3-button w3-green w3-round-xlarge" id="addButton"   type="submit">Add</button>
      </div>
      <div class="w3-half">
          <button onclick="document.getElementById('newCourse').style.display='none'" type="button" class="w3-button w3-red w3-round-xlarge">Cancel</button>
      </div>     
      </form>      
    </div>
  </div>
</body>
</html>

<br><br><br><br><br><br>
<?php require '../footer.php';?>
<?php

    }else{
     echo header("Location:../index.php");
}