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
        .container {
            padding-top: 30px;
        }

        .title2 {
            font-size: 24px;
            font-weight: bold;
        }

        .simbol {
            visibility: hidden;
        }

        .receipt {
            background: #fff;
            padding: 20px;
            margin: 0 auto;
            width: 300px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .receipt-header {
            text-align: center;
            border-bottom: 2px dashed #000;
            margin-bottom: 10px;
            padding-bottom: 10px;
        }

        .store-name {
            font-size: 18px;
            font-weight: bold;
        }

        .total-section {
            border-top: 2px dashed #000;
            margin-top: 10px;
            padding-top: 10px;
        }

        .item,
        .total {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }

        .item-name {
            font-weight: bold;
        }

        @media (max-width: 571px) {
            .container {
                padding-top: 80px;
            }
        }

        .receipt {
            display: none;
            /* Secara default disembunyikan */
        }

        @media print {
            body * {
                visibility: hidden;
                /* Menyembunyikan semua elemen dari halaman */
            }

            .receipt {
                display: block;
                visibility: visible;
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                margin: 30% auto;
                width: 80%;
            }

            .receipt * {
                visibility: visible;
            }

            #cetak {
                display: none !important;
            }

            .simbol {
                visibility: visible;
            }

            .simbol img {
                width: 80px;
            }
        }
    </style>
</head>

<body>

    <?php include 'headers.php'; ?>

    <div class="container">

        <div class="print-container">
            <?php
            include 'koneksi.php';
            $id = $_GET['id'];

            $trans = "SELECT * FROM detail INNER JOIN transaksi on detail.id_transaksi = transaksi.id_transaksi WHERE detail.id_transaksi='$id'";
            $query = mysqli_query($koneksi, $trans);
            $data = mysqli_fetch_assoc($query);

            $res = "SELECT * FROM transaksi INNER JOIN users on transaksi.id_pelanggan = users.id WHERE transaksi.id_transaksi='$id'";
            $query = mysqli_query($koneksi, $res);
            $user = mysqli_fetch_assoc($query);
            ?>

            <div class="simbol w-25">
                <img src="./img/lucart-no-bg.png" alt="logo" class="w-25">
            </div>

            <div class="text-center my-4">
                <h3 class="title2">Nota Pembelian</h3>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light text-center">
                        <tr>
                            <th colspan="4">No. Invoice : INV-<?= $id ?></th>
                        </tr>
                        <tr>
                            <th colspan="4">Nama Pembeli : <?= ucfirst($user['nama']) ?></th>
                        </tr>
                        <tr>
                            <th colspan="4">Tanggal Pembelian : <?= $data['tanggal'] ?></th>
                        </tr>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Qty</th>
                            <th>Warna</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $prod = "SELECT * FROM detail 
                     INNER JOIN product ON detail.id_produk = product.id 
                     WHERE detail.id_transaksi='$id'";
                        $query2 = mysqli_query($koneksi, $prod);

                        while ($row = mysqli_fetch_array($query2)) {
                        ?>
                            <tr>
                                <td class="text-center"><?= $row['nama'] ?></td>
                                <td class="text-center"><?= $row['jumlah'] ?></td>
                                <td class="text-center"><?= $row['warna'] ?></td>
                                <td class="text-center">Rp <?= number_format($row['harga'], 2); ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                        <tr class="table-active">
                            <td colspan="3" class="text-start"><strong>Grand Total</strong></td>
                            <td colspan="2" class="text-end"><strong>Rp <?= number_format($data['total_harga'], 2); ?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center my-3 mb-5 mt-4">
                <button class="btn btn-primary d-flex align-items-center" onclick="cetak()" id="cetak">
                    <box-icon name='printer' color='#ffffff'></box-icon>
                    <span class="ms-2">Cetak Nota</span>
                </button>
            </div>

            <div class="receipt bg-white">
                <div class="receipt-header">
                    <div class="simbol">
                        <img src="./img/lucart-no-bg.png" alt="logo">
                    </div>
                    <div class="store-name mt-3 mb-1"><strong>No. Invoice : INV-<?= $id ?></div>
                    <div class="store-name-user mb-1">Nama Pembeli : <?= ucfirst($user['nama']) ?></div>
                    <div class="store-date mb-4">Tanggal Pembelian : <?= $data['tanggal'] ?></div>
                </div>

                <div class="receipt-body">
                    <div class="item">
                        <?php
                        $prod = "SELECT * FROM detail INNER JOIN product on detail.id_produk = product.id WHERE detail.id_transaksi='$id'";
                        $query2 = mysqli_query($koneksi, $prod);

                        while ($row = mysqli_fetch_array($query2)) {
                        ?>
                            <div class="item-name"><?= $row['nama'] ?>
                                <br>
                                <?= ucfirst($row['warna'])?> &nbsp; | &nbsp; <?= $row['ukuran'] ?>
                            </div>
                            <div class="item-price"><?= $row['jumlah'] ?></div>
                        <?php
                        }
                        ?>
                    </div>
                </div>

                <div class="total-section">
                    <div class="total">
                        <div>Total</div>
                        <div><strong>Rp <?= number_format($data['total_harga'], 2); ?></strong></div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <p>Terima Kasih!</p>
                    <p>Silahkan datang kembali</p>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footers.php'; ?>

    <script>
        function cetak() {
            document.getElementById("cetak").style.display = 'none';

            setTimeout(function() {
                window.print();
                document.getElementById("cetak").style.display = 'block';
            }, 100);
        }
    </script>


</body>

</html>