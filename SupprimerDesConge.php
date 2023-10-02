<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>supprimer les anciene conge</title>
    <style>
        form{
            margin-top: 180px;
            margin-left: 500px;
        }
    </style>
</head>
<body>
<nav style="margin-left: 200px;">
        <img src="images/logoPB.png" alt="">
    </nav>
<form action="SupprimerDesCongeAction.php" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer les congés de cette année ?');">
    <h5>Saisir l'année des congés que voulez vous <span style="color:red">supprimer</span>!</h5>
    <div style="display: flex;">
    <input type="text" name="annee" placeholder="Saisissez une année de congé" class="form-control" style="width: 40%;">
    <button type="submit" class="btn btn-primary">Supprimer tous</button>
    </div>
</form>
</body>
</html>