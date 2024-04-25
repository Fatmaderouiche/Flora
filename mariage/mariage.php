<?php require_once('connexion.php'); ?>
<?php session_start(); ?>

<?php
//recuperation des bouquets
$rep = $idcon->query('SELECT * FROM produit  where id_cat = 4 and id_occ= 2 LIMIT 4');
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
  <?php require_once('header.php');?>


   <!--**********************section product***********************-->
   <h1>Mariage</h1>
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
               <div class="product-box">
                  <div style="background-image:url('<?php echo ($img); ?>')"></div>
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

  <!-- <div class="product-box">
      <div style="background-image:url('bmariage.jpg')"></div>
      <p><strong>Charme Floral Blanc </strong></p>
      <p> Un mélange délicat de</br>
          camélias,apportant une touche </br>
         de charme</br></p>
      <p><strong>Prix:80DT</strong></p>
      <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
   </div>
   <div class="product-box">
      <div style="background-image:url('mar4\ \(3\).jpg')"></div> 
      <p><strong>Un Bouquet de Joie</strong></p>
      <p> ce bouquet évoque </br>
         la joie et la chaleur </br>
         de l’occasion 
         </p>
      <p><strong>Prix:90DT</strong></p>
      <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
   </div>
   <div class="product-box">
      <div style="background-image:url('marr.jpg')"></div> 
      <p><strong>Éclat de Pureté</strong></p>
      <p>Une boquet de fleurs </br>
          qui symbolise la</br>
          sérénité de la lune.
         </p>
      <p><strong>Prix:85DT</strong></p>
      <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
   </div>
   <div class="product-box">
      <div style="background-image:url('mar.jpg')"></div> 
      <p><strong>bouquet de tendresse</strong> </p>
      <p> Une boquet de fleurs roses</br>
          pour une touche </br>
          de joie et de bonheur </p>
      <p><strong>Prix:75DT</strong></p>
      <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
   </div> -->
   <div class="product-box">
      <div style="background-image:url('marrr.jpg')"></div> 
      <p><strong>Éclat de Rouge</strong></p>
      <p>ce bouquet évoque la </br>
         passion et la chaleur. </p>
      <p><strong>Prix:109,9DT</strong></p>
      <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
   </div>
   <div class="product-box">
      <div style="background-image:url('mar6.jpg')"></div> 
      <p><strong> bouquet de Douceur </strong></p>
      <p>ce bouquet respire </br>
         la pureté et l’élégance</p>
      <p><strong>Prix:69,9DT</strong></p>
      <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
   </div>
   <div class="product-box">
      <div style="background-image:url('mar5.jpg')"></div> 
      <p><strong>élégance Florale</strong></p>
      <p>  roses rose fraîches,</br>
          soigneusement disposées</p>
      <p><strong>Prix:89,9DT</strong></p>
      <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
   </div>
   <div class="product-box">
      <div style="background-image:url('original\ bouquet.jpg')"></div> 
      <p><strong>Un Bouquet d’Affection</strong></p>
      <p>un bouquet où chaque pétale</br>
       chante une mélodie d’amour</p>
      <p><strong>Prix:109,9DT</strong></p>
      <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
   </div>
   </div>
   <?php
 require_once('footer.php');
 ?>
  </body>
  