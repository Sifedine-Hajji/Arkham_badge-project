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
  <body>


<!--------------------------------------------NAVBAR------------------------------------------------------->

<?php 
    include("../components/navbar.php");
?>

<!------------------------------------------MODAL--ADD-GAMER------------------------------------------------>


<div class="addgamerContainer">
  <a href="../components/user_controller.php" target="_blank" class="btn btn-dark"> Add a Gamer </a>
</div>

 

<!------------------------------------------LIST--OF-BADGES------------------------------------------------>


<ul class="list-group" id=gamerlist>
    <h2>Gamers</h2>

    <?php
    include_once('../components/functions.php');

    $getAllusers = getAllUsers();
    while($donnees = $getAllusers->fetch()){
  
      echo'<li class="list-group-item d-flex ">',
      '<div class="d-flex">',
            '<img src="../assets/images/Userslogo">',

            '<div class="nom_desc d-flex flex-column">',
              '<p>',$donnees['firstname'], $donnees['lastname'],'</p>',
              '<p>',$donnees['email'],'</p>',
              '<p>',$donnees['account_type'],'</p>',
            '</div>',
'</div>',
            '<div class="my-auto">',
              '<button type="button" class="btn btn-dark">Edit</button>',
            '</div>',
          '</li>';        

    }

  ?>
  </ul>

<!------------------------------------------CREATE--A-BADGE------------------------------------------------>


<!----------------------------------------------FOOTER------------------------------------------------------>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
