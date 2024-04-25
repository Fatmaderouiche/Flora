<?php require_once('../connexion.php'); ?>
<?php session_start(); ?>

<?php
//recuperation des bouquets d'amour 
$rep = $idcon->query('SELECT * FROM produit  where id_cat = 4 and id_occ= 1 LIMIT 4');
$bouquets = $rep->fetchAll();
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🌺Flora Boutique🌺</title>
    <link rel="stylesheet" href="amourcss.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>
<?php require_once('../header.php');?>

      <h1> Amour </h1>
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
                  <div style="background-image:url('<?php echo ($img);?>')"></div>
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
          <!-- <div class="product-box">  
        <div style="background-image:url('image/a1.jpg')"></div>
           <p><strong>Souffle de l’Amour </strong></p>
      <p>Une box de fleurs rouges  </br>qui capture l’essence de</br> l’amour
    </p>
      <p><strong>Prix:125dT</strong></p>
           <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
        </div>
      <div class="product-type">
       <div style="background-image:url('image/a2.jpg')"></div>
       <p><strong>Souvenirs Séchés</strong></p>
      <p>Bouquet de fleurs séchées  </br>
        qui évoque la nostalgie et les</br>
        souvenirs
         </p>
      <p><strong>Prix:96dT</strong></p>
       <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
    </div>
   
    <div class="product-type">
       <div style="background-image:url('image/a3.jpg')"></div>
       <p>Des roses entourées de </br> 
         feuillage luxuriant,</br>  
        représentant un amour </br>
         profond et sincère.
             </p>
      <p><strong>Prix:80dT</strong></p>
       <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
    </div>
    <div class="product-type">
       <div style="background-image:url('image/a4.jpg')"></div>
       <p><strong>Souvenirs Floral</strong> </p>
      <p>Lotus sacré, une plante</br>
        aquatique qui symbolise la</br>
        pureté, la beauté, la </br>
        renaissance spirituelle, et</br>
        l’illumination.</p>
      <p><strong>Prix:85dT</strong></p>
       <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
    </div> -->
    
    
    <div class="product-type">
       <div style="background-image:url('image/a5.jpg')"></div>
       <p><strong>Pissenlit</strong></p>
       <p> Feuilles vertes et dentées,</br> disposées en rosette basale.</br>Symbole de courage </br>et de persévérance.
      </p>
       <p><strong>Prix:99dT</strong></p>
       <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
    </div>
    <div class="product-type">
       <div style="background-image:url('image/a6.jpg')"></div>
       <p><strong> Fougère arborescente</strong></p>
      <p>Grandes frondes vert foncé,</br>
         pennées et coriaces.</br>
        Symbole de la force et de l'amour.</p>
      <p><strong>Prix:129dT</strong></p>
       <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
    </div>
    
    <div class="product-type">
       <div style="background-image:url('image/a7.jpg')"></div>
       <p><strong> Bambou</strong></p>
      <p> Feuilles lancéolées et persistantes.</br>
        Symbole de chance,</br>
         de prospérité et de longévité.</p>
      <p><strong>Prix:145dt</strong></p>
       <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
    </div>
   
    <div class="product-type">
       <div style="background-image:url('image/a8.jpg')"></div>
       <p><strong>Orchidée Dendrobium</strong></p>
      <p>Fleurs grandes et voyantes, </br> 
        Symbole de beauté, </br>d'élégance et de raffinement.
       </p>
      <p><strong>Prix:160dT</strong></p>
       <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="../Panier/panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
    </div>
   </div>
      
   
     <!--**********************end Product-list***********************-->

   <?php require_once('../footer.php'); ?>
</body>
</html>












































      
