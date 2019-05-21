<?php

include "../koneksi.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <link rel="shourcut icon" href="../image/logo pemkot bekasi-3.png">
    <title>Kelurahan Harapan Baru</title>
    <link rel="stylesheet" href="../bs/css/bootstrap.min.css">
    <!-- <script type="text/javascript" src="../sweetalert-master/docs/assets/sweetalert/sweetalert.min.js"></script> -->
    <link rel="stylesheet" type="text/css" href="stylevalidasinik.css">
</head>
<body>
    <div class="bg">
        <a href="../index/index.php"><img src="../image/logo pemkot bekasi-3.png" class="logo" alt=""></a>
        <img src="../image/lineup-3.png" class="lineup" alt="">         
        <h5 class="title" >KELURAHAN HARAPAN BARU</h5>
        <h5 class="title_1" >KOTA BEKASI</h5>
        <div class="container">
            <h2 class="title_2" style="margin-top:7px;">Surat Keterangan Catatan Kepolisian</h2>
        </div>
        
        <div class="container" >
            <div class="col-md-12">
                <div class="card justify-content-center setForm">
                    <div class="card-header">
                        Data Diri Anda
                    </div>
                    <div class="card-body" style="max-height: 406px;overflow-y: scroll;">
                        <blockquote class="blockquote mb-0">
                        <?php
                            $nik = $_POST['nik'];

                            $data = mysqli_query($con,"SELECT nik, UPPER(nama) as nama, tempat, date_format(tgl_lahir,'%d-%m-%Y ') as tgl_lahir, jkel, alamat,  kewarganegaraan, agama, status_perkawinan, kelurahan,kecamatan, kota, pekerjaan FROM warga WHERE nik='".$nik."'");
                            if ($row = mysqli_fetch_array($data))
                            {
                        ?>
                            <form action="main_skck.php" id="myForm"  method="post">
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="text" class="form-control" required="required" value="<?= $row['nik']; ?>" name="nik" required autofocus readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" required="required" value="<?= $row['nama']; ?>" name="nama" style="text-transform:uppercase" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="tempat">Tempat</label>
                                    <input type="text" class="form-control" required="required" value="<?= $row['tempat']; ?>" name="tempat" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <input type="text" class="form-control" required="required" value="<?= $row['tgl_lahir']; ?>"name="tgl_lahir" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="jkel">Jenis Kelamin</label>
                                    <input type="text" class="form-control" required="required" value="<?= $row['jkel']; ?>" name="jkel" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" required="required" value="<?= $row['alamat']; ?>" name="alamat" readonly>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="kelurahan">Kelurahan</label>
                                        <input type="text" class="form-control" required="required" value="<?= $row['kelurahan']; ?>" name="kelurahan" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="kecamatan">Kecamatan</label>
                                        <input type="text" class="form-control" required="required" value="<?= $row['kecamatan']; ?>"name="kecamatan" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kota">Kota</label>
                                    <input type="text" class="form-control" required="required" value="<?= $row['kota']; ?>" name="kota" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <input type="text" class="form-control" required="required" value="<?= $row['agama']; ?>" name="agama" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="status_perkawinan">Status Perkawinan</label>
                                    <input type="text" class="form-control" required="required" value="<?= $row['status_perkawinan']; ?>"name="statu_perkawinan" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <input type="text" class="form-control" required="required" value="<?= $row['pekerjaan']; ?>"name="pekerjaan" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="kewarganegaraan">Kewarganegaraan</label>
                                    <input type="text" class="form-control" required="required" value="<?= $row['kewarganegaraan']; ?>"name="kewarganegaraan" readonly>
                                </div>
                                <a href="ket_usaha.php" class="btn btn-primary">Kembali</a>
                                <a href="#" class="btn btn-primary" onclick="document.getElementById('myForm').submit();">Lanjut</a>
                            </form>
                            <?php                
                                } else
                                {
                            ?>
                            <h3>OPsss... Data Diri Anda Tidak Ada</h3>
                            <br>
                            <p style="font-size:13px;">Silakan melapor ke pihak Kelurahan Harapan Baru</p>
                            <a href="ket_usaha.php" class="btn btn-primary">Kembali</a>
                            <?php
                                }
                            ?>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>

    


    <script src="../bs/js/bootstrap.bundle.min.js"></script>
    <script src="../jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>




