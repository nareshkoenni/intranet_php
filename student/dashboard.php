<?php
    if( (!isset($_SESSION)) ) // if the session is no  set then start to new session
    {
         session_start();
    }
    if(($_SESSION["uname"]!="")){
    
?>
<?php require './studentSidebar.php'; ?>
<br>
<div class="w3-mobile w3-container" style="margin-left:250px;">
    <a class="w3-button w3-green" href="#"> Filter come here</a>
</div>
<br>

<div class="w3-container w3-main" style="margin-left:250px;">
  <div class="w3-container w3-center w3-green"> <h4>Properties</h4></div>

  <table class="w3-table-all w3-hoverable w3-card">
    <thead>
      <tr class="w3-light-grey w3-mobile">
        <th>Property ID</th>
        <th>Property Type</th>
        <th>Area</th>
        <th>Customer Name</th>
        <th>Mobile Number</th>
        <th>More</th>
      </tr>
    </thead>
    
    <?php include 'dbcon.php';?>		

<?php  
    error_reporting(0);

    $sql = "SELECT p.Property_ID, p.Property_Type, p.Village_TSNo, c.Customer_Name, c.mobile_number from Property p,Customer c where p.Customer_ID=c.Customer_ID";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
?>        
        <tr class="w3-mobile">
            <td><?php echo $row["Property_ID"] ;?></td>
            <td><?php echo $row["Property_Type"] ;?></td>
            <td><?php echo $row["Village_TSNo"] ;?></td>
            <td><?php echo $row["Customer_Name"] ;?></td>
            <td><?php echo $row["mobile_number"] ;?></td>
            <td><a href="viewProperty.php?id=<?php echo $row["Property_ID"]*78567543478345433;?>">More</a></td>    
       </tr>
<?php
    }
     //echo "ERROR: Could not execute query: $sql. " . mysqli_error($conn);
                 
    mysqli_close($conn);

?>
    
   
  </table>
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