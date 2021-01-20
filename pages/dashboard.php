<?php
include_once('components/functions.php');
if(!empty($_POST["logout"])){
logout();
header("location:index.php");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>connecté dashboard</h1>
<form method="POST">
    <input type = "submit" value="log out" name="logout">
    </form>
    
</body>
</html>
