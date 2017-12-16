<?php
namespace modele\metier;

/**
 * Test de la classe Representation
 * 
 * @author ydurand
 */
class Representation {
    
    /** ID de la représentation dans la base de donnée
     *  @var int
     */
    private $id;
    
    /** date de la représentation 
     * @var String
     */
    private $dateRepr;
    
    /** Lieu où la représentation à lieu 
     *  @var Lieu
     */
    private $lieu;
    
    /** Nom du groupe lié à la représentation
     *  @var Groupe
     */
    private $groupe;
    
    /** L'heure du début de la représentation
     * @var String
     */
    private $heure_debut;
    
    /** l'heure de fin de la représentation
     * @var String
     */
    private $heure_fin;
    
    function __construct($id, $dateRepr, $lieu, $groupe, $heure_debut, $heure_fin) {
        $this->id = $id;
        $this->dateRepr = $dateRepr;
        $this->lieu = $lieu;
        $this->groupe = $groupe;
        $this->heure_debut = $heure_debut;
        $this->heure_fin = $heure_fin;
    }

    function getID() {
        return $this->id;
    }

    function getDateRepr() {
        return $this->dateRepr;
    }

    function getLieu() {
        return $this->lieu;
    }
    
    function getGroupe() {
        return $this->groupe;
    }
    
    function getHeureDebut() {
        return $this->heure_debut;
    }
    
    function getHeureFin() {
        return $this->heure_fin;
    }

    function setID(ID $id) {
        $this->id = $id;
    }

    function setDateRepr(Date $dateRepr) {
        $this->dateRepr = $dateRepr;
    }

    function setLieu(Lieu_Nom $lieu) {
        $this->lieu = $lieu;
    }
    
    function setGroupe(Groupe $groupe) {
        $this->groupe = $groupe;
    }
    
    function setHeureDebut(HeureDebut $heure_debut) {
        $this->heure_debut = $heure_debut;
    }
    
    function setHeureFin(HeureFin $heure_fin) {
        $this->heure_fin = $heure_fin;
    }

}
