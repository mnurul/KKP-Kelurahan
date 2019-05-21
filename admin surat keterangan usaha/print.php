<?php
require('../fpdf181/fpdf.php');

// kita akan membuat class baru yang mewarisi sifat dari class FPDF
// tujuannya agar lebih memudahkan editing
class PDF extends FPDF{
// function Header dan Footer akan otomatis dipanggil untuk membuat header dan footer

  function Header()
  {
      // logo atau gambar, 
      // 'logo.php' di bawah berarti path atau alamat gambar
      // dengan panjang posisi X = 10, Y = 6, dan panjang 30 
      
      // arial bold 15
      $this->SetFont('Times','BU',16);
      // membuat cell kosong dengan panjang 80
    //   $this->Cell(80);
      // judul
      //   $this->Cell(30,10,'Ini Judul',1,0,'C');
	  $this->Ln(40);
	  $this->Cell(200,10,'SURAT KETERANGAN USAHA',0,1,'C');
	  $this->SetFont('Times','',12);
	  $this->Cell(200,1,'Nomor. 517 /      / Kl.HB',0,1,'C');
	  $this->Ln(10);
	  
      // line break dengan tinggi 20
    //   $this->Ln(20);
  }
  
  //Page Content
	function Content()
	{
		$this->SetLeftMargin(44);
	//   $this->SetTopMargin(27);
	  $this->Cell(200,1,'Yang bertanda tangan dibawah ini Lurah Kelurahan Harapan Baru Kecamatan ',0,1,'L');
	  $this->ln(); 
	  $this->SetLeftMargin(2); 
	  $this->Cell(200,10,'Bekasi Utara Kota Bekasi menerangkan :',0,1,'L');
	}
  function Footer()
  {
      // mengatur posisi 1,5 cm ke bawah
      $this->SetY(-15);
      // arial italic 8
      $this->SetFont('Arial','I',8);
      // penomoran halaman
      $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
  }
}

$pdf = new PDF();
$pdf->AliasNbPages(); // fungsi untuk mengitung jumlah total halaman
$pdf->AddPage(); // membuat halaman
$pdf->SetFont('Times','',12); // Times 12

// pengulangan agar dokumen ada isinya dan kelihatan penomorannya
for($i=1;$i<=40;$i++){
  $pdf->Cell(0,10,'Baris dalam dokumen yang ke '.$i,0,1);
}

$pdf->Output(); // menampilkan hasil...
?>