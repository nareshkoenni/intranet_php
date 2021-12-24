<?php
    if( (!isset($_SESSION)) ) // if the session is no  set then start to new session
    {
         session_start();
    }
    if(($_SESSION["uname"]!="")){
    
?>

<?php require 'studentContainer.php'; ?>

<div class="w3-mobile w3-container" style="margin-left:250px;">
    <a class="w3-button w3-green" href="#"> Filter come here</a>
</div>
<br>

<div class="w3-container w3-main" style="margin-left:250px;">
  
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