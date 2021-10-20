<?php
    if( (!isset($_SESSION)) ) // if the session is no  set then start to new session
    {
         session_start();
    }
    if(($_SESSION["uname"]!="")){
    
?>

<!DOCTYPE html>
<html>
<title>BVRITH</title>
<link rel = "icon" href = "images/logo.jpg" type = "image/x-icon">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

</style>

<body>

<nav class="w3-sidebar w3-fixed  w3-bar-block w3-collapse  w3-card w3-light-grey" style="z-index:13;width:250px;" id="mySidebar">
    <a class="w3-bar-item w3-button w3-border-bottom w3-large w3-mobile" href="dashboard.php" >  <img class="w3-image" src="images/logo.jpg" alt="Architecture" width="100" height="40">
  </a>
  <a class="w3-bar-item w3-button w3-hide-large w3-large" href="javascript:void(0)" onclick="w3_close()">Close <i class="fa fa-remove"></i></a>
  
  <a class="w3-bar-item w3-button w3-teal" href="dashboard.php">Dashboard</a>
  <a class="w3-bar-item w3-button" href="profile.php">Profile</a>
  <a class="w3-bar-item w3-button" href="creditors.php">Creditors</a>
  
 
  
  <div>
    <a class="w3-bar-item w3-button" onclick="myAccordion('demo')" href="javascript:void(0)">Surveys <i class="fa fa-caret-down"></i></a>
    <div id="demo" class="w3-hide">
      <a class="w3-bar-item w3-button" href="feedback.php">Feedback</a>
      <a class="w3-bar-item w3-button" href="ces.php">Course End Survey</a>
      <a class="w3-bar-item w3-button" href="ges.php">Graduate Exit Survey</a>
    </div>
  </div>
  <div>
    <a class="w3-bar-item w3-button" onclick="myAccordion('demo1')" href="javascript:void(0)">Valuation <i class="fa fa-caret-down"></i></a>
    <div id="demo1" class="w3-hide">
      <a class="w3-bar-item w3-button" href="partA.php">Part-A</a>
      <a class="w3-bar-item w3-button" href="partB.php">Part-B</a>
      <a class="w3-bar-item w3-button" href="partC.php">Part-C</a>
      <a class="w3-bar-item w3-button" href="partD.php">Part-D</a>
      <a class="w3-bar-item w3-button" href="partE.php">Part-E</a>
      <a class="w3-bar-item w3-button" href="partF.php">Part-F</a>
      <a class="w3-bar-item w3-button" href="total.php">Total</a>
    </div>
  </div>
  <a class="w3-bar-item w3-button w3-teal" href="logout.php">Logout</a>
  
</nav>
<div id="myTop" class="w3-container  w3-theme w3-large">
        <p><i class="fa fa-bars w3-button w3-teal w3-hide-large w3-xlarge" onclick="w3_open()"></i>
        <span id="myIntro" class="w3-hide w3-hide-large">KM Valuations</span></p>
</div>
    
<script>
    // Open and close the sidebar on medium and small screens
    function w3_open() {
      document.getElementById("mySidebar").style.display = "block";
      document.getElementById("myOverlay").style.display = "block";
    }

    function w3_close() {
      document.getElementById("mySidebar").style.display = "none";
      document.getElementById("myOverlay").style.display = "none";
    }

    // Change style of top container on scroll
    window.onscroll = function() {myFunction()};
    function myFunction() {
      if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        document.getElementById("myTop").classList.add("w3-card-4", "w3-animate-opacity");
        document.getElementById("myIntro").classList.add("w3-show-inline-block");
      } else {
        document.getElementById("myIntro").classList.remove("w3-show-inline-block");
        document.getElementById("myTop").classList.remove("w3-card-4", "w3-animate-opacity");
      }
    }

    // Accordions
    function myAccordion(id) {
      var x = document.getElementById(id);
      if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme";
      } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme", "");
      }
    }
</script>    

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

<?php require 'footer.php'; ?>




     
</body>
</html> 
<?php
}else{
    echo header("Location:index.php");
}
?>