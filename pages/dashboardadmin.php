<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../assets/style.css" rel="stylesheet">
    <link rel="icon" href="../assets/favicon.ico" />
    <title> Dashboard </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class=DashboardBody>


<!--------------------------------------------NAVBAR------------------------------------------------------->

<?php 
    include("../components/navbar.php");
?>

<!------------------------------------------LIST--OF-BADGES------------------------------------------------>

<div class= dashboardbatmanimage>

<div class= dashboardbatmanfilter>
</div>
</div>



    <div class="mainContent d-flex justify-content-around">
      
      <ul class="list-group">
      <h2>All Badges</h2>
        <?php
      include_once('../components/functions.php');
      $getAllbadge = getAllBadges();
      while($donnees = $getAllbadge->fetch()){
  
        echo'<li class="list-group-item d-flex justify-content-around">',
            '<div class="d-flex imgbadge_textDesc">',
              '<img src=',$donnees['img_badges'],'>',
              '<div class="nom_desc d-flex ml-2 flex-column">',
                  '<p>',$donnees['nom_badges'],'</p>',
                  '<p>',$donnees['desc_badges'],'</p>',
              '</div>',
              '</div>',
              '<div class="my-auto d-flex">',
              '<button type="button" class="btn btn-dark mr-2"><a href="../components/badge_controller.php">Edit</a></button>',
              '</div>',
            '</li>';        
      }
      ?>
      </ul>


      <div class="card" style="width: 18rem; height: 22vh">
  <div class="card-body">
    <h5 class="card-title">Create a new badge </h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="../components/badge_controller.php" target="_blank" class="btn btn-dark">Create badge </a>
  </div>
</div>
    </div>


<!-----------------------CREATE--A-BAdge------------------------------------>



<!----------------------------------------------FOOTER------------------------------------------------------>





</body>
</html>
