<?php 
    require_once "./../controllers/adherentC.php";
    $adherentC = new AdherentC();
    $adherentC->supprimerAdhérent($_POST['numAdherent']);
    header("Location: ./affichierListesAdh.php");

?>