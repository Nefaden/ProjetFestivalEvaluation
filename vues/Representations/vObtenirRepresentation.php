<?php

/**
 * Contrôleur : gestion des representations
 */
use modele\dao\RepresentationDAO;
use modele\dao\GroupeDAO;
use modele\dao\LieuDAO;
use modele\dao\Bdd;

require_once __DIR__ . '/../../includes/autoload.php';
Bdd::connecter();

include("includes/_debut.inc.php");


// AFFICHER L'ENSEMBLE DES REPRESENTATION
// CETTE PAGE CONTIENT DE PLUSIEURS TABLEAUX SUIVANT LES DATES DES REPRESENTATION CONSTITUÉ D'1 LIGNE D'EN-TÊTE ET D'1 LIGNE PAR
// REPRESENTATION
// Variable contenant les informations de la représentation
$lesGroupes = GroupeDAO::getAll();
$nbGroupes = count($lesGroupes);
$lesLieux = LieuDAO::getAll();
$nbLieux = count($lesLieux);
$lesRepresentations = RepresentationDAO::getAll();
$nbRepresentations = count($lesRepresentations);
echo"<h2 class=center>Programme par jours</h2><br>";
if ($nbGroupes != 0 && $nbLieux != 0) {

    // BOUCLE SUR LES Date de représentation
    $test = 0;
    $dateTest = "0";
    foreach ($lesRepresentations as $uneRepresentation) {
        $id = $uneRepresentation->getId();
        $dateRepresentation = $uneRepresentation->getDateRepr();

        if ($dateRepresentation != $dateTest) {
            if ($test == 1) {
                echo"</table><br>";
            }
            $dateTest = $dateRepresentation;
            echo "<strong>$dateRepresentation</strong><br>
            <table width='45%' cellspacing='0' cellpadding='0' class='tabQuadrille'>";
            echo "
                <tr class='enTeteTabQuad'>
                   <td width='30%'>Lieu</td>
                   <td width='30%'>Groupe</td>
                   <td width='10%'>Heure Début</td>
                   <td width='10%'>Heure Fin</td>
                   <td width='10%'>Modifier</td> 
                   <td width='10%'>Supprimer</td>
                </tr>";
        }

        echo " 
            <tr class='ligneTabQuad'>
                <td>" . $uneRepresentation->getLieu()->getNom() . "</td>
                <td>" . $uneRepresentation->getGroupe()->getNom() . "</td>
                <td><center>" . $uneRepresentation->getHeureDebut() . "</center></td>
                <td><center>" . $uneRepresentation->getHeureFin() . "</center></td>
                <td><center><a class='modifier' href='cGestionRepresentation.php?action=demanderModifierRepr&id=$id'>Modifier</a></center></td>
                <td><center><a class='modifier' href='cGestionRepresentation.php?action=demanderSupprimerRepr&id=$id'>Supprimer</a></center></td>
            </tr>";

        if ($test == 0) {
            $test = 1;
        }
    }
}
    