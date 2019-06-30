<?php session_start();

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
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style_admin_ket_usaha.css">
</head>
<body>
    <div class="bg">
        <a href="../admin/admin.php"><img src="../image/logo pemkot bekasi-3.png" class="logo" alt=""></a>
        <img src="../image/lineup-3.png" class="lineup" alt="">         
        <h5 class="title" >KELURAHAN HARAPAN BARU</h5>
        <h5 class="title_1" >KOTA BEKASI</h5>
        <div class="container">
            <h2 class="title_2" style="margin-top:7px;">Surat Keterangan Usaha</h2>
        </div>
        <div class="container">
            <div class="dropdown" style="margin-top:-48px;margin-left:-15px;">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Pilih Jenis Surat
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <a class="dropdown-item" href="../admin skck/admin_skck.php">Surat Keterangan Catatan Kepolisian</a>
                    <button class="dropdown-item" type="button">Another action</button>
                    <button class="dropdown-item" type="button">So</button>
                </div>  
            </div>
        </div>
        <div class="container" >
            <div class="col-md-12">
            <div class="card justify-content-center setForm " >
                <div class="card-header">
                
                </div>
                <div class="card-body ScrollStyle">
                    <blockquote class="blockquote mb-0">
                        <table class="table table-hover table-sm table-responsive w-auto text-nowrap">
                            <thead>
                                <tr >
                                    <th scope="col">No</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tempat</th>
                                    <th scope="col">Tanggal Lahir</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Kelurahan</th>
                                    <th scope="col">Kecamatan</th>
                                    <th scope="col">Kota</th>
                                    <th scope="col">Kewarganegaraan</th>
                                    <th scope="col">Agama</th>
                                    <th scope="col">Jenis Usaha</th>
                                    <th scope="col">Alamat Usaha</th>
                                    <th scope="col">Kelurahan Usaha</th>
                                    <th scope="col">Kecamatan Usaha</th>
                                    <th scope="col">Kota Usaha</th>
                                    <th scope="col">Tanggal Pengajuan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <?php
                                // $no = 1;
                                $data = mysqli_query($con,"SELECT warga.nik, UPPER(warga.nama), warga.tempat, date_format(warga.tgl_lahir,'%d-%m-%Y ') as tgl_lahir, warga.jkel, warga. alamat, warga. kewarganegaraan, warga. agama, warga.kelurahan, warga.kecamatan, warga.kota, surat_ket_usaha.no_sku, UPPER(surat_ket_usaha.jenis_usaha), surat_ket_usaha.alamat_usaha, surat_ket_usaha.kelurahan_usaha, surat_ket_usaha.kecamatan_usaha, surat_ket_usaha.kota_usaha, surat_ket_usaha.tgl_pengajuan FROM surat_ket_usaha INNER JOIN warga ON surat_ket_usaha.nik = warga.nik");
                                while ($row = mysqli_fetch_array($data))
                                {
						    ?>
                            <tbody>
                                <tr>
                                <th scope="row"><?= $row['no_sku']; ?></th>
                                <td><?= $row['nik'];?></td>
                                <td><?= $row['UPPER(warga.nama)'];?></td>
                                <td><?= $row['tempat'];?></td>
                                <td><?= $row['tgl_lahir'];?></td>
                                <td><?= $row['jkel'];?></td>
                                <td><?= $row['alamat'];?></td>
                                <td><?= $row['kelurahan'];?></td>
                                <td><?= $row['kecamatan'];?></td>
                                <td><?= $row['kota'];?></td>
                                <td><?= $row['kewarganegaraan'];?></td>
                                <td><?= $row['agama'];?></td>
                                <td><?= $row['UPPER(surat_ket_usaha.jenis_usaha)'];?></td>
                                <td><?= $row['alamat_usaha'];?></td>
                                <td><?= $row['kelurahan_usaha'];?></td>
                                <td><?= $row['kecamatan_usaha'];?></td>
                                <td><?= $row['kota_usaha'];?></td>
                                <td><?= $row['tgl_pengajuan'];?></td>
                                <td><a href="print_test.php?no_sku=<?= $row['no_sku']; ?>" target="_blank"><i class="fa fa-print fa-2x" aria-hidden="true"></i></a></td>
                                </tr>
                            </tbody>
                            <?php
                                }
                            ?>
                        </table>
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