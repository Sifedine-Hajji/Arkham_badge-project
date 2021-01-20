<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../assets/style.css" rel="stylesheet">
    <title> Dashboard </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>


<!--------------------------------------------NAVBAR------------------------------------------------------->

<?php 
    include("../components/navbar.php");
?>

<!------------------------------------------LIST--OF-BADGES------------------------------------------------>

<div class= dashboardbatmanimage>

<div class= dashboardbatmanfilter>
</div>
</div>


<ul class="list-group">
    <h2>Badges</h2>
   
    <li class="list-group-item"> <img src="../assets/images/20.jpg"> 
     Badge
    <button type="button" class="btn btn-dark">Give badge</button>
    </li>
   
    <li class="list-group-item"> <img src="../assets/images/20.jpg">  Badge 
    <button type="button" class="btn btn-dark">Give badge</button>
    </li>
   
    <li class="list-group-item"> <img src="../assets/images/20.jpg">  Badge 
    <button type="button" class="btn btn-dark">Give badge</button>
    </li>
   
    <li class="list-group-item"> <img src="../assets/images/20.jpg">  Badge 
    <button type="button" class="btn btn-dark">Give badge</button>
    </li>
   
    <li class="list-group-item"> <img src="../assets/images/20.jpg">  Badge 
    <button type="button" class="btn btn-dark">Give badge</button>
    </li>

    <li class="list-group-item"> <img src="../assets/images/20.jpg">  Badge 
    <button type="button" class="btn btn-dark">Give badge</button id=givebadge>
    </li>

    <li class="list-group-item"> <img src="../assets/images/20.jpg">  Badge 
    <button type="button" class="btn btn-dark">Give badge</button id=givebadge>
    </li>

    <li class="list-group-item"> <img src="../assets/images/20.jpg">  Badge 
    <button type="button" class="btn btn-dark">Give badge</button id=givebadge>
    </li>
    
    
</ul>

<!------------------------------------------CREATE--A-BADGE------------------------------------------------>

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Create a new badge </h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-dark">Create badge </a>
  </div>
</div>

<!----------------------------------------------FOOTER------------------------------------------------------>

<?php 
    include("../components/navbar.php");
?>



</body>
</html>