<?php
require("connexion.php");
$requeteSuppr=$connexion->prepare("DELETE from stagiaire where cin=?");
$requeteSuppr->execute(array($_GET['cin']));
header("location:afficherStagiaires.php?message=le stagiaire a été supprimés avec succès");
?>