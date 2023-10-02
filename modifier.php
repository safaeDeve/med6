<?php
require("connexion.php");
$requeteModifier=$connexion->prepare("SELECT * FROM personnel_medVI WHERE ppr=?");
$requeteModifier->execute(array($_GET['ppr']));
$ligne=$requeteModifier->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg " style="background-color: rgb(124, 151, 226);">
  
  <div class="collapse navbar-collapse" id="navbarNav" style="padding-left: 15px;">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="admin.php"  style="color:white"><b>Roteur</b></a>
      </li>
    </ul>
  </div>
  </nav>
  <br>
  <?php
            if(isset($_GET['message'])){
                echo '<div class="alert alert-success">'.$_GET['message'].'</div>';
            }

        ?>
        <br>
<div style=" border: 1px solid white;box-shadow: 0 8px 20px rgba(0, 0, 0, 0.8); width: 75%;padding-top: 15px;margin-left: 200px;">
    <h3 style="text-align: center;">Modifier</h3>
    <form action="modifierAction.php" method='post' enctype="multipart/form-data" style="padding-left: 240px;">
        <table >
            <tr>
                <td>NOM:</td>
                <td><input type="text" class="form-control" name="nom"value="<?php echo $ligne['nom'];?>"  ></td>
            </tr>
            <tr>
                <td>PRENOM:</td>
                <td><input type="text" class="form-control" name="prenom" value="<?php echo $ligne['prenom'];?>"></td>
            </tr>
            <tr>
                <td>CIN:</td>
                <td><input type="text" class="form-control" name="cin" value="<?php echo $ligne['cin'];?>"></td>
            </tr>
            <tr>
                <td>PPR:</td>
                <td><input type="text" class="form-control" name="ppr" value="<?php echo $ligne['ppr'];?>"></td>
            </tr>
            <tr>
                <td>GRADE:</td>
                <td><select name="grande" id="grande" class="form-control">
        <option value="Medecin" <?php if ($ligne['grande'] == 'Medecin') echo 'selected'; ?>>Medecin</option>
        <option value="Généraliste" <?php if ($ligne['grande'] == 'Généraliste') echo 'selected'; ?>>Généraliste</option>
        <option value="Polyvalent" <?php if ($ligne['grande'] == 'Polyvalent') echo 'selected'; ?>>Polyvalent</option>
        <option value="infirmier" <?php if ($ligne['grande'] == 'infirmier') echo 'selected'; ?>>Infirmier</option>
        <option value="Sage femme" <?php if ($ligne['grande'] == 'Sage femme') echo 'selected'; ?>>Sage femme</option>
        <option value="Anesthesie" <?php if ($ligne['grande'] == 'Anesthesie') echo 'selected'; ?>>Anesthesie</option>
        <option value="IUSI" <?php if ($ligne['grande'] == 'IUSI') echo 'selected'; ?>>IUSI</option>
        <option value="Technicien laboratoire" <?php if ($ligne['grande'] == 'Technicien laboratoire') echo 'selected'; ?>>Technicien laboratoire</option>
        <option value="Technicien de radio" <?php if ($ligne['grande'] == 'Technicien de radio') echo 'selected'; ?>>Technicien de radio</option>
        <option value="Administrateur" <?php if ($ligne['grande'] == 'Administrateur') echo 'selected'; ?>>Administrateur</option>
        <option value="INGENIEUR" <?php if ($ligne['grande'] == 'INGENIEUR') echo 'selected'; ?>>INGENIEUR</option>
        <option value="Technicien " <?php if ($ligne['grande'] == 'Technicien ') echo 'selected'; ?>>Technicien </option>
        <option value="Assistant social" <?php if ($ligne['grande'] == 'Assistant social') echo 'selected'; ?>>Assistant social</option>
    </select></td>
            </tr>
            <tr>
                <td>SERVICE:</td>
                <td>
                <select name="service" class="form-control" id="">
    <option value="ADM" <?php if ($ligne['service'] == 'ADM') echo 'selected'; ?>>ADM</option>
    <option value="URGENCES" <?php if ($ligne['service'] == 'URGENCES') echo 'selected'; ?>>URGENCES</option>
    <option value="BLOC OPERATOIRE/ REANIMATION" <?php if ($ligne['service'] == 'BLOC OPERATOIRE/ REANIMATION') echo 'selected'; ?>>BLOC OPERATOIRE/ REANIMATION</option>
    <option value="MATERNITE" <?php if ($ligne['service'] == 'MATERNITE') echo 'selected'; ?>>MATERNITE</option>
    <option value="CENTRE DE DIAGNOSTIC" <?php if ($ligne['service'] == 'CENTRE DE DIAGNOSTIC') echo 'selected'; ?>>CENTRE DE DIAGNOSTIC</option>
    <option value="CHIRURGIE" <?php if ($ligne['service'] == 'CHIRURGIE') echo 'selected'; ?>>CHIRURGIE</option>
    <option value="HOSPITALISATION" <?php if ($ligne['service'] == 'HOSPITALISATION') echo 'selected'; ?>>HOSPITALISATION</option>
    <option value="LABORATOIRE" <?php if ($ligne['service'] == 'LABORATOIRE') echo 'selected'; ?>>LABORATOIRE</option>
    <option value="PSI" <?php if ($ligne['service'] == 'PSI') echo 'selected'; ?>>PSI</option>
    <option value="RADIOLOGIE" <?php if ($ligne['service'] == 'RADIOLOGIE') echo 'selected'; ?>>RADIOLOGIE</option>
    <option value="SAA" <?php if ($ligne['service'] == 'SAA') echo 'selected'; ?>>SAA</option>
    <option value="PRELEVEMENT" <?php if ($ligne['service'] == 'PRELEVEMENT') echo 'selected'; ?>>PRELEVEMENT</option>
    <option value="PHARMACIE" <?php if ($ligne['service'] == 'PHARMACIE') echo 'selected'; ?>>PHARMACIE</option>
