<?php

include("koneksi.php");

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $result =  mysqli_query($koneksi, "SELECT username FROM users WHERE id=$id");
    $row = mysqli_fetch_assoc($result);


    if ($row) {
        // apakah query hapus berhasil?
        $username = $row['username'];

        // buat query hapus
        $query = mysqli_query($koneksi, "DELETE FROM users WHERE id=$id");
        if ($query) {
?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "<?= $username ?> sudah terhapus!",
                        showConfirmButton: false,
                        timer: 2000,
                        backdrop: 'none'
                    }).then(function() {
                        window.location.href = 'customer.php#table';
                    });
                });
            </script>
        <?php

        } else {
        ?>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        position: "top-end",
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Data tidak ditemukan..',
                        timer: 2000,
                        footer: '<a href=\"#\">Why do I have this issue?</a>',
                        backdrop: 'none'
                    });
                });
            </script>
        <?php
        };
    } else {
        ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    position: "top-end",
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Gagal menghapus..',
                    timer: 2000,
                    footer: '<a href=\"#\">Why do I have this issue?</a>',
                    backdrop: 'none'
                });
            });
        </script>
<?php
    };
};
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="./dashboard/dashboard.css" rel="stylesheet">
</head>

<body>
    <?php include 'dashboard-header.php' ?>

    <div class="container-fluid">
        <div class="row">
            <?php include 'dashboard-sidebar.php' ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Pelanggan Lucart</h1>
                    <!-- <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
                            <svg class="bi">
                                <use xlink:href="#calendar3" />
                            </svg>
                            This week
                        </button>
                    </div> -->
                </div>

                <!-- <h4 class="mb-3 mt-5">Customer Lucart</h4> -->
                <div class="table-responsive small mb-5" id="table">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password</th>
                                <th scope="col">Username</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">No Hp</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'koneksi.php';

                            $id = 1;
                            $result = mysqli_query(
                                $koneksi,
                                "SELECT * FROM users WHERE role='user'"
                            );

                            while ($customer = mysqli_fetch_array($result)) {
                                $passwordLength = strlen($customer['password']);
                                $maskedPassword = str_repeat('*', $passwordLength);
                            ?>
                                <tr>
                                    <td><?= $id++; ?></td>
                                    <td><?= htmlspecialchars($customer['nama']) ?></td>
                                    <td><?= htmlspecialchars($customer['email']) ?></td>
                                    <td><?= $maskedPassword ?></td>
                                    <td><?= htmlspecialchars($customer['username']) ?></td>
                                    <td><?= htmlspecialchars($customer['alamat']) ?></td>
                                    <td><?= htmlspecialchars($customer['hp']) ?></td>
                                    <td>
                                        <!-- <a href="dashboard.php?aksi=edit&id=<?= $customer['id'] ?>" class="btn btn-primary"><box-icon name='edit-alt' type='solid' color='#ffffff'></box-icon></a> -->

                                        <a href="customer.php?id=<?= $customer['id'] ?>" class="btn btn-danger" id="delete-btn"><box-icon name='trash-alt' type='solid' color='#ffffff'></box-icon></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </main>
        </div>
    </div>


    <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script>
    <script src="dashboard.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Menangkap semua tombol delete
            document.querySelectorAll('.btn-danger').forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault(); // Menghentikan aksi default

                    const href = this.getAttribute('href'); // Mendapatkan URL dari atribut href

                    Swal.fire({
                        title: 'Konfirmasi Hapus',
                        text: "Anda yakin ingin menghapus?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Hapus',
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

</html>