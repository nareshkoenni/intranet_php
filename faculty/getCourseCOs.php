<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>
    <?php
include '../dbcon.php'
?>
<div id="txtHint">
<?php
$branch = $_GET["branch"]; 
$batch = substr($_GET["batch"], 0, 2);

$sem = $_GET["sem"];
$course=$_GET["course"];

$cou="select * from course c, course_branch cb where c.course_id=cb.course_id and branch='$branch' and sem='$sem' and  c.course_id='$course'";
if($branch="All"){
    $cou="select * from course c, course_branch cb where c.course_id=cb.course_id and sem='$sem' and  c.course_id='$course'";
    
}
$res = mysqli_query($conn,$cou);
$count==0;
while($cour_id = mysqli_fetch_array($res)){
    $count++;
    $cid = $cour_id["course_id"];
    $coo1 = $cour_id["CO1"];
    $coo2 = $cour_id["CO2"];
    $coo3 = $cour_id["CO3"];
    $coo4 = $cour_id["CO4"];
    $coo5 = $cour_id["CO5"];
    $coo6 = $cour_id["CO6"];
}


echo "<table class='w3-container w3-table-all w3-round w3-center' style='width:80%'>
    <tr class='w3-blue'>
    <td>".$course." Course Outcomes</td>
 </tr>";
  echo "<tr>";
  echo "<td>" . $coo1. "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>" . $coo2. "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>" . $coo3. "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>" . $coo4. "</td>";
  echo "</tr>";
  if(!strpos(strtoupper($cid), strtoupper("Lab")) !==false){
      echo "<tr>";
      echo "<td>" . $coo5. "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>" . $coo6. "</td>";
      echo "</tr>";
  }
  
if($count==0){
    echo "<tr>";
  echo "<td>" . 'No Details' . "</td>";
  
  echo "</tr>";
}
echo "</table>";
echo "<br/>";

mysqli_close($conn);
?>
</body>
</html>