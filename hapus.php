<?php

include("koneksi.php");

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $result =  mysqli_query($koneksi, "SELECT nama FROM product WHERE id=$id");
    $row = mysqli_fetch_assoc($result);


    if ($row) {
        // apakah query hapus berhasil?
        $nama = $row['nama'];
        $query = mysqli_query($koneksi, "DELETE FROM product WHERE id=$id");

    // apakah query hapus berhasil?
    if ($query) {
?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    text: "<?= $nama ?> sudah terhapus!",
                    showConfirmButton: false,
                    timer: 2000,
                    backdrop: 'none'
                }).then(function() {
                    window.location.href = 'dashboard.php#table';
                });
            });
        </script>
    <?php

    } else {
    ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    position: "top-end",
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Gagal menghapus..',
                    timer: 2000,
                    footer: '<a href=\"#\">Why do I have this issue?</a>',
                    backdrop: 'none'
                });
            });
        </script>
<?php
    };
};
};
?>