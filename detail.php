<?php include "headers.php"; ?>

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

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        body {
            overflow-x: hidden;
        }

        .navbar {
            justify-content: flex-end;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .container {
            max-width: 90%;
            padding-top: 40px;
        }

        @media (max-width: 768px) {
            .separator {
                font-size: 1.2rem;
                padding: 0 10px;
            }

            .separator::before,
            .separator::after {
                width: 20%;
            }
        }

        @media (max-width: 576px) {
            .separator {
                font-size: 1rem;
                padding: 0 5px;
            }

            .separator::before,
            .separator::after {
                width: 15%;
            }
        }
    </style>

    <link href="./headers/headers.css" rel="stylesheet">

</head>

<body>
    <div class="container py-5">
        <div class="row g-5 py-5" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="800">
            <?php
            include("koneksi.php");
            $id = $_GET['id'];
            $result = mysqli_query($koneksi, "SELECT * FROM product WHERE id='$id'");
            while ($product = mysqli_fetch_array($result)) {
            ?>
                <!-- Gambar Produk -->
                <div class="col-md-6 text-center">
                    <img src="img/<?= $product['foto'] ?>" class="img-fluid w-75">
                </div>

                <!-- Detail Produk -->
                <div class="col-md-6 py-5">
                    <h3 class="fw-bold mb-3"><?= $product['nama'] ?></h3>
                    <h5 class="text-danger mb-4">Rp. <?= number_format($product['harga'], 2) ?></h5>
                    <p class="text-secondary"><?= $product['deskripsi'] ?></p>

                    <!-- Form Pemesanan -->
                    <form method="POST" action="cart.php?id=<?= $product['id']; ?>">
                        <!-- Warna -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Warna</label>
                            <div class="d-flex gap-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="warna" value="hitam" id="warnaBlack" required>
                                    <label class="form-check-label" for="warnaBlack">Hitam</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="warna" value="putih" id="warnaWhite" required>
                                    <label class="form-check-label" for="warnaWhite">Putih</label>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="hidden_nama" value="<?= $product['nama']; ?>">
                        <input type="hidden" name="hidden_harga" value="<?= $product['harga']; ?>">
                        <input type="hidden" name="hidden_foto" value="<?= $product['foto']; ?>">


                        <!-- Ukuran -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Ukuran</label>
                            <div class="d-flex gap-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ukuran" value="S" id="ukuranS" required>
                                    <label class="form-check-label" for="ukuranS">S</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ukuran" value="M" id="ukuranM" required>
                                    <label class="form-check-label" for="ukuranM">M</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ukuran" value="XL" id="ukuranXL" required>
                                    <label class="form-check-label" for="ukuranXL">XL</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ukuran" value="XXL" id="ukuranXXL" required>
                                    <label class="form-check-label" for="ukuranXXL">XXL</label>
                                </div>
                            </div>
                        </div>

                        <!-- Quantity dan Tombol Beli -->
                        <div class="d-flex align-items-center gap-3">
                            <div class="input-group" style="max-width: 150px;">
                                <button type="button" class="btn btn-outline-secondary" onclick="changeQuantity(-1)">-</button>
                                <input type="text" id="quantity" name="jumlah" class="form-control text-center" value="1" min="1">
                                <button type="button" class="btn btn-outline-secondary" onclick="changeQuantity(1)">+</button>
                            </div>

                            <button type="submit" name="add" class="btn btn-primary">
                                <i class="bx bx-cart"></i> Beli Sekarang
                            </button>
                        </div>
                    </form>
                </div>
            <?php } ?>
        </div>


        <div class="other-desain" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="800">
            <div class="desk-cards mt-5 text-center">
                <span class="h3 fw-normal mx-2">Rekomendasi Produk</span>
            </div>
            <div class="cards gap-3 mt-1 mb-5 d-flex flex-column flex-md-row align-items-stretch justify-content-center">
                <?php
                include("koneksi.php");

                $result = mysqli_query($koneksi, "SELECT * FROM product ORDER BY RAND() LIMIT 4");
                while ($product = mysqli_fetch_array($result)) {
                ?>
                    <div class="card border-0" style="width: 100%; max-width: 18rem; margin: 1rem auto;">


                        <img src="img/<?= $product['foto'] ?>" class="card-img-top img-fluid">

                        <div class="card-body">
                            <h5 class="card-title text-center mt-3"><?= $product['nama'] ?></h5>
                        </div>

                        <a href="detail.php?id=<?= $product['id']; ?>" class="btn btn-dark text-center d-flex justify-content-center">
                            <box-icon name='cart-add' type='solid' flip='horizontal' animation='tada' color='#fffefe'></box-icon>Rincian
                        </a>

                    </div>

                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <?php include 'footers.php' ?>
    <script>
        function changeQuantity(amount) {
            var quantityInput = document.getElementById('quantity');
            var currentQuantity = parseInt(quantityInput.value);
            if (!isNaN(currentQuantity)) {
                quantityInput.value = Math.max(1, currentQuantity + amount);
            }
        }
    </script>
    <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>