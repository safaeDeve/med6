<?php
require("connexion.php");
$requeteModifier=$connexion->prepare("SELECT * FROM conge_table WHERE date_conge=?");
$requeteModifier->execute(array($_GET['date_conge']));
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
    <h5 style="text-align: center;"> les information du Conge</h5>
    <hr>
    <?php
if (isset($_GET['message']) ) {
    $message = $_GET['message'];
    echo '<div class="alert alert-success"><strong>VALIDE : </strong>' . $message. '</div>';

}?>
<div class="container mt-5">
        <form action="modifierCongeAction.php" method="post">
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
                    <td>PPR:</td>
                    <td><input type="text" name="ppr"  class="form-control" value="<?php echo $ligne['ppr'];?>"></td>
</tr>
                <tr>
                    <td>SERVICE:</td>
                    <td><input type="text" name="service"  class="form-control"value="<?php echo $ligne['service'];?>"></td>
                </tr>
                <td>DATE DE CONGE:</td>
    <td>
        <input type="date" name="nouvelle_date_conge" class="form-control" value="<?php echo $ligne['date_conge']; ?>">
        <input type="hidden" name="ancienne_date_conge" value="<?php echo $ligne['date_conge']; ?>">
    </td>
                <tr>
                    <td>DATE DE CESSATION:</td>
                    <td>
                    <input type="date" name="date_accesation"  class="form-control" value="<?php echo $ligne['date_accesation'];?>">
                    </td>
                </tr>
                <tr>
                    <td>DATE DE REPRISE:</td>
                    <td>
                    <input type="date" name="date_reprise"  class="form-control" value="<?php echo $ligne['date_reprise'];?>">
                    </td>
                </tr>
                <tr>
                    <td>TYPE DE CONGE:</td>
                    <td>
                        <select name="type_conge" class="form-control" id="">
                        <option value="conge_administratif"<?php if ($ligne['typeC'] == 'conge_administratif') echo 'selected'; ?>>conge administratif</option>
                            <option value="autorisation_absence" <?php if ($ligne['typeC'] == 'autorisation_absence') echo 'selected'; ?>>autorisation d'absence</option>
                        </select>                    </td>
                </tr>
                <tr>
                    <td>NOMBRE DE JOUR:</td>
                    <td>
                    <input type="text" name="nombre_jour"  class="form-control" value="<?php echo $ligne['nombre_jour'];?>">
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