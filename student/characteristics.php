<?php
    if( (!isset($_SESSION)) ) // if the session is no  set then start to new session
    {
         session_start();
    }
    if(($_SESSION["uname"]!="")){
    
?>

<?php require './sidebar.php'; ?>
<br>


<div class="w3-main w3-container " style="margin-left:250px;">
    <form class="w3-card" action="characteristicsProcess.php" method="post">
        
        <div class="w3-container w3-center w3-green">
            <h4>New Property - Characteristics </h4>
        </div>
        
        <div class="w3-row-padding">
            <div class= "w3-mobile w3-hover-text-red w3-border-bottom">
                <label class="w3-center">Property</label>
                <select class="w3-select" name="Property_ID" required="">
                    <option value="" disabled selected>Select Property</option>
                   
            <?php include 'dbcon.php';?>		
            <?php  
                error_reporting(0);
                $sql = "SELECT p.Property_ID,p.Village_TSNo, c.Customer_Name, c.mobile_number from Property p,Customer c where p.Customer_ID=c.Customer_ID order by p.Property_ID desc" ;
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
             ?>        
                    <option value='<?php echo $row["Property_ID"] ;?>'><?php echo $row["Property_ID"] ;?>-<?php echo $row["Village_TSNo"] ;?>-<?php echo $row["Customer_Name"] ;?>-<?php echo $row["mobile_number"] ;?></option>  						
            <?php
                }
                mysqli_close($conn);

            ?>
                </select>
            </div>       
            <div class="w3-third w3-mobile w3-hover-text-green" >
                <label>Development of surrounding area</label>
                <input class="w3-input" type="text" name="Surrounding_area" required="">
            </div>
            
            <div class="w3-third w3-mobile w3-hover-text-green" >
                <label>Possibility of flooding/sub-merging</label>
                <input class="w3-input" type="text" name="Possibility_of_Floods" required="">
            </div>
            <div class="w3-third w3-mobile w3-hover-text-green" >
                <label>Feasibility to the Civic amenities</label>
                <input class="w3-input" type="text" name="Civic_Emeniities" required="">
            </div>
            
            <div class="w3-third w3-mobile w3-hover-text-green">
                <label>Level of land with topographical</label>
                <input class="w3-input" type="text" name="Land_topographical_Conditions" required="">
            </div>
            <div class="w3-third w3-mobile w3-hover-text-green">
                <label>Type of use to which it can be put</label>
                <input class="w3-input" type="text" name="Land_Utilization_Type" required="">
            </div>
            <div class="w3-third w3-mobile w3-hover-text-green">
                <label>Type of plot</label>
                <select class="w3-select" name="plot_type" required="">
                    <option value="" disabled selected>Select Type</option>
                    <option value="Corner">Corner plot</option>  						
                    <option value="intermittent">intermittent plot</option>
                 </select>
            </div>
            <div class="w3-third w3-mobile w3-hover-text-green">
                <label>Road Facility</label>
                <select class="w3-select" name="Road_facility" required="">
                    <option value="" disabled selected>Select Facility</option>
                    <option value="Yes">Yes</option>  						
                    <option value="No">No</option>
                   
                 </select>
            </div>
            
            <div class="w3-third  w3-mobile w3-hover-text-green" >
                <label>Shape of land</label>
                <input class="w3-input" type="text" name="Land_Shape" required="">
            </div>
            
            <div class="w3-third w3-mobile w3-hover-text-green" >
                <label>Any Usage Restrictions</label>
                <input class="w3-input" type="text" name="Usage_restrictions" required="">
            </div>
           
            <div class="w3-third w3-mobile w3-hover-text-green" >
                <label>Is plot in town planning approved layout</label>
                <input class="w3-input" type="text" name="Is_in_planning_layout_area" required="">
            </div>
            <div class="w3-third w3-mobile w3-hover-text-green" >
                <label>Type of road available at present</label>
                <input class="w3-input" type="text" name="Type_of_Road" required="">
            </div>
             <div class="w3-third w3-mobile w3-hover-text-green" >
                <label>Width of road-Is it <20ft or morethan</label>
                <input class="w3-input" type="text" name="Width_of_Road" required="">
            </div>
            <div class="w3-third w3-mobile w3-hover-text-green">
                <label>Is it a land - locked land?</label>				
                <select class="w3-select" name="Locked_land_Status" required="">
                    <option value="" disabled selected>Select Category</option>
                    <option value="Yes">Yes</option>  						
                    <option value="No">No</option>
                 </select>
            </div>
            <div class="w3-third w3-mobile w3-hover-text-green">
                <label>Water Potentiality</label>
                <select class="w3-select" name="Water_potentiality" required>    						
                    <option value="" disabled selected>Select potentiality</option>
                    <option value="Yes">Yes</option>  						
                    <option value="No">No</option>
                 </select>
            </div>
           
            <div class="w3-third w3-mobile w3-hover-text-green">
                <label>Underground sewerage system</label>
                <select class="w3-select" name="Underground_sewerage" required>    						
                    <option value="" disabled selected>Select system</option>
                    <option value="Yes">Yes</option>  						
                    <option value="No">No</option>
                 </select>
            </div>
            <div class="w3-third w3-mobile w3-hover-text-green">
                <label>Is power supply available?</label>
                <select class="w3-select" name="Power_Supply" required>    						
                    <option value="" disabled selected>Select availability</option>
                    <option value="Yes">Yes</option>  						
                    <option value="No">No</option>
                 </select>
            </div>
            <div class="w3-third w3-mobile w3-hover-text-green" >
                <label>Advantages of the site</label>
                <input class="w3-input" type="text" name="Advantage" required>
            </div>
            <div class="w3-third w3-mobile w3-hover-text-green" >
                <label>Special Remarks</label>
                <textarea class="w3-input w3-small" placeholder="like threat of acquisition of land for public service purposes, road widening or applicability of CRZ provisions etc.(Distance from sea-coast/tidal level must be incorporated)" name="Remarks" required></textarea>
            </div>
            <br><br><br>
            
            
           
            <br>
            &nbsp;
            <div class=" w3-mobile w3-center w3-hover-text-green">
                <button class="w3-button w3-card w3-teal w3-card"  type="submit"><b>Add</b></button>
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