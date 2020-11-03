<?php   
	session_start();
    require_once "connexion.php";

    $idCreneau = $_POST['idcreneau'];
    $idsalle = $_POST['idsalle'];
    $placetotal = $_POST['placetotal'];
    $lign= $_POST['ligne'];

  
    //Requete pour supprimer une reservation
    $req= $bdd->prepare("DELETE FROM reserver where login=:login AND id_salle=:idSalle AND id_creneau=:idCreneau");
    $req->bindParam(":login",$_SESSION['login']);
    $req->bindParam(":idSalle",$idsalle);
    $req->bindParam(":idCreneau",$idCreneau);

    $req->execute();

    //Requete pour mettre a jour le nombre de place dispo 
    //Obn decremente le nombre de place dispo avant de mettre a jour
    $placetotal++;
    $misajour =$bdd->prepare("UPDATE salle SET nbre_place_total=:placetotal  WHERE nom_salle=:nom_salle");
    $misajour->bindParam(":placetotal",$placetotal);
    $misajour->bindParam(":nom_salle",$idsalle);
    $misajour->execute();

  

     //On transforme notre donnée renvoyée sous forme json pour une meilleure lecture par JS
    $ligne = array('id' => $lign );
    echo json_encode($ligne);

   