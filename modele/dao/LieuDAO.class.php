<?php
namespace modele\dao;

use modele\metier\Lieu;
use PDO;

/**
 * Description of LieuDAO
 * Classe métier :  Lieu
 * @author ydurand
 */
class LieuDAO {

     /**
     * Instancier un objet de la classe Lieu à partir d'un enregistrement de la table Lieu
     * @param array $enreg
     * @return Lieu
     */
    protected static function enregVersMetier(array $enreg) {
        $id = $enreg['ID'];
        $nom = $enreg['NOM'];
        $adresse = $enreg['ADR'];
        $capacite = $enreg['CAPACITE'];
        $unLieu = new Lieu($id, $nom, $adresse, $capacite);

        return $unLieu;
    }


    /**
     * Retourne la liste de tous les groupes
     * @return array tableau d'objets de type Lieu
     */
    public static function getAll() {
        $lesLieux = array();
        $requete = "SELECT * FROM Lieu";
        $stmt = Bdd::getPdo()->prepare($requete);
        $ok = $stmt->execute();
        if ($ok) {
            // Tant qu'il y a des enregistrements dans la table
            while ($enreg = $stmt->fetch(PDO::FETCH_ASSOC)) {
                //ajoute un nouveau lieu au tableau
                $lesLieux[] = self::enregVersMetier($enreg);
            }
        }
        return $lesLieux;
    }

    /**
     * Recherche un Lieu selon la valeur de son identifiant
     * @param string $id
     * @return Lieu le lieu trouvé ; null sinon
     */
    public static function getOneById($id) {
        $unLieu = null;
        $requete = "SELECT * FROM Lieu WHERE ID = :id";
        $stmt = Bdd::getPdo()->prepare($requete);
        $stmt->bindParam(':id', $id);
        $ok = $stmt->execute();
        // attention, $ok = true pour un select ne retournant aucune ligne
        if ($ok && $stmt->rowCount() > 0) {
            $unLieu = self::enregVersMetier($stmt->fetch(PDO::FETCH_ASSOC));
        }
        return $unLieu;
    }
}
