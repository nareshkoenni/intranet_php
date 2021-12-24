<?php 
session_start();
?>
<?php
 include("dbcon.php");
 echo 'connected';
	$query="select * from LogDetails where email='".$_POST['loginEmail']."' and password='".$_POST['pwd']."'";
        $result = mysqli_query($conn,$query) or  die('Could not look up user information; ' . mysqli_error($conn));
	if(mysqli_num_rows($result) && $row = mysqli_fetch_assoc($result)){
                $_SESSION['uname']=$_POST['loginEmail'];
                if($row['role_id']=="5"){
                    echo header("Location:student/studentDashboard.php");
                }else if($row['role_id']=="4"){
                    echo header("Location:facultyContainer.php");
                }else if($row['role_id']=="3"){
                    echo header("Location:classTeacherContainer.php");
                }else if($row['role_id']=="2"){
                    echo header("Location:hodContainer.php");
                }else if($row['role_id']=="1"){
                    echo header("Location:admin/adminDashboard.php");
                }else{
                    echo header("Location:index.php");
                }
	}
	else{
		echo header("Location:index.php");
        }
         mysqli_close($conn);
?>
</body>
</html>