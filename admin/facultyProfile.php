<?php
    if( (!isset($_SESSION)) ) // if the session is no  set then start to new session
    {
         session_start();
    }
    if(($_SESSION["uname"]!="")){
    
?>
<?php require 'adminContainer.php'; ?>
<br>
<div class="w3-mobile w3-container" style="margin-left:250px;">
    <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-green">Update</button>
    <a  class="w3-button w3-red" href="deletefaculty?fid=<?php echo $_GET["fid"]?>">Delete</a>
</div>


<br>
<div class="w3-container w3-main" style="margin-left:250px;">
  <div class="w3-container w3-center w3-green"> <h4>Faculty</h4></div>

  
    
<?php include '../dbcon.php';?>		

<?php  
    error_reporting(0);
    $fid=$_GET["fid"];
    $sql = "SELECT f.faculty_id,f.faculty_name,f.branch,f.mobile_number,f.email,r.role_name,f.perm_address, f.comm_address,f.blood_group, "
            . "l.password, l.last_login from faculty f, role r, LogDetails l  "
            . "where f.role_id=r.role_id and f.email=l.email and faculty_id='$fid'";
    $result = mysqli_query($conn, $sql);
                 
    while($row = mysqli_fetch_assoc($result)) {
?>       
        <div class="w3-mobile w3-hover-text-green" >
                <label><b>Faculty Id:</b></label>
                <?php echo $row["faculty_id"] ;?>
        </div>
        <div class="w3-mobile w3-hover-text-green" >
                <label><b>Faculty Name:</b></label>
                <?php echo $row["faculty_name"] ;?>
        </div>
        <div class="w3-mobile w3-hover-text-green" >
                <label><b>Branch:</b></label>
                <?php echo $row["branch"] ;?>
        </div>
        <div class="w3-mobile w3-hover-text-green" >
                <label><b>Mobile Number:</b></label>
                <?php echo $row["mobile_number"] ;?>
        </div>
        <div class="w3-mobile w3-hover-text-green" >
                <label><b>Email:</b></label>
                <?php echo $row["email"] ;?>
        </div>
        
        <div class="w3-mobile w3-hover-text-green" >
                <label><b>Role:</b></label>
                <?php echo $row["role_name"] ;?>
        </div>
        <div class="w3-mobile w3-hover-text-green" >
                <label><b>Perm Address:</b></label>
                <?php echo $row["perm_address"] ;?>
        </div>
        <div class="w3-mobile w3-hover-text-green" >
                <label><b>Comm Address:</b></label>
                <?php echo $row["comm_address"] ;?>
        </div>
        <div class="w3-mobile w3-hover-text-green" >
                <label><b>Blood Group:</b></label>
                <?php echo $row["blood_group"] ;?>
        </div>
        <div class="w3-mobile w3-hover-text-green" >
                <label><b>Password:</b></label>
                <?php echo $row["password"] ;?>
        </div>
        <div class="w3-mobile w3-hover-text-green" >
                <label><b>Last Login:</b></label>
                <?php echo $row["last_login"] ;?>
        </div>
        
            
        
<?php
    }
                 
    mysqli_close($conn);

?>
    
 
</div>



<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
  
      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
        <img src="../images/img_avatar2.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
      </div>

        <form class="w3-container" action="#" method="post">
        <div class="w3-section">
          <label><b>Faculty ID</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="" maxlength="9" name="faculty_id" required>
          <label><b>Faculty Name</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Faculty Name" maxlength="74" name="faculty_name" required>
          <label><b>Branch</b></label>
          <select class="w3-select w3-border" name="branch" required="">
                    <option value="" disabled selected>Choose Branch</option>
                    <option value="CSE">CSE</option>
                    <option value="ECE">ECE</option>
                    <option value="IT">IT</option>
                    <option value="EEE">EEE</option>
                    <option value="AIML">AIML</option>
                    <option value="Library">Library</option>
                    <option value="admin">Admin</option>
          </select>
          <label><b>Mobile Number</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="" maxlength="10" name="mobile_number" required>
          <label><b>Email</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="" maxlength="99" name="email" required>
          <label><b>Communication Address</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="" name="comm_address" required>
          <label><b>Permanent Address</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="" name="perm_address" required>
          <label><b>Select Role</b></label>
          <select class="w3-select w3-border" name="role_id" required="">
                    <option value="" disabled selected>Choose role</option>
                    <option value="1">admin</option>
                    <option value="2">hod</option>
                    <option value="3">classteacher</option>
                    <option value="4">teacher</option>
                    <option value="5">student</option>
                    <option value="6">parent</option>
                    <option value="7">non-teaching</option>
          </select>
          <label><b>Blood Group</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="" maxlength="2" name="blood_group" required>
         
          
          <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Add</button>
        </div>
      

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
      </div>
      </form>      
    </div>
  </div>
<br><br><br><br><br><br>

<?php require '../footer.php'; ?>




     
</body>
</html> 
<?php
}else{
    echo header("Location:index.php");
}
?>