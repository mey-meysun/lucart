<?php
include 'koneksi.php';

$query = "
    SELECT users.nama, users.email, users.hp, transaksi.id_transaksi, transaksi.tanggal, transaksi.total_harga
    FROM transaksi 
    JOIN users ON transaksi.id_pelanggan = users.id 
    ORDER BY transaksi.tanggal DESC
";
$result = mysqli_query($koneksi, $query);
?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lucart | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="./img/lucart.jpg" type="image/x-icon">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="./dashboard/dashboard.css" rel="stylesheet">
</head>

<body>
    <?php include 'dashboard-header.php' ?>

    <div class="container-fluid">
        <div class="row">
            <?php include 'dashboard-sidebar.php' ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Order</h1>
                </div>

                <!-- <h4 class="mb-3 mt-5">Customer Lucart</h4> -->
                <div class="table-responsive small mb-5" id="table">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Customer</th>
                                <th scope="col">Email</th>
                                <th scope="col">No HP</th>
                                <th scope="col">ID Order</th>
                                <th scope="col">Tanggal Order</th>
                                <th scope="col">Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $id = 1;
                            while ($order = mysqli_fetch_array($result)) {
                            ?>
                                <tr>
                                    <td><?= $id++; ?></td>
                                    <td><?= htmlspecialchars($order['nama']) ?></td>
                                    <td><?= htmlspecialchars($order['email']) ?></td>
                                    <td><?= htmlspecialchars($order['hp']) ?></td>
                                    <td><?= htmlspecialchars($order['id_transaksi']) ?></td>
                                    <td><?= htmlspecialchars($order['tanggal']) ?></td>
                                    <td> Rp <?= number_format($order['total_harga'],2) ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </main>
        </div>
    </div>


    <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script>
    <script src="dashboard.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>

</html>