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


<div class ="addgamers"> 
</div>


<div class="container-modal">
  <button type="button" class="btn btn-dark btn-lg" data-toggle="modal" data-target="#Modal">Add gamer</button>
</div>

<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">add a new gamer</h4>
      </div>
      <div class="modal-body">
      <form>
    <div class="col">
    <label>Email address</label>
    <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    
    <div class="col">
    <label> First Name</label>
    <input type="text" class="form-control" placeholder="First name">
   </div>
   <div class="col">
   <label> Last Name</label>
    <input type="text" class="form-control" placeholder="Last name">
  </div>
  <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#Modal">Add gamer</button>

</form>     

 </div>
    </div>
  </div>
</div>


 

<!------------------------------------------LIST--OF-BADGES------------------------------------------------>


<ul class="list-group" id=gamerlist>
    <h2>Gamers</h2>
   
    <li class="list-group-item"> <img src="../assets/images/gamerphoto.png" id=gamerprofilepic> 
     Betty
    </li>
   
    <li class="list-group-item"> <img src="../assets/images/gamerphoto.png" id=gamerprofilepic> 
     Betty
    </li>
   
    <li class="list-group-item"> <img src="../assets/images/gamerphoto.png" id=gamerprofilepic> 
     Betty
    </li>
   
    <li class="list-group-item"> <img src="../assets/images/gamerphoto.png" id=gamerprofilepic> 
     Betty
    </li>
   
    <li class="list-group-item"> <img src="../assets/images/gamerphoto.png" id=gamerprofilepic> 
     Betty
    </li>

    <li class="list-group-item"> <img src="../assets/images/gamerphoto.png" id=gamerprofilepic> 
     Betty
    </li>
    
</ul>

<!------------------------------------------CREATE--A-BADGE------------------------------------------------>


<!----------------------------------------------FOOTER------------------------------------------------------>

<?php 
    include("../components/footer.php");
?>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>