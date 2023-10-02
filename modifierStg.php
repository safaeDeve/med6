<?php
require("connexion.php");
$requeteModifier=$connexion->prepare("SELECT * FROM stagiaire WHERE cin=?");
$requeteModifier->execute(array($_GET['cin']));
$ligne=$requeteModifier->fetch();
?>
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
    <br><br>
    <h5 style="text-align: center;">Saisi les information du stagiaire</h5>
    <hr>
    <?php
if (isset($_GET['message']) ) {
    $message = $_GET['message'];
    echo '<div class="alert alert-success"><strong>VALIDE : </strong>' . $message. '</div>';

}?>
<div class="container mt-5">
        <form action="modifierStgAction.php" method="post">
            <table class="table">
                <tr>
                    <td>NOM:</td>
                    <td><input type="text" name="nom" class="form-control"value="<?php echo $ligne['nom'];?>"></td>
                </tr>
                <tr>
                    <td>PRENOM:</td>
                    <td><input type="text" name="prenom" class="form-control" value="<?php echo $ligne['prenom'];?>"></td>
                </tr>
                <tr>
                    <td>CIN:</td>
                    <td><input type="text" name="cin"  class="form-control" value="<?php echo $ligne['cin'];?>"></td>
                </tr>
                <tr>
                    <td>DATE DE  STAGE:</td>
                    <td><input type="date" name="date_stage"  class="form-control" value="<?php echo $ligne['date_stage'];?>"></td>
                </tr>
                <tr>
                    <td>SERVICE:</td>
                    <td><input type="text" name="service"  class="form-control"value="<?php echo $ligne['service'];?>"></td>
                </tr>
                <tr>
                    <td>DURÉE:</td>
                    <td>
                        <select name="duree" id="" class="form-control">
                            <option value="un mois" <?php if ($ligne['dure'] == 'un mois') echo 'selected'; ?>>Un mois</option>
                            <option value="deux mois" <?php if ($ligne['dure'] == 'deux mois') echo 'selected'; ?>>Deux mois</option>
                            <option value="trois mois" <?php if ($ligne['dure'] == 'trois mois') echo 'selected'; ?>>Trois mois</option>
                            <option value="quatre mois" <?php if ($ligne['dure'] == 'quatre mois') echo 'selected'; ?>>Quatre mois</option>
                            <option value="cinq mois" <?php if ($ligne['dure'] == 'cinq mois') echo 'selected'; ?>>Cinq mois</option>
                            <option value="six mois" <?php if ($ligne['dure'] == 'six mois') echo 'selected'; ?>>Six mois</option>
                        </select>
                    </td>
                </tr>
                
            </table>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
    <br>
    <br>
</body>
</html>