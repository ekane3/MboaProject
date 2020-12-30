<?php
session_start();

$login=$_POST['login'];

$nom=$_POST['nom'];

$pass=$_POST['pass'];

$classe=$_POST['classe'];

$statut="etudiant";

$dateN = $_POST['dateN'];

$pass_hash=password_hash($pass, PASSWORD_DEFAULT);

try{
    include "connexion.php";
    $req=$bdd->prepare('insert into utilisateur(login,nom,password,password_hash,statut,classe,date_naissance) values(:login,:nom,:pass,:pass_hash,:statut,:classe,:dateN)');
  $req->bindParam(':login',$login);
  $req->bindParam(':nom',$nom);
  $req->bindParam(':pass',$pass);
  $req->bindParam(':pass_hash',$pass_hash);
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

