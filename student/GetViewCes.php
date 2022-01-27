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
$branch = $_GET["branch"]; 
$sem = $_GET["sem"];
$section = $_GET["section"];
$course=$_GET["course"];
$cou="select * from course c where c.course_name='$course'";
$res = mysqli_query($conn,$cou);
while($cour_id = mysqli_fetch_array($res)){
    $cid = $cour_id["course_id"];
    $coo1 = $cour_id["CO1"];
    $coo2 = $cour_id["CO2"];
    $coo3 = $cour_id["CO3"];
    $coo4 = $cour_id["CO4"];
    $coo5 = $cour_id["CO5"];
    $coo6 = $cour_id["CO6"];
}
$sql="SELECT count(c.CO1) as count,avg(c.CO1) as avg1,avg(c.CO2) as avg2,avg(c.CO3) as avg3,avg(c.CO4) as avg4,avg(c.CO5) as avg5,avg(c.CO6) as avg6 from course_end_survey c,course s,course_branch b where b.branch='$branch'and b.sem='$sem'and b.section='$section' and c.course_id='$cid'and c.course_id=b.course_id and c.course_id=s.course_id;";
$result= mysqli_query($conn,$sql);


echo "<table class='w3-table-all w3-round' style='width:80%'>
    <tr class='w3-blue'>
    <td>Fields</td>
    <td>Average</td>
    </tr>";
