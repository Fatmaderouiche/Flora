<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🌺Flora Boutique🌺</title>
    <link rel="stylesheet" href="acceuil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      .search-results {
    margin: 20px;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
}

.product {
    display: flex;
    align-items: center;
    border-bottom: 1px solid #eee;
    padding: 10px 0;
}

.product-image {
    width: 100px;
    height: 100px;
    margin-right: 20px;
    border-radius: 50%;
    object-fit: cover;
}

.product-info {
    flex-grow: 1;
}

.product-name {
    font-size: 1.2em;
    color:#f519a4;
    margin-bottom: 5px;
}

.product-description {
    font-size: 0.9em;
    margin-bottom: 10px;
}

.product-price {
    font-weight: bold;
}

.no-results {
    margin: 20px;
    padding: 20px;
    background-color: #ffefef;
    border: 1px solid #ffcccc;
    border-radius: 8px;
    text-align: center;
}

    </style>
</head>
<body>
   <section id="header">
   <ul id="navbar">
      
      <div class="logo"> <img src="image/logo.png" class="logo"> </div>
      

      <li > <a href="../acceuil/acceuil.php">Acceuil</a></li>
      
      <div class="dropdown" id="middle" >
         <button class="dropbtn">Produits 
           <i class="fa fa-caret-down"></i>
         </button>
         <div class="dropdown-content">
           <a href="#">Bouquets</a>
           <a href="../fleurs séchées/fleurs séchées.php">Fleurs sechés</a>
           <a href="../box/Box.php">Box</a>
           <a href="#">Plante</a>
         </div>
      </div> 

      <div class="dropdown" id="middle" >
         <button class="dropbtn">occasions 
           <i class="fa fa-caret-down"></i>
         </button>
         <div class="dropdown-content">
           <a href="#">Amour</a>
           <a href="../mariage/mariage.php">Mariage</a>
           <a href="../anniversaire/anniversaire.php">Anniversaire</a>
           <a href="../Naissance/Naissance.php">Naissance</a>
         </div>
       </div> 

      <li> <a href="#">Contact </a></li>
      
   
      <div class="search-container" id="search-container">
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
             <input class="search-input" type="text" name="query" >
             <button type="submit"><i class="fa fa-search"  style="font-size:20px" onclick="toggleSearch()"></i></button>
         </form>
      
      </div>
      <script>
function toggleSearch() {
    var searchContainer = document.querySelector('.search-container');
    if (searchContainer.style.display === 'flex') {
        searchContainer.style.display = 'none';
    } else {
        searchContainer.style.display = 'flex';
    }
}
</script>


      <li> <a href="../account settings/account settings.html" class="fa fa-user-circle" ></a></li>
      <li> <a href="../Panier/mon_panier.php" class="fa fa-shopping-cart"></a></li> 
   
      </section>
      
      <!-- end header-->
  
    <section class="first">
    </br></br></br>
        <h1>Flower  Boutique </h1>
      </br>
           <h2>Éveillez vos sens, laissez nos fleurs parler pour vous</h2>
         </br></br>
           <button><a style="text-decoration:none; color: black;" href="">Shop Now</a></button>  
    </section>
     <!--**********************end first***********************-->
    <section class="category-section">
        <h2>Nos produits</h2>
      </br></br></br></br></br>
      <div class="category-list">
      
      <div class="category-box"> 
         <div style="background-image:url('../images/rose.jpg')"></div>
         <p>Bouquets</p>
      </div>
      <div class="category-box"> 
        <div style="background-image:url('../images/seches.jpg')"></div>
         <p>Fleurs sechés</p>
      </div>
      <div class="category-box"> 
         <div style="background-image:url('../images/box.jpg')"></div>
         <p>Box</p>
      </div>
      <div class="category-box"> 
         <div style="background-image:url('../images/plante.jpg')"></div>
         <p>Plante</p>
      </div>
    </div>
   </br></br></br>
    <center>
    <button><a style="text-decoration:none; color: black;" href="">Voir tous</a></button>   </center> 
    </section>
    <!--**********************end category-section***********************-->

    <div class="image-container-up">
      <img src="../images/red.jpg" alt="Image 1" class="image1" height="300px" width="30px">
      <img src="../images/sechee.jpg" alt="Image 2" class="image2" height="300px">
  </div>
  <div class="image-container-bottom">
   <img src="../images/vase.jpg" alt="Image 3" class="image3"height="350px" width="350px">
   <img src="../images/pink.jpg" alt="Image 4" class="image4" height="350px" width="810px">
