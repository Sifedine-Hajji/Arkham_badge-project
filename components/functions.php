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
    return !empty($_SESSION['id']);
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
    $badges = $bdd->query('SELECT id_badges, nom_badges, desc_badges FROM badges');

  }

  function getUsers(){
    $bdd = createCursor();
    $users = $bdd->query('SELECT id FROM users');
  }

  function createBadge(){
    $bdd = createCursor();
    if (!empty($_POST['badgeName']) && !empty($_POST['badgeDesc'])) {
      $req = $bdd->prepare("SELECT EXISTS(SELECT nom_badges FROM badges WHERE nom_badges = ?)");
      $req->execute([filter_var($_POST['badgeName'])]);
      $result = $req->fetchColumn();
      $req->closeCursor();
      if (!$result) {
          $req = $bdd->prepare("INSERT INTO badges (img_badges, nom_badges, desc_badges) VALUES(?, ?, ?)");
          $req->execute([
              strip_tags(trim($_POST['badgeImage'])),
              strip_tags(trim($_POST['badgeName'])),
              strip_tags(trim($_POST['badgeDesc'])),
          ]);
          $req->closeCursor();
          echo "New badge has been created!";
      } else {
          echo "This badge is already existing";
      }
    }
  }

  function editBadge($badge_id){

  }

  function removeBadge($badge_id){

  }

  function grantBadgeToUser($badge_id, $user_id){

  }

  function removeBadgeFromUser($badge_id, $user_id){

  }
?>