<?php
include 'koneksi.php';
include 'headers.php';

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    $result = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");

    if ($data = mysqli_fetch_array($result)) {
        // Role berdasarkan data yang ditemukan di database
        $_SESSION['id'] = $data['id'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['password'] = $data['password'];
        $_SESSION['role'] = $data['role'];

        if ($data['role'] == 'admin') {
?>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Hello <?= ucfirst($username) ?>!',
                        showConfirmButton: false,
                        timer: 1500,
                        backdrop: 'white'
                    }).then(function() {
                        window.location.href = 'dashboard.php';
                    });
                });
            </script>
        <?php
        } elseif ($data['role'] == 'user') {
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['alamat'] = $data['alamat'];
            $_SESSION['hp'] = $data['hp'];

        ?>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Hello <?= ucfirst($username) ?>!',
                        showConfirmButton: false,
                        timer: 1500,
                        backdrop: 'white'
                    }).then(function() {
                        window.location.href = 'profil.php?status=sukses';
                    });
                });
            </script>
        <?php
        }
    } else {
        // Jika username atau password salah
        ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Username atau Password Salah!',
                    footer: '<a href="#">Kenapa saya mengalami masalah ini?</a>',
                    backdrop: 'white'
                });
            });
        </script>
<?php
    }

    $koneksi->close();
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
            padding-top: 40px;
            margin-bottom: 75px;
        }
    </style>

    <!-- Custom styles for this template -->
    <link href="./sign-in/sign-in.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="form-signin w-md-50 w-100 m-auto">
            <form action="" method="post">
                <h1 class="h3 mb-3 fw-normal">Masuk <box-icon name='user' type='solid' animation='tada'></box-icon></h1>

                <div class="form-floating mt-5">
                    <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
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

                <!-- <div class="form-check text-start my-3 mt-1 text-end">
                    <p><a href="#" class="text-decoration-none">Forgot Password?</a></p>
                </div> -->

                <button id="loginButton" class="btn btn-primary w-100 py-2 mt-2 mb-1" name="login" type="submit">Log in</button>
                <!-- <div class="separator text-secondary">or</div> -->

                <!-- <div class="d-flex justify-content-center">
                    <a href="#" class="btn btn-outline-dark d-flex align-items-center">
                        <img src="https://img.icons8.com/color/16/000000/google-logo.png" class="me-2"> Log in with Google
                    </a>
                </div> -->

                <p style="font-size: 16px;" class="mt-4 text-center text-secondary">New customer? <a href="sign-up.php" class="text-decoration-none">Sign Up</a></p>
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

    <!-- <script>
        document.getElementById('loginButton').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent form submission
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Something went wrong!",
                footer: '<a href="#">Why do I have this issue?</a>'
            });
        });
    </script> -->

</body>

</html>