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


if (isset($_SESSION["login"])) {
    echo "<script>
                alert('maaf anda belum logout!');
                document.location.href = '../admin/index.php';
            </script>";

    exit;
}

//jika tombol simpan di klik




if (isset($_POST['bsave'])) {
    //rata2
    $nbindo = $_POST['lbindo'];
    $nbing  = $_POST['lbing'];
    $nmtk   = $_POST['lmtk'];
    $nipa   = $_POST['lipa'];
    $total  = $nbindo + $nbing + $nmtk + $nipa;
    $nim    = $total / 10;
    //data check
    $nisn = $_POST['lnisn'];



    $errors = array();


    $u  = "SELECT * FROM ppdb WHERE  nisn = '$nisn'";
    $uu = mysqli_query($conn, $u);

    if (mysqli_num_rows($uu) > 0) {
        $errors['n'] = "nisn ini sudah terdaftar";
    }
    #

    //data akah di simpan baru
    $save = mysqli_query($conn, "INSERT INTO ppdb(nisn,nama,jenis_kelamin,tanggal_lahir,alamat,asal_sekolah,jurusan,nim)
                                        VALUE ('$_POST[lnisn]',
                                        '$_POST[lnama]',
                                        '$_POST[jenkel]',
                                        '$_POST[tgllhr]',
                                        '$_POST[lalamat]',
                                        '$_POST[lasel]',
                                        '$_POST[jrsn]',
                                        '$nim')
                                        ");

    if ($save) //jika berhasil disimpan
    {
        echo "<script>
                alert('daftar ppdb sukses!');

            </script>";
    } else {
        echo "<script>
                alert('daftar ppdb gagal!');

            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB Siswa</title>
    <link rel="stylesheet" href="../assets/bootstraps/css/bootstrap.min.css">
    <script src="../assets/bootstraps/js/bootstrap.min.js"></script>

</head>

<body>

    <div class="container-fluid py-5">
        <!-- Nav Start -->

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container-fluid d-flex">
                <img src="../Stock/download-removebg-preview.png" class="me-2" width="30" alt="">
                <a class="navbar-brand" href="#"><b>SMK WIJAYA</b></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-md-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#profile">Profil</a>
                        </li>
                        <li class="nav-item dropdown bg-dark active">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                PPDB
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item " href="ppdb.php">PPDB</a></li>
                                <li><a class="dropdown-item " href="table.php">Pengumuman Penerimaan</a></li>

                            </ul>
                        </li>
                    </ul>

                    <form class="form ms-auto m-0" action="../login/logout.php ">
                        <button type="" class="btn btn-outline-primary ">Logout</button>
                    </form>

                </div>
            </div>
        </nav>

        <!-- Nav End -->


        <!--start card form-->
        <div class="card">
            <div class="card-header bg-primary text-white ">
                Form Input Data Siswa PPDB
            </div>
            <div class="card-body">
                <form method="post" action="">
                    <div class="form-group">
                        <label>Nisn: </label>
                        <input type="disabled" readonly name="lnisn" value="<?php echo $_SESSION["nisn"]; ?>" class="form-control" placeholder="" required>
                        <p class="text-danger"> <?php if (isset($errors['n'])) echo $errors['n']; ?> </p>
                    </div>
                    <div class="form-group">
                        <label>Nama: </label>
                        <input onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" maxlength="40" name="lnama" value="<?= @$vnama ?>" class="form-control" placeholder="Inputkan Nama anda disini !" required>
                    </div>
                    <label>Jenis Kelamin: </label>
                    <select name="jenkel" value="<?= @$vjenkel ?>" id="" class="form-control" required>
                        <option selected="true" disabled="disabled" value="">-- Jenis Kelamin --</option>
                        <option value="Perempuan">Perempuan</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                    </select>
                    <div class="form-group">
                        <label>Tanggal Lahir: </label>
                        <input id="datePickerId" class="form-control" value="<?= @$vtgllhr ?>" type="date" name="tgllhr" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat: </label>
                        <input type="text" maxlength="40" name="lalamat" value="<?= @$valamat ?>" class="form-control" placeholder="Inputkan Alamat anda disini !" required>
                    </div>
                    <div class="form-group">
                        <label>Jurusan: </label>
                        <select name="jrsn" value="<?= @$vjrsn ?>" id="" class="form-control" required>
                            <option selected="true" disabled="disabled" value="">-- Pilih Jurusan --</option>
                            <option value="Teknik Mesin">Teknik Mesin</option>
                            <option value="Teknik Ototronik">Teknik Ototronik</option>
                            <option value="Teknik Pembuatan Mesin">Teknik Pembuatan Kain</option>
                            <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Asal Sekolah: </label>
                        <input type="text" maxlength="20" name="lasel" value="<?= @$valamat ?>" class="form-control" placeholder="Inputkan Alamat anda disini !" required>
                    </div>

                    <div class="form-group">
                        <label>NIM: </label>
                        <div class="input-group mb-1">
                            <input type="file" class="form-control" id="inputGroupFile02">
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>
                        <input type="number" step="2.5" max="100" step="any" name="lbindo" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="5" value="" class="form-control" placeholder="Inputkan Nilai UN Bahasa Indonesia anda disini !" required>
                        <input type="number" max="100" step="any" name="lbing" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="5" value="" class="form-control" placeholder="Inputkan Nilai UN Bahasa Inggris anda disini !" required>
                        <input type="number" max="100" step="any" name="lmtk" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="5" value="" class="form-control" placeholder="Inputkan Nilai UN Matematika anda disini !" required>
                        <input type="number" max="100" step="any" name="lipa" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="5" value="" class="form-control" placeholder="Inputkan Nilai UN IPA anda disini !" required>
                    </div>
                    <div class="form-group mt-1 row d-flex justify-content-center">


                    </div>

                    <button type="submit" class="btn btn-success mt-3" name="bsave">Daftar</button>

                    <button type="reset" class="btn btn-danger mt-3" name="breset">Batalkan</button><br>
                    <small class="text-muted">*Dengan mengklik tombol daftar anda sudah siap bertanggung jawab atas data anda</small>
                </form>
            </div>
        </div>
        <!--end card form-->
    </div>

    <script>

    </script>
    <Script src="../js/bootstrap.min.js"></Script>
    <script>
        datePickerId.max = new Date().toISOString().split("T")[0];
    </script>
</body>

</html>