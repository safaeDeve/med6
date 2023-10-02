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
            height: 200px;
            margin-right: 50px;
        }
        .sty:hover{
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.5);
            transform: scale(1.1)
        }
        h3{
            font-size: 25px;
            padding-top: 20px;
            color: #87CEEB;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }
    </style>
</head>
<body>
<nav style="margin-left: 200px;">
        <img src="images/logoPB.png" alt="">
    </nav>
    
    
   <div style="background-color: #f4f4f4;height: 1300px;">
   <a href="Home.php"  style="display: flex;background-color: #87CEEB;width: 200px;border-radius: 50px;text-decoration: none;color:black;">
        <img src="images/home-removebg-preview.png" alt="" width="50%">
        <h5 style="padding-top: 25px;">Quitter</h5>
    </a>
   <h3 style="margin-left: 330px;padding-top: 20px;">
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
    <span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span>
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
    <span>p</span>
    <span>e</span>
    <span>r</span>
    <span>s</span>
    <span>o</span>
    <span>n</span>
    <span>n</span>
    <span>e</span>
    <span>l</span>
   
</h3>
    <div style="display: flex; width: 800px;padding-left: 300px;text-align: center;padding-top: 120px;">
            <div class="sty">
                <a href="tousPersonnel.php" class="links">
                <img src="images/list2-removebg-preview.png" alt="" width="50%" >
                <h4>Afficher list <br> de personnel</h4>
                </a>
            </div>
            <div class="sty">
                <a href="ajouterPers.php" class="links">
                <img src="images/ajouter_iconpreview.png" alt="" width="50%">
                <h4>Ajouter un nouvel <br> personnel</h4>
                </a>
            </div>
            <div class="sty">
                <a href="cessation_reprise.php" class="links">
                <img src="images/cess_reprise-removebg-preview.png" alt="" width="50%">
                <h4>Cree Cessation <br> et Reprise</h4>
                </a>
            </div>
    </div>
   <div style="display: flex; width: 800px;padding-left: 300px;text-align: center;padding-top: 150px;">
        <div class="sty">
            <a href="creeDecission.php" class="links">
                <img src="images/deces-removebg-preview.png" alt="" width="55%">
                <h4>Cree decession</h4>
            </a>
        </div>
        <div class="sty">
            <a href="congeGestion.php" class="links">
            <img src="images/conge.png" alt="" width="50%">
            <h4>Gestion du conge</h4>
            </a>
        </div>
        <div class="sty">
            <a href="attestationTravail.php" class="links">
            <img src="images/ates_travaille.png" alt="" width="50%">
            <h4>Cree attestation  <br> de travaille</h4>
            </a>
        </div>
    </div>
    <br><br>
    <div style="display: flex; width: 800px;padding-left: 300px;text-align: center;padding-top: 120px;">
        <div class="sty" style="width: 250px;">
                <a href="chercherPersonne.php" class="links">
                <img src="images/chercherPersonne.png" alt="" width="50%" style="padding-top: 10px;">
                <h4>Chercher un personnel</h4>
                </a>
            </div>
            <div class="sty" style="width: 250px;margin-left: 20px;height: 230px;">
            <a href="SupprimerDesConge.php" class="links">
            <img src="images/deleteIcone-removebg-preview.png" alt="" width="50%" style="padding-top: 10px;">
            <h4>Supprimer les anciens  congés</h4>
            </a>
        </div>
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