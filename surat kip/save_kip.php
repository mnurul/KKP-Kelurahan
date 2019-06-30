<?php

	include "../koneksi.php";
	
	$nik = $_POST['nik'];
	$nik_orang_tua = $_POST['nik_orang_tua'];

	
    mysqli_query ($con,"INSERT INTO surat_kip (nik, nik_orang_tua) VALUES ('$nik','$nik_orang_tua')");
	header("location: kip.php");
?>