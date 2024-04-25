<?php
session_start();
require_once('../include/connexion.php');

$id = strip_tags($_GET['id']); //protection faille XSS

//ajout requete pour controler le stock et id

$rep = $idcon->prepare('SELECT quantité FROM produit WHERE id_prod = ?');

$rep->execute(array($id));

$row = $rep->fetch();
//echo $row;
$stock = $row['quantité'];

if ((!empty($stock)) and ($_SESSION['panier'][$id] < $stock)) {
 
    $_SESSION['panier'][$id]++;
    header('location:../mon_panier.php');
    exit;
} else {
    $_SESSION['stock_error'] = 'Le stock est insuffisant.';
    header('location:../mon_panier.php');
    exit;
}
