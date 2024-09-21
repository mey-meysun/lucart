<?php
include 'headers.php';
include 'koneksi.php';

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

$id = $_SESSION['id'];

if (isset($_POST['add'])) {
    if (isset($_SESSION['cart'])) {
        $item_array_id = array_column($_SESSION['cart'], "id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["cart"]);
            $item_array = array(
                'id' => $_GET["id"],
                'nama' => $_POST["hidden_nama"],
                'harga' => $_POST["hidden_harga"],
                'foto' => $_POST["hidden_foto"],
                'warna' => $_POST["warna"],
                'ukuran' => $_POST["ukuran"],
                'jumlah' => $_POST["jumlah"]
            );

            $_SESSION["cart"][$count] = $item_array;

    ?>
            <link rel="shortcut icon" href="./img/lucart.jpg" type="image/x-icon">
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        text: "<?= $item_array['nama'] ?> berhasil dimasukkan ke keranjang!",
                        showConfirmButton: false,
                        timer: 2500,
                        backdrop: 'white'
                    }).then(function() {
                        window.location.href = 'cart.php#table';
                    });
                });
            </script>
        <?php
        } else {
        ?>
            <link rel="shortcut icon" href="./img/lucart.jpg" type="image/x-icon">
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: "warning",
                        text: "<?= $item_array['nama'] ?> sudah ada di keranjang!",
                        backdrop: "white",
                        showConfirmButton: false,
                        timer: 2000
                    }).then(function() {
                        window.location.href = 'cart.php#table';
                    });
                });
            </script>
        <?php
        }
    } else {
        $item_array = array(
            'id' => $_GET["id"],
            'nama' => $_POST["hidden_nama"],
            'harga' => $_POST["hidden_harga"],
            'foto' => $_POST["hidden_foto"],
            'warna' => $_POST["warna"],
            'ukuran' => $_POST["ukuran"],
            'jumlah' => $_POST["jumlah"]
        );

        $_SESSION["cart"][0] = $item_array;

        ?>
        <link rel="shortcut icon" href="./img/lucart.jpg" type="image/x-icon">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    text: "<?= $item_array['nama'] ?> berhasil dimasukkan ke keranjang!",
                    showConfirmButton: false,
                    timer: 2500,
                    backdrop: 'white'
                }).then(function() {
                    window.location.href = 'cart.php#table';
                });
            });
        </script>
        <?php
    }
}

if (isset($_GET["aksi"])) {
    if ($_GET["aksi"] == "hapus") {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $itemDihapus = false;
            foreach ($_SESSION["cart"] as $key => $value) {
                if ($value['id'] == $id) {
                    $nama = $value['nama'];
                    unset($_SESSION['cart'][$key]);
                    $itemDihapus = true;

        ?>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                text: "<?= $nama ?> sudah terhapus!",
                                showConfirmButton: false,
                                timer: 1000,
                                backdrop: 'white'
                            }).then(function() {
                                window.location.href = 'cart.php#table';
                            });
                        });
                    </script>
                <?php
                    break;
                }
            }

            if (!$itemDihapus) {
                ?>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            position: "center",
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Gagal menghapus..',
                            timer: 1000,
                            // footer: '<a href=\"#\">Why do I have this issue?</a>',
                            backdrop: 'white'
                        }).then(function() {
                            window.location.href = 'cart.php#table';
                        });
                    });
                </script>
            <?php
            }
        }
    } elseif ($_GET["aksi"] == "beli") {
        $total = 0;

        foreach ($_SESSION["cart"] as $key => $value) {
            $total += ($value['jumlah'] * $value['harga']);
        }
        $query = mysqli_query($koneksi, "INSERT INTO transaksi(tanggal, id_pelanggan, total_harga) VALUES ('" . date("Y-m-d") . "', '$id', '$total')");

        $id_transaksi = mysqli_insert_id($koneksi);

        foreach ($_SESSION["cart"] as $key => $value) {
            $id_produk = $value["id"];
            $jumlah = $value["jumlah"];
            $warna = $value["warna"];
            $ukuran = $value["ukuran"];
            $sql = "INSERT INTO detail(id_transaksi,id_produk,jumlah,warna,ukuran) VALUES ('$id_transaksi','$id_produk','$jumlah','$warna','$ukuran')";
            $res = mysqli_query($koneksi, $sql);
        }
        if ($res > 0) {
            unset($_SESSION['cart']);
            ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: "Terima Kasih!",
                        text: "Terima kasih sudah berbelanja di Lucart. Kami berharap Anda puas dengan produk kami.",
                        icon: "success",
                        confirmButtonText: "Lihat Nota",
                        timer: 5000,
                        backdrop: 'white'
                    }).then(function() {
                        window.location.href = 'cetak.php?id=<?php echo $id_transaksi; ?>';
                    });

                });
            </script>
