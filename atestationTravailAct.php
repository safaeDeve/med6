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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <title>Attestaion Travaill</title>
</head>
<body>
    <nav style="margin-left: 200px;">
        <img src="images/logoPB.png" alt="">
    </nav>
    <br>
    <div style="margin-left: 130px;">
    <hr>
    <h5>Formulaire de donnees:</h5>
    <hr>
    </div>
<div class="container mt-5">
        <form action="PdfAttestation.php" method="get">
            <table class="table">
                <?php foreach ($result as $personne) { ?>
                <tr>
                    <td>NOM:</td>
                    <td><input type="text" name="nom" value="<?php echo $personne['nom']; ?>" class="form-control"></td>
                </tr>
                <tr>
                    <td>PRENOM:</td>
                    <td><input type="text" name="prenom" value="<?php echo $personne['prenom']; ?>" class="form-control"></td>
                </tr>
                <tr>
                    <td>CIN:</td>
                    <td><input type="text" name="cin" value="<?php echo $personne['cin']; ?>" class="form-control"></td>
                </tr>
                <tr>
                    <td>PPR:</td>
                    <td><input type="text" name="ppr" value="<?php echo $personne['ppr']; ?>" class="form-control"></td>
                </tr>
                <tr>
                    <td>GRADE:</td>
                    <td><input type="text" name="grade" value="<?php echo $personne['grande']; ?>" class="form-control"></td>
                </tr>
                <tr>
                    <td>SERVICE:</td>
                    <td><input type="text" name="service" value="<?php echo $personne['service']; ?>" class="form-control"></td>
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
