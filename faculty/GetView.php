<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
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
//$dept=filter_input(INPUT_POST,"dept");
$batch=$_GET["batch"];
$sql="SELECT truncate(avg(g.overall),2) as avg1,"
        . "truncate(avg(training_placement),2) as avg2,"
        . "truncate(avg(amenties),2) as avg3,"
        . "truncate(avg(library),2) as avg4,"
        . "truncate(avg(principal),2) as avg5,"
        . "truncate(avg(hod),2) as avg6,"
        . "truncate(avg(teaching),2) as avg7,"
        . "truncate(avg(non_teaching),2) as avg8,"
        . "truncate(avg(labs),2) as avg9,"
        . "truncate(avg(exam_cell),2) as avg10,"
        . "truncate(avg(administration),2) as avg11,"
        . "truncate(avg(ambience),2) as avg12,"
        . "truncate(avg(classrooms),2) as avg13 "
        . "from ges g,student s where g.rollnumber=s.rollnumber and s.batch='$batch'";
$result= mysqli_query($conn,$sql);


echo "<table class='w3-table-all w3-round' style='width:80%'>
    <tr class='w3-blue'>
    <td>Fields</td>
    <td>Average</td>
    </tr>";

$count=0;
while($row = mysqli_fetch_array($result)) {
    $count++;
  echo "<tr>";
  echo "<td>" . 'Overall Rating'. "</td>";
  echo "<td>" . $row['avg1'] . "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>" . 'Placement Training'. "</td>";
  echo "<td>" . $row['avg2'] . "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>" . 'Amenties'. "</td>";
  echo "<td>" . $row['avg3'] . "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>" . 'Library'. "</td>";
  echo "<td>" . $row['avg4'] . "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>" . 'Principal'. "</td>";
  echo "<td>" . $row['avg5'] . "</td>";
  echo "</tr>";
   echo "<tr>";
  echo "<td>" . 'HOD'. "</td>";
  echo "<td>" . $row['avg6'] . "</td>";
  echo "</tr>";
   echo "<tr>";
  echo "<td>" . 'Teaching'. "</td>";
  echo "<td>" . $row['avg7'] . "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>" . 'Non-Teaching'. "</td>";
  echo "<td>" . $row['avg8'] . "</td>";
  echo "</tr>";
   echo "<tr>";
  echo "<td>" . 'Labs'. "</td>";
  echo "<td>" . $row['avg9'] . "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>" . 'Exam-cell'. "</td>";
  echo "<td>" . $row['avg10'] . "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>" . 'Administration'. "</td>";
  echo "<td>" . $row['avg11'] . "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>" . 'Ambience'. "</td>";
  echo "<td>" . $row['avg12'] . "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>" . 'Classrooms'. "</td>";
  echo "<td>" . $row['avg13'] . "</td>";
  echo "</tr>";

}
$stu = "select count(g.rollnumber) as tcount from ges g,student s where g.rollnumber=s.rollnumber and s.batch='$batch'";
$result1= mysqli_query($conn,$stu);
while($row = mysqli_fetch_array($result1)){
    echo "<tr>";
  echo "<td>" . 'Total Students'. "</td>";
  echo "<td>" . $row['tcount'] . "</td>";
  echo "</tr>";
}
if($count==0){
    echo "<tr>";
  echo "<td colspan='2'>" . 'No Details' . "</td>";
  
  echo "</tr>";
}
echo "</table>";
echo "<br/>";
?>
</div>
    
<?php
echo "<form action = 'chart.php' method='post'>";
echo "<input type='hidden' value='$batch' name='batch'>";
echo "<button>Next</button>";
echo "</form>";
?>
    


<?php

//echo "<button class='w3-btn w3-black' onclick=window.location.href='display.php'>";
//echo "Next";
//echo "</button>";
mysqli_close($conn);


?>
   



</body>
</html>
