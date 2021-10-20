<?php
session_start();// Starting Session

            $Property_ID=$_POST["Property_ID"];
            $Surrounding_area=$_POST["Surrounding_area"];
            $Possibility_of_Floods=$_POST["Possibility_of_Floods"];
            $Civic_Emeniities=$_POST["Civic_Emeniities"];
            $Land_topographical_Conditions=$_POST["Land_topographical_Conditions"];
            $Land_Utilization_Type=$_POST["Land_Utilization_Type"];
            $plot_type=$_POST["plot_type"];
            $Road_facility=$_POST["Road_facility"];
            $Land_Shape=$_POST["Land_Shape"];
            $Usage_restrictions=$_POST["Usage_restrictions"];
            $Is_in_planning_layout_area=$_POST["Is_in_planning_layout_area"];
            $Type_of_Road=$_POST["Type_of_Road"];
            $Width_of_Road=$_POST["Width_of_Road"];
            $Locked_land_Status=$_POST["Locked_land_Status"];
            $Water_potentiality=$_POST["Water_potentiality"];
            $Underground_sewerage=$_POST["Underground_sewerage"];
            $Power_Supply=$_POST["Power_Supply"];
            $Advantage=$_POST["Advantage"];
            $Remarks=$_POST["Remarks"];
            
           if($_POST["Property_ID"]=="" && $_POST["Surrounding_area"]==""){  
                 echo "<script>alert('Registration  Fail - Please try again');window.location = 'characteristics.php'</script>"; 
           }else{
                  $sql1="insert into characteristics(Surrounding_area,Possibility_of_Floods,Civic_Emeniities,Land_topographical_Conditions,Land_Utilization_Type,plot_type,Road_facility,Land_Shape,Usage_restrictions,Is_in_planning_layout_area,Type_of_Road,Width_of_Road,"
. "Locked_land_Status,Water_potentiality,Underground_sewerage,Power_Supply,Advantage,Remarks,Property_ID) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                  include 'dbcon.php';
                  $stmt1 = mysqli_prepare($conn, $sql1);
                  mysqli_stmt_bind_param($stmt1, "ssssssssssssssssssi", $Surrounding_area,$Possibility_of_Floods,$Civic_Emeniities,$Land_topographical_Conditions,
   $Land_Utilization_Type,$plot_type,$Road_facility,$Land_Shape,$Usage_restrictions,$Is_in_planning_layout_area,$Type_of_Road,$Width_of_Road,
   $Locked_land_Status,$Water_potentiality,$Underground_sewerage,$Power_Supply,$Advantage,$Remarks,$Property_ID);  
                  //echo "ERROR: Could not execute query: $sql1. " . mysqli_error($conn);
                   //echo "<script>alert('Registration is Successful');window.location = 'users.php'</script>"; 
                 // echo "ERROR" . mysqli_error($conn);
                 
                  if(mysqli_stmt_execute($stmt1)){
                      echo "<script>alert('Registration is Successful');window.location = 'dashboard.php'</script>"; 
                   }
                 // $last_customer_id = mysqli_insert_id($conn);
                   echo '4';
                  mysqli_close($conn);     
                     
            }
        ?>
    </body>
</html>
