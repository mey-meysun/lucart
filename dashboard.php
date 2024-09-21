<?php

include("koneksi.php");

session_start();

if ($_SESSION['role'] !== 'admin') {
    ?>
    <link rel="shortcut icon" href="./img/lucart.jpg" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
         document.addEventListener("DOMContentLoaded", function() {
             Swal.fire({
                 icon: "error",
                 title: "Oops...",
                 text: "Log in terlebih dahulu sebagai admin!",
                 backdrop: "white",
                 showConfirmButton: false,
                 timer: 1500
             }).then(function() {
                 window.location.href = "log-in.php"; // Redirect ke halaman login
             });
         });
     </script>
    <?php
    exit(); // Menghentikan eksekusi script setelah redirect
}


// cek apakah tombol daftar sudah diklik atau blum?
if (isset($_POST['tambah'])) {


    if ($_GET['aksi']) {
        // ambil data dari formulir
        $id = $_GET['id'];

        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $kategori = $_POST['kategori'];
        $deskripsi = $_POST['deskripsi']; 

        if (!empty($foto = $_FILES['foto']['name'])) {
            $foto = $_FILES['foto']['name'];
            $file_tmp = $_FILES['foto']['tmp_name'];
            move_uploaded_file($file_tmp, 'img/' . $foto);

            $edit = mysqli_query($koneksi, "UPDATE product SET nama='$nama', harga='$harga', stok='$stok', kategori='$kategori', foto='$foto', deskripsi='$deskripsi' WHERE id='$id'");
        } else {
            $edit = mysqli_query($koneksi, "UPDATE product SET nama='$nama', harga='$harga', stok='$stok', kategori='$kategori', deskripsi='$deskripsi' WHERE id='$id'");
        }
        // buat query update


        if ($edit) {
            header('Location: dashboard.php#table');
        } else {
            die("Gagal menyimpan perubahan...");
        }
    } else {
        // ambil data dari formulir
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $kategori = $_POST['kategori'];
        $deskripsi = $_POST['deskripsi'];
        $foto = $_FILES['foto']['name'];
        $file_tmp = $_FILES['foto']['tmp_name'];
        move_uploaded_file($file_tmp, 'img/' . $foto);

        $tambah = mysqli_query(
            $koneksi,
            "INSERT INTO product (nama, harga, stok, foto, kategori, deskripsi) 
        values('$nama', '$harga', '$stok', '$foto', '$kategori', '$deskripsi')"
        );


        if ($tambah > 0) {
            header("Location: dashboard.php#table");
        } else {
            echo "Gagal Menambah Data";
        }
    }
}

if (isset($_GET["aksi"])) {
    if ($_GET["aksi"]  == "edit") {
        $id = $_GET['id'];

        $id = mysqli_real_escape_string($koneksi, $id);

        $result = mysqli_query($koneksi, "SELECT * FROM product WHERE id='$id'");

        if ($result) {
            while ($product = mysqli_fetch_array($result)) {
                $nama = $product['nama'];
                $harga = $product['harga'];
                $stok = $product['stok'];
                $kategori = $product['kategori'];
                $foto = $product['foto'];
                $deskripsi = $product['deskripsi'];
            }
        } else {
            echo "Query gagal: " . mysqli_error($koneksi);
        }
    }
}



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
                    <h1 class="h2">Dashboard</h1>
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

                <div class="form">
                    <!-- <h4 class="mb-3">Input Product</h4> -->
                    <form method="POST" enctype="multipart/form-data">
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama Product</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" placeholder="Kaos Ngopi" name="nama" value="<?= @$nama ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-10 d-flex align-items-center">
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" class="form-control" id="harga" aria-label="Amount (to the nearest dollar)" placeholder="100,000" name="harga" value="<?= @$harga ?>">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                            <div class="col-sm-10 d-flex align-items-center">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="stok" placeholder="1000" name="stok" value="<?= @$stok ?>">
                                    <span class="input-group-text">pcs</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10 d-flex align-items-center">
                                <select class="form-select" aria-label="Default select example" id="kategori" name="kategori">
                                    <option selected disabled>-- Pilih --</option>
                                    <option <?= @$kategori == 'Dirgahayu Series' ? "selected" : "" ?>>Indonesia Series
                                    </option>
                                    <option <?= @$kategori == 'Football Series' ? "selected" : "" ?>>Football Series
                                    </option>
                                    <option <?= @$kategori == 'Quotes Series' ? "selected" : "" ?>>Quotes Series
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="inputGroupFile02" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10 d-flex align-items-center">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="inputGroupFile02" name="foto">
                                    <input type="hidden" name="foto" value="<?= @$foto ?>">
                                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10 d-flex align-items-center">
                                <textarea class="form-control" id="deskripsi" rows="3" placeholder="example" name="deskripsi"><?= @$deskripsi ?></textarea>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-center mt-3 mb-5 gap-3">
                            <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
                            <!-- <button type="reset" class="btn btn-danger" name="batal">Batal</button> -->
                        </div>
                    </form>
                </div>

                <h4 class="mb-3 mt-5">Produk Lucart</h4>
                <div class="table-responsive small mb-5" id="table">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Product</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Stok</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Dekskripsi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $id = 1;
                            $result =  mysqli_query(
                                $koneksi,
                                "SELECT * FROM product"
                            );

                            while ($product = mysqli_fetch_array($result)) {
                            ?>
                                <tr>
                                    <td><?= $id++; ?></td>
                                    <td><?= $product['nama'] ?></td>
                                    <td><?= number_format($product['harga'],2)?></td>
                                    <td><?= $product['stok'] ?></td>
                                    <td><?= $product['kategori'] ?></td>
                                    <td><img src="img/<?= $product['foto'] ?>" height="100px"></td>
                                    <td><?= $product['deskripsi'] ?></td>
                                    <td>
                                        <a href="dashboard.php?aksi=edit&id=<?= $product['id'] ?>" class="btn btn-primary"><box-icon name='edit-alt' type='solid' color='#ffffff'></box-icon></a>

                                        <a href="hapus.php?id=<?= $product['id'] ?>" class="mt-2 btn btn-danger" id="delete-btn"><box-icon name='trash-alt' type='solid' color='#ffffff'></box-icon></a>
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
                        text: "Anda yakin ingin menghapus produk ini?",
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