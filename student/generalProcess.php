<?php
session_start();// Starting Session
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
    </head>
    <body>
        <?php
            $customer_name=$_POST["customer_name"];
            $customer_address=$_POST["customer_address"];
            $mobile_number=$_POST["mobile_number"];
            
            $creditor_id=$_POST["creditor_id"];
            
            $Property_Type=$_POST["Property_Type"];
            $Property_Area_Type=$_POST["Property_Area_Type"];
            $Plot_Survey_No=$_POST["Plot_Survey_No"];
            $district=$_POST["district"];
            $Mandal=$_POST["Mandal"];
            $Village_TSNo=$_POST["Village_TSNo"];
            $pincode=$_POST["pincode"];
            $google_coordinates=$_POST["google_coordinates"];
            $Property_Area_Category=$_POST["Property_Area_Category"];
            $Property_area_circle=$_POST["Property_area_circle"];
            $total_site_extent=$_POST["total_site_extent"];
            $road_effected_area=$_POST["road_effected_area"];
            $extent_for_valuation=$_POST["extent_for_valuation"];
            $occupancy_info=$_POST["occupancy_info"];
          
            $bound_north_actual=$_POST["bound_north_actual"];
            $bound_north_existing=$_POST["bound_north_existing"];
            $bound_south_actual=$_POST["bound_south_actual"];
            $bound_south_existing=$_POST["bound_south_existing"];
            $bound_east_actual=$_POST["bound_east_actual"];
            $bound_east_existing=$_POST["bound_east_existing"];
            $bound_west_actual=$_POST["bound_west_actual"];
            $bound_west_existing=$_POST["bound_west_existing"];
            $dim_north_actual=$_POST["dim_north_actual"];
            $dim_north_existing=$_POST["dim_north_existing"];
            $dim_south_actual=$_POST["dim_south_actual"];
            $dim_south_existing=$_POST["dim_south_existing"];
            $dim_east_actual=$_POST["dim_east_actual"];
            $dim_east_existing=$_POST["dim_east_existing"];
            $dim_west_actual=$_POST["dim_west_actual"];
            $dim_west_existing=$_POST["dim_west_existing"];  
         /*   $north=$_POST["north"];
            $south=$_POST["south"];
            $east=$_POST["east"];
            $west=$_POST["west"];  */
            
            
           
           if($_POST["Property_Area_Type"]=="" && $_POST["Plot_Survey_No"]==""){  
                 echo "<script>alert('Registration  Fail - Please try again');window.location = 'home.php'</script>"; 
           }else{
                  $sql1="insert into customer (Customer_Name,Address,mobile_number) values(?,?,?)";
                  include 'dbcon.php';
                  $stmt1 = mysqli_prepare($conn, $sql1);
                  mysqli_stmt_bind_param($stmt1, "sss", $customer_name,$customer_address,$mobile_number);  
                  //echo "ERROR: Could not execute query: $sql1. " . mysqli_error($conn);
                   //echo "<script>alert('Registration is Successful');window.location = 'users.php'</script>"; 
                  $check1=mysqli_stmt_execute($stmt1);
                  $last_customer_id = mysqli_insert_id($conn);
                  mysqli_close($conn);     
                     
                  
$sql2="INSERT INTO Property(Property_Type,Plot_Survey_No,district,Mandal,Village_TSNo,PINCODE,Property_Area_Type,Property_Area_Category,Property_area_circle,google_coordinates,total_site_extent,road_effected_area,extent_for_valuation,occupancy_info,Customer_ID,creditor_ID) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                 // $conn1 = mysqli_connect("127.0.0.1:8889", "root", "root", "valuation");
                  $conn1 = mysqli_connect("127.0.0.1:8889", "root", "root", "valuation");  
                  $stmt2 = mysqli_prepare($conn1, $sql2);
                  mysqli_stmt_bind_param($stmt2, "ssssssssssssssii",$Property_Type,$Plot_Survey_No,$district,$Mandal,$Village_TSNo,$pincode,$Property_Area_Type,$Property_Area_Category,$Property_area_circle,$google_coordinates,$total_site_extent,$road_effected_area,$extent_for_valuation,$occupancy_info,$last_customer_id,$creditor_id);  
                 // echo "ERROR: Could not execute query: $sql2. " . mysqli_error($conn1);
                  $check2=mysqli_stmt_execute($stmt2);
                  $last_property_id = mysqli_insert_id($conn1);
                  
                  $sql3="INSERT INTO dimension_boundary(direction,dimension_deed,dimension_existing,boundary_deed,boundary_existing,Property_ID) values(?,?,?,?,?,?)";
                  $stmt3 = mysqli_prepare($conn1, $sql3);
                  $direction=array("North","South","East","West");
                 // for($i=0; $i<count($direction);$i++){
                  mysqli_stmt_bind_param($stmt3, "sssssi",$direction[0],$bound_north_actual,$bound_north_existing,$dim_north_actual,$dim_north_existing,$last_property_id);  
                  mysqli_stmt_execute($stmt3);
                  mysqli_stmt_bind_param($stmt3, "sssssi",$direction[1],$bound_south_actual,$bound_south_existing,$dim_south_actual,$dim_south_existing,$last_property_id);  
                  mysqli_stmt_execute($stmt3);
                  mysqli_stmt_bind_param($stmt3, "sssssi",$direction[2],$bound_east_actual,$bound_east_existing,$dim_east_actual,$dim_east_existing,$last_property_id);  
                  mysqli_stmt_execute($stmt3);
                  mysqli_stmt_bind_param($stmt3, "sssssi",$direction[3],$bound_west_actual,$bound_west_existing,$dim_west_actual,$dim_west_existing,$last_property_id);  
                  mysqli_stmt_execute($stmt3);
                 // }
                 // echo "ERROR: Could not execute query: $sql3. " . mysqli_error($conn1);
                  echo "<script>alert('Registration is Successful');window.location = 'dashboard.php'</script>"; 
                  mysqli_close($conn1);     
                  
                  
                  
                  
            }
        ?>
    </body>
</html>
