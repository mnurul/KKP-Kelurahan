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
    <link rel="stylesheet" type="text/css" href="styleskck.css">
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
                        Silakan Diisi Untuk Validasi NIK Anda
                    </div>
                    <div class="card-body" style="max-height: 406px;overflow-y: scroll;">
                        <blockquote class="blockquote mb-0">
                            <form action="validasi_nik.php" method="post">
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="text" class="form-control" required="required" name="nik" required autofocus>
                                </div>
                                <button type="submit" class="btn btn-primary">Validasi</button>
                            </form>
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