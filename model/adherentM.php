<?php 
class Adherent {
    private $NumAdherent;
    private $Nom;
    private $Prénom;
    private $Adresse;
    private $Email;
    private $DateInscription;

    function __construct($NumAdherent,$Nom,$Prénom,$Adresse,$Email,$DateInscription){
        $this->NumAdherent=$NumAdherent;
        $this->Nom=$Nom;
        $this->Prénom=$Prénom;
        $this->Adresse=$Adresse;
        $this->Email=$Email;
        $this->DateInscription=$DateInscription;
    }

    //GETTERS
    function getNumAdherent(){
        return $this->NumAdherent;
    }
    function getNom(){
        return $this->Nom;
    }
    function getPrénom(){
        return $this->Prénom;
    }
    function getAdresse(){
        return $this->Adresse;
    }
    function getEmail(){
        return $this->Email;
    }
    function getDateInscription(){
        return $this->DateInscription;
    }

    //SETTERS
    function setNumAdherent(string $NumAdherent){
        $this->NumAdherent=$NumAdherent;
    }
    function setNom(string $Nom){
        $this->Nom=$Nom;
    }
    function setPrénom(string $Prénom){
        $this->Prénom=$Prénom;
    }
    function setAdresse(string $Adresse){
        $this->Adresse=$Adresse;
    }
    function setEmail(string $Email){
        $this->Email=$Email;
    }
    function setDateInscription(string $DateInscription){
        $this->DateInscription=$DateInscription;
    }

}
?>