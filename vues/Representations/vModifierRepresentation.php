<?php

use modele\dao\RepresentationDAO;
use modele\metier\Representation;
use modele\dao\GroupeDAO;
use modele\metier\Groupe;
use modele\dao\LieuDAO;
use modele\dao\Bdd;


require_once __DIR__ . '/../../includes/autoload.php';
Bdd::connecter();

include("includes/_debut.inc.php");


if ($action == 'demanderModifierRepr') {
    $uneRepr = RepresentationDAO::getOneById($id);
    /* @var $uneRepr Representation  */
    $uneDate = $uneRepr->getDateRepr();
    /* $lesGroupes = GroupeDAO::getAll();
      $lesLieux = LieuDAO::getAll(); */
    $unGroupe = $uneRepr->getGroupe()->getNom();
    $lesGroupes = GroupeDAO::getAll();
    $heure_debut = $uneRepr->getHeureDebut();
    $heure_fin = $uneRepr->getHeureFin();
}

$action = "validerModifierRepr";

echo '
    <tr class="ligneTabNonQuad">
         <td> Date*: </td>
         <td><input type="text" value="' . $uneDate . '" name="Date" size="50" 
         maxlength="45"></td>

      <tr class="ligneTabNonQuad">';

echo'<tr class="ligneTabNonQuad">
         <td> Groupe*: </td>';
 		foreach ($lesGroupes as $unGroupe)
 		{
    			echo '<tr>';
    			echo '<td>'.$unGroupe["NOM"].'</td>';
    			echo '</tr>';
 		}
echo'
			
      </tr>
      
      
      
      <tr class="ligneTabNonQuad">
         <td> HeureDebut*: </td>
         <td><input type="text" value="' . $heure_debut . '" name="Heure de début" 
         size="7" maxlength="5"></td>
      </tr>
      <tr class="ligneTabNonQuad">
         <td> HeureFin*: </td>
         <td><input type="text" value="' . $heure_fin . '" name="Heure de fin" size="40" 
         maxlength="35"></td>
      </tr>
      <tr class="ligneTabNonQuad">
         <td> Type*: </td>
         <td></tr>';

/*$lesGroupes = mysql_query("SELECT NOM FROM Groupes ORDER BY nom");
<label for="groupe">Groupes : </label>
<?php
			echo "<SELECT Name=\"Groupe\">";
			while($listeGroupes=mysql_fetch_array($lesGroupes))
                        {
				echo "<OPTION Value=\"".$listeGroupe['NOM']."\">".$listeGroupe['NOM']."</OPTION>";
			}
			echo "</SELECT>";
			
	   ?>*/
                        
                        /*<tr class="ligneTabNonQuad">
         <td> Lieu*: </td>
         <td><input type="text" value="' . $lesLieux . '" name="Lieux" 
         size="50" maxlength="45"></td>
      </tr>*/