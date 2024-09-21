<?php
include 'headers.php';
include 'koneksi.php';

// Ambil id dari sesi pengguna yang sedang login
$id = $_SESSION['id'];
if ($_SESSION['role'] !== 'user') {
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
                timer: 1500
            }).then(function() {
                window.location.href = "log-in.php";
            });
        });
    </script>
<?php
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lucart | Transaction History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="./img/lucart.jpg" type="image/x-icon">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        .container {
            padding-top: 40px;
        }

        .order-card {
            border: 1px solid #ccc;
            margin-bottom: 20px;
            border-radius: 5px;
            padding: 15px;
        }

        .product-img {
            width: 80px;
            height: auto;
        }

        .status {
            font-weight: bold;
            color: #ff6700;
        }

        .order-info {
            font-size: 14px;
            color: #555;
        }

        .btn-track {
            background-color: #ff6700;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
        }
    </style>

    <link href="./features/features.css" rel="stylesheet">

</head>

<body>
    <div class="container mt-5">
        <h1 class="h2 mt-2 mb-4">Transaction History</h1>

        <div class="mb-5" id="order-list">
    <?php
    // Query untuk mengambil data transaksi berdasarkan id pelanggan
    $result = mysqli_query(
        $koneksi,
        "SELECT product.foto, product.nama, detail.jumlah, detail.warna, detail.ukuran, transaksi.total_harga, transaksi.id_transaksi, transaksi.tanggal 
         FROM detail
         JOIN product ON detail.id_produk = product.id 
         JOIN transaksi ON detail.id_transaksi = transaksi.id_transaksi
         WHERE transaksi.id_pelanggan='$id'"
    );

    // Pengecekan apakah ada transaksi atau tidak
    if (mysqli_num_rows($result) == 0): ?>
        <div class="alert alert-warning mt-3 d-flex align-items-center gap-1" role="alert">
            <box-icon name='info-circle' color='#2843e2'></box-icon>
            <h6 class="mt-1 fw-normal">Anda belum memiliki histori transaksi saat ini. 
                <a href="product.php" class="text-decoration-none text-default fw-semi-bold ms-1">Mulai Berbelanja</a>
            </h6>
        </div>
    <?php else: ?>
        <?php 
        // Tampilkan hasilnya dalam daftar transaksi
        while ($transaksi = mysqli_fetch_array($result)) { ?>
            <div class="order-card">
                <div class="row">
                    <div class="col-md-2">
                        <img src="img/<?= htmlspecialchars($transaksi['foto']) ?>" class="product-img" alt="<?= htmlspecialchars($transaksi['nama']) ?>">
                    </div>
                    <div class="col-md-6">
                        <h5 class="mb-2"><?= htmlspecialchars($transaksi['nama']) ?></h5>
                        <p class="order-info mb-1">
                            <?= ucfirst(htmlspecialchars($transaksi['warna'])) ?> &nbsp; | &nbsp; <?= htmlspecialchars($transaksi['ukuran']) ?>
                        </p>
                        <p class="order-info mb-1">Jumlah: <?= htmlspecialchars($transaksi['jumlah']) ?></p>
                        <p class="order-info mb-1">Total: Rp <?= number_format($transaksi['total_harga'], 2) ?></p>
                    </div>

                    <div class="col-md-2 text-end py-3">
                        <p class="order-info">Tanggal: <?= date("d M Y", strtotime($transaksi['tanggal'])) ?></p>
                        <a href="cetak.php?id=<?= htmlspecialchars($transaksi['id_transaksi']) ?>" class="btn-track text-decoration-none">Lihat Detail</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php endif; ?>
</div>

    </div>

    <?php include "footers.php" ?>
    <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>