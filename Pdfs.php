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
$grande = $_GET['grande'];
$service = $_GET['service'];
$date_conge=$_GET['date_conge'];
$date_cessation=$_GET['date_cessation'];
$date_reprise=$_GET['date_reprise'];
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

// Créer une instance de la classe CustomPDF
$pdf = new CustomPDF();
$pdf->AddPage();

// Add data from the form to the PDF
$pdf->SetFont('Arial', 'B', 22);
$pdf->Cell(0, 10, 'CESSATION DE CONGE', 0, 1, 'C'); // Title
$pdf->Ln();

$pdf->SetFont('Arial', '', 16);
$marginLeft = 60; // Left margin

$pdf->SetLeftMargin($marginLeft);

$data = array(
    array('Étiquette' => 'PPR:', 'Valeur' => $ppr),
    array('Étiquette' => 'CIN:', 'Valeur' => $cin),
    array('Étiquette' => 'NOM:', 'Valeur' => $nom),
    array('Étiquette' => 'PRENOM:', 'Valeur' => $prenom),
    array('Étiquette' => 'GRADE:', 'Valeur' => $grande),
    array('Étiquette' => 'SERVICE:', 'Valeur' => $service),
    array('Étiquette' => 'DATE DE CONGE:', 'Valeur' => $date_conge),
    array('Étiquette' => 'DATE CESSATION:', 'Valeur' => $date_cessation ),
    array('Étiquette' => 'DATE DE REPRISE:', 'Valeur' => $date_reprise),
);

foreach ($data as $row) {
    $pdf->SetFont('Arial', 'B', 15);
    $pdf->Cell(60, 10, $row['Étiquette'], 0, 0, 'L');

    $pdf->SetFont('Arial', '', 15);
    $pdf->Cell(60, 10, $row['Valeur'], 0, 1, 'L');
    $pdf->Ln(5); 
}
// Ajoutez un petit espace entre la date de reprise et les signatures

// Positionnez "RESPONSABLE" à gauche
$pdf->SetY($pdf->GetY() + 5); // Ajustez la position Y pour aligner avec la ligne précédente
$pdf->SetX(20); // Ajustez la position X selon vos besoins
$pdf->SetFont('Arial', 'BU', 18);
$pdf->Cell(0, 8, 'RESPONSABLE', 0, 0, 'L'); // Gras et souligné à gauche

// Positionnez "DIRECTEUR" à droite
$pdf->SetX($pdf->GetPageWidth() - 100); // Ajustez la position X selon vos besoins
$pdf->SetFont('Arial', 'BU', 18);
$pdf->Cell(0, 8, 'DIRECTEUR', 0, 1, 'R'); 
// Output the PDF to the browser or save it to a file


$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 19);
$marginLeft = 50; // Marge gauche
$pageWidth = $pdf->GetPageWidth();
$titleWidth = $pageWidth - 2 * $marginLeft; // Largeur du titre centré
$titleX = $marginLeft; // Position X pour centrer le titre

$pdf->SetX($titleX); // Positionnez X pour le titre centré
$pdf->Cell($titleWidth, 10, 'REPRISE DE CONGE', 0, 1, 'C'); // Title centré
$pdf->Ln();

$pdf->SetFont('Arial', '', 18);
$marginLeft = 60; // Left margin

$pdf->SetLeftMargin($marginLeft);

$data = array(
    array('Étiquette' => 'PPR:', 'Valeur' => $ppr),
    array('Étiquette' => 'CIN:', 'Valeur' => $cin),
    array('Étiquette' => 'NOM:', 'Valeur' => $nom),
    array('Étiquette' => 'PRENOM:', 'Valeur' => $prenom),
    array('Étiquette' => 'GRADE:', 'Valeur' => $grande),
    array('Étiquette' => 'SERVICE:', 'Valeur' => $service),
    array('Étiquette' => 'DATE DE CONGE:', 'Valeur' => $date_conge),
    array('Étiquette' => 'DATE CESSATION:', 'Valeur' => $date_cessation ),
    array('Étiquette' => 'DATE DE REPRISE:', 'Valeur' => $date_reprise),
);

foreach ($data as $row) {
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(60, 10, $row['Étiquette'], 0, 0, 'L');

    $pdf->SetFont('Arial', '', 16);
    $pdf->Cell(60, 10, $row['Valeur'], 0, 1, 'L');
    $pdf->Ln(5); 
}


// Positionnez "RESPONSABLE" à gauche
$pdf->SetY($pdf->GetY() + 5); // Ajustez la position Y pour aligner avec la ligne précédente
$pdf->SetX(20); // Ajustez la position X selon vos besoins
$pdf->SetFont('Arial', 'BU', 18);
$pdf->Cell(0, 8, 'RESPONSABLE', 0, 0, 'L'); // Gras et souligné à gauche

// Positionnez "DIRECTEUR" à droite
$pdf->SetX($pdf->GetPageWidth() - 100); // Ajustez la position X selon vos besoins
$pdf->SetFont('Arial', 'BU', 18);
$pdf->Cell(0, 8, 'DIRECTEUR', 0, 1, 'R'); 

$pdf->Output();



?>