</div>
 <!--**********************end pub-section***********************-->
 <footer>

   
    <div class="nav">
      <p>"Satisfait ou relivré”</br>

        Si la plante ou le bouquet que </br>
        vous avez reçu ne correspond</br>
         pas à votre commande, nous </br>
         nous excusons et nous nous engageons à le redélivrer </br>
         gratuitement !
        </p>
   </div>
   <div class="socials">
      <p> <strong>Réseaux sociaux </strong></p>
      <ul>
         <li><a href="#" class="fa fa-facebook-square" >facebook</a></li>
         <li><a href="#" class="fa fa-instagram"> Instagram </a></li>
         <li><a href="#" class="fa fa-whatsapp"> Whatsapp </a></li>
      </ul>
   
   </div>
    <div class="reach-at">
       <p><strong>Contactez nous</strong></h2>
         <ul>
            <li><a href="#" class="fa fa-mobile-phone">+21629800601</a></li>
            <li><a href="#" class="fa fa-map-marker fa-x -grey "> Tunis,Manar </a></li>
            <li><a href="#" class="fa fa-envelope fa-x  icon-grey "> FloraBoutique@gmail.com </a></li>
         </ul>
       
    </div>

    
</footer>
<!--  end footer section-->

<?php
// Inclusion du fichier de connexion à la base de données
require_once '../connexion.php';

try {
  
    // Vérifier si une requête de recherche a été soumise
    if (isset($_GET['query'])) {
        // Préparation de la requête SQL pour rechercher des produits par leur nom
        $query = $_GET['query'];
        $requete = "SELECT * FROM produit WHERE nom LIKE :query";
        $statement = $idcon->prepare($requete);
        $statement->bindValue(':query', "%$query%");
        $statement->execute();

        // Affichage des résultats de la recherche
if ($statement->rowCount() > 0) {
   echo "<div class='search-results'>";
   echo "<h2>Résultats de la recherche pour : '$query'</h2>";
   while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
       echo "<div class='product'>";
       echo "<img src='images/" . $row['image'] . "' alt='" . $row['nom'] . "' class='product-image' />";
       echo "<div class='product-info'>";
       echo "<h3 class='product-name'>" . $row['nom'] . "</h3>";
       echo "<p class='product-description'>" . $row['description'] . "</p>";
       echo "<p class='product-price'>" . $row['prix'] . " €</p>";
       echo "</div>";
       echo "</div>";
   }
   echo "</div>";
} else {
   echo "<div class='no-results'>";
   echo "<h2>Aucun résultat trouvé pour : '$query'</h2>";
   echo "</div>";
}

    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

// Fermeture de la connexion
$idcon = null;
?>
<!-- Script pour gérer la soumission du formulaire et le défilement -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchForm = document.getElementById('#search-form');
    const searchResults = document.querySelector('.search-results');

    searchForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Empêcher le rechargement de la page
        const formData = new FormData(searchForm);
        const searchQuery = formData.get('query');

        // Effectuer la recherche ici si nécessaire, ou laisser le formulaire se soumettre normalement

        
    });
});
document.addEventListener('DOMContentLoaded', (event) => {
  document.getElementById('search-input').addEventListener('keydown', function(e) {
    if (e.key === 'Enter') {
      e.preventDefault();
      document.getElementById('search-results').scrollIntoView({ behavior: 'smooth' });
    }
  });
});






</script>
<script>
(function (d, m) {
            var kommunicateSettings = { "appId": "3dab53e6d2c5a860ebb8422859fb577de", "onInit": function () {
                    var iframeStyle = document.createElement('style');
                    var classSettings = ".change-kommunicate-iframe-height{height:100%!important;width:100%!important;right:0!important;bottom:0!important;max-height: 100%!important;}";
                    iframeStyle.type = 'text/css';
                    iframeStyle.innerHTML = classSettings;
                    document.getElementsByTagName('head')[0].appendChild(iframeStyle);
                    var launcherIconStyle = "@media(min-width: 510px){.mck-sidebox.fade.in,.mck-box .mck-box-sm{width:100%; height:100%;max-height:100%!important;border-radius:0px!important;}.mck-sidebox{right:0!important;bottom:0!important;}}";
                    Kommunicate.customizeWidgetCss(launcherIconStyle);

                    var iframe = parent.document.getElementById("kommunicate-widget-iframe"),
                        launcher = KommunicateGlobal.document.getElementById('mck-sidebox-launcher'),
                        preChatPopup = KommunicateGlobal.document.querySelector('#chat-popup-widget-container .chat-popup-widget-text-wrapper'),
                        closeButton = KommunicateGlobal.document.getElementById('km-chat-widget-close-button');

                    [launcher, preChatPopup].forEach(function (element) {
                        element.addEventListener('click', function () {
                            iframe.classList.add("change-kommunicate-iframe-height");
                        });
                    });

                    closeButton.addEventListener('click', function () {
                        iframe.classList.remove("change-kommunicate-iframe-height");
                    });
                }
            };
            var s = document.createElement("script"); s.type = "text/javascript"; s.async = true;
            s.src = "https://widget.kommunicate.io/v2/kommunicate.app";
            var h = document.getElementsByTagName("head")[0]; h.appendChild(s);
            window.kommunicate = m; m._globals = kommunicateSettings;
        })(document, window.kommunicate || {});

    

   </script><!--  end javascript section-->

</body>
</html>
