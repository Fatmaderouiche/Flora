<?php
session_start();
require('include/inc_refresh.php');
require_once('include/connexion.php');
require('scripts/session_panier.php');
?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="mon_panier.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<body>
 <?php require_once('../header/header.php');?>

  <main>
    <!-- <div id="wrapper">-->

    <h1 class="titre_panier">Votre Panier</h1>

    <?php

    if (isset($message)) //affichage message erreur
    {
    ?>
      <p class="erreur">
        <?php echo $message;
        exit; ?></p> <!-- on stoppe le script ici car pas la peine d'affichage un tableau vide !-->
    <?php
    }

    if (isset($_SESSION['stock_error'])) {
    ?>
      <p class="erreur"><?php echo $_SESSION['stock_error']; ?></p>
    <?php
      unset($_SESSION['stock_error']);
    }
    ?>

    <section>

      <button class="lien_retour"><a class="lien" href="../produits.php">Continuez vos achats</a></button>

      <table>

        <thead>
          <tr>
            <th>Article</th>
            <th>Quantité</th>
            <th>Prix unitaire TTC</th>
            <th>Prix total TTC</th>
            <th>Supprimer</th>
          </tr>
        </thead>
        <tbody>

          <?php

          $grand_total = 0; //initialisation de $grand_total

          foreach ($_SESSION['panier'] as $key => $qte) //lecture du panier
          {
            $rep = $idcon->prepare('SELECT * FROM produit WHERE id_prod= ?');
            $rep->execute(array($key));

            $donnees = $rep->fetch();

            $nom = $donnees['nom'];
            $prix = $donnees['prix'];
            $prix_total = $prix * $qte; //calculs prix total et total à payer TTC

            $grand_total += $prix_total;

          ?>
            <tr>
              <td><?php echo $nom; ?></td>

              <td><a class="choix_quantite" href="scripts/less.php?id=<?php echo $key; ?>"> - </a><span> <?php echo $qte; ?> </span>
                <a class="choix_quantite" href="scripts/add.php?id=<?php echo $key; ?>">+</a>
              </td>

              <td><?php echo $prix . 'dt'; ?></td>
              <td><?php echo $prix_total . 'dt'; ?></td>
              <td><a class="supprimer_article" href="scripts/del.php?id=<?php echo $key; ?>">x</a></td>
            </tr>

          <?php
          }

          ?>
        </tbody>

        <tfoot>
          <tr>
            <td class="no_border"></td>
            <td class="no_border"></td>
            <td class="table_bold">TOTAL</td>
            <td class="bold"><?php echo $grand_total . 'dt'; ?> </td>
          </tr>
          <tr>
            <td class="no_border"></td>
            <td class="no_border"></td>


          </tr>
        </tfoot>


      </table>

      <form action="#">
        <input id="valider_panier" type="submit" name="valider" value="Valider le panier" />
      </form>
     
    </section>
    <?php require_once('../footer/footer.php'); ?>
    </div>

  </main>

</body>

</html>