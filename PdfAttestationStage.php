<?php
require('connexion.php');
require('pdf/fpdf.php');
$requeteModifier=$connexion->prepare("SELECT * FROM stagiaire WHERE cin=?");
$requeteModifier->execute(array($_GET['cin']));
$ligne=$requeteModifier->fetch();

$nom = $_GET['nom'];
$prenom = $_GET['prenom'];
$cin = $_GET['cin'];
$date_stage = $_GET['date_stage'];
$duree = $_GET['duree'];
$service = $_GET['service'];

class CustomPDF extends FPDF
{
    // En-tête de page personnalisée
    function Header()
    {
        // Chargement de l'image d'en-tête
        $imagePath = 'images/logoP.png'; // Remplacez par le chemin réel vers votre image
        $pageWidth = $this->GetPageWidth();
        $imageWidth = $pageWidth - 20; // Réduire la largeur de l'image pour tenir compte des marges

        $this->Image($imagePath, 10, 10, $imageWidth);
        $this->SetY(50);
    }
    function Footer()
    {
        // Chargement de l'image de pied de page
        $imagePath = 'pied.png'; // Remplacez par le chemin réel vers votre image de pied de page
        
        $pageWidth = $this->GetPageWidth();
        $imageWidth = $pageWidth - 20; // Réduire la largeur de l'image pour tenir compte des marges

        $this->SetY(-40); // Déplacer la position Y de dessin du pied de page en haut de la marge inférieure
        $this->Image($imagePath, 10, $this->GetY(), $imageWidth); // Paramètres : chemin de l'image, position X, position Y, largeur, hauteur (calculée automatiquement)
    }
}
$pdf = new CustomPDF();
$pdf->AddPage();

// Add data from the form to the PDF
$pdf->SetFont('Arial', 'B', 22);
$pdf->Cell(0, 10, '*ATTESTATION DE SATGE*', 0, 1, 'C'); // Title with Cell()

// Ajouter une ligne horizontale en dessous du texte
$pdf->SetLineWidth(0.5); // Épaisseur de la ligne
$pdf->Line(20, $pdf->GetY(), 190, $pdf->GetY()); // Coordonnées X de début et fin
$pdf->Ln();

$pdf->SetFont('Arial', '', 16); 






// Set the font to bold and write variable values in bold
$pdf->SetFont('Arial', '', 14);
$pdf->Write(10, 'Je suis directeur de l hopital Mohammed VI que ');

$pdf->SetFont('Arial', 'B', 14);
$pdf->Write(10, $nom);
$pdf->SetFont('Arial', '', 14);
$pdf->Write(10, ' ');

$pdf->SetFont('Arial', 'B', 14);
$pdf->Write(10, $prenom);
$pdf->SetFont('Arial', '', 14);
$pdf->Write(10, ' ');

$pdf->SetFont('Arial', '', 14);
$pdf->Write(10, 'passe un stage du ');

$pdf->SetFont('Arial', 'B', 14);
$pdf->Write(10, $duree);
$pdf->SetFont('Arial', '', 14);
$pdf->Write(10, ' à partir de ');

$pdf->SetFont('Arial', 'B', 14);
$pdf->Write(10, $date_stage);
$pdf->SetFont('Arial', '', 14);
$pdf->Write(10, ' en service ');

$pdf->SetFont('Arial', 'B', 14);
$pdf->Write(10, $service );
$pdf->SetFont('Arial', 'B', 15);
$pdf->Write(10, ' . ');

$pdf->Ln();


$pdf->SetFont('Arial', 'BU', 18);
$pdf->Cell(0, 8, 'DIRECTEUR', 0, 1, 'C'); 
$pdf->Output();



?>