<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "se2022_smp3talaga";

$koneksi = mysqli_connect($host, $user, $password, $dbname);

// Cek Koneksi
if (!$koneksi) {
    die("Tidak dapat terhubung ke database");
}
