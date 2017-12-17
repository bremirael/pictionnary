<?php
session_start();

include_once "connector.php";


if(!isset($_SESSION['id'])) {
    header("Location: main.php");
} else {
    $id = $_SESSION['id'];
    $command = $_POST['drawingCommands'];
    $picture = $_POST['picture'];
}


try {

    $sql = $bdd->prepare("INSERT INTO drawings (commande, dessin, id_users) "
            . "VALUES (:commande, :dessin, :id_users)");
    $sql->bindValue(":commande", $command);
    $sql->bindValue(':dessin', $picture);
    $sql->bindValue(':id_users', $id);
    $sql->execute();

    if (!$sql->execute()) {
        echo "PDO::errorInfo():<br/>";
        $err = $sql->errorInfo();
        print_r($err);
    } else {

        // ensuite on requête à nouveau la base pour l'utilisateur qui vient d'être inscrit, et
        $sql = $bdd->query("SELECT d.id, d.commande, d.dessin, d.id_users FROM drawings d WHERE d.id_users='".$id."'");
        if ($sql->rowCount()<1) {
            header("Location: main.php?erreur=".urlencode("un problème est survenu"));
        } else {
            // on récupère la ligne qui nous intéresse avec $sql->fetch(),
            $result = $sql->fetch(PDO::FETCH_ASSOC);

            $_SESSION['id_users'] = $result['id_users'];
        }

            header("Location: main.php");
    }
    $bdd = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    $dbh = null;
    die();
}