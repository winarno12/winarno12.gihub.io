<?php
$server   = "localhost";
$user     = "root";
$pass     = "";
$database = "smkn2kra";

$conn = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($connect));

function ubahdata($data)
{

  global $conn;
  $id     = $data['id'];
  $nisn   = $data['nisn'];
  $nama   = $data['nama'];
  $jenkel = $data['jenis_kelamin'];
  $tgl    = $data['tanggal_lahir'];
  $asal   = $data['asal_sekolah'];
  $jrsn   = $data['jurusan'];
  $nim    = $data['nim'];

  mysqli_query($conn, "UPDATE ppdb   SET 
                          nisn          = '$nisn',
                          nama          = '$nama',
                          jenis_kelamin = '$jenkel',
                          tanggal_lahir = '$tgl',
                          alamat        = '$nama',
                          asal_sekolah  = '$asal',
                          jurusan       = '$jrsn',
                          nim           = '$nim'
                    WHERE id            = $id
              ");

  return mysqli_affected_rows($conn);
}
if (isset($_POST['ubah'])) {
  if (ubahdata($_POST) > 0) {
    echo "<script>
    alert('\t Data berhasil diedit! \t')
    document.location.href = 'table.php'
    </script>";
  } else {
    echo "<script>
    alert('Data Gagal diedit!')
    document.location.href = 'table.php'
    </script>";
  }
}

?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Penerimaan</title>
  <link rel="stylesheet" type="text/css" href="../assets/bootstraps/css/bootstrap.min.css">
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
              <a class="nav-link" href="index.php">Profil</a>
            </li>
            <li class="nav-item dropdown bg-dark active">
              <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                PPDB
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item disabled " href="ppdb.php">PPDB</a></li>
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
        <a style="width: 95px;" class="btn btn-sm btn-outline-warning mt-0 ms-auto" href="cetak.php">Cetak</a>
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
              <th style="width: 30px;" align="center">Opsi</th>

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
                <td style="width: 30px;" align="center">
                  <!-- Button trigger modal -->
                  <a class="btn btn-warning m-0" id="btnedit" data-bs-toggle="modal" data-bs-target="#ubahmodal" 
                  data-id="<?= $row['id']; ?>" 
                  data-nisn="<?= $row['nisn']; ?> " 
                  data-nama="<?= $row['nama']; ?> " 
                  data-jenkel="<?= $row['jenis_kelamin']; ?>" 
                  data-tgl="<?= $row['tanggal_lahir']; ?>" 
                  data-asal="<?= $row['asal_sekolah']; ?>" 
                  data-jrsn="<?= $row['jurusan']; ?>" 
                  data-nim="<?= $row['nim']; ?>">Edit</a>
                </td>
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
  <div class="modal fade" id="ubahmodal" tabindex="-1" aria-labelledby="ubahmodal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ubahmodal">Form Edit Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            <input type="hidden" name="id" id="id">
            <div class="form-group">
              <label for="nisn">Nisn :</label>
              <input id="nisn" onkeyup="this.value=this.value.replace(/[^\d]/,'')" type="text" maxlength="20" name="nisn" class="form-control" placeholder="Inputkan anda disini !" required>
            </div>
            <div class="form-group">
              <label for="nama">Nama :</label>
              <input id="nama" type="text" maxlength="20" name="nama" class="form-control" placeholder="Inputkan anda disini !" required>
            </div>
            <div class="form-group">
              <label>Jenis Kelamin : </label>
              <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                <option selected="true" disabled="disabled" value="">-- Jenis Kelamin --</option>
                <option value="Perempuan">Perempuan</option>
                <option value="Laki-Laki">Laki-Laki</option>
              </select>
            </div>
            <div class="form-group">
              <label for="tanggal_lahir">Tanggal Lahir:</label>
              <input id="tanggal_lahir" type="date" maxlength="20" name="tanggal_lahir" class="form-control" placeholder="Inputkan anda disini !" required>
            </div>
            <div class="form-group">
              <label for="asal_sekolah">Asal Sekolah :</label>
              <input id="asal_sekolah" type="text" maxlength="20" name="asal_sekolah" class="form-control" placeholder="Inputkan anda disini !" required>
            </div>
            <div class="form-group">
              <label>Pilihan Jurusan : </label>
              <select name="jurusan" id="jurusan" class="form-control" required>
                <option selected="true" disabled="disabled" value="">-- Pilih Jurusan --</option>
                <option value="Teknik Mesin">Teknik Mesin</option>
                <option value="Teknik Ototronik">Teknik Ototronik</option>
                <option value="Teknik Pembuatan Mesin">Teknik Pembuatan Kain</option>
                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
              </select>
            </div>
            <div class="form-group">
              <label for="nim"> Nem:</label>
              <input id="nim" type="text" maxlength="20" name="nim" class="form-control" placeholder="Inputkan anda disini !" required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="ubah" class="btn btn-primary">Update</button>
            </div>
            <div class="container "></div>
          </form>


        </div>

      </div>
    </div>
  </div>



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