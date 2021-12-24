<?php
include '../dbcon.php';
if(!empty($_GET['branch_id'])) {
        $branch = $_GET["branch_id"]; 
        $sem = $_GET["sem"];
	$query ="select c.course_name as name from course c,course_branch b where b.branch='$branch' and b.sem='$sem' ;";
	$results = mysqli_query($conn,$query);
?>
	<option value="">Select Course</option>
<?php
	foreach($results as $cour) {
?>
	<option value="<?php echo $cour["name"]; ?>"><?php echo $cour["name"]; ?></option>
<?php
	}
}
?>