<?php

/**
 * Contrôleur : gestion des Representations
 */
use modele\dao\RepresentationDAO;
use modele\metier\Representation;
use modele\dao\Bdd;

require_once __DIR__ . '/includes/autoload.php';
Bdd::connecter();

include("includes/_gestionErreurs.inc.php");
//include("includes/gestionDonnees/_connexion.inc.php");
//include("includes/gestionDonnees/_gestionBaseFonctionsCommunes.inc.php");
// 1ère étape (donc pas d'action choisie) : affichage du tableau des 
// représentations
if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'initial';
}

$action='initial';
    include("vues/Representations/vObtenirRepresentation.php");
  
