<?php
require('connexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $requeteUpdate = $connexion->prepare("UPDATE stagiaire SET nom=?, prenom=?, cin=?, service=?, date_stage=?, dure=? WHERE cin=?");
        $requeteUpdate->execute(array(
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['cin'],
            $_POST['service'],
            $_POST['date_stage'],
            $_POST['duree'],
            $_POST['cin'] // Use cin as the WHERE clause to identify the record to update
        ));
        header("location: afficherStagiaires.php?message=Les informations ont été modifiées avec succès");
        exit();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>