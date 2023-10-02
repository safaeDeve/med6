<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <nav style="margin-left: 200px;">
        <img src="images/logoPB.png" alt="">
    </nav>
    <br>
    <h4>Entrer le Nom et le Prenom:</h4>
    <form action="DecissionNomAction.php" method="post" >
        <div style="display: flex;">
        <input type="text" name="nom" class="form-control" placeholder="Saisi le Nom" style="height: 30%;">
        <input type="text" name="prenom" class="form-control" placeholder="Saisi le Prenom" style="height: 30%;">
        
        </div>
        <br><br>
        <button type="submit" class="btn btn-primary" style="height: 20%;">Cree decission</button>
    </form>
</body>
</html>