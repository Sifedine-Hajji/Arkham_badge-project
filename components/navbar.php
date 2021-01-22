<!---------------------------------------NAVBAR----DASHBOARD---------------------------------------------->
<?php
session_start();
include_once('functions.php');
if(!empty($_POST["logout"])){
logout();
header("location:../index.php");
}
?>

<div class="sidenav">
    <div id=logomenu> <img src="../assets/images/logo.png">  </div>
    <div class="menubutton">  <a href="../pages/dashboardadmin.php"> <img src="../assets/images/homebutton.png"></a> </div>

    <div class="menubutton"> <a href="../pages/dashboardadminpage2.php"> <img src="../assets/images/gamersbutton.png"></a> </div>

      <form method="POST">
    <input type = "submit" value=" " name="logout" class="inputlogout" >
    <!-- <button type="submit" name ="logout"></button> -->
   </form>
     <!-- <div id=logoutbutton><a href="../pages/login.php"> <img src="../assets/images/logoutbutton.png"></a></div>  -->

</div>