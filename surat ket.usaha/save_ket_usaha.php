<?php

	include "../koneksi.php";
	
	/*
	
		$host ="localhost";
		$user ="root";
		$pass ="";
		$database = "cisco_academy";
		
		$con = mysql_connect($host, $user, $pass, $database) or die("database mysql gagal koneksi")
	*/
	
	$nik = $_POST['nik'];
	$jenis_usaha = $_POST['jenis_usaha'];
	$alamat_usaha = $_POST['alamat_usaha'];
	$kelurahan_usaha = $_POST['kelurahan_usaha'];
	$kecamatan_usaha = $_POST['kecamatan_usaha'];
	$kota_usaha = $_POST['kota_usaha'];
    
    mysqli_query ($con,"INSERT INTO surat_ket_usaha (nik, jenis_usaha, alamat_usaha, kelurahan_usaha, kecamatan_usaha, kota_usaha) VALUES ('$nik','$jenis_usaha','$alamat_usaha','$kelurahan_usaha','$kecamatan_usaha','$kota_usaha')");
    
    // $sql = "INSERT INTO surat_ket_usaha (nik, jenis_usaha, alamat_usaha) VALUES ('$nik', '$jenis_usaha', '$alamat_usaha')";
    // if (mysqli_query($con, $sql)) {
    //     echo "New record created successfully";
    // } else {
    //     echo "Error: " . $sql . "<br>" . mysqli_error($con);
    // }
	
	// mysqli_query($con,"insert into surat_ket_usaha (nik, jenis_usaha, alamat_usaha)
				//   value ($nik, $jenis_usaha, $alamat_usaha)");
    // echo "INSERT INTO surat_ket_usaha (nik, jenis_usaha, alamat_usaha) VALUES ('$nik','$jenis_usaha','$alamat_usaha')";
	//echo "insert into club values('$id','$asal_daerah',$tahun_berdiri, $manager)";
	//echo "insert into nilai values($npm,'$nama_mahasiswa',$absensi, $tugas, $uts, $uas)";
	/*cara login
	  mysql_query($con,"insert into nilai(npm, nama_mahasiswa, absensi, tugas, uts, uas)"
				  values($npm, $nama_mahasiswa, $absensi, $tugas, $uts, $uas)");
	*/
	header("location: ket_usaha.php");
?>