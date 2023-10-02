<?php
require("connexion.php");
$requeteSuppr=$connexion->prepare("DELETE from personnel_medVI where ppr=?");
$requeteSuppr->execute(array($_GET['ppr']));
header("location:tousPersonnel.php");
?>