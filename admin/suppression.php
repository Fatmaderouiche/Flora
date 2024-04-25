<?php
include 'connexion.php';

// Suppression de l'utilisateur si le formulaire est soumis
if(isset($_POST['supprimer']) && isset($_POST['id_utilisateur'])) {
    $id_utilisateur = $_POST['id_utilisateur'];
    $raison_suppression = isset($_POST['raison_suppression']) ? $_POST['raison_suppression'] : '';

    // Vérifie si la raison de la suppression est vide
    if(empty($raison_suppression)) {
        // Si la raison de la suppression est vide, affiche un message d'erreur
        echo "La raison de la suppression est obligatoire.";
    } else {
        // Récupère les informations de l'utilisateur avant suppression
        $utilisateur = $idcon->prepare("SELECT * FROM users WHERE id = ?");
        $utilisateur->execute([$id_utilisateur]);
        $donnees_utilisateur = $utilisateur->fetch(PDO::FETCH_ASSOC);

        // Supprime l'utilisateur de la table users
        $suppression = $idcon->prepare("DELETE FROM users WHERE id = ?");
        $suppression->execute([$id_utilisateur]);
        
        // Insère les informations de l'utilisateur dans la table users_supprimes avec la raison de la suppression
        $insertion = $idcon->prepare("INSERT INTO users_supprimes (id, email, username, raison_suppression) VALUES (?, ?, ?, ?)");
        
        // Vérifie si les informations de l'utilisateur sont définies avant l'insertion
        if($donnees_utilisateur && $donnees_utilisateur['email'] && $donnees_utilisateur['username']) {
            $insertion->execute([$donnees_utilisateur['id'], $donnees_utilisateur['email'], $donnees_utilisateur['username'], $raison_suppression]);
        }
    }
}

// Récupération de tous les utilisateurs
$requete = $idcon->query("SELECT id, email, username FROM users");
$utilisateurs = $requete->fetchAll(PDO::FETCH_ASSOC);
?>
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
      /* Styles CSS pour la mise en forme */
      table {
          width: 100%;
          border-collapse: collapse;
      }
      th, td {
          border: 1px solid #dddddd;
          padding: 8px;
          text-align: left;
      }
      th {
          background-color: #f2f2f2;
      }
      .supprimer {
          background-color: #ff0000;
          color: #fff;
          border: none;
          padding: 5px 10px;
          border-radius: 5px;
          cursor: pointer;
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
                  <a class="dropdown-item" href="suppression.php">Utilisateurs</a>
                  <a class="dropdown-item" href="FacturatinAdmin.html">Facturation</a>
                  
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
                <h2 class="tm-block-title mb-4">Liste des utilisateurs</h2>
              </div>
            </div>
            <div class="row mt-2"  class="email section">
              <div class="col-12">
    <section id="account_setting">
      <form action="test.php" >
    <table>
        <tr>
            <th>Email</th>
            <th>Username</th>
            <th>Action</th>
        </tr>
        <?php foreach($utilisateurs as $utilisateur): ?>
            <tr>
                <td><?= $utilisateur['email'] ?></td>
                <td><?= $utilisateur['username'] ?></td>
                <td>
                <form method="post">
                    <input type="hidden" name="id_utilisateur" value="<?= $utilisateur['id'] ?>">
                    <input type="text" name="raison_suppression" placeholder="Raison de la suppression" required>
                    <input type="submit" name="supprimer" value="Supprimer" class="supprimer">
                </form>

                </td>
            </tr>
        <?php endforeach; ?>
    </table>
  </form> 
        

                
             
        
    
      
      </section>
    </div>















</body>
</html>
