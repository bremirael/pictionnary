<?php

include "header.php";

?>



<body>



<?php   if (isset($_SESSION['email'])) { ?>
            <div>
                <br><br><br>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-info">
                                <strong>Vous voulez peindre ?</strong> <a href="paint.php" class="alert-link">cliquez ici</a>.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php   } else { ?>
            <div>
                <br><br><br>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-info">
                                <strong>Vous devez vous connecter ppour peindre !!</strong>.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php }
            if (isset($_SESSION['id']) AND isset($_SESSION['id_users'])){
                $sql = $bdd->prepare("SELECT * FROM drawings WHERE id_users = :id_users");
                $sql->bindValue(':id_users', $_SESSION['id_users'], PDO::PARAM_INT);
                $sql->execute();
                while ($result = $sql->fetch(PDO::FETCH_ASSOC)) {
                    echo '
                        <div>
                            <br><br><br>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-success">
                                            <strong>Voir la peinture n°'.$result['id'].' </strong> <a href="guess.php?id='.$result['id'].'" class="alert-link">cliquez ici</a>.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                }
            }
        ?>
</body>