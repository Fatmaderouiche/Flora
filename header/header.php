<style>
  
/* ************header****************/

#header {
  text-align: center;
  align-items: center;
  background: url(pink\ \(4\).jpg) no-repeat center fixed;
  background-size: cover;
  height: 130px;


}

#navbar {
  align-items: center;
  position: relative;
  display: flex;

}

#navbar li {
  list-style: none;
  padding: 0 60px;


}

#navbar li a {
  text-decoration: none;
  font-size: 20px;
  font-weight: 600;
  color: black;
  transition: 0.3s ease;
  line-height: 65px;


}

#navbar li a:hover {
  color: #f519a4
}

.logo {
  width: 200px;
  position: relative;
  bottom: 0px;
  right: 0px;
  padding: 5px;
  left: 5px;

}

li {
  margin: auto;
  margin-top: 20px;
}


/* Style the dropdown button to fit inside the navbar */
.dropdown {

  position: relative;

}


.dropdown .dropbtn {
  font-size: 20px;
  font-weight: bold;
  border: none;
  outline: none;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}


.dropdown-content {
  display: none;
  position: fixed;
  background-color: rgba(218, 198, 215, 0.952);
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
  z-index: 1;
}


.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: center;
  font-size: 20px;
  font-family: Century Gothic;

}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropbtn {
  background-color: #f519a4;
}

/*  la barre de recherche */
.search-container {
  display: flex;
  justify-content: flex-end;
  Margin-bottom: 25px;

}

/* Champ de saisie caché par défaut */
.search-input {
  position: absolute;
  right: 30;
  width: 0;
  height: 40px;
  padding: 0;
  border: none;
  outline: none;
  background: #f1f1f1;
  /*transition: width 0.6s ease-in-out;*/
  cursor: pointer;
  border-radius: 20px;
  margin-top: 15px;
}

/* Icône de recherche */
.fa-search {
  position: absolute;
  width: 40px;
  line-height: 40px;
  text-align: center;
  cursor: pointer;
  padding-bottom: 0px;
  margin-top: 15px;
}

/* Affichage du champ de saisie lors du clic sur l'icône */
.search-container:hover>.search-input,
.search-input:focus {
  width: 100px;
  padding: 0 10px;
}

/* Cacher l'icône lors de l'expansion du champ de saisie */
.search-input:focus+.fa-search,
.search-container:hover>.fa-search {
  display: none;
}

.search-container,
.fa-user-circle,
.fa-shopping-cart {
  flex: 1;


}

</style>

<!-- header-->
<section id="header">
<section id="header">
      <ul id="navbar">
          <div class="logo"> <img src="logo1.png" class="logo"> </div>
          <li > <a href="../acceuil/acceuil.php">Acceuil</a></li>
         
         <div class="dropdown" id="middle" >
            <button class="dropbtn">Produits 
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <a href="#">Bouquets</a>
              <a href="../fleurs séchées/fleurs séchées.php">Fleurs sechés</a>
              <a href="#">Box</a>
              <a href="#">Plante</a>
            </div>
         </div> 
   
         <div class="dropdown" id="middle" >
            <button class="dropbtn">occasions 
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <a href="#">Amour</a>
              <a href="#">Mariage</a>
              <a href="../anniversaire/anniversaire.php">Anniversaire</a>
              <a href="#">Naissance</a>
            </div>
          </div> 
   
         <li> <a href="#">Contact </a></li>
         
      
         <li><div class="search-container">
            <input class="search-input" type="text" >
            <i  class="fa fa-search" aria-hidden="true" style="font-size:20px" ></i>
          </div></li>
         <li><a href="../account settings/account settings.html" class="fa fa-user-circle" ></a></li>
        
      <!--<li> <a href="panier/mon_panier.php" class="fa fa-shopping-cart"></a></li>-->

      <?php
      //si le panier n'est pas vide
      if (!empty($_SESSION['panier'])) {
        $nb_article = count($_SESSION['panier']); //on compte le nb d'éléments du panier

        if ($nb_article === 1) // pour écrire article sans S !
        {
      ?>
         
          <li> <a href="../panier/mon_panier.php" class="fa fa-shopping-cart"><?php echo $nb_article; ?></a></li>
        <?php
        } else {
        ?>
          <li> <a href="../panier/mon_panier.php" class="fa fa-shopping-cart"><?php echo $nb_article; ?></a></li>
        <?php
        }
      } elseif (isset($_COOKIE['panier'])) // qd on retourne sur le site plus tard, on joue sur le cookie
      {
        $_SESSION['panier'] = unserialize($_COOKIE['panier']); //on désérialise le cookie

        $nb_article = count($_SESSION['panier']);

        if ($nb_article === 1) {
        ?>

          <li> <a href="../panier/mon_panier.php" class="fa fa-shopping-cart"><?php echo $nb_article; ?></a></li>
        <?php
        } else {
        ?>
          <li> <a href="../panier/mon_panier.php" class="fa fa-shopping-cart"><?php echo $nb_article; ?></a></li>
        <?php
        }
      } else // s'il n'y a pas de session, ni de cookie
      {
        ?>
        <li> <a href="./panier/mon_panier.php" class="fa fa-shopping-cart">Panier vide</a></li>
      <?php
      }
      ?>
  </section>
  