<?php

require 'db.php';

//============= DATABASE HELPER =============//

function query($query)
{
    global $koneksi;
    return mysqli_query($koneksi, $query);
}

function confirmQuery($result)
{
    global $koneksi;
    if (!$result) {
        die('QUERY FAILED ' . mysqli_error($koneksi));
    }
}

function escape($value)
{
    global $koneksi;
    return htmlspecialchars(mysqli_real_escape_string($koneksi, $value));
}

function redirect($url)
{
    return header('Location: ' . $url);
    exit;
}

//============= END DATABASE HELPER =============//

//============= CONSTANT ==============//

// table name
$ADMIN = "admin";
$SISWA = "siswa";
$WAKEL = "wali_kelas";
$KELAS = "kelas";
$MAPEL = "mapel";
$NILAI = "nilai_siswa";

// role
$ROLE_ADMIN = "admin";
$ROLE_SISWA = "siswa";
$ROLE_WAKEL = "wakel";

//============= END OF CONSTANT =============//


function checkUsername($table, $username)
{
    return query("SELECT * FROM $table WHERE username = '$username'");
}

function showAllData($table)
{
    return query("SELECT * FROM $table");
}

function countTable($table)
{
    return query("SELECT COUNT(id) FROM $table");
}
