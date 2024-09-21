<?php
session_start();
$isLoggedIn = isset($_SESSION['username']); // Cek apakah pengguna sudah login
?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lucart | Make a new step</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="./img/lucart.jpg" type="image/x-icon">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/navbars/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

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

        .img {
            filter: brightness(75%);
        }

        .desk-cards {
            padding-top: 50px;
            padding-bottom: 50px;
        }

        .btn-outline-dark {
            display: flex;
            align-items: center;
            transition: .3s ease-in-out;
        }

        .btn-outline-dark .box-icon {
            margin-left: 15px;
        }

        .btn-outline-dark:hover {
            font-weight: bold;
            background-color: white;
            transform: translateY(-5px);
        }

        * {
            scroll-behavior: smooth;
            font-family: 'quicksand';
        }

        .cards {
            padding: 50px 0;
        }

        .cari {
            transition: 0.2 ease-in-out;
        }

        .cari:hover {
            transform: scale(1.25);
            border: none;
        }

        .fixed-top {
            background-color: white;
        }

        .close-btn {
            background-color: transparent;
            border: none;
            color: inherit;
            padding: 0;
            cursor: pointer;
        }

        .close-btn box-icon {
            color: #000;
        }

        @media (max-width: 767px) {
            #closeNavbar {
                display: block;
            }
        }

        @media (min-width: 992px) {
            #closeNavbar {
                display: none;
            }
        }

    </style>

    </style>


    <!-- Custom styles for this template -->
    <link href="./navbars/navbars.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <!-- header start -->
        <nav class="navbar navbar-expand-lg mb-1 fixed-top py-3 px-lg-5 px-md-0 px-0">
            <div class="container-fluid">
                <div class="logo ms-3 ms-md-3">
                    <a href="index.php" class="navbar-brand">
                        <img src="./img/lucart-no-bg.png" class="w-25 w-lg-25" alt="Lucart">
                    </a>
                </div>
                <!-- Toggler button, only visible on small screens -->
                <button class="navbar-toggler btn-primary d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="outline: none; box-shadow: none; border: none;">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-5 mb-2 mb-lg-0 gap-0 text-primary gap-md-3 px-3 px-md-0">
                        <li><a href="index.php" class="nav-link text-primary mt-4 mt-md-0">Beranda</a></li>
                        <li><a href="about.php" class="nav-link text-primary">Tentang</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-primary" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Produk
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item text-secondary" href="index.php#new-relase">Baru Dirilis <i class="fa-solid fa-arrow-right"></i></a></li>
                                <li><a class="dropdown-item text-secondary" href="index.php#dirgahayu-series">Dirgahayu Series</a></li>
                                <!-- <li><a class="dropdown-item text-secondary" href="index.php#best-seller">Best Seller</a></li> -->
                                <li><a class="dropdown-item text-secondary" href="product.php">Semua Produk</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.php" class="nav-link text-primary">Kontak</a></li>
                    </ul>

                    <form action="product.php" class="me-5 px-3 px-md-0 mt-md-4 mt-lg-0" method="get">
                        <div class="position-relative w-100 me-5">
                            <input type="search" class="form-control pe-5" placeholder="Cari..." aria-label="Search" name="search">
                            <div class="position-absolute top-50 translate-middle-y end-0 me-2">
                                <button type="submit" name="cari" class="btn bg-transparent btn-outline-none cari"><box-icon name='search' class="mt-2"></box-icon></button>
                            </div>
                        </div>
                    </form>

                    <div class="col-md-12 col-lg-3 d-flex align-items-center justify-content-center mt-md-4 mt-3 mt-lg-0">
                        <?php if ($isLoggedIn) : ?>
                            <a href="cart.php" class="nav-link me-2"><box-icon type='solid' name='cart-alt' class="mt-1"></box-icon></a>
                            <a class="nav-link me-4" href="profil.php"><box-icon type='solid' name='user-circle'></box-icon></a>
                            <a class="text-danger text-decoration-none d-flex justify-content-center align-items-center gap-1 me-2 ms-2 log-out" href="log-out.php"><box-icon name='log-out' rotate='180' color='#e80303'></box-icon> Keluar</a>
                        <?php else : ?>
                            <a class="btn btn-outline-primary me-2 ms-2" href="log-in.php">Masuk</a>
                            <a class="btn btn-primary me-2 ms-2" href="sign-up.php">Daftar</a>
                        <?php endif; ?>
                    </div>

                    <button class="close-btn btn-light d-lg-none mt-md-4" id="closeNavbar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="48" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: msFilter">
                            <path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path>
                        </svg>
                    </button>

                </div>
            </div>
        </nav>
    </div>


    <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script>
    <script src="dashboard.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const closeBtn = document.getElementById('closeNavbar');
            const navbarCollapse = document.getElementById('navbarNav');

            closeBtn.addEventListener('click', function() {
                navbarCollapse.classList.remove('show');
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Menangkap semua tombol delete
            document.querySelectorAll('.log-out').forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault(); // Menghentikan aksi default

                    const href = this.getAttribute('href'); // Mendapatkan URL dari atribut href

                    Swal.fire({
                        title: 'Konfirmasi Log out',
                        text: "Anda yakin ingin keluar?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Keluar',
                        cancelButtonText: 'Batal',
                        customClass: {
                            container: 'custom-container',
                            popup: 'custom-popup'
                        },
                        backdrop: 'none'

                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Jika user menekan tombol 'Hapus'
                            window.location.href = href; // Mengarahkan ke URL yang sesuai
                        }
                    });
                });
            });
        });
    </script>
    
</body>

</html>