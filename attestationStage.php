<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <title>Attestation de stage</title>
</head>
<body>
<nav style="margin-left: 200px;">
        <img src="images/logoPB.png" alt="">
    </nav>
    <br>
    <a href="stagiairesGestion.php"  style="display: flex;background-color: lightgreen;width: 220px;border-radius: 20px;text-decoration: none;color:black;">
        <img src="images/homeVert-removebg-preview.png" alt="" width="40%">
        <h6 style="padding-top: 25px;">Retour à accueil</h6>
    </a><br><br><br>
    <form action="attestationStageAction.php" style="margin-left: 400px;">
        <h6>Entrer CIN:</h6>
        <div style="display: flex;">
            <input type="text" name="cin" class="form-control" style="width: 40%;" placeholder="Saisi un cin de stagiaire">
            <button type="submit" class="btn btn-success">Afficher</button>
        </div>
    </form>
</body>
</html>