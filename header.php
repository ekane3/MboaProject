 <header>

    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav sn-bg-4 fixed">
      <ul class="custom-scrollbar">
        <!-- Logo -->
        <li class="logo-sn waves-effect py-3">
          <div class="text-center">
            <a href="#" class="pl-0">MboaReservation</a>
          </div>
        </li>
        <!--/. Logo -->

        <!--Search Form-->
        <li>
          <form class="search-form" role="search">
            <div class="md-form mt-0 waves-light">
              <input type="text" class="form-control py-2" placeholder="Rechercher">
            </div>
          </form>
        </li>
        <!--/.Search Form-->
        <!-- Side navigation links -->
        <li>
          <ul class="collapsible collapsible-accordion">
            <li>
              <a class="collapsible-header waves-effect arrow-r">
                <i class="fas fa-tachometer-alt"></i>
                
                  <?php 
                    if (isset($_SESSION['login'])){
                      echo "<span>".$_SESSION['nom']."</span>"; 
                    }  
                  ?>
                <i class="fas fa-angle-down rotate-icon"></i>
              </a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="../dashboards/v-1.html" class="waves-effect">Admin</a>
                  </li>
                </ul>
              </div>
            </li>
            <!-- Simple link -->
            <li><a href="inscriptionEtudiant.php" class="collapsible-header waves-effect"><i class="fas fa-sign-in-alt"></i>
                Inscrire un étudiant</a>
            </li>
            <li><a href="listeEtudiant.php" class="collapsible-header waves-effect"><i class="fas fa-eye"></i>
                Consulter la liste des étudiants</a>
            </li>
            <li><a href="../alerts/alerts.html" class="collapsible-header waves-effect"><i class=" far fa-bell"></i>
                Gestion des salles</a>
            </li>
            <li><a href="../alerts/alerts.html" class="collapsible-header waves-effect"><i class=" far fa-bell"></i>
                Gestion des créneaux</a>
            </li>
          </ul>
        </li>
        <!--/. Side navigation links -->
      </ul>
      <div class="sidenav-bg mask-strong"></div>
    </div>
    <!--/. Sidebar navigation -->

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav">
      <!-- SideNav slide-out button -->
      <div class="float-left">
        <a href="#" data-activates="slide-out" class="button-collapse black-text"><i class="fas fa-bars"></i></a>
      </div>
      <!-- Breadcrumb-->
      <div class="breadcrumb-dn mr-auto">
        <p>MboaRéservation</p>
      </div>

      <!--Navbar links-->
      <ul class="nav navbar-nav nav-flex-icons ml-auto">

        <!-- Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <span class="badge red">3</span><i class="fas fa-ticket-alt" aria-hidden="true"></i>
            <span class="d-none d-md-inline-block">Réservations</span>
          </a>
          <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">
              <i class="fas fa-money mr-2" aria-hidden="true"></i>
              <span>Faire une réservation</span>
            </a>
            <a class="dropdown-item" href="#">
              <i class="fas fa-money mr-2" aria-hidden="true"></i>
              <span>Visualiser mes réservation</span>
            </a>
            <a class="dropdown-item" href="#">
              <i class="fas fa-money mr-2" aria-hidden="true"></i>
              <span>Annuler une réservation</span>
            </a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link waves-effect" href="contact.php"><i class="fas fa-envelope"></i> <span class="clearfix d-none d-sm-inline-block">Contact</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link waves-effect"><i class="far fa-comments"></i> <span class="clearfix d-none d-sm-inline-block">Aide</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block">Mon Profil</span></a>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          	<a class="dropdown-item" href="#">Mon compte</a>
            <a class="dropdown-item" href="deconnexion.php">Deconnexion</a>
          </div>
        </li>

      </ul>
      <!--/Navbar links-->
    </nav>
    <!-- /.Navbar -->

  </header>