<?php require_once('../connexion.php'); ?>
<?php session_start(); ?>

<?php
//recuperation des bouquets
$rep = $idcon->query('SELECT * FROM produit WHERE id_cat = 4  AND id_occ = 3   LIMIT 4');

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
  <?php require_once('../header/header.php');?>


   <!--**********************section product***********************-->
   <h1>Anniversaire</h1>
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
                     <form action="../panier/mon_panier.php" method="post">
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

  <div class="product-box">
      <div style="background-image:url('Golden\ Sunrise\ .jpg')"></div>
           <p><strong>Golden Sunrise </strong></p>
           <p>A “Happy Birthday” card  </br> 
               
               Perfect for celebrating life’s little moments. </p>
           <p><strong>Prix:30DT</strong></p>
      <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
   </div>
   <div class="product-box">
       <div style="background-image:url('Romantique\ Opaline.jpg')"></div>
       <p><strong>Romantique Opaline</strong></p>
       <p>Des pivoines blanches se  </br>
           mélangent dans une    </br>
           palette de tons ,opalins,  </br>
            créant un bouquet romantique et  intemporel </p>
       <p><strong>Prix:110DT</strong></p>
       <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
    </div>
   
    
    <div class="product-box">
       <div style="background-image:url('Whispering\ Petals.jpg')"></div>
       <p><strong>Whispering Petals</strong></p>
       <p>Doux et délicat,  </br> 
         Les pétales chuchotants portent les secrets de l’amour</br> 
         et de la grâce. Idéal pour exprimer des sentiments sincères.</p>
       <p><strong>Prix:100DT</strong></p>
       <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
    </div>
    <div class="product-box">
       <div style="background-image:url('BalletFloral.jpg')"></div>
       <p><strong>Ballet Floral</strong></p>
       <p>Un ensemble de roses </br> 
           dansantes,créant un </br> 
           spectacle floral</br> 
           d'une beauté exquise.  </p>
       <p><strong>Prix:73DT</strong></p>
       <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
    </div>

   



    <!-- <div class="product-box">
       <div style="background-image:url('Rêve en Rose.jpg.jpg')"></div>
       <p><strong>Rêve en Rose</strong></p>
       <p>Un bouquet romantique </br>
         composé de roses pâles et  </br>
         de touches de blanc, </br>
         semblable à un rêve éveillé</p>
       <p><strong>Prix:105DT</strong></p>
       <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
    </div>
    <div class="product-box">
       <div style="background-image:url('Symphonie\ de\ Roses.jpg')"></div>
       <p><strong>Symphonie de Roses</strong></p>
       <p>Une composition harmonieuse de roses,  </br>
           comme une symphonie 
           visuelle de l'amour. </p>
       <p><strong>Prix:85DT</strong></p>
       <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
    </div>
    
    <div class="product-box">
       <div style="background-image:url('Lavender\ Elegance.jpg')"></div>
       <p><strong>Lavender Elegance</strong></p>
       <p>A dance of grace,   </br> 
           in every space,</br> 
           Lavender Elegance lights up the place . </p>
       <p><strong>Prix:100DT</strong></p>
       <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
    </div>
   
    <div class="product-box">
       <div style="background-image:url('Golden\ Sunrise\ .jpg')"></div>
       <p><strong>“Golden Sunrise </strong></p>
       <p>A “Happy Birthday” card  </br> 
          adorned with lifelike white flowers </br>  and elegant gold lettering.</br> 
           It’s warmth and personal touch </br>  in one delightful package!</p>
       <p><strong>Prix:30DT</strong></p>
       <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
    </div>
   </div>-->

   <?php
 require_once('../footer/footer.php');
 ?>
  </body>
  