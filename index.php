<?php
 
  include_once('components/functions.php');

  getAllUsers();
  

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/style.css">
  <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="./assets/style.css">
  <link rel="stylesheet" href="./assets/normalize.css">

  <title>Breaking Badge</title>
</head>

<body class="welcomeBody">

  <?php
  
  if(isAuthenticated()){
    if($_SESSION['account_type'] == 'ADMIN'){
        header('location:./pages/dashboardadmin.php');
    }else{
      header('location:./pages/dashboard.php');
    }
    
    
    
   
        // header('Location: dashboard.php');
    
    
  }else {
   
    include('pages/login.php');
    
  }
  ?>
</body>

</html>