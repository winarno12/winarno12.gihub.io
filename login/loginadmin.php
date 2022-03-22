<?php
require "../db/conn.php"; //memanggil database
//sesssiom mulai
session_start();
// //jikaa session nya sudah benar
if (isset($_SESSION["login"])) {
    echo "<script>
                alert('maaf anda belum logout!');
                document.location.href = '../admin/index.php';
            </script>";

    exit;
}
if (isset($_SESSION["masuk"])) {
    echo "<script>
                alert('maaf anda belum logout!');
                document.location.href = '../main/index.php';
            </script>";

    exit;
}

// *jika tombol login ditekan
if (isset($_POST["login"])) {

    $nip      = $_POST["lnip"];
    $password = md5($_POST["pass"]);

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE nip='$nip' AND password ='$password'");
    var_dump($result);
    exit;
    //jika ada datanya
    if (mysqli_num_rows($result) === 1) {
        //set session
        $_SESSION["login"] = true;
        $_SESSION["nip"]   = $nip;
        //lempar ke
        header("location:../admin");
    } else {
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>
    <!-- Nav Start -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top d-flex">
        <div class="container-fluid">
            <img src="Stock/download-removebg-preview.png" class="me-2" width="30" alt="">
            <a class="navbar-brand" href="#"><b class="text-success"> SMK 7 WIJAYA</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-md-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php#profile">Profil</a>
                    </li>
                    <li class="nav-item dropdown bg-dark">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            PPDB
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item disabled" href="ppdb.php">PPDB</a></li>
                            <li><a class="dropdown-item disabled" href="table.php">Pengumuman Penerimaan</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="form ms-auto m-0" action="register.php ">
                    <button type="" class="btn btn-outline-success ">Daftar</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- Nav End -->
    <div class="container py-5">


        <!--ds-->
        <div class="row justify-content-center py-5">
            <div class="col-md-6">
                <div class="card">
                    <header class="card-header">
                        <div class="d-flex">

                            <h4 class="card-title mt-2">Masuk</h4>
                            <a href="register.php" class="btn btn-outline-primary mt-1 ms-auto">Daftar</a>

                        </div>
                    </header>
                    <article class="card-body">
                        <form method="post">
                            <div class="form">
                                <div class="form-group">
                                    <input type="number" name="lnip" class="form-control" placeholder="NIP">
                                    <div class="form-group py-2">
                                        <input class="form-control" type="password" name="pass" placeholder="Password">
                                    </div> <!-- form-group end.// -->
                                    <div class="form-group py-2">
                                        <button type="submit" name="login" class="btn btn-primary btn-block"> Masuk </button>

                                    </div> <!-- form-group// -->

                                </div>
                        </form>
                    </article> <!-- card-body end .// -->
                    <div class="border-top card-body text-center">Belum mempunyai akun? <a href="register.php">Dafar akun</a></div>
                    <div class=" card-body text-center">Login sebagai siswa? <a href="login.php">Login </a></div>
                </div> <!-- card.// -->
            </div> <!-- col.//-->

        </div> <!-- row.//-->


    </div>
    <!--container end.//-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>

</html>