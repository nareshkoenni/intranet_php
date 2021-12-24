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
$course=$_GET["course"];
$sem=$_GET["sem"];

$sql="SELECT p.co1,p.co2,p.co3,p.co4,p.co5,p.co6 from course p,course_branch q where q.sem = '".$sem."' and p.course_name='".$course."'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)) {
//<form class="w3-panel w3-card-4" action="addCes.php" method="post">
?>	
<?php  
//        error_reporting(0);
//        $sql5 = "select p.co1,p.co2,p.co3,p.co4,p.co5,p.co6 from course p";
//        $result5 = mysqli_query($conn, $sql5);
//        while($row5 = mysqli_fetch_assoc($result5)) {
echo "<form class='w3-panel w3-card-7' action='addCes.php' method='post'>";
echo "<input type='hidden' value='$course' name='course'>";
echo "<table class='w3-table-all w3-round'>
<tr>
    <td colspan='20'>
<center><b>Evaluation of Course Outcomes</b></center>
    </td>
</tr>

<tr>
    <td><b>O.No</b></td>
    <td><b>Outcomes</b></td>
    <td><b>Strongly Disagree</b></td>
    <td><b>Disagree</b></td>
    <td><b>Neutral</b></td>
    <td><b>Agree</b></td>
    <td><b>Strongly Agree</b></td>
</tr>

<tr>
    <td>1</td>
    <td>".$row["co1"]."</td>  
    <td><input type='radio' name='co1' value='5'></td>
    <td><input type='radio' name='co1' value='4'></td>
    <td><input type='radio' name='co1' value='3'></td>
    <td><input type='radio' name='co1' value='2'></td>
    <td><input type='radio' name='co1' value='1'></td>
</tr>
  
<tr>
<td>2</tb>
<td>".$row["co2"]."</td> 
<td><input type='radio' name='co2' value='5'></td>
<td><input type='radio' name='co2' value='4'></td>
<td><input type='radio' name='co2' value='3'></td>
<td><input type='radio' name='co2' value='2'></td>
<td><input type='radio' name='co2' value='1'></td>
</tr>

<tr>
<td>3</td>
<td>".$row["co3"]."</td>
<td><input type='radio' name='co3' value='5'></td>
    <td><input type='radio' name='co3' value='4'></td>
    <td><input type='radio' name='co3' value='3'></td>
    <td><input type='radio' name='co3' value='2'></td>
    <td><input type='radio' name='co3' value='1'></td>
</tr>

<tr>
<td>4</td>
<td>".$row["co4"]."</td> 
<td><input type='radio' name='co4' value='5'></td>
    <td><input type='radio' name='co4' value='4'></td>
    <td><input type='radio' name='co4' value='3'></td>
    <td><input type='radio' name='co4' value='2'></td>
    <td><input type='radio' name='co4' value='1'></td>
</tr>

<tr>
<td>5</td>
<td>".$row["co5"]."</td> 
<td><input type='radio' name='co5' value='5'></td>
    <td><input type='radio' name='co5' value='4'></td>
    <td><input type='radio' name='co5' value='3'></td>
    <td><input type='radio' name='co5' value='2'></td>
    <td><input type='radio' name='co5' value='1'></td>
</tr>

<tr>
<td>6</td>
<td>".$row["co6"]."</td>
<td><input type='radio' name='co6' value='5'></td>
    <td><input type='radio' name='co6' value='4'></td>
    <td><input type='radio' name='co6' value='3'></td>
    <td><input type='radio' name='co6' value='2'></td>
    <td><input type='radio' name='co6' value='1'></td>
</tr>";

 }
 mysqli_close($conn);
                     
?>
    </table>
</form>

</div>
    

<div>

<br><br>
<button type="submit">Submit</button>
</div>

</body>
</html>