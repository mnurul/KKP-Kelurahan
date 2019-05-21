<?php
require('../fpdf181/fpdf.php');
include '../koneksi.php';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetTitle('Surat Keterangan Catatan Kepolisian');
$pdf->SetFont('Times','BU',16);
$pdf->Ln(23);
$pdf->Cell(200,10,'SURAT KETERANGAN CATATAN KEPOLISIAN',0,1,'C');
$pdf->SetFont('Times','',12);
$pdf->Cell(200,1,'Nomor. 331 /      / Kl.HB',0,1,'C');
$pdf->Ln(5);
$pdf->Cell(200,10,'Yang bertanda tangan dibawah ini Lurah Kelurahan Harapan Baru Kecamatan',0,1,'C');
$pdf->SetLeftMargin(30);
$pdf->Cell(290,1,'Bekasi Utara Kota Bekasi menerangkan :',0,1,'L');

$bulan = array ("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober",       "November","Desember");
$waktu[1]=date("d",time());
$waktu[2]=date("m",time());
$waktu[3]=date("Y",time());
$waktu[4]=$waktu[3] + 1;
$tanggal="$waktu[1] ".$bulan[$waktu[2]-1]." $waktu[3]";
$tanggal2="$waktu[1] ".$bulan[$waktu[2]-1]." $waktu[4]";

$no_sku = $_GET['no_sku'];
$data = mysqli_query($con,"SELECT warga.nik, UPPER(warga.nama), warga.tempat, date_format(warga.tgl_lahir,'%d-%m-%Y ') as tgl_lahir, warga.jkel, warga. alamat, warga. kewarganegaraan, warga. agama, warga.kelurahan, warga.kecamatan, warga.kota, warga.status_perkawinan, warga.pekerjaan, skck.no_sku, skck.maksud_tujuan, skck.tgl_pengajuan FROM skck INNER JOIN warga ON skck.nik = warga.nik WHERE skck.no_sku='".$no_sku."'");
while ($row = mysqli_fetch_array($data))
{
     
$pdf->SetLeftMargin(43);
$pdf->Ln(3);
$pdf->Cell(40,10,'Nama																															:',0,1,'L');
$pdf->SetFont('Times','B',12);
$pdf->Cell(104,-10,$row['UPPER(warga.nama)'],0,1,'C');
$pdf->Ln(10);
$pdf->SetFont('Times','',12);
$pdf->Cell(100,2,'Tempat / tanggal Lahir				:'.' '.$row['tempat'].', '.$row['tgl_lahir'],0,1,'L');
$pdf->Ln(0.5);
$pdf->Cell(40,10,'Jenis Kelamin																		:'.' '.$row['jkel'],0,1,'L');
$pdf->Ln(-3.5);
$pdf->Cell(40,10,'Status Perkawinan											:'.' '.$row['status_perkawinan'],0,1,'L');
$pdf->Cell(40,2,'Bangsa / Agama										  		:'.' '.$row['kewarganegaraan'].' / '.$row['agama'],0,1,'L');
$pdf->Cell(40,9,'Pekerjaan                         :'.' '.$row['pekerjaan'],0,1,'L');
$pdf->Cell(40,3,'No. KTP / Domosili	     		:'.' '.$row['nik'],0,1,'L');
$pdf->Cell(40,9,'Alamat											                 	:'.' '.$row['alamat'],0,1,'L');
$pdf->Cell(158,3,'Kel. '.$row['kelurahan'].' Kec. '.$row['kecamatan'],0,1,'C');
$pdf->Ln(3);
$pdf->Cell(40,3,'Maksud dan Tujuan	     		:',0,1,'L');
$pdf->SetFont('Times','BI',12);
$pdf->Cell(157,-3,' '.'--'.' '.$row['maksud_tujuan'].' '.'--',0,1,'C');
$pdf->Ln(8);
$pdf->SetFont('Times','',12);
$pdf->Cell(138,11,'Bahwa nama di atas benar penduduk tetap Kelurahan Harapan Baru Kecamatan ',0,1,'C');
$pdf->Cell(142,5,'Bekasi Utara, dan berdasarkan surat pengantar RT/RW setempat No 535/RT.03/RW.03/II/2019,',0,1,'C');
$pdf->Cell(144,11,'dan pengakuan yang bersangkutan berkelakuan baik dan belum pernah tersangkut dalam perkara ',0,1,'C');
$pdf->Cell(27,5,'pidana/tindak kriminal, dan',0,1,'C');
$pdf->SetFont('Times','BI',12);
$pdf->Cell(183,-5,'di pergunakan untuk pembuatan Surat Keterangan Catatan ',0,1,'C');
$pdf->Cell(38,22,'Kepolisian (SKCK) di kepolisian.',0,1,'C');
$pdf->SetFont('Times','',12);
$pdf->Ln(0);
$pdf->Cell(149,7,'Demikian Surat Keterangan ini dibuat bilamana di kemudian hari terdapat kekeliruan',0,1,'C');
$pdf->Cell(133,8,'data akan di adakan, perbaikan, atas perhatian dan kerjasamanya di ucapkan terima kasih.',0,1,'C');

$pdf->Cell(136,25,'Bekasi, '.$tanggal,0,1,'R');
$pdf->Cell(-5,-25,'yang bersangkutan,',0,1,'C');
$pdf->Cell(150,35,'LURAH HARAPAN BARU,',0,1,'R');
$pdf->SetFont('Times','B',12);
$pdf->Cell(-7,20,$row['UPPER(warga.nama)'],0,1,'C');
}


$pdf->Output();
?>