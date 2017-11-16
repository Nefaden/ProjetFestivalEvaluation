<?php

namespace modele\dao;

use modele\metier\Representation;
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
     * @return Representation
     */
    protected static function enregVersMetier(array $enreg) {
        $id = $enreg['ID'];
        $dateRepr = $enreg['DATEREPR'];
        $idLieu = $enreg['ID_LIEU'];
        $idGroupe = $enreg['ID_GROUPE'];
        //construire les attribut lieu et groupe depuis leurs identifiant
        $objetLieu = LieuDAO::getOneById($idLieu);
        $objetGroupe = GroupeDAO::getOneById($idGroupe);
        $heure_debut = $enreg['HEURE_DEBUT'];
        $heure_fin = $enreg['HEURE_FIN'];
        //instancier l'objet representation
        $objetRepresentation = new Representation($id, $dateRepr, $objetLieu, $objetGroupe, $heure_debut, $heure_fin);

        return $objetRepresentation;
    }

    protected static function metierVersEnreg(Representation $objetRepresentation, \PDOStatement $stmt) {
        // On utilise bindValue plutôt que bindParam pour éviter des variables intermédiaires
        /* @var $lieu Lieu */
        $lieu = $objetRepresentation->getLieu();
        /* @var $groupe Groupe */
        $groupe = $objetRepresentation->getGroupe();
        $stmt->bindValue(':id', $objetRepresentation->getId());
        $stmt->bindValue(':dateRepr', $objetRepresentation->getDateRepr());
        $stmt->bindValue(':idLieu', $lieu->getId());
        $stmt->bindValue(':idGroupe', $groupe->getId());
        $stmt->bindValue(':heure_debut', $objetRepresentation->getHeureDebut());
        $stmt->bindValue(':heure_fin', $objetRepresentation->getHeureFin());
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

}
