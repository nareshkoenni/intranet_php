<?php
    if( (!isset($_SESSION)) ) // if the session is no  set then start to new session
    {
         session_start();
    }
    if(($_SESSION["uname"]!="")){
    
?>

<?php require './sidebar.php'; ?>
<br>
<br>
<br>


<div class="w3-main w3-container" style="margin-left:250px;">
    <form class="" action="addUserProcess.php" method="post">
        <div class="w3-container w3-center w3-green">
            <h4>New User</h4>
        </div>
        <div class="w3-row-padding">
            <div class="w3-half w3-mobile">
                <label>Login Mail Id</label>
                <input class="w3-input" type="text" name="login_mail_id" required="">
            </div>
            <div class="w3-half w3-mobile" >
                <label>Password</label>
                <input class="w3-input" type="text" name="password" required="">
            </div>
            <div class="w3-mobile">
                <select class="w3-select" name="role_id" required="">
                    <option value="" disabled selected>Choose role</option>
                    <option value="1">Freelancer</option>
                    <option value="2">Valuer</option>
                 </select>
            </div>
            <br>
            <div class="w3-mobile w3-center">
                <button class="w3-btn w3-teal"  type="submit"><b>Add</b></button>
            </div>
        </div>
    </form>    


</div>

<br><br><br><br><br><br>
    
<?php require './footer.php'; ?>

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
     
</body>
</html> 
<?php
}else{
    echo header("Location:http://localhost:8887/propvaluer");
}
?>