<?php
session_start();
include("connexion.php");
if ( isset($_SESSION['statut'])&& isset($_SESSION['token']) && isset($_SESSION['token_time']) ) {
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Mes réservations</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="css/mdb.min.css">

    <!-- Your custom styles (optional) -->
    <style>

    </style>
  </head>

  <body class="fixed-sn white-skin">

   <!--Main Navigation-->
   <?php
   include "connexion.php";
   include "header.php";
   ?>
   <!--Main Navigation-->

   <!-- Main layout -->
   <main>
    <div class="container-fluid">
     <!-- Section: Basic examples -->
     <section>

      <!-- Gird column -->
      <div class="col-md-12">

        <h4 class="my-3 dark-grey-text font-weight-bold">Mes réservations</h4>

        <div class="card">
          <div class="card-body">
            <table class="table table-hover">
              <thead class="thead-light">
                <tr class="text">
                  <th>Id</th>
                  <th>salle</th>
                  <th>Heure</th>
                  <th>jour</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $requete = $bdd->query(' SELECT c.id as idcreneau,s.id as idsalle,s.nbre_place_total as placetotal,s.nom_salle as nomsalle,c.heure_debut as heure_d,c.heure_fin as heure_f,r.jour_reservation as jour_reserv FROM reserver as r
                  INNER JOIN creneau AS c ON c.id = r.id_creneau
                  INNER JOIN salle AS s ON s.id = r.id_salle
                  WHERE r.login ="'.$_SESSION['login'].'"');
                  $i=1; ?>
                  <tr id="<?=$i?>">
                    <?php
                    while($data = $requete->fetch()){
                      
                     echo '<td>'.$i.'</td>'
                     .'<td>'.$data['nomsalle'].'</td>'
                     .'<td>'.$data['heure_d'].' - '.$data['heure_f'].'</td>'
                     .'<td>'.$data['jour_reserv'].'</td>';
                     ?>
                     <td><button class="btn btn-sm btn-rounded btn-outline-danger waves-effect" onClick="annulReservation('<?=$i?>','<?=$data['idcreneau']?>','<?=$data['idsalle']?>','<?=$data['placetotal']?>')">Annuler reservation</button></td>'
                     
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

   <!--/ Modal -->
 </section>
 <!-- Section: Basic examples -->
</div>
</main>
<!-- Main layout -->
<br><br> <br><br><br><br><br> <br><br><br><br><br> <br><br><br><br><br> <br><br><br>
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
  function annulReservation(ligne,idCreneau,idsalle,placetotal){
    $.post(
      "supprimReservPost.php",
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
                console.error('JSON recieved :', data)
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
 header("Location: edt.php");
}
?>