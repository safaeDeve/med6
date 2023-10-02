<?php
require("connexion.php");

if (isset($_GET['cin'])) {
    $cin = $_GET['cin'];

    // Préparez et exécutez la requête SQL avec PDO
    $query = "SELECT * FROM stagiaire WHERE cin = :cin";
    $stmt = $connexion->prepare($query);
    $stmt->bindParam(':cin', $cin, PDO::PARAM_STR);
    $stmt->execute();

    // Récupérez les résultats
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
    <title>Attestation Travaill</title>
</head>
<body>
    <nav style="margin-left: 200px;">
        <img src="images/logoPB.png" alt="">
    </nav>
    <br>
    <a href="stagiairesGestion.php"  style="display: flex;background-color: lightgreen;width: 220px;border-radius: 20px;text-decoration: none;color:black;">
        <img src="images/homeVert-removebg-preview.png" alt="" width="40%">
        <h6 style="padding-top: 25px;">Retour à accueil</h6>
    </a>
    <div style="margin-left: 130px;">
    <hr>
    <h5>Formulaire de donnees:</h5>
    <hr>
    </div>
<div class="container mt-5">
        <form action="PdfAttestationStage.php" method="get">
            <table class="table">
                <tr>
                    <td>NOM:</td>
                    <td><input type="text" name="nom" value="<?php echo $result['nom']; ?>" class="form-control"></td>
                </tr>
                <tr>
                    <td>PRENOM:</td>
                    <td><input type="text" name="prenom" value="<?php echo $result['prenom']; ?>" class="form-control"></td>
                </tr>
                <tr>
                    <td>CIN:</td>
                    <td><input type="text" name="cin" value="<?php echo $result['cin']; ?>" class="form-control"></td>
                </tr>
                <tr>
                    <td>SERVICE:</td>
                    <td><input type="text" name="service" value="<?php echo $result['service']; ?>" class="form-control"></td>
                </tr>
                <tr>
                    <td>DUREE:</td>
                    <td><input type="text" name="duree" value="<?php echo $result['dure']; ?>" class="form-control"></td>
                </tr>
                <tr>
                    <td>DATE DE STAGE:</td>
                    <td><input type="text" name="date_stage" value="<?php echo $result['date_stage']; ?>" class="form-control"></td>
                </tr>
            </table>
            <input type="hidden" name="cin" value="<?php echo $cin; ?>">
            <button type="submit" class="btn btn-success">Créer attestation de stage</button>
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
