<?php

	include "../koneksi.php";
	
	$nik = $_POST['nik'];
	$tujuan_acara = $_POST['tujuan_acara'];
	$tgl_acara = $_POST['tgl_acara'];
	$hari_acara = $_POST['hari_acara'];
	$jam_acara = $_POST['jam_acara'];
	$nama_acara = $_POST['nama_acara'];


	
    mysqli_query ($con,"INSERT INTO surat_izin_rame_rame (nik, tujuan_acara, tgl_acara, hari_acara, jam_acara, nama_acara) VALUES ('$nik','$tujuan_acara','$tgl_acara','$hari_acara','$jam_acara','$nama_acara')");
	header("location: izin_rame_rame.php");
?>