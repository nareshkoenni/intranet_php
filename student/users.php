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
    <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-green">Add User</button>
    
</div>
<br>

<div class="w3-container w3-main" style="margin-left:250px;">
  <div class="w3-container w3-center w3-green"> <h4>Users</h4></div>

  <table class="w3-table-all w3-hoverable w3-card">
    <thead>
      <tr class="w3-light-grey w3-mobile">
        <th>S.No</th>
        <th>Login Mail Id</th>
        <th>Password</th>
        <th>Role</th>
      </tr>
    </thead>
    
    <?php include 'dbcon.php';?>		

<?php  
    error_reporting(0);

    $sql = "SELECT u.login_id,u.login_mail_id,u.password,r.role_name from user u, role r where u.role_id=r.role_id";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
?>        
        <tr class="w3-mobile">
            <td><?php echo $row["login_id"] ;?></td>
            <td><?php echo $row["login_mail_id"] ;?></td>
            <td><?php echo $row["password"] ;?></td>
            <td><?php echo $row["role_name"] ;?></td>
            
       </tr>
<?php
    }
    mysqli_close($conn);

?>
    
   
  </table>
</div>

<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
  
      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
        <img src="images/img_avatar2.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
      </div>

        <form class="w3-container" action="addUserProcess.php" method="post">
        <div class="w3-section">
          <label><b>Login Mail Id</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Login Mail Id" name="login_mail_id" required>
          <label><b>Password</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Password" name="password" required>
          <label><b>Select Role</b></label>
          <select class="w3-select w3-border" name="role_id" required="">
                    <option value="" disabled selected>Choose role</option>
                    <option value="1">Freelancer</option>
                    <option value="2">Valuer</option>
          </select>
          
          <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Add</button>
        </div>
      

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
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