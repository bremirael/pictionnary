<?php
session_start();
session_destroy();

include "header.php";


echo '
<br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-warning">
                   <strong>Vous êtes déconnecté !!</strong> Vous allez être redirigé sur la page principale dans 3 secondes</a>.
            </div>
         </div>
    </div>
</div>';
header("refresh:3;url=main.php");
?>