<?php
require('../fpdf181/fpdf.php');
include '../koneksi.php';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetTitle('Surat Keterangan Numpang Nikah');
$pdf->SetFont('Times','BU',16);
$pdf->Ln(23);
$pdf->Cell(200,10,'SURAT KETERANGAN NUMPANG NIKAH',0,1,'C');
$pdf->SetFont('Times','',12);
$pdf->Cell(200,1,'Nomor. 474.4 /      - Kl.HB',0,1,'C');
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
$data = mysqli_query($con,"SELECT b.nik, UPPER(b.nama), b.tempat, date_format(b.tgl_lahir,'%d-%m-%Y ') as tgl_lahir, b.jkel, b.alamat, b.kelurahan, b.kecamatan, b.kewarganegaraan, b.agama, b.status_perkawinan, b.pekerjaan, a.no_sku, a.nama_mempelai, a.alamat_mempelai, a.kelurahan_mempelai, a.kecamatan_mempelai, a.kabupaten_mempelai,a.tgl_pengajuan FROM surat_numpang_nikah a INNER JOIN warga b ON a.nik = b.nik WHERE a.no_sku='".$no_sku."'");
while ($row = mysqli_fetch_array($data))
{
     
$pdf->SetLeftMargin(43);
$pdf->Ln(3);
$pdf->Cell(40,11,'Nama																															:',0,1,'L');
$pdf->SetFont('Times','B',12);
$pdf->Cell(104,-10,'        '.$row['UPPER(b.nama)'],0,1,'C');
$pdf->Ln(10);
$pdf->SetFont('Times','',12);
$pdf->Cell(100,2,'Tempat / tanggal Lahir				:'.' '.$row['tempat'].', '.$row['tgl_lahir'],0,1,'L');
$pdf->Ln(0.5);
$pdf->Cell(40,10,'Jenis Kelamin																		:'.' '.$row['jkel'],0,1,'L');
$pdf->Ln(-3.5);
$pdf->Cell(40,11,'Status Perkawinan											:'.' '.$row['status_perkawinan'],0,1,'L');
$pdf->Ln(-2);
$pdf->Cell(40,6,'Kewarganegaraan											 :'.' '.$row['kewarganegaraan'],0,1,'L');
$pdf->Cell(40,8,'Agama										 		                :'.' '.$row['agama'],0,1,'L');
$pdf->Cell(40,6,'Pekerjaan                         :'.' '.$row['pekerjaan'],0,1,'L');
$pdf->Cell(40,9,'No. KTP / Domosili	     		:'.' '.$row['nik'],0,1,'L');
$pdf->Cell(40,6,'Alamat											                 	:'.' '.$row['alamat'],0,1,'L');
$pdf->Cell(158,3,'Kel. '.$row['kelurahan'].' Kec. '.$row['kecamatan'],0,1,'C');
$pdf->Cell(144,15,'Menerangkan bahwa nama dan alamat tersebut diatas adalah warga Kelurahan kami',0,1,'C');
$pdf->Cell(138,-1,'berdasarkan keterangan RT dan RW setempat No. 04/SP/RT.11/RW.014/2019 dan pengakuan',0,1,'C');
$pdf->Cell(33,16,'yang bersangkutan benar bahwa',0,1,'C');
$pdf->SetFont('Times','BI',12);
$pdf->Ln(-10.5);
$pdf->Cell(195,5,'Sampai dengan saat ini Belum Pernah Menikah dan akan  ',0,1,'C');
$pdf->Ln(3);
$pdf->Cell(123,4,'menikah dengan '.$row['nama_mempelai'].' numpang nikah di alamat : '.' '.$row['alamat_mempelai'],0,1,'C');
$pdf->Cell(78,11,'Kel. '.$row['kelurahan_mempelai'].' Kec. '.' '.$row['kecamatan_mempelai'].' Kabupaten '.$row['kabupaten_mempelai'].'.',0,1,'C');
$pdf->SetFont('Times','',12);
$pdf->Ln(4);
$pdf->Cell(149,-0.5,'Mengingat pentingnya surat keterangan ini, maka dibuat dengan sesungguhnya untuk ',0,1,'C');
$pdf->Cell(38,15,'dipergunakan sebagaimanamestinya.',0,1,'C');
$pdf->Ln(-3);
$pdf->Cell(60,7,'Demikian agar menjadi maklum.',0,1,'C');
// $pdf->Ln(2);

$pdf->Cell(136,25,'Bekasi, '.$tanggal,0,1,'R');
$pdf->Cell(-5,-25,'yang bersangkutan,',0,1,'C');
$pdf->Cell(150,35,'LURAH HARAPAN BARU,',0,1,'R');
$pdf->SetFont('Times','B',12);
$pdf->Cell(-7,20,$row['UPPER(b.nama)'],0,1,'C');
}


$pdf->Output();
?>