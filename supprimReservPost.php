<?php   
session_start();
require_once "connexion.php";
     //Notre fonction permettant de nettoyer les variables envoyées sur le serveur
function valid_donnees($donnees){
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}
$idCreneau = valid_donnees($_POST['idcreneau']);
$idsalle = valid_donnees($_POST['idsalle']);
$placetotal = valid_donnees($_POST['placetotal']);
$lign= valid_donnees($_POST['ligne']);
//Verifier si les variables token sont bien la
if (isset($_SESSION['token']) && isset($_SESSION['token_time']) ) {
    //Si le referer est bon
    if($_SERVER['HTTP_REFERER'] == 'http://localhost/MboaProject/listReservation.php')
    {
      
    //Requete pour supprimer une reservation
        $req= $bdd->prepare("DELETE FROM reserver where login=:login AND id_salle=:idSalle AND id_creneau=:idCreneau");
        $req->bindParam(":login",$_SESSION['login']);
        $req->bindParam(":idSalle",$idsalle);
        $req->bindParam(":idCreneau",$idCreneau);

        $req->execute();

    //Requete pour mettre a jour le nombre de place dispo 
    //Obn decremente le nombre de place dispo avant de mettre a jour
        
        $misajour =$bdd->prepare("UPDATE salle SET nbre_place_total=nbre_place_total+1  WHERE id=:id_salle");
        $misajour->bindParam(":id_salle",$idsalle);
        $misajour->execute();

        

     //On transforme notre donnée renvoyée sous forme json pour une meilleure lecture par JS
        $ligne = array('id' => $lign );
        echo json_encode($ligne);
    }else{
        header("Location:index.php");
    }
} else {
    header("Location:index.php");
}
