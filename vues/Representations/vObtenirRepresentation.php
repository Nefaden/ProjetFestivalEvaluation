<?php

/**
 * Contrôleur : gestion des representations
 */
use modele\dao\RepresentationDAO;
use modele\dao\GroupeDAO;
use modele\dao\LieuDAO;
use modele\metier\Representation;
use modele\metier\Groupe;
use modele\metier\Lieu;
use modele\dao\Bdd;

require_once __DIR__ . '/../../includes/autoload.php';
Bdd::connecter();

include("includes/_debut.inc.php");

// AFFICHER L'ENSEMBLE DES REPRESENTATION
// CETTE PAGE CONTIENT DE PLUSIEURS TABLEAUX SUIVANT LES DATES DES REPRESENTATION CONSTITUÉ D'1 LIGNE D'EN-TÊTE ET D'1 LIGNE PAR
// REPRESENTATION

echo "
<br>
<table width='55%' cellspacing='0' cellpadding='0' class='tabNonQuadrille'>

   <tr class='enTeteTabNonQuad'>
      <td colspan='4'><strong>Programme par jours</strong></td>
   </tr>";

$lesRepresentation = RepresentationDAO::getAll();
// BOUCLE SUR LES REPRESENTATIONS
foreach ($lesRepresentation as $uneRepresentation) {
    $id = $uneRepresentation->getId();
    $lieu = $unLieu->getNom();
    $groupe = $unGroupe->getNom();
    $heure_debut = $uneRepresentation->getHeureDebut();
    $heure_fin = $uneRepresentation->getHeureFin();
    echo "
        <tr class='ligneTabNonQuad'>
            <td width='52%'>$lieu</td>
        </tr>
        
        <tr class='ligneTabNonQuad'>
            <td width='52%'>$groupe</td>
        </tr>
        
        <tr class='ligneTabNonQuad'>
            <td width='52%'>$heure_debut</td>
        </tr>
        
        <tr class='ligneTabNonQuad'>
            <td width='52%'>$heure_fin</td>
        </tr>
      
         <td width='16%' align='center'> 
         <a href='cGestionEtablissements.php?action=demanderModifierRepr&id=$id'>
         Modifier</a></td>
         

        <td width='16%' align='center'> 
         <a href='cGestionEtablissements.php?action=demanderSupprRepr&id=$id'>
         Supprimer</a></td>";
}
echo "
</table>
<br>
<a href='cGestionEtablissements.php?action=demanderCreerEtab'>
Création d'un établissement</a >";

include("includes/_fin.inc.php");

