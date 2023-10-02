<?php
    require('connexion.php');
    $requetYpdate=$connexion->prepare("UPDATE personnel_medvi SET nom=?,prenom=?,cin=?,ppr=?,grande=?,service=?,date_naissance=?,specialite=?,date_recrutement=?,date_prise_service=?,tel=?,situation_familiale=?,n_enfant=?,adresse=? WHERE ppr=?");
    $requetYpdate->execute(array(
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['cin'],
        $_POST['ppr'],
        $_POST['grande'],
        $_POST['service'],
        $_POST['date_naissance'],
        $_POST['specialite'],
        $_POST['date_recrutement'],
        $_POST['date_prise_service'],
        $_POST['tele'],
        $_POST['situation_fam'],
        $_POST['n_enfants'],
        $_POST['adresse'],
        $_POST['ppr']
    ));
    header("location: tousPersonnel.php?message=Les informations ont été modifiées avec succès");
?>