<?php
session_start();
require "../db/conn.php";

if (!isset($_SESSION["login"])) {
    echo "<script>
                alert('maaf anda belum login!');
                document.location.href = '../index.php';
            </script>";
    exit;
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>SMK 2 WIJAYA</title>`
    <link rel="stylesheet" href="../assets/bootstraps/css/bootstrap.min.css">
    <script src="../assets/bootstraps/js/bootstrap.min.js"></script>
</head>

<body>

    <!-- Nav Start -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid d-flex">
            <img src="../Stock/download-removebg-preview.png" class="me-2" width="30" alt="">
            <a class="navbar-brand" href="#"><b>SMK 7 WIJAYA</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-md-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#profile">Profil</a>
                    </li>
                    <li class="nav-item dropdown bg-dark active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            PPDB
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item disabled " href="ppdb.php">PPDB</a></li>
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

    <!-- Cover Start -->
    <div class="w-100 ">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6" aria-label="Slide 7"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="7" aria-label="Slide 8"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="8" aria-label="Slide 9"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="9" aria-label="Slide 10"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="10" aria-label="Slide 0"></button>

            </div>
            <div class="carousel-inner mh-100">
                <div class="carousel-item active">
                    <img src="../assets/Stock/Sekolah/1.jpg" class="d-block img-fluid" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../assets/Stock/Sekolah/2.jpg" class="d-block img-fluid" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../assets/Stock/Sekolah/3.jpg" class="d-block img-fluid" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../assets/Stock/Sekolah/4.jpg" class="d-block img-fluid" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../assets/Stock/Sekolah/5.jpg" class="d-block img-fluid" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../assets/Stock/Sekolah/6.jpg" class="d-block img-fluid" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../assets/Stock/Sekolah/7.jpg" class="d-block img-fluid" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../assets/Stock/Sekolah/8.jpg" class="d-block img-fluid" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../assets/Stock/Sekolah/9.jpg" class="d-block img-fluid" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../assets/Stock/Sekolah/10.jpg" class="d-block img-fluid" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <hr id="profile" class="mx-auto" style="width: 1000px;">
    <!-- Cover End -->
    <!-- Caroussel Start -->
    <div class="card mb-3 border-0 mx-auto py-5 " style="max-width: 800px ;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="../assets/Stock/SMK Bisa V1.png" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><b>Sedikit tentang</b><b class="text-success"> SMK 7 WIJAYA</b> </h5>
                    <p class="card-text">SMK 7 WIJAYA adalah salah satu Sekolah Menengah Kejuruan favorit di Kabupaten Karanganyar.
                        Dan merupakan sekolah yang terbaik, berwawasan, disiplin, tanggung jawab, dan bermoral baik.</p>

                </div>
            </div>
        </div>
    </div>
    <!-- Caroussel End -->
    <hr class="mx-auto" style="width:1300px;">
    <!-- card start -->
    <div class="container">
        <div class="container text-center m-1">
            <h1 class="heading1 "><b class="text-success">Kejuruan</b> <b>SMK 2 WIJAYA</b> </h1>

            <p class=""><small> Berisi tentang pengertian sekilas mengenai kejuruan yang ada di SMK Negeri 2 Karanganyar.
                    Dan hal ini dapat dijadikan <br> sebagai gambaran apa yang akan dipelajari pada bidang kejuruan.</small></p>
            <div class="row d-flex justify-content-center py-1">
                <div class="col">
                    <div class="card" style="width: 18rem ;">
                        <img src="https://www.smkn2kra.sch.id/resources/images/vocation/teknik-pemesinan.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Teknik Pemesinan</h5>
                            <p class="card-text">Teknik mesin adalah ilmu yang mempelajari energi dan sumber energinya. Materi dalam teknik mesin
                                adalah penggerak awal, seperti motor bakar, mesin perkakas, pompa, kompresor, pendingin, pemanas, dan alat kimia.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="https://www.smkn2kra.sch.id/resources/images/vocation/teknik-ototronik.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Teknik Ototronik</h5>
                            <p class="card-text">Teknik Ototronik adalah ilmu yang mempelajari tentang keahlian dibidang otomotif yang menekankan
                                keahlian pada bidang penguasaan teknologi elektronik dan kontrol yang ada di kendaraan bermotor.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="https://www.smkn2kra.sch.id/resources/images/vocation/teknik-tekstil.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Teknik Pembuatan Kain</h5>
                            <p class="card-text">Teknik Tekstil adalah ilmu yang mempelajari tentang aplikasi prinsip-prinsip sains dan teknik untuk
                                melaksanakan proses produksi, pengendalian proses, permesinan, desain tentang perkainan atau teksil.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="https://www.smkn2kra.sch.id/resources/images/vocation/rekayasa-perangkat-lunak.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Rekayasa Perangkat Lunak</h5>
                            <p class="card-text">Rekayasa Perangkat Lunak adalah ilmu <br> yang mendalami tentang pembuatan, pemeliharaan, manajemen
                                organisasi pengembanganan perangkat lunak dan manajemen kualitas.</p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>




    <!-- card end -->
    <hr class="mx-auto" style="width: 1300px;">
    <footer class="bg-light text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2021 Copyright:
            <a class="text-dark" href="https://facebook.com/dwi.wijaya07">Dwiwijaya</a>
        </div>
        <!-- Copyright -->
    </footer>
    <script>
        history.pushState(null, null, null);
        window.addEventListener('popstate', function() {
            history.pushState(null, null, null);
        });
    </script>







</body>

</html>