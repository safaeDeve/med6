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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <title>Decession file</title>
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
<div class="container mt-5">
    <hr>
        <h2><i>Formulaire de données:</i></h2>
        <hr>
        <form action="ajoutercongeAction.php" method="get">
            <table class="table">
                <?php foreach ($result as $personne) { ?>
                    <tr>
                        <td><b>NOM:</b></td>
                        <td><input type="text" class="form-control" name="nom" value="<?php echo $personne['nom']; ?>"></td>
                    </tr>
                    <tr>
                        <td><b>PRENOM:</b></td>
                        <td><input type="text" class="form-control" name="prenom" value="<?php echo $personne['prenom']; ?>"></td>
                    </tr>
                    <tr>
                        <td><b>CIN:</b></td>
                        <td><input type="text" class="form-control" name="cin" value="<?php echo $personne['cin']; ?>"></td>
                    </tr>
                    <tr>
                        <td><b>PPR:</b></td>
                        <td><input type="text" class="form-control" name="ppr" value="<?php echo $personne['ppr']; ?>"></td>
                    </tr>
                    <tr>
                    <td><b>GRADE:</b></td>
                        <td><input type="text" class="form-control" name="grande" value="<?php echo $personne['grande']; ?>"></td>
                    </tr>
                    <tr>
                        <td><b>SERVICE:</b></td>
                        <td><input type="text" class="form-control" name="service" value="<?php echo $personne['service']; ?>"></td>
                    </tr>
                   
                    <tr>
                        <td><b>DATE DE CONGE:</b></td>
                        <td><input type="date" class="form-control" name="date_conge"></td>
                    </tr>
                    <tr>
                        <td><b>DATE DE CESSATION:</b></td>
                        <td><input type="date" class="form-control" name="date_cessation"></td>
                    </tr>
                    <tr>
                        <td><b>DATE DE REPRISE:</b></td>
                        <td><input type="date" class="form-control" name="date_reprise"></td>
                    </tr>
                    <tr>
                        <td><b>NOMBRE DE JOUR:</b></td>
                        <td><input type="text" class="form-control" name="nombreJour" placeholder="Saisir nombre de jour"></td>
                    </tr>
                    <tr>
                        <td><b>TYPE DE CONGE:</b></td>
                        <td> <select name="type_conge" id="" class="form-control">
                            <option value="conge_administratif">conge administratif</option>
                            <option value="autorisation_absence">autorisation d'absence</option>
                        </select></td>
                    </tr>
                    
                <?php } ?>
            </table>
            <input type="hidden" name="ppr" value="<?php echo $ppr; ?>">
            <button type="submit" class="btn btn-primary">AJOUTER LE CONGE</button>
        </form>
        <br>
        <br>
    </div>


    
    
</body>
</html>
<?php
    // Fermez le statement et la connexion à la base de données
    $stmt->closeCursor(); // Facultatif, mais recommandé
    $connexion = null; // Fermez la connexion PDO
}
?>
