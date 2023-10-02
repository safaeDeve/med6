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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <title>Creation du Cessation&Reprise</title>
</head>
<body>
<nav style="margin-left: 200px;">
        <img src="images/logoPB.png" alt="">
    </nav>
    <br>
    <hr>
    <h4 style="padding-left: 50px;">Formulaire de données:</h4>
    <hr>
    <br>
    
    <form action="Pdfs.php" method="get" class="container mt-5" style="margin-left: 15px;">
        <table class="table table-bordered">
            <?php foreach ($result as $personne) { ?>
                <tr>
                    <td class="fw-bold">NOM:</td>
                    <td><input type="text" name="nom" class="form-control" value="<?php echo $personne['nom']; ?>"></td>
                </tr>
                <tr>
                    <td class="fw-bold">PRENOM:</td>
                    <td><input type="text" name="prenom" class="form-control" value="<?php echo $personne['prenom']; ?>"></td>
                </tr>
                <tr>
                    <td class="fw-bold">CIN:</td>
                    <td><input type="text" name="cin" class="form-control" value="<?php echo $personne['cin']; ?>"></td>
                </tr>
                <tr>
                    <td class="fw-bold">PPR:</td>
                    <td><input type="text" name="ppr" class="form-control" value="<?php echo $personne['ppr']; ?>"></td>
                </tr>
                <tr>
                    <td class="fw-bold">GRADE:</td>
                    <td><input type="text" name="grade" class="form-control" value="<?php echo $personne['grande']; ?>"></td>
                </tr>
                <tr>
                    <td class="fw-bold">SERVICE:</td>
                    <td><input type="text" name="service" class="form-control" value="<?php echo $personne['service']; ?>"></td>
                </tr>
                <tr>
                    <td class="fw-bold">DATE DE CONGE:</td>
                    <td><input type="text" name="date_conge" class="form-control" placeholder="Saisir date de conge"></td>
                </tr>
                <tr>
                    <td class="fw-bold">DATE DE CESSATION:</td>
                    <td><input type="text" name="date_cessation" class="form-control" placeholder="Saisir date de cessation"></td>
                </tr>
                <tr>
                    <td class="fw-bold">DATE DE REPRISE:</td>
                    <td><input type="text" name="date_reprise" class="form-control" placeholder="Saisir date de reprise"></td>
                </tr>
            <?php } ?>
        </table>
        <button type="submit" class="btn btn-primary" style="margin-left: 15px;">Crée PDF</button>
    </form>
    <br>
    <br><br>

</body>
</html>
<?php
    // Fermez le statement et la connexion à la base de données
    $stmt->closeCursor(); // Facultatif, mais recommandé
    $connexion = null; // Fermez la connexion PDO
}
?>
