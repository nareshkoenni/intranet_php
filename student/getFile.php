<?php
         session_start();
    //$_SESSION["uname"];

?>
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

<div id="txtHint">
<?php
include '../dbcon.php';

$course=$_GET["course"];
$cou="select c.course_id from course c where c.course_name='$course'";
$res = mysqli_query($conn,$cou);
$cour_id = mysqli_fetch_array($res);
$cid = $cour_id["course_id"];
$sql="SELECT p.CO1,p.CO2,p.CO3,p.CO4,p.CO5,p.CO6 from course p where p.course_name = '$course'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
echo "<form class='w3-panel w3-card-7' action='addCes.php' method='post'>";
echo "<input type='hidden' value='$cid' name='course_id'>";
echo "<label><b>Roll Number</b></label>";
$uname=strtok($_SESSION["uname"],'@');
echo "<input class='w3-input w3-border w3-margin-bottom' type='text' maxlength='10' name='rollnumber' value='$uname' required='required' readonly>";
echo "<table class='w3-table-all w3-round'>
<tr>
    <td colspan='20' class='w3-center w3-text-blue'>
<center><b> Evaluation of $course Course Outcomes</b></center>
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
    <td>$row[CO1]</td>  
    <td><input type='radio' name='co1' value='1' required></td>
    <td><input type='radio' name='co1' value='2' required></td>
    <td><input type='radio' name='co1' value='3' required></td>
    <td><input type='radio' name='co1' value='4' required></td>
    <td><input type='radio' name='co1' value='5' required></td>
</tr>
  
<tr>
<td>2</tb>
<td>$row[CO2]</td> 
<td><input type='radio' name='co2' value='1' required></td>
<td><input type='radio' name='co2' value='2' required></td>
<td><input type='radio' name='co2' value='3' required></td>
<td><input type='radio' name='co2' value='4' required></td>
<td><input type='radio' name='co2' value='5' required></td>
</tr>

<tr>
<td>3</td>
<td>$row[CO3]</td>
<td><input type='radio' name='co3' value='1' required></td>
    <td><input type='radio' name='co3' value='2' required></td>
    <td><input type='radio' name='co3' value='3' required></td>
    <td><input type='radio' name='co3' value='4' required></td>
    <td><input type='radio' name='co3' value='5' required></td>
</tr>

<tr>
<td>4</td>
<td>$row[CO4]</td> 
<td><input type='radio' name='co4' value='1' required></td>
    <td><input type='radio' name='co4' value='2' required></td>
    <td><input type='radio' name='co4' value='3' required></td>
    <td><input type='radio' name='co4' value='4' required></td>
    <td><input type='radio' name='co4' value='5' required></td>
</tr>";
 if(!strpos(strtoupper($cid), strtoupper("Lab")) !==false){
echo "<tr>
<td>5</td>
<td>$row[CO5]</td> 
<td><input type='radio' name='co5' value='1' required></td>
    <td><input type='radio' name='co5' value='2' required></td>
    <td><input type='radio' name='co5' value='3' required></td>
    <td><input type='radio' name='co5' value='4' required></td>
    <td><input type='radio' name='co5' value='5' required></td>
</tr>

<tr>
<td>6</td>
<td>$row[CO6]</td>
<td><input type='radio' name='co6' value='1' required></td>
    <td><input type='radio' name='co6' value='2' required></td>
    <td><input type='radio' name='co6' value='3' required></td>
    <td><input type='radio' name='co6' value='4' required></td>
    <td><input type='radio' name='co6' value='5' required></td>
</tr>";
}
?>
</div>
    <div >
</table>
<br><br>
<button type="submit" class="w3-button w3-center w3-green w3-round-xlarge">Submit</button>
</div>
 
</form>

</body>
</html>