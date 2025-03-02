<?php
include '../dbcon.php';
if(!empty($_GET['section_id'])) {
        $section = $_GET["section_id"]; 
        $branch = $_GET["branch"]; 
        $sem = $_GET["sem"];
        $batch = substr($_GET["batch"], 0, 2);
        if($batch=='17'){
            $batch='16';
            if(substr($_GET["batch"], -6,1)=="5"){
        	   $batch='16';
        	}
        }
        if($batch=='18'){
            $batch='18';
            if(substr($_GET["batch"], -6,1)=="5"){
        	  $batch='16';
        	}
        }
        if($batch=='19'){
            $batch='18';
            if(substr($_GET["batch"], -6,1)=="5"){
        	   $batch='18';
        	}
        }
        if($batch=='20'){
            $batch='18';
            if(substr($_GET["batch"], -6,1)=="5"){
        	   $batch='18';
        	}
        }
        if($batch=='21'){
            $batch='18';
            if(substr($_GET["batch"], -6,1)=="5"){
        	   $batch='18';
        	}
        }
        if($batch=='22'){
            $batch='22';
            if(substr($_GET["batch"], -6,1)=="5"){
        	   $batch='18';
        	}
        }
        if($batch=='23'){
            $batch='23';
            if(substr($_GET["batch"], -6,1)=="5"){
        	   $batch='22';
        	}
        }
        
    	 $query ="select b.course_id as name from course_branch b where b.branch='$branch' and b.section='$section' and b.sem='$sem' and b.regulation='$batch' order by b.course_id desc";
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