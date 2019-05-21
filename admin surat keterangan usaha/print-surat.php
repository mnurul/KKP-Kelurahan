<?php

// membaca data dari form

// $nama = $_POST['nama'];
// $alamat = $_POST['alamat'];
// $tanggal = $_POST['tanggal'];
// $waktu = $_POST['waktu'];
// $tempat = $_POST['tempat'];

$nik = $_POST['nik'];
$jenis_usaha = $_POST['jenis_usaha'];
$alamat_usaha = $_POST['alamat_usaha'];


// membaca isi dokumen tempate surat.rtf

// isi dokumen dinyatakan dalam bentuk string

$document = file_get_contents("../Surat Keterangan Usaha.rtf");

// mereplace tanda %%%NAMA% dengan data nama dari form

$document = str_replace("%%No. Nik%%", $nik, $document);

// // mereplace tanda %%%ALAMAT% dengan data alamat dari form, dst

// $document = str_replace("%%ALAMAT%%", $alamat, $document);

// $document = str_replace("%%TGL%%", $tanggal, $document);

// $document = str_replace("%%TEMPAT%%", $tempat, $document);

// $document = str_replace("%%WAKTU%%", $waktu, $document);

// header untuk membuka file output RTF dengan MS. Word

// nama file output adalah undangan.rtf

header("Content-type: application/msword");

header("Content-disposition: inline; filename=undangan.rtf");

header("Content-length: " . strlen($document));

echo $document;

?>