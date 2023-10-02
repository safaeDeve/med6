<?php
require("connexion.php");

$requetInsert=$connexion->prepare("INSERT INTO personnel_medVI(nom,prenom,cin,ppr,service,grande,date_naissance,specialite,date_recrutement,date_prise_service,tel,situation_familiale,n_enfant,adresse) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
$requetInsert->execute(array($_POST['nom'],$_POST['prenom'],$_POST['cin'],$_POST['ppr'],$_POST['service'],$_POST['grande'],$_POST['date_naissance'],$_POST['Specialite'],$_POST['date_recrutement'],$_POST['date_prise_service'],$_POST['telephone'],$_POST['situation_fam'],$_POST['nbr_enfants'],$_POST['adresse']));
header("location:tousPersonnel.php?message=Ajouter avec succès");
?>