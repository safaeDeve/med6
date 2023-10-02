<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .links{
            text-decoration: none;
            font-size: 20px;
            color: black;
        }
        .sty{
            height: 230px;
            width: 250px;
            margin-left: 50px;
            padding-top: 10px;
            margin-top: 20px;
        }
        .sty:hover{
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.5);
            transform: scale(1.1)
        }
    </style>
</head>
<body>
    <nav style="margin-left: 200px;">
        <img src="images/logoPB.png" alt="">
    </nav>
    <br>
    <a href="HomePersGest.php"  style="display: flex;background-color: #87CEEB;width: 220px;border-radius: 20px;text-decoration: none;color:black;margin-left: 1120px;">
    <img src="images/home-removebg-preview.png" alt="" width="40%">
    <h6 style="padding-top: 25px;">Retour à accueil</h6>
    </a>

   <div style="background-color: #f4f4f4;height: 700px;">
   <div style="display: flex;margin-left: 10px; ">
  
    <div style="display: flex; text-align: center;padding-top: 150px;padding-left: 80px;">
            <div class="sty">
                <a href="pprConge.php" class="links">
                <img src="images/calendrier.png" alt="" width="50%" >
                <h4>Ajouter Un <br> Nouvelle Conge</h4>
                </a>
            </div>
            <div class="sty">
                <a href="afficherTousConge.php" class="links">
                <img src="images/list2-removebg-preview (1).png" alt="" width="50%" >
                <h4>La liste du <br> Conge</h4>
                </a>
            </div>
            <div class="sty">
                <a href="chercherCongePpr.php" class="links">
                <img src="images/chercherIcon-removebg-preview.png" alt="" width="50%">
                <h4>Chercher Conge <br> par PPR</h4>
                </a>
            </div>
            <div class="sty">
                <a href="chercherServiceMoins.php" class="links">
                <img src="images/chercherIcon-removebg-preview.png" alt="" width="50%">
                <h4>Chercher Conge <br> par Service&Mois</h4>
                </a>
            </div>
    </div>
   </div> 
   
   </div>
    
    
</body>
</html>