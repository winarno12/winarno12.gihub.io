
<?php
session_start();
include "../assets/fpdf/fpdf.php";
include "../db/conn.php";

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 16);
$pdf->Image('../assets/Stock/SMK BISA V1.png', 10, 5, 25);
$pdf->Cell(0, 5, 'SEKOLAH MENENGAH KEJURUAN WIJAYA', '0', '1', 'C', false);
$pdf->SetFont('Arial', 'i', 8);
$pdf->Cell(0, 5, 'Alamat : Jl. Meikarta No.69, Districk F, Meikarta City', '0', '1', 'C', false);
$pdf->Cell(0, 2, 'Code by Dwi Wijaya', '0', '1', 'C', false);
$pdf->Ln(3);
$pdf->Cell(190, 0.6, '', '0', '5', 'C', true);
$pdf->Ln(2);

$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(0, 5, 'BUKTI PENDAFTARAN', '0', '1', 'C', false);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(0, 4, 'PPDB SEKOLAH MENENGAH KEJURUAN WJAYA ', '0', '1', 'C', false);
$pdf->Ln(3);


$nisn = $_SESSION["nisn"];
$data = mysqli_query($conn, "SELECT * FROM ppdb WHERE nisn=$nisn");
$hasil = mysqli_fetch_array($data);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(50, 5, "NISN : ", '0', '1', 'L', false);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 5, @$hasil[1], '0', '1', 'L', false);
$pdf->Ln(3);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(50, 5, "Nama Siswa : ", '0', '1', 'L', false);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 5, @$hasil[2], '0', '1', 'L', false);
$pdf->Ln(3);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(50, 5, "Jenis Kelamin : ", '0', '1', 'L', false);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 5, @$hasil[3], '0', '1', 'L', false);
$pdf->Ln(3);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(50, 5, "Tanggal Lahir : ", '0', '1', 'L', false);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 5, @$hasil[4], '0', '1', 'L', false);
$pdf->Ln(3);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(50, 5, "Alamat : ", '0', '1', 'L', false);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 5, @$hasil[5], '0', '1', 'L', false);
$pdf->Ln(3);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(50, 5, "Asal Sekolah : ", '0', '1', 'L', false);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 5, @$hasil[6], '0', '1', 'L', false);
$pdf->Ln(3);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(50, 5, "Pilihan Jurusan : ", '0', '1', 'L', false);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 5, @$hasil[7], '0', '1', 'L', false);
$pdf->Ln(3);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(50, 5, "Nem : ", '0', '1', 'L', false);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 5, @$hasil[8], '0', '1', 'L', false);
$pdf->Ln(3);

$pdf->Cell(190, 0.6, '', '0', '5', 'C', true);
$pdf->Ln(2);

$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(50, 5, "Catatan Daftar Ulang ; ", '0', '1', 'L', false);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(50, 5, "1. Daftar ulang diadakan pada tanggal 31 Juli (08.00 - 15.00) diadakan di tempat(sekolah) ", '0', '1', 'L', false);
$pdf->Cell(50, 5, "2. Pendaftar Ulang harus membawa dokumen-dokumen seperti : ", '0', '1', 'L', false);
$pdf->Cell(50, 5, "        1.Fotocopy Kartu Keluarga ", '0', '1', 'L', false);
$pdf->Cell(50, 5, "        2.Fotocopy Akte Kelahiran ", '0', '1', 'L', false);
$pdf->Cell(50, 5, "        3.Fotocopy SKHU ", '0', '1', 'L', false);
$pdf->Cell(50, 5, "3. Pendaftar dsufnsa saufdbsebebfi uisefbsb  seufbsefbsefs usbfsebfs ashebf ", '0', '1', 'L', false);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(50, 5, "Simpan Bukti Pendaftaran ini dengan baik", '0', '1', 'L', false);

$pdf->Output('bukti_pendaftaran.pdf', 'D');
?>