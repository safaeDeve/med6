<?php
if (isset($_POST['annee'])) {
    $annee = $_POST['annee'];

    try {
        // Connectez-vous à votre base de données (utilisez vos propres informations de connexion)
        $connexion = new PDO("mysql:host=localhost;dbname=project_med5;port=3306", 'root');

        // Préparez et exécutez la requête SQL pour supprimer les congés de l'année spécifiée
        $query = "DELETE FROM conge_table WHERE YEAR(date_conge) = :annee";
        $stmt = $connexion->prepare($query);
        $stmt->bindParam(':annee', $annee, PDO::PARAM_STR);
        $stmt->execute();

        // Affichez un message de succès
        echo '<p>Les congés de l\'année ' . $annee . ' ont été supprimés avec succès.</p>';

        // Fermez la connexion PDO
        $connexion = null;
    } catch (PDOException $e) {
        // En cas d'erreur, affichez un message d'erreur
        echo 'Erreur : ' . $e->getMessage();
    }
}
?>