$count=0;
try{
while($row = mysqli_fetch_array($result)) {
    $count++;
  echo "<tr>";
  echo "<td>" . $coo1. "</td>";
  echo "<td>" . $row['avg1'] . "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>" . $coo2. "</td>";
  echo "<td>" . $row['avg2'] . "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>" . $coo3. "</td>";
  echo "<td>" . $row['avg3'] . "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>" . $coo4. "</td>";
  echo "<td>" . $row['avg4'] . "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>" . $coo5. "</td>";
  echo "<td>" . $row['avg5'] . "</td>";
  echo "</tr>";
   echo "<tr>";
  echo "<td>" . $coo6. "</td>";
  echo "<td>" . $row['avg6'] . "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>" . 'Total Number of Students given'. "</td>";
  echo "<td>" . $row['count'] . "</td>";
}
if($count==0){
    echo "<tr>";
  echo "<td colspan='2'>" . 'No Details' . "</td>";
  
  echo "</tr>";
}
echo "</table>";
echo "<br/>";

echo "<table class='w3-table-all w3-round' style='width:80%'>
    <tr class='w3-blue'>
    <td>rating</td>
    <td>CO1</td>
    <td>CO2</td>
    <td>CO3</td>
    <td>CO4</td>
    <td>CO5</td>
    <td>CO6</td>
    </tr>";

$sql1="select count(CO1) as '5' from course_end_survey where CO1 = '5' and course_id='$cid'";
$result1= mysqli_query($conn,$sql1);
$sql2="select count(CO1) as '4' from course_end_survey where CO1 = '4' and course_id='$cid'";
$result2= mysqli_query($conn,$sql2);
$sql3="select count(CO1) as '3' from course_end_survey where CO1 = '3' and course_id='$cid'";
$result3= mysqli_query($conn,$sql3);
$sql4="select count(CO1) as '2' from course_end_survey where CO1 = '2' and course_id='$cid'";
$result4= mysqli_query($conn,$sql4);
$sql5="select count(CO1) as '1' from course_end_survey where CO1 = '1' and course_id='$cid'";
$result5= mysqli_query($conn,$sql5);
$sql6="select count(CO2) as '5' from course_end_survey where CO2 = '5' and course_id='$cid'";
$result6= mysqli_query($conn,$sql6);
$sql7="select count(CO2) as '4' from course_end_survey where CO2 = '4' and course_id='$cid'";
$result7= mysqli_query($conn,$sql7);
$sql8="select count(CO2) as '3' from course_end_survey where CO2 = '3' and course_id='$cid'";
$result8= mysqli_query($conn,$sql8);
$sql9="select count(CO2) as '2' from course_end_survey where CO2 = '2' and course_id='$cid'";
$result9= mysqli_query($conn,$sql9);
$sql10="select count(CO2) as '1' from course_end_survey where CO2 = '1' and course_id='$cid'";
$result10= mysqli_query($conn,$sql10);
$sql11="select count(CO3) as '5' from course_end_survey where CO3 = '5' and course_id='$cid'";
$result11= mysqli_query($conn,$sql11);
$sql12="select count(CO3) as '4' from course_end_survey where CO3 = '4' and course_id='$cid'";
$result12= mysqli_query($conn,$sql12);
$sql13="select count(CO3) as '3' from course_end_survey where CO3 = '3' and course_id='$cid'";
$result13= mysqli_query($conn,$sql13);
$sql14="select count(CO3) as '2' from course_end_survey where CO3 = '2' and course_id='$cid'";
$result14= mysqli_query($conn,$sql14);
$sql15="select count(CO3) as '1' from course_end_survey where CO3 = '1' and course_id='$cid'";
$result15= mysqli_query($conn,$sql15);
$sql16="select count(CO4) as '5' from course_end_survey where CO4 = '5' and course_id='$cid'";
$result16= mysqli_query($conn,$sql16);
$sql17="select count(CO4) as '4' from course_end_survey where CO4 = '4' and course_id='$cid'";
$result17= mysqli_query($conn,$sql17);
$sql18="select count(CO4) as '3' from course_end_survey where CO4 = '3' and course_id='$cid'";
$result18= mysqli_query($conn,$sql18);
$sql19="select count(CO4) as '2' from course_end_survey where CO4 = '2' and course_id='$cid'";
$result19= mysqli_query($conn,$sql19);
$sql20="select count(CO4) as '1' from course_end_survey where CO4 = '1' and course_id='$cid'";
$result20= mysqli_query($conn,$sql20);
$sql21="select count(CO5) as '5' from course_end_survey where CO5 = '5' and course_id='$cid'";
$result21= mysqli_query($conn,$sql21);
$sql22="select count(CO5) as '4' from course_end_survey where CO5 = '4' and course_id='$cid'";
$result22= mysqli_query($conn,$sql22);
$sql23="select count(CO5) as '3' from course_end_survey where CO5 = '3' and course_id='$cid'";
$result23= mysqli_query($conn,$sql23);
$sql24="select count(CO5) as '2' from course_end_survey where CO5 = '2' and course_id='$cid'";
$result24= mysqli_query($conn,$sql24);
$sql25="select count(CO5) as '1' from course_end_survey where CO5 = '1' and course_id='$cid'";
$result25= mysqli_query($conn,$sql25);
$sql26="select count(CO6) as '5' from course_end_survey where CO6 = '5' and course_id='$cid'";
$result26= mysqli_query($conn,$sql26);
$sql27="select count(CO6) as '4' from course_end_survey where CO6 = '4' and course_id='$cid'";
$result27= mysqli_query($conn,$sql27);
$sql28="select count(CO6) as '3' from course_end_survey where CO6 = '3' and course_id='$cid'";
$result28= mysqli_query($conn,$sql28);
$sql29="select count(CO6) as '2' from course_end_survey where CO6 = '2' and course_id='$cid'";
$result29= mysqli_query($conn,$sql29);
$sql30="select count(CO6) as '1' from course_end_survey where CO6 = '1' and course_id='$cid'";
$result30= mysqli_query($conn,$sql30);
  $row1 = mysqli_fetch_array($result1);
  $row6 = mysqli_fetch_array($result6);
  $row11 = mysqli_fetch_array($result11);
  $row16 = mysqli_fetch_array($result16);
  $row21 = mysqli_fetch_array($result21);
  $row26 = mysqli_fetch_array($result26);
  echo "<tr>";
  echo "<td>" . '5'. "</td>";
  echo "<td>" . $row1['5'] . "</td>";
  echo "<td>" . $row6['5'] . "</td>";
  echo "<td>" . $row11['5'] . "</td>";
  echo "<td>" . $row16['5'] . "</td>";
  echo "<td>" . $row21['5'] . "</td>";
  echo "<td>" . $row26['5'] . "</td>";
  echo "</tr>";
  $row2 = mysqli_fetch_array($result2);
  $row7 = mysqli_fetch_array($result7);
  $row12 = mysqli_fetch_array($result12);
  $row17 = mysqli_fetch_array($result17);
  $row22 = mysqli_fetch_array($result22);
  $row27 = mysqli_fetch_array($result27);
  echo "<tr>";
  echo "<td>" . '4'. "</td>";
  echo "<td>" . $row2['4'] . "</td>";
  echo "<td>" . $row7['4'] . "</td>";
  echo "<td>" . $row12['4'] . "</td>";
  echo "<td>" . $row17['4'] . "</td>";
  echo "<td>" . $row22['4'] . "</td>";
  echo "<td>" . $row27['4'] . "</td>";
  echo "</tr>";
  $row3 = mysqli_fetch_array($result3);
  $row8 = mysqli_fetch_array($result8);
  $row13 = mysqli_fetch_array($result13);
  $row18 = mysqli_fetch_array($result18);
  $row23 = mysqli_fetch_array($result23);
  $row28 = mysqli_fetch_array($result28);
  echo "<tr>";
  echo "<td>" . '3'. "</td>";
  echo "<td>" . $row3['3'] . "</td>";
  echo "<td>" . $row8['3'] . "</td>";
  echo "<td>" . $row13['3'] . "</td>";
  echo "<td>" . $row18['3'] . "</td>";
  echo "<td>" . $row23['3'] . "</td>";
  echo "<td>" . $row28['3'] . "</td>";
  echo "</tr>";
  $row4 = mysqli_fetch_array($result4);
  $row9 = mysqli_fetch_array($result9);
  $row14 = mysqli_fetch_array($result14);
  $row19 = mysqli_fetch_array($result19);
  $row24 = mysqli_fetch_array($result24);
  $row29 = mysqli_fetch_array($result29);
  echo "<tr>";
  echo "<td>" . '2'. "</td>";
  echo "<td>" . $row4['2'] . "</td>";
  echo "<td>" . $row9['2'] . "</td>";
  echo "<td>" . $row14['2'] . "</td>";
  echo "<td>" . $row19['2'] . "</td>";
  echo "<td>" . $row24['2'] . "</td>";
  echo "<td>" . $row29['2'] . "</td>";
  echo "</tr>";
  echo "<tr>";
  $row5 = mysqli_fetch_array($result5);
  $row10 = mysqli_fetch_array($result10);
  $row15 = mysqli_fetch_array($result15);
  $row20 = mysqli_fetch_array($result20);
  $row25 = mysqli_fetch_array($result25);
  $row30 = mysqli_fetch_array($result30);
  echo "<td>" . '1'. "</td>";
  echo "<td>" . $row5['1'] . "</td>";
  echo "<td>" . $row10['1'] . "</td>";
  echo "<td>" . $row15['1'] . "</td>";
  echo "<td>" . $row20['1'] . "</td>";
  echo "<td>" . $row25['1'] . "</td>";
  echo "<td>" . $row30['1'] . "</td>"; 
  echo "</tr>"; 
  echo "</table";  
  /*
  $sql11="select CO1,count(CO1) as count from course_end_survey where course_id='$cid' group by CO1";
  $res11 = mysqli_query($conn,$sql11);
  echo "<div class='w3-third'><table class='w3-table-all w3-round' style='width:10%'>";
  while($row11 = mysqli_fetch_array($res11)){
      echo "<tr class='w3-blue'>";
      echo "<td>".$row11["CO1"]."</td><td>".$row11["count"]."</td><br>";
      echo "</tr>"; 
  }
  echo "</table>"; 
   
  $sql11="select CO2,count(CO2) as count from course_end_survey where course_id='$cid' group by CO2";
  $res11 = mysqli_query($conn,$sql11);
  echo "<table class='w3-table-all w3-round' style='width:10%'>";
  while($row11 = mysqli_fetch_array($res11)){
      echo "<tr class='w3-blue'>";
      echo "<td>".$row11["CO2"]."</td><td>".$row11["count"]."</td><br>";
      echo "</tr>"; 
  }
  echo "</table>";
  echo "</div>";
  */
  
}
catch(TypeError $ex)
    {
        echo $ex->getMessage();
    }
?>

<?php

//echo "<button class='w3-btn w3-black' onclick=window.location.href='display.php'>";
//echo "Next";
//echo "</button>";
mysqli_close($conn);


?>
   



</body>
</html>
