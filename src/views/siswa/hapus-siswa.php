<?php
session_start();

require('../../includes/function.php');

$role = $_SESSION["role"];

if (!$_SESSION["login"] || $role != $ROLE_ADMIN) {
    redirect("../../../index.php");
    exit;
}

$id = $_GET["id"];

$result = query("DELETE FROM $SISWA WHERE id=$id");

if (mysqli_affected_rows($koneksi) > 0) {
    echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href='siswa.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href='siswa.php';
        </script>
    ";
}
