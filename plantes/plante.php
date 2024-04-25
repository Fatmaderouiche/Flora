<?php require_once('../connexion.php'); ?>
<?php session_start(); ?>

<?php
//recuperation des bouquets
$rep = $idcon->query('SELECT * FROM produit  where id_cat = 2 and id_occ= 1 LIMIT 4');
$bouquets = $rep->fetchAll();
?> 

  <!DOCTYPE html>
<html>

   <head>

      <meta charset="UTF-8">
      <title>🌺Flora Boutique🌺</title>
      <link rel="stylesheet" href="plantes.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

  <?php require_once('../header/header.php');?>
<body>


      <h1> Nos plantes </h1>
      <section class="product-section">
        <!--********************** product list***********************--> 
   <div class="product-list">
      <div class="products-of-category">
    <?php     
      foreach ($bouquets as $key => $value) {
               $NameProduct = $value['nom'];
               $PriceProduct = $value['prix'];
               $id = $value['id_prod'];
               $stock = $value['quantité'];
               $description = $value['description'];
               $img = $value['image'] ;

            ?>
               <div class="product-type">
                  <div style="background-image:url('../image/<?php echo ($img); ?>')"></div>
                  <p><strong><?php echo ($NameProduct); ?></strong></p>
                  <p> <?php echo ($description); ?></p>
                  <p><strong>Prix: <?php echo ($PriceProduct); ?> DT</strong></p>
                  <?php
                  if ($stock > 0) // si stock supérieur à 0 
                  {
                  ?>
                     <form action="../panier/mon_panier.php" method="post">
                        <p><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <input type="submit" class="addtocart" name="<?php echo $id; ?>" value="Ajouter" ></p>
                     </form>
                     <?php
                  } else // si produit hors stock 
                  {
                  ?>
                     <p class="reappro"> Rupture de stock</p>
                  <?php
                  }
                  ?>
               </div>
            <?php
            }
            ?>

          <!-- <div style="background-image:url('image/p5.jpg')"></div>
           <p><strong>Écho de l'Exotisme</strong></p>
           <p>L’Anthurium </br> 
            andraeanum,symbole de </br> 
            l’hospitalité, l’abondance,</br>  l’amour, la chance </p>
           <p><strong>Prix:235DT</strong></p>
           <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
        </div>
      <div class="product-type">
       <div style="background-image:url('image/p6.jpg')"></div>
       <p><strong>Écho de l'Asie</strong></p>
       <p>L’Ajania, une plante  </br>
         Symbolisant la beauté, la  </br>
         croissance, et la renaissance. </P>
       <p><strong>Prix:40DT</strong></p>
       <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
    </div>
   
    <div class="product-type">
       <div style="background-image:url('image/p7.jpg')"></div>
       <p><strong>Élégance Éternelle</strong></p>
       <p>Orchidée papillon,une  </br>
         plante exotique qui
         symbolise </BR>
         l’élégance, la
féminité et</BR>
l’attachement. </p>
       <p><strong>Prix:73DT</strong></p>
       <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
    </div>
    <div class="product-type">
       <div style="background-image:url('image/p8.jpg')"></div>
       <p><strong>Écho de l’Éveil</strong></p>
       <p>Lotus sacré, une plante aquatique  </br> 
         qui symbolise la pureté, </br> 
         la beauté, la renaissance spirituelle,</br>
et l’illumination.</p>
       <p><strong>Prix:150DT</strong></p>
       <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
    </div> -->
    <div class="product-type">
       <div style="background-image:url('../image/p5.jpg')"></div>
       <p><strong>Une plante de Joie</strong></p>
      <p> cette plante évoque </br>
         la joie et la chaleur </br>
         de l’occasion 
         </p>
      <p><strong>Prix:90DT</strong></p>
       <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
    </div>
    <div class="product-type">
       <div style="background-image:url('../image/p6.jpg')"></div>
       <p><strong>Anthurium</strong></p>
       <p>
         Feuilles brillantes et coriaces</br> 
         Symbole d'amour et de passion.</br> </p>
       <p><strong>Prix:139DT</strong></p>
       <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
    </div>
    
    <div class="product-type">
       <div style="background-image:url('../image/p7.jpg')"></div>
       <p><strong>Orchidée Phalaenopsis</strong></p>
       <p>

         Feuilles larges et brillantes  </br> 
         qui ymbole de beauté et d'élégance. </br> </p>
       <p><strong>Prix:95.9DT</strong></p>
       <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
    </div>
   
    <div class="product-type">
       <div style="background-image:url('../image/p8.jpg')"></div>
       <p><strong>Echeveria </strong></p>
       <p>

         Feuilles charnues et succulentes</br> 
         disposées en rosette</br> 
         symbole de patience et de</br>  persévérance.  
          </p>
       <p><strong>Prix:30DT</strong></p>
       <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
    </div>
   </div>
      
   
     <!--**********************end Product-list***********************-->
     <?php
 require_once('../footer/footer.php');
 ?>
  </body>
</html>















































      
