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
        * {
            scroll-behavior: smooth;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content {
            flex: 1;
        }

        .img-logo {
            width: 50px;
        }

        /* For mobile screens */
        @media (max-width: 767px) {
            .navbar-toggler {
                border: none;
            }

            .d-md-flex {
                display: none;
            }

            .d-block {
                display: block;
            }
        }

    </style>
</head>

<body>
    <div class="content">
        <!-- Main content of your page goes here -->
    </div>

    <footer class="d-flex flex-wrap justify-content-center justify-content-md-between align-items-center py-3 px-5 my-4">
        <p class="col-md-4 mb-0 text-body-secondary">&copy; 2024 - <span class="text-primary">Lucart</span> Make a new step.</p>
        <a href="index.php" class="col-md-4 d-none align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none d-md-flex">
            <img src="./img/lucart-no-bg.png" alt="Logo" class="img-logo">
        </a>

        <ul class="nav col-md-4 justify-content-center justify-content-md-end">
            <li class="nav-item"><a href="index.php" class="nav-link px-2 text-body-secondary">Beranda</a></li>
            <li class="nav-item"><a href="about.php" class="nav-link px-2 text-body-secondary">Tentang</a></li>
            <li class="nav-item"><a href="product.php" class="nav-link px-2 text-body-secondary">Produk</a></li>
            <li class="nav-item"><a href="contact.php" class="nav-link px-2 text-body-secondary">Kontak</a></li>
        </ul>
    </footer>
</body>

</html>
