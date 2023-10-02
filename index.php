<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>

    <title>Administration d'Hôpital Mohammed VI</title>
    <style>
        /* Style pour le conteneur de l'en-tête */
        #content {
            background-color: #f4f4f4; /* Couleur d'arrière-plan de l'en-tête (claire) */
            padding: 20px; /* Espacement interne de l'en-tête */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            display: flex; /* Ajoute une ombre légère à l'en-tête */
            height: 600px;
        }
        .links{
            text-decoration: none;
            color: black;
            padding-left: 15px;
            font-size: 30px;
            
        }
        .cont {
        padding-left: 80px;
        transition: box-shadow 0.3s ease; /* Transition douce */
        }

        .cont:hover {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        transform: scale(1.1) /* Modifier les valeurs pour personnaliser l'ombre */
        }
        
       

    </style>
</head>
<body>
<nav style="margin-left: 200px;">
        <img src="images/logoPB.png" alt="">
    </nav>
<div id="content">
<div style="padding-left: 50px;padding-top: 100px;">
        <img src="images/logo.png" alt="" height="300px" style="padding-top: 45px;">
    </div>
    <div style="padding-left: 60px;padding-top: 160px;">
  

        <br>
        <br>
        <div style="padding-left: 80px;" >
        <div style="display: flex;"class="cont">
            <img src="images/personnel.png" alt="" width="15%">
            <h4 style="padding-top: 30px;"><a href="HomePersGest.php" class="links">Gestion de personnel d'hôpital</a></h4>
        </div>
        <br><br>
        <div style="display: flex;" class="cont">
            <img src="images/stagaire.png" alt="" width="15%">
            <h4 style="padding-top: 40px;"><a href="stagiairesGestion.php"  class="links">Gestion de stagiaire d'hôpital</a></h4>
        </div>
        </div>
    </div>
</div>


</body>
</html>