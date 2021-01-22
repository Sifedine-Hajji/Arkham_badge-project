<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../assets/style.css" rel="stylesheet">
  <link rel="icon" href="../assets/favicon.ico" />
  <title> Dashboard </title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

  <!--------------------------------------------NAVBAR------------------------------------------------------->

  <div class="sidenav">
    <div id=logomenu> <img src="../assets/images/logo.png"> </div>
    <div class="menubutton"> <a href="dashboardplayer.php"> <img src="../assets/images/homebutton.png"></a> </div>

    <div id=logoutbutton><a href="../pages/logout.php"> <img src="../assets/images/logoutbutton.png"></a></div> 

  </div>


  <!------------------------------------------IMAGE--ON-TOP------------------------------------------------>

  <div class=dashboardbatmanimage>

    <div class=dashboardbatmanfilter>
    </div>
  </div>

  <!-------------------------------------------PROFILE-&-IMAGE--PLAYER-------------------------------------------------->

  <div class=profileplayer>
    <img src="../assets/images/Userslogo.png" id=gamerprofilepic>

    <p class=textaboutbadges>
      These are all your acquired <br> badges </p>
  </div>


  <!------------------------------------------LIST--OF-PLAYERS'-BADGES------------------------------------------------>


  <!------------------------------------------ALL-THE-BADGES-LISTED----------------------------------------------->



  <div class="row py-1">
    <div class="col-lg-9 mx-auto">

      <div class="ContainerCard card mb-4">
        <div class=" card-body p-5" id=colorbg>
          <h4 class="mb-4" id=titleallbadges>All badges </h4>
          


            <div class=listofbadges>
              <ul class="list-group" id="listofbadgess">
                <?php
                include_once('../components/functions.php');
                 $getAllbadge = getAllBadges();
              while($donnees = $getAllbadge->fetch()){
  
                echo'<li class="userAllbadges list-group-item d-flex justify-content-around">',
                '<div class="d-flex imgbadge_textDesc">',
              '<img src=',$donnees['img_badges'],'>',
              '<div class="nom_desc d-flex ml-2 flex-column">',
                  '<p>',$donnees['nom_badges'],'</p>',
                  '<p>',$donnees['desc_badges'],'</p>',
              '</div>',
              '</div>',
              '</li>';        
      }
      ?>
              </ul>

            </div>


          
        </div>

      </div>
    </div>
  </div>

  <!----------------------------------------------FOOTER------------------------------------------------------>





</body>

</html>