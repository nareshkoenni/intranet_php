<?php
session_start();// Starting Session
?>
<?php
    include '../dbcon.php';
    $rollnumber = filter_input(INPUT_POST,"rollnumber");
    $course_id=filter_input(INPUT_POST,"course_id");
    $ch = "SELECT * FROM course_end_survey WHERE rollnumber='".$rollnumber."' and course_id='".$course_id."'";
    $res = mysqli_query($conn, $ch);
    if(mysqli_num_rows($res)>0){  
        echo "<script>alert('Submission  Fail - Already Submitted-$rollnumber-$course_id');window.location = 'ces.php'</script>";
    }else{
        $co1=filter_input(INPUT_POST,"co1");
        $co2=filter_input(INPUT_POST,"co2");
        $co3=filter_input(INPUT_POST,"co3");
        $co4=filter_input(INPUT_POST,"co4");
        $co5=filter_input(INPUT_POST,"co5");
        $co6=filter_input(INPUT_POST,"co6");
        if($co1===""){  
            echo "<script>alert('Submission  Fail - Please try again');window.location = 'ces.php'</script>"; 
        }else{
            try{
            $sql="INSERT INTO course_end_survey(rollnumber,course_id,co1,co2,co3,co4,co5,co6) VALUES (?,?,?,?,?,?,?,?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ssiiiiii",$rollnumber,$course_id,$co1,$co2,$co3,$co4,$co5,$co6);  
            if(mysqli_stmt_execute($stmt)){
            //  $last_id = mysqli_insert_id($conn);
            // echo "the id is".$last_id;
            echo "<script>alert('Submitted Successfully');window.location = 'ces.php'</script>"; 
            }
            }
            catch(TypeError $ex)
            {
                echo $ex->getMessage();
            }
        }
            echo mysqli_error($conn);
                  
    }        
            mysqli_close($conn);
?>