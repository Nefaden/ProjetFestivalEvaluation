<?php
namespace modele\metier;

/**
 * Test de la classe Lieu
 * 
 * @author sdelhommeau
 */
class Lieu {
    
    /** ID du lieu dans la base de donnée*/
    private $id;
    /**
     * Nom du lieu  
     */
    
    private $nom;
    /**
     * Adresse du lieu
     */
    
    private $adr;
    /**
     * Capacité possible de places sur le lieu
     */
    
    private $capacite;
    
    function __construct($id, $nom, $adr, $capacite) {
        $this->id = $id;
        $this->nom = $nom;
        $this->adresse = $adr;
        $this->capacite = $capacite;
    }

    function getID() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function getAdresse() {
        return $this->adr;
    }
    
    function getCapacite() {
        return $this->capacite;
    }

    function setID(ID $id) {
        $this->id = $id;
    }

    function setNom(Nom $nom) {
        $this->nom = $nom;
    }

    function setAdresse(Adresse $adr) {
        $this->adresse = $adr;
    }
    
    function setCapacite($capacite) {
        $this->capacite = $capacite;
    }
}
