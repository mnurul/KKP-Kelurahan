<?php
require('../fpdf181/fpdf.php');
include '../koneksi.php';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetTitle('Surat Izin Rame Rame');
$pdf->SetFont('Times','BU',16);
$pdf->Ln(10);
$pdf->Cell(200,10,'SURAT KETERANGAN IZIN RAME-RAME',0,1,'C');
$pdf->SetFont('Times','',12);
$pdf->Cell(200,1,'Nomor. 453 /      / Kl.HB',0,1,'C');
$pdf->Ln(3);
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
$data = mysqli_query($con,"SELECT b.nik, UPPER(b.nama), b.tempat, date_format(b.tgl_lahir,'%d-%m-%Y ') as tgl_lahir, b.jkel, b.alamat, b.kelurahan, b.kecamatan, b.kewarganegaraan, b.agama, b.status_perkawinan, b.pekerjaan, a.no_sku, a.tujuan_acara, date_format(a.tgl_acara,'%d %b %Y ') as tgl_acara, a.hari_acara,a.jam_acara, a.nama_acara,a.tgl_pengajuan FROM surat_izin_rame_rame a INNER JOIN warga b ON a.nik = b.nik WHERE a.no_sku='".$no_sku."'");
while ($row = mysqli_fetch_array($data))
{
     
$pdf->SetLeftMargin(43);
$pdf->Ln(3);
$pdf->Cell(40,10,'Nama																															     :',0,1,'L');
$pdf->SetFont('Times','B',12);
$pdf->Cell(104,-10,'            '.$row['UPPER(b.nama)'],0,1,'C');
$pdf->Ln(10);
$pdf->SetFont('Times','',12);
$pdf->Cell(100,2,'Tempat dan tanggal Lahir				:'.' '.$row['tempat'].', '.$row['tgl_lahir'],0,1,'L');
$pdf->Ln(0.5);
$pdf->Cell(40,10,'Jenis Kelamin																		     :'.' '.$row['jkel'],0,1,'L');
$pdf->Ln(-3.5);
$pdf->Cell(40,10,'Status Perkawinan											     :'.' '.$row['status_perkawinan'],0,1,'L');
$pdf->Cell(40,2,'Bangsa dan Agama										  		 :'.' '.$row['kewarganegaraan'].' / '.$row['agama'],0,1,'L');
$pdf->Cell(40,10,'Pekerjaan                              :'.' '.$row['pekerjaan'],0,1,'L');
$pdf->Cell(40,3,'NIK	     		                               :'.' '.$row['nik'],0,1,'L');
$pdf->Cell(40,9,'Alamat											                 	     :'.' '.$row['alamat'],0,1,'L');
$pdf->Cell(168,3,'Kel. '.$row['kelurahan'].' Kec. '.$row['kecamatan'],0,1,'C');
// $pdf->Ln(3);
$pdf->Cell(152,9,'Bahwa nama dan alamat tersebut di atas bermaksud mengadakan rame rame untuk acara',0,1,'C');
$pdf->SetFont('Times','BI',12);
$pdf->Ln(-1);
$pdf->Cell(-1,3,$row['tujuan_acara'].'.',0,1,'C');
$pdf->SetFont('Times','',12);
$pdf->Cell(40,10,'Pada Tanggal																									:'.' '.$row['tgl_acara'],0,1,'L');
$pdf->Cell(100,2,'Hari				                                    :'.' '.$row['hari_acara'],0,1,'L');
$pdf->Cell(40,10,'Jam																		                       :'.' '.$row['jam_acara'].' Wib s/d Selesai',0,1,'L');
$pdf->Ln(-3.5);
$pdf->Cell(40,10,'Hiburan											                       :'.' '.$row['nama_acara'],0,1,'L');
$pdf->Cell(153,5,'Dengan ini menerangkan bahwa pada perinsipnya kami tidak keberatan atas permohonan',0,1,'C');
$pdf->Cell(72,5,'yang bersangkutan, dengan ketentuan sebagai berikut :',0,1,'C');
$pdf->Ln(1);
$pdf->Cell(137,10,'1.   Pada waktu dilaksanakan, rame rame harus disertai dengan ketentraman dan',0,1,'C');
$pdf->Cell(150,-1,'ketertiban lingkungan, dan menghargai waktu-waktu ibadah dalam menciptakan',0,1,'C');
$pdf->Cell(60,10,'kerukunan umat beragama.',0,1,'C');
$pdf->Cell(146,1,'2.   Pada waktu pelaksanaan rame rame tidak dibenarkan / dilarang melakukan hal hal',0,1,'C');
$pdf->Cell(85,9,'bersifat bertentangan dengan adat istiadat.',0,1,'C');
$pdf->Cell(142,6,'Demikian Keterangan izin rame-rame di berikan untuk di pergunakan sebagaimana',0,1,'C');
$pdf->Cell(-1,4,'mestinya.',0,1,'C');
$pdf->Cell(136,8,'Bekasi, '.$tanggal,0,1,'R');
$pdf->Cell(50,-2,'yang bersangkutan,',0,1,'C');
$pdf->Cell(145,3,'LURAH HARAPAN BARU,',0,1,'R');
$pdf->SetFont('Times','B',12);
$pdf->Cell(47,45,$row['UPPER(b.nama)'],0,1,'C');
$pdf->SetFont('Times','',12);
$pdf->Cell(140,-20,'Mengetahui:',0,1,'C');
$pdf->Ln(10);
// $pdf->SetY(-0.2);
$pdf->Cell(50,42,'BABINSA TNI AD',0,1,'C');
$pdf->Cell(235,-42,'BINMASPOL',0,1,'C');
$pdf->SetFont('Times','BU',12);
$pdf->Cell(45,100,'ERWIN.S',0,1,'C');
$pdf->Cell(235,-100,'H. M. FATULLAH',0,1,'C');
$pdf->SetFont('Times','B',12);
$pdf->Cell(45,110,'SERKA/NRP. 31950310871274',0,1,'C');
$pdf->Cell(235,-110,'AIPTU/NRP. 69050242',0,1,'C');

}


$pdf->Output();
?>