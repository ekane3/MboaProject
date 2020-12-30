<?php
  session_start();
   include("connexion.php");
    if ( isset($_SESSION['statut']) && isset($_SESSION['token']) && isset($_SESSION['token_time'])  ) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Mboa Réservation</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="css/mdb.min.css">

  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body class="fixed-sn white-skin">

 <!--Main Navigation-->
 <?php
 include "header.php";
 ?>
 <!--Main Navigation-->

 <!-- Main layout  -->
 <main>
  <div class="container-fluid mb-5">
    <section>

      <!-- Gird column -->
      <div class="col-md-12">

        <h4 class="my-3 dark-grey-text font-weight-bold">LES CRENEAUX  DISPO</h4>

        <div class="card">
          <div class="card-body">
            <table class="table table-hover">
              <thead class="thead-light">
                <tr class="text">
                  <th>Jour</th>
                  <th>Horaires</th>
                  <th>Cours</th>
                  <th>Salle</th>
                  <th>Place disponible</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                //requete pour connaitre les creneaux reservés par un user
                $requete_creneau= $bdd->prepare('SELECT id_creneau from reserver where login = :login');
                $requete_creneau->bindValue(':login', $_SESSION['login'], PDO::PARAM_STR);
                $requete_creneau->execute();
                $recup = $requete_creneau->fetchAll(PDO::FETCH_ASSOC);

                  if (isset($recup[0]['id_creneau'])) {
                    $requete = $bdd->query('SELECT c.id as idcreneau,s.id as idsalle,c.heure_debut as heured,c.heure_fin as heuref, date_cours, nom_cours,s.nom_salle as salle,s.nbre_place_total as placetotal
                  FROM cours as co 
                  INNER JOIN creneau as c on c.id = co.id_creneau 
                  INNER JOIN salle as s on s.id = co.id_salle 
                  where s.nbre_place_total > 0 AND c.id!="'.$recup[0]['id_creneau'].'"
                  ORDER BY date_cours ASC ');

                  } else {
                    $requete = $bdd->query('SELECT c.id as idcreneau,s.id as idsalle,c.heure_debut as heured,c.heure_fin as heuref, date_cours, nom_cours,s.nom_salle as salle,s.nbre_place_total as placetotal
                  FROM cours as co 
                  INNER JOIN creneau as c on c.id = co.id_creneau 
                  INNER JOIN salle as s on s.id = co.id_salle 
                  where s.nbre_place_total > 0 
                  ORDER BY date_cours ASC ');
                  }
                  
                
                $i=1;

                while($data = $requete->fetch(PDO::FETCH_ASSOC)){
                  ?>

                  <tr id="<?=$i?>">
                  <?php
                  echo '<td>'.$data['date_cours'].'</td>'
                  .'<td>'.$data['heured'].' - '.$data['heuref'].'</td>'
                  .'<td>'.$data['nom_cours'].'</td>'
                  .'<td>'.$data['salle'].'</td>';

                  if ($data['placetotal'] > 25 ) {
                    echo '<td><span class="badge badge-pill badge-dark">'.$data['placetotal'].' places disponibles</span></td>';
                  } elseif ($data['placetotal'] <= 25 && $data['placetotal'] >10) {
                   echo '<td><span class="badge badge-pill badge-warning">'.$data['placetotal'].' places disponibles</span></td>';
                 }else {
                   echo '<td><span class="badge badge-pill badge-danger">'.$data['placetotal'].' places disponibles</span></td>';
                 }
                
                 ?>
                 <td><button class="btn btn-sm btn-rounded btn-outline-danger waves-effect" onClick="validReservation('<?=$i?>','<?=$data['idcreneau']?>','<?=$data['idsalle']?>','<?=$data['placetotal']?>')">Reserver</button></td>'
                 
                 <?php
                 echo '</tr>';

                 $i++;
               }    
               ?>
             </tr>
           </tbody>
         </table>   
       </div>
     </div>

   </div>
   <!-- Gird column -->
   <!-- Modal -->
   <div class="modal fade" id="reserve" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Annuler une reservation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Voulez-vous vraiment annuler cette réservation ? 
        <p class="text-muted">
          Pour annuler cliquer sur "Valider" sinon "Fermer"
        </p>
        
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-primary btn-sm btn-rounded">Valider</button>
       <button type="button" class="btn btn-danger btn-sm btn-rounded" data-dismiss="modal">Fermer</button>

     </div>
   </div>
 </div>
</div>


</div>
</main>
<!-- Main layout -->
<!-- Footer -->
<?php
include "footer.php";
?>
<!-- Footer -->



<!-- SCRIPTS -->
<!-- JQuery -->
<script src="js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<!--Custom scripts-->
<script>
    //fonction ajax du bouton reserver
    function validReservation(ligne,idCreneau,idsalle,placetotal){
      $.post(
        "faireReservationPost.php",
        {ligne:ligne,idcreneau:idCreneau,idsalle:idsalle,placetotal:placetotal},
         traiterRepSup
      );
    }
    //Traitement de la reponse du traitement de la requete
    function traiterRepSup(data)
    {
      if (data!="----erreur----")
      {        
        try{
          data = JSON.parse(data);
          $("#"+data.id).remove();
        } catch (e) {
          console.error(e)
          console.error('JSON received :', data)
          console.error(data.id)
        }
      }
    }
    // SideNav Initialization
  
    $(".button-collapse").sideNav();

    var container = document.querySelector('.custom-scrollbar');
    var ps = new PerfectScrollbar(container, {
      wheelSpeed: 2,
      wheelPropagation: true,
      minScrollbarLength: 20
    });

  </script>
</body>

</html>
<?php
}
else{
   header("Location: index.php");
}
?>