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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
</head>

<body class=DashboardBody>


  <!--------------------------------------------NAVBAR------------------------------------------------------->
  <?php 
      include("../components/navbar.php");
    ?>

  <!------------------------------LIST--OF-BADGES---------------------------------->
  <section class="dashboardContainer">

    <div class="BaniereContainer">
      <div class=dashboardbatmanimage>
        <div class=dashboardbatmanfilter>
          <h1 class="py-auto text-center text-white ">SALUT SALUT</h1>
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
              '<div class="nom_desc d-flex ml-2">',
                  '<p>',$donnees['nom_badges'],'</p>',
                  '<p>',$donnees['desc_badges'],'</p>',
              '</div>',
              '<div class="my-auto d-flex">',
              '<button type="button" class="btn btn-dark mr-2">Edit</button>',
              '<button type="button" class="btn btn-dark">update</button>',
              '</div>',
            '</li>';        
      }
      ?>
      </ul>


      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Create a new badge </h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#badgeModal">Create badge</button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="badgeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create a badge</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                
                <section>
                  <?php createBadge() ?>
                  <form method="post" action="">
                    <p><label for="badgeImage">Badge image path : </label><input type="text" id="badgeImage"
                        name="badgeImage" placeholder="../assets/badges_img/ ..."></p>
                    <p><label for="badgeName">Badge name : </label><input type="text" id="badgeName" name="badgeName">
                    </p>
                    <p><label for="badgeDesc">Badge description : </label><input id="badgeDesc" name="badgeDesc"
                        type="text"></p>
                    <input type="submit">
                  </form>
                </section>
              </div>
            </div>
          </div>
        </div>

    </div>
  </section>









  
</body>

</html>