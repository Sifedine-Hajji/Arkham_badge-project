<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../assets/style.css" rel="stylesheet">
  <title> Dashboard </title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/08f226ae60.js" crossorigin="anonymous"></script>
</head>

<body class=DashboardBody>


  <!--------------------------------------------NAVBAR------------------------------------------------------->
    <?php 
      include("../components/navbar.php");
    ?>

  <!------------------------------LIST--OF-BADGES---------------------------------->
  <section class="dashboardContainer">
      
      <div class="BaniereContainer">
        <div class= dashboardbatmanimage>
          <div class= dashboardbatmanfilter>
            
          </div>
        </div>
      </div>

      <h2>Badges</h2>
    <div class="mainContent">
      <ul class="list-group">
      
      <?php
      include('../components/functions.php');
      $getAllbadge = getAllBadges();
      while($donnees = $getAllbadge->fetch()){
  
        echo'<li class="list-group-item d-flex justify-content-around">',
              '<img src=',$donnees['img_badges'],'>',
              '<div class="nom_desc d-flex">','<p>',$donnees['nom_badges'],'</p>',
                    '<p>',$donnees['desc_badges'],'</p>',
              '</div>',
              '<div class="my-auto">',
              '<button type="button" class="btn btn-dark">Edit</button>',
              '</div>',
            '</li>';        
      }
      ?>
      </ul>
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Create a new badge </h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="btn btn-dark">Create badge </a>
        </div>
      </div>
    </div>
  </section>

  <!------------------------------------------CREATE--A-BADGE------------------------------------------------>

  <!-- <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Create a new badge </h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-dark">Create badge </a>
  </div>
</div> -->

  <!----------------------------------------------FOOTER------------------------------------------------------>


</body>

</html>