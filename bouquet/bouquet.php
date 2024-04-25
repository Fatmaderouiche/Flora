<?php require_once('../connexion.php'); ?>
<?php session_start(); ?>

<?php
//recuperation des bouquets
$rep = $idcon->query('SELECT * FROM produit  where id_cat = 4 and id_occ= 4 LIMIT 4');
$bouquets = $rep->fetchAll();
?> 
<!DOCTYPE html>
<html>

   <head>

      <meta charset="UTF-8">
      <title>🌺Flora Boutique🌺</title>
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

  <body>

  <?php require_once ('../header/header.php');?>
   

   <!--**********************section product***********************-->
   <h1>NOS BOUQUETS</h1>
   <section class="product-section">
     <!--********************** product list***********************--> 
      <div class="product-list">
   <div class="products-of-category">
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
               <div class="product-box">
                  <div style="background-image:url('<?php echo "../images/".($img); ?>')"></div>
                  <p><strong><?php echo ($NameProduct); ?></strong></p>
                  <p> <?php echo ($description); ?></p>
                  <p><strong>Prix: <?php echo ($PriceProduct); ?> DT</strong></p>
                  <?php
                  if ($stock > 0) // si stock supérieur à 0 
                  {
                  ?>
                     <form action="panier/mon_panier.php" method="post">
                        <p><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <input type="submit" class="addtocart" name="<?php echo $id; ?>" value="Ajouter" ></p>
                     </form>
                     <?php
                  } else // si produit hors stock 
                  {
                  ?>
                     <p class="reappro">Rupture de stock</p>
                  <?php
                  }
                  ?>
               </div>
            <?php
            }
            ?>


   <!--<div class="product-box">
      <div style="background-image:url('bnaiss3.jpg')"></div>
      <p><strong>Éclat de Bleu</strong></p>
      <p>Un bouquet comme </br>
         un trésor naturel</br>
         à offrir  </br>
          </p>
      <p><strong>Prix:100DT</strong></p>
      <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
   </div>
   <div class="product-box">
      <div style="background-image:url('baniv.jpg')"></div> 
      <p><strong>Un Bouquet de Joie</strong></p>
      <p> ce bouquet évoque </br>
         la joie et la chaleur </br>
         de l’occasion 
         </p>
      <p><strong>Prix:90DT</strong></p>
      <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
   </div>
   <div class="product-box">
      <div style="background-image:url('bmariage.jpg')"></div> 
      <p><strong>Bouquet de Douceur</strong></p>
      <p>Une boquet de fleurs </br>
          qui symbolise la</br>
          sérénité de la lune.
         </p>
      <p><strong>Prix:85DT</strong></p>
      <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
   </div>
   <div class="product-box">
      <div style="background-image:url('bcad.jpg')"></div> 
      <p><strong>bouquet de tendresse</strong> </p>
      <p> Une boquet de fleurs roses
          pour une touche de joie et de
         bonheur </p>
      <p><strong>Prix:75DT</strong></p>
      <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
   </div> -->
   <div class="product-box">
      <div style="background-image:url('../images/blove.jpg')"></div> 
      <p><strong>Éclat de Rouge</strong></p>
      <p>ce bouquet évoque la </br>
         passion et la chaleur. </p>
      <p><strong>Prix:130,9DT</strong></p>
      <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
   </div>
   <div class="product-box">
      <div style="background-image:url('../images/mar.jpg')"></div> 
      <p><strong>Éclat de Pureté </strong></p>
      <p>ce bouquet respire la pureté et l’élégance</p>
      <p><strong>Prix:69,9DT</strong></p>
      <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
   </div>
   <div class="product-box">
      <div style="background-image:url('../images/Floral\ Fiesta.jpg')"></div> 
      <p><strong>élégance Florale</strong></p>
      <p>  roses blanches fraîches,
          soigneusement disposées</p>
      <p><strong>Prix:89,9DT</strong></p>
      <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
   </div>
   <div class="product-box">
      <div style="background-image:url('../images/baniv.jpg')"></div> 
      <p><strong>Un Bouquet de joie</strong></p>
      <p>un bouquet où chaque pétale</br>
       chante une mélodie de joie</p>
      <p><strong>Prix:109,9DT</strong></p>
      <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
   </div>
   </div>



<?php require_once('../footer/footer.php');?>
   
  </body>
</html>