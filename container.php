<?php



?>







<!DOCTYPE html>

<head>

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


    <style>
        .carousel-item {
            height: 565px;
        }

        .carousel-item img {
            height: 100%;
            width: 100%;
            object-fit: cover;
            filter: brightness(50%);
        }

        .desk-cards {
            padding-top: 50px;
            padding-bottom: 50px;
        }

        .view .button {
            display: flex;
            align-items: center;
            transition: .3s ease-in-out;
        }

        .view .button:hover {
            font-weight: bold;
            background-color: white;
            transform: translateY(-5px);
        }

        * {
            scroll-behavior: smooth;
            padding: 0;
            margin: 0;
            font-family: 'quicksand';
        }

        .img-logo {
            width: 50px;
        }

        .button .icon {
            margin-left: 8px;
        }

        .container {
            padding-top: 15px;
        }

        .testimonial img {
            border-radius: 50%;
            width: 60px;
            height: 60px;
            object-fit: cover;
        }

        .testimonial-name {
            font-weight: bold;
        }

        .testimonial-company {
            color: #aaa;
        }

        .bg-foto {
            background-image: url(./img/product.jpg);
            height: 100%;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-color: rgba(0, 0, 0, 0.8);
            background-blend-mode: overlay;
        }

        .inner {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .carousel-item {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 10px;
            /* Mengurangi padding untuk mendekatkan review */
        }

        .testimonial {
            background-color: white;
            color: black;
            padding: 20px;
            border-radius: 10px;
            /* max-height: 350px; */
            overflow: hidden;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .indi {
            position: absolute;
            bottom: 10px;
            top: 70%;
            display: flex;
            justify-content: center;
            gap: 5px;
        }

        /* Style for the indicator buttons */
        .indi button {
            background-color: rgba(255, 255, 255, 0.5);
            width: 12px;
            height: 12px;
            border-radius: 50%;
            border: none;
            outline: none;
        }

        /* Style for the active indicator button */
        .indi .active {
            background-color: #fff;
        }

        .card {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .card-body {
            flex: 1;
        }

        
        @media (max-width: 992px) {
            .bg-foto {
                height: 100%;
            }

            .inner {
                height: 100%;
            }
            
            .indi {
                top: 85%;
            }
        }
        @media (max-width: 800px) {
            .bg-foto {
                height: 100%;
            }

            .inner {
                height: 100%;
            }
            
            .indi {
                top: 85%;
                
            }
        }
        @media (max-width: 568px) {
            .bg-foto {
                height: 150vh;
            }

            .inner {
                height: 100vh;
            }

            .indi {
                top: 95%;

            }
        }
        </style>
</head>

<body>
    <div class="container">
        <!-- header start -->
        <!-- header finish -->

        <!-- carousel start -->
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./img/foto-1.jpg" class="d-block img-fluid images">
                    <div class="carousel-caption d-flex flex-column justify-content-center align-items-center">
                        <h2 class="text-center">Kaos <span class="text-success bg-white"><i>Be Leader Not Followers</i></span></h2>
                        <p class="text-center">Buat tren sendiri. Jadilah pemimpin, bukan pengikut.</p>
                        <a href="product.php" class="btn btn-success mb-5 text-white d-flex justify-content-center gap-1" style="width: 120px;">
                            <box-icon name='cart-add' type='solid' flip='horizontal' animation='tada' color='#fffefe' style="margin-top: 3px;"></box-icon><span class="fw-medium" style="font-size: 19px;">Jelajahi</span>
                        </a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./img/foto.jpg" class="d-block img-fluid images">
                    <div class="carousel-caption d-flex flex-column justify-content-center align-items-center">
                        <h2>Kaos <span class="text-white bg-primary"><i>Champion</i></span></h2>
                        <p>Maung Bandung jadi juara. Salam #satubiru.</p>
                        <a href="product.php" class="btn btn-primary mb-5 text-white d-flex justify-content-center gap-1" style="width: 120px;">
                            <box-icon name='cart-add' type='solid' flip='horizontal' animation='tada' color='#fffefe' style="margin-top: 3px;"></box-icon><span class="fw-medium" style="font-size: 19px;">Jelajahi</span>
                        </a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./img/product-2.jpg" class="d-block img-fluid images">
                    <div class="carousel-caption d-flex flex-column justify-content-center align-items-center">
                        <h2>Kaos <span class="text-white bg-danger"><i>JKT48</i></span></h2>
                        <p>Batasi rasa insecuremu, karena di mata Tuhan kamu berharga
                        </p>
                        <a href="product.php" class="btn btn-danger mb-5 text-white d-flex justify-content-center gap-1" style="width: 120px;">
                            <box-icon name='cart-add' type='solid' flip='horizontal' animation='tada' color='#fffefe' style="margin-top: 3px;"></box-icon><span class="fw-medium" style="font-size: 19px;">Jelajahi</span>
                        </a>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- carousel -->
        <!-- card -->
        <div class="cards gap-5 mt-5 mb-5 d-flex align-items-center justify-content-center flex-wrap">
            <div class="card" style="width: 18rem;">
                <img src="./img/baju-dirgahayu.png" class="card-img-top">
                <div class="card-img-overlay d-flex flex-column align-items-center justify-content-center" style="background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);">
                    <h5 class="card-title text-white">Dirgahayu Series</h5>
                    <p class="text-white text-center">Cintailah produk produk Indonesia</p>
                    <button type="button" class="btn bg-white me-2"><a href="product.php#dirgahayu-series" class="text-dark text-decoration-none">Lihat </a></button>
                </div>

            </div>
            <div class="card" style="width: 18rem;">
                <img src="./img/baju-belanda.png" class="card-img-top">
                <div class="card-img-overlay d-flex flex-column align-items-center justify-content-center" style="background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);">
                    <h5 class="card-title text-white">Football Series</h5>
                    <p class="text-white">Bola itu bundar, bukan kotak</p>
                    <button type="button" class="btn bg-white me-2"><a href="product.php#football-series" class="text-dark text-decoration-none">Lihat </a></button>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img src="./img/baju-travel-family.png" class="card-img-top">
                <div class="card-img-overlay d-flex flex-column align-items-center justify-content-center" style="background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);">
                    <h5 class="card-title text-white">Quotes Series</h5>
                    <p class="text-white">Kata kata hari ini ala Lucart</p>
                    <button type="button" class="btn bg-white me-2"><a href="product.php#quotes-series" class="text-dark text-decoration-none">Lihat </a></button>
                </div>
            </div>
        </div>

        <div id="new-relase" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="800">
            <div class="desk-cards mt-5 mb-3 text-center">
                <h2>Baru Dirilis</h2>
                <p>Dapatkan Produk Terbaru Dari Lucart</p>
            </div>
            <div class="d-flex gap-5 mt-1 mb-2 justify-content-center flex-wrap">
                <?php
                include("koneksi.php");

                $result = mysqli_query($koneksi, "SELECT * FROM product ORDER BY id DESC LIMIT 3");
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
        <div class="view mt-5 d-flex align-items-center justify-content-center">
            <a href="product.php" class="btn btn-outline-dark d-flex align-items-center text-dark button mt-2">
                Lihat Lainnya
                <box-icon class="icon" name='chevron-right' class="ms-2"></box-icon>
            </a>
        </div>

    </div>


    <!-- tutup relase -->

    <!-- daftar : dirgahayu -->
    <div class="dirgahayu mt-5" id="dirgahayu-series" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="800">
        <div class="desk-cards mt-5 mb-1 text-center">
            <h2>Dirgahayu Series</h2>
            <p>Kaos Spesial Kemerdekaan Indonesia dari Lucart!</p>
        </div>
        <div class="cards gap-5 mt-1 mb-5 d-flex align-items-center justify-content-center flex-wrap">
            <?php
            include("koneksi.php");

            $result =  mysqli_query(
                $koneksi,
                "SELECT * FROM product WHERE kategori='Dirgahayu Series'"
            );
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
            ?>
        </div>
    </div>


    </div>

    <div class="testimonials mb-5" style="padding: 12px; margin-top: 100px;">
        <div class="row text-center bg-foto p-5 text-white">
            <div class="col-md-4 icon-box mt-5">
                <box-icon type='solid' name='user-check' class="box-icon" color='#ffff'></box-icon>
                <h4>Mengutamakan Pelanggan</h4>
                <p>Garansi uang kembali/baru jika produk yang diterima tidak sesuai pesanan anda.</p>
            </div>
            <div class="col-md-4 icon-box mt-5">
                <box-icon name='check-circle' type='solid' class="box-icon" color='#ffff'></box-icon>
                <h4>Kualitas Premium</h4>
                <p>Alokasi menggunakan bahan dengan kualitas premium dalam setiap produk.</p>
            </div>
            <div class="col-md-4 icon-box mt-5">
                <box-icon name='store-alt' type='solid' class="box-icon" color='#ffff'></box-icon>
                <h4>Keamanan Terjamin</h4>
                <p>Pembayaran dijamin 100% aman melalui Bank Transfer langsung ke rekening penjual anda.</p>
            </div>
        </div>

        <div class="row" style="background-color:rgba(0, 0, 0); padding-top:100px;">
            <div class="col text-center text-white mb-4">
                <h2>Testimoni</h2>
                <p>Lebih dari 2,300+ Customer Memberi Ulasan di Google</p>
            </div>

            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2500">
                <div class="carousel-indicators indi">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner inner">
                    <div class="carousel-item active">
                        <div class="row justify-content-center">
                            <div class="col-md-6 d-flex align-items-stretch px-3 py-3">
                                <div class="testimonial">
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="./img/nic.jpg" alt="Avatar">
                                        <div class="ml-3">
                                            <div class="testimonial-name">Nicholas Saputra</div>
                                            <div class="testimonial-company">Google Review</div>
                                        </div>
                                    </div>
                                    <p class="mt-3">Kata2 di kaosnya Amazing!! Kaosnya bahannya ga panas, untuk harga segitu bagus kualitasnya. Banyak banget temen2 yang tanya. Thank you for your support to stand for Palestine. So with this t-shirt I can raise my voice for Palestine.</p>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex align-items-stretch px-3 py-3">
                                <div class="testimonial">
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="./img/rrezza.jpg" alt="Avatar">
                                        <div class="ml-3">
                                            <div class="testimonial-name">Reza Rahadian</div>
                                            <div class="testimonial-company">Google Review</div>
                                        </div>
                                    </div>
                                    <p class="mt-3">Setiap kali order selalu memuaskan... kualitas ok, fast respon, pengiriman pun cepat... pertahankan dan semoga semakin sukses yaa.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <div class="col-md-6 d-flex align-items-stretch px-3 py-3">
                                <div class="testimonial">
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="./img/abim.jpg" alt="Avatar">
                                        <div class="ml-3">
                                            <div class="testimonial-name">Abimana Arsatya</div>
                                            <div class="testimonial-company">Google Review</div>
                                        </div>
                                    </div>
                                    <p class="mt-3">Saya sangat terkesan dengan layanan dan produk dari Lucart. Kaos yang saya terima sesuai dengan deskripsi dan gambar di website.</p>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex align-items-stretch px-3 py-3">
                                <div class="testimonial">
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="./img/deva.jpg" alt="Avatar">
                                        <div class="ml-3">
                                            <div class="testimonial-name">Deva Mahenra</div>
                                            <div class="testimonial-company">Google Review</div>
                                        </div>
                                    </div>
                                    <p class="mt-3">Lucart memang tidak mengecewakan! Kaos yang saya beli memiliki desain yang segar dan kualitas yang sangat bagus. Proses pembelian dan pengiriman juga sangat efisien. Terima kasih, Lucart!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <div class="col-md-6 d-flex align-items-stretch px-3 py-3">
                                <div class="testimonial">
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="./img/oka.png" alt="Avatar">
                                        <div class="ml-3">
                                            <div class="testimonial-name">Oka Antara</div>
                                            <div class="testimonial-company">Google Review</div>
                                        </div>
                                    </div>
                                    <p class="mt-3">Sangat puas dengan pembelian kaos di Lucart. Desainnya keren dan kualitas kainnya nyaman dipakai. Terima kasih atas pelayanan yang memuaskan!</p>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex align-items-stretch px-3 py-3">
                                <div class="testimonial">
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="./img/rio.jpeg" alt="Avatar">
                                        <div class="ml-3">
                                            <div class="testimonial-name">Rio Dewanto</div>
                                            <div class="testimonial-company">Google Review</div>
                                        </div>
                                    </div>
                                    <p class="mt-3">Produk dari Lucart benar-benar memenuhi ekspektasi saya! Kaos yang saya beli memiliki desain yang unik dan kualitas bahan yang sangat baik. Pengirimannya juga sangat cepat dan layanan pelanggan sangat responsif. Saya pasti akan membeli lagi!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="events mb-5" style="padding-top: 70px;">
        <div class="mb-1 text-center" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="800">
            <h2>Acara</h2>
            <p>Lucart di Segala Acara dan Kegiatan!</p>
        </div>
        <div class="cards gap-5 d-flex align-items-stretch justify-content-center flex-wrap" style="margin-top: 10px;" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="800">

            <div class="card" style="width: 18rem; position: relative;">
                <img src="./img/paud.jpg" class="card-img-top" style="height: 350px;">
                <div class="card-img-overlay d-flex flex-column align-items-center justify-content-end" style="background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);">
                    <h5 class="card-title text-white text-center">Orderan dari KB Paud Nursalam</h5>
                    <p class="text-warning text-center">Minggu, 25 Agustus 2024</p>
                </div>
            </div>

            <div class="card" style="width: 18rem; position: relative;">
                <img src="./img/merdeka.jpg" class="card-img-top" style="height: 350px;">
                <div class="card-img-overlay d-flex flex-column align-items-center justify-content-end" style="background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);">
                    <h5 class="card-title text-white text-center">Lucart Untuk Acara Sekolah</h5>
                    <p class="text-warning text-center">Selasa, 5 Agustus 2024</p>
                </div>
            </div>

            <div class="card" style="width: 18rem; position: relative;">
                <img src="./img/couple.jpg" class="card-img-top" style="height: 350px;">
                <div class="card-img-overlay d-flex flex-column align-items-center justify-content-end" style="background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);">
                    <h5 class="card-title text-white text-center">Couple dengan Family</h5>
                    <p class="text-warning text-center">Minggu, 16 Juni 2024</p>
                </div>
            </div>

        </div>
    </div>
    <?php include 'footers.php'; ?>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>