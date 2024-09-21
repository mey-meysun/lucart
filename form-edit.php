<?php

include("koneksi.php");

// kalau tidak ada id di query string
if (!isset($_GET['id'])) {
    header('Location: dashboard.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$query = mysqli_query($koneksi, "SELECT * FROM product WHERE id=$id");
$product = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if (mysqli_num_rows($query) < 1) {
    die("data tidak ditemukan...");
}


// cek apakah tombol simpan sudah diklik atau blum?
if (isset($_POST['simpan'])) {

    // ambil data dari formulir
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $kategori = $_POST['kategori'];
    $foto = $_FILES['foto']['name'];
    $file_tmp = $_FILES['foto']['tmp_name'];
    move_uploaded_file($file_tmp, 'img/' . $foto);
    $deskripsi = $_POST['deskripsi'];

    // buat query update
    $sql = "UPDATE product SET nama='$nama', harga='$harga', stok='$stok', kategori='$kategori', foto='$foto', deskripsi='$deskripsi' WHERE id=$id";
    $query = mysqli_query($koneksi, $sql);

    // apakah query update berhasil?
    if ($query) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: dashboard.php#table');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }
}

?>

<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="./assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lucart | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="./img/lucart.jpg" type="image/x-icon">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

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
                    <h1 class="h3">Form Edit Produk Lucart</h1>
                </div>

                <div class="form">
                    <form action="dashboard.php #table" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="id" value="<?php echo $product['id'] ?>" />

                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama Product</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" placeholder="Kaos Ngopi" name="nama" value="<?php echo $product['nama'] ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-10 d-flex align-items-center">
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" class="form-control" id="harga" aria-label="Amount (to the nearest dollar)" placeholder="100,000" name="harga" value="<?php echo $product['harga'] ?>">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                            <div class="col-sm-10 d-flex align-items-center">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="stok" placeholder="1000" name="stok" value="<?php echo $product['stok'] ?>">
                                    <span class="input-group-text">pcs</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                            <?php $kategori = $product['kategori']; ?>
                            <div class="col-sm-10 d-flex align-items-center">
                                <select class="form-select" aria-label="Default select example" id="kategori" name="kategori">
                                    <option selected disabled>-- Pilih --</option>
                                    <option <?php echo ($kategori == 'Dirgahayu Series') ? "selected" : "" ?>>Dirgahayu Series
                                    </option>
                                    <option <?php echo ($kategori == 'Football Series') ? "selected" : "" ?>>Football Series
                                    </option>
                                    <option <?php echo ($kategori == 'Quotes Series') ? "selected" : "" ?>>Quotes Series
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="inputGroupFile02" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10 d-flex align-items-center">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="inputGroupFile02" name="foto">
                                    <?php echo $product['foto'] ?>
                                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10 d-flex align-items-center">
                                <textarea class="form-control" id="deskripsi" rows="3" placeholder="example" name="deskripsi"><?php echo $product['deskripsi'] ?>
                                </textarea>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-center mt-4 mb-5 gap-3">
                            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                            <!-- <button type="cancel" class="btn btn-danger" name="batal">Batal</button> -->
                        </div>

                    </form>

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