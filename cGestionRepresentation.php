<?php

/**
 * Contrôleur : gestion des Representations
 */
use modele\dao\RepresentationDAO;
use modele\dao\GroupeDAO;
use modele\dao\LieuDAO;
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

$action = $_REQUEST['action'];

// Aiguillage selon l'étape
switch ($action) {
    case 'initial' :
        include("vues/Representations/vObtenirRepresentation.php");
        break;

    case 'demanderSupprimerRepr':
        $id = $_REQUEST['id'];
        include("vues/Representations/vSupprimerRepresentation.php");
        break;

    /* case 'demanderCreerRepr':
      include("vues/GestionEtablissements/vCreerRepresentation.php");
      break; */

    case 'demanderModifierRepr':
        $id = $_REQUEST['id'];
        include("vues/Representations/vModifierRepresentation.php");
        break;

    case 'validerSupprimerRepr':
        $id = $_REQUEST['id'];
        RepresentationDAO::delete($id);
        include("vues/Representations/vObtenirRepresentation.php");
        break;



// Fermeture de la connexion au serveur MySql
        Bdd::deconnecter();

        function verifierDonneesGrpC($id, $nom, $identite, $adresse, $nbPers, $nomPays, $hebergement) {
            if ($id == "" || $nom == "" || $identite == "" || $adresse == "" ||
                    $nbPers == "" || $nomPays == "" || $hebergement == "") {
                ajouterErreur('Chaque champ suivi du caractère * est obligatoire');
            }
            if ($id != "") {
                // Si l'id est constitué d'autres caractères que de lettres non accentuées 
                // et de chiffres, une erreur est générée
                if (!estChiffresOuEtLettres($id)) {
                    ajouterErreur
                            ("L'identifiant doit comporter uniquement des lettres non accentuées et des chiffres");
                } else {
                    if (GroupeDAO::isAnExistingId($id)) {
                        ajouterErreur("Le groupe $id existe déjà");
                    }
                }
            }
            if ($nom != "" && GroupeDAO::isAnExistingName(true, $id, $nom)) {
                ajouterErreur("Le groupe $nom existe déjà");
            }
            if ($nom != "") {
                // Si l'id est constitué que de chiffres, une erreur sera généré.
                if (!estLettre($nom)) {
                    ajouterErreur("Le groupe ne doit contenir que des lettres");
                }
            }
        }

        function verifierDonneesGrpM($id, $nom, $identite, $adresse, $nbPers, $nomPays, $hebergement) {
            if ($id == "" || $nom == "" || $identite == "" || $adresse == "" ||
                    $nbPers == "" || $nomPays == "" || $hebergement == "") {
                ajouterErreur('Chaque champ suivi du caractère * est obligatoire');
            }
            if ($nom != "" && GroupeDAO::isAnExistingName(false, $id, $nom)) {
                ajouterErreur("Le groupe $nom existe déjà");
            }
            if ($nom != "") {
                // Si l'id est constitué que de chiffres, une erreur sera généré.
                if (!estLettre($nom)) {
                    ajouterErreur("Le groupe ne doit contenir que des lettres");
                }
            }
        }

// Fermeture de la connexion au serveur MySql
        Bdd::deconnecter();
}