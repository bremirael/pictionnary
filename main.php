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

        <?php } ?>
</body>