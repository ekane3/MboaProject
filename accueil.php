<?php
session_start();
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
  <div class="container-fluid mb-5">
<!-- Section: Basic examples -->
<section>
  <!-- Gird column -->
  <div class="col-md-12">

    <h1 class="my-4 dark-grey-text "><i class=" fas fa-table"></i>  Travaux Pratiques Semaine : 39</h1>
    <div class="card">
      <div class="card-body">
        <div class="container">
          <div class="timetable-img text-center">
            <img src="img/content/timetable.png" alt="">
          </div>
          <div class="table-responsive">
            <table class="table table-striped" >
              <thead>
                <tr class="bg-light-gray">
                  <th><h4 class="my-1 dark-grey-text ">Horaires</h4></th>
                  <th ><h4 class="my-1 dark-grey-text ">Lundi</h4></th>
                  <th><h4 class="my-1 dark-grey-text ">Mardi</h4></th>
                  <th><h4 class="my-1 dark-grey-text ">Mercredi</h4></th>
                  <th><h4 class="my-1 dark-grey-text ">Jeudi</h4></th>
                  <th><h4 class="my-1 dark-grey-text ">Vendredi</h4></th>
                </tr>
              </thead>
              <tbody>
               <?php
               $requete = $bdd->query('SELECT c.heure_debut as heured,c.heure_fin as heuref,date_cours,nom_cours,s.nom_salle as salle,s.nbre_place_total as placetotal
                FROM cours as co 
                INNER JOIN creneau as c on c.id = co.id_creneau 
                INNER JOIN salle as s on s.id = co.id_salle 
                ORDER BY date_cours ASC');
               $horaire = $bdd->query('SELECT id,heure_debut,heure_fin FROM creneau');
               $i=1;
               while($data = $horaire->fetch()){
                echo'<tr>';

                echo '<td>'.$data['heure_debut'].' - '.$data['heure_fin'].'</td>';
                while ($da = $requete->fetch()) {
                  echo '<td data-toggle="modal" data-target="#reserve">';
                  echo    '<span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom  font-size16 xs-font-size13">ANA NUM TP1</span>';
                  echo    '<br><span>107 108</span>';
                  echo    '<br><span class="badge badge-pill badge-dark">20 places disponibles</span>';
                  echo '</td>';
                }

                echo '</tr>';

                $i++;
              }    
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- Gird column -->

</section>
<!-- Section: Basic examples -->
<!-- Modal -->
<div class="modal fade" id="reserve" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Valider une reservation</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      Voulez-vous vraiment reserver ce créneau ? 
      <p class="text-muted">
        Pour reserver cliquer sur "Valider" sinon "Fermer"
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
