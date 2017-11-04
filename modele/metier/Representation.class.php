<?php
namespace modele\metier;

/**
 * Test de la classe Representation
 * 
 * @author ydurand
 */
class Representation {
    
    /** ID de la représentation dans la base de donnée*/
    private $id;
    
    /** date de la représentation */
    private $date;
    
    /** Lieu où la représentation à lieu */
    private $lieu;
    
    /** Nom du groupe lié à la représentation*/
    private $groupe;
    
    /** L'heure du début de la représentation*/
    private $heure_debut;
    
    /** l'heure de fin de la représentation*/
    private $heure_fin;
    
    function __construct($id, $date, $lieu, $groupe, $heure_debut, $heure_fin) {
        $this->id = $id;
        $this->date = $date;
        $this->lieu = $lieu;
        $this->groupe = $groupe;
        $this->heure_debut = $heure_debut;
        $this->heure_fin = $heure_fin;
    }

    function getID() {
        return $this->id;
    }

    function getDate() {
        return $this->date;
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

    function setDate(Date $date) {
        $this->date = $date;
    }

    function setLieu(Lieu $lieu) {
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
