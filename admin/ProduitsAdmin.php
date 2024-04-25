<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Products Page -Admin Dashboard</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="ProduitsAdmin.css">
  </head>

  <body id="reportsPage" background="img\dashboardbackground.jpeg">
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
            <li class="nav-item">
              <a class="nav-link active" href="products.html">
                <i class="fas fa-shopping-cart"></i> Produits
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="ComptesAdmin.html">
                <i class="far fa-user"></i> Comptes
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
                <i class="fas fa-cog"></i>
                <span> Paramétres <i class="fas fa-angle-down"></i> </span>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="profile.html">Profile</a>
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
    <div class="container mt-5">
      <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-products">
            <div class="tm-product-table-container">
              <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                  <tr>
                    <th scope="col">&nbsp;</th>
                    <th scope="col" style="color:aliceblue; font-size:15px; text-decoration:underline;">NOM DU PRODUIT</th>
                    <th scope="col" style="color:aliceblue;font-size:15px; text-decoration:underline;">UNITE VENDUE </th>
                    <th scope="col" style="color:aliceblue;font-size:15px; text-decoration:underline;">IN STOCK</th>
                   <th scope="col">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                
                    <?php require_once('connexion.php');

                     //recuperation des bouquets
              $rep = $idcon->query('SELECT id_prod , nom , prix , quantité FROM produit   ');
               $bouquets = $rep->fetchAll();



            foreach ($bouquets as $key => $value) {
               $NameProduct = $value['nom'];
               $PriceProduct = $value['prix'];
               $id= $value ['id_prod'] ;
               $stock = $value['quantité'];

            ?>
                 <tr>
                    <th scope="row"></th>
                    <td class="tm-product-name"><?php echo ($NameProduct); ?></td>
                    <td>Prix: <?php echo ($PriceProduct); ?> DT</td>
                    <td><?php echo ($stock); ?></td> 

                    <td>
                    <a  class="tm-product-delete-link" href="supprimer_produit.php?id=<?php echo $id?>" onclick="return confirm('Voulez vous vraiment supprimer le produit <?php echo $NameProduct?> ?')">
                    <i class="far fa-trash-alt tm-product-delete-icon"></i>
                  </a>
                  <a  class="tm-product-delete-link" href="EditerProduitAdmin.php?id=<?php echo $id?>">
                  <i class="fas fa-edit tm-product-edit-icon"></i></a>
                     
                    </td>
                  </tr>
                  <?php
            }
            ?>
                 <!-- <tr>
                    <th scope="row"><input type="checkbox" /></th>
                    <td class="tm-product-name">Romance Rosée</td>
                    <td>1,250</td>
                    <td>750</td>
                    <td>21 Mars 2024</td>
                    <td>
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row"><input type="checkbox" /></th>
                    <td class="tm-product-name">Whiespering Petals</td>
                    <td>1,100</td>
                    <td>900</td>
                    <td>18 Fev 2024</td>
                    <td>
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row"><input type="checkbox" /></th>
                    <td class="tm-product-name">Echo de l'époque </td>
                    <td>1,400</td>
                    <td>600</td>
                    <td>24 Fev 2024</td>
                    <td>
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row"><input type="checkbox" /></th>
                    <td class="tm-product-name">Eclat de fleurs</td>
                    <td>1,800</td>
                    <td>200</td>
                    <td>22 Fev 2024</td>
                    <td>
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row"><input type="checkbox" /></th>
                    <td class="tm-product-name">Orchidée Phalenopsis</td>
                    <td>1,000</td>
                    <td>1,000</td>
                    <td>20 Fev 2024</td>
                    <td>
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row"><input type="checkbox" /></th>
                    <td class="tm-product-name">Passion Ecarlate</td>
                    <td>500</td>
                    <td>100</td>
                    <td>10 Fev 20124</td>
                    <td>
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row"><input type="checkbox" /></th>
                    <td class="tm-product-name">Fraîcheur Printanière</td>
                    <td>1,000</td>
                    <td>600</td>
                    <td>08 Fev 2024</td>
                    <td>
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row"><input type="checkbox" /></th>
                    <td class="tm-product-name">Symphonie de sourire</td>
                    <td>1,200</td>
                    <td>800</td>
                    <td>24 Jan 2024</td>
                    <td>
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row"><input type="checkbox" /></th>
                    <td class="tm-product-name">Lumiére de Lune </td>
                    <td>1,600</td>
                    <td>400</td>
                    <td>22 Jan 2024</td>
                    <td>
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row"><input type="checkbox" /></th>
                    <td class="tm-product-name">Eternel Bloom</td>
                    <td>2,000</td>
                    <td>400</td>
                    <td>21 Jan 2024</td>
                    <td>
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>-->
                </tbody>
              </table>
            </div>

            <a
              href="AjouterProduitAdmin.php"
              class="btn btn-primary btn-block text-uppercase mb-3">Ajouter un nouveau produit</a>
          
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
            <h2 class="tm-block-title"> Catégories des produits</h2>
            <div class="tm-product-table-container">
              <table class="table tm-table-small tm-product-table">
                <tbody>
                  <tr>
                    <td class="tm-product-name">Box</td>
                    <td class="text-center">
                      <a href="#" class="tm-product-delete-link">
               
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="tm-product-name">Box Naissance</td>
                    <td class="text-center">
                      <a href="#" class="tm-product-delete-link">
              
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="tm-product-name">Box Anniversaire</td>
                    <td class="text-center">
                      <a href="#" class="tm-product-delete-link">
             </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="tm-product-name">Fleurs séchées</td>
                    <td class="text-center">
                      <a href="#" class="tm-product-delete-link">
        </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="tm-product-name">Bouquets</td>
                    <td class="text-center">
                      <a href="#" class="tm-product-delete-link">
                     </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="tm-product-name">Plantes</td>
                    <td class="text-center">
                      <a href="#" class="tm-product-delete-link">
                    </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="tm-product-name">Bouquet Amour </td>
                    <td class="text-center">
                      <a href="#" class="tm-product-delete-link">
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="tm-product-name">Bouquet Naissance</td>
                    <td class="text-center">
                      <a href="#" class="tm-product-delete-link">
                     </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="tm-product-name">Box Anniversaire</td>
                    <td class="text-center">
                      <a href="#" class="tm-product-delete-link">
                     </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="tm-product-name">Box Mariage</td>
                    <td class="text-center">
                      <a href="#" class="tm-product-delete-link">
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="tm-product-name">Bouquet Amour</td>
                    <td class="text-center">
                      <a href="#" class="tm-product-delete-link">
                    </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- table container -->
          
          </div>
        </div>
      </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
      $(function() {
        $(".tm-product-name").on("click", function() {
          window.location.href = "edit-product.html";
        });
      });
    </script>
  </body>
</html>