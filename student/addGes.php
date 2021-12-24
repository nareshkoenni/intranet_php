<?php
session_start();// Starting Session
?>
<?php
    
        $rollnumber = filter_input(INPUT_POST, "rollnumber");           
        $placement_info=filter_input(INPUT_POST, "placement_info");
        $higher_studies_test=filter_input(INPUT_POST,"higher_studies_test");
        $higher_studies_score=filter_input(INPUT_POST,"higher_studies_score");
        $pg_admission_det=filter_input(INPUT_POST,"pg_admission_det");
        //$pe1=filter_input(INPUT_POST,"pe1");
        $pe1=$_POST["pe1"];
        /*
        $pe2=filter_input(INPUT_POST,"pe2");
        $pe3=filter_input(INPUT_POST,"pe3");
        $pe4=filter_input(INPUT_POST,"pe4");
        $pe5=filter_input(INPUT_POST,"pe5");
        $pe6=filter_input(INPUT_POST,"pe6");
        $pe7=filter_input(INPUT_POST,"pe7");
        $pe8=filter_input(INPUT_POST,"pe8");  */
        $pe2=$_POST["pe2"];
        $pe3=$_POST["pe3"];
        $pe4=$_POST["pe4"];
        $pe5=$_POST["pe5"];
        $pe6=$_POST["pe6"];
        $pe7=$_POST["pe7"];
        $pe8=$_POST["pe8"];
        
        $suggestions=filter_input(INPUT_POST,"suggestions");
        $training_program=filter_input(INPUT_POST,"training_program");
        $workshop=filter_input(INPUT_POST,"workshop");
        $sports=filter_input(INPUT_POST,"sports");
        $achievement=filter_input(INPUT_POST,"achievement");
        $bvrith_pickedup=filter_input(INPUT_POST,"bvrith_pickedup");
        $bvrith_like_most=filter_input(INPUT_POST,"bvrith_like_most");
        $principal=filter_input(INPUT_POST,"principal");
        $hod=filter_input(INPUT_POST,"hod");
        $teaching=filter_input(INPUT_POST,"teaching");
        $non_teaching=filter_input(INPUT_POST,"non_teaching");
        $amenties=filter_input(INPUT_POST,"amenties");
        $library=filter_input(INPUT_POST,"library");
        $labs=filter_input(INPUT_POST,"labs");
        $exam_cell=filter_input(INPUT_POST,"exam_cell");
        $administration=filter_input(INPUT_POST,"administration");
        $training_placement=filter_input(INPUT_POST,"training_placement");
        $discipline=filter_input(INPUT_POST,"discipline");
        $ambience=filter_input(INPUT_POST,"ambience");
        $classrooms=filter_input(INPUT_POST,"classrooms");
        $medical_facililty=filter_input(INPUT_POST,"medical_facililty");
        $overall=filter_input(INPUT_POST,"overall");
        $improvements=filter_input(INPUT_POST,"improvements");
        $survey_date=filter_input(INPUT_POST,"survey_date");
        
      
           
           include 'dbcon.php';
           $ch = "SELECT * FROM ges WHERE rollnumber='".$rollnumber."'";
           $res = mysqli_query($conn, $ch);
           if(mysqli_num_rows($res)>0){  
                 echo "<script>alert('Submission  Fail - Already Submitted-$rollnumber');window.location = 'ges.php'</script>"; 
           }else{
               try{
                   		
                 
                  
                  $sql="INSERT INTO ges(rollnumber,placement_info,higher_studies_test,higher_studies_score,pg_admission_det,pe1,pe2,pe3,pe4,pe5,pe6,pe7,pe8,suggestions,training_program,workshop,sports,achievement,bvrith_pickedup,bvrith_like_most,principal,hod,teaching,non_teaching,amenties,library,labs,exam_cell,administration,training_placement,discipline,ambience,classrooms,medical_facililty,overall,improvements,survey_date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                  $stmt = mysqli_prepare($conn, $sql);
                  mysqli_stmt_bind_param($stmt, "sssssiiiiiiiissssssssssssssssssssssss",$rollnumber,$placement_info,$higher_studies_test,$higher_studies_score,$pg_admission_det,$pe1,$pe2,$pe3,$pe4,$pe5,$pe6,$pe7,$pe8,$suggestions,$training_program,$workshop,$sports,$achievement,$bvrith_pickedup,$bvrith_like_most,$principal,$hod,$teaching,$non_teaching,$amenties,$library,$labs,$exam_cell,$administration,$training_placement,$discipline,$ambience,$classrooms,$medical_facililty,$overall,$improvements,$survey_date );  
                  if(mysqli_stmt_execute($stmt)){
                     //  $last_id = mysqli_insert_id($conn);
                      // echo "the id is".$last_id;
                    echo "<script>alert('Submitted Successfully');window.location = 'ges.php'</script>"; 
                  }
               }
               catch(TypeError $ex)
               {
                   echo $ex->getMessage();
               }
           }
                  echo mysqli_error($conn);
                  
                 mysqli_close($conn);
       
            
     
           
?>
