<?php
session_start();

require('../../includes/function.php');

$name = $_SESSION["name"];
$role = $_SESSION["role"];

if (!$_SESSION["login"] || $role != $ROLE_ADMIN) {
    redirect("../../index.php");
    exit;
}

$data_siswa = getAllData($SISWA);
$searchVal = "";

if (isset($_POST["cari"])) {
    $keyword = escape($_POST["keyword"]);
    $data_siswa = searchSiswa($keyword);
    $searchVal = $keyword;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siswa</title>
    <link rel="shortcut icon" href="../../assets/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="grid grid-cols-5">
        <aside class="w-64">
            <div class="fixed flex flex-col items-center top-0 bottom-0 w-1/5 bg-gray-600 border-r border-gray-400">
                <img src="../../assets/logo.png" alt="">
                <ol class="text-white text-xl font-medium max-w-48 w-20 md:w-32 lg:w-48 mt-8">
                    <li class="my-2 py-1 px-2 hover:bg-white hover:text-black rounded-md duration-500">
                        <a href="../general/dashboard.php">Home</a>
                    </li>
                    <li class="my-2 py-1 px-2 bg-white text-black rounded-md duration-500">
                        <a href="siswa.php">Siswa</a>
                    </li>
                    <li class="my-2 py-1 px-2 hover:bg-white hover:text-black rounded-md duration-500">
                        <a href="../walikelas/wali-kelas.php">Wali Kelas</a>
                    </li>
                    <li class="my-2 py-1 px-2 hover:bg-white hover:text-black rounded-md duration-500">
                        <a href="../nilai/nilai.php">Nilai</a>
                    </li>
                </ol>
            </div>
        </aside>
        <main class="col-span-4">
            <header class="sticky flex justify-between top-3 m-3 p-2 z-10 bg-white border border-gray-100 rounded-md shadow">
                <h1 class="text-2xl font-bold">Ucup Gaming</h1>
                <a href="" class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-1.5 mx-1 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                    Logout
                </a>
            </header>

            <div class="overflow-x-auto m-3 mt-5 p-5 relative shadow-md sm:rounded-lg">
                <div class="flex justify-between items-center pb-4 bg-white dark:bg-gray-900">
                    <form method="POST" class="flex items-center">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text" name="keyword" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?= $searchVal; ?>" placeholder="Search">
                        </div>
                        <button type="submit" name="cari" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </form>
                </div>
                <div class="flex justify-end">
                    <a href="tambah-siswa.php" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-3 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Tambah</a>
                </div>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                NISN
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Nama
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Kelas
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Tempat, Tanggal Lahir
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Alamat
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Username
                            </th>
                            <th scope="col" class="py-3 px-6">
                            </th>
                            <th scope="col" class="py-3 px-6">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data_siswa as $row) : ?>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <?= $row['nisn'] ?>
                                </th>
                                <td class="py-4 px-6">
                                    <?= $row['nama'] ?>
                                </td>
                                <td class="py-4 px-6">
                                    <?php
                                        $kelas = getDataById($KELAS, $row["id_kelas"]);
                                        echo $kelas["nama"];
                                    ?>
                                </td>
                                <td class="py-4 px-6">
                                    <?= $row['ttl'] ?>
                                </td>
                                <td class="py-4 px-6">
                                    <?= $row['alamat'] ?>
                                </td>
                                <td class="py-4 px-6">
                                    <?= $row['username'] ?>
                                </td>
                                <td class="py-4 px-6 text-center">
                                    <a href="edit-siswa.php?id=<?= $row['id'] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    <a href="hapus-siswa.php?id=<?= $row['id'] ?>" class="font-medium text-red-600 dark:text-red-500 hover:underline">Hapus</a>
                                </td>
                                <td class="grid grid-rows-1 py-4 px-6">
                                    <a href="edit-username.php?id=<?= $row["id"]; ?>" class="font-medium text-yellow-500 dark:text-yellow-400 hover:underline">Ganti Username</a>
                                    <a href="edit-password.php?username=<?= $row["username"]; ?>" class="font-medium text-amber-600 dark:text-amber-500 hover:underline">Ganti Password</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </main>
    </div>
</body>

</html>