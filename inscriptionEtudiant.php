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
 include("connexion.php");
 include("header.php");
 ?>
 <!--Main Navigation-->

 <!-- Main layout -->
 <main>
  <div class="container-fluid">

    <!-- Section: Inputs -->
    <section class="section card mb-5">

      <div class="card-body">

        <!-- Section heading -->
        <h1 class="text-center h1">Inscrire un étudiant</h1>

        <h5 class="pb-1">Veuillez remplir les champs</h5>
        <form method="POST" action="inscriptionEtudiantPost.php">
          <!-- Grid row -->
          <div class="row">
            <!-- Grid column -->
            <div class="col-md-4 ">

              <div class="md-form">
                <input type="email" id="form1" class="form-control" name="login">
                <label for="form1" class="">Entrez son login</label>
              </div>

            </div>
            <!-- Grid column -->
            <!-- Grid column -->
            <div class="col-md-4 ">

              <div class="md-form">
                <input type="text" id="form3" class="form-control" name="nom">
                <label for="form3" class="">Entrez son nom</label>
              </div>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 ">

              <div class="md-form">
                <input type="text" id="form2" class="form-control" name="pass">
                <label for="form2" class="">Entrer son mot de passe</label>
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
                <input type="text" id="form1" class="form-control" name="classe">
                <label for="form1" class="">Sa promo</label>
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
                <button class="btn btn-primary">Inscrire</button>
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

        <h5 class="my-3 dark-grey-text font-weight-bold">Table des étudiants inscrits</h5>

        <div class="card">
          <div class="card-body">
            <table class="table table-hover">
              <thead class="thead-light">
                <tr class="text">
                  <th>#</th>
                  <th>Nom</th>
                  <th>Login</th>
                  <th>classe</th>
                  <th>password</th>
                  <th>Date de naissance</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $requete = $bdd->query(' SELECT * FROM utilisateur WHERE statut ="etudiant" ORDER BY date_inscription DESC LIMIT 10 ');
                $i=1;
                
                while($data = $requete->fetch()){
                  echo'<tr>'
                  .'<td>'.$i.'</td>'
                  .'<td>'.$data['nom'].'</td>'
                  .'<td>'.$data['login'].'</td>'
                  .'<td>'.$data['classe'].'</td>'
                  .'<td>'.$data['password'].'</td>'
                  .'<td>'.$data['date_naissance'].'</td>'
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