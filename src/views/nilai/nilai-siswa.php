<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title> Siswa-Nilai </title>

  <link rel="stylesheet" href="src/styles/nilai-siswa.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet" />
  <link rel="shortcut icon" href="src/assets/favicon.ico" type="image/x-icon">
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
          <li><a href=""> Logout </a></li>
          <!-- <li><a href=""> Dashboard </a></li>
          <li><a href=""> Dashboard </a></li>

          <li>
            <a href=""> Dashboard <i></i></a>
            <ul class="dropdown">
              <li><a href=""> Dashboard </a></li>
              <li><a href=""> Dashboard </a></li>
            </ul>
          </li>

          <li><a href=""> Akun <i class="fa fa-caret-down"></i></a>
            <ul class="dropdown">
              <li><a href="">Keluar</a></li>
            </ul> -->
          </li>

        </ul>
      </div>
    </div>
  </header>

  <main>

    <div class="flex justify-between items-center pb-4 bg-white dark:bg-gray-900">
      <button id=" dropdownRadioButton" data-dropdown-toggle="dropdownRadioSemester"
        class="inline-flex items-center text-black bg-white border border-black focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
        type="button">
        Semester
        <svg class="ml-2 w-3 h-3" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
      </button>
      <div id="dropdownRadioSemester"
        class="hidden z-10 w-48 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600"
        data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top"
        style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
        <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioButton">
          <li>
            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
              <input id="filter-radio-example-1" type="radio" value="" name="filter-radio" class=" w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600
                dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
              <label for="filter-radio-example-1"
                class="ml-2 w-full text-sm font-medium text-black rounded dark:text-gray-300">1</label>
            </div>
          </li>
          <li>
            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
              <input checked="" id="filter-radio-example-2" type="radio" value="" name="filter-radio"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
              <label for="filter-radio-example-2"
                class="ml-2 w-full text-sm font-medium text-black rounded dark:text-gray-300">2</label>
            </div>
          </li>
          <li>
            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
              <input id="filter-radio-example-3" type="radio" value="" name="filter-radio"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
              <label for="filter-radio-example-3"
                class="ml-2 w-full text-sm font-medium text-black rounded dark:text-gray-300">3</label>
            </div>
          </li>
          <li>
            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
              <input id="filter-radio-example-4" type="radio" value="" name="filter-radio"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
              <label for="filter-radio-example-4"
                class="ml-2 w-full text-sm font-medium text-black rounded dark:text-gray-300">4</label>
            </div>
          </li>
          <li>
            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
              <input id="filter-radio-example-5" type="radio" value="" name="filter-radio"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
              <label for="filter-radio-example-5"
                class="ml-2 w-full text-sm font-medium text-black rounded dark:text-gray-300">5</label>
            </div>
          </li>
          <li>
            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
              <input id="filter-radio-example-5" type="radio" value="" name="filter-radio"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
              <label for="filter-radio-example-5"
                class="ml-2 w-full text-sm font-medium text-black rounded dark:text-gray-300">6</label>
            </div>
          </li>
        </ul>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <ol>
          <li class="text-xl">Nama</li>
          <li class="text-xl">Nisn</li>
          <li class="text-xl">Tempat Tanggal Lahir</li>
          <li class="text-xl">Alamat</li>
        </ol>
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
            <tr>
              <th scope="row">1</th>
              <th scope="row"> Pendidikan Agama Islam dan Budi Pekerti </th>
              <th scope="row"> 92 </th>
              <th scope="row" class="text-justify"> Kompetensi beriman, memahami dan menyajikan dalil naqli tentang hari
                akhir serta
                menunjukan perilaku mawas diri, beriman, menyajikan keterkaitan serta menunjukan perilaku serta
                menunjukan perilaku optimis, ikhtiar dan tawakal, meyakini, memahami, menyajikan serta menunjukan
                perilaku taat kepada orang tua dan guru. Meyakini, memahami, menyajikan serta menunjukan perilaku jujur
                dan menepati janji telah tercapai, perlu peningkatan dalam membaca, memahami serta menyajikan perilaku
                toleransi dan menghargai perbedaan. </th>
            </tr>
            <tr>
              <th scope="row">2</th>
              <th scope="row"> Pendidikan Pancasila dan Kewarganegaraan </th>
              <th scope="row"> 91 </th>
              <th scope="row" class="text-justify"> Kompetensi memahami dan memaparkan tentang bentuk dan kedaulatan
                negara, memahami dan
                menyajikan hasil pokok - pokok pikiran dalam pembukaan UUD 1945 telah tercapai. Perlu peningkatan dalam
                memahami perwujudan pancasila sebagai dasar negara. </th>
            </tr>
            <tr>
              <th scope="row">3</th>
              <th scope="row"> Bahasa Indonesia </th>
              <th scope="row"> 92 </th>
              <th scope="row" class="text-justify"> Kompetensi beriman, memahami dan menyajikan dalil naqli tentang hari
                akhir serta
                menunjukan perilaku mawas diri, beriman, menyajikan keterkaitan serta menunjukan perilaku serta
                menunjukan perilaku optimis, ikhtiar dan tawakal, meyakini, memahami, menyajikan serta menunjukan
                perilaku taat kepada orang tua dan guru. Meyakini, memahami, menyajikan serta menunjukan perilaku jujur
                dan menepati janji telah tercapai, perlu peningkatan dalam membaca, memahami serta menyajikan perilaku
                toleransi dan menghargai perbedaan. </th>
              </th>
            </tr>
            <tr>
              <th scope="row">4</th>
              <th scope="row"> Matematika </th>
              <th scope="row"> 82 </th>
              <th scope="row" class="text-justify"> Kompetensi beriman, memahami dan menyajikan dalil naqli tentang hari
                akhir serta
                menunjukan perilaku mawas diri, beriman, menyajikan keterkaitan serta menunjukan perilaku serta
                menunjukan perilaku optimis, ikhtiar dan tawakal, meyakini, memahami, menyajikan serta menunjukan
                perilaku taat kepada orang tua dan guru. Meyakini, memahami, menyajikan serta menunjukan perilaku jujur
                dan menepati janji telah tercapai, perlu peningkatan dalam membaca, memahami serta menyajikan perilaku
                toleransi dan menghargai perbedaan. </th>
              </th>
            </tr>
            <tr>
              <th scope="row">5</th>
              <th scope="row"> Ilmu Pengetahuan Alam (IPA) </th>
              <th scope="row"> 86 </th>
              <th scope="row" class="text-justify"> Kompetensi beriman, memahami dan menyajikan dalil naqli tentang hari
                akhir serta
                menunjukan perilaku mawas diri, beriman, menyajikan keterkaitan serta menunjukan perilaku serta
                menunjukan perilaku optimis, ikhtiar dan tawakal, meyakini, memahami, menyajikan serta menunjukan
                perilaku taat kepada orang tua dan guru. Meyakini, memahami, menyajikan serta menunjukan perilaku jujur
                dan menepati janji telah tercapai, perlu peningkatan dalam membaca, memahami serta menyajikan perilaku
                toleransi dan menghargai perbedaan. </th>
              </th>
            </tr>
            <tr>
              <th scope="row">6</th>
              <th scope="row"> Ilmu Pengetahuan Sosial </th>
              <th scope="row"> 95 </th>
              <th scope="row" class="text-justify"> Kompetensi menelaah dan menyajikan perubahan dan interaksi antar
                ruang dan waktu telah tercapai. Perlu peningkatan dalam menganalisis dan menyajikan hasil analisis
                perubahan. </th>
            </tr>
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
            <tr>
              <th scope="row">1</th>
              <th scope="row">Seni Budaya</th>
              <th scope="row">89</th>
              <th scope="row" class="text-justify">Komptensi memahami dan membuat karya seni lukis dengan berbagai bahan
                dan teknik memahami
                dan membuat unsur prinsip teknik dan prosedur berkarya seni patung dengan berbagai bahan telah tercapai.
              </th>
            </tr>
            <tr>
              <th scope="row">2</th>
              <th scope="row">Pendidikan Jasmani Olahraga dan Kesehatan</th>
              <th scope="row">91</th>
              <th scope="row" class="text-justify">Kompetensi memahami dan mempraktikan kombinasi gerak spesifik
                permainan bola kecil,
                memahami dan mempraktikan varisan dan kombinasi gerak spesifik seni bela diri , memahami dan
                mempraktikan kombinasi gerak spesifik atletik, memahami dan mempraktikan kombinasi gerak permainan bola
                besar telah tercapai. Perlu peningkatan dalam memahami dan mempraktikan penyusunan program pengembangan
                kebugaran jasmani. </th>
            </tr>
            <tr>
              <th scope="row">3</th>
              <th scope="row">Muatan Lokal Bahasa Daerah</th>
              <th scope="row">88</th>
              <th scope="row" class="text-justify">Kompetensi memahami dan mempraktikan kombinasi gerak spesifik
                permainan bola kecil,
                memahami dan mempraktikan varisan dan kombinasi gerak spesifik seni bela diri , memahami dan
                mempraktikan kombinasi gerak spesifik atletik, memahami dan mempraktikan kombinasi gerak permainan bola
                besar telah tercapai. Perlu peningkatan dalam memahami dan mempraktikan penyusunan program pengembangan
                kebugaran jasmani.</th>
            </tr>
            <tr>
              <th scope="row">4</th>
              <th scope="row">Prakarya</th>
              <th scope="row">91</th>
              <th scope="row" class="text-justify"> Kompetensi beriman, memahami dan menyajikan dalil naqli tentang hari
                akhir serta
                menunjukan perilaku mawas diri, beriman, menyajikan keterkaitan serta menunjukan perilaku serta
                menunjukan perilaku optimis, ikhtiar dan tawakal, meyakini, memahami, menyajikan serta menunjukan
                perilaku taat kepada orang tua dan guru. Meyakini, memahami, menyajikan serta menunjukan perilaku jujur
                dan menepati janji telah tercapai, perlu peningkatan dalam membaca, memahami serta menyajikan perilaku
                toleransi dan menghargai perbedaan. </th>
            </tr>

          </tbody>

        </table>
      </div>
    </div>


  </main>

</body>

</html>