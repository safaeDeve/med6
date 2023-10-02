<?php
require("connexion.php");

if (isset($_POST['nom']) && isset($_POST['prenom'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];

    // Préparez et exécutez la requête SQL avec PDO
    $query = "SELECT * FROM personnel_medVI WHERE nom = :nom AND prenom = :prenom";
    $stmt = $connexion->prepare($query);
    $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
    $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $stmt->execute();

    // Récupérez les résultats
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <title>DECESSION FILE</title>
</head>
<body>
<div class="container">
        <h1>Formulaire de données:</h1>
        <form action="pdfsDicession.php" method="get">
            <table class="table">
                <?php foreach ($result as $personne) { ?>
                    <tr>
                        <td>NOM:</td>
                        <td><input type="text" class="form-control" name="nom" value="<?php echo $personne['nom']; ?>"></td>
                    </tr>
                    <tr>
                        <td>PRENOM:</td>
                        <td><input type="text" class="form-control" name="prenom" value="<?php echo $personne['prenom']; ?>"></td>
                    </tr>
                    <tr>
                        <td>CIN:</td>
                        <td><input type="text" class="form-control" name="cin" value="<?php echo $personne['cin']; ?>"></td>
                    </tr>
                    <tr>
                        <td>PPR:</td>
                        <td><input type="text" class="form-control" name="ppr" value="<?php echo $personne['ppr']; ?>"></td>
                    </tr>
                    <tr>
                        <td>GRADE:</td>
                        <td><input type="text" class="form-control" name="grande" value="<?php echo $personne['grande']; ?>"></td>
                    </tr>
                    <tr>
                        <td>SERVICE:</td>
                        <td><input type="text" class="form-control" name="service" value="<?php echo $personne['service']; ?>"></td>
                    </tr>
                    <tr>
                        <td>NOMBRE DE JOUR:</td>
                        <td><input type="text" class="form-control" name="nombreJour" placeholder="Saisirle nombre de jour"></td>
                    </tr>
                    <tr>
                        <td>L'ANNEE:</td>
                        <td><input type="text" class="form-control" name="annee" placeholder="Saisir l'annee de conge" /></td>
                    </tr>
                    <tr>
                        <td>DATE DE CONGE:</td>
                        <td><input type="text" class="form-control" name="date_conge" placeholder="Saisir date de conge"></td>
                    </tr>
                <?php } ?>
            </table>
            <button type="submit" class="btn btn-primary ">Créer PDF</button>
        </form>
    </div>
</body>
</html>
<?php
    // Fermez le statement et la connexion à la base de données
    $stmt->closeCursor(); // Facultatif, mais recommandé
    $connexion = null; // Fermez la connexion PDO
}
?>
