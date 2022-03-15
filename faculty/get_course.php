<?php
include '../dbcon.php';
if(!empty($_GET['section_id'])) {
        $section = $_GET["section_id"]; 
        $branch = $_GET["branch"]; 
        $sem = $_GET["sem"];
	//$query ="select c.course_name as name from course c,course_branch b where b.branch='$branch' and b.section='$section' and b.sem='$sem' and c.course_id=b.course_id";
	$query ="select b.course_id as name from course_branch b where b.branch='$branch' and b.section='$section' and b.sem='$sem'";
        $result = mysqli_query($conn,$query);
?>
	<option value="">Select Course</option>
<?php
	foreach($result as $cour) {
?>
	<option value="<?php echo $cour["name"]; ?>"><?php echo $cour["name"]; ?></option>
<?php
	}
}
?>