<?php
        }
    }
}
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lucart | Make a new step</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="./img/lucart.jpg" type="image/x-icon">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .order-container {
            display: flex;
            justify-content: center;
            position: relative;
            padding-bottom: 8px;
        }

        .order {
            position: relative;
            display: inline-block;
            padding-bottom: 30px;
        }

        .order::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            width: 70px;
            border-bottom: 2px solid #000;
        }

        .container {
            padding-top: 50px;
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="order-container">
            <h3 class="order mb-3 text-center">Rincian Order</h3>
        </div>

        <div class="table-responsive small" id="table">
            <table class="table table-striped table-sm">
                <?php if (empty($_SESSION['cart']) || !isset($_SESSION['cart'])): ?>
                    <div class="alert alert-info mt-3 d-flex align-items-center gap-1" role="alert">
                        <box-icon name='info-circle' color='#2843e2'></box-icon>
                        <h6 class="mt-1 fw-normal">Keranjang Anda saat ini masih kosong. <a href="product.php" class="text-decoration-none text-default fw-semi-bold ms-1">Mulai Berbelanja</a></h6>
                    </div>
                <?php else: ?>
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Warna</th>
                            <th scope="col">Ukuran</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        foreach ($_SESSION["cart"] as $key => $value):
                        ?>
                            <tr style="vertical-align: middle;">
                                <td>
                                    <a href="detail.php?id=<?= $value['id']; ?>">
                                        <img src="img/<?= $value['foto'] ?>" height="100px">
                                    </a>
                                    <?= $value['nama'] ?>
                                </td>
                                <td><?= $value['jumlah'] ?></td>
                                <td><?= $value['warna'] ?></td>
                                <td><?= $value['ukuran'] ?></td>
                                <td>Rp. <?php echo number_format($value['harga'], 2) ?></td>
                                <td>
                                    Rp. <?php echo number_format($value['jumlah'] * $value['harga'], 2); ?>
                                </td>
                                <td>
                                    <a href="cart.php?aksi=hapus&id=<?= $value['id'] ?>" class="btn btn-danger" id="delete-btn">
                                        <box-icon name='trash-alt' type='solid' color='#ffffff'></box-icon>
                                    </a>
                                </td>
                            </tr>
                        <?php
                            $total += ($value['jumlah'] * $value['harga']);
                        endforeach;
                        ?>
                        <tr style="vertical-align: middle;">
                            <td colspan="5" class="text-end fw-bold">Total:</td>
                            <td>Rp. <?php echo number_format($total, 2); ?></td>
                            <td>
                                <a href="cart.php?aksi=beli" class="btn btn-primary fw-medium" style="vertical-align: middle;">
                                    Beli
                                </a>
                            </td>
                        </tr>
                    </tbody>
                <?php endif; ?>
            </table>
        </div>

        <div class="mt-1 d-flex align-items-center justify-content-center">
            <a href="index.php" class="btn btn-dark d-flex align-items-center text-white">
                Kembali ke beranda
            </a>
        </div>
    </div>
    <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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

<?php include 'footers.php'; ?>

</html>