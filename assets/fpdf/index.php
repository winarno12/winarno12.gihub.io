<?php 
require "fpdf.php";


$pdf = new FPDF();
$pdf -> AliasNbPages();
$pdf ->addPage('L','A4','0');
$pdf -> Output();


