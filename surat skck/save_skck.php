<?php

	include "../koneksi.php";
	
	$nik = $_POST['nik'];
	$maksud_tujuan = $_POST['maksud_tujuan'];
	
    mysqli_query ($con,"INSERT INTO skck (nik, maksud_tujuan) VALUES ('$nik','$maksud_tujuan')");
	header("location: skck.php");
?>