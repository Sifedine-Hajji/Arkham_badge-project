<?php
    include('db.php');
    $bdd = createCursor();


    if (!empty($_POST['badgeName']) && !empty($_POST['badgeDesc'])) {
        $req = $bdd->prepare("SELECT EXISTS(SELECT nom_badges FROM badges WHERE nom_badges = ?)");
        $req->execute([filter_var($_POST['badgeName'])]);
        $result = $req->fetchColumn();
        $req->closeCursor();
        if (!$result) {
            $req = $bdd->prepare("INSERT INTO badges (img_badges, nom_badges, desc_badges) VALUES('yo', ?, ?)");
            $req->execute([
                strip_tags(trim($_POST['badgeName'])),
                strip_tags(trim($_POST['badgeDesc'])),
            ]);
            $req->closeCursor();
            echo "New badge has been created!";
        } else {
            echo "This badge is already existing";
        }
    }
    else {
        ?>
        <form method="post" action="">
            <p><label for="badgeName">Badge name : </label><input type="text" id="firstName" name="badgeName"></p>
            <p><label for="badgeDesc">Badge description : </label><input id="badgeDesc" name="badgeDesc" type="text"></p>
            <input type="submit">
        </form>
        <?php
    }
?>