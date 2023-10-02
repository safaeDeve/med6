<?php
require('connexion.php');

$chercherSERVICE2 = isset($_GET['chercherSERVICE2']) ? $_GET['chercherSERVICE2'] : '';
$chercherMOIS2 = isset($_GET['chercherMOIS2']) ? $_GET['chercherMOIS2'] : '';

// Obtenez l'année actuelle
$anneeActuelle = date("Y");

$requeteSelect2 = $connexion->prepare("SELECT * FROM conge_table WHERE service = ? AND MONTH(date_conge) = ? AND YEAR(date_conge) = ?");
$requeteSelect2->execute(array($chercherSERVICE2, $chercherMOIS2, $anneeActuelle));
$resultats2 = $requeteSelect2->fetchAll();
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
    <style>
        #btnid:hover{
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        transform: scale(1.1)
        }
    </style>
</head>
<body>
<nav style="margin-left: 200px;">
        <img src="images/logoPB.png" alt="">
    </nav>
    <br>
    <a href="congeGestion.php"  style="display: flex;background-color: #87CEEB;width: 220px;border-radius: 20px;text-decoration: none;color:black;">
    <img src="images/home-removebg-preview.png" alt="" width="40%">
    <h6 style="padding-top: 25px;">Retour à accueil</h6>
    </a>
    <br>
<h4>Sélectionnez Service et Moins:</h4>
<br>
<form action="chercherServiceMoins.php" method="get" style="display: flex;">
  <select  name="chercherSERVICE2" id="service" class="form-control">
                <option value="ADM">ADM</option>
                <option value="URGENCES">URGENCES</option>
                <option value="BLOC OPERATOIRE/ REANIMATION">BLOC OPERATOIRE/ REANIMATION</option>
                <option value="MATERNITE">MATERNITE</option>
                <option value="CENTRE DE DIAGNOSTIC">CENTRE DE DIAGNOSTIC</option>
                <option value="CHIRURGIE">CHIRURGIE</option>
                <option value="HOSPITALISATION ">HOSPITALISATION </option>
                <option value="LABORATOIRE">LABORATOIRE</option>
                <option value="PSI">PSI</option>
                <option value="RADIOLOGIE">RADIOLOGIE</option>
                <option value="SAA">SAA</option>
                <option value="PRELEVEMENT">PRELEVEMENT</option>
                <option value="PHARMACIE">PHARMACIE</option>
            </select>
            &nbsp;&nbsp;<select name="chercherMOIS2" class="form-control" id="mois">
          <option value="">Sélectionnez un mois</option>
          <option value="1">Janvier</option>
          <option value="2">Février</option>
          <option value="3">Mars</option>
          <option value="4">Avril</option>
          <option value="5">Mai</option>
          <option value="6">Juin</option>
          <option value="7">Juillet</option>
          <option value="8">Août</option>
          <option value="9">Septembre</option>
          <option value="10">Octobre</option>
          <option value="11">Novembre</option>
          <option value="12">Décembre</option>
      </select>&nbsp;&nbsp;
            &nbsp;&nbsp;<button type="submit" class="btn text-white" style=" background-color: rgb(124, 151, 226);width: 50px; border-radius: 50px;" id="btnid"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg></button>&nbsp;&nbsp;&nbsp;&nbsp;
</form>
<br>

    <table class="table table-striped">
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>PPR</th>
            <th>Grade</th>
            <th>Service</th>
            <th>Type de conge</th>
            <th>date de conge</th>
            <th>date de cessation</th>
            <th>date de reprise</th>
            <th>nombre jours</th>
            <th>rester de jours</th>
        </tr>
        <?php
        if ($resultats2) {
            foreach ($resultats2 as $personne) {
                echo "<tr>";
                echo "<td>" . $personne['nom'] . "</td>";
                echo "<td>" . $personne['prenom'] . "</td>";
                echo "<td>" . $personne['ppr'] . "</td>";
                echo "<td>" . $personne['grade'] . "</td>";
                echo "<td>" . $personne['service'] . "</td>";
                echo "<td>" . $personne['typeC'] . "</td>";
                echo "<td>" . $personne['date_conge'] . "</td>";
                echo "<td>" . $personne['date_accesation'] . "</td>";
                echo "<td>" . $personne['date_reprise'] . "</td>";
                echo "<td>" . $personne['nombre_jour'] . "</td>";
                echo "<td>" . $personne['reste_jour'] . "</td>";
                echo "</tr>";
                echo '<div>';
            }
            
        } else {
            echo "<tr><td colspan='4'>Aucun résultat trouvé.</td></tr>";
        }
        
        ?>
    </table>
    
</body>
</html>