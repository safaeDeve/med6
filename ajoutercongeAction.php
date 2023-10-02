<?php
require('connexion.php');

if (isset($_GET['ppr'])) {
    $ppr = $_GET['ppr'];
    $typeConge = $_GET['type_conge'];
    $nombreJour = $_GET['nombreJour'];
    $nom = $_GET['nom'];
    $prenom = $_GET['prenom'];
    $service = $_GET['service'];
    $grade = $_GET['grande'];
    $date_conge = $_GET['date_conge'];
    $date_cessation = $_GET['date_cessation'];
    $date_reprise = $_GET['date_reprise'];
     
    $restjourInitial = 22;
    $restAbsenceInitial = 10;

    // Vérifiez si c'est la première demande de congé de l'année
    $currentYear = date("Y");
    $congeYear = date("Y", strtotime($date_conge));
    
    $restJour = 0;
    $restJourAbsence = 0;
    
    // Obtenir les soldes actuels depuis la base de données
    $selectSql = "SELECT reste_jour, reste_absence FROM conge_table WHERE ppr = ?";
    $selectStmt = $connexion->prepare($selectSql);
    $selectStmt->bindParam(1, $ppr, PDO::PARAM_INT);
    $selectStmt->execute();
    
    if ($row = $selectStmt->fetch(PDO::FETCH_ASSOC)) {
        $restJour = $row['reste_jour'];
    } else {
        $restJour = null;
    }

    if ($typeConge === 'conge_administratif') {
        if ($currentYear > $congeYear) {
            // Nouvelle année, ajoutez 22 jours au solde
            $restJour += 22;
            
            // Mettez à jour le solde dans la base de données
            $updateSql = "UPDATE conge_table SET reste_jour = ? WHERE ppr = ?";
            $updateStmt = $connexion->prepare($updateSql);
            $updateStmt->bindParam(1, $restJour, PDO::PARAM_INT);
            $updateStmt->bindParam(2, $ppr, PDO::PARAM_INT);
            $updateStmt->execute();
        }

        if ($restJour === null) {
            $res = 22 - $nombreJour; // Première demande de l'année
        } else {
            $res = $restJour - $nombreJour; // Autres congés de l'année
            if ($res < 0) {
                // Afficher un message d'erreur
                $message = "Le reste de jour pour ce ppr: $ppr c'est: $restJour pour cela tu ne peux pas prendre un conge";
                header("location: pprConge.php?message=error&content=" . urlencode($message));
                // Vous pouvez également mettre fin au script ici si nécessaire
                exit;
            }
        }

        // Le reste du code pour l'insertion dans la base de données
        if ($res >= 0) {
            // Mettez à jour le solde dans la base de données
            $updateSql = "UPDATE conge_table SET reste_jour = ? WHERE ppr = ?";
            $updateStmt = $connexion->prepare($updateSql);
            $updateStmt->bindParam(1, $res, PDO::PARAM_INT);
            $updateStmt->bindParam(2, $ppr, PDO::PARAM_INT);
            $updateStmt->execute();

            // Ajoutez la demande de congé administratif à la table
            $insertSql = "INSERT INTO conge_table (ppr, nom, prenom, service, grade, date_conge, date_accesation, date_reprise, typeC, nombre_jour, reste_jour, reste_absence) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $insertStmt = $connexion->prepare($insertSql);
            $insertStmt->bindParam(1, $ppr, PDO::PARAM_INT);
            $insertStmt->bindParam(2, $nom, PDO::PARAM_STR);
            $insertStmt->bindParam(3, $prenom, PDO::PARAM_STR);
            $insertStmt->bindParam(4, $service, PDO::PARAM_STR);
            $insertStmt->bindParam(5, $grade, PDO::PARAM_STR);
            $insertStmt->bindParam(6, $date_conge, PDO::PARAM_STR);
            $insertStmt->bindParam(7, $date_cessation, PDO::PARAM_STR);
            $insertStmt->bindParam(8, $date_reprise, PDO::PARAM_STR);
            $insertStmt->bindParam(9, $typeConge, PDO::PARAM_STR);
            $insertStmt->bindParam(10, $nombreJour, PDO::PARAM_INT);
            $insertStmt->bindParam(11, $res, PDO::PARAM_INT);
            $insertStmt->bindParam(12, $restJourAbsence, PDO::PARAM_INT);
            $insertStmt->execute();
        }
        // ...
    } elseif ($typeConge === 'autorisation_absence') {
        if ($congeYear < $currentYear || $restJourAbsence == 0) {
            $resAB = $restAbsenceInitial - $nombreJour; // Nouvelle année ou premier congé de ce type
        } else {
            $resAB = $restJourAbsence - $nombreJour; // Autres congés de type autorisation absence
        }
        // Ajoutez une vérification ici avant l'insertion
        if ($resAB >= 0) {
            // Mettez à jour le solde dans la base de données pour autorisation d'absence
            $updateSql = "UPDATE conge_table SET reste_absence = ? WHERE ppr = ?";
            $updateStmt = $connexion->prepare($updateSql);
            $updateStmt->bindParam(1, $resAB, PDO::PARAM_INT);
            $updateStmt->bindParam(2, $ppr, PDO::PARAM_INT);
            $updateStmt->execute();

            // Ajoutez la demande d'autorisation d'absence à la table
            $insertSql = "INSERT INTO conge_table (ppr, nom, prenom, service, grade, date_conge, date_accesation, date_reprise, typeC, nombre_jour, reste_jour, reste_absence) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $insertStmt = $connexion->prepare($insertSql);
            $insertStmt->bindParam(1, $ppr, PDO::PARAM_INT);
            $insertStmt->bindParam(2, $nom, PDO::PARAM_STR);
            $insertStmt->bindParam(3, $prenom, PDO::PARAM_STR);
            $insertStmt->bindParam(4, $service, PDO::PARAM_STR);
            $insertStmt->bindParam(5, $grade, PDO::PARAM_STR);
            $insertStmt->bindParam(6, $date_conge, PDO::PARAM_STR);
            $insertStmt->bindParam(7, $date_cessation, PDO::PARAM_STR);
            $insertStmt->bindParam(8, $date_reprise, PDO::PARAM_STR);
            $insertStmt->bindParam(9, $typeConge, PDO::PARAM_STR);
            $insertStmt->bindParam(10, $nombreJour, PDO::PARAM_INT);
            $insertStmt->bindParam(11, $restJour, PDO::PARAM_INT);
            $insertStmt->bindParam(12, $resAB, PDO::PARAM_INT);
            $insertStmt->execute();
        }
    }
    // Redirigez ou affichez un message de succès ici
    // header("location:pprConge.php?message=Ajouté avec succès");
    header("location: pprConge.php?message=success&content=Ajouté avec succès");

}
?>