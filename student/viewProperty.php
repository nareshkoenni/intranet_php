<?php
    if( (!isset($_SESSION)) ) // if the session is no  set then start to new session
    {
         session_start();
    }
    if(($_SESSION["uname"]!="")){
         
     
?>

<?php require './sidebar.php'; ?>
<br>

    
<?php include 'dbcon.php';?>		

<?php  
error_reporting(0);
      $id=$_GET["id"]/78567543478345433;
   $sql = "SELECT * from Property p,Customer c,creditor cr where p.Customer_ID=c.Customer_ID and p.creditor_ID=cr.creditor_id  and p.Property_ID=$id";
    
    $result1 = mysqli_query($conn, $sql);
   // echo mysqli_error($conn);
    
    while($row = mysqli_fetch_assoc($result1)) {  
   ?>
    <div class="w3-main w3-container" style="margin-left:250px;">
        <div class="w3-container w3-center w3-green">
            <h4><?php echo $id ;?>-<?php echo $row["Village_TSNo"] ;?>-<?php echo $row["Customer_Name"] ;?>-<?php echo $row["mobile_number"] ;?></h4>
        </div>
        
            <div class="w3-mobile w3-hover-text-green" >
                <label>Customer Name:</label>
                <?php echo $row["Customer_Name"] ;?>
            </div>
            
            <div class=" w3-mobile w3-hover-text-green" >
                <label>Customer Address:</label>
                <?php echo $row["Address"] ;?>
            </div>
            <div class="w3-mobile w3-hover-text-green" >
                <label>Customer Mobile Number:</label>
                <?php echo $row["mobile_number"] ;?>
            </div>
            <div class="w3-mobile w3-hover-text-green">
                <label>Creditor name:</label>
                <?php echo $row["area"] ;?>-<?php echo $row["creditor_name"] ;?>
            </div>   
            <!--
            <div class="w3-mobile w3-hover-text-green" >
                <label>sdfsdf</label>
                <input class="w3-input" type="text" name="" required="">
            </div>
            <div class=" w3-mobile w3-hover-text-green" >
                <label>sdfsdf</label>
                <input class="w3-input" type="text" name="" required="">
            </div> -->
            <div class="w3-mobile w3-hover-text-green">
                <label>Property Type:</label>
                <?php echo $row["Property_Type"] ;?>
            </div>
            <div class=" w3-mobile w3-hover-text-green">
                <label>Area Type:</label>
                <?php echo $row["Property_Area_Type"] ;?>
            
            </div>
            <div class=" w3-mobile w3-hover-text-green">
                <label>Plot Survey_No:</label>
                <?php echo $row["Plot_Survey_No"] ;?>
            </div>
             
             <div class=" w3-mobile w3-hover-text-green" >
                <label>Distirct</label>
                <?php echo $row["district"] ;?>
            </div>
            
            <div class=" w3-mobile w3-hover-text-green" >
                <label>Mandal:</label>
                <?php echo $row["Mandal"] ;?>
            </div>
           
            <div class="w3-mobile w3-hover-text-green" >
                <label>Village/TSNo:</label>
                <?php echo $row["Village_TSNo"] ;?>
            </div>
            <div class="w3-mobile w3-hover-text-green" >
                <label>Pincode:</label>
                <?php echo $row["PINCODE"] ;?>
            </div>
             <div class="w3-mobile w3-hover-text-green" >
                <label>Google Coordinates:</label>
                <?php echo $row["google_coordinates"] ;?>
            </div>
            <div class="w3-mobile w3-hover-text-green">
                <label>Area Category:</label>				
                <?php echo $row["Property_Area_Category"] ;?>
            </div>
            <div class="w3-mobile w3-hover-text-green">
                <label>Area Circle:</label>
                <?php echo $row["Property_area_circle"] ;?>
            </div>
           
            <div class=" w3-mobile w3-hover-text-green" >
                <label>Total Site Extent:</label>
                <?php echo $row["total_site_extent"] ;?>
            </div>
            <div class=" w3-mobile w3-hover-text-green" >
                <label>Road Effected Area:</label>
               <?php echo $row["road_effected_area"] ;?> 
            </div>
            <div class="w3-mobile w3-hover-text-green" >
                <label>Extent for Valuation:</label>
                <?php echo $row["extent_for_valuation"] ;?>
            </div>
            <div class=" w3-mobile w3-hover-text-green" >
                <label>Occupancy Info:</label>
                <?php echo $row["occupancy_info"] ;?>
            </div>
            <br><br><br>
            
            &nbsp;
            
            <div class="w3-mobile" >
                <table class="w3-table w3-left w3-half w3-border    w3-border-bottom w3-border-top">
                    <thead>
                      <tr class="w3-light-grey w3-mobile w3-hover-text-green">
                        <th>Boundaries of the Land</th>
                        <th>A.As per the Deed</th>
                        <th>B.As Per Existing</th>
                      </tr>
                    </thead>
                    <tr class="w3-mobile w3-hover-text-green">
                        <td>North</td>
                        <td><input class="w3-input" type="text" name="bound_north_actual" required></td>
                        <td><input class="w3-input" type="text" name="bound_north_existing" required></td>
                    </tr>
                    <tr class="w3-mobile w3-hover-text-green">
                        <td>South</td>
                        <td><input class="w3-input" type="text" name="bound_south_actual" required></td>
                        <td><input class="w3-input" type="text" name="bound_south_existing" required></td>
                    </tr>
                    <tr class="w3-mobile w3-hover-text-green">
                        <td>East</td>
                        <td><input class="w3-input" type="text" name="bound_east_actual" required></td>
                        <td><input class="w3-input" type="text" name="bound_east_existing" required></td>
                    </tr>
                    <tr class="w3-mobile w3-hover-text-green">
                        <td>West</td>
                        <td><input class="w3-input" type="text" name="bound_west_actual" required></td>
                        <td><input class="w3-input" type="text" name="bound_west_existing" required></td>
                    </tr>

                </table>    
                <table class="w3-table w3-right w3-half w3-border   w3-border-bottom">
                    <thead>
                      <tr class="w3-light-grey w3-mobile w3-hover-text-green">
                        <th>Dimensions of the Property</th>
                        <th>A.As per the Deed</th>
                        <th>B.As Per Existing</th>
                      </tr>
                    </thead>
                    <tr class="w3-mobile w3-hover-text-green">
                        <td>North</td>
                        <td><input class="w3-input" type="text" name="dim_north_actual" required></td>
                        <td><input class="w3-input" type="text" name="dim_north_existing" required></td>
                    </tr>
                    <tr class="w3-mobile w3-hover-text-green">
                        <td>South</td>
                        <td><input class="w3-input" type="text" name="dim_south_actual" required></td>
                        <td><input class="w3-input" type="text" name="dim_south_existing" required></td>
                    </tr>
                    <tr class="w3-mobile w3-hover-text-green">
                        <td>East</td>
                        <td><input class="w3-input" type="text" name="dim_east_actual" required></td>
                        <td><input class="w3-input" type="text" name="dim_east_existing" required></td>
                    </tr>
                    <tr class="w3-mobile w3-hover-text-green">
                        <td>West</td>
                        <td><input class="w3-input" type="text" name="dim_west_actual" required></td>
                        <td><input class="w3-input" type="text" name="dim_west_existing" required></td>
                    </tr>

                </table>        
            </div>     
           
           
            
        </div>
        
        

    </form>    
    
</div>

<br>
<div class="w3-bar w3-main  w3-center" style="margin-left:250px;">
  <a href="#" class="w3-button w3-hover-purple">«</a>
  <a href="#" class="w3-button w3-hover-green">1</a>
  <a href="#" class="w3-button w3-hover-red">2</a>
  <a href="#" class="w3-button w3-hover-blue">3</a>
  <a href="#" class="w3-button w3-hover-purple">4</a>
  <a href="#" class="w3-button w3-hover-red">5</a>
  <a href="#" class="w3-button w3-hover-black">6</a>
  <a href="#" class="w3-button w3-hover-orange">»</a>
</div>
<br><br><br>
    
<?php require './footer.php'; ?>


     
</body>
</html> 
<?php
    mysqli_close($conn);
    }
}else{
    echo header("Location:http://localhost:8887/propvaluer");
}
?>