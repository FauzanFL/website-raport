<?php
session_start();

require('../../includes/function.php');

$role = $_SESSION["role"];

if (!$_SESSION["login"] || $role != $ROLE_ADMIN) {
    redirect("../../../index.php");
    exit;
}

$id_wakel = $_GET["id"];

if (isset($_POST["save"])) {
    $nama = escape($_POST["nama"]);
    $kelas = $_POST["kelas"];
    $nip = escape($_POST["nip"]);

    $result = query("UPDATE $WAKEL SET nama='$nama', id_kelas='$kelas', nip='$nip' WHERE id=$id_wakel");
    if (mysqli_affected_rows($koneksi) > 0) {
        redirect("wali-kelas.php");
        exit;
    }
    echo "<script>alert('Gagal mengedit data!')</script>";
}

$data = getDataById($WAKEL, $id_wakel);

$kelas = getAllData($KELAS);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Wali Kelas</title>
    <link rel="shortcut icon" href="../../assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../styles/common.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <main class="max-w-md mt-3">
        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
            <h1 class="text-3xl font-bold mb-4 dark:text-white">Edit Wali kelas</h1>

            <form method="POST" action="">
                <div class="mb-3">
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                    <input type="text" id="nama" name="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?= $data["nama"]; ?>" required>
                </div>
                <div class="grid grid-cols-2 gap-4 mb-3">
                    <div>
                        <label for="kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                        <select id="kelas" name="kelas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                <div class="mb-3">
                    <label for="nip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP</label>
                    <input type="text" name="nip" id="nip" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?= $data["nip"]; ?>" required>
                </div>
                <div class="flex">
                    <button type="submit" name="save" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                    <a href="wali-kelas.php" type="kembali" class="text-white bg-gray-400 hover:bg-gray-500 mx-2 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Kembali</a>

                </div>
            </form>
        </div>
    </main>
</body>

</html>