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

function getAllData($table)
{
    $result = query("SELECT * FROM $table");
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function getDataById($table, $id)
{
    global $koneksi;
    $result = query("SELECT * FROM $table WHERE id = '$id'");
    if (mysqli_affected_rows($koneksi) > 0) {
        $data = mysqli_fetch_array($result);
        return $data;
    }
    return;
}

function countTable($table)
{
    $result = getAllData($table);
    return count($result);
}

// wali kelas
function searchWaliKelas($keyword)
{
    global $WAKEL;
    $result = query("SELECT * FROM $WAKEL WHERE nip LIKE '%$keyword%' OR nama LIKE '%$keyword%' or username LIKE '%$keyword%'");
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// siswa
function searchSiswa($keyword)
{
    global $SISWA;
    $result = query("SELECT * FROM $SISWA WHERE nisn LIKE '%$keyword%' OR nama LIKE '%$keyword%' OR id_kelas LIKE '%$keyword%' OR ttl LIKE '%$keyword%' OR alamat LIKE '%$keyword%' OR username LIKE '%$keyword%'");
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}
function getIdSiswaByName($name)
{
    global $SISWA;
    global $koneksi;
    $result = query("SELECT id FROM $SISWA WHERE nama='$name'");
    if (mysqli_affected_rows($koneksi) > 0) {
        $data = mysqli_fetch_array($result);
        return $data;
    }
    return;
}
function searchSiswaByName($name)
{
    global $SISWA;
    global $koneksi;
    $result = query("SELECT * FROM $SISWA WHERE nama LIKE '%$name%'");
    if (mysqli_affected_rows($koneksi) > 0) {
        $data = mysqli_fetch_array($result);
        return $data;
    }

    return;
}

// nilai
function getNilaByKelas($id_kelas)
{
    global $NILAI;
    global $SISWA;
    $result = query("SELECT * FROM $NILAI WHERE id_siswa IN (SELECT id FROM $SISWA WHERE id_kelas = '$id_kelas')");
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function getNilaiSiswa($id_siswa, $kelompok, $semester)
{
    global $NILAI;
    global $MAPEL;
    $result = query("SELECT n.nilai, n.catatan, m.nama AS nama_mapel FROM $NILAI AS n INNER JOIN $MAPEL AS m WHERE n.id_mapel = m.id AND m.kelompok = '$kelompok' AND n.semester = '$semester' AND n.id_siswa = '$id_siswa'");
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function searchNilaiInKelas($keyword, $id_kelas)
{
    global $NILAI;
    global $SISWA;
    $result = query("SELECT * FROM $NILAI WHERE id_siswa IN (SELECT id FROM $SISWA WHERE id_kelas = '$id_kelas' AND nama LIKE '%$keyword%') OR nilai='$keyword' OR catatan LIKE '%$keyword%'");
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function getNilaiInKelasBySemester($id_kelas, $semester)
{
    global $NILAI;
    global $SISWA;
    $result = query("SELECT * FROM $NILAI WHERE id_siswa IN (SELECT id FROM $SISWA WHERE id_kelas = '$id_kelas') AND semester='$semester'");
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function getNilaiInKelasByMapel($id_kelas, $id_mapel)
{
    global $NILAI;
    global $SISWA;
    $result = query("SELECT * FROM $NILAI WHERE id_siswa IN (SELECT id FROM $SISWA WHERE id_kelas = '$id_kelas') AND id_mapel='$id_mapel'");
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function getNilaiInKelasByMapelAndSemester($id_kelas, $id_mapel, $semester)
{
    global $NILAI;
    global $SISWA;
    $result = query("SELECT * FROM $NILAI WHERE id_siswa IN (SELECT id FROM $SISWA WHERE id_kelas = '$id_kelas') AND id_mapel='$id_mapel' AND semester='$semester'");
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}
