<?php
require('../fpdf181/fpdf.php');
include '../koneksi.php';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetTitle('Surat Keterangan Usaha');
$pdf->SetFont('Times','BU',16);
$pdf->Ln(20);
$pdf->Cell(200,10,'SURAT KETERANGAN USAHA',0,1,'C');
$pdf->SetFont('Times','',12);
$pdf->Cell(200,1,'Nomor. 517 /      / Kl.HB',0,1,'C');
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
// $tanggal1="$waktu[1] ".$bulan[$waktu[2]+2]." $waktu[3]";

$no_sku = $_GET['no_sku'];
$data = mysqli_query($con,"SELECT warga.nik, UPPER(warga.nama), warga.tempat, date_format(warga.tgl_lahir,'%d-%m-%Y ') as tgl_lahir, warga.jkel, warga. alamat, warga.kewarganegaraan, warga.agama, warga.kelurahan, warga.kecamatan, warga.kota, surat_ket_usaha.no_sku, UPPER(surat_ket_usaha.jenis_usaha), surat_ket_usaha.alamat_usaha, surat_ket_usaha.kelurahan_usaha, surat_ket_usaha.kecamatan_usaha, surat_ket_usaha.kota_usaha, surat_ket_usaha.tgl_pengajuan FROM surat_ket_usaha INNER JOIN warga ON surat_ket_usaha.nik = warga.nik WHERE surat_ket_usaha.no_sku='".$no_sku."'");
while ($row = mysqli_fetch_array($data))
{
    // $pdf->Cell(20,6,$row['nim'],1,0);
    // $pdf->Cell(85,6,$row['nama_lengkap'],1,0);
    // $pdf->Cell(27,6,$row['no_hp'],1,0);
    // $pdf->Cell(25,6,$row['tanggal_lahir'],1,1); 


$pdf->SetLeftMargin(43);
$pdf->Ln(3);
$pdf->Cell(40,10,'Nama																															:',0,1,'L');
$pdf->SetFont('Times','B',12);
$pdf->Cell(107,-10,$row['UPPER(warga.nama)'],0,1,'C');
$pdf->Ln(10);
$pdf->SetFont('Times','',12);
$pdf->Cell(100,2,'Tempat / tanggal Lahir				:'.' '.$row['tempat'].', '.$row['tgl_lahir'],0,1,'L');
$pdf->Cell(40,10,'Jenis Kelamin																		:'.' '.$row['jkel'],0,1,'L');
$pdf->Cell(40,2,'Kewarganegaraan												:'.' '.$row['kewarganegaraan'],0,1,'L');
$pdf->Cell(40,9,'Agama                             :'.' '.$row['agama'],0,1,'L');
$pdf->Cell(40,3,'No. NIK							                				:'.' '.$row['nik'],0,1,'L');
$pdf->Cell(40,9,'Alamat											                 	:'.' '.$row['alamat'],0,1,'L');
$pdf->Cell(158,3,'Kel. '.$row['kelurahan'].' Kec. '.$row['kecamatan'],0,1,'C');
$pdf->Ln(1);
$pdf->Cell(143,10,'Bahwa nama dan alamat tersebut diatas berdasarkan keterangan dari Ketua RT/RW',0,1,'C');
$pdf->Cell(120,1,'setempat, serta pengakuan yang bersangkutan pada saat sekarang mempunyai usaha :',0,1,'C');
$pdf->Ln(3);
$pdf->Cell(40,10,'Jenis Usaha                      :',0,1,'L');
$pdf->SetFont('Times','B',12);
$pdf->Cell(130,-10,'         "'.$row['UPPER(surat_ket_usaha.jenis_usaha)'].'"',0,1,'C');
$pdf->Ln(10);
$pdf->SetFont('Times','',12);
$pdf->Cell(100,2,'Alamat Usaha               			:'.'            '.$row['alamat_usaha'],0,1,'L');
$pdf->Cell(203,9,'Kel. '.$row['kelurahan_usaha'].' Kec. '.$row['kecamatan_usaha'].' Kota. '.$row['kota_usaha'],0,1,'C');
// $pdf->Ln(5);
$pdf->Cell(40,3,'Masa Berlaku					 													:',0,1,'L');
$pdf->Cell(166,-4,$tanggal. ' s.d.'.$tanggal2,0,1,'C');
$pdf->Ln(8);
$pdf->SetFont('Times','',11);
$pdf->Ln(3);
$pdf->Cell(142,4,'Surat Keterangan Usaha (SKU) ini merupakan izin usaha, maka setiap pelaku usaha wajib',0,1,'C');
$pdf->Cell(130,5,'mengurus izin usaha dan izin lainnya berdasarkan surat keterangan ini sesuai yang diatur oleh Pemerintah Kota',0,1,'C');
$pdf->Cell(-31,5,'Bekasi;',0,1,'C');
$pdf->Cell(128,10,'1.   Setiap pelaku usaha dilarang melakukan segala bentuk kegiatan usaha yang bertentangan dengan hukum',0,1,'C');
$pdf->Cell(132,-1,'yang berlaku di Pemerintah Kota Bekasi, serta bersedia jika dikemudian hari diperiksa atau didata oleh',0,1,'C');
$pdf->Cell(78,10,'petugas dari Instansi terkait yang berada di Pemerintah Kota Bekasi;',0,1,'C');
$pdf->Cell(131,1,'2.   Apabila dikemudian hari usaha yang dimaksud terjadi penyimpangan usaha dan terjadi tuntutan dari pihak',0,1,'C');
$pdf->Cell(126,9,'ketiga (masyarakat / lembaga lain) yang merasa dirugikan atau keberatan, maka segala konsekuensi',0,1,'C');
$pdf->Cell(126,1,'menjadi tanggung jawab pelaku usaha sepenuhnya, dan Surat Keterangan Usaha (SKU) ini menjadi',0,1,'C');
$pdf->Cell(11,9,'gugur dengan sendirinya;',0,1,'C');
$pdf->Cell(134,3,'3.   Setiap pelaku usaha wajib menjaga Kebersihan, Ketertiban dan Keindahan (K3) dilingkungan tempat usaha;',0,1,'C');
$pdf->SetFont('Times','',12);
$pdf->Cell(70,8,'Demikian agar menjadi maklum adanya.',0,1,'C');
// $pdf->Cell(143,25,'Bekasi, 18 Februari 2019',0,1,'R');

$pdf->Cell(136,25,'Bekasi, '.$tanggal,0,1,'R');
$pdf->Cell(-5,-25,'yang bersangkutan,',0,1,'C');
$pdf->Cell(150,35,'LURAH HARAPAN BARU,',0,1,'R');
// $pdf->Cell(107,-10,$row['nama'],0,1,'C');
$pdf->SetFont('Times','B',12);
$pdf->Cell(-7,20,$row['UPPER(warga.nama)'],0,1,'C');
}


$pdf->Output();
?>