<?php require_once('../connexion.php'); ?>
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
<link rel="stylesheet" href="occasion.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<?php require_once('../header/header.php');?>
  <body> 
 
   <!--**********************section product***********************-->
   <h1>Occasions</h1>
   <h1 class="product"> Mariage</h1>
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

     <!-- <div style="background-image:url('image/mariage.jpg')"></div>
      <p><strong>Charme Floral Blanc</strong></p>
      <p> Un mélange délicat de </br>
         camélias ,apportant une </br>
         touche de charme et de </br>
         délicatesse .
      </p>
      <p><strong>Prix:75DT</strong></p>
      <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
  </div>
   <div class="product-box">
      <div style="background-image:url('image/m2.jpg')"></div> 
      <p><strong>Jardin d'Ivoire</strong></p>
      <p> 

         Des fleurs de lis</br> blancs,forment un bouquet </br>qui évoque l'image d'un </br>jardin romantique .
         </p>
      <p><strong>Prix:86dT</strong></p>
      <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
   </div>
   <div class="product-box">
      <div style="background-image:url('image/m3.jpg')"></div> 
      <p><strong>Sérénade de Neige </strong></p>
      <p>
         Un bouquet de fleurs </br>blanches, rappelant la</br> beauté et la tranquillité de</br> la neige.
     </p>
      <p><strong>Prix:73dT</strong></p>
      <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
   </div>
   <div class="product-box">
      <div style="background-image:url('image/m4.jpg')"></div> 
      <p><strong> Perle Précieuse</strong> </p>
      <p>Des callas, des roses et des</br> hortensias blancs,rappelant </br>la pureté des perles</br> précieuses.
         </p>
      <p><strong>Prix:50dT</strong></p>
      <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
   </div> -->
      
   
 <h1 class="seche">Anniversaires</h1>
 <div class="p1">
   <div class="product-box">
      <div style="background-image:url('../image/an.jpg')"></div>
     
      <p><strong>Rêve en Rose </strong></p>
      <p> 
         Un bouquet romantique </br>composé de roses pâles et</br> de touches de blanc, </br>semblable à un rêve éveillé.
         </p>
      <p><strong>Prix:105dt</strong></p>
      <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
   </div>
   
   <div class="product-box">
      <div style="background-image:url('../image/an2.jpg')"></div> 
     <p><strong> Ballet Floral</strong></p>
      <p>

         Un ensemble de roses</br> dansantes, créant un </br>spectacle floral d'une </br>beauté exquise.
          </p>
      <p><strong>Prix:45dt</strong></p>
      <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
   </div>
   <div class="product-box">
      <div style="background-image:url('../image/an3.jpg')"></div> 
      <p><strong> Symphonie de Roses</strong></p>
      <p>

         Une composition </br> harmonieuse de roses, </br> comme une symphonie </br> visuelle de l'amour.
         
         </p>
      <p><strong>Prix:60dt</strong></p>
      <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
   </div>
   <div class="product-box">
      <div style="background-image:url('../image/an4.jpg')"></div> 
     <p><strong>Romantique Opaline</strong> </p>
      <p>
         Des pivoines blanches  se </br>mélangent dans une palette</br> de tons,opalins, créant un </br>bouquet romantique et </br>intemporel. </p>
      <p><strong>Prix:75dt</strong></p>
      <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
   </div>
 
</div>

<h1 class="box">Amour</h1>
<div class="p2">
   <div class="product-box">
   
    <div style="background-image:url('../image/a1.jpg')"></div> 
    <p><strong>Souffle de l'Amour</strong></p>
    <p> Une box de fleurs rouges  </br>qui capture l’essence de</br> l’amour
       </p>
    
    <p><strong>Prix:125dt</strong></p>
    <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
 </div>
 
 <div class="product-box">
    <div style="background-image:url('../image/a2.jpg')"></div> 
    <p><strong>Souvenirs Séchés</strong></p>
    <p>Bouquet de fleurs séchées  </br>
      qui évoque la nostalgie et les</br>
      souvenirs
       </p>
    <p><strong>Prix:96dt</strong></p>
    <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
 </div>
 <div class="product-box">
  <div style="background-image:url('../image/a3.jpg')"></div> 
  <p><strong> Passion Écarlate</strong></p>
    <p>Un mélange enflammé de </br>roses rouges profondes, </br>
      de pivoines et de baies,</br> symbolisant l'amour</br> passionné.
      
           </p>
    <p><strong>Prix:80dT</strong></p>
  <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
</div>
 <div class="product-box">
    <div style="background-image:url('../image/a4.jpg')"></div> 
    <p><strong>Souvenirs Floral</strong></p>
    <p>Des roses entourées de</br> feuillage luxuriant,</br> représentant un amour </br>profond et sincère.
   </p>
    <p><strong>Prix:85dt</strong></p>
    <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
 </div>
</div>
<h1 class="plantes">Naissance</h1>
<div class="p3">
   <div class="product-box">
      <div style="background-image:url('../image/b1.jpg')"></div>
    <p><strong>Ciel Enchanté </strong></p>
      <p> Ciel Enchanté

         Un bouquet aérien avec des </br>fleurs bleues délicates,</br> évoquant la magie et la </br>romance d'un ciel étoilé.</p>
      <p><strong>Prix:235dt</strong></p>
      <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
   </div>
   <div class="product-box">
      <div style="background-image:url('../image/b2.jpg')"></div> 
      <p><strong>Douce Émergence</strong></p>
      <p>cUn mélange délicat de roses </br>symbolisant la douceur et </br>l'émergence d'une nouvelle </br>vie. </p>
      <p><strong>Prix:90DT</strong></p>
      <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
   </div>
   <div class="product-box">
      <div style="background-image:url('../image/b3.jpg')"></div> 
      <p><strong>Douce Brise Dorée</strong></p>
      <p>

         Des roses jaunes pâles et </br>des tulipes dans un </br>arrangement aéré, </br>évoquant la douceur d'une </br>brise printanière.
         
         </p>
      <p><strong>Prix:73dt</strong></p>
      <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
   </div>
   <div class="product-box">
      <div style="background-image:url('../image/b4.jpg')"></div> 
      <p><strong>Fraîcheur Printanière</strong> </p>
      <p>

         Un mélange de fleurs vertes</br> vives, symbolisant la</br> nouveauté et la vitalité du </br>printemps.
          </p>
      <p><strong>Prix:150dt</strong></p>
      <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
   </div>
</div>
<?php
 require_once('../footer/footer.php');
 ?>
  </body>
</html>