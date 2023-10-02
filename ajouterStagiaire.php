<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <title>ajouter un stagiaire</title>
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
    <br>
    <h5 style="text-align: center;">Saisi les information du stagiaire</h5>
    <hr>
    <?php
if (isset($_GET['message']) ) {
    $message = $_GET['message'];
    echo '<div class="alert alert-success"><strong>VALIDE : </strong>' . $message. '</div>';

}?>
<div class="container mt-5">
        <form action="ajouterStagiaireAction.php" method="get">
            <table class="table">
                <tr>
                    <td>NOM:</td>
                    <td><input type="text" name="nom" class="form-control"></td>
                </tr>
                <tr>
                    <td>PRENOM:</td>
                    <td><input type="text" name="prenom" class="form-control"></td>
                </tr>
                <tr>
                    <td>CIN:</td>
                    <td><input type="text" name="cin"  class="form-control"></td>
                </tr>
                <tr>
                    <td>DATE DE  STAGE:</td>
                    <td><input type="date" name="date_stage"  class="form-control"></td>
                </tr>
                <tr>
                    <td>SERVICE:</td>
                    <td><input type="text" name="service"  class="form-control"></td>
                </tr>
                <tr>
                    <td>DURÉE:</td>
                    <td>
                        <select name="duree" id="" class="form-control">
                            <option value="un mois">Un mois</option>
                            <option value="deux mois">Deux mois</option>
                            <option value="trois mois">Trois mois</option>
                            <option value="quatre mois">Quatre mois</option>
                            <option value="cinq mois">Cinq mois</option>
                            <option value="six mois">Six mois</option>
                        </select>
                    </td>
                </tr>
                
            </table>
            <button type="submit" class="btn btn-success">Ajouter</button>
        </form>
    </div>
    <br>
    <br>
</body>
</html>