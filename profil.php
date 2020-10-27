<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Mon profil</title>
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
 ?>
 <!--Main Navigation-->

 <!-- Main layout -->
 <main>
  <div class="container-fluid">

    <!-- Section: Team v.1 -->
    <section class="section team-section">

      <!-- Grid row -->
      <div class="row text-center">

        <!-- Grid column -->
        <div class="col-md-8 mb-4">

          <!-- Card -->
          <div class="card card-cascade cascading-admin-card user-card">

            <!-- Card Data -->
            <div class="admin-up d-flex justify-content-start">
              <i class="fas fa-users info-color py-4 mr-3 z-depth-2"></i>
              <div class="data">
                <h5 class="font-weight-bold dark-grey-text">Modifier votre profil - <span class="text-muted">Completer vos informations</span></h5>
              </div>
            </div>
            <!-- Card Data -->
            <form method="POST" action="profilUpdate.php">
              <!-- Card content -->
              <div class="card-body card-body-cascade">

                <!-- Grid row -->
                <div class="row">
                  <!-- Grid column -->
                  <div class="col-lg-4">

                    <div class="md-form form-sm mb-0">
                      <input type="text" id="form12" class="form-control form-control-sm" name="login">
                      <label for="form12" class="">Login ou adresse mail</label>
                    </div>

                  </div>
                  <!-- Grid column -->

                  <!-- Grid column -->
                  <div class="col-lg-4">

                    <div class="md-form form-sm mb-0">
                      <input type="text" id="form3" class="form-control form-control-sm" name="nom">
                      <label for="form3" class="">Nom</label>
                    </div>

                  </div>
                  <!-- Grid column -->
                  <!-- Grid column -->
                  <div class="col-lg-4">
                    <div class="md-form form-sm mb-0">
                      <input type="text" id="form122" class="form-control form-control-sm" name="date_n">
                      <label for="form122" class="">Date de naissance</label>
                    </div>
                  </div>
                  <!-- Grid column -->

                </div>
                <!-- Grid row -->

                <!-- Grid row -->
                <div class="row">

                  <!-- Grid column -->
                  <div class="col-md-4">

                    <div class="md-form form-sm mb-0">
                      <input type="text" id="form5" class="form-control form-control-sm" name="pass">
                      <label for="form5" class="">Mot de passe</label>
                    </div>

                  </div>
                  <!-- Grid column -->

                  <!-- Grid column -->
                  <div class="col-md-4">

                    <div class="md-form form-sm mb-0">
                      <input type="text" id="form5" class="form-control form-control-sm" readonly>
                      <label for="form5" class="">Statut</label>
                    </div>

                  </div>
                  <!-- Grid column -->

                  <!-- Grid column -->
                  <div class="col-md-4">

                    <div class="md-form form-sm mb-0">
                      <input type="text" id="form5" class="form-control form-control-sm" name="class">
                      <label for="form5" class="">Classe</label>
                    </div>

                  </div>
                  <!-- Grid column -->

                </div>
                <!-- Grid row -->
                <!-- Grid row -->
                <div class="row">
                  <!-- Grid column -->
                  <div class="col-lg-6">
                    <div class="md-form form-sm mb-0">
                      <input type="text" id="form12" class="form-control form-control-sm" readonly>
                      <label for="form12" class="">Date d'inscription</label>
                    </div>
                  </div>
                  <!-- Grid column -->

                  <!-- Grid column -->
                  <div class="col-lg-6">
                  </div>
                  <!-- Grid column -->

                </div>
                <!-- Grid row -->
                <!-- Grid row -->
                <div class="row">
                  <!-- Grid column -->
                  <div class="col-md-4 ">
                    <div class="md-form">
                      <button class="btn btn-primary">Update</button>
                    </div>
                  </div>
                  <!-- Grid column -->
                </div>
                <!-- Grid row -->

              </div>
              <!-- Card content -->
            </form>
          </div>
          <!-- Card -->
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 mb-4">

          <!-- Card -->
          <div class="card profile-card">

            <!-- Avatar -->
            <div class="avatar z-depth-1-half mb-4">
              <img src="img/profil.png" class="rounded-circle" alt="First sample avatar image">
            </div>

            <div class="card-body pt-0 mt-0">

              <!-- Name -->
              <h3 class="mb-3 font-weight-bold"><strong>Anna Deynah</strong></h3>
              <h6 class="font-weight-bold cyan-text mb-4">Etudiant</h6>

              <p class="mt-4 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt
                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
              ullamco laboris nisi ut aliquip consequat.</p>

              <a class="btn btn-info btn-rounded"> Modifier la photo</a>

            </div>

          </div>
          <!-- Card -->

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </section>
    <!-- Section: Team v.1 -->

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
