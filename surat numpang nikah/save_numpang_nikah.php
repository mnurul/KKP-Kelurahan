<?php

	include "../koneksi.php";
	
	$nik = $_POST['nik'];
	$nama_mempelai = $_POST['nama_mempelai'];
	$alamat_mempelai = $_POST['alamat_mempelai'];
	$kelurahan_mempelai = $_POST['kelurahan_mempelai'];
	$kecamatan_mempelai = $_POST['kecamatan_mempelai'];
	$kabupaten_mempelai = $_POST['kabupaten_mempelai'];

	
    mysqli_query ($con,"INSERT INTO surat_numpang_nikah (nik, nama_mempelai, alamat_mempelai, kelurahan_mempelai, kecamatan_mempelai, kabupaten_mempelai) VALUES ('$nik','$nama_mempelai','$alamat_mempelai','$kelurahan_mempelai','$kecamatan_mempelai','$kabupaten_mempelai')");
	header("location: numpang_nikah.php");
?>