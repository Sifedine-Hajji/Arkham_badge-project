<?php
  include_once('db.php');
  

  // Similar to "include_once" but for sessions
  // Calls "session_start()" unless it has already been called on the page
  function session_start_once(){
    if(session_status() == PHP_SESSION_NONE){
      return session_start();
    }
  }

  function isAuthenticated(){
    session_start_once();
    return !empty($_SESSION['user_id']);
  }

  function isAdmin(){
    session_start_once();
    return isAuthenticated && $_SESSION['account_type'] == 'ADMIN';
  }


  function login($email, $password){
    session_start_once();
   
    $cursor = createCursor();
    $query = $cursor->prepare('SELECT id, email, password, account_type  FROM users WHERE email=?');
    $query->execute([$_POST["email"]]);
    $results = $query->fetch();
    
    if(!empty($results) AND password_verify($password, $results['password'])){
      $_SESSION['user_id'] = $results['id'];
      $_SESSION['account_type'] = $results['account_type'];
      $_SESSION['email'] = $email;
      

      return true;
  
      
    }
    return false;
    
  }

  function logout(){
    session_start_once();
    session_destroy();
  }
  function getAllBadges(){
    $bdd = createCursor();
    $getAllbadges = $bdd->query('SELECT img_badges, nom_badges, desc_badges FROM badges');
    return $getAllbadges;
  }

  function getBadges(){
    $bdd = createCursor();

    $getbadge = $bdd->query('SELECT img_badges, nom_badges, desc_badges FROM users_has_badges 
    INNER JOIN badges ON badges.id_badges = users_has_badges.fk_id_badge');
    return $getbadge;
  }
  function getAllUsers(){
    $bdd = createCursor();

    $getusers = $bdd->query('SELECT firstname, lastname, email, account_type FROM users');
    return $getusers;
  }
  function getUsers(){
    $bdd = createCursor();

    $getusers = $bdd->query('SELECT firstname, lastname,  FROM users_has_badges 
    INNER JOIN users ON users.id = users_has_badges.fk_id_user');
    return $getusers;
  }

  function createBadge(){// il manque des arguments 

  }

  function editBadge($badge_id){ // requete sql update (nom_badge,desc_badge.......)

  }

  function removeBadge($badge_id){

  }

  function grantBadgeToUser($badge_id, $user_id){

  }

  function removeBadgeFromUser($badge_id, $user_id){

  }
  function createUser($email, $password, $firstname, $lastname, $account_type){
    $password = password_hash($password, PASSWORD_DEFAULT);
    $bdd=createCursor();
    $req = $bdd->prepare('INSERT INTO users (email, password, firstname, lastname, account_type) VALUES(?, ?, ?, ?, ?)');
    $req->execute([
      $firstname,
      $lastname,
      $email,
      $password,
      $account_type
      ]);
    } 
?>