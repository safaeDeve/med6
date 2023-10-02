<?php
    require('connexion.php');
    $ancienne_date_conge = $_POST['ancienne_date_conge'];
$nouvelle_date_conge = $_POST['nouvelle_date_conge'];

$requetUpdate = $connexion->prepare("UPDATE conge_table SET nom=?, prenom=?, ppr=?, service=?, date_conge=?, date_accesation=?, date_reprise=?, nombre_jour=?, typeC=? WHERE date_conge=?");
$requetUpdate->execute(array(
    $_POST['nom'],
    $_POST['prenom'],
    $_POST['ppr'],
    $_POST['service'],
    $nouvelle_date_conge, // Utilisez la nouvelle date ici
    $_POST['date_accesation'],
    $_POST['date_reprise'],
    $_POST['nombre_jour'],
    $_POST['type_conge'],
    $ancienne_date_conge // Utilisez l'ancienne date pour la clause WHERE
));

    header("location: afficherTousConge.php?message=Les informations ont été modifiées avec succès");
    
?>