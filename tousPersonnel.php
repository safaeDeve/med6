<?php
require("connexion.php");

?>
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
        $selectPersonne=$connexion->prepare("SELECT * from personnel_medVI");
        $selectPersonne->execute();
    ?>
    <br>
    <h3 style="font-family: Georgia, 'Times New Roman', Times, serif;">La list de tous personnel d' Hôpital Mohammed VI:</h3>
    <a href="HomePersGest.php"  style="display: flex;background-color: #87CEEB;width: 220px;border-radius: 20px;text-decoration: none;color:black;margin-left: 1145px;">
    <img src="images/home-removebg-preview.png" alt="" width="40%">
    <h6 style="padding-top: 25px;">Retour à accueil</h6>
    </a>
    <?php
            if(isset($_GET['message'])){
                echo '<div class="alert alert-success">'.$_GET['message'].'</div>';
            }

        ?>
    <br>
    <div>
        <table  class="table table-striped">
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Cin</th>
                <th>PPR</th>
                <th>Grade</th>
                <th>Service</th>
                <th>date de naissance</th>
                <th>Specialite</th>
                <th>Date de recrutement</th>
                <th>Date prise de service</th>
                <th>Telephone</th>
                <th>situation familiale</th>
                <th>Nbre d'enfants</th>
                <th>Adresse</th>
                <th>Action</th>
            </tr>
            <?php
            while($personne=$selectPersonne->fetch()){
            ?>
            <tr>
                <td><?php echo $personne['nom'];?></td>
                <td><?php echo $personne['prenom'];?></td>
                <td><?php echo $personne['cin'];?></td>
                <td><?php echo $personne['ppr'];?></td>
                <td><?php echo $personne['grande'];?></td>
                <td><?php echo $personne['service'];?></td>
                <td><?php echo $personne['date_naissance'];?></td>
                <td><?php echo $personne['specialite'];?></td>
                <td><?php echo $personne['date_recrutement'];?></td>
                <td><?php echo $personne['date_prise_service'];?></td>
                <td><?php echo $personne['tel'];?></td>
                <td><?php echo $personne['situation_familiale'];?></td>
                <td><?php echo $personne['n_enfant'];?></td>
                <td><?php echo $personne['adresse'];?></td>
                
                
                <td><button style="background-color: yellowgreen;border:1px solid yellowgreen ;border-radius: 20px; ">
                <a href="modifier.php?ppr=<?php echo $personne['ppr']; ?>" style="color:black;text-decoration: none; "><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>Modifier</a>
                </button>
                  <button style="background-color: red; border:1px solid red;border-radius: 20px;">
                  <a href="delet.php?ppr=<?php echo $personne['ppr'] ;?>" style="color:black;text-decoration: none;"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                  </svg>Suprimer</a>
                  </button>

                
            </tr>
            <?php
            } 
            ?>
        </table>
    </div>
</body>
</html>