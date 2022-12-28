<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Nilai</title>
    <link rel="shortcut icon" href="../../assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../styles/common.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <main class="max-w-md mt-3">
        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
            <h1 class="text-3xl font-bold mb-4 dark:text-white">Edit Nilai</h1>

            <form>
                <div class="mb-3">
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                    <input type="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
                <div class="grid grid-cols-2 gap-4 mb-3">
                    <div>
                        <label for="mapel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mata
                            Pelajaran</label>
                        <select id="mapel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Pilih</option>
                            <option value="">Matematika</option>
                            <option value="">IPA</option>
                            <option value="">IPS</option>
                        </select>
                    </div>
                    <div>
                        <label for="semester" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Semester</label>
                        <select id="semester" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Pilih</option>
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                            <option value="">4</option>
                            <option value="">5</option>
                            <option value="">6</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nilai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nilai</label>
                    <input type="nilai" id="nilai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
                <div class="mb-3">
                    <label for="catatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan</label>
                    <textarea id="catatan" rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tulis catatan"></textarea>
                </div>

                <div class="flex">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                    <a href="nilai.php" type="kembali" class="text-white bg-gray-400 hover:bg-gray-500 mx-2 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Kembali</a>

                </div>
            </form>
        </div>
    </main>
</body>

</html>