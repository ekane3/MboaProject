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
  <div class="container-fluid">
   <!--Section: Contact v.1 -->
   <section class="section pb-5">

    <!--Section heading -->
    <h2 class="text-center my-5 h1 pt-1">Contact Nous</h2>
    <!--Section description -->
    <p class="text-center mb-5 w-responsive mx-auto pb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
      Fugit, error amet numquam iure provident voluptate
    esse quasi, veritatis totam voluptas nostrum quisquam eum porro a pariatur accusamus veniam.</p>

    <div class="row">

      <!-- Grid column -->
      <div class="col-lg-5 mb-4">

        <!--Form with header -->
        <div class="card">

          <div class="card-body">
            <!--Header -->
            <div class="form-header blue accent-1">
              <h3><i class="fas fa-envelope"></i> Laissez un message:</h3>
            </div>

            <p>Remplissez les champs en cas de problèmes ou pour une quelconque remarque.</p>
            <br>

            <!--Body -->
            <div class="md-form">
              <i class="fas fa-user prefix grey-text"></i>
              <input type="text" id="form-name" class="form-control">
              <label for="form-name">Votre nom</label>
            </div>

            <div class="md-form">
              <i class="fas fa-envelope prefix grey-text"></i>
              <input type="text" id="form-email" class="form-control">
              <label for="form-email">Votre adresse mail</label>
            </div>

            <div class="md-form">
              <i class="fas fa-tag prefix grey-text"></i>
              <input type="text" id="form-Subject" class="form-control">
              <label for="form-Subject">Objet</label>
            </div>

            <div class="md-form">
              <i class="fas fa-pencil-alt prefix grey-text"></i>
              <textarea type="text" id="form-text" class="md-textarea form-control" rows="3"></textarea>
              <label for="form-text">Votre message</label>
            </div>

            <div class="text-center mt-4">
              <button class="btn btn-light-blue">Envoyer</button>
            </div>
          </div>

        </div>
        <!--Form with header -->

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-lg-7">

        <!--Google map -->
        <div id="map-container-google-2" class="z-depth-1-half map-container" style="height: 500px">
          <iframe src="https://maps.google.com/maps?q=chicago&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
          style="border:0" allowfullscreen></iframe>
        </div>
        <!--Google Maps -->

        <br>
        <!--Buttons -->
        <div class="row text-center">
          <div class="col-md-4">
            <a class="btn-floating blue accent-1"><i class="fas fa-map-marker-alt"></i></a>
            <p>Limoges, 84100</p>
            <p>France</p>
          </div>

          <div class="col-md-4">
            <a class="btn-floating blue accent-1"><i class="fas fa-phone"></i></a>
            <p>+ 33 758 047 525 </p>
            <p>Lun - Ven, 8:00-18:00</p>
          </div>

          <div class="col-md-4">
            <a class="btn-floating blue accent-1"><i class="fas fa-envelope"></i></a>
            <p>info@3il.fr</p>
            <p>scolarité@3il.fr</p>
          </div>
        </div>

      </div>
      <!-- Grid column -->

    </div>

  </section>
  <!--Section: Contact v.1 -->

</div>
</main>
<!-- Main layout -->
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
