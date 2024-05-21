<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
    var $items;

    function Header()
    {
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
        $this->Cell(0, 5, 'Quotation Number: 28815', 0, 0, 'L');
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 5, 'Quotation Date: May 21, 2024', 0, 1, 'R');
        
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
        $this->Cell(0, 5, 'BRGY BULIHAN, SILANG, CAVITE', 0, 0, 'L');
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 5, 'BRGY BULIHAN, SILANG, CAVITE', 0, 1, 'R');

        // Quotation expires
        $this->SetY($this->GetY() + 15);
        $this->Cell(0, 5, 'Quotation Expires: May 30, 2024', 0, 1, 'L');
    }

    function Table()
    {
        // Column widths
        $this->SetY($this->GetY() + 5);
        $widths = array(30, 70, 20, 15, 15, 20, 20);
        
        // Set fill color for the header row (gray)
        $this->SetFillColor(200, 200, 200);

        // Table header
        $headerHeight = 10;
        $this->SetFont('Arial', 'B', 11);
        $header = array('Image', 'Description', 'Item #', 'Qty', 'Unit', 'Unit Price', 'Amount');
        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($widths[$i], $headerHeight, $header[$i], 0, 0, 'C', true);
        }
        $this->Ln();

        // Table body
        $this->SetY($this->GetY() + 3);
        $this->SetFont('Arial', '', 10);
        foreach ($this->items as $row) {
            // Image column
            $this->Cell($widths[0], 30, $this->Image($row['image_path'], $this->GetX(), $this->GetY(), 30), 0);
            
            // Text columns
            $this->Cell($widths[1], 30, $row['description'], 0);
            $this->Cell($widths[2], 30, $row['item_number'], 0);
            $this->Cell($widths[3], 30, $row['qty'], 0);
            $this->Cell($widths[4], 30, $row['unit'], 0);
            $this->Cell($widths[5], 30, $row['unit_price'], 0);
            $this->Cell($widths[6], 30, $row['amount'], 0);
            
            $this->Ln();
        }

         // Thin line
        // Lines to separate computation section from the table
            $this->SetY($this->GetY() + 2);
            $this->SetDrawColor(0, 0, 0);
            $this->SetLineWidth(0.2);
            $this->Line(10, $this->GetY(), 200, $this->GetY());

            // Computation part design
            $this->SetFont('Arial', 'B', 12);
            $this->SetXY(130, $this->GetY() + 5);
            $this->Cell(40, 7, 'Subtotal:', 0, 0, 'R');
            $this->Cell(20, 7, '2,000.00', 0, 1, 'R');

            $this->SetFont('Arial', '', 12);
            $this->SetX(130);
            $this->Cell(40, 7, 'VAT (7%):', 0, 0, 'R');
            $this->Cell(20, 7, '140.00', 0, 1, 'R');

            $this->SetX(130);
            $this->Cell(40, 7, 'Charge:', 0, 0, 'R');
            $this->Cell(20, 7, '100.00', 0, 1, 'R');

            $this->SetFont('Arial', 'B', 12);
            $this->SetX(130);
            $this->Cell(40, 7, 'Grand Total:', 0, 0, 'R');
            $this->Cell(20, 7, '2,240.00', 0, 1, 'R');

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

// Example data for table
$pdf->items = array(
    array(
        'image_path' => 'img/logo.png',
        'description' => 'Item 1 Description',
        'item_number' => '001',
        'qty' => '10',
        'unit' => 'pcs',
        'unit_price' => '100',
        'amount' => '1000'
    ),
    array(
        'image_path' => 'img/logo.png',
        'description' => 'Item 2 Description',
        'item_number' => '002',
        'qty' => '5',
        'unit' => 'pcs',
        'unit_price' => '200',
        'amount' => '1000'
    )
);

// Call the Table function to create the table
$pdf->Table();

// Save PDF
$pdf->Output();
?>
