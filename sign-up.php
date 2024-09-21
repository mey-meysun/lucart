<?php
include("koneksi.php");
include("headers.php");

// cek apakah tombol daftar sudah diklik atau belum?
if (isset($_POST['tambah'])) {
    // ambil data dari formulir
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $hp = mysqli_real_escape_string($koneksi, $_POST['hp']);
    $role = 'user';

    // Query untuk memeriksa apakah username sudah ada di tabel 'users'
    $result = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username'");

    if (mysqli_num_rows($result) == 0) {
        // Insert data pengguna baru ke tabel 'users'
        $tambah = mysqli_query(
            $koneksi,
            "INSERT INTO users (nama, email, password, username, alamat, hp, role) 
            VALUES ('$nama', '$email', '$password', '$username', '$alamat', '$hp', '$role')"
        );

        if ($tambah) {
?>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Sign Up Berhasil!',
                        text: 'Silahkan Log-in terlebih dahulu..',
                        showConfirmButton: false,
                        timer: 2500,
                        backdrop: 'white'
                    }).then(function() {
                        window.location.href = 'log-in.php';
                    });
                });
            </script>
        <?php
        } else {
            echo "Gagal Menambah Data";
        }
    } else {
        ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Username sudah ada.',
                    text: 'Silahkan memakai username lain..',
                    showConfirmButton: false,
                    timer: 2500,
                    backdrop: 'white'
                }).then(function() {
                    window.location.href = 'index.php';
                });
            });
        </script>
<?php
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lucart | Make a new step</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="./img/lucart.jpg" type="image/x-icon">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/headers/">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">



    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
        }

        .nav-link:hover {
            color: #5a23c8;
        }


        * {
            scroll-behavior: smooth;
            font-family: 'quicksand';
        }


        .separator {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 1rem 0;
        }

        .separator::before,
        .separator::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #ddd;
        }

        .separator::before {
            margin-right: .25em;
        }

        .separator::after {
            margin-left: .25em;
        }

        .container {
            padding-top: 50px;
        }

        .form {
            width: 50%;
            margin: auto;
        }

        @media (max-width: 568px) {
            .form {
                width: 80%;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="./sign-in/sign-in.css" rel="stylesheet">
</head>

<body>

    <div class="container m-auto">
        <div class="form-header d-flex justify-content-center align-items-center">
            <h1 class="h2 fw-normal mt-2 mb-5">Daftar <box-icon name='user' type='solid' animation='tada'></box-icon></h1>
        </div>
        <div class="form">
            <form method="POST" class="needs-validation" novalidate>
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" placeholder="John" name="nama" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" placeholder="example@gmail.com" name="email" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" placeholder="Albert John" name="username" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <div class="input-group position-relative">
                            <input type="password" class="form-control" id="password" placeholder="*****" name="password" required>
                            <span class="bi bi-eye-fill toggle-password position-absolute top-50 end-0 translate-middle-y me-3" style="cursor: pointer;"></span>
                        </div>
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        document.querySelector('.toggle-password').addEventListener('click', function() {
                            let passwordField = document.getElementById('password');
                            let type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                            passwordField.setAttribute('type', type);

                            // Toggle icon between 'bi-eye-fill' and 'bi-eye-slash-fill'
                            this.classList.toggle('bi-eye-fill');
                            this.classList.toggle('bi-eye-slash-fill');
                        });
                    });
                </script>


                <div class="mb-3 row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10 d-flex align-items-center">
                        <textarea class="form-control" id="alamat" rows="3" placeholder="Jl. Jalan" name="alamat" required></textarea>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="hp" class="col-sm-2 col-form-label">No Hp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="hp" placeholder="08****" name="hp" required>
                    </div>
                </div>

                <!-- <div class="form-check text-start my-3 mt-3">
                    <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Remember me
                    </label>
                </div>
                 -->
                <button class="btn btn-primary w-100 py-2 mt-2 mb-1" type="submit" name="tambah">Sign up</button>

                <p style="font-size: 16px;" class="mt-4 text-center text-secondary">Have account? <a href="log-in.php" class="text-decoration-none">Log In</a></p>
            </form>
        </div>
    </div>

    <?php include 'footers.php'; ?>


    <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>

</html>