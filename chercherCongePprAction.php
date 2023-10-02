<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
<nav style="margin-left: 200px;">
        <img src="images/logoPB.png" alt="">
    </nav>
<?php
// Include or require the database connection file
try {
    $connexion = new PDO("mysql:host=localhost;dbname=project_med5;port=3306", 'root');
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Enable error reporting
} catch (PDOException $e) {
    echo "ERREUR DE CONNEXION" . $e->getMessage() . "<br>";
}

// Check if 'ppr' is set in the URL parameters
if (isset($_GET['ppr'])) {
    $ppr = $_GET['ppr'];

    try {
        // Use prepared statements to prevent SQL injection
        $requestChercher = "SELECT * FROM conge_table WHERE ppr = :ppr";
        $stmt = $connexion->prepare($requestChercher);
        $stmt->bindParam(':ppr', $ppr, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo"<h4>Resultat du recherche:";
        if (count($result) > 0) {
            echo '<table class="table table-striped">';
            echo '<thead>';
            echo '<tr>';
            echo '<th scope="col">Nom</th>';
            echo '<th scope="col">Prénom</th>';
            echo '<th scope="col">PPR</th>';
            echo '<th scope="col">Grande</th>';
            echo '<th scope="col">Service</th>';
            echo '<th scope="col">Type de congé</th>';
            echo '<th scope="col">Date de congé</th>';
            echo '<th scope="col">Date de cessation</th>';
            echo '<th scope="col">Date de reprise</th>';
            echo '<th scope="col">Nombre de jours</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            foreach ($result as $row) {
                echo '<tr>';
                echo '<td>' . $row['nom'] . '</td>';
                echo '<td>' . $row['prenom'] . '</td>';
                echo '<td>' . $row['ppr'] . '</td>';
                echo '<td>' . $row['grade'] . '</td>';
                echo '<td>' . $row['service'] . '</td>';
                echo '<td>' . $row['typeC'] . '</td>';
                echo '<td>' . $row['date_conge'] . '</td>';
                echo '<td>' . $row['date_accesation'] . '</td>';
                echo '<td>' . $row['date_reprise'] . '</td>';
                echo '<td>' . $row['nombre_jour'] . '</td>';
                echo '</tr>';
                echo '<br>';
                
                
            }
            echo '</tbody>';
            echo '</table>';
            echo '<div>';
            echo'<b>Le reste de jour pour le conge administratif :     </b> '.'<b>'. $row['reste_jour'].'  Jours.'.'</b>';
             '</div>';
             echo '<div>';
             $res=$row['reste_absence'];
             if ($res == 0) {
                echo '<b>Le reste de jour pour autorisation d absence : 10 jours</b>';
            } else {
                echo '<b>Le reste de jour pour autorisation d absence : ' . $row['reste_absence'] . ' jours</b>';
            }
              '</div>';

        } else {
            echo '<div class="alert alert-success">'.'Aucun congé trouvé pour le PPR  : ' . $ppr.'  ou vérifier la valeur incorrecte de ppr'.'</div>';
        }
    } catch (PDOException $e) {
        echo "Erreur lors de la requête : " . $e->getMessage();
    }
}
?>

</body>
</html>
