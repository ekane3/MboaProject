<?php

try{
	include "connexion.php";

	$req=$bdd->prepare('select * from utilisateur');

	$req->execute();
	$data=$req->fetchAll(PDO::FETCH_ASSOC);

	foreach ($data as $hash) {

		$req=$bdd->prepare('update utilisateur set password_hash=:pass_hash where login =:login');

		$pass_hash=password_hash($hash['password'],PASSWORD_DEFAULT);

		$req->bindParam(':pass_hash',$pass_hash);

		$req->bindParam(':login',$hash['login']);

		$req->execute();
	}

}
catch(Exception $e){
	echo "non visible";
	die("Error".$e->getMessage());
}

