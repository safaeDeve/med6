<?php
require("connexion.php");

if (isset($_POST['ppr'])) {
    $ppr = $_POST['ppr'];

    // Préparez et exécutez la requête SQL avec PDO
    $query = "SELECT * FROM personnel_medVI WHERE ppr = :ppr";
    $stmt = $connexion->prepare($query);
    $stmt->bindParam(':ppr', $ppr, PDO::PARAM_STR);
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
    <title>Decession file</title>
</head>
<body>
<nav style="margin-left: 200px;">
        <img src="images/logoPB.png" alt="">
    </nav>
    <br>
<div class="container mt-5">
    <hr>
        <h1>Formulaire de données:</h1>
        <hr>
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
                        <td><input type="text" class="form-control" name="nombreJour" placeholder="Saisir le nombre de jour"></td>
                    </tr>
                    <tr>
                        <td>L'ANNEE:</td>
                        <td><input type="text" class="form-control" name="annee" placeholder="Saisir l'annee de conge"></td>
                    </tr>
                    <tr>
                        <td>DATE DE CONGE:</td>
                        <td><input type="text" class="form-control" name="date_conge" placeholder="Saisir date de conge"></td>
                    </tr>
                <?php } ?>
            </table>
            <input type="hidden" name="ppr" value="<?php echo $ppr; ?>">
            <button type="submit" class="btn btn-primary">Créer PDF</button>
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
