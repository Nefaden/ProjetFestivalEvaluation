<?php

use modele\dao\GroupeDAO;
use modele\metier\Groupe;
use modele\dao\AttributionDAO;
use modele\dao\Bdd;

require_once __DIR__ . '/../../includes/autoload.php';
Bdd::connecter();

include("includes/_debut.inc.php");


// AFFICHER L'ENSEMBLE DES GROUPES
// CETTE PAGE CONTIENT UN TABLEAU CONSTITUÉ D'1 LIGNE D'EN-TÊTE ET D'1 LIGNE PAR
// GROUPE
/**
 * Description of vObtenirGroupes
 *
 * @author ydurand
 */
echo "
<br>
<table width='55%' cellspacing='0' cellpadding='0' class='tabNonQuadrille'>

   <tr class='enTeteTabNonQuad'>
      <td colspan='4'><strong>Liste des Groupes</strong></td>
   </tr>";

$lesGroupes = GroupeDao::getAll();
// BOUCLE SUR LES GROUPES
foreach ($lesGroupes as $unGroupe) {
    $id = $unGroupe->getId();
    $nom = $unGroupe->getNom();
    echo "
		<tr class='ligneTabNonQuad'>
         <td width='52%'>$nom</td>";

    echo "
      <td width='16%'>&nbsp; </td>";

    echo "
      </tr>";
}

include("includes/_fin.inc.php");

