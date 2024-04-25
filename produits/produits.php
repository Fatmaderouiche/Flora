<?php require_once('../connexion.php'); ?>
<?php session_start(); ?>

<?php
//recuperation des bouquets
$rep = $idcon->query('SELECT * FROM produit  where id_cat = 1 LIMIT 4');
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
<?php
 require_once('../header/header.php');
 ?>
   


   <!--**********************section product***********************-->
   <h1>Nos produits</h1>
   <h1 class="product"> Nos bouquets</h1>
   <section class="product-section">


      <!--********************** product list***********************-->


      <!-- ------------------bouquets-------->

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

            <!--    <div class="product-box">
               <div style="background-image:url('love.jpg')"></div>
               <p><strong>Éclat de Rouge</strong></p>
               <p>ce bouquet évoque la </br>
                  passion et la chaleur. </p>
               <p><strong>Prix:90DT</strong></p>
               <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
            </div>
         
            <div class="product-box">
               <div style="background-image:url('baniv.jpg')"></div>
               <p><strong>Éclat de beauté</strong></p>
               <p>Une boquet de fleurs </br>
                  qui symbolise la</br>
                  sérénité de la lune.
               </p>
               <p><strong>Prix:85DT</strong></p>
               <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
            </div>
            <div class="product-box">
               <div style="background-image:url('Floral\ Fiesta.jpg')"></div>
               <p><strong>bouquet de tendresse</strong> </p>
               <p> Une boquet de fleurs </br>
                  avec une touche </br>
                  de joie et de bonheur </p>
               <p><strong>Prix:75DT</strong></p>
               <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
            </div>-->


            <h1 class="seche">Nos fleurs séchées</h1>
            <div class="p1">
               <!-- ----------------------- fleurs séchées --------- -->
              
               <div class="product-box">
                  <div style="background-image:url('../images/seche\ \(1\).jpg')"></div>

                  <p><strong> Éternité Élégante </strong></p>
                  <p> bouquet de fleurs séchées blanches, </br>
                     symbolisant l’éternité et l’élégance </br></p>
                  <p><strong>Prix:80DT</strong></p>
                  <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
               </div>

               <div class="product-box">
                  <div style="background-image:url('../images/seche\ \(2\).jpg')"></div>
                  <p><strong> Écho de l’Époque </strong></p>
                  <p>Un bouquet de fleurs séchées </br>
                     qui évoque le charme du passé. </p>
                  <p><strong>Prix:90DT</strong></p>
                  <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
               </div>
               <div class="product-box">
                  <div style="background-image:url('../images/seche\ \(3\).jpg')"></div>
                  <p><strong> Souvenirs Séchés</strong></p>
                  <p>bouquet de fleurs séchées qui</br>
                     évoque la nostalgie</br>
                     et les souvenirs.
                  </p>
                  <p><strong>Prix:85DT</strong></p>
                  <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
               </div>
               <div class="product-box">
                  <div style="background-image:url('../images/Banana\ Colada.jpg')"></div>
                  <p><strong>Sagesse du Safran</strong> </p>
                  <p> Un bouquet de fleurs séchées jaunes</br>
                     , symbolisant la sagesse </br>
                     et la tranquillité. </p>
                  <p><strong>Prix:75DT</strong></p>
                  <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
               </div>

            </div> 
               <h1 class="box">Nos boxs</h1>
               <div class="p2">
                
               <div class="product-box">

                     <div style="background-image:url('../images/b1naiss.jpg')"></div>
                     <p><strong>Un Box de Joie</strong></p>
                     <p> ce box évoque </br>
                        la joie et la chaleur </br>
                        de l’occasion
                     </p>

                     <p><strong>Prix:109,9DT</strong></p>
                     <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
                  </div>

                  <div class="product-box">
                     <div style="background-image:url('../images/box\ \(1\).jpg')"></div>
                     <p><strong>élégance Florale</strong></p>
                     <p> roses fraîches,</br>
                        soigneusement disposées</p>
                     <p><strong>Prix:89,9DT</strong></p>
                     <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
                  </div>
                  <div class="product-box">
                     <div style="background-image:url('../images/box\ \(4\).jpg')"></div>
                     <p><strong> un box de Douceur </strong></p>
                     <p>un box respire </br>
                        la pureté et l’élégance</p>
                     <p><strong>Prix:69,9DT</strong></p>
                     <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
                  </div>
                  <div class="product-box">
                     <div style="background-image:url('../images/box\ \(2\).jpg')"></div>
                     <p><strong>Un Box d’Affection</strong></p>
                     <p>un box où chaque pétale</br>
                        chante une mélodie d’amour</p>
                     <p><strong>Prix:109,9DT</strong></p>
                     <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
                  </div>
               </div>


                  <h1 class="plantes">Nos plantes</h1>
                  <div class="p3">
                
                 <div class="product-box">
                     <div style="background-image:url('../images/plante\ \(1\).jpg')"></div>
                    <p><strong>Charme Floral </strong></p>
                     <p> L’Anthurium andraeanum,symbole de l’hospitalité,</br>
                        l’abondance, l’amour, la chance</br></p>
                     <p><strong>Prix:80DT</strong></p>
                     <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
                  </div>
                  <div class="product-box">
                     <div style="background-image:url('../images/plante\ \(2\).jpg')"></div>
                     <p><strong>Éclat de rose</strong></p>
                     <p>une plante évoque la </br>
                        passion et la chaleur. </p>
                     <p><strong>Prix:90DT</strong></p>
                     <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
                  </div>
                  <div class="product-box">
                     <div style="background-image:url('../images/plante\ \(3\).jpg')"></div>
                     <p><strong>Éclat de beauté</strong></p>
                     <p>Une plante de fleurs </br>
                        qui symbolise la</br>
                        sérénité de la lune.
                     </p>
                     <p><strong>Prix:85DT</strong></p>
                     <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
                  </div>
                  <div class="product-box">
                     <div style="background-image:url('../images/plante\ \(4\).jpg')"></div>
                     <p><strong>plante de tendresse</strong> </p>
                     <p> Une plante de fleurs </br>
                        avec une touche </br>
                        de joie et de bonheur </p>
                     <p><strong>Prix:75DT</strong></p>
                     <button class="addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="panier.html" style="text-decoration:none; color:black;">Ajouter </a> </button>
                  </div>
               </div>



               <?php
 require_once('../footer/footer.php');
 ?>
   
                     
</body>