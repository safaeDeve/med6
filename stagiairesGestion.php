<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <title>Gestion du personnel</title>
    <style>
        .links{
            text-decoration: none;
            font-size: 20px;
            color: black;
        }
        .sty{
            height: 260px;
            margin-right: 50px;
            width: 500px;
        }
        .sty:hover{
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.5);
            transform: scale(1.1)
        }
        h3{
            font-size: 25px;
            padding-top: 20px;
            color: lightgreen;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }
    </style>
</head>
<body>
<nav style="margin-left: 200px;">
        <img src="images/logoPB.png" alt="">
    </nav>
    
    
   <div style="background-color: #f4f4f4;height: 1300px;">
   <a href="Home.php"  style="display: flex;background-color: lightgreen;width: 200px;border-radius: 50px;text-decoration: none;color:black;">
        <img src="images/homeVert-removebg-preview.png" alt="" width="50%">
        <h5 style="padding-top: 25px;">Quitter</h5>
    </a>
   <h3 style="margin-left: 330px;padding-top: 50px;">
    <span>H</span>
    <span>&ocirc;</span>
    <span>p</span>
    <span>i</span>
    <span>t</span>
    <span>a</span>
    <span>l</span>
    <span>&nbsp;</span>
    <span>M</span>
    <span>o</span>
    <span>h</span>
    <span>a</span>
    <span>m</span>
    <span>m</span>
    <span>e</span>
    <span>d</span>
    <span>&nbsp;</span>
    <span>V</span>
    <span>I</span>
    <span>&nbsp;</span>
    <span>A</span>
    <span>d</span>
    <span>m</span>
    <span>i</span>
    <span>n</span>
    <span>i</span>
    <span>s</span>
    <span>t</span>
    <span>r</span>
    <span>a</span>
    <span>t</span>
    <span>i</span>
    <span>o</span>
    <span>n</span>
    <span><br></span>
    <span><br></span>
    <span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span>
    <span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span>
    <span>G</span>
    <span>e</span>
    <span>s</span>
    <span>t</span>
    <span>i</span>
    <span>o</span>
    <span>n</span>
    <span>&nbsp;</span>
    <span>d</span>
    <span>u</span>
    <span>&nbsp;</span>
    <span>s</span>
    <span>t</span>
    <span>a</span>
    <span>g</span>
    <span>i</span>
    <span>a</span>
    <span>i</span>
    <span>r</span>
    <span>e</span>
   
</h3>
    <div style="display: flex; width: 800px;padding-left: 300px;text-align: center;padding-top: 120px;">
            <div class="sty">
                <a href="afficherStagiaires.php" class="links">
                    <br>
                <img src="images/listVert-removebg-preview.png" alt="" width="60%" >
                <h4>Afficher list <br> de Stagiaires</h4>
                </a>
            </div>
            <div class="sty">
                <a href="ajouterStagiaire.php" class="links">
                    <br>
                <img src="images/stgVert-removebg-preview.png" alt="" width="50%">
                <h4>Ajouter un nouvel <br>Stagiaire</h4>
                </a>
            </div>
            <div class="sty">
                <a href="attestationStage.php" class="links">
                    <br>
                <img src="images/certifcat-vert-removebg-preview.png" alt="" width="70%">
                <h4>Cree attestation <br> du stage</h4>
                </a>
            </div>
    </div>
   <div style="display: flex; width: 800px;padding-left: 300px;text-align: center;padding-top: 150px;">
        <div class="sty">
            <a href="chercherStagiaire.php" class="links">
                <br>
                <img src="images/chercherVert-removebg-preview.png" alt="" width="45%">
                <h4>Chercher un stagiaires</h4>
            </a>
        </div>
        <div class="sty">
            <a href="chercherStgServiceMois.php" class="links">
                <br>
            <img src="images/groupVert-removebg-preview.png" alt="" width="35%">
            <h4>Nombre de stagiaires <br> selon service&mois</h4>
            </a>
        </div>
       
    </div>

   </div>
   </div>
   <script>
    anime.timeline({ loop: true })
        .add({
            targets: 'h3 span',
            opacity: [0, 1],
            translateY: [20, 0],
            translateX: [10, 0],
            easing: 'easeOutExpo',
            duration: 200,
            delay: anime.stagger(100)
        })
        .add({
            targets: 'h3 span',
            opacity: [1, 0],
            translateY: [0, -20],
            translateX: [0, -10],
            easing: 'easeInExpo',
            duration: 200,
            delay: anime.stagger(100)
        });
</script>
</body>
</html>