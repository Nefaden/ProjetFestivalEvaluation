<!--
 * Test unitaire de l'objet Representation
 * 
 * @author ydurand
 -->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Represensation Test</title>
    </head>
    <body>
        <?php
        use modele\metier\Representation;
        require_once __DIR__ . '/../includes/autoload.php';
        echo "<h2>Test unitaire de la classe métier Representation</h2>";
        $uneRepresentation = new Representation(1, "11/07/2017", "SALLE DU PANIER FLEURI", "PanamaFuerte Raza", "20:30", "21:45");
        var_dump($uneRepresentation);
        ?>
    </body>
</html>
