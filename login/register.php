<?php
require "../db/conn.php";

session_start();
//jika tombol simpan di klik
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

if (isset($_POST['daftar'])) {

    //data akah di simpan baru
    $nisn     = $_POST['lnisn'];
    $username = $_POST['user'];
    $pass     = $_POST['pass2'];
    $password = md5($pass);       //Password Encrypted

    $errors = array();
    $u  = "SELECT * FROM users WHERE  nisn = '$nisn'";
    $uu = mysqli_query($conn, $u);

    if (empty($nisn)) {
        $errors['n'] = "masukan nisn";
    } else if (mysqli_num_rows($uu) > 0) {
        $errors['n'] = "nisn sudah digunakan";
    }

    if (empty($username)) {
        $errors['u'] = "masukan username";
    }

    if (empty($nisn)) {
        $errors['p'] = "masukan password";
    }

    if (count($errors) == 0) {
        $query  = "INSERT INTO users (nisn,username,password) VALUES 
        ('$nisn','$username','$password')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "<script>alert('daftar sukses')
            document.location.href = 'login.php'
            </script>";
            $errors['s'] = "akun sukses dibuat silahkan login";

            $_SESSION["username"] = $username;
        } else {
            echo "<script>alert('daftar gagal')</script>";
        }
    }
}
?>

<!-- ---------------------------------------------------------------------------------- -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>
    <div class="container py-5">
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
                    <form class="form ms-auto m-0" action="login.php ">
                        <button type="" class="btn btn-outline-success ">Masuk</button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Nav End -->


        <div class="row justify-content-center py-5">
            <div class="col-md-6">
                <div class="card">
                    <header class="card-header">
                        <div class="d-flex">
                            <h4 class="card-title mt-2">Daftar</h4>
                            <a href="login.php" class="btn btn-outline-primary mt-1 ms-auto">Masuk</a>
                        </div>
                    </header>
                    <article class="card-body">
                        <form method="post" onSubmit="return checkPassword(this)">
                            <div class="form">
                                <div class="form-group">
                                    <input type="number" class="form-control" name="lnisn" placeholder="NISN" autocomplete="off">
                                    <p class="text-danger"> <?php if (isset($errors['n'])) echo $errors['n']; ?> </p>
                                </div>
                                <div class="form-group ">
                                    <input type="text" class="form-control" name="user" placeholder="Username" autocomplete="off">
                                    <p class="text-danger"> <?php if (isset($errors['u'])) echo $errors['u']; ?> </p>
                                </div>
                                <!-- form-group end.// -->
                                <div class="form-group">
                                    <input class="form-control" minlength="8" name="pass1" type="password" placeholder="Masukan Password" autocomplete="off">
                                    <input class="form-control mt-1" minlength="8" name="pass2" type="password" placeholder="Masukan kembali Password" autocomplete="off">
                                    <p class="text-danger"> <?php if (isset($errors['p'])) echo $errors['p']; ?> </p>
                                </div>
                            </div>
                            <div class="form-group py-3">
                                <button type="submit" name="daftar" class="btn btn-primary btn-block"> Daftar </button>
                                <p class="text-danger"> <?php if (isset($errors['s'])) echo $errors['s']; ?> </p>
                            </div> <!-- form-group// -->
                            <small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>
                        </form>
                    </article> <!-- card-body end .// -->
                    <div class="border-top card-body text-center">Sudah mempunyai akun? <a href="login.php">Masuk</a></div>
                </div> <!-- card.// -->
            </div> <!-- col.//-->
        </div> <!-- row.//-->


    </div>
    <!--container end.//-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script>
        function checkPassword(form) {
            password1 = form.pass1.value;
            password2 = form.pass2.value;
            if (password1 != password2) {
                alert("\nPassword did not match: Please try again...")
                return false;
            }
        }
    </script>
</body>

</html>