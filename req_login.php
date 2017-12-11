<?php

include "header.php"

?>

<br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="form-login">
                <form method="post">
                    <h4>Connexion</h4>
                    <input type="email" id="user" name="user" class="form-control input-sm chat-input" placeholder="Votre email" required/>
                    <br>
                    <input type="password" id="pass" name="pass" class="form-control input-sm chat-input" placeholder="Votre mot de passe" required/>
                    <br>
                    <div class="wrapper">
                        <span class="group-btn">
                            <button type="submit" id="sub" name="sub" class="btn btn-primary btn-md" >Connexion <i class="fa fa-sign-in"></i></button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php

if (isset($_POST['sub'])) {
    if (isset($_POST['user']) && isset($_POST['pass'])) {
        $email = htmlspecialchars($_POST['user']);
        $password = htmlspecialchars($_POST['pass']);
        $sql = $bdd->prepare("SELECT * FROM users WHERE email = :email ");
        $sql->bindValue(":email", $email);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        $pass = $result['password'];
        if ($pass == $password)
        {
            $_SESSION['id'] = $result['id'];
            $_SESSION['email'] = $result['email'];
            $_SESSION['nom'] = $result['nom'];
            $_SESSION['prenom'] = $result['prenom'];
            $_SESSION['couleur'] = $result['couleur'];
            $_SESSION['profilepic'] = $result['profilepic'];

            echo '<br><br>
                  <div class="alert alert-success">
                    <strong>Bravo</strong> Vous allez être redirigé sur la page principale dans 3 secondes</a>.
                  </div>';
            header("refresh:3;url=main.php");

        }

    }
}


