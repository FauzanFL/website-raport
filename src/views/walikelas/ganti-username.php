<?php
session_start();

require('../../includes/function.php');

$name = $_SESSION["name"];
$role = $_SESSION["role"];

if (!$_SESSION["login"] || $role != $ROLE_ADMIN) {
    redirect("../../index.php");
    exit;
}

$id = $_GET["id"];

if (isset($_POST["save"])) {
    $username = escape($_POST["username"]);
    $userCheck = checkUsername($WAKEL, $username);
    if (mysqli_affected_rows($koneksi) < 1) {
        $result = query("UPDATE $WAKEL SET username='$username' WHERE id=$id");
        if (mysqli_affected_rows($koneksi) > 0) {
            redirect("wali-kelas.php");
            exit;
        }
        echo "<script>alert('Gagal mengganti Username!')</script>";
    }
    echo "<script>alert('Username sudah ada!')</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti Username</title>
    <link rel="shortcut icon" href="../../assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../styles/common.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>


<body>
    <main class="max-w-md mt-3">
        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
            <h1 class="text-3xl font-bold mb-4">Ganti Username</h1>

            <form method="POST">
                <div class="mb-3">
                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username Baru</label>
                    <input type="text" name="username" id="username" class="bg-gray-50 border <?= $border; ?> text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>

                <div class="flex">
                    <button type="submit" name="save" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                    <a href="siswa.php" type="kembali" class="text-white bg-gray-400 hover:bg-gray-500 mx-2 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Kembali</a>

                </div>
            </form>
        </div>
    </main>
</body>

</html>