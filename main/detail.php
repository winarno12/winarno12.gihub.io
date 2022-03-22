<?php
session_start();
require "../db/conn.php";
$nisn  = $_SESSION["nisn"];
$data  = mysqli_query($conn, "SELECT * FROM ppdb WHERE nisn=$nisn");
$hasil = mysqli_fetch_array($data);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/bootstraps//css//bootstrap.min.css">
</head>

<body>
    <div class="container justify-content-center">
        <div class="card mx-auto  text-grey mb-3 mt-5" style="max-width:25rem;">
            <div class="card-header bg-success text-white d-flex">DATA PENDAFTARAN
                <a style="width: 168px;" class="btn btn-sm btn-outline-warning mt-0 ms-auto d-flex" href="cetak.php">Cetak Bukti Pendaftaran</a>
            </div>
            <div class="card-body">
                <h5 class="card-title"> </h5>
                <div class="card-item">
                    <table>
                        <tr>
                            <td><b>No.Pendaftar</b> </td>
                            <td style="padding-right:7px;">: </td>
                            <td><?= @$hasil[0] ?></td>
                        </tr>
                        <tr>
                            <td><b> NISN</b></td>
                            <td>:</td>
                            <td><?= @$hasil[1] ?></td>
                        </tr>
                        <tr>
                            <td><b>Nama </b> </td>
                            <td>: </td>
                            <td><?= @$hasil[2] ?></td>
                        </tr>
                        <tr>
                            <td><b>Jenis Kelamin</b> </td>
                            <td>:</td>
                            <td><?= @$hasil[3] ?></td>
                        </tr>
                        <tr>
                            <td><b>Tanggal Lahir</b> </td>
                            <td>:</td>
                            <td><?= @$hasil[4] ?></td>
                        </tr>
                        <tr>
                            <td><b>Alamat</b> </td>
                            <td>:</td>
                            <td><?= @$hasil[5] ?></td>
                        </tr>
                        <tr>
                            <td><b>Asal Sekolah</b> </td>
                            <td>:</td>
                            <td><?= @$hasil[6] ?></td>
                        </tr>
                        <tr>
                            <td style="padding-right:7px;"><b>Pilihan Jurusan</b> </td>
                            <td>:</td>
                            <td> <?= @$hasil[7] ?></td>
                        </tr>
                        <tr>
                            <td><b> Nem</b></td>
                            <td>:</td>
                            <td><?= @$hasil[8] ?></td>
                        </tr>
                    </table>

                </div>

            </div>
        </div>
    </div>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>