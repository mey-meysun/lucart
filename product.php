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
        * {
            scroll-behavior: smooth;
            padding: 0;
            margin: 0;
            font-family: 'quicksand';
        }

        .cards {
            padding: 50px 0;
        }

        .container {
            padding-top: 40px;
        }
    </style>

    <!-- Custom styles for this template -->
    <link href="./headers/headers.css" rel="stylesheet">
</head>

<body>
    <?php include 'headers.php'; ?>

    <div class="container">
        <!-- header start -->
        <!-- header finish -->
        <div class="product">

            <?php
            include("koneksi.php");

            // Jika ada parameter pencarian, tampilkan hasil pencarian
            if (isset($_GET['search']) && !empty($_GET['search'])) {
                $search = mysqli_real_escape_string($koneksi, $_GET['search']);
            ?>
                <p class="h5 fw-normal mt-5 px-3 px-md-0">Hasil dari penelusuran <b>"<?= $search ?>"</b></p>

                <div class="cards gap-5 mt-1 mb-5 d-flex align-items-center justify-content-center flex-wrap" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500">
                    <?php
                    $result = mysqli_query(
                        $koneksi,
                        "SELECT * FROM product WHERE nama LIKE '%$search%'"
                    );
                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($product = mysqli_fetch_array($result)) {
                    ?>
                            <div class="card border-0" style="width: 18rem; margin: 0 1rem;">
                                <img src="img/<?= $product['foto'] ?>" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title text-center mt-3"><?= $product['nama'] ?></h5>
                                    <a href="detail.php?id=<?= $product['id']; ?>" class="btn btn-dark text-center d-flex justify-content-center">
                                        <box-icon name='cart-add' type='solid' flip='horizontal' animation='tada' color='#fffefe'></box-icon>Rincian
                                    </a>
                                </div>
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <p class='text-center'>Tidak Ditemukan.</p>
                    <?php
                    }
                } else {
                    ?>
                    <h1 class="text-center mb-5 mt-5">Semua Produk</h1>
                    <?php
                    $categories = ['Dirgahayu Series', 'Quotes Series', 'Football Series'];
                    foreach ($categories as $category) {
                        $category_id = strtolower(str_replace(' ', '-', $category));

                        if ($category === 'Dirgahayu Series') {
                            $category_id = 'dirgahayu-series';
                        } elseif ($category === 'Quotes Series') {
                            $category_id = 'quotes-series';
                        } elseif ($category === 'Football Series') {
                            $category_id = 'football-series';
                        }

                    ?>
                        <div class='category' id="<?= $category_id ?>" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500">
                            <h5 class='ps-5 mt-3'><?= $category ?></h5>
                            <div class="cards gap-5 mt-1 mb-5 d-flex justify-content-center flex-wrap" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500">
                                <?php
                                $result = mysqli_query(
                                    $koneksi,
                                    "SELECT * FROM product WHERE kategori='$category'"
                                );
                                while ($product = mysqli_fetch_array($result)) {
                                ?>
                                    <div class="card border-0" style="width: 18rem;">
                                        <img src="img/<?= $product['foto'] ?>" class="card-img-top" alt="<?= $product['nama'] ?>">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title text-center mt-3"><?= $product['nama'] ?></h5>
                                            <a href="detail.php?id=<?= $product['id']; ?>" class="btn btn-dark mt-auto text-center d-flex justify-content-center">
                                                <box-icon name='cart-add' type='solid' flip='horizontal' animation='tada' color='#fffefe'></box-icon> Rincian
                                            </a>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
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