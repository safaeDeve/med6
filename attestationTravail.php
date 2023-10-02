<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <title>Creation du reprise et cessation</title>
    <style>
        .tabs {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .tab {
            cursor: pointer;
            padding: 10px 20px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 5px 5px 0 0;
        }

        .tab:hover {
            background-color: #e0e0e0;
        }

        .active-tab {
            background-color: #fff;
            border: 1px solid #ccc;
        }

        .form-container {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 0 0 5px 5px;
            padding: 20px;
            width: 400px;
            margin: 0 auto;
        }

        /* Style des boutons */
        .btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<nav style="margin-left: 200px;">
        <img src="images/logoPB.png" alt="">
    </nav>
    <br>
    <a href="HomePersGest.php"  style="display: flex;background-color: #87CEEB;width: 220px;border-radius: 20px;text-decoration: none;color:black;">
    <img src="images/home-removebg-preview.png" alt="" width="40%">
    <h6 style="padding-top: 25px;">Retour à accueil</h6>
    </a><br>
    <div class="tabs">
        <div class="tab active-tab" id="tab-create-ppr">Créer par PPR</div>
        <div class="tab" id="tab-search-name">Créer par Nom et Prénom</div>
    </div>

    <div class="form-container" id="form-create-ppr">
        <h5>attestation travail :</h5>
        <form action="atestationTravailAct.php" method="post">
            <div>
                <input type="text" name="ppr" class="form-control" placeholder="Saisissez un PPR">
                <br>
                <button type="submit" class="btn">Générer un PDF</button>
            </div>
        </form>
    </div>

    <div class="form-container" id="form-search-name" style="display: none;">
        <h5>attestation travail :</h5>
        <form action="attestationNomPreAction.php" method="post">
            <div>
                <input type="text" name="nom" class="form-control" placeholder="Saisissez le Nom">
                <input type="text" name="prenom" class="form-control" placeholder="Saisissez le Prénom">
                <br>
                <button type="submit" class="btn">Générer un PDF</button>
            </div>
        </form>
    </div>

    <script>
        // Gestion des onglets pour basculer entre les formulaires
        const tabCreatePpr = document.getElementById('tab-create-ppr');
        const tabSearchName = document.getElementById('tab-search-name');
        const formCreatePpr = document.getElementById('form-create-ppr');
        const formSearchName = document.getElementById('form-search-name');

        tabCreatePpr.addEventListener('click', () => {
            tabCreatePpr.classList.add('active-tab');
            tabSearchName.classList.remove('active-tab');
            formCreatePpr.style.display = 'block';
            formSearchName.style.display = 'none';
        });

        tabSearchName.addEventListener('click', () => {
            tabCreatePpr.classList.remove('active-tab');
            tabSearchName.classList.add('active-tab');
            formCreatePpr.style.display = 'none';
            formSearchName.style.display = 'block';
        });
    </script>
</body>
</html>