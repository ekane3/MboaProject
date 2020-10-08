<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Connexion MboaReservation</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <style>
    html,
    body,
    header,
    .view {
      height: 100%;
    }
    @media (min-width: 851px) and (max-width: 1440px) {
      html,
      body,
      header,
      .view {
        height: 850px;
      }
    }
    @media (min-width: 800px) and (max-width: 850px) {
      html,
      body,
      header,
      .view {
        height: 1000px;
      }
    }
    @media (min-width: 451px) and (max-width: 740px) {
      html,
      body,
      header,
      .view {
        height: 1200px;
      }
    }
    @media (max-width: 450px) {
      html,
      body,
      header,
      .view {
        height: 1400px;
      }
    }
  </style>
</head>

<body class="register-page">

  <!-- Main Navigation -->
<header>

    <!-- Intro Section -->
    <section class="view intro-2">
      <div class="mask rgba-gradient">
        <div class="container h-100 d-flex justify-content-center align-items-center">

          <!-- Grid row -->
          <div class="row pt-5">

            <!-- Grid column -->
            <div class="col-lg-12">

              <div class="card">
                <div class="card-body">

                  <h2 class="font-weight-bold my-4 text-center mb-5 mt-4 font-weight-bold">
                    <strong>MboaReservation</strong>
                  </h2>
                  <hr>

                  <!-- Grid row -->
                  <div class="row mt-5">
                    <!-- Grid column -->
                    <div class="col-lg-1">
                    </div>
                    <!-- Grid column -->
                     <!-- Grid column -->
                    <div class="col-lg-10">
                      <!-- Grid row -->
                      <div class="row pb-4 d-flex justify-content-center mb-4">

                        <h4 class="mt-3 mr-4">
                          <strong>Connectez-Vous</strong>
                        </h4>

                      </div>
                      <!-- /Grid row -->

                      <!-- Body -->
                      <!-- FORMULAIRE DE CONNEXION -->
                    <form method="POST" action="loginPost.php">
                      <div class="md-form">
                        <i class="fas fa-user prefix"></i>
                        <input type="text" id="orangeForm-name" class="form-control" name="login">
                        <label for="orangeForm-name">Votre login</label>
                      </div>
                      <div class="md-form">
                        <i class="fas fa-lock prefix"></i>
                        <input type="password" id="orangeForm-pass" class="form-control" name="pass">
                        <label for="orangeForm-pass">Vore mot de passe</label>
                      </div>

                      <div class="text-center">
                        <button type="submit" class="btn btn-indigo btn-rounded  mT-10 mb-8">Connexion</button>
                      </div>
                    </form>
                    </div>
                    <!-- Grid column -->
                     <!-- Grid column -->
                    <div class="col-lg-1">
                    </div>
                    <!-- Grid column -->

                  </div>
                  <!-- Grid row -->

                </div>
              </div>

            </div>
            <!-- Grid column -->

          </div>
          <!-- Grid row -->

        </div>
      </div>
    </section>
    <!-- Intro Section -->

</header>
  <!-- Main Navigation -->

  <!--  SCRIPTS  -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>

  <!-- Custom scripts -->
  <script>

    new WOW().init();

  </script>
  
</body>

</html>
