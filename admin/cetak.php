
<?php
include "../assets/fpdf/fpdf.php";
include "../db/conn.php";

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 16);
$pdf->Image('../assets/Stock/SMK BISA V1.png', 10, 5, 25);
$pdf->Cell(0, 5, 'SEKOLAH MENENGAH KEJURUAN WIJAYA', '0', '1', 'C', false);
$pdf->SetFont('Arial', 'i', 8);
$pdf->Cell(0, 5, 'Alamat : Jl. Meikarta No.69 Meikarta City', '0', '1', 'C', false);
$pdf->Cell(0, 2, 'Code by Dwi Wijaya', '0', '1', 'C', false);
$pdf->Ln(3);
$pdf->Cell(190, 0.6, '', '0', '5', 'C', true);
$pdf->Ln(5);

$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(50, 5, 'DAFTAR PENERIMAAN SISWA ', '0', '1', 'L', false);
$pdf->Ln(3);

$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(8, 6, 'No.', '1', '0', 'C');
$pdf->Cell(15, 6, 'Nisn.', '1', '0', 'C');
$pdf->Cell(55, 6, 'Nama', '1', '0', 'C');
$pdf->Cell(19, 6, 'Jenis Kelamin', '1', '0', 'C');
$pdf->Cell(48, 6, 'Asal Sekolah', '1', '0', 'C');
$pdf->Cell(35, 6, 'Jurusan', '1', '0', 'C');
$pdf->Cell(10, 6, 'Nem', '1', '0', 'C');
$pdf->Ln(2);
$no = 0;
$sql = mysqli_query($conn, "select * from ppdb order by nim desc");
while ($data = mysqli_fetch_array($sql)) {
    $no++;
    $pdf->Ln(4);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(8, 4, $no, '1', '0', 'C');
    $pdf->Cell(15, 4, $data['nisn'], '1', '0', 'L');
    $pdf->Cell(55, 4, $data['nama'], '1', '0', 'L');
    $pdf->Cell(19, 4, $data['jenis_kelamin'], '1', '0', 'L');
    $pdf->Cell(48, 4, $data['asal_sekolah'], '1', '0', 'L');
    $pdf->Cell(35, 4, $data['jurusan'], '1', '0', 'L');
    $pdf->Cell(10, 4, $data['nim'], '1', '0', 'R');
}



$pdf->Output('data_siswaPPDB.pdf', 'D');
?>