</select>
                    </td>
            </tr>
            <tr>
                <td>DATE DE NAISSANCE:</td>
                <td><input type="date" class="form-control" name="date_naissance" value="<?php echo $ligne['date_naissance'];?>"></td>
            </tr>
            <tr>
                <td>SPECIALITE:</td>
                <td><input type="text" class="form-control" name="specialite" value="<?php echo $ligne['specialite'];?>"></td>
            </tr>
            <tr>
                <td>DATE DE RECRUTEMENT:</td>
                <td><input type="date" class="form-control" name="date_recrutement" value="<?php echo $ligne['date_recrutement'];?>"></td>
            </tr>
            <tr>
                <td>DATE DE PRISE DE SERVICE:</td>
                <td><input type="date" class="form-control" name="date_prise_service" value="<?php echo $ligne['date_prise_service'];?>"></td>
            </tr>
            <tr>
                <td>TELEPHONE:</td>
                <td><input type="text" class="form-control" name="tele" value="<?php echo $ligne['tel'];?>"></td>
            </tr>
            <tr>
                <td>SITUATION FAMILIALE:</td>
                    <td><select name="situation_fam" id="" class="form-control">
                    <option value="Celebataire" <?php if ($ligne['situation_familiale'] == 'Celebataire') echo 'selected'; ?>>Celebataire</option>
                    <option value="Marie(e)" <?php if ($ligne['situation_familiale'] == 'Marie(e)') echo 'selected'; ?>>Marie(e)</option>
                </select></td>
            </tr>
            <tr>
                <td>NBRE D'ENFANT:</td>
                <td><input type="number" class="form-control" name="n_enfants" value="<?php echo $ligne['n_enfant'];?>"></td>
            </tr>
            <tr>
                <td>ADRESSE:</td>
                <td><input type="text" class="form-control" name="adresse"value="<?php echo $ligne['adresse'];?>"></textarea></td>
            </tr>
        </table>
        <br>
        <br>
        <button type="submit" class="btn text-white" style="margin-left: 200px; background-color: rgb(124, 151, 226);width: 100px;">Modifier</button>
        <br>
        
    </form>
</div>
    
</body>
</html>