<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Edit Product Page - Dashboard Admin </title>
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
    <link rel="stylesheet" href="EditerProduitAdmin-style.css">
  </head>

  <body background="img\dashboardbackground.jpeg">
    <div>
      <nav class="navbar navbar-expand-xl">
        <div class="container h-100">
          <a class="navbar-brand" href="indexADMIN.html">
            <h1 class="tm-site-title mb-0"> ADMIN DASHBOARD  </h1>
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
              <li class="nav-item">
                <a class="nav-link" href="ProduitsAdmin.html">
                 <i class="fas fa-shopping-cart"></i> Produits </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="ComptesAdmin.html">
                 <i class="far fa-user"></i> Comptes</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                  <i class="fas fa-cog"></i>
                  <span> Paramétres <i class="fas fa-angle-down"></i> </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="profile.html">Profile</a>
                  <a class="dropdown-item" href="suppression.php">Utilisateurs</a>
              
                </div>
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
                <h2 class="tm-block-title d-inline-block" style="color:black; font-size:30px;">Editer Produit</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">

              <?php
    $id = $_GET['id'];
    require_once 'connexion.php';

   $sqlState = $idcon->prepare("SELECT * from produit WHERE id_prod='$id'");
    $sqlState->execute();
    $produit = $sqlState->fetch(PDO::FETCH_OBJ);
 
    if (isset($_POST['Editer'])) {
        $nom= $_POST['nom'];
        $prix = $_POST['prix'];
        $occasion = $_POST['occasion'];
        $categorie = $_POST['categorie'];
        $description = $_POST['description'];
        $quantite = $_POST['quantite'];

       $filename = 'produit.png';
       echo $_FILES['image']['name'];
        if (!empty($_FILES['image']['name'])) {
            $image = $_FILES['image']['name'];
            $filename = uniqid() . $image;
            move_uploaded_file($_FILES['image']['tmp_name'], '../../' . $filename);
        }
        echo "test".$filename;

        if (!empty($nom) && !empty($prix) && !empty($categorie)
        && !empty($occasion) && !empty($description) && !empty($quantite)) {
       

          if (!empty($filename)) {
            $query = "UPDATE produit SET nom=? ,
                                                  prix=? ,
                                                  id_occ=? ,
                                                  id_cat=?,
                                                  description=?,
                                                  image=?,
                                                  quantité=?
                                               WHERE id_prod = ? ";
            $sqlState = $idcon->prepare($query);
            $updated = $sqlState->execute([ $nom, $prix, $occasion,$categorie, $description,$filename, $quantite, $id]);
        } else {
                $query = "UPDATE produit SET nom=? ,
                                                    prix=? ,
                                                    id_occ=? ,
                                                    id_cat=?,
                                                    description=?,
                                                    quantité=?
                                                WHERE id_prod = ? ";
                $sqlState = $idcon->prepare($query);
                $updated = $sqlState->execute([$nom, $prix, $occasion,$categorie, $description, $quantite, $id]);
        }
            if ($updated) {
                header('location: ProduitsAdmin.php');
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
                nom , prix , catégorie , occasion sont obligatoires.
            </div>
            <?php
        }

    }
    ?>
                <form action="" method="post" class="tm-edit-product-form">
                  <div class="form-group mb-3">
                <label for="name" >Nom du produit </label>
                 <input id="name" name="nom" type="text"value="<?= $produit->nom?>"class="form-control validate" />
                 </div>
                  <div class="form-group mb-3">
                    <label for="description" >Description</label>
                    <textarea  class="form-control validate tm-small" rows="3" name='description' value="<?=$produit->description?>"><?php echo $produit->description ?></textarea>
                  </div>

                  <div class="form-group mb-3">
                    <label for="category" >Occasion</label >
                    <select class="custom-select tm-select-accounts" id="occasion" name='occasion' value="<?=$produit->id_occ?>">
                  
                    <option value="1" <?php if($produit->id_occ== '1'): ?> selected="selected"<?php endif; ?>>amour</option>
                      <option value="2" <?php if($produit->id_occ== '2'): ?> selected="selected"<?php endif; ?>>mariage</option>
                      <option value="3" <?php if($produit->id_occ== '3'): ?> selected="selected"<?php endif; ?>>anniv</option>
                      <option value="4" <?php if($produit->id_occ== '4'): ?> selected="selected"<?php endif; ?>>naiss</option>
                    </select>
                    </div>

                  <div class="form-group mb-3">
                    <label for="category" >Catégorie</label >
                    <select class="custom-select tm-select-accounts" id="category" name='categorie' value="<?=$produit->id_cat?>">
                    <option value="1" <?php if($produit->id_cat== '1'): ?> selected="selected"<?php endif; ?>>Bouquet</option>
                      <option value="2" <?php if($produit->id_cat== '2'): ?> selected="selected"<?php endif; ?>>Fleurs séchées</option>
                      <option value="3"<?php if($produit->id_cat== '3'): ?> selected="selected"<?php endif; ?>>Boxs</option>
                      <option value="4"<?php if($produit->id_cat== '4'): ?> selected="selected"<?php endif; ?>>Plantes</option>
                    </select>
                    </div>
                    <div class="row">
                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label for="prix" >Prix </label>
                          <input id="prix" name="prix" type="text" value="<?=$produit->prix?>"class="form-control validate"  />
                        </div>
                    </div>
                        <div class="row">
                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label for="stock" >Quantité </label>
                          <input id="stock" name="quantite" type="text" value="<?=$produit->quantité?>"class="form-control validate"  />
                        </div>
                     </div>  
                 
                  
              </div>
              <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                <div class="tm-product-img-edit mx-auto">
                  <img src="../../<?= $produit->image?>"  alt="Product image" class="img-fluid d-block mx-auto">
                  <i
                    class="fas fa-cloud-upload-alt tm-upload-icon"
                    onclick="document.getElementById('fileInput').click();"
                  ></i>
                </div>
                <div class="custom-file mt-3 mb-3">
                  <input name="image" id="fileInput" type="file"  style="display:none;"  />
                  <input
                    type="button"
                    class="btn btn-primary btn-block mx-auto"
                    value="CHANGER IMAGE "
                    onclick="document.getElementById('fileInput').click();"
                  />
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block text-uppercase" name="Editer">Modifier</button>
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
        $("#expire_date").datepicker({
          defaultDate: "10/22/2020"
        });
      });
    </script>
  </body>
</html>
