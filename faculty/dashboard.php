<?php
    if( (!isset($_SESSION)) ) // if the session is no  set then start to new session
    {
         session_start();
    }
    if(($_SESSION["uname"]!="")){
    
?>

<?php require 'facultyContainer.php'; ?>


<br>

<div class="w3-container w3-main" style="margin-left:250px;">
    <div class="w3-container w3-center w3-green"> <h4><?php echo strtok($_SESSION["uname"],'@') ; ?></h4></div>
    <?php include '../dbcon.php';?>
    <?php
            $email=$_SESSION["uname"];
            $sql_lic_pvr6_inspection = "SELECT *from  LogDetails where email='$email'";
            $result_lic_pvr6_inspection = mysqli_query($conn, $sql_lic_pvr6_inspection);
            while($row_lic_pvr6_inspection = mysqli_fetch_assoc($result_lic_pvr6_inspection)) {  
    ?> 
            <div class="w3-mobile w3-hover-text-green">
                <label>Email:</label>
                <b><?php echo $row_lic_pvr6_inspection["email"] ;?></b>
            </div>
            <div class="w3-mobile w3-hover-text-green">
                <label>Password:</label>
                <b><?php echo $row_lic_pvr6_inspection["password"] ;?></b>
            </div>
            <div class="w3-mobile w3-hover-text-green">
                <label>Last Login:</label>
                <b><?php echo  $row_lic_pvr6_inspection["last_login"] ;?></b>
            </div>
            
            <?php
            }
            ?>
        
</div>


<br><br><br><br><br><br>

<?php require '../footer.php'; ?>




     
</body>
</html> 
<?php
}else{
    echo header("Location:index");
}
?>