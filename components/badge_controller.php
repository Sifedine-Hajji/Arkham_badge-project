<?php 
include('db.php');
$bdd = createCursor();
$bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
?>

<?php
$id = '';
$img = '';
$name = '';
$desc = '';
    if(isset($_POST['search']))
    {
        $id = $_POST['id'];

        $pdoQuery="SELECT id_badges, img_badges, nom_badges, desc_badges FROM badges WHERE id_badges = :id";
        $pdoQuery_run = $bdd -> prepare($pdoQuery);
        $pdoQuery_exec = $pdoQuery_run->execute(array(":id"=>$id));

        if($pdoQuery_exec)
        {
            if($pdoQuery_run->rowcount()>0)
            {
                foreach($pdoQuery_run as $row)
                {
                    $id = $row->id_badges;
                    $img = $row->img_badges;
                    $name = $row->nom_badges;
                    $desc = $row->desc_badges;
                }
            }
            else
            {
                echo '<script> alert("No Badge Found")</script>';
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
                        Search a badge by ID: <input type="text" name="id" value="<?php echo $id ?>"  placeholder="Enter an ID"/><br><br>
                        Badge Image: <input type="text" name="img" value="<?php echo $img ?>" placeholder="Enter image path"/><br><br>
                        Badge Name: <input type="text" name="name" value="<?php echo $name ?>" placeholder="Enter a name"/><br><br>
                        Badge Description: <input type="" name="desc" value="<?php echo $desc ?>" placeholder="Enter a description"/><br><br>
                        
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
    $pdoQuery = "SELECT id_badges, nom_badges, desc_badges FROM badges";
    $pdoQuery_run = $bdd -> query($pdoQuery);

    if($pdoQuery_run)
    {
        echo '<center>
            <table width="50%" border="1" cellpadding="5" cellspacing="5"
            <tr style="color:blue;">
                <td> ID </td>
                <td> Badge Name </td>
                <td> Description </td>
            </tr>
        ';
        while($row = $pdoQuery_run->fetch(PDO::FETCH_OBJ))
        {
            echo '  <tr>
                        <th> '.$row->id_badges.' </th>
                        <th> '.$row->nom_badges.' </th>
                        <th> '.$row->desc_badges.' </th>
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
    $name = $_POST['name'];
    $desc = $_POST['desc'];


    $pdoQuery = 'UPDATE badges SET nom_badges=?, desc_badges=? WHERE id_badges=?';
    $pdoQuery_run = $bdd->prepare($pdoQuery);
    $pdoQuery_exec = $pdoQuery_run->execute([$name, $desc, $id]);

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
    $pdoQuery = 'DELETE FROM badges WHERE id_badges=?';
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
    $name = $_POST['name'];
    $img = $_POST['img'];
    $desc = $_POST['desc'];

    $pdoQuery = "INSERT INTO badges(`nom_badges`, `img_badges`, `desc_badges`) VALUES (?, ?, ?)";
    $pdoQuery_run = $bdd->prepare($pdoQuery);
    $pdoQuery_exec = $pdoQuery_run->execute([$name, $img, $desc]);

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
    $pdoQuery = "SELECT * FROM badges";
    $pdoQuery_run = $bdd->query($pdoQuery);
    $pdoQuery_exec = $pdoQuery_run->rowCount();

    echo "<center><h1> THERE IS $pdoQuery_exec ELEMENT(S) IN YOUR TABLE</h1></center>";
}


?>