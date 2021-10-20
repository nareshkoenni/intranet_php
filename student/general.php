<?php
    if( (!isset($_SESSION)) ) // if the session is no  set then start to new session
    {
         session_start();
    }
    if(($_SESSION["uname"]!="")){
    
?>

<?php require './sidebar.php'; ?>
<br>


<div class="w3-main w3-container" style="margin-left:250px;">
    <form class="w3-card" action="generalProcess.php" method="post">
        <div class="w3-container w3-center w3-green">
            <h4>New Property-General</h4>
        </div>
        <div class="w3-row-padding">
        <div class="w3-third w3-mobile w3-hover-text-green" >
                <label>Customer Name</label>
                <input class="w3-input" type="text" name="customer_name" required="">
            </div>
            
            <div class="w3-third w3-mobile w3-hover-text-green" >
                <label>Customer Address</label>
                <input class="w3-input" type="text" name="customer_address" required="">
            </div>
            <div class="w3-third w3-mobile w3-hover-text-green" >
                <label>Customer Mobile Number</label>
                <input class="w3-input" type="text" name="mobile_number" required="">
            </div>
            <div class="w3-third w3-mobile w3-hover-text-green">
                <label>Creditor name</label>
                <select class="w3-select" name="creditor_id" required="">
                    <option value="" disabled selected>Select Creditor</option>
                   
            <?php include 'dbcon.php';?>		
            <?php  
                error_reporting(0);
                $sql = "SELECT creditor_id,creditor_name,branch from creditor";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
             ?>        
                    <option value='<?php echo $row["creditor_id"];?>'><?php echo $row["creditor_name"] ;?>-<?php echo $row["branch"] ;?></option>  						
            <?php
                }
                mysqli_close($conn);

            ?>
                </select>
            </div>   
            <!--
            <div class="w3-third w3-mobile w3-hover-text-green" >
                <label>sdfsdf</label>
                <input class="w3-input" type="text" name="" required="">
            </div>
            <div class="w3-third w3-mobile w3-hover-text-green" >
                <label>sdfsdf</label>
                <input class="w3-input" type="text" name="" required="">
            </div> -->
            <div class="w3-third w3-mobile w3-hover-text-green">
                <label>Property Type</label>
                <select class="w3-select" name="Property_Type" required="">
                    <option value="" disabled selected>Select Property Type</option>
                    <option value="Residential Area">Residential Area</option>  						
                    <option value="Commercial Area">Commercial Area</option>
                    <option value="Industrial Area">Industrial Area</option>
                 </select>
            </div>
            <div class="w3-third w3-mobile w3-hover-text-green">
                <label>Area Type</label>
                <select class="w3-select" name="Property_Area_Type" required="">
                    <option value="" disabled selected>Select Type</option>
                    <option value="Residential Area">Residential Area</option>  						
                    <option value="Commercial Area">Commercial Area</option>
                    <option value="Industrial Area">Industrial Area</option>
                 </select>
            </div>
            <div class="w3-third w3-mobile w3-hover-text-green">
                <label>Plot Survey_No</label>
                <input class="w3-input" type="text" name="Plot_Survey_No" required="">
            </div>
             
             <div class="w3-third  w3-mobile w3-hover-text-green" >
                <label>Distirct</label>
                <input class="w3-input" type="text" name="district" required="">
            </div>
            
            <div class="w3-third w3-mobile w3-hover-text-green" >
                <label>Mandal</label>
                <input class="w3-input" type="text" name="Mandal" required="">
            </div>
           
            <div class="w3-third w3-mobile w3-hover-text-green" >
                <label>Village/TSNo</label>
                <input class="w3-input" type="text" name="Village_TSNo" required="">
            </div>
            <div class="w3-third w3-mobile w3-hover-text-green" >
                <label>Pincode</label>
                <input class="w3-input" type="text" name="pincode" required="">
            </div>
             <div class="w3-third w3-mobile w3-hover-text-green" >
                <label>Google Coordinates</label>
                <input class="w3-input" type="text" name="google_coordinates" required="">
            </div>
            <div class="w3-third w3-mobile w3-hover-text-green">
                <label>Area Category</label>				
                <select class="w3-select" name="Property_Area_Category" required="">
                    <option value="" disabled selected>Select Category</option>
                    <option value="High">High</option>  						
                    <option value="Middle">Middle</option>
                    <option value="Poor">Poor</option>
                 </select>
            </div>
            <div class="w3-third w3-mobile w3-hover-text-green">
                <label>Area Circle</label>
                <select class="w3-select" name="Property_area_circle" required>    						
                    <option value="" disabled selected>Select Circle</option>
                    <option value="Corporation">Corporation</option>  						
                    <option value="Village Panchayat">Village Panchayat</option>
                    <option value="Municipality">Municipality</option>
                 </select>
            </div>
           
            <div class="w3-third w3-mobile w3-hover-text-green" >
                <label>Total Site Extent</label>
                <input class="w3-input" type="text" name="total_site_extent" required="">
            </div>
            <div class="w3-third w3-mobile w3-hover-text-green" >
                <label>Road Effected Area</label>
                <input class="w3-input" type="text" name="road_effected_area" required="">
            </div>
            <div class="w3-third w3-mobile w3-hover-text-green" >
                <label>Extent for Valuation</label>
                <input class="w3-input" type="text" name="extent_for_valuation" required="">
            </div>
            <div class="w3-third w3-mobile w3-hover-text-green" >
                <label>Occupancy Info</label>
                <input class="w3-input" type="text" name="occupancy_info" required>
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
         <!--   <div class="w3-mobile" >
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
                        <td><input class="w3-input" type="text" name="north[]" required></td>
                        <td><input class="w3-input" type="text" name="north[]" required></td>
                    </tr>
                    <tr class="w3-mobile w3-hover-text-green">
                        <td>South</td>
                        <td><input class="w3-input" type="text" name="south[]" required></td>
                        <td><input class="w3-input" type="text" name="south[]" required></td>
                    </tr>
                    <tr class="w3-mobile w3-hover-text-green">
                        <td>East</td>
                        <td><input class="w3-input" type="text" name="east[]" required></td>
                        <td><input class="w3-input" type="text" name="east[]" required></td>
                    </tr>
                    <tr class="w3-mobile w3-hover-text-green">
                        <td>West</td>
                        <td><input class="w3-input" type="text" name="west[]" required></td>
                        <td><input class="w3-input" type="text" name="west[]" required></td>
                    </tr>

                </table>      
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
                        <td><input class="w3-input" type="text" name="north[]" required></td>
                        <td><input class="w3-input" type="text" name="north[]" required></td>
                    </tr>
                    <tr class="w3-mobile w3-hover-text-green">
                        <td>South</td>
                        <td><input class="w3-input" type="text" name="south[]" required></td>
                        <td><input class="w3-input" type="text" name="south[]" required></td>
                    </tr>
                    <tr class="w3-mobile w3-hover-text-green">
                        <td>East</td>
                        <td><input class="w3-input" type="text" name="east[]" required></td>
                        <td><input class="w3-input" type="text" name="east[]" required></td>
                    </tr>
                    <tr class="w3-mobile w3-hover-text-green">
                        <td>West</td>
                        <td><input class="w3-input" type="text" name="west[]" required></td>
                        <td><input class="w3-input" type="text" name="west[]" required></td>
                    </tr>

                </table>    
                  
            </div>  -->
           
            <br>
            &nbsp;
            <div class=" w3-mobile w3-center w3-hover-text-green">
                <button class="w3-button w3-card w3-teal w3-card"  type="submit"><b>Next</b></button>
            </div>
        </div>
        
        

    </form>    
    
</div>

<br><br><br><br><br><br>
    
<?php require './footer.php'; ?>


     
</body>
</html> 
<?php
}else{
    echo header("Location:http://localhost:8887/propvaluer");
}
?>