<?php
require('connexion.php');
require('pdf/fpdf.php');
$requeteModifier=$connexion->prepare("SELECT * FROM personnel_medVI WHERE ppr=?");
$requeteModifier->execute(array($_GET['ppr']));
$ligne=$requeteModifier->fetch();

$nom = $_GET['nom'];
$prenom = $_GET['prenom'];
$cin = $_GET['cin'];
$ppr = $_GET['ppr'];
$grande = $_GET['grade'];
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
$pdf->Cell(0, 10, '*ATTESTATION DU TRAVAILL*', 0, 1, 'C'); // Title with Cell()

// Ajouter une ligne horizontale en dessous du texte
$pdf->SetLineWidth(0.5); // Épaisseur de la ligne
$pdf->Line(20, $pdf->GetY(), 190, $pdf->GetY()); // Coordonnées X de début et fin
$pdf->Ln();

$pdf->SetFont('Arial', '', 16); 

$data = array(
    array('Étiquette' => 'PRENOM:', 'Valeur' => $prenom),
    array('Étiquette' => 'NOM:', 'Valeur' => $nom),
    array('Étiquette' => 'PPR:', 'Valeur' => $ppr),
    array('Étiquette' => 'CIN:', 'Valeur' => $cin),
 
);

// Largeur des cellules
$cellWidth = 90;

foreach ($data as $row) {
    // Aligner l'étiquette à droite
    $pdf->SetFont('Arial', 'B', 15);
    $pdf->Cell($cellWidth, 10, $row['Étiquette'], 0, 0, 'R');

    // Aligner la valeur à gauche
    $pdf->SetFont('Arial', '', 15);
    $pdf->Cell($cellWidth, 10, $row['Valeur'], 0, 1, 'L');
    $pdf->Ln(5); 
}$pdf->SetFont('Arial', '', 12);


$comment = "Mr. LE MEDECIN DIRECTEUR DE L HOPITAL MOHAMMED VI
-vu dahir n° 1.58.008 du 4Chaaban 1377 (24.2.58) portant statut général de la fonction publique.
-vu le Décret n° 1.0078.66 du 22 Chaoual 1386 (2.2.1967) portant statut particulier du personnel du Ministère de la santé.
-vu le Décret n°2
";

$pdf->SetFont('Arial', '', 11);
$pdf->MultiCell(0, 10, $comment);
$pdf->Ln();

$pdf->SetFont('Arial', 'BU', 18);
$pdf->Cell(0, 8, 'DIRECTEUR', 0, 1, 'C'); 
$pdf->Output();



?>