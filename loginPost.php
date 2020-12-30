<?php
session_start();
try{ 
   //Connexion a la base de données
  include('connexion.php');
  //phpinfo();
  //Notre fonction permettant de nettoyer les variables envoyées sur le serveur
  function valid_donnees($donnees){
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
  }

  $login = valid_donnees($_POST["login"]);
  $pass= valid_donnees($_POST["pass"]);
  $token=$_POST['token'];

  $pass_hash = password_hash($pass, PASSWORD_DEFAULT);

  //On verifie Si le jeton est présent dans la session et dans le formulaire
  if(isset($_SESSION['token']) && isset($_SESSION['token_time']) && isset($token))
  {
  //On verifie Si le jeton de la session correspond à celui du formulaire
    if($_SESSION['token'] == $token)
    {
    //On stocke le timestamp qu'il était il y a 15 minutes
      $timestamp_ancien = time() - (15*60);
    //Si le jeton n'est pas expiré
      if($_SESSION['token_time'] >= $timestamp_ancien)
      {
        //ON FAIT TOUS LES TRAITEMENTS ICI
        if(filter_var($login, FILTER_VALIDATE_EMAIL)) {


          if ( isset($_POST['login']) && isset($_POST['pass']) ) {//verification des champs

            $st = $bdd->query("SELECT * FROM utilisateur WHERE login='".$_POST['login']."'");
            $datarow= $st->rowCount();
            $st->execute();
            $data = $st->fetch();

            $motdepassestocke= $data['password'];

           //On verfie le mot de passe haché recu et le mot de passe qui en clair dans la bd
            if (password_verify($motdepassestocke,$pass_hash )) {
              //si on trouve un seul enregistrement dans la BD ca veut dire que l'utilisateur existe
              if ($datarow ==1 ){
           //Declaration de nos variables de connexion
              setcookie('cookieLogin',$login,time()+ 7*24*3600,null,null,false,true);// Cookie Login
              setcookie('cookiePass',$pass_hash,time()+ 7*24*3600,null,null,false,true); //Cookie Password

              $_SESSION['login'] =$login ;
              $_SESSION['statut'] =$data['statut'] ;
              $_SESSION['nom'] =$data['nom'] ;
                //$_SESSION['statut'] = ("admin") ? header("Location: accueil.php"); : header("Location: accueilEtudiant.php"); ;
              header("Location: edt.php");
              $return = "vous etes bien connecté !";  
            }
            else{
              header("Location: index.php");
              $return = "Faux mot de passe !";
            }

          }else{
            header("Location: index.php");
            $return = "Vous n'avez pas de compte !";
          }

        }else{

       header("Location: index.php");//Si les champs sont vides on renvoie le formulaire
       $return ="Oops,un ou plusieurs champs manquant";
     }
   }
 }
}
}else{
  //Si le jeton n'est pas présent dans la session on le renvoie sur la page de connexion
  header("Location: index.php");
}


}
catch(Exception $e)
{
 die('Erreur : '.$e->getMessage());
}

