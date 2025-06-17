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

<style>
        /* Style for the spinner */
        .spinner {
            display: none; 
            position: absolute;
            top: 50%;
            left: 50%;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid lightgreen;
            border-left: 16px solid lightsalmon;
            border-bottom: 16px solid lightskyblue;
            border-right: 16px solid lightsteelblue;
            width: 100px;
            height: 100px;
            -webkit-animation: spin 2s linear infinite; /* Safari */
            animation: spin 2s linear infinite;
            
        }

        /* Animation for the spinner */
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Style for the autocomplete result div */
        #autocompleteResults {
            border: 1px solid #ccc;
            max-width: 300px;
            margin-top: 5px;
            background-color: white;
            position: absolute;
            z-index: 1;
        }

        #autocompleteResults div {
            padding: 8px;
            cursor: pointer;
        }

        #autocompleteResults div:hover {
            background-color: #f1f1f1;
        }
 </style>

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
                    <option value="AIML">AIML</option>
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
                    <option value="24-28">24-28</option>
         </select>
    <br><br>
        <select class="w3-select w3-border w3-half w3-round-xlarge" name="Section" id="section" onchange="showCourse()">
                    <option value=""selected>Select Section</option>  
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
        </select>
         <select class="w3-select w3-border w3-half w3-round-xlarge" name="Course" id="course_list1" onchange="performMainSearch(this.value)" onkeydown="checkEnter(event)" onsubmit="addButton.disabled = true; return true;">
                    <option value=""selected>Select Course</option>
         </select>
</form>
  <br><p class="w3-text-yellow">Note : Please change section tab to populate list of courses</p><br> <br>
  <div id="txtHint" class="w3-container w3-round-xlarge w3-center"></div>
<div id="spinner"  class="spinner"></div>
    
<div class="w3-row-padding"></div>
    <script>
        let timeout;
        let selectedSuggestion = null;  // Variable to store the selected suggestion

        function getDataOnClick(event) {
                event.preventDefault();  // Prevent form submission (if any)

                var searchQuery = document.getElementById('course_list1').value;
                if (!selectedSuggestion) {
                    selectedSuggestion = searchQuery;  // If no suggestion is selected, use the current input
                }

                // Now perform the main search using the selected suggestion or typed value
                performMainSearch(selectedSuggestion);
            
        }
    // Function to perform the main search after auto-completion
        function performMainSearch(course) {
            // You can redirect the user to a search results page or make another AJAX request
            // Example: Redirect to a search page with the query
            //var course = document.getElementById('course_list1').value;
            var batch = document.getElementById("batch").value;
            var sem = document.getElementById("sem").value;
            var branch = document.getElementById("branch").value;
            var section = document.getElementById("section").value;
            // Only send the request if there is something typed in the input
            console.log(batch);
            console.log(sem);
            console.log(branch);
            console.log(section);
            console.log(course);
            
            if (course.length > 1) {
                // Show the spinner when the search starts
                document.getElementById('spinner').style.display = 'inline-block';
                
                clearTimeout(timeout);  // Clear the previous timeout to debounce input
                timeout = setTimeout(function() {
                    $.ajax({
                        url: 'GetViewCes.php',  // The PHP script that handles the search
                        type: 'GET',         // Use GET method to pass the query
                        data: { course: course, batch: batch, sem: sem, branch: branch, section: section},  // Pass the query to the server
                        success: function(response) {
                            // Hide the spinner when results are received
                            document.getElementById('spinner').style.display = 'none';
                            console.log(response);
                            // Display the results in the #autocompleteResults div
                            document.getElementById('txtHint').innerHTML = response;
                        },
                        error: function() {
                            // Hide the spinner in case of an error
                            document.getElementById('spinner').style.display = 'none';
                            document.getElementById('txtHint').innerHTML = 'Error occurred.';
                        }
                    });
                }, 300);  // Wait for 300ms after typing stops before sending the request
            } else {
                // Clear the results and hide the spinner if the input is empty
                document.getElementById('txtHint').innerHTML = '';
                document.getElementById('spinner').style.display = 'none';
            }
            
        }

        // Function to close autocomplete results if the user clicks outside the input or results
        document.getElementById('course_list1').addEventListener("change", function(event) {
            
            var resultsContainer = document.getElementById('course_list1');
            if (!resultsContainer.contains(event.target) && event.target !== document.getElementById('course_list1')) {
                getDataOnClick(event);
                resultsContainer.innerHTML = '';  // Clear the results if clicked outside
            }
        });
    </script>
</div>
</body>
</html>

<br><br><br><br><br><br>
<?php require '../footer.php';?>
<?php

    }else{
     echo header("Location:../index.php");
}