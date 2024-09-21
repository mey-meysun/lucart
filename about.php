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
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

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

    * {
      scroll-behavior: smooth;
      padding: 0;
      margin: 0;
      font-family: 'quicksand';
      font-weight: 500;
    }

    *,
    *::before,
    *::after {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      overflow-x: hidden;
    }

    .img-fluid {
      max-width: 100%;
      height: auto;
    }

    .text-body-secondary {
      font-size: 1rem;
    }

    .container {
      padding-top: 40px;
    }
  </style>

  <link href="./features/features.css" rel="stylesheet">

</head>

<body>
  <?php include "headers.php" ?>

  <div class="container px-4 py-5">
    <div class="row g-4 py-5">
      <!-- Col text -->
      <div class="col-12 col-lg-6 d-flex align-items-center order-2 order-lg-1" data-aos="fade-left" data-aos-easing="linear" data-aos-duration="500">
        <div>
          <h2 class="fw-bold text-body-emphasis">Tentang Kami</h2>
          <p class="text-body-secondary mt-4">
            Didirikan pada bulan Maret, Lucart adalah tujuan utama Anda untuk kaos kustom. Kami percaya bahwa mode adalah bentuk ekspresi diri, dan tidak ada cara yang lebih baik untuk mengekspresikan diri Anda selain dengan pakaian yang dirancang khusus dan unik. <br>
          </p>
          <p class="text-body-secondary">
            Di Lucart, kami menawarkan berbagai macam kaos berkualitas tinggi yang dapat Anda sesuaikan sesuai dengan gaya Anda. Apakah Anda ingin membuat hadiah yang unik, mempromosikan merek Anda, atau hanya mengenakan sesuatu yang benar-benar mencerminkan diri Anda, kami siap membantu. <br>
          </p>
          <p class="text-body-secondary">
            Misi kami adalah memberikan pengalaman terbaik kepada pelanggan kami, dari menjelajahi koleksi kami hingga mengenakan produk kami. Kami bangga dengan komitmen kami terhadap kualitas, kreativitas, dan kepuasan pelanggan. <br>
            <br>
            Terima kasih telah memilih Lucart. <span class="fw-bold">Ambil Langkah Baru!</span>
          </p>
        </div>

      </div>

      <!-- Col image -->
      <div class="col-12 col-lg-6 d-flex align-items-center order-1 order-lg-2" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="500">
        <img src="./img/foto.jpg" alt="foto model lucart" class="img-fluid">
      </div>
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