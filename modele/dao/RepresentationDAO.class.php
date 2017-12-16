<?php

namespace modele\dao;

use modele\metier\Representation;
use PDO;
use PDOStatement;

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
        $heure_debut = $enreg['HEURE_DEBUT'];
        $heure_fin = $enreg['HEURE_FIN'];
        
        //construire les attribut lieu et groupe depuis leurs identifiant
        $objetLieu = LieuDAO::getOneById($idLieu);
        $objetGroupe = GroupeDAO::getOneById($idGroupe);
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
        $stmt->bindValue(':idLieu', $lieu->getLieu()->getId());
        $stmt->bindValue(':idGroupe', $groupe->getGroupe->getId());
        $stmt->bindValue(':heure_debut', $objetRepresentation->getHeureDebut());
        $stmt->bindValue(':heure_fin', $objetRepresentation->getHeureFin());
    }

    /**
     * Retourne la liste de tous les groupes
     * @return array tableau d'objets de type Lieu
     */
    public static function getAll() {
        $lesRepresentation = array();
        $requete = "SELECT * FROM Representation ORDER BY daterepr,heure_debut";
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
    
    /**
     * Recherche une représentation selon la valeur de son identifiant
     * SELECT * FROM Representation r INNER JOIN Groupe g ON r.id_groupe = g.id INNER JOIN Lieu l ON r.id_lieu = l.id WHERE r.id = :id
     * @param string $id
     * @return Representation ; null sinon
     */
    public static function getOneById($id) {
        $objetConstruit = null;
        $requete = "SELECT * FROM Representation WHERE id = :id";
        $stmt = Bdd::getPdo()->prepare($requete);
        $stmt->bindParam(':id', $id);
        $ok = $stmt->execute();
        // attention, $ok = true pour un select ne retournant aucune ligne
        if ($ok && $stmt->rowCount() > 0) {
            $objetConstruit = self::enregVersMetier($stmt->fetch(PDO::FETCH_ASSOC));
        }
        return $objetConstruit;
    }
    /**
     * Insérer un nouvel enregistrement dans la table à partir de l'état d'un objet métier
     * @param Representation $objet objet métier à insérer
     * @return boolean =FALSE si l'opération échoue
     */
    public static function insert(Representation $objet) {
        $requete = "INSERT INTO Representation VALUES (:id, :nom, :dateRepr, :heure_debut, :heure_fin)";
        $stmt = Bdd::getPdo()->prepare($requete);
        self::metierVersEnreg($objet, $stmt);
        $ok = $stmt->execute();
        return ($ok && $stmt->rowCount() > 0);
    }
    /**
     * Mettre à jour enregistrement dans la table à partir de l'état d'un objet métier
     * @param string identifiant de l'enregistrement à mettre à jour
     * @param Representation $objet objet métier à mettre à jour
     * @return boolean =FALSE si l'opérationn échoue
     */
    public static function updateRep($id, Representation $objet) {
        $ok = false;
        $requete = "UPDATE  Representation SET NOM=:nom, DATE_REP=:dateRep,
           HEUREDEBUT=:heureDebut, HEUREFIN=:heureFin,
           WHERE ID=:id";
        $stmt = Bdd::getPdo()->prepare($requete);
        self::metierVersEnreg($objet, $stmt);
        $stmt->bindParam(':id', $id);
        $ok = $stmt->execute();
        return ($ok && $stmt->rowCount() > 0);
    }
    /**
     * Détruire un enregistrement de la table ETABLISSEMENT d'après son identifiant
     * @param string identifiant de l'enregistrement à détruire
     * @return boolean =TRUE si l'enregistrement est détruit, =FALSE si l'opération échoue
     */
    public static function delete($id) {
        $ok = false;
        $requete = "DELETE FROM Representation WHERE ID = :id";
        $stmt = Bdd::getPdo()->prepare($requete);
        $stmt->bindParam(':id', $id);
        $ok = $stmt->execute();
        $ok = $ok && ($stmt->rowCount() > 0);
        return $ok;
    }

}
