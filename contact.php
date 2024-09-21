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
            font-family: 'Quicksand', sans-serif;
        }

        .container {
            padding-top: 50px;
        }

        .contact .button-contact {
            transition: .3s ease-in-out;
        }

        .contact .button-contact:hover {
            font-weight: bold;
            background-color: white;
            transform: translateY(-5px);
            color: black;
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
    </style>

    <link href="./features/features.css" rel="stylesheet">
    <link href="./headers/headers.css" rel="stylesheet">

</head>

<body>
    <?php include "headers.php" ?>

    <div class="container px-4 py-5">
        <div class="row g-4 py-5">
            <!-- Col text -->
            <div class="col-12 col-lg-6 d-flex align-items-center" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="500">
                <div>
                    <h2 class="fw-bold text-body-emphasis">Kontak Kami</h2>

                    <p class="mt-4">
                        Bila Kamu Ada Pertanyaan, Silahkan Hubungi Kami..
                    </p>
                    <div class="contact mt-4 mb-2">
                        <a href="https://wa.me//+6281914523689" target="_blank" class="btn btn-outline-dark text-center d-flex justify-content-center mt-3 button-contact"><box-icon name='whatsapp' type='logo' animation='tada'></box-icon>Di WhatsApp</a>
                    </div>
                    <div class="contact mb-2">
                        <a href="https://www.instagram.com/lucart.ofc/" target="_blank" class="btn btn-outline-dark text-center d-flex justify-content-center mt-3 button-contact"><box-icon name='instagram' type='logo' animation='tada'></box-icon>Di Instagram</a>
                    </div>
                    <div class="contact">
                        <a href="https://www.tiktok.com/@lucart.ofc" target="_blank" class="btn btn-outline-dark text-center d-flex justify-content-center mt-3 button-contact"><box-icon name='tiktok' type='logo' animation='tada'></box-icon>Di TikTok</a>
                    </div>
                </div>
            </div>

            <!-- Col image -->
            <div class="col-12 col-lg-6 d-flex align-items-center mt-5" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="500">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.2829797018726!2d108.53673280000001!3d-6.7352913!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f1df0e55b2ed3%3A0x51cf481547b4b319!2sSMK%20Negeri%201%20Cirebon!5e0!3m2!1sid!2sid!4v1722283922765!5m2!1sid!2sid" width="600" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
