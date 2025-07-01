<?php
include '../dbcon.php';
if(!empty($_GET['branch'])) {
        $section = $_GET["section_id"]; 
        $branch = $_GET["branch"]; 
        $sem = $_GET["sem"];
        $batch = substr($_GET["batch"], 0, 2);
        if($batch=='17'){
            $batch='16';  //regular
            if(substr($_SESSION["uname"], 4,1)=="5"){ //les
        	   $batch='16';
        	}
        }
       
        if($batch=='18'){
            $batch='18';
            if(substr($_SESSION["uname"], 4,1)=="5"){
        	  $batch='16';
        	}
        }
        if($batch=='19'){
            $batch='18';
            if(substr($_SESSION["uname"], 4,1)=="5"){
        	   $batch='18';
        	}
        }
        if($batch=='20'){
            $batch='18';
            if(substr($_SESSION["uname"], 4,1)=="5"){
        	   $batch='18';
        	}
        }
        if($batch=='21'){
            $batch='18';
            if(substr($_SESSION["uname"], 4,1)=="5"){
        	   $batch='18';
        	}
        }
        if($batch=="22"){
            $batch="22";
            if(substr($_SESSION["uname"], 4,1)=='5'){
        	   $batch="18";
            }
        }
        if($batch=='23'){
            $batch='23';
            if(substr($_SESSION["uname"], 4,1)=="5"){
        	   $batch='22';
        	}
        }
        if($batch=='24'){
            $batch='23';
            if(substr($_SESSION["uname"], 4,1)=="5"){
        	   $batch='23';
        	}
        }
    	 $query ="select b.course_id as name from course_branch b where b.branch='$branch' and b.section='$section' and b.sem='$sem' and b.regulation='$batch' order by b.course_id desc";
        if($section==null){
            $query ="select distinct b.course_id as name from course_branch b where b.branch='$branch' and b.sem='$sem' and b.regulation='$batch' order by b.course_id desc";
        }
        if($branch=="All"){
            $query ="select distinct b.course_id as name from course_branch b where b.sem='$sem' and b.regulation='$batch' order by b.course_id desc";
        }
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