<?php
session_start();
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
 include "header.php";
 include "connexion.php";
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
              $requete = $bdd->query(' SELECT s.nom_salle as salle,c.heure_debut as heured,c.heure_fin as heuref,r.jour_reservation as jour_reserver
                FROM reserver as r
                INNER JOIN creneau AS c ON c.id = r.id_creneau
                INNER JOIN salle AS s ON s.id = r.id_salle
                INNER JOIN utilisateur AS u ON u.login = r.login
                WHERE r.login = "'.$_SESSION['login'].'" ORDER BY jour_reserver DESC');
              $i=1;
              
              while($data = $requete->fetch()){
                echo'<tr>'
                .'<td>'.$i.'</td>'
                .'<td>'.$data['salle'].'</td>'
                .'<td>'.$data['heured'].' - '.$data['heuref'].'</td>'
                .'<td>'.$data['jour_reserver'].'</td>'
                .'<td><button class="btn btn-sm btn-rounded btn-outline-danger waves-effect">Annuler reservation</button></td>'
                .'</tr>';
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
