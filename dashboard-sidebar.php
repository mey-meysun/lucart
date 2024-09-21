<?php
include 'koneksi.php';

// Ambil username dari sesi
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lucart | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="./img/lucart.jpg" type="image/x-icon">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      
    </style>


    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="./dashboard/dashboard.css" rel="stylesheet">
</head>



<body>

    <!-- <div class="container-fluid">
        <div class="row"> -->
    <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
        <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
            <div class="offcanvas-header">
                <a class="bg-light col-md-3 col-lg-2 me-0 px-3 fs-6 p-3" href="#"><img class="logo w-25" src="./img/lucart-no-bg.png" alt=""></a>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto h-100">
                <ul class="nav flex-column">

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-2 text-body-secondary ">
                        <span class="fs-noarmal h5">Hello <span style="margin-left: 5px;"><?= ucfirst($username) ?></span></span>
                        <a class="link-secondary" href="#" aria-label="Add a new report">
                            <box-icon name='wink-smile' animation='tada'></box-icon>
                        </a>
                    </h6>


                    <li class="nav-item">
                        <a class="nav-link active d-flex align-items-center gap-2 " aria-current="page" href="dashboard.php">
                            <svg class="bi">
                                <use xlink:href="#house-fill" />
                            </svg>
                            Dasbor
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    <svg class="bi">
                                        <use xlink:href="#cart" />
                                    </svg>
                                    Products
                                </a>
                            </li> -->
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-2" href="customer.php">
                            <svg class="bi">
                                <use xlink:href="#people" />
                            </svg>
                            Pelanggan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-2" href="orders.php">
                            <svg class="bi">
                                <use xlink:href="#file-earmark" />
                            </svg>
                            Order
                        </a>
                    </li>

                    <hr class="my-3">

                    <ul class="nav flex-column mb-auto">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 log-out" href="log-out.php">
                                <svg class="bi">
                                    <use xlink:href="#door-closed" />
                                </svg>
                                Keluar
                            </a>
                        </li>
                    </ul>
            </div>
        </div>
    </div>
    <!-- </div>
    </div> -->
    <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script>
    <script src="dashboard.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script>
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
                        }
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