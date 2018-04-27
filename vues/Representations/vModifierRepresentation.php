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
    $lesGroupes = GroupeDAO::getAll();
    $lesLieux = LieuDAO::getAll();
    $heure_debut = $uneRepr->getHeureDebut();
    $heure_fin = $uneRepr->getHeureFin();
}

$action = "validerModifierRepr";

echo '<tr class="enTeteTabQuad">
    <td>Modifier la représentation</td>
    </tr>';

echo '
    <tr class="ligneTabNonQuad">
         <td> Date*: </td>
         <td><input type="text" placeholder="date de la représentation" value="' . $uneDate . '" name="Date" size="50" 
         maxlength="45"></td>
    </tr></br></br>';


echo'<tr class="ligneTabNonQuad">
<td> Groupe *: </td>';
/* @var $unGroupe Groupe */
echo '<tr>';
echo '<td>';
echo '<select>';
foreach ($lesGroupes as $unGroupe => $option)
{
echo '<option value="$option">' . $unGroupe->getNom() . '</option>';
}
echo '</select>';
echo '</td>';
echo '</tr>';

echo'<tr class="ligneTabNonQuad">
<td> Groupe *: </td>';
/* @var $unGroupe Groupe */
echo '<tr>';
echo '<td>';
echo '<select>';
foreach ($lesLieux as $unLieu => $option)
{
echo '<option value="$option">' . $unLieu->getNom() . '</option>';
}
echo '</select>';
echo '</td>';
echo '</tr>';

echo '<tr class="ligneTabNonQuad">
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