<!--
 * Description of testLieuDAO
 * Classe DAO :  LieuDAO
 * @author ydurand
-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>RepresentationDao : test</title>
    </head>

    <body>

        <?php

        use modele\dao\RepresentationDAO;
        use modele\dao\Bdd;

require_once __DIR__ . '/../includes/autoload.php';

        $id = '1';
        Bdd::connecter();

        echo "<h2>Test RepresentationDAO</h2>";

        /*
          // Test n°1
          echo "<h3>Test getOneById</h3>";
          try {
          $objet = RepresentationDAO::getOneById($id);
          var_dump($objet);
          } catch (Exception $ex) {
          echo "<h4>*** échec de la requête ***</h4>" . $ex->getMessage();
          }
         */

        // Test n°2
        echo "<h3>Test getAll</h3>";
        try {
            $lesObjets = RepresentationDAO::getAll();
            var_dump($lesObjets);
        } catch (Exception $ex) {
            echo "<h4>*** échec de la requête ***</h4>" . $ex->getMessage();
        }


        Bdd::deconnecter();
        ?>


    </body>
</html>
