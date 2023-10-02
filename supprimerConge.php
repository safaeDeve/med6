<?php
require("connexion.php");
$requeteSuppr=$connexion->prepare("DELETE from conge_table where date_conge=?");
$requeteSuppr->execute(array($_GET['date_conge']));
header("location:afficherTousConge.php?message=le conge  a été supprimés avec succès");
?>