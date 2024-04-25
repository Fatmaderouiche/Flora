<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Add category page -Admin Dashboard</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="AjouterCategoriesAdmin-style.css">
  </head>
  <body  background="img\dashboardbackground.jpeg">
    <nav class="navbar navbar-expand-xl">
      <div class="container h-100">
        <a class="navbar-brand" href="indexADMIN.html">
          <h1 class="tm-site-title mb-0">ADMIN DASHBOARD</h1>
        </a>
        <button
          class="navbar-toggler ml-auto mr-0"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="fas fa-bars tm-nav-icon"></i>
        </button>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="ProduitsAdmin.html">
                <i class="fas fa-shopping-cart"></i> Produits
              </a>
            </li>
           <li class="nav-item">
              <a class="nav-link" href="ComptesAdmin.html">
               <i class="far fa-user"></i> Comptes</a>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false">
                <i class="fas fa-cog"></i>
                <span> Paramétres <i class="fas fa-angle-down"></i> </span>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="profile.html">Profile</a>
                <a class="dropdown-item" href="FacturatinAdmin.html">Facturation </a>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link d-block" href="LoginAdmin.html">
                Admin, <b>Déconnexion </b>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Ajouter catégorie</h2>
              </div>
            </div>
            <?php
               require_once ('connexion.php');
           
               if(isset($_POST['Ajouter']))
               {
                $nom= $_POST['nom_cat '];
                
                if(!empty($nom) ){
                    $sqlState = $idcon->prepare('INSERT INTO categorie(nom_cat) VALUES(?)');
                    $sqlState->execute([$nom]);
                }
                else
                {
                 echo 'nom obligatoires' ;
                }
            }
        ?>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
                <form action="" class="tm-edit-product-form">
                  <div class="form-group mb-3">
                    <label for="name" >nom_cat</label>
                    <input id="nom_cat"name="nom_cat"type="text" class="form-control validate" >
                  </div>
                  <div class="form-group mb-3">
                    <label for="category" >Catégorie</label>
                    <select class="custom-select tm-select-accounts" id="category">
                      <option selected>Selectionner catégorie</option>
                      <option value="1">Nouvelle arrivée</option>
                      <option value="2">Populaire</option>
                      <option value="3">Trending</option>
                    </select>
                  </div>
                 <!-- <div class="row">
                      <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label for="expire_date">Date d'expiration</label>
                          <input id="expire_date" name="expire_date" type="text" class="form-control validate" data-large-mode="true" />
                        </div>
                     <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label for="stock" >Unités In Stock</label>
                          <input id="stock" name="stock" type="text" class="form-control validate" required />
                        </div> 
                  </div>-->
                  
              </div>
              <div class="col-12">
                <input type="submit" class="btn btn-primary btn-block text-uppercase" value="Ajouter" >
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
      $(function() {
        $("#expire_date").datepicker();
      });
    </script>
  </body>
</html>
