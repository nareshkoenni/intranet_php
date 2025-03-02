<?php
    if( (!isset($_SESSION)) ) // if the session is no  set then start to new session
    {
         session_start();
    }
    if(($_SESSION["uname"]!="")){
    
?>

<?php require 'facultyContainer.php'; ?>

<div class="w3-container w3-main" style="margin-left:250px;">
  <div class="w3-container w3-center w3-green"> <h4>Graduate Exit Survey View</h4></div>

<!DOCTYPE html>
<html>
<head>
<script>
function showView() {
   var branch= document.getElementById("branch").value;
   var batch=document.getElementById("batch").value;
  
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","GetView.php?batch="+batch+"&branch="+branch,true);
  xmlhttp.send();
}
</script>
</head>
<body>
    <br>
    <form name="Batch" metchod='POST'>
<!--        <select  class="w3-select w3-border w3-half w3-round-xlarge" name="batch" onchange="showView(this.value)">
<option value="" selected>Select your Batch:</option>
<option value='2018-2022'>2018-2022</option>
<option value="2019-2023">2019-2023</option>
<option value="2020-2024">2020-2024</option>
<option value="2021-2025">2021-2025</option>
</select>-->
        <select class="w3-select w3-border  w3-round-xlarge" name="Branch" id="branch">
                    <option value=""selected>Select Branch</option>
                    <option value="CSE">CSE</option>
                    <option value="IT">IT</option>
                    <option value="ECE">ECE</option>
                    <option value="EEE">EEE</option>
                    <option value="CSE(AIML)">CSE(AIML)</option>
         </select>
        <select class="w3-select w3-border  w3-round-xlarge"  name="batch" id="batch" required="">
                    <option value="">Select Batch</option>
                    <option value="16">2016-2020</option>
                    <option value="17">2017-2021</option>
                    <option value="18">2018-2022</option>
                    <option value="19">2019-2023</option>
                    <option value="20">2020-2024</option>
                    <option value="21">2021-2025</option>
                    <option value="22">2022-2026</option>
                    <option value="23">2023-2027</option>
            </select>
            
            
            
    </form><br>
    <button class="w3-btn w3-green w3-large w3-round"  onclick="showView()">View</button>
    
    <br><br><br>
<div id="txtHint"><b>View will be listed here.</b></div>

</body>
</html>



</div>

<?php
/*
include '../dbcon.php';
$sql1 = "select overall,count(rollnumber) from ges group by overall";
$sql2 = "select training_placement,count(rollnumber) from ges group by training_placement;";
$res1 = mysqli_query($conn,$sql1);
$res2 = mysqli_query($conn,$sql2);
?>
<!--<!DOCTYPE html>
<html lang="en">-->
<head>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart1);

function drawChart1() {

    var data = google.visualization.arrayToDataTable([
      ['Rating', 'Count'],
      <?php
      if($res1->num_rows > 0){
          while($row = $res1->fetch_assoc()){
            echo "['".$row['overall']."', ".$row['count(rollnumber)']."],";
          }
      }
      ?>
    ]);
    
    var options = {
        title: 'Overall Rating',
        width: 900,
        height: 500,
        //pieHole: 0.5,
        is3D: true,
    };
    
    var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
    
    chart.draw(data, options);
}
google.charts.setOnLoadCallback(drawChart2);
function drawChart2() {

    var data = google.visualization.arrayToDataTable([
      ['Rating', 'Count'],
      <?php
      if($res2->num_rows > 0){
          while($row = $res2->fetch_assoc()){
            echo "['".$row['training_placement']."', ".$row['count(rollnumber)']."],";
          }
      }
      ?>
    ]);
    
    var options = {
        title: 'Placement Training',
        width: 900,
        height: 500,
        //pieHole: 0.5,
        is3D: true,
    };
    
    var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
    
    chart.draw(data, options);
}
</script>
</head>
<body>
    <!-- Display the pie chart -->
    <div class="w3-container w3-main" style="margin-left:250px;">
    <div id="piechart1"></div>
    
    
    <div id="piechart2"></div>
    </div>
</body>

<?php  
    error_reporting(0);
//    $sql = "SELECT * from ges";
//    $result = mysqli_query($conn, $sql);
//    while($row = mysqli_fetch_assoc($result)) {
?>        
       
<?php
//    }
     //echo "ERROR: Could not execute query: $sql. " . mysqli_error($conn);
                 
    mysqli_close($conn);
*/
?>
    
   
  </form>
</div>

<br><br><br><br><br><br>

<?php require '../footer.php'; ?>




     
</body>
</html> 
<?php
}else{
     echo header("Location:../index.php");
}
?>