<?php
try{
    $connexion=new PDO ("mysql:host=localhost;dbname=project_med5;port=3306",'root');
   
}
catch(Exeption $e){
    echo "ERREUR DE CONEXION".$e->getMessage()."<br>";
}
?>