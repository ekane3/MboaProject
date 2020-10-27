<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Inscription d'un étudiant</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="css/mdb.min.css">
  <!-- DataTables.net  -->
  <link rel="stylesheet" type="text/css" href="css/addons/datatables.min.css">
  <link rel="stylesheet" href="css/addons/datatables-select.min.css">

  <!-- Your custom styles (optional) -->
  <style>

  </style>
</head>

<body class="fixed-sn white-skin">

 <!--Main Navigation-->
 <?php
 include("header.php");
 include("connexion.php");
 ?>
 <!--Main Navigation-->

 <!-- Main layout -->
 <main>
  <div class="container-fluid">

    <!-- Section: Inputs -->
    <section class="section card mb-5">

      <div class="card-body">

        <!-- Section heading -->
        <h1 class="text-center h1">Programmez un TP</h1>

        <h5 class="pb-1">Veuillez remplir les champs</h5>
        <form method="POST" action="inscriptionEtudiantPost.php">
          <!-- Grid row -->
          <div class="row">
            <!-- Grid column -->
            <div class="col-md-6">

              <div class="md-form">
                <select class="browser-default custom-select">
                  <option value="" disabled selected>Choisissez la salle</option>
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                  <option value="3">Option 3</option>
                </select>

              </div>

            </div>
            <!-- Grid column -->
            <!-- Grid column -->
            <div class="col-md-6 ">

              <div class="md-form">
                <select class="browser-default custom-select">
                  <option value="" disabled selected>Choisissez le creneau</option>
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                  <option value="3">Option 3</option>
                </select>

              </div>

            </div>
            <!-- Grid column -->

          </div>
          <!-- Grid row -->
          <!-- Grid row -->
          <div class="row">

            <!-- Grid column -->
            <div class="col-md-6 ">
              <div class="md-form">
               <select class="browser-default custom-select">
                <option value="" disabled selected>Choisissez le cours</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
              </select>
            </div>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-6 ">

            <div class="md-form">
              <input type="date" id="form1" class="form-control" name="dateN">
              <label for="form1" class="">Date de naissance</label>
            </div>

          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row -->
        <!-- Grid row -->
        <div class="row">
          <!-- Grid column -->
          <div class="col-md-4 ">
            <div class="md-form">
              <button type="submit" class="btn btn-primary">Programmer</button>
            </div>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </form>
    </div>
  </section>
  <!-- Section: Inputs -->

  <hr class="my-1">

  <!-- Section: Basic examples -->
  <section>

    <!-- Gird column -->
    <div class="col-md-12">

      <h5 class="my-3 dark-grey-text font-weight-bold">Table des TPs programmés</h5>

      <div class="card">
        <div class="card-body">
          <table class="table table-hover">
            <thead class="thead-light">
              <tr class="text">
                <th>id</th>
                <th>salle</th>
                <th>Nbre place</th>
                <th>heure</th>
                <th>date</th>
                <th>cours</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $requete = $bdd->query(' SELECT co.id_cours as id, s.nom_salle as ns ,s.nbre_place_total as nt,c.heure_debut as hd,c.heure_fin as hf,co.date_cours as dc,co.nom_cours as nc
                FROM cours as co 
                INNER JOIN creneau AS c ON c.id = co.id_creneau 
                INNER JOIN salle AS s ON s.id = co.id_salle');
              $i=1;
              
              while($data = $requete->fetch()){
                echo'<tr>'
                .'<td>'.$data['id'].'</td>'
                .'<td>'.$data['ns'].'</td>'
                .'<td>'.$data['nt'].'</td>'
                .'<td>'.$data['hd'].' - '.$data['hf'].'</td>'
                .'<td>'.$data['dc'].'</td>'
                .'<td>'.$data['nc'].'</td>'
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
<br>
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
<!-- DataTables  -->
<script type="text/javascript" src="js/addons/datatables.min.js"></script>
<!-- DataTables Select  -->
<script type="text/javascript" src="js/addons/datatables-select.min.js"></script>
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

    $('#dtMaterialDesignExample').DataTable();

    $('#dt-material-checkbox').dataTable({

      columnDefs: [{
        orderable: false,
        className: 'select-checkbox',
        targets: 0
      }],
      select: {
        style: 'os',
        selector: 'td:first-child'
      }
    });

    
  </script>
</body>

</html>