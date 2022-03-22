<?php
require "../db/conn.php";
session_start();
if (!isset($_SESSION["masuk"])) {
    echo "<script>
                alert('!maaf anda belum login!');
                document.location.href = '../index.php';
            </script>";

    exit;
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penerimaan</title>
    <link rel="stylesheet" href="../assets/bootstraps/css/bootstrap.min.css">
    <script src="../assets/bootstraps/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.js"></script>

</head>

<body>

    <div class="container-fluid py-5">
        <!-- Nav Start -->

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
                <img src="../Stock/download-removebg-preview.png" class="me-2" width="30" alt="">
                <a class="navbar-brand" href="#"><b>SMK 7 WIJAYA</b></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-md-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Profil</a>
                        </li>
                        <li class="nav-item dropdown bg-dark active">
                            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                PPDB
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item " href="ppdb.php">PPDB</a></li>
                                <li><a class="dropdown-item " href="table.php">Pengumuman Penerimaan</a></li>

                            </ul>
                        </li>
                    </ul>

                    <li class="nav-item ms-auto"></li>

                </div>
            </div>
        </nav>

        <!-- Nav End -->
        <!--start card table-->
        <div class="card mt-3">
            <div class="card-header bg-success text-white d-flex ">
                Daftar Penerimaan Siswa
            </div>
            <div class="card-body">
                <table id="example" class="table display  table-hover">
                    <thead>
                        <tr>
                            <th style="width: 10;">No.</th>
                            <th>Nisn</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>

                            <th>Asal Sekolah</th>
                            <th>Jurusan</th>
                            <th>Nim</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $tampil = mysqli_query($conn, "SELECT * from ppdb order by nim desc limit 50");
                        while ($row = mysqli_fetch_array($tampil)) :
                        ?>
                            <tr>

                                <td><?= $no++; ?></td>
                                <td><?= $row['nisn'] ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['jenis_kelamin'] ?></td>
                                <td><?= $row['tanggal_lahir'] ?></td>

                                <td><?= $row['asal_sekolah'] ?></td>
                                <td><?= $row['jurusan'] ?></td>
                                <td><?= $row['nim'] ?></td>

                            </tr>
                        <?php endwhile; //penutup perulangan while
                        ?>
                    </tbody>


                </table>
            </div>
        </div>

    </div>
    <!-- Button trigger modal -->



    <!-- Modal -->

    </div>

    <Script src="../js/bootstrap.min.js"></Script>


    <script>
        $(document).on("click", "#btnedit", function() {
            let id = $(this).data('id');
            let nisn = $(this).data('nisn');
            let nama = $(this).data('nama');
            let jenkel = $(this).data('jenkel');
            let tgl = $(this).data('tgl');
            let asal = $(this).data('asal');
            let jrsn = $(this).data('jrsn');
            let nem = $(this).data('nim');

            $(".modal-body #id").val(id);
            $(".modal-body #nisn").val(nisn);
            $(".modal-body #nama").val(nama);
            $(".modal-body #jenis_kelamin").val(jenkel);
            $(".modal-body #tanggal_lahir").val(tgl);
            $(".modal-body #asal_sekolah").val(asal);
            $(".modal-body #jurusan").val(jrsn);
            $(".modal-body #nim").val(nem);
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

</body>

</html>