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
<?php
if (isset($_GET['message']) && isset($_GET['content'])) {
    $messageType = $_GET['message'];
    $messageContent = $_GET['content'];

    if ($messageType === 'success') {
        echo '<div class="alert alert-success"><strong>VALIDE : </strong>' . $messageContent . '</div>';
    } elseif ($messageType === 'error') {
        echo '<div class="alert alert-danger"><strong>ERREUR : </strong> ' . urldecode($messageContent) . '</div>';

    }
}
?>
 <nav style="margin-left: 200px;">
        <img src="images/logoPB.png" alt="">
    </nav>
    <a href="congeGestion.php"  style="display: flex;background-color: #87CEEB;width: 220px;border-radius: 20px;text-decoration: none;color:black;">
    <img src="images/home-removebg-preview.png" alt="" width="40%">
    <h6 style="padding-top: 25px;">Retour à accueil</h6>
    </a>
    <form action="pprCongeAction.php" method="post" style="margin-left: 400px;margin-top: 100px;">
        <label for="ppr"><h5>Entrer un PPR:</h5></label><br/>
        <div style="display: flex;">
        <input type="text" name="ppr" class="form-control" style="width: 500px;"placeholder="Saisi un ppr">
        <button type="submit" class="btn btn-primary">AFFICHER</button>
        </div>
    </form>
</body>
</html>