<?php
namespace modele\dao;

use modele\metier\Lieu;
use PDO;

/**
 * Description of RepresentationDAO
 * Classe métier :  Representation
 * @author ydurand
 */
class RepresentationDAO {

     /**
     * Instancier un objet de la classe Representation à partir d'un enregistrement de la table Representation
     * @param array $enreg
     * @return Lieu
     */
    protected static function enregVersMetier(array $enreg) {
        $id = $enreg['ID'];
        $date = $enreg['DATEREPR'];
        $lieu = $enreg['LIEU'];
        $groupe = $enreg['GROUPE'];
        $heure_debut = $enreg['HEURE_DEBUT'];
        $heure_fin = $enreg['HEURE_FIN'];
        $uneRepresentation = new Lieu($id, $date, $lieu, $groupe, $heure_debut, $heure_fin);

        return $uneRepresentation;
    }


    /**
     * Retourne la liste de tous les groupes
     * @return array tableau d'objets de type Lieu
     */
    public static function getAll() {
        $lesRepresentation = array();
        $requete = "SELECT * FROM Representation";
        $stmt = Bdd::getPdo()->prepare($requete);
        $ok = $stmt->execute();
        if ($ok) {
            // Tant qu'il y a des enregistrements dans la table
            while ($enreg = $stmt->fetch(PDO::FETCH_ASSOC)) {
                //ajoute un nouveau lieu au tableau
                $lesRepresentation[] = self::enregVersMetier($enreg);
            }
        }
        return $lesRepresentation;
    }
    
    public static function getAllbyDate1() {
        $lesRepresentation = array();
        $requete = "SELECT * FROM Representation WHERE daterepr = '11/07/2017' ";
        $stmt = Bdd::getPdo()->prepare($requete);
        $ok = $stmt->execute();
        if ($ok) {
            // Tant qu'il y a des enregistrements dans la table
            while ($enreg = $stmt->fetch(PDO::FETCH_ASSOC)) {
                //ajoute un nouveau lieu au tableau
                $lesRepresentation[] = self::enregVersMetier($enreg);
            }
        }
        return $lesRepresentation;
    }
}