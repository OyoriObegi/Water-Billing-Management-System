<?php
// Connect to the database
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "wbms";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get user details from the database
$user_id = 33; // Replace with the actual user ID
$sql = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

// Get billing information from the database
$billing_id = 345; // Replace with the actual billing ID
$sql = "SELECT * FROM billing WHERE id = $billing_id";
$result = mysqli_query($conn, $sql);
$billing = mysqli_fetch_assoc($result);

// Create PDF document
require('fpdf.php');

// Initialize PDF document
$pdf = new FPDF();
$pdf->AddPage();

// Set font and font size
$pdf->SetFont('Arial','B',16);

// Add custom header
$pdf->Cell(0,10,'Custom Invoice Header',0,1,'C');

// Add billing information
$pdf->Cell(0,10,'Bill ID: '.$billing['bill_id'],0,1);
$pdf->Cell(0,10,'Date: '.$billing['due_date'],0,1);
$pdf->Ln(10);

// Add user information
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,10,'Billing Information',0,1);
$pdf->Cell(0,10,'Name: '.$user['fullname'],0,1);
$pdf->Cell(0,10,'Email: '.$user['email'],0,1);
$pdf->Cell(0,10,'Address: '.$user['address'],0,1);
$pdf->Ln(10);

// Add billing details
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10,'Order Details',0,1);
$pdf->Cell(0,10,'Order ID: '.$billing['bill_id'],0,1);
$pdf->Cell(0,10,'Product Name: '.$billing['product_name'],0,1);
$pdf->Cell(0,10,'Price: $'.$billing['price'],0,1);
$pdf->Cell(0,10,'Quantity: '.$billing['quantity'],0,1);
$pdf->Cell(0,10,'Total Price: $'.($billing['price'] * $billing['quantity']),0,1);

// Add custom footer
$pdf->SetFont('Arial','I',10);
$pdf->SetY(-15);
$pdf->Cell(0,10,'Custom Invoice Footer',0,0,'C');

// Output PDF document
$pdf->Output();

mysqli_close($conn);
?>
