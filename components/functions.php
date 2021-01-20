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

  function getBadges(){
    $bdd = createCursor();
    $badges = $bdd->query('SELECT id_badges FROM badges');
  }

  function getUsers(){
    $bdd = createCursor();
    $users = $bdd->query('SELECT id FROM users');
  }

  function createBadge(){   // il manque des arguments 

  }

  function editBadge($badge_id){
    $bdd = createCursor();

  }

  function removeBadge($badge_id){

  }

  function grantBadgeToUser($badge_id, $user_id){ // a chaqque fois que l'admin donne un badge àl'utilisateur 
    $bdd = createCursor();
    $gbu = $bdd->prepare(
      'INSERT INTO "users_has_badges" ("fk_id_user","fk_id_badge")
       VALUES(?,?)');
       $gbu->execute([$badge_id, $user_id]);
       $gburesults = $gbu->fetch();
  }

  function removeBadgeFromUser($badge_id, $user_id){

  }
?>






<!-- function getBadges(){
    session_start_once();
    $cursor = createCursor();
    $query_badge_normie = $cursor->query('SELECT name_badge, description_badge FROM badge JOIN users_has_badge ON badge.id_badge = users_has_badge.badge_id');
    
    $results_badge_normie = $query_badge_normie->fetch();
    echo $results_badge_normie['name_badge'] . $results_badge_normie['description_badge'];
  }

  function getUsers(){
    session_start_once();
    $cursor = createCursor();
    $query_users = $cursor->query('SELECT lastname, firstname FROM users JOIN users_has_badge ON users.id = users_has_badge.users_id');
    
    $results_users = $query_users->fetch();
    echo $results_users['firstname'];
  } -->