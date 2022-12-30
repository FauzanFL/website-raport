<?php
session_start();

require('../../includes/function.php');

$role = $_SESSION["role"];

if (!$_SESSION["login"] || $role != $ROLE_ADMIN) {
    redirect("../../../index.php");
    exit;
}

$id_siswa = $_GET["id"];

if (isset($_POST["save"])) {
    $nisn = escape($_POST["nisn"]);
    $nama = escape($_POST["nama"]);
    $ttl = escape($_POST["ttl"]);
    $alamat = escape($_POST["alamat"]);
    $id_kelas = escape($_POST["id_kelas"]);

    $result = query("UPDATE $SISWA SET nisn='$nisn', 
                                    nama='$nama',
                                    ttl='$ttl',
                                    alamat='$alamat',
                                    id_kelas='$id_kelas'
                                    WHERE id=$id_siswa");
    if (mysqli_affected_rows($koneksi) > 0) {
        redirect("siswa.php");
        exit;
    }
    echo "<script>alert('Gagal mengedit data!')</script>";
}

$data = getDataById($SISWA, $id_siswa);

$kelas = getAllData($KELAS);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>
    <link rel="shortcut icon" href="../../assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../styles/common.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>


<body>
    <main class="max-w-md mt-3">
        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
            <h1 class="text-3xl font-bold mb-4">Edit Siswa</h1>

            <form method="POST">
                <div class="mb-3">
                    <label for="nisn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NISN</label>
                    <input name="nisn" type="number" id="nisn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?= $data["nisn"] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nisn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                    <input name="nama" type="text" id="nisn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?= $data["nama"] ?>" required>
                </div>
                <div class="mb-3">
                    <div class="grid grid-cols-2 gap-4 mb-3">
                        <div>
                            <label for="id_kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                            <select id="id_kelas" name="id_kelas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <?php foreach ($kelas as $row) : ?>
                                    <?php if ($row["id"] == $data["id_kelas"]) : ?>
                                        <option value="<?= $row["id"]; ?>" selected><?= $row["nama"]; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $row["id"]; ?>"><?= $row["nama"]; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="ttl" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Tanggal
                        Lahir</label>
                    <input name="ttl" type="text" id="ttl" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?= $data["ttl"] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                    <input name="alamat" type="text" id="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?= $data["alamat"] ?>" required>
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