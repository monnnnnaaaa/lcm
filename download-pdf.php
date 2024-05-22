<?php
require('fpdf/fpdf.php');
require 'db_conn.php';

if (!isset($_GET['id'])) {
    die("Quotation ID is required.");
}

$quotation_id = $_GET['id'];

$query = "SELECT * FROM quotation_list WHERE id = $quotation_id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {
    die("Quotation not found.");
}

$quotation = mysqli_fetch_assoc($result);

class PDF extends FPDF
{
    var $items;

    function Header()
    {
        global $quotation;
        
        // Image
        $this->Image('img/logo.png', 10, 10, 30);
        
        $this->SetFont('Arial', '', 12);
        $this->SetXY(45, 12);
        $this->Cell(0, 5, 'LCM Light Control Machine and Board Enterprises', 0, 1);
        $this->SetX(45);
        $this->Cell(0, 5, 'Main Office: 1271 Real St. Milagrosa, Carmona Cavite Mobile No.: 0992-420-3273', 0, 1);
        $this->SetX(45);
        $this->Cell(0, 5, '/0917-122-6949 / Landline: (046) 890 1996 / Email: LCM.JupiterPalma@gmail.com', 0, 1);
        $this->SetFont('Arial', 'B', 12);
        $this->SetX(45);
        $this->Cell(0, 5, 'Branch Office: ____________________________________________________', 0, 1);

        // Gray thick line
        $this->SetY(40);
        $this->SetDrawColor(169, 169, 169);
        $this->SetLineWidth(1.9);
        $this->Line(10, $this->GetY(), 200, $this->GetY());
        
        // Quotation number and date
        $this->SetY($this->GetY() + 5);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 5, 'Quotation Number: ' . $quotation['quotation_num'], 0, 0, 'L');
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 5, 'Quotation Date: ' . date('m/d/Y', strtotime($quotation['quotation_date'])), 0, 1, 'R');

        // Thin line
        $this->SetY($this->GetY() + 5);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(0.2);
        $this->Line(10, $this->GetY(), 200, $this->GetY());

        // Quotation for and Billing address
        $this->SetY($this->GetY() + 8);
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 5, 'Quotation for:', 0, 0, 'L');
        $this->Cell(0, 5, 'Billing Address:', 0, 1, 'R');

        $this->SetY($this->GetY() + 3);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 5, $quotation['quotation_for'], 0, 0, 'L');
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 5, $quotation['quotation_billing'], 0, 1, 'R');

        // Quotation expires
        $this->SetY($this->GetY() + 15);
        $this->Cell(0, 5, 'Quotation Expires: ' . date('m/d/Y', strtotime($quotation['quotation_expires'])), 0, 1, 'L');

    }

    function Table()
    {
        global $conn, $quotation;
    
        // Column widths
        $this->SetY($this->GetY() + 5);
        $widths = array(30, 70, 20, 15, 15, 20, 20);
        
        // Set fill color for the header row (gray)
        $this->SetFillColor(200, 200, 200);
    
        // Table header
        $headerHeight = 10;
        $this->SetFont('Arial', 'B', 11);
        $header = array('', 'Description', 'Item #', 'Qty', 'Unit', 'Unit Price', 'Amount');
        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($widths[$i], $headerHeight, $header[$i], 0, 0, 'C', true);
        }
        $this->Ln();
        
        // Table body
        $this->SetY($this->GetY() + 3);
        $this->SetFont('Arial', '', 10);

        // Retrieve all products associated with the same quotation number
        $quotationNum = $quotation['quotation_num'];
        $productQuery = "SELECT * FROM quotation_list WHERE quotation_num = '$quotationNum'";
        $productResult = mysqli_query($conn, $productQuery);

        // Loop through each product and add it to the table
        while ($product = mysqli_fetch_assoc($productResult)) {
            $this->Cell($widths[0], 30, $this->Image('img/' . $product['quotation_pimage'], $this->GetX(), $this->GetY(), 30), 0);
            // Save current position
            $startX = $this->GetX();
            $startY = $this->GetY();
            // Move to next cell
            $this->SetXY($startX + 5, $startY);
            // Reduce margin top for the first cell
            $this->MultiCell($widths[1], 10, $product['quotation_item'] . "\n" . $product['quotation_description'], 0);
            // Restore original position and move to next cell
            $this->SetXY($startX + $widths[0], $startY);
            $this->SetX($this->GetX() + 45);
            $this->Cell($widths[2], 30, $product['quotation_product'], 0);
            $this->Cell($widths[3], 30, $product['quotation_qty'], 0);
            $this->Cell($widths[4], 30, $product['quotation_unit'], 0);
            $this->Cell($widths[5], 30, $product['quotation_uprice'], 0);
            $this->Cell($widths[6], 30, $product['quotation_amount'], 0);
           
            $this->Ln();
        }
        
        // Thin line
        // Lines to separate computation section from the table
        $this->SetY($this->GetY() + 50);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(0.2);
        $this->Line(10, $this->GetY(), 200, $this->GetY());

        // Computation part design
        $this->SetFont('Arial', 'B', 12);
        $this->SetXY(130, $this->GetY() + 5);
        $this->Cell(40, 7, 'Subtotal:', 0, 0, 'R');
        $this->Cell(20, 7, $quotation['quotation_stotal'], 0, 1, 'R');

        $this->SetFont('Arial', '', 12);
        $this->SetX(130);
        $this->Cell(40, 7, 'VAT (7%):', 0, 0, 'R');
        $this->Cell(20, 7, $quotation['quotation_vat'], 0, 1, 'R');

        $this->SetX(130);
        $this->Cell(40, 7, 'Charge:', 0, 0, 'R');
        $this->Cell(20, 7, $quotation['quotation_charge'], 0, 1, 'R');

        $this->SetFont('Arial', 'B', 12);
        $this->SetX(130);
        $this->Cell(40, 7, 'Grand Total:', 0, 0, 'R');
        $this->Cell(20, 7, $quotation['quotation_grandtotal'], 0, 1, 'R');
    }

    function Footer()
    {
        // Page number
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

// Create instance of PDF class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// Call the Table function to create the table
$pdf->Table();

// Save PDF
$pdf->Output();
?>
