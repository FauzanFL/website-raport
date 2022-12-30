<?php
session_start();

require('../../includes/function.php');

$name = $_SESSION["name"];
$role = $_SESSION["role"];

if (!$_SESSION["login"] || $role != $ROLE_ADMIN) {
    redirect("../../index.php");
    exit;
}

$mapel = getAllData($MAPEL);
$nilai = getAllData($NILAI);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Siswa</title>
    <link rel="shortcut icon" href="../../assets/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
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
                    <li class="my-2 py-1 px-2 hover:bg-white hover:text-black rounded-md duration-500"><a href="../siswa/siswa.php">Siswa</a>
                    </li>
                    <li class="my-2 py-1 px-2 hover:bg-white hover:text-black rounded-md duration-500"><a href="../walikelas/wali-kelas.php">Wali
                            Kelas</a></li>
                    <li class="my-2 py-1 px-2 bg-white text-black  rounded-md duration-500"><a href="nilai.php">Nilai</a>
                    </li>
                </ol>
            </div>
        </aside>
        <main class="col-span-4">
            <header class="sticky flex justify-between top-3 m-3 p-2 z-10 bg-white border border-gray-100 rounded-md shadow">
                <h1 class="text-2xl font-bold"><?= $name; ?></h1>
                <a href="" class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-1.5 mx-1 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                    Logout
                </a>
            </header>

            <div class="overflow-x-auto m-3 mt-5 p-5 relative shadow-md sm:rounded-lg">
                <div class="flex justify-between items-center pb-4 bg-white dark:bg-gray-900">
                    <div>
                        <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadioMapel" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                            Mata Pelajaran
                            <svg class="ml-2 w-3 h-3" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="dropdownRadioMapel" class="hidden z-10 w-48 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                            <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioButton">
                                <?php foreach ($mapel as $row) : ?>
                                    <li>
                                        <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <input id="radioSemester" type="radio" value="<?= $row["id"]; ?>" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="radioSemester" class="ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300"><?= $row["nama"]; ?></label>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadioSemester" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                            Semester
                            <svg class="ml-2 w-3 h-3" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="dropdownRadioSemester" class="hidden z-10 w-48 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                            <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioButton">
                                <?php for ($i = 1; $i <= 6; $i++) : ?>
                                    <li>
                                        <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <input id="filter-radio-example-1" type="radio" value="<?= $i; ?>" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="filter-radio-example-1" class="ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300"><?= $i; ?></label>
                                        </div>
                                    </li>
                                <?php endfor; ?>
                            </ul>
                        </div>
                    </div>
                    <label for="table-search" class="sr-only">Cari</label>
                    <div class="relative">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" id="table-search-users" class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari">
                    </div>
                </div>
                <div class="flex justify-end">
                    <a href="tambah-nilai.php" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-3 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Tambah</a>
                </div>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                Nama
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Nilai
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Mata Pelajaran
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Semester
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Catatan
                            </th>
                            <th scope="col" class="py-3 px-6">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($nilai as $row) : ?>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <?php
                                    $siswa = getDataById($SISWA, $row["id_siswa"]);
                                    echo $siswa["nama"];
                                    ?>
                                </th>
                                <td class="py-4 px-6">
                                    <?= $row["nilai"]; ?>
                                </td>
                                <td class="py-4 px-6">
                                    <?php
                                    $pelajaran = getDataById($MAPEL, $row["id_mapel"]);
                                    echo $pelajaran["nama"];
                                    ?>
                                </td>
                                <td class="py-4 px-6">
                                    <?= $row["semester"]; ?>
                                </td>
                                <td class="py-4 px-6">
                                    <?= $row["catatan"]; ?>
                                </td>
                                <td class="py-4 px-6 text-center">
                                    <a href="edit-nilai.php" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">Hapus</a>
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