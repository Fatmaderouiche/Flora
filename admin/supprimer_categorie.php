<?php
    require_once 'connexion.php';
    $id_cat = $_GET['id_cat'];
    $sqlState = $idcon->prepare('DELETE FROM catégorie WHERE id_cat=?');
    $supprime = $sqlState->execute([$id_cat]);
    header('location: ProduitsAdmin.php');