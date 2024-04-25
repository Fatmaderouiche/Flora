<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login Page - Admin Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700" />
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    
    <link rel="stylesheet" href="profile.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

      
        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            width: 500px;
        }

        
    </style>
  </head>
    <body background="img\dashboardbackground.jpeg">
    <div>
      <nav class="navbar navbar-expand-xl">
        <div class="container h-100">
          <a class="navbar-brand" href="indexADMIN.html">
            <h1 class="tm-site-title mb-0"> ADMIN DASHBOARD   </h1>
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
                <a class="nav-link" href="ProduitsAdmin.html">
                 <i class="fas fa-shopping-cart"></i> Produits </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="ComptesAdmin.html">
                 <i class="far fa-user"></i> Comptes</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                  <i class="fas fa-cog"></i>
                  <span> Paramétres <i class="fas fa-angle-down"></i> </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="profile.html">Profile</a>
                  <a class="dropdown-item" href="FacturatinAdmin.html">Facturation</a>
                  <a class="dropdown-item" href="suppression.php">Utilisateurs</a>
                  
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>

    
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-12 mx-auto tm-login-col">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12 text-center">
              <h2 class="tm-block-title mb-4">Liste de Commandes</h2>
              </div>
            </div>
            
    <section id="account_setting">
      
        <div class="row mt-2" class="email section">
          <div class="col-12">
            <section id="account_setting">
              
                <div class="container">
                  
                  <table>
                      <thead>
                          <tr>
                              <th>Nom du Produit</th>
                              <th>Quantité</th>
                              <th>Prix Unitaire</th>
                              <th>Prix Total</th>
                              <th>Action</th> 
                          </tr>
                      </thead>
                      <tbody>
      
      </section>
    </div>
    <?php
    // Inclure le fichier de connexion à la base de données
    require 'connexion.php';

    try {
        // Requête SQL pour récupérer les informations des commandes dans la table produit_commande
        $sql = "SELECT id_commande, id_produit, nom_produit, prix_unitaire, quantite, prix_total FROM produit_commande";
        $stmt = $idcon->query($sql);

        // Affichage des résultats dans le tableau HTML
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".$row['nom_produit']."</td>";
            echo "<td>".$row['quantite']."</td>";
            echo "<td>".$row['prix_unitaire']."</td>";
            echo "<td>".$row['prix_total']."</td>";
            // Ajout du bouton "confirmer"
            echo "<td><button class='confirmer-btn' data-id='".$row['id_commande']."'>Confirmer</button></td>";
            echo "</tr>";
        }
    } catch(PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
?>
<script>
    // Récupération de tous les boutons "confirmer"
    var confirmButtons = document.querySelectorAll('.confirmer-btn');

    // Ajout d'un gestionnaire d'événements pour chaque bouton
    confirmButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            // Récupération de l'ID de commande associé au bouton
            var commandeId = button.getAttribute('data-id');
            // Affichage de l'alerte de confirmation
            if (confirm("Confirmer cette commande ?")) {
                // Si l'utilisateur confirme, vous pouvez effectuer ici une action supplémentaire,
                // comme envoyer une requête AJAX pour marquer la commande comme confirmée dans la base de données.
                alert("Commande confirmée avec succès !");
            }
        });
    });
</script>












</body>
</html>
