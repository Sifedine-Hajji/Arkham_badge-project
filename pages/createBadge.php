<?php
    include('../components/db.php');

    if (!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $req = $bdd->prepare("SELECT EXISTS(SELECT email FROM people WHERE email = ?)");
        $req->execute([filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)]);
        $result = $req->fetchColumn();
        $req->closeCursor();
        if (!$result) {
            $req = $bdd->prepare("INSERT INTO people (first_name, last_name, email, password, account_type) VALUES(?, ?, ?, ?, 'student')");
            $req->execute([
                strip_tags(trim($_POST['firstName'])),
                strip_tags(trim($_POST['lastName'])),
                filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
                password_hash($_POST['password'], PASSWORD_DEFAULT)
            ]);
            $req->closeCursor();
            echo "Thank you for your registration!";
        } else {
            echo "This email is already used";
        }
    }
    else {
        ?>
        <form method="post" action="">
        <form action="accept-file.php" method="post" enctype="multipart/form-data">
            Your Photo: <input type="file" name="image" size="25" />
            <input type="submit" name="submit" value="Submit" />
        </form>
            <p><label for="firstName">First name : </label><input type="text" id="firstName" name="firstName"></p>
            <p><label for="lastName">Last name : </label><input id="lastName" name="lastName" type="text"></p>
            <p><label for="email">Email : </label><input id="email" name="email" type="mail"></p>
            <p><label for="password">Password : </label><input id="password" name="password" type="password"></p>
            <input type="submit">
        </form>
        <?php
    }
?>