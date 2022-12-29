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


function checkUsername($table, $username)
{
    return query("SELECT * FROM $table WHERE username = '$username'");
}
