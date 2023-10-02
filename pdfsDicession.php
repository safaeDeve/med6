<?php
require('pdf/fpdf.php');
require('connexion.php');
$requeteModifier=$connexion->prepare("SELECT * FROM personnel_medVI WHERE ppr=?");
$requeteModifier->execute(array($_GET['ppr']));
$ligne=$requeteModifier->fetch();

// Récupérer les valeurs du formulaire
$nom = $_GET['nom'];
$prenom = $_GET['prenom'];
$cin = $_GET['cin'];
$ppr = $_GET['ppr'];
$grande = $_GET['grande'];
$service = $_GET['service'];
$nombreJour=$_GET['nombreJour'];
$annee=$_GET['annee'];
$date_conge = $_GET['date_conge'];


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
$pdf->SetFont('Arial', 'B', 17);
$pdf->SetLeftMargin(20);
$pdf->Cell(0, 9, 'DECISION', 0, 1, 'C');

$comment = "Mr. LE MEDECIN DIRECTEUR DE L HOPITAL MOHAMMED VI
-vu dahir n° 1.58.008 du 4Chaaban 1377 (24.2.58) portant statut general de la fonction publique.
-vu le Decret n° 1.0078.66 du 22 Chaoual 1386 (2.2.1967) portant statut particulier du personnel du Ministere de la sante.
-vu le Decret n°2.81.26 du 28 joumada 11402(25.3.1982) portant statut particulier des medecins, pharmacien, et chirurgiens-dentistes
-vu la circulaire n°7PE DU 20/01/1960 modifiee par la note n ° 4 DA-/CX du 7.1.1961 de Monsieur le Ministre de la sante publique relatives aux conges.
-Vu  Dahir n°1.11.10 du 14 Rabie Aoual 1432(18/02/2011) relatif a l application de la loi relative au statut general de la fonction publique.
-Vu la demande de conge presentee par l interesse(e)
";

$pdf->SetFont('Arial', '', 11);
$pdf->MultiCell(0, 10, $comment);
$pdf->Ln();

$nom = $ligne['nom'];
$cin = $ligne['cin'];
$prenom = $ligne['prenom'];
$nombreJour=$_GET['nombreJour'];
$annee=$_GET['annee'];
$date_conge = $_GET['date_conge'];

$pdf->SetFont('Arial', 'B', 14); // Set font to bold for the title
$pdf->Cell(0, 12, 'DECIDE', 0, 1, 'C');
$pdf->SetLeftMargin(15);
$pdf->SetFont('Arial', '', 12);

$pdf->Cell(0, 10, 'ARTICLE UNIQUE : conge annuel de ' . $nombreJour . ' jours ouvrables au titre de l annee  ' . $annee, 0, 1);
$pdf->SetFont('Arial', 'B', 12); // Définir la police en gras
$pdf->Cell(0, 10, 'Est accorde a : ' . $nom . '  ' . $prenom . ', CIN : ' . $cin, 0, 1);
$pdf->SetFont('Arial', '', 12); // Revenir à la police normale
$pdf->Cell(0, 10, 'A compter du ' . $date_conge, 0, 1);
$pdf->SetFont('Arial', '', 12); // Définir la police en gras
$pdf->Cell(0, 10, 'Pour en beneficier e l etranger', 0, 1);
$pdf->SetFont('Arial', '', 12); 
$comment2 = "AMPLIATIONS :
- Mr le delegue du Ministere de la sante
- Linteressee
- Dossier";

$pdf->SetFont('Arial', '', 11);
$pdf->Cell(0, 10, $comment2, 0, 1);

$pdf->Output();
?>