<?php 
include('db.php');
$bdd = createCursor();
$bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
?>

<?php
$id = '';
$firstname = '';
$name = '';
$email = '';
$type = '';
$password = '';
    if(isset($_POST['search']))
    {
        $id = $_POST['id'];

        $pdoQuery="SELECT * FROM users WHERE id = :id";
        $pdoQuery_run = $bdd -> prepare($pdoQuery);
        $pdoQuery_exec = $pdoQuery_run->execute(array(":id"=>$id));

        if($pdoQuery_exec)
        {
            if($pdoQuery_run->rowcount()>0)
            {
                foreach($pdoQuery_run as $row)
                {
                    $id = $row->id;
                    $firstname = $row->firstname;
                    $name = $row->lastname;
                    $email = $row->email;
                    $type = $row->account_type;
                    $password = $row->password;
                }
            }
            else
            {
                echo '<script> alert("No User Found")</script>';
            }
        }
        else
        {
            echo '<script> alert("Data Not Search")</script>';
        }
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <title>Admin</title>
</head>
<body>
    <center>
        <h1>ULTIMATE ADMIN PANEL</h1>
        <form action="" method='POST'>
            <table width="50%" border="1" cellpadding"5" cellspacing"5">
            <tr>
                <td>
                    <center>
                        Search a user by ID: <input type="text" name="id" value="<?php echo $id ?>"  placeholder="Enter an ID"/><br><br>
                        User Firstname: <input type="text" name="firstname" value="<?php echo $firstname ?>" placeholder="Enter image path"/><br><br>
                        User Name: <input type="text" name="name" value="<?php echo $name ?>" placeholder="Enter a name"/><br><br>
                        User Email: <input type="email" name="email" value="<?php echo $email ?>" placeholder="Enter a description"/><br><br>
                        Password: <input type="password" name="password" value="<?php echo $password ?>" placeholder="Enter a description"/><br><br>
                        Account Type: <input type="text" name="type" value="<?php echo $type ?>" placeholder="Enter a description"/>
                        Change type <select name="type" id="pet-select">
                                            <option value="">--Please choose an option--</option>
                                            <option value="ADMIN">Admin</option>
                                            <option value="NORMIE">Normie</option>

                                        </select><br><br>
                        
                        <button type="submit" class="btn btn-primary" name="insert"> INSERT</button>
                        <button type="submit" class="btn btn-primary" name="display">DISPLAY</button>
                        <button type="submit" class="btn btn-primary" name="search"> SEARCH</button>
                        <button type="submit" class="btn btn-primary" name="update"> UPDATE</button>
                        <button type="submit" class="btn btn-primary" name="delete"> DELETE</button>
                        <button type="submit" class="btn btn-primary" name="rowcount"> ROW COUNT</button>

                    </center><br><br>
                </td>
            </tr>
            </table>
        </form>
    </center>
</body>
</html>

<?php

if(isset($_POST['display']))
{
    $pdoQuery = "SELECT * FROM users";
    $pdoQuery_run = $bdd -> query($pdoQuery);

    if($pdoQuery_run)
    {
        echo '<center>
            <table width="50%" border="1" cellpadding="5" cellspacing="5"
            <tr style="color:blue;">
                <td> ID </td>
                <td> User Firstame </td>
                <td> User Lastame </td>
                <td> Email </td>
                <td> Account Type </td>
            </tr>
        ';
        while($row = $pdoQuery_run->fetch())
        {
            echo '  <tr>
                        <th> '.$row->id.' </th>
                        <th> '.$row->firstname.' </th>
                        <th> '.$row->lastname.' </th>
                        <th> '.$row->email.' </th>
                        <th> '.$row->account_type.' </th>
                    </tr>
            
            ';
        }
        echo'</table> </center>';

    } 
    else
    {
        echo '<script> alert("No Record / Data Found")</script>';
    }
}

if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $type = $_POST['type'];


    $pdoQuery = 'UPDATE users SET firstname=?, lastname=?, email=?, account_type=? WHERE id=?';
    $pdoQuery_run = $bdd->prepare($pdoQuery);
    $pdoQuery_exec = $pdoQuery_run->execute([$firstname, $name, $email, $type, $id]);

    if($pdoQuery_exec)
    {
        echo '<script>alert("Badge Updated")</script>';
    }
    else
    {
        echo '<script>alert("Badge Not Updated")</script>';
    }

}

if(isset($_POST['delete']))
{
    $id = $_POST['id'];
    $pdoQuery = 'DELETE FROM users WHERE id=?';
    $pdoQuery_run = $bdd->prepare($pdoQuery);
    $pdoQuery_exec = $pdoQuery_run->execute([$id]);

    if($pdoQuery_exec)
    {
        echo '<script>alert("Badge Deleted")</script>';
    }
    else
    {
        echo '<script>alert("Badge Not Deleted")</script>';
    }
}

if(isset($_POST['insert']))
{
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $type = $_POST['type'];

    $pdoQuery = "INSERT INTO users(`firstname`, `lastname`, `email`, `password`, `account_type`) VALUES (?, ?, ?, ?, ?)";
    $pdoQuery_run = $bdd->prepare($pdoQuery);
    $pdoQuery_exec = $pdoQuery_run->execute([$firstname, $name, $email, password_hash($password, PASSWORD_DEFAULT), $type]);

    if($pdoQuery_exec)
    {
        echo "<script>alert('Badge Added')</script>";
    }
    else
    {
        echo "<script>alert('Badge Not Added')</script>";
    }
}

if(isset($_POST['rowcount']))
{
    $pdoQuery = "SELECT * FROM users";
    $pdoQuery_run = $bdd->query($pdoQuery);
    $pdoQuery_exec = $pdoQuery_run->rowCount();

    echo "<center><h1> THERE IS/ARE $pdoQuery_exec USER(S) IN YOUR TABLE</h1></center>";
}


?>