<?php
require('../fpdf181/fpdf.php');
include '../koneksi.php';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetTitle('Surat Kartu Indonesia Pintar');
$pdf->SetFont('Times','BU',16);
$pdf->Ln(18);
$pdf->Cell(200,10,'SURAT KARTU INDONESIA PINTAR',0,1,'C');
$pdf->SetFont('Times','',12);
$pdf->Cell(200,1,'Nomor. 440 /      - KL.HB',0,1,'C');
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
$data = mysqli_query($con,"SELECT b.nik, UPPER(b.nama), b.tempat, date_format(b.tgl_lahir,'%d-%m-%Y ') as tgl_lahir, b.jkel, b.alamat, b.kelurahan, b.kecamatan, b.kewarganegaraan, b.agama, b.status_perkawinan, b.pekerjaan, a.no_sku, a.nik_orang_tua,a.tgl_pengajuan FROM surat_kip a INNER JOIN warga b ON a.nik = b.nik WHERE a.no_sku='".$no_sku."'");


while ($row = mysqli_fetch_array($data))
{
    $no_sku = $row['no_sku'];
    $nama = $row['UPPER(b.nama)'];
    $tempat = $row['tempat'];
    $tgl_lahir = $row['tgl_lahir'];
    $jkel = $row['jkel'];
    $status_perkawinan = $row['status_perkawinan'];
    $kewarganegaraan = $row['kewarganegaraan'];
    $agama = $row['agama'];
    $pekerjaan = $row['pekerjaan'];
    $nik = $row['nik'];
    $alamat = $row['alamat'];
    $kelurahan = $row['kelurahan'];
    $kecamatan = $row['kecamatan'];
    $nik_orang_tua = $row['nik_orang_tua'];
    $tgl_pengajuan = $row['tgl_pengajuan'];

    // $nik_orang_tua = $_GET['nik_orang_tua'];
    // $data = mysqli_query($con,"SELECT b.nik, UPPER(b.nama), b.tempat, date_format(b.tgl_lahir,'%d-%m-%Y ') as tgl_lahir, b.jkel, b.alamat, b.kelurahan, b.kecamatan, b.kewarganegaraan, b.agama, b.status_perkawinan, b.pekerjaan, a.no_sku, a.nik_orang_tua,a.tgl_pengajuan FROM surat_kip a INNER JOIN warga b ON a.nik = b.nik WHERE a.nik_orang_tua='".$nik_orang_tua."'");
    $data = mysqli_query($con,"SELECT b.nik, UPPER(b.nama), b.tempat, date_format(b.tgl_lahir,'%d-%m-%Y ') as tgl_lahir, b.jkel, b.alamat, b.kelurahan, b.kecamatan, b.kewarganegaraan, b.agama, b.status_perkawinan, b.pekerjaan FROM  warga b  WHERE b.nik='".$nik_orang_tua."'");


    while ($row = mysqli_fetch_array($data)){

$pdf->SetLeftMargin(43);
$pdf->Ln(3);
$pdf->Cell(40,11,'Nama																															       :',0,1,'L');
// $pdf->SetFont('Times','B',12);
$pdf->Cell(104,-10,'                    '.$nama,0,1,'C');
$pdf->Ln(10);
$pdf->SetFont('Times','',12);
$pdf->Cell(100,2,'Tempat / tanggal Lahir				       :'.' '.$tempat.', '.$tgl_lahir,0,1,'L');
$pdf->Ln(0.5);
$pdf->Cell(40,10,'Jenis Kelamin																		       :'.' '.$jkel,0,1,'L');
$pdf->Ln(-3.5);
$pdf->Cell(40,11,'Status Perkawinan											       :'.' '.$status_perkawinan,0,1,'L');
$pdf->Ln(-3);
$pdf->Cell(40,8,'Kewarganegaraan / Agama    :'.'  '.$kewarganegaraan.' / '.$agama,0,1,'L');
$pdf->Cell(40,6,'Pekerjaan                                :'.' '.$pekerjaan,0,1,'L');
$pdf->Cell(40,9,'No. KTP / Domosili	     		       :'.' '.$nik,0,1,'L');
$pdf->Cell(40,6,'Alamat											                 	       :'.' '.$alamat,0,1,'L');
$pdf->Cell(173,3,'Kel. '.$kelurahan.' Kec. '.$kecamatan,0,1,'C');
$pdf->Cell(136,10,'Benar nama dan alamat tersebut di atas adalah warga Kelurahan Harapan Baru ',0,1,'C');
$pdf->Cell(122,1,'Kecamatan Bekasi Utara Kota Bekasi berdasarkan Surat Pengantar RT/RW setempat',0,1,'C');
$pdf->Cell(127,11,'No. 03/SP/RT.01/Rw.014/2019 dan pengakuan yang tersebut diatas menerangkan benar',0,1,'C');
$pdf->Ln(-10.5);
$pdf->Ln(5);
$pdf->Cell(98,12,'termasuk dalam keluarga kurang mampu, dan orang tua kandung dari :',0,1,'C');
$pdf->Ln(-6);
$pdf->Cell(40,11,'Nama																															       :',0,1,'L');
$pdf->Cell(104,-10,'                     '.$row['UPPER(b.nama)'],0,1,'C');
$pdf->Ln(9);
$pdf->Cell(100,2,'Tempat / tanggal Lahir				       :'.' '.$row['tempat'].', '.$row['tgl_lahir'],0,1,'L');
$pdf->Cell(40,10,'Jenis Kelamin																		       :'.' '.$row['jkel'],0,1,'L');
$pdf->Ln(-4);
$pdf->Cell(40,11,'Status Perkawinan											       :'.' '.$row['status_perkawinan'],0,1,'L');
$pdf->Ln(-3);
$pdf->Cell(40,7,'Kewarganegaraan / Agama    :'.' '.$row['kewarganegaraan'].' / '.$row['agama'],0,1,'L');
$pdf->Cell(40,6,'Pekerjaan                                :'.' '.$row['pekerjaan'],0,1,'L');
$pdf->Cell(40,7,'No. KTP / Domosili	     		       :'.' '.$row['nik'],0,1,'L');
$pdf->Cell(40,6,'Alamat											                 	       :'.' '.$row['alamat'],0,1,'L');
$pdf->Cell(173,3,'Kel. '.$row['kelurahan'].' Kec. '.$row['kecamatan'],0,1,'C');
$pdf->Cell(87,12,'Mengingat pentingnya surat keterangan ini dibuat',0,1,'C');
$pdf->SetFont('Times','BI',12);
$pdf->Cell(216,-12,'untuk pembuatan Kartu',0,1,'C');
$pdf->Ln(18);
$pdf->Cell(25,-12,'Indonesia Pintar ( KIP ),',0,1,'C');
$pdf->SetFont('Times','',12);
$pdf->Ln(11);
$pdf->Cell(169,-9,'bila di kemudian hari terdapat kekeliruan maka data akan',0,1,'C');
$pdf->Cell(100,21,'diperbaiki, atas perhatian dan kerjasamanya disampaikan terima kasih.',0,1,'C');
$pdf->Ln(-6);
$pdf->Cell(60,3,'Demikian agar menjadi maklum.',0,1,'C');
// $pdf->Ln(2);

$pdf->Cell(136,25,'Bekasi, '.$tanggal,0,1,'R');
$pdf->Cell(-5,-25,'yang bersangkutan,',0,1,'C');
$pdf->Cell(150,35,'LURAH HARAPAN BARU,',0,1,'R');
$pdf->SetFont('Times','B',12);
$pdf->Cell(-7,20,$nama,0,1,'C');
    }
}


$pdf->Output();
?>