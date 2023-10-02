<?php
require('connexion.php');
$nom=$_GET['nom'];
$prenom=$_GET['prenom'];
$cin=$_GET['cin'];
$service=$_GET['service'];
$date_stage=$_GET['date_stage'];
$duree=$_GET['duree'];

$sql = "INSERT INTO stagiaire (nom, prenom, cin, service, date_stage, dure) 
        VALUES (:nom, :prenom, :cin, :service, :date_stage, :duree)";

try {
    // Préparez la requête SQL
    $stmt = $connexion->prepare($sql);

    // Liez les valeurs des paramètres à la requête
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':cin', $cin);
    $stmt->bindParam(':service', $service);
    $stmt->bindParam(':date_stage', $date_stage);
    $stmt->bindParam(':duree', $duree);

    // Exécutez la requête SQL
    $stmt->execute();

    header("location:ajouterStagiaire.php?message=Données insérées avec succès .");

} catch (PDOException $e) {
    echo "Erreur lors de l'insertion des données : " . $e->getMessage();
}
?>