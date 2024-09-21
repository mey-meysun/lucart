<?php
session_start();

session_unset();

session_destroy();

?>
<head>
<link rel="shortcut icon" href="./img/lucart.jpg" type="image/x-icon">
<title>Lucart | Make a new step</title>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <style>
        .swal2-popup {
            font-family: 'Quicksand', sans-serif;
        }
        .swal2-title {
            font-weight: 700;
        }
        .swal2-html-container {
            font-weight: 400;
        }
    </style>
</head>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            position: "center",
            icon: "success",
            title: "Log out berhasil!",
            showConfirmButton: false,
            timer: 2000,
            backdrop: 'white'
        }).then(function() {
            window.location.href = 'index.php';
        });
    });
</script>
<?php
exit;
?>