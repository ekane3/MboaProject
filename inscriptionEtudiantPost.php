<?php
session_start();

$login=$_POST['login'];

$nom=$_POST['nom'];

$pass=$_POST['pass'];

$classe=$_POST['classe'];

$statut="etudiant";

$dateN = $_POST['dateN'];

try{
    include "connexion.php";
    $req=$bdd->prepare('insert into utilisateur(login,nom,password,statut,classe,date_naissance,date_inscription) values(:login,:nom,:pass,:statut,:classe,:dateNn,'.NOW().')');
	$req->bindParam(':login',$login);
	$req->bindParam(':nom',$nom);
	$req->bindParam(':pass',$pass);
	$req->bindParam(':statut',$statut);
	$req->bindParam(':classe',$classe);
	$req->bindParam(':dateN',$dateN);
	$req->execute();
	header("Location:inscriptionEtudiant.php");
}
catch(Exception $e){
    echo "non visible";
    die("Error".$e->getMessage());
}

?>