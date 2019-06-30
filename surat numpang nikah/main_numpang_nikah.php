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
    <script type="text/javascript" src="../sweetalert-master/docs/assets/sweetalert/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="stylemainnumpangnikah.css">
</head>
<body>
    <div class="bg">
        <a href="../index/index.php"><img src="../image/logo pemkot bekasi-3.png" class="logo" alt=""></a>
        <img src="../image/lineup-3.png" class="lineup" alt="">         
        <h5 class="title" >KELURAHAN HARAPAN BARU</h5>
        <h5 class="title_1" >KOTA BEKASI</h5>
        <div class="container">
            <h2 class="title_2" style="margin-top:7px;">Surat Numpang Nikah</h2>
        </div>
        
        <div class="container" >
            <div class="col-md-12">
                <div class="card justify-content-center setForm">
                    <div class="card-header">
                        Silakan Diisi 
                    </div>
                    <div class="card-body" style="max-height: 406px;overflow-y: scroll;">
                        <blockquote class="blockquote mb-0">
                            <?php    
                                $nik = $_POST['nik'];
                            ?>    
                            <form action="save_numpang_nikah.php" method="post">
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="text" class="form-control" required="required" value="<?= $nik ?>" name="nik" required autofocus readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama_mempelai">Nama Calon Mempelai</label>
                                    <input type="text" class="form-control" required="required"  name="nama_mempelai" style="text-transform:uppercase">
                                </div>
                                <div class="form-group">
                                    <label for="alamat_mempelai">Alamat Calon Mempelai</label>
                                    <input type="text" class="form-control" required="required" name="alamat_mempelai">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="kelurahan_mempelai">Kelurahan</label>
                                        <input type="text" class="form-control" required="required" name="kelurahan_mempelai" >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="kecamatan_mempelai">Kecamatan</label>
                                        <input type="text" class="form-control" required="required" name="kecamatan_mempelai">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kabupaten_mempelai">Kabupaten</label>
                                    <input type="text" class="form-control" required="required" name="kabupaten_mempelai">
                                </div>
                                <button type="submit" onclick="sweet()" class="btn btn-primary">Proses</button>
                            </form>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function sweet (){
            swal("Permintaan Anda akan Diproses", "Tunggu hingga 3 sampai 5 hari", "success");
        }
    </script>


    <script src="../bs/js/bootstrap.bundle.min.js"></script>
    <script src="../jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>