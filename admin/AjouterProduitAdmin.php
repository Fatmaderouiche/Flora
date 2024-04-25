
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Add product page -Admin Dashboard</title>
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
    <link rel="stylesheet" href="AjouterProduitAdmin-style.css">
  </head>
  <?php
  require_once('connexion.php');
 
    if (isset($_POST['ajouter'])) {
        $nom= $_POST['nom'];
        $prix = $_POST['prix'];
        $occasion = $_POST['occasion'];
        $categorie = $_POST['categorie'];
        $description = $_POST['description'];
        $qte = $_POST['quantite'];

       $filename = 'produit.png';
        if (!empty($_FILES['image']['name'])) {
            $image = $_FILES['image']['name'];
            $filename = uniqid() . $image;
            move_uploaded_file($_FILES['image']['tmp_name'], '../../' . $filename);
        }

        if (!empty($nom) && !empty($prix) && !empty($categorie) 
        && !empty($occasion) && !empty($description) ) {
            
          $sqlState = $idcon->prepare ("INSERT INTO  produit VALUES (null,'$nom',' $prix','$occasion','$categorie','$filename',' $description','$qte')");
          
            $inserted = $sqlState->execute();
            if ($inserted) {
              echo 'succeed';
               // header('location: produits.php');
            } else {

                ?>
                <div class="alert alert-danger" role="alert">
                    Database error (40023).
                </div>
                <?php
            }
        } else {
            ?>
            <div class="alert alert-danger" role="alert">
                Libelle , prix , catégorie sont obligatoires.
            </div>
            <?php
        }

    }
    ?>
    
 
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

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto h-100">
            <li class="nav-item">
              <a class="nav-link" href="indexADMIN.html">
                <i class="fas fa-tachometer-alt"></i> Dashboard
                <span class="sr-only">(current)</span>
              </a>
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
                <i class="far fa-file-alt"></i>
                <span> Rapports <i class="fas fa-angle-down"></i> </span>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#"> Rapport Daily</a>
                <a class="dropdown-item" href="#">  Rapport Weekly </a>
                <a class="dropdown-item" href="#"> Rapport Yearly </a>
              </div>
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
                <a class="dropdown-item" href="#">Profile</a>
                <a class="dropdown-item" href="suppression.php">Utilisateurs</a>
              
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
                <h2 class="tm-block-title d-inline-block">Ajouter Produit</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
                <form action="" method="post" class="tm-edit-product-form" enctype="multipart/form-data">
                  <div class="form-group mb-3">
                    <label for="name" >Nom du Produit</label>
                    <input id="nom"name="nom"type="text" class="form-control validate" required/>
                  </div>
                
                  <div class="row">
                      <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label for="expire_date">Prix</label>
                          <input type="text" name="prix" class="form-control validate"  required>
                        <!--  <input id="expire_date" name="expire_date" type="text" class="form-control validate" data-large-mode="true" />-->
                        </div>
                  </div>
                  <div class="form-group mb-3">
                    <label for="category" >Catégorie</label>
                    <select class="custom-select tm-select-accounts" id="category" name="categorie">
                    <option style="font-weight: bold;" >categorie</option>
                    <option value="1">Bouquet</option>
                      <option value="2">Fleurs séchées</option>
                      <option value="3">Boxs</option>
                      <option value="4">Plantes</option>
                    </select>
                  </div>
                  <div class="form-group mb-3">
                    <label for="occasion" >occasion</label>
                    <select class="custom-select tm-select-accounts" id="occasion" name="occasion">
                    <option style="font-weight: bold;">occasion</option>
                    <option value="1">amour</option>
                      <option value="2">mariage</option>
                      <option value="3">anniv</option>
                      <option value="4">naiss</option>
                    </select>
                  </div>
                <div class="row">
                  <div class="form-group mb-3">
                    <label for="description" >Description</label >
                    <textarea  class="form-control validate" rows="1" required  name="description"></textarea>
                  </div>
                </div>
                  
                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label for="stock" >quantité</label>
                          <input id="stock" name="quantite" type="text" class="form-control validate" required />
                        </div>
                  </div>
                  
             

              <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                <div class="tm-product-img-dummy mx-auto">
                  <i
                    class="fas fa-cloud-upload-alt tm-upload-icon"
                    onclick="document.getElementById('fileInput').click();"
                  ></i>
                </div>
                <div class="custom-file mt-3 mb-3">
                  <input name='image' id="fileInput" type="file" style="display:none;" required />
                  <input type="button"class="btn btn-primary btn-block mx-auto"value="AJOUTER l'IMAGE DU PRODUIT"onclick="document.getElementById('fileInput').click();" />
                </div>
              </div>
              </div>
              <div class="col-12">
                <input type="submit" class="btn btn-primary btn-block text-uppercase" value="ajouter" name="ajouter">
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
