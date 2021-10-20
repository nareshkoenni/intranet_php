<?php
    if( (!isset($_SESSION)) ) // if the session is no  set then start to new session
    {
         session_start();
    }
    if(($_SESSION["uname"]!="")){
    
?>
<?php require './sidebar.php'; ?>
<br>
<div class="w3-mobile w3-container" style="margin-left:250px;">
    <button onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-green">Add Creditor</button>

</div>
<br>

<div class="w3-container w3-main w3-mobile" style="margin-left:250px;">
  <div class="w3-container w3-center w3-green"> <h4>Creditors</h4></div>

  <table class="w3-table-all w3-hoverable w3-card">
    <thead>
      <tr class="w3-light-grey w3-mobile">
        <th>Creditor ID</th>
        <th>Creditor Name</th>
        <th>Branch</th>
        <th>Area</th>
        <th>State</th>
        
      </tr>
    </thead>
    
    <?php include 'dbcon.php';?>		

<?php  
    error_reporting(0);

    $sql = "SELECT creditor_id,creditor_name,branch,area,state from creditor";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
?>        
        <tr class="w3-mobile">
            <td><?php echo $row["creditor_id"] ;?></td>
            <td><?php echo $row["creditor_name"] ;?></td>
            <td><?php echo $row["branch"] ;?></td>
            <td><?php echo $row["area"] ;?></td>
            <td><?php echo $row["state"] ;?></td>
       </tr>
<?php
    }
    mysqli_close($conn);

?>
    
   
  </table>
</div>

<div id="id02" class="w3-container w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:400px">
  
      <div class="w3-center"><br>
        <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
      </div>

        <form class="w3-container" action="addCreditorProcess.php" method="post">
        <div class="w3-section">
          <label><b>Creditor Name</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Creditor name" name="creditor_name" required>
          <label><b>Branch</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Branch" name="branch" required>
          <label><b>Area</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Area of the creditor" name="area" required>
          <label><b>State</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="State" name="state" required>
          
          <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Add</button>
        </div>
      

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="document.getElementById('id02').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
      </div>
      </form>      
    </div>
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