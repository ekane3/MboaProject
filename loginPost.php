<?php
  session_start(); 
  //phpinfo();
    $login = valid_donnees($_POST["login"]);
    $pass= valid_donnees($_POST["pass"]);
    
    function valid_donnees($donnees){
        $donnees = trim($donnees);
        $donnees = stripslashes($donnees);
        $donnees = htmlspecialchars($donnees);
        return $donnees;
    }
  try{
  //Connexion a la base de données
    $login=$_POST['login'];
    $pass=$_POST['pass'];
    include('connexion.php');
    var_dump($_POST);

    $pass_hash = password_hash($pass, PASSWORD_DEFAULT);

    if(filter_var($login, FILTER_VALIDATE_EMAIL)) {

    
     if ( isset($_POST['login']) && isset($_POST['pass']) ) {//verification des champs
        
         $st = $bdd->query("SELECT statut,nom FROM utilisateur WHERE login='".$_POST['login']."' AND password='".$pass."'");
         $datarow= $st->rowCount();
         $st->execute();
         $data = $st->fetch();

          if ($datarow ==1 ){//si on trouve un seul enregistrement dans la BD ca veut dire que l'utilisateur existe
         //Declaration de nos variables de connexion
            setcookie('cookieLogin',$login,time()*30*24*3600,null,null,false,true);// Cookie Login
            setcookie('cookiePass',$pass,time()*30*24*3600,null,null,false,true); //Cookie Password

             $_SESSION['login'] =$_POST['login'] ;
             $_SESSION['statut'] =$data['statut'] ;
             $_SESSION['nom'] =$data['nom'] ;
              //$_SESSION['statut'] = ("admin") ? header("Location: accueil.php"); : header("Location: accueilEtudiant.php"); ;
              header("Location: accueil.php");
               $return = "vous etes bien connecté !";        
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
  catch(Exception $e)
  {
       die('Erreur : '.$e->getMessage());
  }

  ?>