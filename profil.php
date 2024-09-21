<?php
ob_start();
include 'koneksi.php';
include "headers.php";

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
?>
    <link rel="shortcut icon" href="./img/lucart.jpg" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Log in terlebih dahulu!",
                backdrop: "white",
                showConfirmButton: false,
                timer: 500
            }).then(function() {
                window.location.href = "log-in.php"; // Redirect ke halaman login
            });
        });
    </script>;
<?php
    exit();
}

$id = $_SESSION['id'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$nama = $_SESSION['nama'];
$email = $_SESSION['email'];
$hp = $_SESSION['hp'];
$alamat = $_SESSION['alamat'];

if (isset($_POST['simpan'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $hp = $_POST['hp'];
    $alamat = $_POST['alamat'];
    $foto = $_FILES['foto']['name'];
    $file_tmp = $_FILES['foto']['tmp_name'];

    if (!empty($foto)) {
        move_uploaded_file($file_tmp, 'img/' . $foto);
        $edit = mysqli_query($koneksi, "UPDATE users SET username='$username', password='$password', nama='$nama', email='$email', hp='$hp', alamat='$alamat', foto='$foto' WHERE id='$id'");
    } else {
        $edit = mysqli_query($koneksi, "UPDATE users SET username='$username', password='$password', nama='$nama', email='$email', hp='$hp', alamat='$alamat' WHERE id='$id'");
    }

    if ($edit) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['nama'] = $nama;
        $_SESSION['email'] = $email;
        $_SESSION['hp'] = $hp;
        $_SESSION['alamat'] = $alamat;
        header('Location:profil.php');
    } else {
        die("Gagal menyimpan perubahan...");
    }
}

if (isset($_GET["aksi"])) {
    if ($_GET["aksi"]  == "edit") {

        $id = mysqli_real_escape_string($koneksi, $_SESSION['id']);

        $result = mysqli_query($koneksi, "SELECT * FROM users WHERE id='$id'");

        if ($result) {
            while ($users = mysqli_fetch_array($result)) {
                $username = $users['username'];
                $password = $users['password'];
                $nama = $users['nama'];
                $email = $users['email'];
                $alamat = $users['alamat'];
                $hp = $users['hp'];
                $foto = $users['foto'];
            }
        } else {
            echo "Query gagal: " . mysqli_error($koneksi);
        }
    }
}
ob_end_flush();
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lucart | Make a new step</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="./img/lucart.jpg" type="image/x-icon">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <style>
        .nav-link:hover {
            color: #5a23c8;
        }


        * {
            scroll-behavior: smooth;
        }

        body {
            background-color: white;
        }

        .header {
            position: fixed;
            width: 100%;
            background-color: white;
            margin-left: -120px;
            top: 0;
            z-index: 1000000;
            padding-left: 100px;
        }

        .container {
            padding-top: 30px;
        }

        /* .profil .button-profil {
            transition: .3s ease-in-out;
        }

        .profil .button-profil:hover {
            font-weight: bold;
            background-color: white;
            transform: translateY(-5px);
            color: black;
        } */

        .profil img {
            height: 130px;
        }

        .card-body .btn-ubah,
        .pitcure .btn-camera {
            transition: .3s ease-in-out;
            font-weight: 600;
        }

        .card-body .btn-ubah:hover,
        .pitcure .btn-camera:hover {
            font-weight: 600;
            background-color: white;
            transform: translateY(-5px);
            color: #0d6efd;
        }

        .history {
            transition: 0.3s ease-in-out;
        }

        .history:hover {
            font-weight: bold;
        }
    </style>

    <link href="./features/features.css" rel="stylesheet">

</head>

<body>

    <div class="container">
        <div class="d-flex align-items-start justify-content-center gap-2 profil mt-0 mt-md-4">
            <!-- anggep ini table -->
            <div class="card rounded p-4 border-primary text-center gap-5 border-opacity-25 shadow d-flex flex-md-row flex-column justify-content-between mt-5 mb-5" style="width: 100%; max-width: 45rem;" id="view-profile">
                <div class="d-flex flex-column align-items-center flex-wrap mb-md-4 mb-0">
                    <img src="./img/profil.png" alt="profil" style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%; margin-bottom: 1rem;">
                    <div class="card-body">
                        <h4 class="card-title"><?= ucfirst($nama) ?></h4>
                        <p class="card-text">(@<?= ucfirst($username) ?>)</p>

                        <a href="javascript:void(0)" class="btn btn-outline-primary text-center d-flex justify-content-center mt-3 gap-1 btn-ubah" id="edit-profile-btn"><box-icon name='edit' color='#0d6efd' class="box-icon"></box-icon> Ubah Profil</a>
                    </div>
                </div>
                <div class="card-body flex-md-wrap">
                    <h4 class="border-bottom border-primary border-opacity-50 pb-4">Senang Melihatmu, <?= ucfirst($nama) ?>!</h4>
                    <div class="card-detail mt-4 d-flex align-items-center gap-2">
                        <box-icon name='mobile-alt' color='#181818'></box-icon>
                        <span class="text-normal"><?= ucfirst($hp) ?></span>
                    </div>
                    <div class="card-detail mt-4 d-flex align-items-center gap-2">
                        <box-icon name='envelope'></box-icon>
                        <span class="text-normal"><?= $email ?></span>
                    </div>
                    <div class="card-detail mt-4 d-flex align-items-center gap-2">
                        <box-icon name='map' type='solid' color='#FF0000'></box-icon>
                        <span class="text-normal"><?= ucfirst($alamat) ?></span>
                    </div>
                    <div class="card-detail mt-4 d-flex align-items-center gap-2">
                        <box-icon name='key'></box-icon>
                        <span class="text-normal"><?= ucfirst($password) ?></span>
                    </div>
                    <div class="card-detail mt-4 d-flex align-items-center gap-2">
                        <box-icon name='history'></box-icon>
                        <span class="text-normal"><a href="history.php" class="text-decoration-none text-dark history">Histori Transaksi</a></span>
                    </div>
                </div>
            </div>

            <div class="card rounded p-4 border-primary text-center gap-5 border-opacity-25 shadow d-none flex-md-row flex-column justify-content-between mt-5 mb-5" style="width: 100%; max-width: 45rem;" id="edit-profile">
                <!-- anggep ini form edit -->
                <form method="POST" enctype="multipart/form-data" class="d-flex flex-column flex-md-row">
                    <div class="d-flex flex-column align-items-center flex-wrap mb-md-4 mb-0">
                        <div class="position-relative pitcure">
                            <img src="./img/profil.png" alt="profil" style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%; margin-bottom: 1rem;">

                            <!-- <label for="profile-pic-upload" class="btn btn-outline-primary position-absolute bottom-0 end-0 mb-2 me-2 rounded-circle btn-camera">
                                <box-icon name='camera' color='#0d6efd' class="box-icon mt-2"></box-icon>
                                <input type="file" id="profile-pic-upload" name="foto" style="display: none;">
                                <input type="hidden" name="foto" value="<?= $foto ?>">
                            </label> -->

                        </div>
                        <div class="card-body flex-md-wrap">
                            <h4>
                                <input type="text" name="nama" class="form-control text-center card-title mb-2" value="<?= $nama ?>">
                            </h4>
                            <input type="text" name="username" class="form-control text-center card-text" value="<?= $username ?>">
                        </div>

                    </div>
                    <div class="card-body flex-md-wrap">
                        <h4 class="border-bottom border-primary border-opacity-50 pb-4 text-center">Edit Profil</h4>

                        <div class="card-detail mt-4 d-flex justify-content-start gap-2">
                            <box-icon name='mobile-alt' color='#181818'></box-icon>
                            <input type="text" name="hp" class="text-normal form-control" value="<?= $hp ?>"></input>
                        </div>

                        <div class="card-detail mt-4 d-flex justify-content-start gap-2">
                            <box-icon name='envelope'></box-icon>
                            <input type="email" name="email" class="text-normal form-control" value="<?= $email ?>"></input>
                        </div>

                        <div class="card-detail mt-4 d-flex justify-content-start gap-2">
                            <box-icon name='map' type='solid' color='#FF0000'></box-icon>
                            <input type="text" name="alamat" class="text-normal form-control" value="<?= $alamat ?>"></input>
                        </div>

                        <div class="card-detail mt-4 d-flex justify-content-start gap-2 position-relative">
                            <box-icon name='key'></box-icon>
                            <input type="password" name="password" id="floatingPassword" class="text-normal form-control" value="<?= htmlspecialchars($password) ?>" />
                            <span toggle="#floatingPassword" class="bi bi-eye-fill toggle-password position-absolute top-50 end-0 translate-middle-y me-3" style="cursor: pointer;"></span>
                        </div>

                        <!-- Letakkan script di bawah setelah elemen HTML selesai di-render -->
                        <script>
                            document.querySelector('.toggle-password').addEventListener('click', function() {
                                let passwordField = document.getElementById('floatingPassword');
                                let type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                                passwordField.setAttribute('type', type);

                                // Toggle icon between 'bi-eye-fill' and 'bi-eye-slash-fill'
                                this.classList.toggle('bi-eye-fill');
                                this.classList.toggle('bi-eye-slash-fill');
                            });
                        </script>

                        <button type="submit" class="btn btn-outline-primary text-center gap-1 btn-ubah rounded-pill w-25 mx-auto d-flex justify-content-center align-items-center mt-4 p-2" name="simpan">
                            Simpan
                        </button>
                    </div>

                </form>
            </div>
        </div>

        <script>
            document.getElementById('edit-profile-btn').addEventListener('click', function() {
                document.getElementById('view-profile').classList.add('d-none');
                document.getElementById('edit-profile').classList.remove('d-none');
            });
        </script>

    </div>

    <?php include "footers.php" ?>
    <script>
        document.getElementById('edit-profile-btn').addEventListener('click', function() {
            document.getElementById('view-profile').style.display = 'none';
            document.getElementById('edit-profile').style.display = 'block';
        });
    </script>
    <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>


</html>