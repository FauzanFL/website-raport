<?php
session_start();

require('../../includes/function.php');

$name = $_SESSION["name"];
$role = $_SESSION["role"];

if (!$_SESSION["login"] || $role != $ROLE_WAKEL) {
    redirect("../../../index.php");
    exit;
}

$id = $_SESSION["id"];

$wakel = getDataById($WAKEL, $id);
$nilai = getNilaByKelas($wakel["id_kelas"]);
$searchVal = "";

if (isset($_POST["cari"])) {
    $keyword = escape($_POST["keyword"]);
    $nilai = searchNilaiInKelas($keyword, $wakel["id_kelas"]);
    $searchVal = $keyword;
}

if (isset($_GET["semester"]) || isset($_GET["mapel"])) {
    if (isset($_GET["semester"])) {
        $semester = escape($_GET["semester"]);
        $nilai = getNilaiInKelasBySemester($wakel["id_kelas"], $semester);
    } else if (isset($_GET["mapel"])) {
        $id_mapel = escape($_GET["mapel"]);
        $nilai = getNilaiInKelasByMapel($wakel["id_kelas"], $id_mapel);
    }
} else if (isset($_GET["semester"]) && isset($_GET["mapel"])) {
    $semester = escape($_GET["semester"]);
    $id_mapel = escape($_GET["mapel"]);
    $nilai = getNilaiInKelasByMapelAndSemester($wakel["id_kelas"], $id_mapel, $semester);
}

$mapel = getAllData($MAPEL);

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
                    <?php if ($role == $ROLE_ADMIN) : ?>
                        <li class="my-2 py-1 px-2 hover:bg-white hover:text-black rounded-md duration-500"><a href="../siswa/siswa.php">Siswa</a>
                        </li>
                        <li class="my-2 py-1 px-2 hover:bg-white hover:text-black rounded-md duration-500"><a href="../walikelas/wali-kelas.php">Wali
                                Kelas</a></li>
                        <li class="my-2 py-1 px-2 rounded-md duration-500"><button disabled>Nilai</button>
                        </li>
                    <?php elseif ($role == $ROLE_WAKEL) : ?>
                        <li class="my-2 py-1 px-2 rounded-md duration-500"><button disabled>Siswa</button>
                        </li>
                        <li class="my-2 py-1 px-2 rounded-md duration-500"><button disabled>Wali
                                Kelas</button></li>
                        <li class="my-2 py-1 px-2 bg-white text-black rounded-md duration-500"><a href="../nilai/nilai.php">Nilai</a>
                        </li>
                    <?php endif; ?>
                </ol>
            </div>
        </aside>
        <main class="col-span-4">
            <header class="sticky flex justify-between top-3 m-3 p-2 z-10 bg-white border border-gray-100 rounded-md shadow">
                <h1 class="text-2xl font-bold"><?= $name; ?></h1>
                <a href="../general/logout.php" class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-1.5 mx-1 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                    Logout
                </a>
            </header>

            <div class="overflow-x-auto m-3 mt-5 p-5 relative shadow-md sm:rounded-lg">
                <div class="flex justify-between items-center pb-4 bg-white dark:bg-gray-900">
                    <div>
                        <form action="">
                            <div class="flex justify-between items-center">
                                <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadioMapel" class="inline-flex items-center mx-1 text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                                    Mata Pelajaran
                                    <svg class="ml-2 w-3 h-3" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div id="dropdownRadioMapel" class="hidden z-10 w-48 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                                    <ul class="overflow-y-auto py-1 h-32 p-3 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioButton">
                                        <?php foreach ($mapel as $row) : ?>
                                            <?php $i = 1;  ?>
                                            <li>
                                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    <input id="mapel-<?= $i; ?>" type="radio" value="<?= $row["id"]; ?>" name="mapel" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="mapel" class="ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300"><?= $row["nama"]; ?></label>
                                                </div>
                                            </li>
                                            <?php $i++ ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadioSemester" class="inline-flex items-center mx-1 text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                                    Semester
                                    <svg class="ml-2 w-3 h-3" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div id="dropdownRadioSemester" class="hidden z-10 w-48 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                                    <ul class="overflow-y-auto py-1 h-32 p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioButton">
                                        <?php for ($i = 1; $i <= 6; $i++) : ?>
                                            <li>
                                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    <input id="semseter-<?= $i; ?>" type="radio" value="<?= $i; ?>" name="semester" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="semester" class="ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300"><?= $i; ?></label>
                                                </div>
                                            </li>
                                        <?php endfor; ?>
                                    </ul>
                                </div>
                                <button type="submit" class="py-1.5 px-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Set</button>
                            </div>
                        </form>
                    </div>
                    <form method="POST" action="nilai.php" class="flex items-center">
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
                                    <a href="edit-nilai.php?id=<?= $row["id"]; ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    <a href="hapus-nilai.php?id=<?= $row["id"]; ?>" class="font-medium text-red-600 dark:text-red-500 hover:underline">Hapus</a>
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