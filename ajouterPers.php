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
<div style="padding-top: 25px;">
        
        <form action="ajouterAction.php" method='post' enctype="multipart/form-data" style=" border: 1px solid white;box-shadow: 0 8px 20px rgba(0, 0, 0, 0.8); width: 75%;padding-top: 15px;margin-left: 200px;">
        <h3 style="text-align: center;padding-top: 5px;">Ajouter un nouvelle personnes</h3>
        <a href="HomePersGest.php"  style="display: flex;background-color: #87CEEB;width: 220px;border-radius: 20px;text-decoration: none;color:black;">
    <img src="images/home-removebg-preview.png" alt="" width="40%">
    <h6 style="padding-top: 25px;">Retour à accueil</h6>
    </a>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="form-group">
          <label for="nom">NOM:</label>
          <input type="text" class="form-control" name="nom" id="nom">
        </div>
        <div class="form-group">
          <label for="prenom">PRENOM:</label>
          <input type="text" class="form-control" name="prenom" id="prenom">
        </div>
        <div class="form-group">
          <label for="cin">CIN:</label>
          <input type="text" class="form-control" name="cin" id="cin">
        </div>
        <div class="form-group">
          <label for="ppr">PPR:</label>
          <input type="text" class="form-control" name="ppr" id="ppr">
        </div>
        <div class="form-group">
          <label for="date_reprise">DATE DE NAISSANCE:</label>
          <input type="date" class="form-control" name="date_naissance" id="date_reprise">
        </div>
        <div class="form-group">
          <label for="grande">GRADE:</label>
          <select name="grande" id="grande" class="form-control">
                <option value="Medecin">Medecin</option>
                <option value="Généraliste">Généraliste</option>
                <option value="Polyvalent">Polyvalent</option>
                <option value="Sage femme">Sage femme</option>
                <option value="Anesthesie">Anesthesie</option>
                <option value="IUSI">IUSI</option>
                <option value="infirmier">Infirmier</option>
                <option value="Technicien laboratoire">Technicien laboratoire</option>
                <option value="Technicien de radio">Technicien de radio</option>
                <option value="Administrateur">Administrateur</option>
                <option value="INGENIEUR">INGENIEUR</option>
                <option value="Technicien ">Technicien </option>
                <option value="Assistant social">Assistant social</option>
        </select>
        </div>
        <div class="form-group">
          <label for="service">SERVICE:</label>
          <select class="form-control" name="service" id="service">
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
        </div>
        <div class="form-group">
          <label for="date_conge">SPECIALITE:</label>
          <input type="text" class="form-control" name="Specialite" id="date_conge">
        </div>
        <div class="form-group">
          <label for="date_cessation">DATE DE RECRUTEMENT:</label>
          <input type="date" class="form-control" name="date_recrutement" id="date_cessation">
        </div>
        <div class="form-group">
          <label for="date_reprise">DATE DE PRISE DE SERVICE:</label>
          <input type="date" class="form-control" name="date_prise_service" id="date_reprise">
        </div>
        <div class="form-group">
          <label for="date_reprise">TELEPHONE:</label>
          <input type="TEXT" class="form-control" name="telephone" id="date_reprise">
        </div>
        <div class="form-group">
          <label for="date_reprise">SITUATION FAMILIALE:</label>
          <select name="situation_fam" id="" class="form-control">
                <option value="Celebataire">Celebataire</option>
                <option value="Marie(e)">Marie(e)</option>
          </select>
        </div>
        <div class="form-group">
          <label for="date_reprise">NBRE D'ANFANTS:</label>
          <input type="number" class="form-control" name="nbr_enfants" id="date_reprise">
        </div>
        <div class="form-group">
          <label for="date_reprise">ADRESSE:</label>
          <textarea name="adresse" id="" cols="10" rows="5" class="form-control"></textarea>
        </div>
        <br>
        <button type="submit" class="btn text-white" style="margin-left: 200px; background-color: rgb(124, 151, 226);width: 100px;">Ajouter</button>
       
      </div>
      <br>
    </div>
  </div>
  <br>
</form>
</body>
</html>