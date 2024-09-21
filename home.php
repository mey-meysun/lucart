<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lucart | Make a new step</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="./img/lucart.jpg" type="image/x-icon">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="./carousel/carousel.css" rel="stylesheet">

    <style>
        .container .carousel-item {
            height: 518px;
        }

        .container .carousel-item img {
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

        .dirgahayu {
            padding-bottom: 50px;
            background-color: #fafafa;
        }

        * {
            scroll-behavior: smooth;
            padding: 0;
            margin: 0;
        }

        .cards {
            padding: 50px 0;
        }

        .header {
            position: fixed;
            width: 100%;
            background-color: white;
            margin-left: -50px;
            top: 0;
            z-index: 1000000;
        }

        .img {
            filter: brightness(75%);
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
    </style>


    <!-- Custom styles for this template -->
    <link href="./carousel/carousel.css" rel="stylesheet">

</head>

<body>

    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-1 header">
            <div class="col-md-3 mb-1 mb-md-0">
                <a href="index.php" class="d-inline-flex link-body-emphasis text-decoration-none">
                    <img src="./img/lucart-no-bg.png" class="w-25">
                </a>
            </div>

            <ul class="nav col-12 col-md-auto mb-1 justify-content-center gap-3 mb-md-0">
                <li><a href="home.php" class="nav-link px-2">Home</a></li>
                <li><a href="about.php" class="nav-link px-2">About</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Product
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="home.php#new-relase">New Relase <i class="fa-solid fa-arrow-right"></i></a></li>
                        <li><a class="dropdown-item" href="home.php#dirgahayu-series">Dirgahayu Series</a></li>
                        <li><a class="dropdown-item" href="home.php#best-seller">Best Seller</a></li>
                        <li><a class="dropdown-item" href="product.php">All Product</a></li>
                    </ul>
                </li>
                <li><a href="contact.php" class="nav-link px-2">Contact</a></li>
                <li>
                    <div class="position-relative w-100">
                        <input type="search" class="form-control pe-5" placeholder="Search..." aria-label="Search">
                        <div class="position-absolute top-50 translate-middle-y end-0 me-2">
                            <box-icon name='search' class="mt-2"></box-icon>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="col-md-3 d-flex align-items-center justify-content-center">
                <a href="cart.php" class="nav-link me-2"><box-icon type='solid' name='cart-alt' class="mt-1"></box-icon></a>
                <a class="btn btn-outline-danger me-2 ms-2" href="log-out.php">Log Out</a>
                <!-- <a class="btn btn-primary" href="sign-up.php">Sign up</a> -->
            </div>

        </header>
    </div>
    <?php include 'container.php'; ?>


    <!-- <script>
            const myModal = document.getElementById('myModal')
            const myInput = document.getElementById('myInput')

            myModal.addEventListener('shown.bs.modal', () => {
                myInput.focus()
            })
        </script> -->

    <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script>
    <script src="dashboard.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

</body>

</html>

