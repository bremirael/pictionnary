<?php
session_start();

include_once "connector.php";

if(!isset($_SESSION['id'])) {
    header("Location: main.php");
} else {
    // ici, récupérer la liste des commandes dans la table DRAWINGS avec l'identifiant $_GET['id']
    // l'enregistrer dans la variable $commands
    $id = $_GET['id'];

    $sql = $bdd->prepare("SELECT * FROM drawings WHERE id = :id");
    $sql->bindValue(":id", $id, PDO::PARAM_INT);
    $sql->execute();
    $result = $sql->fetch(PDO::FETCH_ASSOC);
    $commands = $result['commande'];

}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8 />
    <title>Pictionnary</title>
    <link rel="stylesheet" media="screen" href="css/styles.css" >
    <script>
        // la taille et la couleur du pinceau
        var size, color;
        var x0, y0;
        var drawingCommands = <?php echo $commands;?>;
        console.log(drawingCommands);
        window.onload = function() {
            var canvas = document.getElementById('myCanvas');
            canvas.width = 400;
            canvas.height= 400;


            var context = canvas.getContext('2d');

            var start = function(c) {
                size =  c.size;
                color = c.color;

                y0 = c.y;
                x0 = c.x;
            }

            var draw = function(c) {
                context.beginPath();
                context.fillStyle = c.color.toString();
                context.arc(75, 75, 50, 0, Math.PI * 2);
                context.stroke();
                context.closePath();
                context.fill();

                y0 = c.y;
                x0 = c.x;
            }

            var clear = function() {
                context.clearRect(0, 0, canvas.width, canvas.height);
            }

            // étudiez ce bout de code
            var i = 0;
            var iterate = function() {
                if(i>=drawingCommands.length)
                    return;
                var c = drawingCommands[i];
                switch(c.command) {
                    case "start":
                        start(c);
                        break;
                    case "draw":
                        draw(c);
                        break;
                    case "clear":
                        clear();
                        break;
                    default:
                        console.error("cette commande n'existe pas "+ c.command);
                }
                i++;
                setTimeout(iterate,30);
            };

            iterate();

        };

    </script>
</head>
<body>
<canvas id="myCanvas"></canvas>
</body>
</html>