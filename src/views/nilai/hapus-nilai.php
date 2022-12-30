<?php
session_start();

require('../../includes/function.php');

$role = $_SESSION["role"];

if (!$_SESSION["login"] || $role != $ROLE_WAKEL) {
    redirect("../../index.php");
    exit;
}

$id = $_GET["id"];

$result = query("DELETE FROM $NILAI WHERE id=$id");

if (mysqli_affected_rows($koneksi) > 0) {
    echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href='nilai.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href='nilai.php';
        </script>
    ";
}
