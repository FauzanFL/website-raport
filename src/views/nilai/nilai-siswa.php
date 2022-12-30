<?php
session_start();

require('../../includes/function.php');

$role = $_SESSION["role"];

if (!$_SESSION["login"] || $role != $ROLE_SISWA) {
  redirect("../../../index.php");
  exit;
}

$id = $_SESSION["id"];
$siswa = getDataById($SISWA, $id);

$kelompokA = getNilaiSiswa($id, "A", 1);
$kelompokB = getNilaiSiswa($id, "B", 1);

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title> <?= $siswa["nama"]; ?> - Nilai </title>

  <link rel="stylesheet" href="../../styles/nilai-siswa.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet" />
  <link rel="shortcut icon" href="../../assets/favicon.ico" type="image/x-icon">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>

  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }
  </style>

</head>

<body>

  <header>
    <!-- Navbar -->
    <div class="navbar">
      <div class="container">
        <h2 class="nav-brand float-left"><a href="index.php"> SMPN 3 Talaga </a></h2>

        <!-- Menu -->
        <ul class="nav-menu float-left">
          <li><a href="../general/logout.php"> Logout </a></li>
          </li>

        </ul>
      </div>
    </div>
  </header>

  <main>

    <div class="flex justify-between items-center pb-4 bg-white dark:bg-gray-900">
      <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadioSemester" class="inline-flex items-center font-bold text-black bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
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
                <label for="filter-radio-example-1" class="ml-2 w-full text-sm font-bold text-black rounded dark:text-gray-300"><?= $i; ?></label>
              </div>
            </li>
          <?php endfor; ?>
        </ul>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <table class="w-2/5">
          <tbody>
            <tr>
              <th class="text-xl">Nama</th>
              <th class="text-xl">:</th>
              <td class="text-xl"><?= $siswa["nama"]; ?></td>
            </tr>
            <tr>
              <th class="text-xl">NISN</th>
              <th class="text-xl">:</th>
              <td class="text-xl"><?= $siswa["nisn"]; ?></td>
            </tr>
            <tr>
              <th class="text-xl">Tempat Tanggal Lahir</th>
              <th class="text-xl">:</th>
              <td class="text-xl"><?= $siswa["ttl"]; ?></td>
            </tr>
            <tr>
              <th class="text-xl">Alamat</th>
              <th class="text-xl">:</th>
              <td class="text-xl"><?= $siswa["alamat"]; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="card-body">
        <h2 class="font-bold text-xl"> Kelompok A </h2>
        <table class="table">

          <thead>
            <th> No </th>
            <th> Mata Pelajaran </th>
            <th> Nilai </th>
            <th> Catatan </th>
          </thead>

          <tbody>
            <?php foreach ($kelompokA as $row) : ?>
              <?php $i = 1 ?>
              <tr>
                <th scope="row"><?= $i; ?></th>
                <td scope="row">
                  <?= $row["nama_mapel"]; ?>
                </td>
                <td scope="row"><?= $row["nilai"]; ?></td>
                <td scope="row" class="text-justify"><?= $row["catatan"]; ?></th>
              </tr>
              <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>

        </table>
      </div>


      <div class="card-body">
        <h2 class="font-bold text-xl"> Kelompok B </h2>
        <table class=" table">

          <thead>
            <th> No </th>
            <th> Mata Pelajaran </th>
            <th> Nilai</th>
            <th> Catatan </th>
          </thead>

          <tbody>
            <?php foreach ($kelompokB as $row) : ?>
              <?php $i = 1 ?>
              <tr>
                <th scope="row"><?= $i; ?></th>
                <td scope="row">
                  <?php $mapel = getDataByID($MAPEL, $row["id_mapel"]);
                  echo $mapel["nama"] ?>
                </td>
                <td scope="row"><?= $row["nilai"]; ?></td>
                <td scope="row" class="text-justify"><?= $row["catatan"]; ?></th>
              </tr>
              <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>

        </table>
      </div>
    </div>


  </main>

</body>

</html>