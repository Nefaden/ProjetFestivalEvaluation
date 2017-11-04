<?php
use modele\dao\RepresentationDAO;
use modele\metier\Representation;
use modele\dao\Bdd;
require_once __DIR__ . '/../../includes/autoload.php';
Bdd::connecter();

include("includes/_debut.inc.php");

// SUPPRIMER LA REPRESENTATION SÉLECTIONNÉE

$id = $_REQUEST['id'];  // Non obligatoire mais plus propre
$uneRepresentation = RepresentationDAO::getOneById($id);
/* @var $uneRepresentation Representation  */
$groupe = $uneRepresentation->getGroupe();
echo "
<br><center>Voulez-vous vraiment supprimer la représentation du groupe $groupe ?
<h3><br>
<a href='cGestionRepresentation.php?action=validerSupprimerRepresentation&id=$id'>Oui</a>
&nbsp; &nbsp; &nbsp; &nbsp;
<a href='cGestionRepresentation.php?'>Non</a></h3>
</center>";

include("includes/_fin.inc.php");

