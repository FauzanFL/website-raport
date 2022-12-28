<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "web-raport";

$koneksi = mysqli_connect($host, $user, $password, $dbname);

// Cek Koneksi
if (!$koneksi) {
    die("Tidak dapat terhubung ke database");
}
