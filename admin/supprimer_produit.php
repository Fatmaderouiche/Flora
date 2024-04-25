<?php
    require_once 'connexion.php';
    $id = $_GET['id'];
    $sqlState = $idcon->prepare('DELETE FROM produit WHERE id_prod=?');
    $supprime = $sqlState->execute([$id]);
   header('location: ProduitsAdmin.php');