<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Consulter la liste des étudiants</title>
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

 <!-- Main layout  -->
 <main>
  <div class="container-fluid mb-5">

    <!-- Section: Basic examples -->
    <section>
      <!-- Gird column -->
      <div class="col-md-12">

        <h5 class="my-4 dark-grey-text font-weight-bold">Table des étudiants inscrits</h5>
        <div class="card">
          <div class="card-body">
            <table id="dtMaterialDesignExample" class="table table-striped" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nom</th>
                  <th>Login</th>
                  <th>classe</th>
                  <th>password</th>
                  <th>Date de naissance</th>
                  <th></th>
                  <th></th>
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
                  .'<td><button class="btn btn-rounded btn-blue-grey">Update</button></td>'
                  .'<td><button class="btn btn-rounded btn-outline-danger waves-effect">Delete</button></td>'
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
<br><br><br><br><br><br><br>
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